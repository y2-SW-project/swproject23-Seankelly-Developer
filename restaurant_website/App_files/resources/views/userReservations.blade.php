@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>My Reservations</h1>
            <table class="table">
                <thead>
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
                                <div class="btn-group" role="group" aria-label="Reservation Actions">
                                    <form id="delete-reservation-{{ $reservation->id }}" action="{{ route('reservations.destroy', $reservation) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="deleteReservation({{ $reservation->id }})">Cancel</button>
                                    </form>
                                    <a href="{{ route('reservations.edit', $reservation) }}" class="btn btn-primary">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>
@endsection

<script>
function deleteReservation(reservationId) {
    if (confirm("Are you sure you want to cancel this reservation?")) {
        document.getElementById('delete-reservation-' + reservationId).submit();
    }
}
</script>
