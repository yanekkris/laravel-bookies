@extends('layouts/layout')

@section('content')

<h1>{{ $book->title }}</h1>
<p>{{ $book->authors }}</p>
<img src="{{ $book->image }}">

@foreach ($book->reviews as $review)

    <h3>Review {{$review->id}}</h3>
    <p>{{$review->text}}</p>
    <p>{{$review->rating}}</p>

    @can('admin')

        <form action="{{ route('reviews.delete', [ $review->id ]) }}" method="post">
            @method('delete')
            @csrf
            <input type="submit" value="Delete">
        </form>

    @endcan

@endforeach

<form method="post" action="/add-to-cart">
    @csrf
    <input type="hidden" name="book_id" value="{{ $book->id}}">
    <input type="number" name="count">
   <button>Add To Cart</button>
</form>
<br>

@if (Session::has('success_message'))
    
        <div class="alert alert-success">
            {{ Session::get('success_message') }}
        </div>
    
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @auth
        <form method="post" action="/books/{{$book->id}}/review">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id}}">
            <textarea name="review" cols="30" rows="15"
            placeholder="Write some review..."></textarea>
            <input type="number" name="rating" placeholder="Rating">
        <button>Add Review</button>
        </form>

        @else

            <h1>Please log in to submit reviews</h1>

    @endauth

    @guest
        <p>You can log-in here: <a href="{{route('login')}}">Login</a></p>
    @endguest

    {{-- related books container--}}
    <div class="add__related_book">
        @can('admin')

            <form action="{{ action('BookController@addRelatedBook', $book->id)}}" method="post">
                @csrf
                <select name="related_id" id="related_id">
                    @foreach ($books as $b)
                    <option value="{{$b->id}}">{{$b->title}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Add">
            </form>

        @endcan
    </div>

    <div class="container__related_books">
        @foreach ($book->relatedBooks as $item)
            <div class="related_book">
                <div class="related_book_img">
                    <img src="{{$item->image}}" alt="">
                </div>
                <h4 class="title">{{$item->title}}</h4>
                <p>{{$item->authors}}</p>

                @can('admin')

                    <form action="{{ action('BookController@removeRelatedBook', $book->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="related_id" value="{{ $item->id}}">
                        <input type="submit" value="Delete">
                    </form>

                @endcan

            </div> 

        @endforeach

    </div>

@endsection