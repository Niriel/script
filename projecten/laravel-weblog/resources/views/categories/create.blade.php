@extends('layouts.app')

@section('title', 'New category')

@section('content')
<header>
    <h1>New category</h1>
</header>

<section id="category_create">
    <div class="dialog">
        <form action="{{ route('categories.store') }}" method="POST" class="real_form">
            @csrf
            @method('POST')
            <div class="container">
                <div class="dialog_title">Name the new category</div>

                @if ($errors->any())
                <div>Errors:</div>
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="form_field">
                    <label for="category_name">Name:</label>
                    <br />
                    <input type="text" id="category_title" name="name" placeholder="Space travel" required />
                </div>
                <div class="form_submit">
                    <button type="submit" class="good full_width">Create</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
