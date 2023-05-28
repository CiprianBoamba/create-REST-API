<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();


    if ($books->isEmpty()) {
        return response()->json([
            'status' => 200,
            'message' => 'No books found!',
            'books' => [],
        ], 200);
    }


    return response()->json([
        'status' => 200,
        'books' => $books
    ], 200);


    }

}
