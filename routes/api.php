<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Define a GET route for the URL /books
Route::get('books',[BookController::class, 'index'] );

// Define a POST route for the URL /books
Route::post('books',[BookController::class, 'store'] )
;
// Define a GET route for the URL /books/{id}
Route::get('books/{id}',[BookController::class, 'show'] );


// Define a PUT route for the URL /books/{id}
Route::put('books/{id}',[BookController::class, 'update'] );

// Define a DELETE route for the URL /books/{id}
Route::delete('books/{id}',[BookController::class, 'destroy'] );
