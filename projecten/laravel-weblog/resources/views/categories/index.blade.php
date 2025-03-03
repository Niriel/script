@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<header>
    <h1>Categories</h1>
</header>

<section id="category_list">
    <header>
        <p>Number of categories: {{ $categories->count() }}.</p>
    </header>
    <main>
        <ul>
            @foreach($categories as $category)
            <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </main>
</section>
@endsection
