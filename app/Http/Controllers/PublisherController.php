<?php

namespace App\Http\Controllers;


use App\Publisher;
use App\Book;

use Illuminate\Http\Request;

use DB;

class PublisherController extends Controller
{   
    public function index()
    {
        $publishers = Publisher::with('books')->get();



        return view('publishers.index', compact('publishers'));
    }

    public function show($publisher_id)
    {
        $publisher = Publisher::findOrFail($publisher_id);

        $books = Book::where('publisher_id', $publisher_id)->get();

        // $books = Book::where('publisher_id', $publisher_id)->get();

        // return count($publishing);


        return view('publishers.show', compact('publisher', 'books'));
        
    }

    public function create()
    {
        $publisher = new Publisher;

        return view('publishers.edit', compact('publisher'));

    }

    public function store(Request $request)
    {
        //validates the request
        $this->validate($request, [
            'title' => 'required',
        ]);

        //prepare empty object
        $publisher = new Publisher;

        //fill the object from request
        $publisher->title = $request->input('title');

        //save the object
        $publisher->save();

        //flash success message (provide it to the next request)
        session()->flash('success_message', 'The comment was successfully saved!');

        return redirect()->route('publishers.edit', [$publisher->id]);
    }

    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);

        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, $id)
    {
        //validates the request
        $this->validate($request, [
            'title' => 'required',
        ]);
        //get the object to be updated from database
        $publisher = Publisher::findOrFail($id);

        //fill the object from request
        $publisher->title = $request->input('title');

        //save the object
        $publisher->save();

        //flash success message (provide it to the next request)
        session()->flash('success_message', 'The comment was successfully saved!');

        return redirect()->route('publishers.edit', [$publisher->id]);
    }
}
