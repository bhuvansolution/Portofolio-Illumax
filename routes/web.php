<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OurPartnerController;
use App\Http\Controllers\OurProjectController;
use App\Models\OurPartner;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/aboutus', AboutusController::class);
    Route::resource('/contact', ContactController::class);
    Route::resource('/our-partner', OurPartnerController::class);
    Route::resource('/our-project', OurProjectController::class);

    Route::resource('/gallery', GalleryController::class);
});
