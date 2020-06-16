@extends('layouts/layout', ['title' => 'Publisher management'])

@section('content')

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

    @if($publisher->id)
        <form action="{{ route('publishers.update', [$publisher->id]) }}" method="post">
            @method('PUT')
    @else 
        <form action="{{ route('publishers.store')}}" method="post">

    @endif
        @csrf

        <label for="title">
            Title:<br>
            <input type="text" name="title" value="{{ old('title', $publisher->title) }}">
        </label>
        <br>
        <br>
        <input type="submit" value="save">

    </form>

@endsection
