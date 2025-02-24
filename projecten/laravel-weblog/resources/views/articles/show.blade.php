@extends('layouts.app')

@section('title', 'Article')

@section('content')
<article>
    <h2 id="article_title">{{ $article->title }}</h2>

    <div id="article_edit">
        <a class="button" href="{{ route('articles.edit', $article->id) }}">Edit article</a>
        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete article</button>
        </form>
    </div>

    <div id="article_header">
        {{ $article->created_at }}, by
        {{ $article->user->name }}
    </div>
    <ul id="article_categories">
        @foreach($article->categories as $category)
        <li class="article_category">
            {{ $category->name }}
        </li>
        @endforeach
    </ul>
    <blockquote id="article_content">
        {{ $article->content }}
    </blockquote>
    <ul id="comments">
        @foreach($article->comments as $comment)
        <li class="comment">
            <p class="comment_header">{{ $comment->user->name }}, {{ $comment->created_at }}</p>
            <blockquote class="comment_content">{{ $comment->content }}</blockquote>
        </li>
        @endforeach
    </ul>
</article>
@endsection
