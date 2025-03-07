<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        if ($this->mayCommentPremium($validated['article_id'], $validated['user_id'])) {
            Comment::create($validated);
            return redirect()->route('articles.show', $validated['article_id']);
        }
    }

    public function destroy(Comment $comment)
    {
        // Only the comment's author or the article author may delete a comment.
        $user = Auth::user();
        if ($user->id === $comment->user_id || $user->id === $comment->article->user_id) {
            $comment->delete();
            return redirect()->route('articles.show', $comment->article_id);
        }
    }

    public function mayCommentPremium($article_id, $user_id)
    {
        $article = Article::find($article_id);
        $user = User::find($user_id);
        if ($article && $user) {
            $articlePremium = boolval($article->is_premium);
            $userPremium = boolval($user->has_premium);
            // Obtained with a Karnaugh table.
            // The only forbidden case is a non-premium user commenting on a premium article.
            return !$articlePremium || $userPremium;
        }
        return false;
    }
}
