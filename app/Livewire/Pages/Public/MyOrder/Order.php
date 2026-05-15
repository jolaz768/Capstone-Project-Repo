<?php

namespace App\Livewire\Pages\Public\MyOrder;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Order extends Component
{
    #[Layout('components.layouts.app')]

 public $orders = [];
    public $filterStatus = 'all';
    public $search = '';

    public function mount()
    {
        // Mock order data (no backend)
        $this->orders = collect([

            (object) [
                'id' => 1004,
                'service_name' => 'Filipino Barong Tagalog',
                'shop' => (object) ['shop_name' => 'Heritage Embroidery'],
                'image' => 'https://tse1.mm.bing.net/th/id/OIP.-xpB9y4dKIgUr4DDWpmmcAHaJ5?rs=1&pid=ImgDetMain&o=7&rm=3',
                'color' => 'Pineapple Fiber',
                'fabric' => 'Jusilyn',
                'created_at' => now()->subDays(20),
                'total_amount' => 6800.00,
                'payment_method' => 'GCash',
                'payment_status' => 'Paid',
                'status' => 'completed'
            ],
           
           
        ]);
    }

    public function getFilteredOrdersProperty()
    {
        return $this->orders
            ->when($this->filterStatus !== 'all', fn($q) => $q->where('status', $this->filterStatus))
            ->when($this->search, fn($q) => $q->filter(fn($order) => 
                str_contains(strtolower($order->service_name), strtolower($this->search)) ||
                str_contains(strtolower($order->shop->shop_name), strtolower($this->search)) ||
                str_contains(strtolower($order->color), strtolower($this->search)) ||
                str_contains((string)$order->id, $this->search)
            ));
    }

    public function getStatsProperty()
    {
        return [
            'all' => $this->orders->count(),
            'pending' => $this->orders->where('status', 'pending')->count(),
            'approved' => $this->orders->where('status', 'approved')->count(),
            'processing' => $this->orders->where('status', 'processing')->count(),
            'completed' => $this->orders->where('status', 'completed')->count(),
            'cancelled' => $this->orders->where('status', 'cancelled')->count(),
        ];
    }

    public function setFilter($status)
    {
        $this->filterStatus = $status;
    }

    public function review($orderId)
    {
        // Simulate review action (no backend)
        session()->flash('message', 'Review feature would open here for order #' . $orderId);
    }
    public function render()
    {
        return view('livewire.pages.public.my-order.order');
    }
}
