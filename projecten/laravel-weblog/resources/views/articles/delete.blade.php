@extends('layouts.app')

@section('title', 'Delete article')

@section('content')
<header>
    <h1>Delete article</h1>
</header>

<section id="article_preview">
    <p>You are about to delete the following article:</p>
    <div class="article_preview">
        <header class="article_header">
            <h2 class="article_title">{{ $article->title }}</h2>
            <div>
                {{ $article->created_at }}, by
                {{ $article->user->name }}
            </div>
        </header>
        <main class="article_excerpt">
            <p>
                {{ substr($article->content, 0, 500) }}
                @if(mb_strlen($article->content) >= 500)
                &hellip;
                @endif
            </p>
        </main>
    </div>
</section>

<section id="confirm_deletion">
    <div class="dialog">
        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="real_form">
            @csrf
            @method('DELETE')
            <div class="container">
                <div class="dialog_title">Are you certain?</div>

                @if ($errors->any())
                <div>Errors:</div>
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <p>You are about to delete this article.</p>
                <p>This action cannot be undone.</p>
                <button type="submit" class="bad">Delete article</button>
            </div>
        </form>
    </div>
</section>
@endsection
