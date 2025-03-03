@extends('layouts.app')

@section('title', 'Purchase Premium')

@section('content')
<header>
    <h1>Purchase your Premium membership</h1>
</header>
<main>
    <div class="dialog">
        <form action="{{ route('premium.store') }}" method="POST" class="real_form">
            @csrf
            @method('POST')
            <div class="container">
                <div class="dialog_title">Enter your payment information</div>

                @if ($errors->any())
                <div>Errors:</div>
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <p>Dear {{ Auth::user()->name }}, thank you for your continued interest in our community!</p>
                <p>To get your <span class="premium">Premium membership</span>, please enter your payment information below.</p>
                <div class="form_field">
                    <label for="premium_card_number">Credit card number:</label>
                    <br />
                    <input type="text" name="card_number" id="premium_card_number" placeholder="1234.5678.8765.4321" disabled />
                </div>
                <div class="form_field">
                    <label for="premium_card_validity">Valid until:</label>
                    <br />
                    <input type="text" name="card_validity" id="premium_card_validity" placeholder="2030-12-31" disabled />
                </div>
                <div class="form_field">
                    <label for="premium_lilcode">Little code on the back:</label>
                    <br />
                    <input type="text" name="card_lilcode" id="premium_card_lilcode" placeholder="123" disabled />
                </div>
                <p>Then, confirm my pressing this button. That's it!</p>
                <div class="form_submit">
                    <button type="submit" class="good">Purchase your <span class="premium">Premium membership</span></button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
