@extends('layouts/layout', ['title' => 'List of bookshops'])

@section('content')

<h1>BookShops</h1>

@if (Session::has('success_message'))
    
<div class="alert alert-success">
    {{ Session::get('success_message') }}
</div>

@endif

@foreach($bookshops as $b)
    <div>
        <h2>{{ $b->name}}</h2>
        <p>{{ $b->city }}</p>
    </div>
    <a href="bookshops/{{ $b->id }}">See books</a>
@endforeach
<br>
<a href="{{ route('bookshops.create')}}"><button>Create New</button></a>

@endsection