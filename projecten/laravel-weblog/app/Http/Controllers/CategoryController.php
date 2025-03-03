<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $articles = Article::whereHas(
            'categories',
            function ($query) use ($category) {
                $query->where('id', $category->id);
            }
        )->orderByDesc('created_at')->get();
        return view('categories.show', compact('category', 'articles'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        Category::create($validated);
        return redirect()->route('categories.index');
    }

    public function filter(FilterCategoryRequest $request)
    {
        $validated = $request->validated();
        return redirect()->route('categories.show', $validated['id']);
    }
}
