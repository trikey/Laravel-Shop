<div class="nav navbar-nav navbar-right hidden-xs">
    <div class="dropdown  cartMenu " id="top_cart_desctop">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-shopping-cart"> </i>
            <span class="cartRespons"> Корзина ({{ $allSumFormatted }}) </span>
            <b class="caret"> </b>
        </a>

        <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
            @if(!empty($cartItems))

            <div class="w100 miniCartTable scroll-pane">
                <table>
                    <tbody>
                        @foreach($cartItems as $arItem)
                            <tr class="miniCartProduct">
                                <td style="width:20%" class="miniCartProductThumb">
                                    @if($arItem->preview_picture)
                                        <div><a href="{{ $arItem->url }}"> <img src="/uploads/{{ $arItem->preview_picture }}" alt="{{ $arItem->name }}"> </a></div>
                                    @endif
                                </td>
                                <td style="width:40%">
                                    <div class="miniCartDescription">
                                        <h4><a href="{{ $arItem->url }}"> {{ $arItem->name }} </a></h4>
                                        @if($arItem->size)
                                            <span class="size">Размер {{ $arItem->size }}</span>
                                        @endif

                                        <div class="price"><span> {{ $arItem->price_print }} </span></div>
                                    </div>
                                </td>
                                <td style="width:10%" class="miniCartQuantity"><a>{{ $arItem->quantity }} </a></td>
                                <td style="width:15%" class="miniCartSubtotal"><span> {{ $arItem->sum }} </span></td>
                                <td style="width:5%" class="delete"><a class="delete_cart_item" data-basket-id="{{ $arItem->cart_id }}"> x </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="miniCartFooter text-right">
                <h3 class="text-right subtotal">

                    Итого: {{ $allSumFormatted }}
                </h3>
                <a class="btn btn-sm btn-primary" href="/personal/cart" onclick="window.location=$(this).attr('href');"> В корзину </a>
                <a class="btn btn-sm btn-danger" href="/personal/order/make" onclick="window.location=$(this).attr('href');"> <i class="fa fa-shopping-cart"> </i> Оформить заказ </a>
            </div>
            @else
                <p class="center-block margin-left-10px">Ваша корзина пуста</p>
            @endif

        </div>
    </div>

</div>
<div class="navbar-cart  collapse">
    <div class="cartMenu  col-lg-4 col-xs-12 col-md-4 ">
        @if(!empty($cartItems))

            <div class="w100 miniCartTable scroll-pane">
                <table>
                    <tbody>
                        @foreach($cartItems as $arItem)
                            <tr class="miniCartProduct">
                                <td style="width: 0%" class="miniCartProductThumb">
                                    @if($arItem->preview_picture)
                                        <div><a href="{{ $arItem->url }}"> <img src="/uploads/{{ $arItem->preview_picture }}" alt="{{ $arItem->name }}"> </a></div>
                                    @endif
                                </td>
                                <td style="width: 40%">
                                    <div class="miniCartDescription">
                                        <h4><a href="{{ $arItem->url }}"> {{ $arItem->name }} </a></h4>
                                        @if($arItem->size)
                                            <span class="size">Размер {{ $arItem->size }}</span>
                                        @endif

                                        <div class="price"><span> {{ $arItem->price_print }} </span></div>
                                    </div>
                                </td>
                                <td style="width: 10%" class="miniCartQuantity"><a>{{ $arItem->quantity }} </a></td>
                                <td style="width: 15%" class="miniCartSubtotal"><span> {{ $arItem->sum }} </span></td>
                                <td style="width: 5%" class="delete"><a class="delete_cart_item" data-basket-id="{{ $arItem->cart_id }}"> x </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        <div class="miniCartFooter  miniCartFooterInMobile text-right">
            <h3 class="text-right subtotal">
                Итого: {{ $allSumFormatted }}
            </h3>
            <a class="btn btn-sm btn-danger" href="/personal/cart" onclick="window.location=$(this).attr('href');"> <i class="fa fa-shopping-cart"> </i> Оформить заказ </a>
        </div>

        @else
            <p class="center-block margin-left-10px">Ваша корзина пуста</p>
        @endif

    </div>
</div>