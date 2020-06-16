<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;
use App\Publisher;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = json_decode(file_get_contents(storage_path('books.json')));

       //insert all the authors into db
        $authors = [];
        foreach($data as $book) {
            $authors[] = $book->author;
        }

        $unique_authors = array_unique($authors);

        foreach($unique_authors as $author){
            $new_author = new Author;

            $new_author->name = $author;

            $new_author->save();
        }
       //insert all the publishers

       //prepare a list of all authors that we can grab authors from by their names

       //prepare a list of all publishers that we grab publishers from by their names

       foreach($data as $book)
       {
           
       }
    }
}
