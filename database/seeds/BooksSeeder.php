<?php

use Illuminate\Database\Seeder;

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

       foreach($data as $book)
       {
            // insert a record into the books table
       }
    }
}
