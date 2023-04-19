@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Popular Restaurants</h1>

    <div class="row">
        @foreach($popularRestaurants as $restaurant)
        <div class="col-sm-6">
            <div class="card">
                <img src="{{ url('/images/' . $restaurant->image) }}" class="card-img-top restaurant-image" alt="...">
                <div class="card-body">
                    <h2 class="card-title">{{ $restaurant->Name }}</h2>
                    <p class="card-text">{{ $restaurant->Cuisine }} | {{ $restaurant->County }} | 
                        @for ($i = 0; $i < $restaurant->Price_range; $i++)
                            €
                        @endfor
                    </p>
                    <p class="card-text">{{ $restaurant->Bio }}</p>
                    <a href="{{ route('reservations.create', $restaurant->id) }}" class="btn btn-primary">Book Now</a>
                    <a href="{{ route('menus.show', $restaurant->id) }}" class="btn btn-secondary">View Menu</a>
                    <!-- Add a new button to view the restaurant's menu -->


                    

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
