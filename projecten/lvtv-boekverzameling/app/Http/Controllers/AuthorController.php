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
        Author::create($validated);
        // We should return the created object,
        // but we return everything because our front-end
        // store is dumb and tiny.
        $authors = Author::all();
        return AuthorResource::collection($authors);
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
        // We should return the created object,
        // but we return everything because our front-end
        // store is dumb and tiny.
        $authors = Author::all();
        return AuthorResource::collection($authors);
    }

    public function destroy(Author $author)
    {
        $author->delete();
        // We should return the created object,
        // but we return everything because our front-end
        // store is dumb and tiny.
        $authors = Author::all();
        return AuthorResource::collection($authors);
    }
}
