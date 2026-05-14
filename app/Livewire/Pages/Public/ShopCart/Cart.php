<?php

namespace App\Livewire\Pages\Public\ShopCart;


use Livewire\Component;

class Cart extends Component
{
public function getShopIdProperty()
{
    if (empty($this->cart)) {
        return null;
    }
    $firstItem = reset($this->cart);
    return $firstItem['shop_id'] ?? null;
}
     public $cart = [];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    // Called when 'addToCart' event is dispatched
    public function addToCart($garmentId, $name, $price, $image = null)
    {
        if (isset($this->cart[$garmentId])) {
            $this->cart[$garmentId]['quantity']++;
        } else {
            $this->cart[$garmentId] = [
                'id' => $garmentId,
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'quantity' => 1,
            ];
        }
        $this->saveCart();
    }

    public function removeFromCart($garmentId)
    {
        unset($this->cart[$garmentId]);
        $this->saveCart();
    }

    public function updateQuantity($garmentId, $quantity)
    {
        if ($quantity < 1) {
            $this->removeFromCart($garmentId);
            return;
        }
        $this->cart[$garmentId]['quantity'] = $quantity;
        $this->saveCart();
    }

    public function clearCart()
    {
        $this->cart = [];
        session()->forget('cart');
    }

    public function checkoutCart()
    {
        if (empty($this->cart)) {
            session()->flash('error', 'Your cart is empty.');
            return;
        }

        $serviceIds = array_unique(array_filter(array_column($this->cart, 'service_id')));
        $serviceId = count($serviceIds) === 1 ? reset($serviceIds) : null;

        session()->put('booking_cart_data', [
            'shop_id'   => $this->shopId,
            'garments'  => $this->cart,
            'service_id'=> $serviceId,
        ]);

        return redirect()->route('booking.create', ['id' => $this->shopId, 'from_cart' => true]);
    }

    private function saveCart()
    {
        session()->put('cart', $this->cart);
    }

    // Helper for total items count
    public function getTotalCountProperty()
    {
        return collect($this->cart)->sum('quantity');
    }

    // Helper for total price
    public function getTotalPriceProperty()
    {
        return collect($this->cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    }
    public function render()
    {
        return view('livewire.pages.public.shop-cart.cart');
    }
}
