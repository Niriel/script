<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return AuthorResource::collection($authors);
    }

    public function create()
    {
        //
    }

    public function store(StoreAuthorRequest $request)
    {
        $validated = $request->validated();
        $author = Author::create($validated);
        return new AuthorResource($author);
    }

    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    public function edit(Author $author)
    {
        //
    }

    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $validated = $request->validated();
        $author->update($validated);
        return new AuthorResource($author);
    }

    public function destroy(Author $author)
    {
        $author->delete();
    }
}
