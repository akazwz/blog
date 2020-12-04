<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\SwaggerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::any('/book/get/{id}',[BookController::class,'getBookById']);
Route::any('/allBook',[BookController::class,'getAllBook']);
Route::any('/swagger/doc',[SwaggerController::class,'doc']);
Route::any('/book/price/{sort}',[BookController::class,'getBookByPrice']);
Route::any('/books/price/{sort}',[BookController::class,'getBooksByPrice']);
Route::post('/books/insert',[BookController::class,'insertBook']);



