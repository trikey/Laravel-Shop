
<div class="morePost row featuredPostContainer style2 globalPaddingTop ">
    <h3 class="section-title style2 text-center"><span>Хиты продаж</span></h3>

    <div class="container">
        <div class="row xsResponse">
        @foreach($saleLeaderProducts as $arItem)
            <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6" style="height: 560px;">
                <div class="product" itemscope itemtype="http://schema.org/Product">
                    <div class="image">
                        <div class="quickview">
                            <a title="Quick View" class="btn btn-xs  btn-quickview"
                               data-target="#product-details-modal" data-toggle="modal" data-product-id="{{ $arItem->id }}"> Быстрый просмотр </a>
                        </div>
                        @if (strlen($arItem->preview_picture) > 0)
                            <a href="{{ $arItem->url }}">
                                <img itemprop="image" src="/uploads/{{ $arItem->preview_picture }}" alt="{{ $arItem->name }}" class="img-responsive">
                            </a>
                        @elseif (strlen($arItem->detail_picture) > 0): ?>
                            <a href="{{ $arItem->url }}">
                                <img itemprop="image" src="/uploads/{{ $arItem->detail_picture }}" alt="{{ $arItem->name }}" class="img-responsive">
                            </a>
                        @endif
                        <div class="promotion">
                            @if($arItem->is_new_product)
                                <span class="new-product"> NEW</span>
                            @endif
                            {{--<span class="discount">% OFF</span>--}}
                        </div>
                    </div>
                    <div class="description" style="min-height: 60px;">
                        <h4 itemprop="name"><a href="{{ $arItem->url }}">{{ $arItem->name }}</a></h4>

                    </div>
                    <div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <meta itemprop="price" content="{{ $arItem->price }}">
                        <meta itemprop="priceCurrency" content="{{ $arItem->currency }}">
                        <span>{{ $arItem->price_print }}</span>
                    </div>
                    <div class="action-control">
                        <a class="btn btn-primary" href="{{ $arItem->url }}">
                            <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"></i> Купить </span>
                        </a>
                    </div>
                </div>

                <div style="display: none;" id="modal-card-{{ $arItem->id }}">
                    <div class="col-lg-5 col-md-5 col-sm-5  col-xs-12 modal-card-img-container">

                        <div class="main-image  col-lg-12 no-padding style3">
                            @if(strlen($arItem->preview_picture) > 0)
                                <a class="product-largeimg-link" href="{{ $arItem->id }}">
                                    <img src="/uploads/{{ $arItem->preview_picture }}" class="img-responsive product-largeimg" alt="{{ $arItem->name }}" />
                                </a>
                            @elseif(strlen($arItem->detail_picture))
                                <a class="product-largeimg-link" href="{{ $arItem->id }}">
                                    <img src="/uploads/{{ $arItem->detail_picture }}" class="img-responsive product-largeimg" alt="{{ $arItem->name }}" />
                                </a>
                            @endif
                        </div>

                        <div class="modal-product-thumb">
                            @if(strlen($arItem->preview_picture) > 0)
                                <a class="thumbLink selected">
                                    <img data-large="/uploads/{{ $arItem->preview_picture }}" alt="{{ $arItem->name }}" class="img-responsive" src="/uploads/{{ $arItem->preview_picture }}" />
                                </a>
                            @endif
                            @if(strlen($arItem->detail_picture) > 0)
                                <a class="thumbLink">
                                    <img data-large="/uploads/{{ $arItem->detail_picture }}" alt="{{ $arItem->name }}" class="img-responsive" src="/uploads/{{ $arItem->detail_picture }}" />
                                </a>
                            @endif
                        </div>
                    </div>


                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 modal-details no-padding">
                        <div class="modal-details-inner">
                            <h1 class="product-title">{{ $arItem->name }}</h1>

                            <div class="product-price">
                                {{--@ if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]): }}--}}
                                {{--<span class="price-sales">{{$arPrice["PRINT_DISCOUNT_VALUE"]; }}</span>--}}
                                {{--<span class="price-standard">{{$arPrice["PRINT_VALUE"]; }}</span>--}}
                                {{--@ else: }}--}}
                                <span class="price-sales">{{ $arItem->price_print }}</span>
                                {{--@ endif }}--}}
                            </div>
                            <div class="details-description">
                                <p>{{ $arItem->preview_text }} </p>
                            </div>


                            <div class="productFilter productFilterLook2">
                                <div class="filterBox">
                                    <p class="quantity-span">Размер:</p>

                                    <select name="size" class="hidden-select" id="size_{{ $arItem->id }}">
                                    <? $selected = false; ?>
                                        @foreach($arItem->sizes as $size)
                                            <option data-max-quantity="{{ $size->quantity }}" @if(!$selected) <? $selected = true; ?> selected="selected"@endif value="{{ $size->name }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="cart-actions">
                                <div class="addto">
                                    <button class="button btn-cart cart first add_to_cart" title="В корзину" type="button" data-product-id="{{ $arItem->id }}" data-in-cart-text="В корзине">Купить</button>
                                </div>
                            </div>

                            <div class="product-share clearfix">
                                <p> Поделиться </p>

                                <div class="socialIcon">
                                    <div class="addthis_sharing_toolbox2" data-url="http://{{ $_SERVER["SERVER_NAME"].$arItem->url }}" data-title="{{ $arItem->name }}" data-description="{{ strip_tags($arItem->preview_text) }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
        <!-- /.row -->

        <div class="row">
            <div class="load-more-block text-center">
                <a class="btn btn-thin" href="/catalog/muzhskoe/"> <i class="fa fa-plus-sign">+</i> Смотреть все мужские товары</a>
                <a class="btn btn-thin" href="/catalog/zhenskoe/"> <i class="fa fa-plus-sign">+</i> Смотреть все женские товары</a>
            </div>
        </div>
    </div>
    <!--/.container-->
</div>