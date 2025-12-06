<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Customer\BookingController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Customer\HelpController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Public room browsing
Route::prefix('rooms')->name('rooms.')->group(function () {
    Route::get('/', [RoomController::class, 'index'])->name('index');
    Route::get('/{roomType}', [RoomController::class, 'show'])->name('show');
});

// Customer routes (authenticated)
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/help', [HelpController::class, 'index'])->name('help');
});

// Temporary booking routes outside auth for testing
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/bookings/create/{roomType?}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{reservation}', [BookingController::class, 'show'])->name('bookings.show');
});

// Admin routes
Route::middleware(['auth', 'role:admin|super_admin|receptionist'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('room-types', RoomTypeController::class);
    Route::resource('rooms', AdminRoomController::class);
    Route::resource('facilities', FacilityController::class);
    Route::resource('reservations', ReservationController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('users', UserController::class);
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});
