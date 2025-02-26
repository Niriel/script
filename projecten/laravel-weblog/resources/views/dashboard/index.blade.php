@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>
@auth
<h2>Greetings, {{auth()->user()->name}}</h2>
@endauth

@guest
<h2>Greetings, visitor</h2>
<p>You may wish to
    <a href="{{ route('login.index') }}">log in</a>
    or return to the website's
    <a href="{{ route('articles.index') }}">home page</a>.
</p>
@endguest
@endsection
