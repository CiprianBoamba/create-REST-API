<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
    
        $response = [
            'status' => Response::HTTP_OK,
            'books' => $books,
        ];
    
        if ($books->isEmpty()) {
            $response['message'] = 'No books found!';
        }
    
        return response()->json($response, Response::HTTP_OK);
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
 * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If book not found
 */
    public function show($id)
    {
        

        try {
            $book = Book::findOrFail($id);

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => $book
            ],Response::HTTP_OK);
            
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'No book was found!'
            ], Response::HTTP_NOT_FOUND);
        }

    }


/**
 * Edit the specified book.
 *
 * @param  int  $id
 * @return \Illuminate\Http\JsonResponse
 */
    
    public function edit($id)
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


    /**
 * Update the specified book in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\JsonResponse
 */

    public function update(Request $request, int $id)
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

            $book = Book::find($id);

        if($book){


            
            $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'genres' => $request->genres,
                'published_year' => $request->published_year
            ]);

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


    /**
 * Delete the specified book from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\JsonResponse
 */
    public function destroy($id)
    {
        $book = Book::find($id);

        if($book){
            $book->delete($id);
            return response()->json([
                'status' => 200,
                'message' => 'Book Deleted succesfully'
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No book was found!'
            ], 404);
        }
    }




}
