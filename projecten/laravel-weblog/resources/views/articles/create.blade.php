@extends('layouts.app')

@section('title', 'Article, create')

@section('content')
<section id="article_create">
    <h1>Write a new article</h1>
    @if ($errors->any())
    <div id="errors">
        <ul class="errors">
            @foreach ($errors->all() as $error)
            <li class="error"> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
    @endif

    @auth
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" name="image_path" value="/dummy/pic.jpg" />
        <label for="article_title">Title:</label>
        <br />
        <input type="text" id="article_title" name="title" placeholder="Article title" />
        <br />
        <label for="article_categories">Categories:</label>
        <br />
        <select name="categories[]" id="article_categories" multiple>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br />
        <label for="article_content">Content:</label>
        <br />
        <textarea type="textarea" id="article_content" name="content" placeholder="Article content" rows="20" cols="150"></textarea>
        <br />
        <input type="checkbox" id="article_is_premium" name="is_premium" value="1" {{ Auth::user()->has_premium ? '' : 'disabled' }} />
        <label for="article_is_premium">Premium article</label>
        <br />
        <button type="submit">Create</button>
    </form>
    @endauth
</section>
@endsection
