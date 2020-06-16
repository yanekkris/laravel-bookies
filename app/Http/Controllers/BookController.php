<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\Review;


class BookController extends Controller
{
    public function index(){

        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function show($book_id){

        $book = Book::findOrFail($book_id);

        return view('books.show', compact('book'));
    }

    public function create() 
    {
        return view('books.create');
    }


    public function store(Request $request) 
    {
        $book = new Book;

        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');

        $book->save();

        return redirect('/books/' . $book->id);
    }

    public function edit($book_id)
    {
        $book = Book::findOrFail($book_id);
        $book->save();
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $book_id) 
    {
        $book = Book::findOrFail($book_id);
        
        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');

        $book->save();

        return redirect('/books/' . $book->id);
    }
}
