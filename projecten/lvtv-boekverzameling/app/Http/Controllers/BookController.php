<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return BookResource::collection($books);
    }

    public function create()
    {
        //
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();
        Book::create($validated);
        // We should return the created object,
        // but we return everything because our front-end
        // store is dumb and tiny.
        $books = Book::all();
        return BookResource::collection($books);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function edit(Book $book)
    {
        //
    }

    public function update(Request $request, Book $book)
    {
        //
    }

    public function destroy(Book $book)
    {
        //
    }
}
