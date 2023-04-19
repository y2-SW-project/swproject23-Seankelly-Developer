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
    <form method="POST" action="{{ route('reservations.store') }}" class="row g-3">
        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
        @csrf
    
        <div class="col-md-6">
            <label for="customer_name" class="form-label">Name:</label>
            <input type="text" name="customer_name" class="form-control" value="{{ Auth::user()->name }}" required>
        </div>
        
        <div class="col-md-6">
            <label for="customer_email" class="form-label">Email:</label>
            <input type="email" name="customer_email" class="form-control" value="{{ Auth::user()->email }}" required>
        </div>
    
        <div class="col-md-6">
            <label for="customer_phone" class="form-label">Phone:</label>
            <input type="tel" name="customer_phone" class="form-control" required>
        </div>
    
        <div class="col-md-6">
            <label for="number_of_guests" class="form-label">Number of Guests:</label>
            <input type="number" name="number_of_guests" class="form-control" min="1" max="10" required>
        </div>
    
        <div class="col-md-6">
            <label for="reservation_time" class="form-label">Reservation Time:</label>
            <input type="datetime-local" name="reservation_time" class="form-control" required>
        </div>
    
        <div class="col-md-6">
            <label for="special_requests" class="form-label">Special Requests:</label>
            <textarea name="special_requests" class="form-control"></textarea>
        </div>
    
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Submit Reservation</button>
        </div>
    </form>
</div>


@endsection
