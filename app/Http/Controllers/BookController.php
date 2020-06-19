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

        $books = Book::all();

        return view('books.show', compact('book', 'books'));
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




    public function removeRelatedBook(Request $request, $book_id)
    {
        if (\Gate::allows('admin')){
            //delete the review
            $book = Book::findOrFail($book_id);

            $related_id = $request->input('related_id');
            $book->relatedBooks()->detach($related_id);
    
            //Bookshop::findOrFail(#bookshop_id)->books()->detach($request->input('book_id'));
    
            return redirect(action('BookController@show', $book->id));

        }

        return redirect()->action('BookController@show', [ $book_id ]);
        
    }
    public function addRelatedBook(Request $request, $book_id)
    {
        if (\Gate::allows('admin')){
            //delete the review
            $book = Book::findOrFail($book_id);

            $related_id = $request->input('related_id');
            $book->relatedBooks()->attach($related_id);
    
            //Bookshop::findOrFail(#bookshop_id)->books()->detach($request->input('book_id'));
    
            return redirect(action('BookController@show', $book->id));

        }

        return redirect()->action('BookController@show', [ $book_id ]);
        
    }
}
