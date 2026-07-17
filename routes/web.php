<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UtsController;

// Dashboard
Route::get('/', function () {
    return view('dashboard');
});

// Website UTS (Migrated to Blade & MVC)
Route::get('/uts', [UtsController::class, 'beranda']);
Route::get('/uts/produk', [UtsController::class, 'produk']);
Route::get('/uts/kontak', [UtsController::class, 'kontak']);
Route::get('/uts/pendaftaran', [UtsController::class, 'pendaftaran']);
Route::post('/uts/pendaftaran', [UtsController::class, 'store']);
Route::get('/uts/pendaftaran/{id}/edit', [UtsController::class, 'edit']);
Route::post('/uts/pendaftaran/{id}', [UtsController::class, 'update']);
Route::post('/uts/pendaftaran/{id}/delete', [UtsController::class, 'destroy']);

// Website UAS (Redirect to Hotel Starking Home)
Route::redirect('/uas', '/home');

// Halaman Hotel Starking
Route::get('/home', [PageController::class, 'home']);
Route::get('/kamar', [PageController::class, 'kamar']);
Route::get('/booking', [PageController::class, 'booking']);
Route::post('/booking/store', [BookingController::class, 'store']);
Route::get('/galeri', [PageController::class, 'galeri']);
Route::get('/tentang', [PageController::class, 'tentang']);
Route::get('/kontak', [PageController::class, 'kontak']);
Route::post('/kontak', [PageController::class, 'kontakSend']);

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/admin/dashboard');
    }
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes Group (Protected by Auth)
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    
    // Kamar CRUD
    Route::get('/kamar', [AdminController::class, 'rooms']);
    Route::post('/kamar', [AdminController::class, 'roomsStore']);
    Route::post('/kamar/{id}/update', [AdminController::class, 'roomsUpdate']);
    Route::post('/kamar/{id}/delete', [AdminController::class, 'roomsDestroy']);

    // Booking Manage
    Route::get('/booking', [AdminController::class, 'bookings']);
    Route::post('/booking/{id}/update-status', [AdminController::class, 'bookingsUpdateStatus']);
    Route::post('/booking/{id}/delete', [AdminController::class, 'bookingsDestroy']);

    // Fasilitas CRUD
    Route::get('/fasilitas', [AdminController::class, 'facilities']);
    Route::post('/fasilitas', [AdminController::class, 'facilitiesStore']);
    Route::post('/fasilitas/{id}/update', [AdminController::class, 'facilitiesUpdate']);
    Route::post('/fasilitas/{id}/delete', [AdminController::class, 'facilitiesDestroy']);

    // Galeri CRUD
    Route::get('/galeri', [AdminController::class, 'galleries']);
    Route::post('/galeri', [AdminController::class, 'galleriesStore']);
    Route::post('/galeri/{id}/update', [AdminController::class, 'galleriesUpdate']);
    Route::post('/galeri/{id}/delete', [AdminController::class, 'galleriesDestroy']);

    // Testimoni CRUD
    Route::get('/testimoni', [AdminController::class, 'testimonials']);
    Route::post('/testimoni', [AdminController::class, 'testimonialsStore']);
    Route::post('/testimoni/{id}/update', [AdminController::class, 'testimonialsUpdate']);
    Route::post('/testimoni/{id}/delete', [AdminController::class, 'testimonialsDestroy']);
});