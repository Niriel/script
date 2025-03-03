@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<header>
    <h1>Scriptlog</h1>
</header>

<section id="categories">
    <header>
        <h2>Categories</h2>
    </header>
    <main>
        <p><a href="{{ route('categories.index') }}">List of categories</a></p>
        <form action="{{ route('categories.filter') }}" method="POST">
            @csrf
            @method('GET')
            <table>
                <tr>
                    <td>
                        <div class="form_field">
                            <label for="filter_category">Filter by category: </label>
                        </div>
                    </td>
                    <td>
                        <div class="form_field">
                            <select name="id" id="filter_category" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td><button type="submit">Filter</button></td>
                </tr>
            </table>
        </form>
    </main>
</section>

<section id="article_list">
    <header>
        <h2>Articles</h2>
        <p>Number of articles: {{ $articles->count() }}.</p>
    </header>
    <main>
        @foreach($articles as $article)
        <article class="article_box">
            <header class="article_header">
                <h2 class="article_title">
                    <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                </h2>
                <div class="article_metadata">
                    {{ $article->created_at }}, by
                    {{ $article->user->name }}.
                    @if($article->is_premium)
                    <a href="{{ route('premium.index') }}" class="premium">Premium</a>
                    @endif
                </div>
            </header>
            <main class="article_content">
                <p>
                    {{ substr($article->content, 0, 500) }}
                    @if(mb_strlen($article->content) >= 500)
                    <a href="{{ route('articles.show', $article->id) }}">&hellip;</a>
                    @endif
                </p>
            </main>
        </article>
        @endforeach
    </main>
</section>
@endsection
