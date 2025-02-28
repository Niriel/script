<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['is_premium'] = $request->has('is_premium') && Auth::user()->has_premium;
        $article = Article::create($validated);
        $article->categories()->sync($request['categories']);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // Non-premium articles can be seen by anyone, logged in or not.
        // Premium articles can only be seen by premium users (who need to be logged in, obviously).
        $allowed = (!$article->is_premium) || (Auth::check() && Auth::user()->has_premium);
        // An author is always allowed to see their article, even if they're not premium user anymore.
        if (Auth::check() && Auth::user()->id === $article->user_id) {
            $allowed = true;
        }

        // TODO: Move the above logic into articles.show. It's a better advertisement for the premium feature.

        if ($allowed) {
            return view('articles.show', compact('article'));
        }
        // // Todo: send the user to a "buy premium" page.
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        // Only the article's author may update an article.
        $user = Auth::user();
        if ($user->id === $article->user_id) {
            $validated = $request->validated();
            $validated['is_premium'] = $request->has('is_premium') && $user->has_premium;
            $article->update($validated);
            $article->categories()->sync($request['categories']);
            return redirect()->route('articles.show', $article->id);
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Only the article's author may delete an article.
        $user = Auth::user();
        if ($user->id === $article->user_id) {
            $article->delete();
            return redirect()->route('articles.index');
        }
        abort(403);
    }
}
