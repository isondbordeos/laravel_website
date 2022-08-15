<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Home\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::controller(DemoController::class)->group(function(){
    //Naming the route
    Route::get('/about', 'index')->name('about.page')->middleware('check');
    Route::get('/contact', 'contactMethod')->name('contact.page');
});

// Admin All Route
Route::middleware('auth')->group(function () {
    Route::controller(AdminController::class)->group(function(){
        //Naming the route
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/admin/edit', 'edit')->name('admin.edit');
        Route::put('/admin/update', 'update')->name('admin.update');
        Route::get('/admin/password', 'changePassword')->name('admin.change_password');
        Route::put('/admin/update/password', 'updatePassword')->name('admin.update_password');
    });

    Route::controller(HomeController::class)->group(function(){
        //Naming the route
        Route::get('/home/slide', 'viewSlider')->name('home.slider');
        Route::post('/home/add/slider', 'storeSlider')->name('home.add_slider');
        Route::put('/home/update/slider/{slider}', 'updateSlider')->name('home.update_slider');
    });
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->middleware('auth', 'verified')->name('dashboard');

require __DIR__.'/auth.php';
