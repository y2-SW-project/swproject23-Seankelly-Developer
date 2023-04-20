<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuItemsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationsController;
use Illuminate\Support\Facades\Route;


Route::get('/italian', [RestaurantController::class, 'italian'])->name('Restaurant.italian');

Route::get('/indian', [RestaurantController::class, 'indian'])->name('Restaurant.indian');
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


//HERE
Route::get('/popular', [App\Http\Controllers\RestaurantController::class, 'popular'])->name('Restaurant.popular');




Route::get('/restaurants/{id}/menu', [MenuItemsController::class, 'show'])->name('menus.show');

Route::get('/mexican', [RestaurantController::class, 'mexican'])->name('Restaurant.mexican');



Route::get('/search', 'App\Http\Controllers\RestaurantController@search')->name('search');

// web.php

Route::get('/reservations/{reservation}/edit', [ReservationsController::class, 'edit'])->name('reservations.edit');
Route::put('/reservations/{reservation}', [ReservationsController::class, 'update'])->name('reservations.update');
Route::delete('/reservations/{reservation}', [ReservationsController::class, 'destroy'])->name('reservations.destroy');


// web.php

Route::get('/reservations/user', function () {
    $reservations = \App\Models\Reservation::userReservations();
    return view('userReservations', compact('reservations'));
})->name('userReservations');


Route::resource('restaurants', RestaurantController::class);


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

Route::post('/restaurants', [RestaurantController::class, 'store'])->name('restaurants.store');
