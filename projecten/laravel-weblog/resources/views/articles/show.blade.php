@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<article>
    <h2 class="article_title"><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h2>
    <p>{{ $article->created_at }}, by {{ $article->user->name }}</p>
    <ul class="article_categories">
        @foreach($article->categories as $category)
        <li class="article_category">
            {{ $category->name }}
        </li>
        @endforeach
    </ul>
    <div class="article_content">
        {{ $article->content }}
    </div>
    <ul>
        @foreach($article->comments as $comment)
        <li class="article_comments">
            <div class="article_comment">
                <p>{{ $comment->user->name }}, {{ $comment->created_at }}</p>
                <p>{{ $comment->content }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</article>
@endsection
