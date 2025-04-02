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
        $book = Book::create($validated);
        return new BookResource($book);
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
        return new BookResource($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();
    }
}
