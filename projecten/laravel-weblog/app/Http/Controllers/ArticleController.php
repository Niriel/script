<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
        $categories = Category::all();
        return view('articles.index', compact('articles', 'categories'));
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
        // dd($request);
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['is_premium'] = $request->has('is_premium') && Auth::user()->has_premium;
        // dd($validated);

        if ($request->has('image_file')) {
            $image_path = $request->file('image_file')->store('article_images', ['disk' => 'public']);
            $validated['image_path'] = $image_path;
        } else {
            $validated['image_path'] = null;
        }

        $article = Article::create($validated);
        $article->categories()->sync($request['categories']);
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        if ($article->image_path) {
            $asset = asset($article->image_path);
            if (!File::exists($article->image_path)) {
                $article->image_path = null;
            }
        }
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if ($article->image_path) {
            $asset = asset($article->image_path);
            if (!File::exists($article->image_path)) {
                $article->image_path = null;
            }
        }
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
            $validated['user_id'] = Auth::id();
            $validated['is_premium'] = $request->has('is_premium') && $user->has_premium;
            if ($request->has('no_image')) {
                // We ask to remove the image.
                $validated['image_path'] = null;
            } else {
                if ($request->has('image_file')) {
                    // We modify the image.
                    $image_path = $request->file('image_file')->store('article_images', ['disk' => 'public']);
                    $validated['image_path'] = $image_path;
                } else {
                    // We leave the image as it is.
                    $validated['image_path'] = $article->image_path;
                }
            }
            $article->update($validated);
            $article->categories()->sync($request['categories']);
            return redirect()->route('dashboard.index');
        }
        abort(403);
    }

    /**
     * Show a confirmation page before deleting an article.
     */
    public function delete(Article $article)
    {
        // Only the article's author may delete an article.
        $user = Auth::user();
        if ($user->id === $article->user_id) {
            return view('articles.delete', compact('article'));
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
            return redirect()->route('dashboard.index');
        }
        abort(403);
    }
}
