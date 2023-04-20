@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Advertisement</h1>
        <form method="POST" action="{{ route('restaurants.update', $restaurant->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" class="form-control" id="Name" name="Name" value="{{ $restaurant->Name }}">
            </div>
            <div class="form-group">
                <label for="County">County:</label>
                <input type="text" class="form-control" id="County" name="County" value="{{ $restaurant->County }}">
            </div>
            <div class="form-group">
                <label for="Bio">Bio:</label>
                <textarea class="form-control" id="Bio" name="Bio">{{ $restaurant->Bio }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
