<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuItemsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/restaurants/{id}/menu', [MenuItemsController::class, 'show'])->name('menus.show');



Route::resource('/Restaurants', 'RestaurantController');


Route::get('/restaurants', [App\Http\Controllers\RestaurantController::class, 'index'])->name('Restaurants.index');



Route::get('/reservations/{restaurant}', [App\Http\Controllers\ReservationsController::class, 'create'])
    ->name('reservations.create')
    ->middleware('auth');

Route::post('/reservations', [App\Http\Controllers\ReservationsController::class, 'store'])->name('reservations.store');








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
