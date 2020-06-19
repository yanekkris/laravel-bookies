<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Reservation;
use App\Book;

class ReservationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id);

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $books = Book::all();
        $user = Auth::user();

        return view('reservations.create', compact('books', 'user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'book_id' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $result = Reservation::where('book_id', $request->input('book_id'))->where('from', $request->input('from'))->first();
        if(!$result){
            $reservation = new Reservation;

        $reservation->book_id = $request->input('book_id');
        $reservation->user_id = $request->input('user_id');
        $reservation->from = $request->input('from');
        $reservation->to = $request->input('to');

        $reservation->save();

        session()->flash('success_message', 'The reservations was successfully saved!');

        return redirect()->route('reservations.index');
        }

        echo "the book is reserved at that ";

        return redirect()->route('reservations.index');

    }
}
