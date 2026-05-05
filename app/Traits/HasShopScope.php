<?php

namespace App\Traits;

use App\Scopes\ShopScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait HasShopScope
{
    protected static function bootHasShopScope(): void
    {
        static::addGlobalScope(new ShopScope());

        static::creating(function (Model $model) {
            if ($model->shop_id === null) {
                $shopId = session('current_shop_id') ?? session('shop_id');

                if ($shopId === null && Auth::check()) {
                    $shopId = Auth::user()->userShops()->value('shop_id');
                }

                if ($shopId !== null) {
                    $model->shop_id = $shopId;
                }
            }
        });
    }
}
