<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Auth::user()->articles()->orderByDesc('created_at')->get();
        return view('dashboard.index', compact('articles'));
    }
}
