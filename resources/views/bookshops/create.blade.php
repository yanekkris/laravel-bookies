@extends('layouts.layout')

@section('content')
<form action="/bookshops" method="post">
    @csrf
    <div>
        <label>Name</label><br>
        <input type="text" name="name" required>
    </div>
    <div>
        <label>City</label><br>
        <input type="text" name="city" required>
    </div>

    <div>
        <label>Available Books</label><br>
        
        <select name="books[]" id="books" multiple>
            @foreach ($books as $book)
        <option value="{{$book->id}}">{{$book->title}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Stock</label>
        <input type="text" name="stock" required>
        </div>
    <div>

    <input type="submit" value="Save">
</form>
@endsection