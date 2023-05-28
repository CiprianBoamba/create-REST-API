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

        if($books->count() > 0){
            return response()->json([
                'status' => 200,
                'books' => $books
            ],200);
        }else {
            return response()->json([
                'status'=> 404,
                'message' => 'No record found!'
            ],404);
        }


    }

}
