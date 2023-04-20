@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Bookings</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Restaurant Name</th>
                    <th>Reservation Date & Time</th>
                    <th>Number of Guests</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->restaurant->Name }}</td>
                        <td>{{ $booking->reservation_time}}</td>
                        <td>{{ $booking->number_of_guests }}</td>
                        <td>
                            <form action="{{ route('acceptBooking', $booking->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        <form action="{{ route('declineBooking', $booking->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Decline</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
