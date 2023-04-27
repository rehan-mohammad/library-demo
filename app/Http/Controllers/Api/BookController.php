<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the Books for API.
     */
    public function index()
    {
        return BookResource::collection(Book::paginate(25));
    }

}
