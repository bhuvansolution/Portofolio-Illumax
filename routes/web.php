<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OurPartnerController;
use App\Http\Controllers\OurPortofolioController;
use App\Http\Controllers\OurProjectController;
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
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/aboutus', AboutusController::class);
    Route::resource('/contact', ContactController::class);
    Route::resource('/our-partner', OurPartnerController::class);
    Route::resource('/our-project', OurProjectController::class);
    Route::resource('/our-portofolio', OurPortofolioController::class);

    Route::resource('/gallery', GalleryController::class);
});
