
@extends('layouts.layout', ['title' => 'List of publishers'])

@section ('content')

<div>
@foreach ($publishers as $publisher)
    <div>
        <h2>{{ $publisher->title }}</h2>

        @component('publishers.unordered-list')
            <ul>
                @if($publisher->books)
                    @foreach($publisher->books as $b)
                        <li>{{$b->title}}</li>
                    @endforeach
                @endif
            </ul>
        @endcomponent

        <a href="publishers/{{ $publisher->id }}"><button>Details</button></a>
    </div>  
@endforeach
</div>

@endsection