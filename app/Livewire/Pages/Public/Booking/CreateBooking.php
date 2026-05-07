<?php

namespace App\Livewire\Pages\Public\Booking;

use App\Models\Booking;
use App\Models\BookingItem;
use App\Models\CustomerMesurement;
use App\Models\MeasurementValue;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateBooking extends Component
{
    #[Layout('components.layouts.app')]
    public Shop $shop;

    public ?int $serviceId = null;
    public array $selectedGarmentIds = [];
    public array $measurementValues = [];
    public array $quantities = [];
    public string $status = 'pending';
    public string $customerName = '';
    public string $customerEmail = '';
    public ?string $bookingDate = null;
    public $showMeasurements = false;

    public function mount($id)
    {
        $this->shop = Shop::query()
            ->where('id', $id)
            ->where('is_active', 1)
            ->with([
                'bookings:id,shop_id,user_id,created_at,status',
                'services:id,shop_id,name',
                'garments:id,shop_id,name,description,image,base_price',
                'garments.measurementTemplate:id,garment_id,name',
                'garments.measurementTemplate.measurementFields:id,measurement_template_id,field_name,unit',
            ])
            ->firstOrFail();
    }

    public function getSelectedGarmentsProperty()
    {
        return $this->shop->garments->whereIn('id', $this->selectedGarmentIds);
    }

    public function getTotalPriceProperty()
    {
        return $this->selectedGarments->sum(function ($garment) {
            return $garment->base_price * ($this->quantities[$garment->id] ?? 1);
        });
    }

    public function updatedSelectedGarmentIds(): void
    {
        // Initialize quantity = 1 if not set
        foreach ($this->selectedGarmentIds as $id) {
            if (!isset($this->quantities[$id])) {
                $this->quantities[$id] = 1;
            }
        }

        // Remove quantities for unselected garments
        $this->quantities = array_intersect_key(
            $this->quantities,
            array_flip($this->selectedGarmentIds)
        );

        // Keep measurement values clean
        $activeFieldIds = $this->selectedGarments
            ->flatMap(
                fn($garment) => $garment->measurementTemplate
                    ? $garment->measurementTemplate->measurementFields
                    : collect()
            )
            ->pluck('id')
            ->map(fn($id) => (string) $id)
            ->all();

        $this->measurementValues = array_intersect_key(
            $this->measurementValues,
            array_flip($activeFieldIds)
        );
    }
    public function loadMeasurements()
{
    if (empty($this->selectedGarmentIds)) {
        session()->flash('error', 'Please select at least one garment first.');
        return;
    }
    
    $this->showMeasurements = true;
}

    protected function rules(): array
    {
        $rules = [
            'serviceId' => 'required|exists:services,id',
            'selectedGarmentIds' => 'required|array|min:1',
            'selectedGarmentIds.*' => 'required|exists:garments,id',
            'customerName' => 'required|string|max:255',
            'customerEmail' => 'required|email|max:255',
            'bookingDate' => 'required|date|after_or_equal:today',
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
            'status' => 'required|in:pending,approved,processing,completed,cancelled',
        ];

        foreach ($this->selectedGarments as $garment) {
            if ($garment->measurementTemplate) {
                foreach ($garment->measurementTemplate->measurementFields as $field) {
                    $rules["measurementValues.{$field->id}"] = 'required|numeric';
                }
            }
        }

        return $rules;
    }

    public function createBooking(): void
    {
        $validated = $this->validate();

        $garments = $this->selectedGarments;
        $totalPrice = $this->getTotalPriceProperty();

        DB::transaction(function () use ($validated, $garments, $totalPrice) {
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'shop_id' => $this->shop->id,
                'service_id' => $this->serviceId,
                'status' => $this->status,
                'booking_date' => $this->bookingDate,
                'total_price' => $totalPrice,
            ]);

            foreach ($garments as $garment) {
                $qty = $this->quantities[$garment->id] ?? 1;

                BookingItem::create([
                    'booking_id' => $booking->id,
                    'garment_id' => $garment->id,
                    'quantity' => $qty,
                    'sub_total' => $garment->base_price * $qty,
                ]);

                if ($garment->measurementTemplate) {
                    CustomerMesurement::create([
                        'user_id' => Auth::id(),
                        'garment_id' => $garment->id,
                        'measurement_template_id' => $garment->measurementTemplate->id,
                    ]);

                    foreach ($garment->measurementTemplate->measurementFields as $field) {
                        if (array_key_exists($field->id, $this->measurementValues)) {
                            MeasurementValue::create([
                                'measurement_field_id' => $field->id,
                                'value' => $this->measurementValues[$field->id],
                            ]);
                        }
                    }
                }
            }
        });

        $this->reset(['serviceId', 'selectedGarmentIds', 'measurementValues', 'customerName', 'customerEmail', 'bookingDate']);
        session()->flash('message', 'Your booking has been created and sent to the shop owner.');
    }

    public function render()
    {
        return view('livewire.pages.public.booking.create-booking');
    }
}
