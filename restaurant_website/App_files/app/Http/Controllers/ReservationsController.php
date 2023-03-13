<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'table_id' => '1',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:255',
            'number_of_guests' => 'required|integer|min:1|max:10',
            'reservation_time' => 'required|date',
            'special_requests' => 'nullable|string',
        ]);

        Reservation::create($validatedData);

        return redirect()->back()->with('success', 'Reservation created successfully.');
    }
    public function create()
    {
        return view('booking');
    }
}
