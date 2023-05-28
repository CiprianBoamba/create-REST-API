<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{


/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\JsonResponse
 */
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


    /**
 * Store a newly created book in the database.
 *
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\JsonResponse
 */

    public function store(Request $request)
    {
            $validator = Validator::make($request->all(),[
                'title' => 'required|string|max:191',
                'author' => 'required|string|max:191',
                'genres' => 'required|string|max:191',
                'published_year' => 'required|digits:4|before_or_equal:' . now()->year,
            ]);

            if($validator->fails()){

                return response()->json([
                    'status' => 422,
                    'errors' => $validator->messages()
                ], 422);
            } else {
                $book=Book::create([
                    'title' => $request->title,
                    'author' => $request->author,
                    'genres' => $request->genres,
                    'published_year' => $request->published_year
                ]);
            }

            if($book){
                return response()->json([
                    'status' => 200,
                    'message' => 'Created Successfully!'
                ], 200);
            }else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong!'
                ], 500);
            }
    }

/**
 * Display the specified book.
 *
 * @param  int  $id
 * @return \Illuminate\Http\JsonResponse
 */
    public function show($id)
    {
        $book = Book::find($id);

        if($book){
            return response()->json([
                'status' => 200,
                'book' => $book
            ],200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'No book was found!'
            ], 404);
        }

    }




}
