@extends('layouts.app')

@section('title', 'Delete article')

@section('content')
<h1>Are you certain that you want to <span class="danger">delete</span> this article?</h1>

<section id="article" class="article_box">
    <h2 id="article_title">{{ $article->title }}</h2>
    <div id="article_header">
        {{ $article->created_at }}, by
        {{ $article->user->name }}
    </div>
    <blockquote id="article_excerpt">
        {{ substr($article->content, 0, 500) }}&hellip;
    </blockquote>
</section>

<section id="confirm_deletion">
    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <p><span class="danger">This action cannot be undone.</span></p>
        <button type="submit" class="danger">Delete article</button>
    </form>
</section>
@endsection
