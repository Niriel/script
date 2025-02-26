@extends('layouts.app')

@section('title', 'Log in')

@section('content')
@if ($errors->any())
<ul class="errors">
    @foreach ($errors->all() as $error)
    <li class="error"> {{ $error }} </li>
    @endforeach
</ul>
@endif
<h1>Log in</h1>
<form action="{{ route('login.perform') }}" method="POST">
    @csrf
    @method('POST')
    <label for="login_email">E-mail:</label>
    <br />
    <input type="text" name="email" id="login_email" placeholder="name@example.com" />
    <br />
    <label for="login_password">Password:</label>
    <br />
    <input type="password" name="password" id="login_password" />
    <br />
    <input type="checkbox" name="remember_me" id="login_remember" value="1" />
    <label for="login_remember">Remember me</label>
    <br />
    <button type="submit">Log in</button>
</form>
@endsection
