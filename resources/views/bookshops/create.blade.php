@extends('layouts.layout')

@section('content')
<form action="/bookshops" method="post">
    @csrf
    <input type="text" name="name" required>
    <input type="text" name="city" required>

    <div>
        <label>Available Books</label><br>
        
        <select name="books[]" id="books" multiple>
            @foreach ($books as $book)
        <option value="{{$book->id}}">{{$book->title}}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="Save">
</form>
@endsection