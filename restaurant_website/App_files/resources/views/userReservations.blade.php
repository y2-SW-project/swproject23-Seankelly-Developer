<!-- userReservations.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>My Reservations</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Restaurant</th>
                        
                        <th scope="col">Guests</th>
                        <th scope="col">Special Requests</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <th scope="row">{{ $reservation->id }}</th>
                        <td>{{ $reservation->restaurant->Name }}</td>
                       
                        <td>{{ $reservation->number_of_guests }}</td>
                        <td>{{ $reservation->special_requests }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
