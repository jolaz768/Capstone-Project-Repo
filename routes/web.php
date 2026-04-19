<?php

use App\Livewire\Pages\Admin\Booking\ViewBooking;
use App\Livewire\Pages\Admin\Fabric\CreateFabric;
use App\Livewire\Pages\Admin\Fabric\EditFabric;
use App\Livewire\Pages\Admin\Fabric\ViewFabric;
use App\Livewire\Pages\Admin\Garment\CreateGarment;
use App\Livewire\Pages\Admin\Garment\EditGarment;
use App\Livewire\Pages\Admin\Garment\ViewGarment;
use App\Livewire\Pages\Admin\MeasurementTemplate\CreateMeasurementTemplate;
use App\Livewire\Pages\Admin\MeasurementTemplate\EditMeasurementTemplate;
use App\Livewire\Pages\Admin\MeasurementTemplate\ViewMeasurementTemplate;
use App\Livewire\Pages\Admin\Shop\CreateShop;
use App\Livewire\Pages\Admin\Shop\EditShop;
use App\Livewire\Pages\Admin\Shop\ViewShop;
use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;
use App\Livewire\Pages\Public\Booking\CreateBooking;
use App\Livewire\Pages\Public\Booking\EditBooking;
use App\Livewire\Pages\Public\Booking\ViewBooking as publicbooking;
use App\Livewire\Pages\Public\Index;
use App\Livewire\Pages\Public\Shop\IndexShop;
use App\Livewire\Pages\SuperAdmin\Dashboard;
use App\Livewire\Pages\SuperAdmin\Permission\CreatePermission;
use App\Livewire\Pages\SuperAdmin\Permission\EditPermission;
use App\Livewire\Pages\SuperAdmin\Permission\ViewPermission;
use App\Livewire\Pages\SuperAdmin\Role\CreateRole;
use App\Livewire\Pages\SuperAdmin\Role\EditRole;
use App\Livewire\Pages\SuperAdmin\Role\ViewRole;
use App\Livewire\Pages\SuperAdmin\User\CreateUser;
use App\Livewire\Pages\SuperAdmin\User\EditUser;
use App\Livewire\Pages\SuperAdmin\User\ViewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::prefix('auth')->group(function () {
   // auth
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login.page');
    Route::get('/register', Register::class)->name('register.page');
});

Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('index.page');
})->name('logout')->middleware('auth');
});


//public
Route::get('/',Index::class)->name('index.page');

Route::prefix('public')
// ->middleware(['auth','role:User'])
->group(function () {

//booking
Route::get('/booking-view',publicbooking::class)->name('booking.view');
Route::get('/create-booking',CreateBooking::class)->name('booking.create');
Route::get('/edit-booking/{booking}',EditBooking::class)->name('booking.edit');

//shop
Route::get('/Shop-view',IndexShop::class)->name('shop.view');

    
});

//super admin
Route::prefix('/super-admin')
// ->middleware(['auth','role:super-admin'])
->group(function () {

    Route::get('/dashboard',Dashboard::class)->name('super-admin.dashboard');

    
        Route::get('/create', CreateRole::class)->name('super-admin.role.create');
        Route::get('/edit/{role}',EditRole::class)->name('super-admin.role.edit');
        Route::get('/view-roles', ViewRole::class)->name('super-admin.role.view');

        Route::get('/user/create', CreateUser::class)->name('super-admin.user.create');
        Route::get('/user/edit/{user}', EditUser::class)->name('super-admin.user.edit');
        Route::get('/user/view', ViewUser::class)->name('super-admin.user.view');

        //permission route
        Route::get('/permission/create', CreatePermission::class)->name('super-admin.permission.create');
        Route::get('/permission/edit/{permission}', EditPermission::class)->name('super-admin.permission.edit');
        Route::get('/permission/view', ViewPermission::class)->name('super-admin.permission.view');
        
  
});

//admin
Route::prefix('/admin') //shop owner
// ->middleware(['auth','role:admin'])
->group(function () {

    //dashboard admin or shop owner
    Route::get('/dashboard',Dashboard::class)->name('admin.dashboard');

    //booking
    Route::get('/booking/view',ViewBooking::class)->name('admin.booking.view');
    Route::get('/booking/create',CreateBooking::class)->name('admin.booking.create');
    Route::get('/booking/edit/{booking}',EditBooking::class)->name('admin.booking.edit');

    //fabric
    Route::get('/fabric/view',ViewFabric::class)->name('admin.fabric.view');
    Route::get('/fabric/create',CreateFabric::class)->name('admin.fabric.create');
    Route::get('/fabric/edit/{fabric}',EditFabric::class)->name('admin.fabric.edit');

    //garment
    Route::get('/garment/view',ViewGarment::class)->name('admin.garment.view');
    Route::get('/garment/create',CreateGarment::class)->name('admin.garment.create');
    Route::get('/garment/edit/{garment}',EditGarment::class)->name('admin.garment.edit');

    //shop
    Route::get('/shop/view',ViewShop::class)->name('admin.shop.view');
    Route::get('/shop/create',CreateShop::class)->name('admin.shop.create');
    Route::get('/shop/edit/{shop}',EditShop::class)->name('admin.shop.edit');

    // MeasurementTemplate
    Route::get('/measurementtemplate/view',ViewMeasurementTemplate::class)->name('admin.measurementtemplate.view');
    Route::get('/measurementtemplate/create',CreateMeasurementTemplate::class)->name('admin.measurementtemplate.create');
    Route::get('/measurementtemplate/edit/{measurementtemplate}',EditMeasurementTemplate::class)->name('admin.measurementtemplate.edit');

});