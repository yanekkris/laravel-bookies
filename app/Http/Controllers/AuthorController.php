<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Author;

class AuthorController extends Controller
{
    public function index() {

        $query = DB::table('authors'); // from 'authors'

        $query = Author::query(); // from 'authors'


        if(isset($page_nr) && $page_nr = 2){
            $query->offset(10);
        }

        $query->limit(10);

        $query->where('name', 'like', 'George%');

        $results = $query->get();

        $authors = Author::query()
            ->with('books')
            ->limit(10)
            ->where('name', 'like', 'George%')
            ->get();

        $results = Author::query()
            ->with('books')
            ->limit(10)
            ->where('name', 'like', 'George%')
            ->count();

        dd($results);


        return view('authors.index', compact('authors'));
    }
}
