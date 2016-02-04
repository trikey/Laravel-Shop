@extends('baus')

@section('content')



<div class="row innerPage">
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="row userInfo">
    <p class="lead text-center">
        <img src="{{ asset('/images/404.png') }}" alt="">
        <br/><br/>
        Неправильно набран адрес, <br>или такой страницы на сайте больше не существует.<br/>
        <span class="">Вернитесь на <a href="{{ url('/') }}"><b>главную</b></a> или воспользуйтесь картой сайта.</span>
        <br/>

    </p>




    </div>
    </div>
</div>
<div style="clear:both"></div>







@endsection