@extends('layouts.app')

@section('content')
<header class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center display-4 py-5"> There's something for everyone!</h1>
            </div>
        </div>
    </div>
</header>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach ($restaurants as $restaurant)
                    <div class="col-sm-6">
                        <div class="card">
                            <img src="{{ url('storage/viewAll.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">{{ $restaurant->Name }}</h2>
                                <p class="card-text">{{ $restaurant->Cuisine }} | {{ $restaurant->County }} | 
                                    @for ($i = 0; $i < $restaurant->Price_range; $i++)
                                        €
                                    @endfor
                                </p>
                                <p class="card-text">{{ $restaurant->Bio }}</p>
                                <a href="{{ route('reservations.create', $restaurant->id) }}" class="btn btn-primary">Book Now</a>
                                <a href="#" class="btn btn-secondary">View Menu</a> <!-- Add a new button to view the restaurant's menu -->


                                {{-- {{ route('menus.show', $restaurant->id) }} --}}

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
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
