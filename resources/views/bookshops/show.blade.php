@extends('layouts.layout', ['title' => 'Bookshop Details'])

@section('content')
    <h1>{{$bookshop->name}} - {{$bookshop->city}}</h1>
    <div class="bookshop_books">
        @foreach ($bookshop->books as $b)
            <div class="bookshop_books__book">
                <div class="bookshop_books__details">
                <h3>{{$b->title}} </h3> 
                <h4>{{$b->publisher->title}}</h4>
                    <p>{{$b->pivot->stock}}</p>
                    <form action="{{ action('BookshopController@editStock', $bookshop->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="book_id" value="{{$b->id}}">
                        <input type="text" name="stock" value="{{$b->pivot->stock}}">
                        <button type="submit" class="container__book--update_stock">edit stock</button>
                    </form>

                    <form action="{{ action('BookshopController@removeBook', $bookshop->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="book_id" value="{{$b->id}}">
                        <button type="submit" class="container__book--remove">remove</button>
                    </form>
                </div>
                <div class="bookshop_books__img">
                    <img src="{{$b->image}}" alt="">
                </div>
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
            <div>
                <label>Stock</label><br>
                <input type="number" name="stock">
            </div>
            <input type="submit" value="Add">
        </form>
    </div>


    
@endsection