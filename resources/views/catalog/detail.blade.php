@extends('baus')

@section('content')

<div class="row transitionfx" itemscope itemtype="http://schema.org/Product" id="product_card_container" data-product-id="{{ $product->id }}">

    <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="main-image sp-wrap col-lg-12 no-padding style2 style2look2">
            @if($product->preview_picture)
                <a href="/uploads/{{ $product->preview_picture }}">
                    <img itemprop="image" src="/uploads/{{ $product->preview_picture }}" class="img-responsive" alt="{{ $product->name }}">
                </a>
            @endif
            @if($product->detail_picture)
                <a href="/uploads/{{ $product->detail_picture }}">
                    <img itemprop="image" src="/uploads/{{ $product->detail_picture }}" class="img-responsive" alt="{{ $product->name }}">
                </a>
            @endif
        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-5">
        <div class="product-code">Артикул товара : {{ $product->id }}</div>

        <h1 class="product-title" itemprop="name"> {{ $product->name }}</h1>
        <div class="brand-name-in-product-card"><a href="{{ $product->brand_link }}">{{ $product->brand->name }}</a></div>
        <br/>
            <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <meta itemprop="price" content="{{ $product->price }}">
                    <meta itemprop="priceCurrency" content="{{ $product->currency }}">
                    <span class="price-sales"> {{ $product->price_print }}</span>
            </div>


            <div class="productFilter productFilterLook2">
                <div class="filterBox">
                    <p class="quantity-span">Размер:</p>
                    <select name="size" id="size_{{ $product->id }}">
                       @foreach($product->sizes as $size): }}
                           <option data-max-quantity="{{ $size->quantity }}" value="{{ $size->name }}">{{ $size->name }}</option>
                       @endforeach
                    </select>
                    @if (in_array($product->id, array(327, 328, 358, 359, 360, 361, 362, 363, 356, 357)))
                        <strong><a href="#myModalSizes" data-toggle="modal" data-target="#myModalSizes" style="font-size: 16px;">Как выбрать размер?</a></strong>
                    @endif
                </div>
            </div>

        <div class="cart-actions">
            <div class="addto">
                <button class="button btn-cart cart first add_to_cart" data-product-id="{{ $product->id }}"
                        title="Купить" type="button" data-in-cart-text="В корзине">Купить
                </button>
                <div class="callback">
                    <button type="button" data-target="#buy_in_one_click" class="button spec-grey" data-toggle="modal" data-product-id="{{ $product->id }}">Перезвоните мне</button>
                </div>
            </div>

            <div style="clear:both"></div>
            <h3 class="incaps"><i class="fa fa fa-check-circle-o color-in"></i> Есть в наличии</h3>
            {{--<h3 class="incaps"><i class="fa fa-minus-circle color-out"></i> Нет в наличии</h3>--}}


        </div>
        <div class="details-description" itemprop="description">
            <div><?= html_entity_decode($product->detail_text); ?></div>
        </div>
        <div class="clear"></div>

        <div class="product-tab w100 clearfix" itemprop="description">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Доставка</a></li>
                <li><a href="#size" data-toggle="tab">Возврат</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    <br/>
                    <p>Бесплатная по Москве и Санкт-Петербургу. <br/>О доставке в другие регионы читайте на странице <a href="/about/delivery/"><b>правила доставки</b></a></p>

                </div>
                <div class="tab-pane" id="size">
                    <p>Если вещь вам не подойдет или не понравится, то, при условии сохранения потребительских свойств и товарного вида, вы сможете без труда вернуть
                        ее нам в течение 14 дней после покупки.<br/> <a href="/about/refund/"><b>Подробнее о возврате</b></a></p>
                </div>


            </div>

        </div>


        <div class="product-share clearfix">
            <p> Поделиться </p>

            <div class="socialIcon">
                <div class="addthis_sharing_toolbox"></div>
            </div>
        </div>

    </div>

</div>


@endsection