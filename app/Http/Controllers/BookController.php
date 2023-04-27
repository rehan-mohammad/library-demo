<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the Books.
     */
    public function index()
    {

        $userLibrary = Auth::user()->getAttributeValue('book_id');

        // get all the books
        $books = Book::where('library_id', $userLibrary);

        // load the view and pass the books
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new Book.
     *
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created Book in storage.
     *
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
        ]);
        $book = Book::create($validatedData);

        return view('books.index')->with('success', 'Book is successfully saved');
    }

    /**
     * Show the form for editing the specified Book.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified Book in storage.
     *
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
        ]);
        Book::whereId($id)->update($validatedData);

        return view('books.index')->with('success', 'Book is successfully updated');

    }

    /**
     * Remove the specified Book from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return view('books.index')->with('success', 'Book is successfully deleted');
    }

    /**
     * Borrow a book.
     */
    public function borrow($id)
    {

        $userId = Auth::id();

        $book = Book::whereId($id);

        //Check if the book is available
        if(!$book->is_available){
            return view('books.index')->withErrors(['Book is not available']);
        }

        //Assign the book to the current user and set it as unavailable
        $book->user_id = $userId;
        $book->is_available = 0;
        $book->save();

        return view('books.index')->with('success', 'Book has been borrowed');
    }
}
