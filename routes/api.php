<?php

use App\Http\Controllers\AuthorController;
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

Route::get('authors', [AuthorController::class, 'index']);
Route::get('authors/{author}', [AuthorController::class, 'show']);
Route::put('authors/{author}', [AuthorController::class, 'update']);
Route::patch('authors/{author}', [AuthorController::class, 'update']);
Route::delete('authors/{author}', [AuthorController::class, 'destroy']);
Route::post('authors', [AuthorController::class, 'store']);

Route::get('books', [BookController::class, 'index']);
Route::get('books/{book}', [BookController::class, 'show']);
Route::put('books/{book}', [BookController::class, 'update']);
Route::patch('books/{book}', [BookController::class, 'update']);
Route::delete('books/{book}', [BookController::class, 'destroy']);
Route::post('books', [AuthorController::class, 'store']);
