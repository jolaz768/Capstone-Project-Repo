<?php

namespace App\Livewire\Pages\Admin\Review;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ViewReview extends Component
{
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.review.view-review');
    }
}
