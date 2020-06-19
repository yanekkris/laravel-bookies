<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;

class Book extends Model
{
    protected $table = 'books';

    public function publisher()
    {
        return $this->belongsTo('App\Publisher', 'publisher_id');
    }

    public function cartItem()
    {
        return $this->belongsTo('App\CartItem');
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }

    public function authors() 
    {
        return $this->belongsToMany(Author::class);
    }

    public function bookshops()
    {
        return $this->belongsToMany(Bookshop::class);
    }

    public function relatedBooks() 
    {
        return $this->belongsToMany(Book::class, 'related_books', 'book_id', 'related_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
