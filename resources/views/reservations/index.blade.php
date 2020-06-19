@extends('layouts/layout', ['title' => 'Reservations'])

@section('content')
    @if (Session::has('success_message'))
    
        <div class="alert alert-success">
            {{ Session::get('success_message') }}
        </div>
    
    @endif

    <table class="table table-striped">
        @foreach ($reservations as $reservation)
            <tr>
                <th>{{$reservation->book->title}}</th>
                <th>{{$reservation->user_id}}</th>
                <th>{{$reservation->from}}</th>
                <th>{{$reservation->to}}</th>
            </tr>
            <a href="{{action('ReservationController@delete')}}">X</a>
        @endforeach
    </table>

@endsection
