<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class ShopScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $currentShopId = session('current_shop_id') ?? session('shop_id');

        if ($currentShopId === null && Auth::check()) {
            $currentShopId = Auth::user()->userShops()->value('shop_id');
        }

        if ($currentShopId !== null) {
            $builder->where('shop_id', $currentShopId);
        }
    }
}
