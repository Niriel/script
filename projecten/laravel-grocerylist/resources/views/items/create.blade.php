@extends('layouts.app')

@section('title', 'Create item')

@section('content')
<h1>Create a new item</h1>
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li> {{ $error }} </li>
    @endforeach
</ul>
@endif
<div>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        @method('POST')
        <label for="store_name">Name:</label>
        <br />
        <input type="text" id="store_name" name="name" placeholder="brood">
        <br />
        <label for="store_category">Category:</label>
        <br />
        <select name="category_id" id="store_category" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br />
        <label for="store_desc">Description:</label>
        <br />
        <textarea type="textarea" id="store_desc" name="description" placeholder="lekker onder jam"></textarea>
        <br />
        <button type="submit">Create</button>
    </form>
</div>
@endsection
