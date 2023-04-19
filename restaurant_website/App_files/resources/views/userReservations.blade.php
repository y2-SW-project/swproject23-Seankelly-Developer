@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center m-5">My Reservations</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Restaurant</th>
                            <th scope="col">Reservation Date & Time</th>
                            <th scope="col">Guests</th>
                            <th scope="col">Special Requests</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <th scope="row">{{ $reservation->id }}</th>
                                <td>{{ $reservation->restaurant->Name }}</td>
                                <td>{{ $reservation->reservation_time }}</td>
                                <td>{{ $reservation->number_of_guests }}</td>
                                <td>{{ $reservation->special_requests }}</td>
                                <td>
                                    <div class="btn-group mt-3" role="group" aria-label="Reservation Actions">
                                        <form id="delete-reservation-{{ $reservation->id }}" action="{{ route('reservations.destroy', $reservation) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteReservation({{ $reservation->id }})">Delete</button>
                                        </form>
                                        <a href="{{ route('reservations.edit', $reservation) }}" class="btn btn-outline-primary btn-sm ms-3">Edit</a>
                                    </div>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .col-md-12 {
        padding: 20px;
    }

    .btn-danger {
        margin-right: 5px;
    }

    .btn-primary {
        margin-top: -20px;
        margin-left: 5px;
    }
</style>
@endsection

<script>
    function deleteReservation(reservationId) {
        if (confirm("Are you sure you want to cancel this reservation?")) {
            document.getElementById('delete-reservation-' + reservationId).submit();
        }
    }
</script>
