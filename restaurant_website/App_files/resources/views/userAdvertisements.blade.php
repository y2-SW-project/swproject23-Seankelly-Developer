@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Advertisements</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>County</th>
                    <th>Bio</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->Name }}</td>
                        <td>{{ $restaurant->County }}</td>
                        <td>{{ $restaurant->Bio }}</td>
                        <td><img src="{{ $restaurant->image }}" width="100" height="100"></td>
                        <td>
                            <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
                                <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
