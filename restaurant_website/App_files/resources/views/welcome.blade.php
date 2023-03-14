@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div>
<div class="row row-cols-1 row-cols-md-12 g-4 mt-5 col-m text-center align-items-center">
<div class="col-sm-6">
{{-- <div class="card"> --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card-body">
<h5 class="card-title fw-bold">Book a table, savor the moment</h5>
<p><br>Our restaurant booking web application is a game-changer for foodies and restaurateurs alike. With our platform, customers can discover new restaurants and book reservations in real-time, while restaurant owners can manage their bookings and customer relationships more efficiently. Our system also integrates with popular POS systems and provides detailed analytics to help restaurants optimize their operations. With our user-friendly interface and cutting-edge technology, we're revolutionizing the restaurant industry. Try us today and take your dining experience to the next level!</p>
</div>
{{-- </div> --}}
</div>
            <div class="col-sm-6">
            <div class="card">
            <a href="{{ route('Restaurants.index') }}">
            <img src="{{ url('storage/viewAll.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">View All Restaurants!</h5>
</div>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection