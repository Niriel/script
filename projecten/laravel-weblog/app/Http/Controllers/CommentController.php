<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        if (Auth::check()) {
            $validated = $request->validated();
            Comment::create($validated);
            return redirect()->route('articles.show', $validated['article_id']);
        }
        abort(403);
    }

    public function destroy(Comment $comment)
    {
        // Only the comment's author or the article author may delete a comment.
        // if (Auth::check()) {
        //     $user = Auth::user();
        //     if ($user->id === $comment->user_id || $user->id === $comment->article->user_id) {
        $comment->delete();
        return redirect()->route('articles.show', $comment->article_id);
        //     }
        // }
        abort(403);
    }
}
