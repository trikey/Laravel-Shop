
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
        <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Корзина </span></h1>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
        <h4 class="caps"><a href="/catalog/"><i class="fa fa-chevron-left"></i> Вернуться к товарам </a></h4>
    </div>
</div>
<div class="row">
    @if(!empty($cartItems))
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row userInfo">
            <div class="col-xs-12 col-sm-12">
                <div class="cartContent w100">
                    <table class="cartTable table-responsive" style="width:100%">
                        <tbody>

                        <tr class="CartProduct cartTableHeader">
                            <td style="width:15%"> </td>
                            <td style="width:40%">Товар</td>
                            <td style="width:10%" class="delete">&nbsp;</td>
                            <td style="width:10%">Кол-во</td>
                            <td style="width:15%">Сумма</td>
                        </tr>
                        @foreach($cartItems as $arItem)
                        <tr class="CartProduct">
                            <td class="CartProductThumb">
                                @if(strlen($arItem->preview_picture) > 0)
                                    <div><a href="{{ $arItem->url }}"><img src="/uploads/{{ $arItem->preview_picture }}" alt="{{ $arItem->name }}"></a></div>
                                @endif
                            </td>
                            <td>
                                <div class="CartDescription">
                                    <h4><a href="{{ $arItem->url }}">{{ $arItem->name }} </a></h4>
                                    @if($arItem->size)
                                        <span class="size">Размер {{ $arItem->size }}</span>
                                    @endif

                                    <div class="price"><span>{{ $arItem->price_print}}</span></div>
                                </div>
                            </td>
                            <td class="delete"><a title="Delete" class="delete_main_item" data-basket-id="{{ $arItem->cart_id }}"> <i class="glyphicon glyphicon-trash fa-2x"></i></a></td>
                            <td><input class="quanitySniper" type="text" value="{{ $arItem->quantity }}" name="quantity_{{ $arItem->cart_id }}" data-basket-id="{{ $arItem->cart_id }}" disabled></td>
                            <td class="price">{{ $arItem->sum }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!--cartContent-->

                <div class="cartFooter w100">
                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="/catalog/" class="btn btn-default"> <i class="fa fa-arrow-left"></i> &nbsp; Продолжить покупки </a>
                            @if(Request::url() != 'http://baus.local/personal/order/make')
                                <a class="btn btn-primary" title="checkout" href="/personal/order/make/">Оформить заказ &nbsp;<i class="fa fa-arrow-right"></i> </a>
                            @endif
                        </div>
                        <div class="pull-right">
                            <strong class="lead">Итого: {{ $allSumFormatted }}</strong>
                        </div>
                    </div>
                </div>
                <!--/ cartFooter -->

            </div>
        </div>
        <!--/row end-->

    </div>

    @else
        <div class="">К сожалению, ваша корзина пуста</div>
    @endif

</div>
<!--/row-->

<div style="clear:both"></div>