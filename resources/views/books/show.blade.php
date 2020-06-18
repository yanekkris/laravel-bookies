@extends('layouts/layout')

@section('content')

<h1>{{ $book->title }}</h1>
<p>{{ $book->authors }}</p>
<img src="{{ $book->image }}">

@foreach ($book->reviews as $review)

    <h3>Review {{$review->id}}</h3>
    <p>{{$review->text}}</p>
    <p>{{$review->rating}}</p>

    @can('delete_reviews')

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
</>

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
        
        <p>
        You can log-in here: <a href="{{route('login')}}">Login</a>
        </p>
    @endguest

@endsection