@extends('layouts.app')

@section('title', 'Article, edit')

@section('content')
@if ($errors->any())
<ul class="errors">
    @foreach ($errors->all() as $error)
    <li class="error"> {{ $error }} </li>
    @endforeach
</ul>
@endif
<div id="article_edit">
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ $article->user_id }}" />
        <input type="hidden" name="image_path" value="{{ $article->image_path }}" />
        <label for="article_title">Title:</label>
        <br />
        <input type="text" id="article_title" name="title" placeholder="Article title" value="{{ $article->title }}" size="150" />
        <br />
        <label for="article_categories">Categories:</label>
        <br />
        <select name="category_id" id="article_categories" multiple>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $article->categories->contains($category) ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <br />
        <label for="article_content">Content:</label>
        <br />
        <textarea type="textarea" id="article_content" name="content" placeholder="Article content" rows="20" cols="150">{{ $article->content }}</textarea>
        <br />
        <input type="checkbox" id="article_is_premium" name="is_premium" value="1" {{ $article->is_premium ? 'checked' : '' }} />
        <label for="article_is_premium">Premium content</label>
        <br />
        <button type="submit">Edit</button>
    </form>
</div>
@endsection
