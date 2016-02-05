@extends('baus')

@section('content')
<div id="main_cart">
@include('cart/_big_cart')
</div>
<div id="order_component">
@include('cart/_order')
</div>
@endsection