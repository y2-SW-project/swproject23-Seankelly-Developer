@extends('layouts.app') <!-- This line extends the main layout from the app.blade.php file -->

@section('content') <!-- This section defines the content of the page -->

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
<div class="container my-5"> <!-- This container holds the content of the page -->
    <form method="POST" action="{{ route('reservations.store') }}">
        <input type="hidden" name="restaurants_id" value="{{ $restaurant->id }}">

        @csrf
    
    
        <div class="form-group">
            <label for="customer_name">Name:</label>
            <input type="text" name="customer_name" class="form-control" value="{{ Auth::user()->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="customer_email">Email:</label>
            <input type="email" name="customer_email" class="form-control" value="{{ Auth::user()->email }}" required>
        </div>
    
        <div class="form-group">
            <label for="customer_phone">Phone:</label>
            <input type="tel" name="customer_phone" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="number_of_guests">Number of Guests:</label>
            <input type="number" name="number_of_guests" class="form-control" min="1" max="10" required>
        </div>
    
        <div class="form-group">
            <label for="reservation_time">Reservation Time:</label>
            <input type="datetime-local" name="reservation_time" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="special_requests">Special Requests:</label>
            <textarea name="special_requests" class="form-control"></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Submit Reservation</button>
    </form>
    
    
</div>
<footer class="bg-dark text-light py-3"> <!-- This is the footer section of the page with a dark background color -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy; {{ date('Y') }} Restaurant Listings</p> <!-- This displays the current year and the name of the website -->
            </div>
        </div>
    </div>
</footer>
@endsection <!-- This closes the content section of the page -->