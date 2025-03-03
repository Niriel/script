@extends('layouts.app')

@section('title', 'Log in')

@section('content')
<header>
    <h1>Log in</h1>
</header>

<main>
    <div class="dialog">
        <form action="{{ route('auth.login') }}" method="POST" class="real_form">
            @csrf
            @method('POST')
            <div class="container">
                <div class="dialog_title">Enter your credentials</div>

                @if ($errors->any())
                <div>Errors:</div>
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="form_field">
                    <label for="login_email">E-mail:</label>
                    <br />
                    <input type="email" id="login_email" name="email" required placeholder="alice@wonderland.com" />
                </div>
                <div class="form_field">
                    <label for="login_password">Password:</label>
                    <br />
                    <input type="password" id="login_password" name="password" required placeholder="p@ssW0rD" />
                </div>
                <div class="form_field">
                    <input type="checkbox" id="login_remember" name="remember" />
                    <label for="login_remember">remember me</label>
                </div>
                <div class="form_submit">
                    <button type="submit" class="good full_width">Log in</button>
                </div>
            </div>
        </form>
    </div>
</main>

@endsection
