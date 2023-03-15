@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Menu for {{ $restaurant->Name }}</h2>
        <div class="row">
            @foreach ($menuItems as $item)
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->item_name }}</h5>
                            <p class="card-text">{{ $item->item_description }}</p>
                            <p class="card-text"><strong>${{ $item->item_price }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('reservations.create', $restaurant->id) }}" class="btn btn-primary">Book Now</a>
    </div>
@endsection
