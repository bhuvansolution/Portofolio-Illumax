<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryPageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\OurPartnerController;
use App\Http\Controllers\OurPortofolioController;
use App\Http\Controllers\OurProjectController;
use App\Http\Controllers\OurServiceController;
use App\Http\Controllers\PortofolioPageController;
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


Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/services', 'services');
    Route::get('/aboutus', 'aboutus');
    Route::get('/contacts', 'contacts');
    Route::get('/portfolio', 'portofolio');
    Route::get('/gallery', 'gallery');
});

// Home
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/our-partner', OurPartnerController::class);
    // our partner
    Route::get('/our-partner/change-status/{id}/{status}', [OurPartnerController::class, 'changeStatus'])->name('partner.status');
    // our project
    Route::resource('/our-project', OurProjectController::class);
    Route::get('/our-project/change-status/{id}/{status}', [OurProjectController::class, 'changeStatus'])->name('project.status');
    // our portfolio
    Route::resource('/our-portofolio', OurPortofolioController::class);
    Route::get('/our-portofolio/change-status/{id}/{status}', [OurPortofolioController::class, 'changeStatus'])->name('portofolio.status');
    // why choose
    Route::resource('/why-choose', WhyChooseController::class);
    // Gallery
    Route::resource('/gallery', GalleryController::class);
    Route::get('/gallery/change-status/{id}/{status}', [GalleryController::class, 'changeStatus'])->name('gallery.status');
    // Home Page
    Route::get('/homepage', [HomePageController::class, 'index']);
    Route::put('/homepage/{id}', [HomePageController::class, 'update']);
    // Home Page
    Route::get('/our-service', [OurServiceController::class, 'index']);
    Route::put('/our-service/{id}', [OurServiceController::class, 'update']);
    // contact Page
    Route::get('/contact', [ContactController::class, 'index']);
    Route::put('/contact/{id}', [ContactController::class, 'update']);
    // About Us Page
    Route::get('/aboutus', [AboutusController::class, 'index']);
    Route::put('/aboutus/{id}', [AboutusController::class, 'update']);
    // Gallery Page
    Route::get('/gallerypage', [GalleryPageController::class, 'index']);
    Route::put('/gallerypage/{id}', [GalleryPageController::class, 'update']);
    // Porto Page
    Route::get('/portofolio-page', [PortofolioPageController::class, 'index']);
    Route::put('/portofolio-page/{id}', [PortofolioPageController::class, 'update']);
});
