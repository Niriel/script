@extends('layouts.app')

@section('title', 'Premium')

@section('content')
<h1>Premium membership</h1>
<section id="premium_explain">
    <h2>Why Premium?</h2>
    <p>Premium members may write Premium articles, read Premium articles, and comment on Premium Articles.</p>
</section>
<section id="premium_purchase">
    @if(Auth::user()->has_premium)
    <h2>Thank you for your support!</h2>
    <p>Dear {{ Auth::user()->name }}, you are already a valued Premium member of our community. No need to purchase anything more.</p>
    @else
    <h2>Become a Premium member</h2>
    <p>Dear {{ Auth::user()->name }}, you may purchase your Premium membership on the following page:</p>
    <p><a href="{{ route('premium.purchase') }}">Purchase my Premium membership</a></p>
    @endif
</section>
@endsection
