@extends('layouts.app')

@section('title', 'Article')

@section('content')
<article>
    <h2 id="article_title">{{ $article->title }}</h2>
    <span class="premium">{{ $article->is_premium ? 'Premium' : ''}}</span>

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

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" name="user_id" value="1" />
        <input type="hidden" name="article_id" value="{{$article->id}}" />
        <textarea type="textarea" id="comment_content" name="content" placeholder="Type your comment here." rows="4" cols="80"></textarea>
        <button type="submit">Comment</button>
    </form>

    <ul id="comments">
        @foreach($article->comments->sortByDesc('created_at') as $comment)
        <li class="comment">
            <p class="comment_header">{{ $comment->user->name }}, {{ $comment->created_at }}</p>
            <blockquote class="comment_content">{{ $comment->content }}</blockquote>
            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete comment</button>
            </form>
        </li>
        @endforeach
    </ul>
</article>
@endsection
