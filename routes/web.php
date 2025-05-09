<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\OurPartnerController;
use App\Http\Controllers\OurPortofolioController;
use App\Http\Controllers\OurProjectController;
use App\Http\Controllers\OurServiceController;
use App\Http\Controllers\WhyChooseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard/our-portofolio/checkslug', [OurPortofolioController::class, 'checkslug']);

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::get('/change-password', 'reset')->name('reset');
    Route::post('/change-password', 'changePassword')->name('changePassword');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

Route::get('/', function () {
    return view('welcome');
});

// Home
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/homepage', HomePageController::class);
    Route::resource('/aboutus', AboutusController::class);
    Route::resource('/contact', ContactController::class);
    Route::resource('/our-partner', OurPartnerController::class);
    Route::resource('/our-project', OurProjectController::class);
    Route::resource('/our-portofolio', OurPortofolioController::class);
    Route::resource('/our-service', OurServiceController::class);
    Route::resource('/why-choose', WhyChooseController::class);
    Route::resource('/gallery', GalleryController::class);
});
