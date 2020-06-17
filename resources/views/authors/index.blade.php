@extends('layouts/layout')

@section('content')

    <h1>List of authors</h1>

    <div class="list-of-authors">
        @foreach ($authors as $author)
            <div class="list-of-authors__author">
                <h2>{{$author->name}}</h2>

                <ul>
                    @foreach ($author->books as $book)

                        <li>
                            <h3>{{$book->title}}</h3>
                            <img src="{{$book->image}}" alt="">
                        </li>
                        
                    @endforeach
                </ul>

            </div>
            
        @endforeach
    </div>
    
@endsection