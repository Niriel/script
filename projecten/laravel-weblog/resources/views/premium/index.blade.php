@extends('layouts.app')

@section('title', 'Premium')

@section('content')
<section id="premium_explain">
    <h2>Why Premium?</h2>
    <p>Premium members may write Premium articles, read Premium articles, and comment on Premium Articles.</p>
</section>
<section id="premium_purchase">
    <h2>Become a Premium member</h2>
    <p>Dear {{ Auth::user()->name }}, you may purchase your Premium membership on the following page:</p>
    <p><a href="{{ route('premium.purchase') }}">Purchase my Premium membership</a></p>
</section>
@endsection
