<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/list', [BookController::class,"book_list"]);
Route::post('/insert', [BookController::class,"insert_book"]);
Route::get('/detail/{id}', [BookController::class,"detail_book"]);
Route::delete('/delete/{id}', [BookController::class,"delete_book"]);
Route::put('/update/{id}', [BookController::class,"update_book"]);
