@extends('layouts.app')

@section('title', 'Article')

@section('content')
<article>
    <section id="article">
        <h2 id="article_title">{{ $article->title }}</h2>
        <div><span class="premium">{{ $article->is_premium ? 'Premium' : ''}}</span></div>

        <table>
            <tr>
                <td>
                    <form action="{{ route('articles.edit', $article->id) }}" method="POST">
                        @csrf
                        @method('GET')
                        <button type="submit">Edit article</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete article</button>
                    </form>
                </td>
            </tr>
        </table>

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
    </section>

    <section id="comments">
        @guest
        <p><a href="{{ route('login.index') }}">Log in</a> to write comments.</p>
        @endguest
        @auth
        <div id="comment_error">
            @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div id="comment_create">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
                <input type="hidden" name="article_id" value="{{$article->id}}" />
                <textarea type="textarea" id="comment_content" name="content" placeholder="Type your comment here." rows="4" cols="80"></textarea>
                <button type="submit">Comment</button>
            </form>
        </div>
        @endauth

        <ul id="comments_show">
            @foreach($article->comments->sortByDesc('created_at') as $comment)
            <li class="comment">
                <p class="comment_header">{{ $comment->user->name }}, {{ $comment->created_at }}</p>
                <blockquote class="comment_content">{{ $comment->content }}</blockquote>

                {{-- Only the comment's author or the article author may delete a comment. --}}
                {{-- This is also checked in the controller. --}}
                {{-- @auth--}}
                {{-- @if(Auth::id() === $comment->user_id || Auth::id() === $article->user_id)--}}
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete comment</button>
                </form>

                {{-- @endif--}}
                {{-- @endauth --}}
            </li>
            @endforeach
        </ul>
    </section>
</article>
@endsection
