@extends('layouts.app')

@section('title', 'Article')

@section('content')
<h2>Article</h2>
<article class="article_box">
    <header class="article_header">
        <h1 class="article_title">{{ $article->title }}</h1>
        <div class="container article_metadata">
            <div class="left_right">
                <div class="left">
                    <span class="author">{{ $article->user->name }}</span>
                    <span class="date">{{ $article->created_at }}</span>
                </div>
                <div class="right">
                    @if($article->is_premium)
                    <a href="{{ route('premium.index') }}" class="premium">Premium</a>
                    @endif
                </div>
            </div>
            <p>Categories:</p>
            <ul>
                @if ($article->categories->isEmpty())
                <li>None</li>
                @else
                @foreach($article->categories as $category)
                <li>
                    <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                </li>
                @endforeach
                @endif
            </ul>
            @if($article->image_path)
            <div class="article_image"><img src="{{ URL::asset($article->image_path) }}" /></div>
            @endif
        </div>
    </header>

    <main class="article_content">
        <p>
            @if($article->matchPremiumWithAuth())
            {{ $article->content }}
            @else
            {{ substr($article->content, 0, 500) }}&hellip;
            <a href="{{ route('premium.index') }}" class="premium">Premium</a>
            @endif
        </p>
    </main>
</article>

<section id="premium">
    @if(!$article->matchPremiumWithAuth())
    <h2>Premium</h2>
    <p>
        This is a <a href="{{ route('premium.index') }}" class="premium">Premium article</a>.
        Become a <a href="{{ route('premium.index') }}" class="premium">Premium member</a> to read this article and many more!
    </p>
    @endif
</section>

<section id="comments">
    <h2>Comments</h2>

    @auth
    <div class="dialog">
        @if($article->matchPremiumWithAuth())
        <form action="{{ route('comments.store') }}" method="POST" class="real_form">
            @csrf
            @method('POST')
            <div class="container">
                <div class="dialog_title">Tell us what you think</div>

                @if ($errors->any())
                <div>Errors:</div>
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <input type="hidden" name="article_id" value="{{$article->id}}" />
                <div class="form_field">
                    <label for="comment_content">Comment:</label>
                    <br />
                    <textarea type="textarea" id="comment_content" name="content" placeholder="Type your comment here." rows="4" cols="80" required></textarea>
                </div>
                <div class="form_submit">
                    <button type="submit" class="good full_width">Comment</button>
                </div>
            </div>
        </form>
        @else
        <p>Become a <a href="{{ route('premium.index') }}">Premium member<a> to comment on this article.</p>
        @endif
    </div>
    @endauth
    @guest
    <p><a href="{{ route('auth.loginPage') }}">Log in</a> to write comments.</p>
    @endguest


    @foreach($article->comments->sortByDesc('created_at') as $comment)
    <div class="comment_box">
        <div class="comment_header">
            <span class="author">{{ $comment->user->name }}</span>
            <span class="date">{{ $comment->created_at }}</span>
        </div>
        <div class="comment_content">
            <p>{{ $comment->content }}</p>
        </div>

        {{-- Only the comment's author or the article author may delete a comment. --}}
        {{-- This is also checked in the controller. --}}
        @auth
        @if(Auth::id() === $comment->user_id || Auth::id() === $article->user_id)
        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bad">Delete comment</button>
        </form>
        @endif
        @endauth
    </div>
    @endforeach
</section>

@endsection
