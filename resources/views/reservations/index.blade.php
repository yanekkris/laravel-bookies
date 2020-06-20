@extends('layouts/layout', ['title' => 'Reservations'])

@section('content')
    @if (Session::has('success_message'))
    
        <div class="alert alert-success">
            {{ Session::get('success_message') }}
        </div>
    
    @endif

    <table class="table table-striped">
        <tr>
            <th>Book</th>
            <th>User</th>
            <th>From</th>
            <th>To</th>
        </tr>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->book->title }}</td>
                <td>{{ $reservation }}</td>
                <td>{{ $reservation->from }}</td>
                <td>{{ $reservation->to }}</td>
            </tr>
            {{-- <a href="{{action('ReservationController@delete')}}">X</a> --}}
        @endforeach
    </table>

@endsection
