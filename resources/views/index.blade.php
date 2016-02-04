@extends('baus')

@section('meta_title', 'Главная страница')


@section('content')

@include('index/text_1')

<div class="container main-container">
@include('catalog/new_products')
</div>

{{--@include('index/text_2')--}}

<div class="container main-container">
@include('catalog/sale_products')
</div>
@endsection