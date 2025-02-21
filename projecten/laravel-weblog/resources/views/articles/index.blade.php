@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<ul>
@foreach($articles as $article)
<li>
<article>
    <h2 id="article_title"><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h2>
    <div id="article_header">
        {{ $article->created_at }}, by
        {{ $article->user->name }}
    </div>
    <blockquote id="article_excerpt">
        {{ substr($article->content, 0, 500) }}{{mb_strlen($article->content) > 500 ? '\&hellip;' : ''}}
    </blockquote>
</article>
</li>
@endforeach
</ul>
@endsection
