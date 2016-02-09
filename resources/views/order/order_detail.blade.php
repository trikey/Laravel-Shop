@extends('baus')

@section('content')
<link href="{{ asset('/assets/css/footable-0.1.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/css/footable.sortable-0.1.css') }}" rel="stylesheet" type="text/css"/>
<script src="{{ asset('/assets/js/footable.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/footable.sortable.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.footable').footable();
    });
</script>

<div class="row">
<div class="col-lg-9 col-md-9 col-sm-7">
<h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> Подроности заказа №{{ $order->id }} </span></h1>

<div class="row userInfo">
<div class="col-lg-12">
    <h2 class="block-title-2"> Статус Вашего заказа </h2>
</div>


<div class="statusContent">

<div class="col-sm-12">
    <div class=" statusTop">
        <p><strong>Дата заказа:</strong> {{ $order->created_at }}</p>

        <p><strong>Номер заказа:</strong> #{{ $order->id }} </p>
    </div>
</div>

<div style="clear: both"></div>

<div class="col-sm-6">
    <div class="order-box">
        <div class="order-box-header">
            Способ оплаты
        </div>

        <div class="order-box-content">
            <div class="address">
                <p>{{$order->pay_system->name }}</p>
            </div>
        </div>
    </div>

</div>


<div class="col-sm-6">
    <div class="order-box">
        <div class="order-box-header">

            Способ доставки
        </div>


        <div class="order-box-content">
            <div class="address">
                <p>{{ $order->delivery_system->name }}</p>
            </div>

        </div>
    </div>

</div>


<div class="col-sm-12 clearfix">
    <div class="order-box">
        <div class="order-box-header">

            Товары в заказе
        </div>

        <div class="order-box-content">
            <div class="table-responsive">
                <table class="order-details-cart">
                    <tbody>
                    @foreach($order->products as $product)
                        <tr class="cartProduct">
                            <td class="cartProductThumb" style="width:20%">
                                @if(strlen($product->preview_picture) > 0)
                                    <div>
                                        <a href="{{ $product->url }}">
                                            <img alt="{{ $product->name }}" src="/uploads/{{ $product->preview_picture }}" />
                                        </a>
                                    </div>
                                @endif
                            </td>
                            <td style="width:40%">
                                <div class="miniCartDescription">
                                    <h4><a href="{{ $product->url }}"> {{ $product->name }} </a></h4>
                                    <div class="price"><span> {{ $product->price }} <span class="webdebug-ruble-symbol"> руб.</span> </span></div>
                                </div>
                            </td>
                            <td class="" style="width:10%"><a> X {{ $product->quantity }} </a></td>
                            <td class="" style="width:15%"><span> {{ $product->sum }} <span class="webdebug-ruble-symbol"> руб.</span> </span></td>
                        </tr>
                    @endforeach
                    <tr class="cartTotalTr blank">
                        <td class="" style="width:20%">
                            <div></div>
                        </td>
                        <td style="width:40%"></td>
                        <td class="" style="width:20%"></td>
                        <td class="" style="width:15%"><span>  </span></td>

                    </tr>

                    <tr class="cartTotalTr">
                        <td class="" style="width:20%">
                            <div></div>
                        </td>
                        <td style="width:40%"></td>
                        <td class="" style="width:20%">Итого</td>
                        <td class="" style="width:15%"><span class="price"> {{ $order->total_price }} <span class="webdebug-ruble-symbol"> руб.</span> </span></td>

                    </tr>


                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>


</div>


<div class="col-lg-12 clearfix">
    <ul class="pager">
        <li class="previous pull-right"><a href="/catalog"> <i class="fa fa-home"></i> Назад в магазин </a>
        </li>
        <li class="next pull-left"><a href="/personal"> ← Назад в личный кабинет</a></li>
    </ul>
</div>
</div>
<!--/row end-->

</div>
<div class="col-lg-3 col-md-3 col-sm-5"></div>
</div>
@endsection