<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Carbon\Carbon;



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

        // Get the authenticated user
        $user = auth()->user();

        // If the user is authenticated, set the user_id field on the reservation
        if ($user) {
            $validatedData['user_id'] = $user->id;
        }


        Reservation::create($validatedData);
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('userReservations')->with('success', 'Reservation cancelled successfully.');
    }





    public function userReservations()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Check if the user is logged in
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your reservations.');
        }

        // Retrieve all reservations for the authenticated user
        $reservations = Reservation::where('user_id', $user->id)->get()->map(function ($reservation) {
            $reservation->reservation_time = Carbon::parse($reservation->reservation_time)->format('Y-m-d H:i:s');
            return $reservation;
        });

        // Debugging: check if any reservations were found
        if ($reservations->isEmpty()) {
            dd('No reservations found for user ' . $user->id);
        }

        return view('userReservations', compact('reservations'));
    }




    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $restaurant = Restaurant::findOrFail($reservation->restaurant_id);
        return view('edit', compact('reservation', 'restaurant'));
    }


    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'number_of_guests' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:255',
        ]);

        $reservation->number_of_guests = $request->input('number_of_guests');
        $reservation->special_requests = $request->input('special_requests');

        $reservation->save();

        return redirect()->route('userReservations')->with('success', 'Reservation updated successfully.');
    }

    public function cancel(Reservation $reservation)
    {
        $reservation->status = 'cancelled';
        $reservation->save();

        return redirect()->route('userReservations')->with('success', 'Reservation cancelled successfully.');
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
