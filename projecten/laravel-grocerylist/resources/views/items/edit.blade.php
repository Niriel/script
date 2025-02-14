@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <h1>Editing item {{ $item->id }}.</h1>
    <div>
        <form action="{{ route('items.update', $item->id) }}", method="POST">
            <label for="edit_name">Name:</label><br \>
            <input type="text" id="edit_name" name="name" value="{{ $item->name }}">
            </input>
            <br \>
            <label for="edit_desc">Description:</label><br \>
            <br \>
            <input type="text" id="edit_desc" name="description"  value="{{ $item->description }}">
            </input>
            <br \>
            @csrf
            @method('PUT')
            <button type="submit">Edit</button>
        </form>
    </div>
@endsection
