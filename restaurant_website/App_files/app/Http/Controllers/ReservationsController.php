<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'number_of_guests' => 'required|integer|min:1|max:10',
            'reservation_time' => 'required|date',
            'special_requests' => 'nullable|string',
            'restaurant_id' => 'required|integer',
        ]);

        $validatedData['restaurant_id'] = $request->restaurant_id;

        Reservation::create($validatedData);

        return redirect()->route('welcome')->with('success', 'Booking sent successfully.');
    }

    public function userReservations()
    {
        $reservations = Reservation::userReservations()->get();
        return view('userReservations', compact('reservations'));
    }
    public function create(Restaurant $restaurant)
    {
        $tables = $restaurant->tables;

        return view('booking', [
            'restaurant' => $restaurant,
            'restaurant_id' => $restaurant->id,
        ]);
    }
}
