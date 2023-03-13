@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
                    @foreach ($restaurants as $restaurant)
                    <div class="col-sm-6">
                        <div class="card">
                            <img src="{{ url('storage/restaurant.jpg') }}"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $restaurant->Name }}</h5>
                                <p class="card-text">{{ $restaurant->Cuisine }} | {{ $restaurant->County }} | {{ $restaurant->Price_range }}</p>
                                <p class="card-text">{{ $restaurant->Bio }}</p>
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
