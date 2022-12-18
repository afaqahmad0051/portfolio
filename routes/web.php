<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\SliderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('user.index');
})->name('user.dashboard');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','profile')->name('admin.profile');
    Route::get('/edit/profile','EditProfile')->name('edit.profile');
    Route::post('/update/profile','StoreProfile')->name('store.profile');
    
    Route::get('/change/password','ChangePassword')->name('change.password');
    Route::post('/update/password','UpdatePassword')->name('update.password');
});

Route::controller(SliderController::class)->group(function () {
    Route::get('/home/slide','HomeSlider')->name('home.slide');
    Route::post('/update/slider/{id}','UpdateSlider')->name('update.slider');
});

Route::controller(AboutController::class)->group(function () {
    Route::get('/aboutme','about')->name('about');
    Route::post('/update/about/{id}','UpdateAbout')->name('update.about');
    Route::get('/about','HomeAbout')->name('home.about');
    Route::get('/about/images','AboutMultiImage')->name('about.images');
    Route::post('/store/about/images','StoreMultiImage')->name('store.about.images');
    Route::get('/all/about/images','AllMultiImage')->name('about.all.images');
    Route::get('/edit/about/images/{id}','EditMultiImage')->name('edit.about.images');
    Route::post('/update/about/images/{id}','UpdateMultiImage')->name('update.about.images');
    Route::get('/delete/about/images/{id}','DeleteMultiImage')->name('delete.about.images');
});

Route::controller(PortfolioController::class)->group(function () {
    Route::get('/portfolio','portfolio')->name('portfolio');
    Route::get('/portfolio/add','Addportfolio')->name('add.portfolio');
    Route::get('/portfolio/store','StorePortfolio')->name('store.portfolio');
    // Route::post('/update/about/{id}','UpdateAbout')->name('update.about');
    // Route::get('/about','HomeAbout')->name('home.about');
    // Route::get('/about/images','AboutMultiImage')->name('about.images');
    // Route::post('/store/about/images','StoreMultiImage')->name('store.about.images');
    // Route::get('/all/about/images','AllMultiImage')->name('about.all.images');
    // Route::get('/edit/about/images/{id}','EditMultiImage')->name('edit.about.images');
    // Route::post('/update/about/images/{id}','UpdateMultiImage')->name('update.about.images');
    // Route::get('/delete/about/images/{id}','DeleteMultiImage')->name('delete.about.images');
});

require __DIR__.'/auth.php';
