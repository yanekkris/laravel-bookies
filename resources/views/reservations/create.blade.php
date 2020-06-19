@extends('layouts/layout', ['title' => 'New Reservation'])

@section('content')

<form action="{{action('ReservationController@store')}}" method="post">
    @csrf
        <div>
            <label>
                {{$user->name}}<br>
                <input type="hidden" name="user_id" value="{{$user->id}}">
            </label>
        </div>
        <div>
            <label>
                Book <br>
              <select name="book_id" id="book_id">
                  @foreach ($books as $book)
                    <option value="{{$book->id}}">{{$book->title}}</option>
                  @endforeach
              </select>
            </label>
        </div>
        <div>
            <label>
                From <br>
                <input type="date" name="from">
            </label>
        </div>
        <div>
            <label>
                To <br>
                <input type="date" name="to">
            </label>
        </div>
        <div>
          <input type="submit" value="Save">
        </div>

    </form>
    
@endsection