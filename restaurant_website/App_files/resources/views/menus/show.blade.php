@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center mb-4">Menu for {{ $restaurant->Name }}</h2>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach ($menuItems as $item)
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $item->item_name }}</h5>
          <p class="card-text">{{ $item->item_description }}</p>
          <p class="card-text"><strong>Price: ${{ $item->item_price }}</strong></p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="text-center mt-4">
    <a href="{{ route('reservations.create', $restaurant->id) }}" class="btn btn-lg btn-primary">Book Now</a>
  </div>
</div>
@endsection
