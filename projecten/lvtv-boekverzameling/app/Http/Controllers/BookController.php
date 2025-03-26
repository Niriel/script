<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
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

    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validated();
        $book->update($validated);
        // We should return the created object,
        // but we return everything because our front-end
        // store is dumb and tiny.
        $books = Book::all();
        return BookResource::collection($books);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        // We should return the created object,
        // but we return everything because our front-end
        // store is dumb and tiny.
        $books = Book::all();
        return BookResource::collection($books);
    }
}
