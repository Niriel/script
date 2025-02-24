<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $validated = $request->validated();
        Comment::create($validated);
        return redirect()->route('articles.show', $validated['article_id']);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('articles.show', $comment->article_id);
    }
}
