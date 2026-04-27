<?php

use App\Livewire\Pages\Admin\Booking\ViewBooking;
use App\Livewire\Pages\Admin\Dashboard as OwnerDashboard;
use App\Livewire\Pages\Admin\Fabric\Color\CreateColor;
use App\Livewire\Pages\Admin\Fabric\Color\EditColor;
use App\Livewire\Pages\Admin\Fabric\Color\ViewColor;
use App\Livewire\Pages\Admin\Fabric\CreateFabric;
use App\Livewire\Pages\Admin\Fabric\EditFabric;
use App\Livewire\Pages\Admin\Fabric\ViewFabric;
use App\Livewire\Pages\Admin\Garment\CreateGarment;
use App\Livewire\Pages\Admin\Garment\EditGarment;
use App\Livewire\Pages\Admin\Garment\ViewGarment;
use App\Livewire\Pages\Admin\MeasurementField\CreateMeasurementField;
use App\Livewire\Pages\Admin\MeasurementField\EditMeasurementField;
use App\Livewire\Pages\Admin\MeasurementField\ViewMeasurementField;
use App\Livewire\Pages\Admin\MeasurementTemplate\CreateMeasurementTemplate;
use App\Livewire\Pages\Admin\MeasurementTemplate\EditMeasurementTemplate;
use App\Livewire\Pages\Admin\MeasurementTemplate\ViewMeasurementTemplate;
use App\Livewire\Pages\Admin\Review\ViewReview;
use App\Livewire\Pages\Admin\Service\CreateService;
use App\Livewire\Pages\Admin\Service\EditService;
use App\Livewire\Pages\Admin\Service\ViewService;
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
use App\Livewire\Pages\Public\Shop\Pricing;
use App\Livewire\Pages\Public\Shop\Review;
use App\Livewire\Pages\Public\Shop\ShopService;
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
->middleware(['auth','role:customer'])
->group(function () {

//booking
Route::get('/booking-view',publicbooking::class)->name('booking.view');
Route::get('/create-booking',CreateBooking::class)->name('booking.create');
Route::get('/edit-booking/{booking}',EditBooking::class)->name('booking.edit');

//shop
Route::get('/Shop-view',IndexShop::class)->name('shop.view');

//Shop  Pricing
Route::get('/shop/pricing',Pricing::class)->name('shop.pricing');

//Shop  Review
 Route::get('/shop/review',Review::class)->name('shop.review');

//
Route::get('/shop/service',ShopService::class)->name('shop.service');
    

    
});

//super admin
Route::prefix('/super-admin')
->middleware(['auth','role:super-admin'])
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
->middleware(['auth','role:admin'])
->group(function () {

    //dashboard admin or shop owner
    Route::get('/dashboard',OwnerDashboard::class)->name('admin.dashboard');

    //booking
    Route::get('/booking/view',ViewBooking::class)->name('admin.booking.view');
    Route::get('/booking/create',CreateBooking::class)->name('admin.booking.create');
    Route::get('/booking/edit/{booking}',EditBooking::class)->name('admin.booking.edit');

    //fabric and colors
    Route::get('/fabric/view',ViewFabric::class)->name('admin.fabric.view');
    Route::get('/fabric/create',CreateFabric::class)->name('admin.fabric.create');
    Route::get('/fabric/edit/{id}',EditFabric::class)->name('admin.fabric.edit');

    Route::get('/color/view',ViewColor::class)->name('admin.color.view');
    Route::get('/color/create',CreateColor::class)->name('admin.color.create');
    Route::get('/color/edit/{color}',EditColor::class)->name('admin.color.edit');

    

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

    //MeasurementField
    Route::get('/measurementfield/view',ViewMeasurementField::class)->name('admin.measurementfield.view');
    Route::get('/measurementfield/create',CreateMeasurementField::class)->name('admin.measurementfield.create');
    Route::get('/measurementfield/edit/{measurementfield}',EditMeasurementField::class)->name('admin.measurementfield.edit');

    //Reviews
    Route::get('/review/view',ViewReview::class)->name('admin.review.view');

    //service
    Route::get('/service/view',ViewService::class)->name('admin.service.view');
    Route::get('/service/create',CreateService::class)->name('admin.service.create');
    Route::get('/service/edit',EditService::class)->name('admin.service.edit');


});