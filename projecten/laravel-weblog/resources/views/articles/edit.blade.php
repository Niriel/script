@extends('layouts.app')

@section('title', 'Edit article')

@section('content')
<header>
    <h1>Edit an article</h1>
</header>

<section id="article_edit">
    <div class="dialog">
        <form action="{{ route('articles.update', $article->id) }}" method="POST" class="real_form">
            @csrf
            @method('PUT')
            <div class="container">
                @if ($errors->any())
                <div>Errors:</div>
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <input type="hidden" name="image_path" value="{{ $article->image_path }}" />
                <div class="form_field">
                    <label for="article_title">Title:</label>
                    <br />
                    <input type="text" id="article_title" name="title" placeholder="Article title" value="{{ $article->title }}" size="150" />
                </div>
                <div class="form_field">
                    <label for="article_categories">Categories:</label>
                    <br />
                    <select name="categories[]" id="article_categories" multiple>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $article->categories->contains($category) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span>Press Ctrl to select multiple categories.</span>
                </div>
                <div class="form_field">
                    <label for="article_content">Content:</label>
                    <br />
                    <textarea type="textarea" id="article_content" name="content" placeholder="Article content" rows="20" cols="150">{{ $article->content }}</textarea>
                </div>
                <div class="form_field">
                    <input type="checkbox" id="article_is_premium" name="is_premium" value="1" {{ $article->is_premium ? 'checked' : '' }} {{ Auth::user()->has_premium ? '' : 'disabled' }} />
                    <label for="article_is_premium">Premium article</label>
                </div>
                <div class="form_submit">
                    <button type="submit" class="good full_width">Edit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
