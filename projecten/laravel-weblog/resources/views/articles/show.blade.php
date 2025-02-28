@extends('layouts.app')

@section('title', 'Article')

@section('content')
<article>
    <section id="article">
        <h2 id="article_title">{{ $article->title }}</h2>
        <div id="article_header">
            {{ $article->created_at }}, by
            {{ $article->user->name }}.
            @if($article->is_premium)
            <span class="premium">Premium</span>
            @endif
        </div>
        <ul id="article_categories">
            @foreach($article->categories as $category)
            <li class="article_category">
                {{ $category->name }}
            </li>
            @endforeach
        </ul>
        <blockquote id="article_content">
            @if($article->matchPremiumWithAuth())
            {{ $article->content }}
            @else
            {{ substr($article->content, 0, 500) }}&hellip;
            <span class="premium">Premium</span>
            @endif
        </blockquote>
    </section>

    <section id="premium">
        @if(!$article->matchPremiumWithAuth())
        <h2>Premium</h2>
        <p>This is a <span class="premium">premium article</span>. Become a <a href="{{ route('premium.index') }}">Premium member</a> to read this article and many more!</p>
        @endif
    </section>

    <section id="comments">
        <h2>Comments</h2>

        <div id="comment_error">
            @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        @guest
        <p><a href="{{ route('auth.loginPage') }}">Log in</a> to write comments.</p>
        @endguest

        @auth
        @if($article->matchPremiumWithAuth())
        <div id="comment_create">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="article_id" value="{{$article->id}}" />
                <textarea type="textarea" id="comment_content" name="content" placeholder="Type your comment here." rows="4" cols="80"></textarea>
                <button type="submit">Comment</button>
            </form>
        </div>
        @else
        <p>Become a <a href="{{ route('premium.index') }}">Premium member<a> to comment on this article.</p>
        @endif
        @endauth

        <ul id="comments_show">
            @foreach($article->comments->sortByDesc('created_at') as $comment)
            <li class="comment">
                <p class="comment_header">{{ $comment->user->name }}, {{ $comment->created_at }}</p>
                <blockquote class="comment_content">{{ $comment->content }}</blockquote>

                {{-- Only the comment's author or the article author may delete a comment. --}}
                {{-- This is also checked in the controller. --}}
                @auth
                @if(Auth::id() === $comment->user_id || Auth::id() === $article->user_id)
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete comment</button>
                </form>

                @endif
                @endauth
            </li>
            @endforeach
        </ul>
    </section>
</article>
@endsection
