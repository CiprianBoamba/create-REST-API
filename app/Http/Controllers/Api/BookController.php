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
                    'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                    'errors' => $validator->messages()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
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
                    'status' => Response::HTTP_OK,
                    'message' => 'Created Successfully!'
                ], Response::HTTP_OK);
            }else {
                return response()->json([
                    'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => 'Something went wrong!'
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
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

       
    if($validator->fails()) {
        return response()->json([
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'errors' => $validator->messages()
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    try {
        $book = Book::findOrFail($id);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'genres' => $request->genres,
            'published_year' => $request->published_year
        ]);

        return response()->json([
            'status' => Response::HTTP_OK,
            'book' => $book
        ], Response::HTTP_OK);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'No book was found!'
        ], Response::HTTP_NOT_FOUND);
    }


    }


    /**
 * Delete the specified book from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\JsonResponse
  * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If book not found
 */
    public function destroy($id)
    {
       try {
        $book = Book::findOrFail($id);

        $book->delete();

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Book Deleted successfully!'
        ], Response::HTTP_OK);
       } catch (ModelNotFoundException $e) {

        return response()->json([
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'No book was found!'
        ], Response::HTTP_NOT_FOUND);
    }
    }




}
