<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use App\Book;

class ReviewController extends Controller
{
    public function create(Request $request, $book) {

        $this->validate($request, [
            'review' => 'required | max: 255',
            'review' => 'required | between: 0, 100',
        ]);

        $review = new Review;

        $review->book_id = $request->input('book_id');
        $review->text = $request->input('review');
        $review->rating = $request->input('rating');

        $review->save();

        session()->flash('success_message', 'The comment was successfully saved!');

        return redirect('/books/' . $book );
    }

    public function delete($review_id)
    {
        if (\Gate::allows('delete_reviews')){
            //delete the review
            $review = Review::finOrFail($review_id);

            $review->delete();

            session()->flask('success_message', 'Review was deleted');

        }

        return redirect()->action('BookController@show', [ $review->book_id ]);
        
    }
}
