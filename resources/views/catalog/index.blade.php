@extends('baus')

@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">


        </div>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="w100 clearfix category-top">
                <h2> Каталог </h2>

                <div class="categoryImage">
                    <a href="{{ url('aktsii') }}">
                        <img src="{{ asset('/images/new_banners/banner_catalog_2.jpg') }}" class="img-responsive" alt="img">
                    </a>
                </div>
            </div>
            <div class="w100 productFilter clearfix">
                <p class="pull-left"></p>

                <div class="pull-right ">
                    <div class="change-order pull-right">
                        <select class="form-control hidden-select" name="orderby" id="catalog_sort">
                            {{--<option value="" @ if(!$_REQUEST["sort"]): }} selected="selected" @ endif; }}>Выберите сортировку</option>--}}
                            {{--<option @if($_REQUEST["sort"]=="catalog_PRICE_1" && $_REQUEST["sort_order"] == "ASC"){echo "selected";}}} value="{{ $APPLICATION->GetCurPageParam("sort=catalog_PRICE_1&sort_order=ASC", array("sort", "sort_order")); }}">По цене: по возрастанию</option>--}}
                            {{--<option @if($_REQUEST["sort"]=="catalog_PRICE_1" && $_REQUEST["sort_order"] == "DESC"){echo "selected";}}} value="{{ $APPLICATION->GetCurPageParam("sort=catalog_PRICE_1&sort_order=DESC", array("sort", "sort_order")); }}">По цене: по убыванию</option>--}}
                            {{--<option @if($_REQUEST["sort"]=="show_counter" && $_REQUEST["sort_order"] == "DESC"){echo "selected";}}} value="{{ $APPLICATION->GetCurPageParam("sort=show_counter&sort_order=DESC", array("sort", "sort_order")); }}">Сортировка по популярности</option>--}}
                        </select>
                    </div>
                    <div class="change-view pull-right">
                        <a href="#" title="Grid" class="grid-view set_list_view" data-list-view="grid-view"><i class="fa fa-th-large"></i></a>
                        {{--<a href="#" title="List" class="list-view set_list_view @ if($_SESSION["view"] == "list-view"): }}active_catalog_view@endif;}}" data-list-view="list-view"><i class="fa fa-th-list"></i></a>--}}
                    </div>
                </div>
            </div>





            <div class="row  categoryProduct xsResponse clearfix">
                @if($products)
                    @foreach($products as $arItem)
                    <div class="item col-sm-6 col-lg-6 col-md-6 col-xs-6">
                        <div class="product" itemscope itemtype="http://schema.org/Product">
                            <div class="imageHover" style="max-height: 610px;">
                                <div class="quickview">
                                    <a title="Quick View" class="btn btn-xs  btn-quickview"
                                       data-target="#product-details-modal" data-toggle="modal" data-product-id="{{ $arItem->id }}"> Быстрый просмотр </a>
                                </div>
                                @if ($arItem->preview_picture)
                                    <a href="{{ $arItem->url }}">
                                        <img itemprop="image" src="/uploads/{{ $arItem->preview_picture }}" alt="{{ $arItem->name }}" class="img-responsive primaryImage">
                                        <img itemprop="image" src="/uploads/{{ $arItem->detail_picture }}" alt="{{ $arItem->name }}" class="img-responsive secondaryImage">
                                    </a>
                                @endif
                                <div class="promotion">
                                    @if ($arItem->is_new_product)
                                        <span class="new-product"> NEW</span>
                                    @endif
                                    {{--<span class="discount">{{ $arPrice["DISCOUNT_DIFF_PERCENT"]; }}% OFF</span>--}}
                                </div>
                            </div>
                            <div class="description">
                                <h4 itemprop="name"><a href="{{ $arItem->url }}">{{ $arItem->name }}</a></h4>
                                <br/>

                                <span class="size" itemprop="description">Размеры: {{ $arItem->available_sizes }}</span>
                            </div>

                            <div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                {{--@ if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]): }}--}}
                                {{--<meta itemprop="price" content="{{ $arPrice["DISCOUNT_VALUE"]; }}">--}}
                                {{--<meta itemprop="priceCurrency" content="{{ $arPrice["CURRENCY"]; }}">--}}
                                {{--<span>{{$arPrice["PRINT_DISCOUNT_VALUE"]; }}</span>--}}
                                {{--<span class="old-price">{{$arPrice["PRINT_VALUE"]; }}</span>--}}
                                {{--@ else: }}--}}
                                <meta itemprop="price" content="{{ $arItem->price }}">
                                <meta itemprop="priceCurrency" content="{{ $arItem->currency }}">
                                <span>{{ $arItem->price_print }}</span>
                                {{--@ endif }}--}}
                            </div>

                            <div class="action-control">
                                <a class="btn btn-primary" href="{{ $arItem->url }}">
                                    <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"></i> Купить </span>
                                </a>
                            </div>
                        </div>
    
                        <div style="display: none;" id="modal-card-{{$arItem->id }}">
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
                                                @foreach($arItem->sizes as $size): }}
                                                    <option data-max-quantity="{{ $size->quantity }}" value="{{ $size->name }}">{{ $size->name }}</option>
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

                @else
                    <p>В выбранной категории нет товаров</p>
                @endif

            </div>
            {!! $products->render() !!}




        </div>

    </div>
@endsection