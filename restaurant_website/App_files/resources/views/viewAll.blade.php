@extends('layouts.app') <!-- This line extends the main layout from the app.blade.php file -->

@section('content') <!-- This section defines the content of the page -->

<header class="bg-light"> <!-- This is the header section of the page with a light background color -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center display-4 py-5"> There's something for everyone!</h1> <!-- This is the title of the page -->
            </div>
        </div>
    </div>
</header>
<div class="container my-5"> <!-- This container holds the content of the page -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <!-- This loop iterates through the $restaurants array and displays the data of each restaurant in a card -->
                @foreach ($restaurants as $restaurant)
                    <div class="col-sm-6">
                        <div class="card">
                            <img src="{{ url('storage/viewAll.jpg') }}" class="card-img-top" alt="..."> <!-- This is the image of the restaurant -->
                            <div class="card-body">
                                <h2 class="card-title">{{ $restaurant->Name }}</h2> <!-- This is the name of the restaurant -->
                                <p class="card-text">{{ $restaurant->Cuisine }} | {{ $restaurant->County }} | {{ $restaurant->Price_range }}</p> <!-- This is the cuisine, county and price range of the restaurant -->
                                <p class="card-text">{{ $restaurant->Bio }}</p> <!-- This is the bio/description of the restaurant -->
                                <a href="#" class="btn btn-primary">Book Now</a> <!-- This button is used to book the restaurant -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
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