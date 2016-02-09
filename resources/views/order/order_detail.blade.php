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
<h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> Подроности заказа №1 </span></h1>

<div class="row userInfo">
<div class="col-lg-12">
    <h2 class="block-title-2"> Статус Вашего заказа </h2>
</div>


<div class="statusContent">

<div class="col-sm-12">
    <div class=" statusTop">
        <p><strong>Статус:</strong> Выполнен</p>

        <p><strong>Дата заказа:</strong> 26.09.2015 15:12:06</p>

        <p><strong>Номер заказа:</strong> #1 </p>
    </div>
</div>
<!--<div class="col-sm-6">-->
<!--    <div class="order-box">-->
<!--        <div class="order-box-header">-->
<!---->
<!--            Billing Address-->
<!--        </div>-->
<!---->
<!---->
<!--        <div class="order-box-content">-->
<!--            <div class="address">-->
<!--                <p><strong>TITLE </strong></p>-->
<!---->
<!--                <p><strong>Ruth F. Burns </strong></p>-->
<!---->
<!--                <div class="adr">-->
<!--                    4894 Burke Street<br>North Billerica, MA 01862-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->


<!--<div class="col-sm-6">-->
<!--    <div class="order-box">-->
<!--        <div class="order-box-header">-->
<!---->
<!--            Shipping Address-->
<!--        </div>-->
<!---->
<!---->
<!--        <div class="order-box-content">-->
<!---->
<!---->
<!--            <div class="address">-->
<!--                <p><strong>TITLE</strong></p>-->
<!---->
<!--                <p><strong>Ruth F. Burns </strong></p>-->
<!---->
<!--                <div class="adr">-->
<!--                    4894 Burke Street<br>North Billerica, MA 01862-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->

<div style="clear: both"></div>

<div class="col-sm-6">
    <div class="order-box">
        <div class="order-box-header">

            Способ оплаты
        </div>


        <div class="order-box-content">
            <div class="address">
                <p>Наличными                                            <span style="color: green" class="green"> <strong>(Оплачен)</strong> </span>
                                    </p>
                                    <p><strong>Дата оплаты: </strong> 26.09.2015 </p>
                <!--                <p><strong>Card Number: </strong> 00335 251 124 </p>-->

            </div>
        </div>
    </div>

</div>


<div class="col-sm-6">
    <div class="order-box">
        <div class="order-box-header">

            Способ доставки: СДЭК
        </div>


        <div class="order-box-content">
            <div class="address">
<!--                <p> via Post Air Mail <a title="tracking number" href="#">#4502</a></p>-->
<!---->
<!--                <p><strong>Ruth F. Burns </strong></p>-->
<!---->
<!--                <div class="adr">-->
<!--                    4894 Burke Street<br>North Billerica, MA 01862-->
<!--                </div>-->
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
                                        <tr class="cartProduct">
                        <td class="cartProductThumb" style="width:20%">
                            <div><a href="/catalog/pants/pants-life-in-abstraction/"> <img alt="img" src="">
                                </a></div>
                        </td>
                        <td style="width:40%">
                            <div class="miniCartDescription">
                                <h4><a href="/catalog/pants/pants-life-in-abstraction/"> Штаны Жизнь в Абстракции </a></h4>
<!--                                <span class="size"> 12 x 1.5 L </span>-->

                                <div class="price"><span> 1 899 <span class="webdebug-ruble-symbol">a</span> </span></div>
                            </div>
                        </td>
                        <td class="" style="width:10%"><a> X 1 </a></td>
                        <td class="" style="width:15%"><span> 1 899 <span class="webdebug-ruble-symbol">a</span> </span></td>

                    </tr>
                                        <tr class="cartProduct">
                        <td class="cartProductThumb" style="width:20%">
                            <div><a href="/catalog/pants/pants-life-in-abstraction/"> <img alt="img" src="">
                                </a></div>
                        </td>
                        <td style="width:40%">
                            <div class="miniCartDescription">
                                <h4><a href="/catalog/pants/pants-life-in-abstraction/"> Штаны Жизнь в Абстракции </a></h4>
<!--                                <span class="size"> 12 x 1.5 L </span>-->

                                <div class="price"><span> 1 899 <span class="webdebug-ruble-symbol">a</span> </span></div>
                            </div>
                        </td>
                        <td class="" style="width:10%"><a> X 1 </a></td>
                        <td class="" style="width:15%"><span> 1 899 <span class="webdebug-ruble-symbol">a</span> </span></td>

                    </tr>
                                        <tr class="cartProduct">
                        <td class="cartProductThumb" style="width:20%">
                            <div><a href="/catalog/pants/pants-life-in-abstraction/"> <img alt="img" src="">
                                </a></div>
                        </td>
                        <td style="width:40%">
                            <div class="miniCartDescription">
                                <h4><a href="/catalog/pants/pants-life-in-abstraction/"> Штаны Жизнь в Абстракции </a></h4>
<!--                                <span class="size"> 12 x 1.5 L </span>-->

                                <div class="price"><span> 1 899 <span class="webdebug-ruble-symbol">a</span> </span></div>
                            </div>
                        </td>
                        <td class="" style="width:10%"><a> X 1 </a></td>
                        <td class="" style="width:15%"><span> 1 899 <span class="webdebug-ruble-symbol">a</span> </span></td>

                    </tr>

                    <tr class="cartTotalTr blank">
                        <td class="" style="width:20%">
                            <div></div>
                        </td>
                        <td style="width:40%"></td>
                        <td class="" style="width:20%"></td>
                        <td class="" style="width:15%"><span>  </span></td>

                    </tr>

<!--                    <tr class="cartTotalTr">-->
<!--                        <td class="" style="width:20%">-->
<!--                            <div></div>-->
<!--                        </td>-->
<!--                        <td colspan="2" style="width:40%">Итого</td>-->
<!--                        <td class="" style="width:15%"><span> $216.51 </span></td>-->
<!---->
<!--                    </tr>-->
<!--                    <tr class="cartTotalTr">-->
<!--                        <td class="" style="width:20%">-->
<!--                            <div></div>-->
<!--                        </td>-->
<!--                        <td colspan="2" style="width:40%">Shipping</td>-->
<!--                        <td class="" style="width:15%"><span> $10.51 </span></td>-->
<!---->
<!--                    </tr>-->
<!--                    <tr class="cartTotalTr">-->
<!--                        <td class="" style="width:20%">-->
<!--                            <div></div>-->
<!--                        </td>-->
<!--                        <td colspan="2" style="width:40%">Total (tax excl.)</td>-->
<!--                        <td class="" style="width:15%"><span> $216.51 </span></td>-->
<!---->
<!--                    </tr>-->
                    <tr class="cartTotalTr">
                        <td class="" style="width:20%">
                            <div></div>
                        </td>
                        <td style="width:40%"></td>
                        <td class="" style="width:20%">Итого</td>
                        <td class="" style="width:15%"><span class="price"> 5 697 <span class="webdebug-ruble-symbol">a</span> </span></td>

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
        <li class="previous pull-right"><a href="/catalog/"> <i class="fa fa-home"></i> Назад в магазин </a>
        </li>
        <li class="next pull-left"><a href="/personal/"> ← Назад в личный кабинет</a></li>
    </ul>
</div>
</div>
<!--/row end-->

</div>
<div class="col-lg-3 col-md-3 col-sm-5"></div>
</div>
@endsection