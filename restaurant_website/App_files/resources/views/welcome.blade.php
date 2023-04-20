@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <h2 class="card-title fw-bold text-center mb-4">Book a Table, Savor the Moment</h2>
                    <p class="card-text text-center">Our restaurant booking web application is a game-changer for foodies and restaurateurs alike. With our platform, customers can discover new restaurants and book reservations in real-time, while restaurant owners can manage their bookings and customer relationships more efficiently. Our system also integrates with popular POS systems and provides detailed analytics to help restaurants optimize their operations. With our user-friendly interface and cutting-edge technology, we're revolutionizing the restaurant industry. Try us today and take your dining experience to the next level!</p>
                    <div class="text-center mt-5">
                        <a href="{{ route('Restaurants.index') }}" class="btn btn-primary me-2 mb-3">View All Restaurants</a>
                        @auth
                            <a href="{{ route('userReservations') }}" class="btn btn-secondary me-2 mb-3">My Reservations</a>
                        @endauth
                    
                        @auth
                            @if(Auth::user()->role == 'restaurant owner')
                                <a href="{{ route('restaurants.create') }}" class="btn btn-primary me-2 mb-3">Create Advertisements</a>
                                <a href="{{ route('userAds') }}" class="btn btn-primary me-2 mb-3">My Advertisements</a>
                                <a href="{{ route('viewBookings') }}" class="btn btn-primary mb-3">View Bookings</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-12 text-center mb-4">
            <h2 class="fw-bold">Favorites</h2>
        </div>
        <div class="col-md-4">
            <a href="{{route('Restaurant.italian') }}">
                <div class="card p-3">
                    <img src="{{ url('/images/italian.jpg') }}" class="card-img-top restaurant-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-0">Italian</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('Restaurant.mexican') }}">
                <div class="card p-3">
                    <img src="{{ url('/images/mexican.jpg') }}" class="card-img-top restaurant-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-0">Mexican</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('Restaurant.indian') }}">
                <div class="card p-3">
                    <img src="{{ url('/images/indian.jpg') }}" class="card-img-top restaurant-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-0">Indian</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-5">
    <div class="col-md-12 text-center mb-4">
        <h2 class="fw-bold">Popular Restaurants</h2>
        <p>Discover the hottest restaurants in town!</p>
    </div>
    <div class="col-md-6 col-lg-5">
        <a href="{{ route('Restaurant.popular') }}">
            <div class="card p-3">
                <img src="{{ url('/images/popular.jpg') }}" class="card-img-top restaurant-image" alt="...">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-0">Popular Restaurants</h5>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
