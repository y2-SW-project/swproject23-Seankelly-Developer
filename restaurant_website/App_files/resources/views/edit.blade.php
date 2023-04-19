@extends('layouts.app')

@section('content')

<header class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center display-4 py-5">{{ $restaurant->Name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">{{ $restaurant->Cuisine }} | {{ $restaurant->County }}</p>
            </div>
        </div>
    </div>
</header>

<div class="container my-5">
    <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
        @method('PUT')
        @csrf

        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

        <div class="form-group">
            <label for="customer_name">Name:</label>
            <input type="text" name="customer_name" class="form-control" value="{{ $reservation->customer_name }}" required>
        </div>

        <div class="form-group">
            <label for="customer_email">Email:</label>
            <input type="email" name="customer_email" class="form-control" value="{{ $reservation->customer_email }}" required>
        </div>

        <div class="form-group">
            <label for="customer_phone">Phone:</label>
            <input type="tel" name="customer_phone" class="form-control" value="{{ $reservation->customer_phone }}" required>
        </div>

        <div class="form-group">
            <label for="number_of_guests">Number of Guests:</label>
            <input type="number" name="number_of_guests" class="form-control" min="1" max="10" value="{{ $reservation->number_of_guests }}" required>
        </div>

        <div class="form-group">
            <label for="reservation_time">Reservation Time:</label>
            <input type="datetime-local" name="reservation_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($reservation->reservation_time)) }}" required>
        </div>

        <div class="form-group">
            <label for="special_requests">Special Requests:</label>
            <textarea name="special_requests" class="form-control">{{ $reservation->special_requests }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Changes</button>
    </form>
</div>

<footer class="bg-dark text-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy; {{ date('Y') }} Restaurant Listings</p>
            </div>
        </div>
    </div>
</footer>

@endsection
