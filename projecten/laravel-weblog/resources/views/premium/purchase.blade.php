@extends('layouts.app')

@section('title', 'Purchase Premium')

@section('content')
<section id="premium_purchase">
    <h2>Purchase your Premium membership</h2>
    <p>Dear {{ Auth::user()->name }}, thank you for your continued interest in our community!</p>
    <form action="{{ route('premium.store') }}" method="POST">
        @csrf
        @method('POST')
        <p>To get your Premium membership, please enter your information below.</p>
        <ul>
            <li>
                <label for="premium_card_number">Credit card number</label>
                <br />
                <input text name="card_number" id="premium_card_number" placeholder="1234.5678.8765.4321" disabled />
            </li>
            <li>
                <label for="premium_card_validity">Valid until</label>
                <br />
                <input text name="card_validity" id="premium_card_validity" placeholder="2030-12-31" disabled />
            </li>
            <li>
                <label for="premium_lilcode">Little code on the back</label>
                <br />
                <input text name="card_lilcode" id="premium_card_lilcode" placeholder="123" disabled />
            </li>
        </ul>
        <p>Then, confirm my pressing this button. That's it!</p>
        <button type="submit">Purchase my Premium membership</button>
    </form>
</section>
@endsection
