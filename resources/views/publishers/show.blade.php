



<div style="background-color: rgba(175, 209, 175, 0.575); text-align: center; height: 500px; padding: 2rem; mar">

@if(count($books) > 1)
<h1>So hello my name is {{$publisher->title}} and I published {{count($books)}} books!</h1>
@else 
<h1>So hello, my name is {{$publisher->title}} and I published {{count($books)}} book!</h1>
@endif

@foreach ($books as $book)
    <div style="border: 2px solid black; width: 300px; height: 350px; margin: 2rem; text-align:center; float:left"> <h1>{{ $book->title }}</h1>
    <p>{{ $book->authors }}</p>
    <img src="{{ $book->image }}">
    </div>
@endforeach

</div>