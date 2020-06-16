<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartItem;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::all();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request) 
    {
        $cartItem = new CartItem;

        $cartItem->book_id = $request->input('book_id');
        $cartItem->count = $request->input('count');

        $cartItem->save();

        return redirect('/cart');
    }

    public function minus($cart_id) 
    {
        $cartItems = CartItem::all();

        foreach($cartItems as $cartItem)
        {
            if($cartItem->id == $cart_id )
            {
                $cartItem->count -= 1;
                $cartItem->save();
        
                return redirect('/cart');
            }
        }
    }
}
