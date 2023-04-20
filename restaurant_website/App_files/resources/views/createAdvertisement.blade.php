@extends('layouts.app')

@section('content')

<header class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center display-4 py-5">Create Advertisement</h1>
            </div>
        </div>
    </div>
</header>

<div class="container my-5">
    <form method="POST" action="{{ route('restaurants.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="Name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="Name" name="Name" required>
        </div>

        <div class="mb-3">
            <label for="Cuisine" class="form-label">Cuisine:</label>
            <input type="text" class="form-control" id="Cuisine" name="Cuisine" required>
        </div>

        <div class="mb-3">
            <label for="County" class="form-label">County:</label>
            <input type="text" class="form-control" id="County" name="County" required>
        </div>

        <div class="mb-3">
            <label for="Rating" class="form-label">Rating:</label>
            <select class="form-control" id="Rating" name="Rating" required>
                <option value="1">1 star</option>
                <option value="2">2 stars</option>
                <option value="3">3 stars</option>
                <option value="4">4 stars</option>
                <option value="5">5 stars</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="Bio" class="form-label">Bio:</label>
            <textarea class="form-control" id="Bio" name="Bio" required></textarea>
        </div>

        <div class="mb-3">
            <label for="Price_range" class="form-label">Price range:</label>
            <select class="form-control" id="Price_range" name="Price_range" required>
                <option value="1">Low</option>
                <option value="2">Moderate</option>
                <option value="3">High</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="location_id">Location:</label>
            <select name="Location_id" class="form-control">
                <option value="">-- Select Location --</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->state }}</option>
                @endforeach
            </select>
            
        </div>
        
        

        <button type="submit" class="btn btn-primary">Create Advertisement</button>
    </form>
</div>

@endsection
