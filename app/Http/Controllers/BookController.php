<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Dotenv\Validator;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(BookResource::collection(Book::all()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->toArray(), [
            'title' => 'required',
            'author_id' => 'required',
            'abstract' => 'required'
        ]);

        if($validate->fails()) {
            return response()->json([
                'status_code' => 400,
                'errors' => $validate->errors()
            ], 400);
        }

        return response(new BookResource(Book::create($validate->validate())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response(new BookResource($book), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validate = Validator::make($request->toArray(), [
            'title' => 'required',
            'author_id' => 'required',
            'abstract' => 'required'
        ]);

        if($validate->fails()) {
            return response($validate->errors(), 400);
        }

        $book->update($validate->validate());
        return response(new BookResource($book), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response(null, 204);
    }
}
