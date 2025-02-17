@extends('layouts.app')

@section('title', 'Edit item')

@section('content')
<h1>Edit an item</h1>
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li> {{ $error }} </li>
    @endforeach
</ul>
@endif
<div>
    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="update_name">Name:</label>
        <br />
        <input type="text" id="update_name" name="name" placeholder="brood" value="{{ $item->name }}">
        <br />
        <label for="update_desc">Description:</label>
        <br />
        <textarea type="textarea" id="update_desc" name="description" placeholder="lekker onder jam">{{ $item->description}} </textarea>
        <br />
        <button type="submit">Edit</button>
    </form>
</div>
@endsection
