@extends('layouts.app')

@section('title', 'Create item')

@section('content')
    <h1>Create a new item</h1>
    <div>
        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            @method('POST')
            <label for="store_name">Name:</label>
            <br />
            <input type="text" id="store_name" name="name" placeholder="brood">
            <br />
            <label for="store_desc">Description:</label>
            <br />
            <textarea type="textarea" id="store_desc" name="description" placeholder="lekker onder jam"></textarea>
            <br />
            <button type="submit">Create</button>
        </form>
    </div>
@endsection
