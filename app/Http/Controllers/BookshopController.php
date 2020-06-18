<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bookshop;
use App\Book;

class BookshopController extends Controller
{
    public function index() {

        $bookshops = Bookshop::all();

        return view('bookshops.index', compact('bookshops'));
    }

    public function show($id) {

        $bookshop = Bookshop::with('books')->findOrFail($id);

        //  $bookshop = Bookshop::findOrFail($id);
        // $bookshop->load('books');


        $alreadyConnected = $bookshop->books->pluck('id');
        $books = Book::whereNotIn('id', $alreadyConnected)->get();

        return view('bookshops.show', compact('bookshop', 'books'));
    }

    public function create() 
    {
        $books = Book::all();

        return view('bookshops.create', compact('books'));
    }

    public function store(Request $request) 
    {
       

        $this->validate($request, [
            'name' => 'required|max:255',
            'city' => 'required|max:255',
        ]);

        $bookshop = new Bookshop;

        //fill the object from request
        $bookshop->name = $request->input('name');
        $bookshop->city = $request->input('city');

        //save the object
        $bookshop->save();

        $books_id = $request->input('books');
        $bookshop->books()->sync($books_id);



        //flash success message (provide it to the next request)
        session()->flash('success_message', 'The comment was successfully saved!');

        return redirect()->route('bookshops.index');


    }

    public function addBook(Request $request, $bookshop_id)
    {
        $bookshop = BookShop::findOrFail($bookshop_id);

        $book_id = $request->input('book_id');
        $bookshop->books()->attach($book_id);

        return redirect(action('BookshopController@show', $bookshop->id));
    }
    public function removeBook(Request $request, $bookshop_id)
    {
        $bookshop = BookShop::findOrFail($bookshop_id);

        $book_id = $request->input('book_id');
        $bookshop->books()->detach($book_id);

        //Bookshop::findOrFail(#bookshop_id)->books()->detach($request->input('book_id'));

        return redirect(action('BookshopController@show', $bookshop->id));
    }
}
