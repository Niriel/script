@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@foreach($articles as $article)
<article>
    <h2 class="article_title"><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h2>
    <p>{{ $article->created_at }}, by {{ $article->user->name }}</p>
    <div class="article_excerpt">

    </div>
</article>
@endforeach
@endsection
