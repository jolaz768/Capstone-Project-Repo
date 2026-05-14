<?php

namespace App\Livewire\Pages\Public\Booking;

use App\Models\Booking;
use App\Models\BookingItem;
use App\Models\CustomerMesurement;
use App\Models\MeasurementValue;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
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
    public $fromCart = false;

    public function mount($id)
    {
        $this->shop = Shop::query()
            ->where('id', $id)
            ->where('is_active', 1)
            ->with([
                'bookings:id,shop_id,user_id,created_at,status',
                'services:id,shop_id,name',
                'garments:id,shop_id,name,description,image,base_price,category_id,service_id',
                'garments.measurementTemplate:id,garment_id,name',
                'garments.measurementTemplate.measurementFields:id,measurement_template_id,field_name,unit',
            ])
            ->firstOrFail();

        // Auto‑load authenticated user data into the booking form
        if (Auth::check()) {
            $user = Auth::user();
            $this->customerName = $user->name;
            $this->customerEmail = $user->email;
        }

        // Check if coming from cart
        $this->fromCart = request()->input('from_cart', false);

        // Load cart data if available
        if ($this->fromCart && session()->has('booking_cart_data')) {
            $this->loadCartData();
        }
    }

    #[Computed]
    public function garmentsByService()
    {
        if (!$this->serviceId) {
            if (!empty($this->selectedGarmentIds)) {
                return $this->shop->garments->whereIn('id', $this->selectedGarmentIds);
            }

            return collect();
        }

        return $this->shop->garments->where('service_id', $this->serviceId);
    }

    public function updatedServiceId()
    {
        $selectedService = $this->shop->services->firstWhere('id', $this->serviceId);

        if ($selectedService && str_contains(strtolower($selectedService->name), 'rental')) {
            return redirect()->route('booking.rental');
        }

        $this->selectedGarmentIds = [];
        $this->measurementValues = [];
        $this->quantities = [];
        $this->showMeasurements = false;
    }

    /**
     * Load garments and quantities from cart
     */
    protected function loadCartData(): void
    {
        $cartData = session()->get('booking_cart_data');

        if (!$cartData || empty($cartData['garments'])) {
            return;
        }

        $garmentIds = [];

        foreach ($cartData['garments'] as $garmentId => $item) {
            $garmentExists = $this->shop->garments->contains('id', $garmentId);

            if ($garmentExists) {
                $garmentIds[] = $garmentId;
                $this->quantities[$garmentId] = $item['quantity'];
            }
        }

        $this->selectedGarmentIds = $garmentIds;
        $this->serviceId = $cartData['service_id'] ?? null;

        // If rental service is selected in cart, redirect to rental booking page
        if ($this->serviceId) {
            $selectedService = $this->shop->services->firstWhere('id', $this->serviceId);
            if ($selectedService && str_contains(strtolower($selectedService->name), 'rental')) {
                session()->forget('booking_cart_data');
                redirect()->route('booking.rental');
                return;
            }
        }

        session()->forget('booking_cart_data');
        session()->flash('info', 'Cart items have been loaded! Please complete your measurements and booking details.');

        if (!empty($this->selectedGarmentIds)) {
            $this->showMeasurements = true;
        }
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
                    $rules["measurementValues.{$field->id}"] = 'required|numeric|min:0|max:999';
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

                $bookingItem = BookingItem::create([
                    'booking_id' => $booking->id,
                    'garment_id' => $garment->id,
                    'quantity' => $qty,
                    'sub_total' => $garment->base_price * $qty,
                ]);

                if ($garment->measurementTemplate) {
                    foreach ($garment->measurementTemplate->measurementFields as $field) {
                        if (! isset($this->measurementValues[$field->id])) {
                            continue;
                        }

                        $measurementValue = MeasurementValue::create([
                            'measurement_field_id' => $field->id,
                            'value' => $this->measurementValues[$field->id],
                        ]);

                        CustomerMesurement::create([
                            'user_id' => Auth::id(),
                            'booking_item_id' => $bookingItem->id,
                            'measurement_value_id' => $measurementValue->id,
                        ]);
                    }
                }
            }
        });

        // Clear cart after successful booking
        session()->forget('cart');

        $this->reset(['serviceId', 'selectedGarmentIds', 'measurementValues', 'customerName', 'customerEmail', 'bookingDate', 'quantities']);
        session()->flash('message', 'Your booking has been created and sent to the shop owner.');

        // Redirect to confirmation page
        // return redirect()->route('booking.confirmation');
    }

    public function render()
    {
        return view('livewire.pages.public.booking.create-booking');
    }
}
