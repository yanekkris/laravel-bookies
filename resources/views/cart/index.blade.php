<h1>Cart</h1>

@foreach($cartItems as $cartItem)
    <div style="margin: 4rem 0">
        <h2>{{$cartItem->book->title}}</h2>
        @if($cartItem->book->publisher)
            <p>Publisher: {{$cartItem->book->publisher->title}}</p>
        @endif
        <p>Quantity : {{$cartItem->count}}</p>
        <a href="cart/{{ $cartItem->id }}/minus"><button>I want less of them!</button></a>
    </div>
@endforeach