@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<ul>
@foreach($articles as $article)
<li>
<article>
    <h2 class="article_title"><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h2>
    <div class="article_header">
        {{ $article->created_at }}, by
        {{ $article->user->name }}
    </div>
    <blockquote class="article_excerpt">
        {{ substr($article->content, 0, 500) }}...
    </blockquote>
</article>
</li>
@endforeach
</ul>
@endsection
