@extends('layouts.layout', ['title' => 'Bookshop Details'])

@section('content')
    <h1>{{$bookshop->name}} - {{$bookshop->city}}</h1>
    <div class="container">
        @foreach ($bookshop->books as $b)
            <div class="container__book">
               <h1>{{$b->title}} </h1> 
               <h3>{{$b->publisher->title}}</h3>
               <form action="{{ action('BookshopController@removeBook', $bookshop->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="book_id" value="{{$b->id}}">
                    <button type="submit" class="container__book--remove">remove</button>
                </form>
            </div>
        @endforeach
    </div>
    <div>
        <form action="{{ action('BookshopController@addBook', $bookshop->id)}}" method="post">
            @csrf
            <select name="book_id" id="book_id">
                @foreach ($books as $book)
                 <option value="{{$book->id}}">{{$book->title}}</option>
                @endforeach
            </select>
            <input type="submit" value="Add">
        </form>
    </div>


    
@endsection