<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="shortcut icon" href="/ico.png">
    <title>@yield('meta_title')</title>
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta name="description" content="@yield('meta_description')" />

    <!--[if lt IE 9]>
    <script src="{{ asset('/js/html5shiv.js') }}"></script>
    <script src="{{ asset('/js/respond.min.js') }}"></script>
    <![endif]-->


    <link href="{{ asset('/assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/css/idangerous.swiper.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom_css.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/smoothproducts.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/pager.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/skin-6.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-slider.css') }}"/>
    <script type="text/javascript" src="{{ asset('/assets/js/jquery/jquery-1.10.1.min.js') }}"></script>

</head>


<body class="header-version-2">
<div class="hidden-xs floating-social-menu">
@include('socials/socnet_header')
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5606a674f234f9d4" async="async"></script>
<div class="bs-example top-132 hide" id="added-to-cart">
    <div class="alert alert-success fade in">
        <a href="#" class="close" onclick="$('#added-to-cart').addClass('hide');">&times;</a>
        Такого количества товара нет в наличии
    </div>
</div>

@if(Auth::guest())
    @include('authorization/modal')
    @include('authorization/register')
@endif


<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
<div class="navbar-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">

            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
                <div class="pull-right">
                    <ul class="userMenu">
                        @if (!Auth::guest())
                            <li><a href="personal/"><span class="hidden-xs">Здравствуйте, {{ Auth::user()->name }}!</span></a></li>
                            <li><a href="personal/"><span class="hidden-xs"> Мой кабинет</span> <i class="glyphicon glyphicon-user hide visible-xs "></i></a></li>
                            <li><a href="?logout=yes"><span class="hidden-xs"> Выйти </span> <i class="hide visible-xs ">Выйти</i></a></li>
                        @else
                            <li>
                                <a href="#" data-toggle="modal" data-target="#ModalLogin">
                                    <span class="hidden-xs">Войти</span>
                                    <i class="glyphicon glyphicon-log-in hide visible-xs "></i>
                                </a>
                            </li>
                            <li class="hidden-xs"><a href="#" data-toggle="modal" data-target="#ModalSignup" id="register-popup"> Зарегистрироваться </a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.navbar-top-->

<div class="w100 brandWrap">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span></button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart"><i class="fa fa-shopping-cart colorWhite"> </i> <span class="cartRespons colorWhite"> Корзина <span id="top_cart_total"></span> </span>
            </button>
            <a class="navbar-brand " href="{{ url('/') }}"> <img src="{{ asset('/img/thebaus.png') }}" alt="THE BAUS"> </a>

            <!-- this part for mobile -->
            <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                <div class="input-group">
                    <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                </div>
                <!-- /input-group -->

            </div>
        </div>
        <div class="pull-right hidden-xs" itemscope itemtype="http://schema.org/WebSite">
            <meta itemprop="url" content="http://thebaus.ru/"/>
            <form action="{{url('/search')}}" method="get" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
                <meta itemprop="target" content="http://thebaus.ru/search/?q={q}"/>
                <input type="text" name="q"  itemprop="query-input" placeholder="Поиск" class="search-input-new" />
                <div class="search-box2" onclick="$(this).parents('form').submit();">
                    <div class="input-group">
                        <button class="btn btn-nobg getFullSearch btn-search-fix" type="button"><i class="fa fa-search"> </i>
                        </button>
                    </div>
                    <input type="submit" style="display: none;"/>

                </div>
            </form>
        </div>
        <!--- navbar social icon || this part will be hidden on mobile version -->

        <!--/.navbar-right || social icon end-->
    </div>
</div>
<!-- /w100 -->

<div class="w100 menuWrap">
<div class="container">

<!-- this part is duplicate from cartMenu  keep it for mobile -->

<!--/.navbar-cart-->

<div class="navbar-collapse collapse">
    @include('_partials/menu', ['items'=> $menu_example->roots()])
    {{--{!! $menu_example->asUl() !!}--}}

<!--/.navbar-nav hidden-xs-->

<!--- this part will be hidden for mobile version -->

</div>

<div id="top_cart">
cart
</div>
<!--/.nav-collapse -->

</div>
<!--/.container -->

<div class="search-full text-right">
    <a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i></a>

    <div class="searchInputBox pull-right">
        <form action="search/" method="get">
        <input type="search" data-searchurl="search?=" name="q" placeholder="Начните писать и нажмите Enter" class="search-input">
        <button class="btn-nobg search-btn" type="submit"><i class="fa fa-search"> </i></button>
        </form>
    </div>
</div>
<!--/.search-full ||  search form here-->

</div>
<!--/.w100-full-->

</div>

@if(Request::url() != 'http://baus.local')
<div class="container main-container headerOffset">
{!! Breadcrumbs::render() !!}
@endif

@yield('content')

@if(Request::url() != 'http://baus.local')
</div>
@endif

<div class="gap"></div>

@include('catalog/callback_form')

<div class="modal fade" id="product-details-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button"> ×</button>
            <div id="product-card-content">

            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> Контакты </h3>
                    <ul>
                        <li class="supportLi">
                            <p> Возникли вопросы или пожелания? <br/>Звоните нам </p>
                            <h4><a class="inline" href="callto:+79219007174"> <strong> <i class="fa fa-phone"> </i> +7 921 900 71 74</strong> </a></h4>
                            <p>Только по рабочим дням с 12 до 20</p>
<!--                            <p class="text-primary"><b>Заказы по телефону принимаются с 11 января.</b></p>-->
                            <h4><a class="inline" href="mailto:qa@thebaus.ru"> <i class="fa fa-envelope-o"> </i>
                                    qa@thebaus.ru </a></h4>
                            <p style="
    font-size: 10px;
">Название компании: ООО «Компания БАУС»
                                <br>
                                ИНН/КПП:	7838044880/783801001
                                <br>
                                ОГРН - 1157847371560
                                <br>
                                Юридический адрес: 190031, САНКТ-ПЕТЕРБУРГ г, наб. РЕКИ ФОНТАНКИ, дом ДОМ 113, кор. ЛИТЕР А, кв. ПОМЕЩЕНИЕ 18-Н</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Товары </h3>
                    <ul>
                        <li><a href="/aktsii/"> Акции </a></li>
                        <li><a href="/catalog/zhenskoe/"> Женское </a></li>
                        <li><a href="/catalog/muzhskoe/"> Мужское </a></li>
                    </ul>
                </div>

                <div style="clear:both" class="hide visible-xs"></div>

                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> О магазине </h3>
                    <ul>
                        <li><a href="about/"> О магазине </a></li>
                        <li><a href="about/contacts/"> Контакты </a></li>
                        <li><a href="about/payment/"> Оплата </a></li>
                        <li><a href="about/refund/"> Обмен и возврат </a></li>
                        <li><a href="upload/oferta.rtf" target="_blank"> Договор-оферта </a></li>
<!--                        <li><a href="--><?//= SITE_DIR; ?><!--about/faq/"> Часто задаваемые вопросы </a></li>-->
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Мой кабинет </h3>
                    <ul>
                        <li><a href="personal/"> Войти в кабинет </a></li>
                        <li><a href="personal/profile/"> Личная информация </a></li>
                        <li><a href="personal/order/"> Список моих заказов </a></li>
<!--                        <li><a href="--><?//= SITE_DIR; ?><!--personal/order/status/"> Узнать статус заказа </a></li>-->
                    </ul>
                </div>

                <div style="clear:both" class="hide visible-xs"></div>

                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    @include('subscribe/form_footer')
                    <ul class="social">
                        <li><a href="https://vk.com/thebaus" target="_blank"> <i class="fa fa-vk"> &nbsp; </i> </a></li>
                        <li><a href="https://www.facebook.com/The-BAUS-1669536626668913/" target="_blank"> <i class=" fa fa-facebook"> &nbsp; </i> </a></li>
<!--                        <li><a href="http://twitter.com"> <i class="fa fa-twitter"> &nbsp; </i> </a></li>-->
<!--                        <li><a href="https://plus.google.com"> <i class="fa fa-google-plus"> &nbsp; </i> </a></li>-->
                        <li><a target="_blank" href="https://www.instagram.com/thebaus.ru/"> <i class="fa fa-linkedin"> &nbsp; </i> </a></li>
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> &copy; The BAUS <?= date("Y", time()); ?>. All right reserved. </p>
            <div class="pull-left" id="bx-composite-banner"></div>
            <div class="pull-right paymentMethodImg">

                    <img src="https://www.moneta.ru/info/public/requirements/visa.png">
                    <img src="https://www.moneta.ru/info/public/requirements/mastercard.png">
                <img height="40" class="pull-right" src="{{ asset('/img/footer-logo-payanyway.png') }}" alt="payanyway" />
            </div>
        </div>
    </div>
    <!--/.footer-bottom-->
</footer>
<script src="{{ asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/idangerous.swiper-2.1.min.js') }}"></script>

<!-- include jqueryCycle plugin -->
<script src="{{ asset('/assets/js/jquery.cycle2.min.js') }}"></script>

<!-- include jquery maskedinput plugin -->
<script src="{{ asset('/js/jquery.maskedinput.min.js') }}"></script>

<!-- include easing plugin -->
<script src="{{ asset('/assets/js/jquery.easing.1.3.js') }}"></script>

<!-- include  parallax plugin -->
<script type="text/javascript" src="{{ asset('/assets/js/jquery.parallax-1.1.js') }}"></script>

<!-- optionally include helper plugins -->
<script type="text/javascript" src="{{ asset('/assets/js/helper-plugins/jquery.mousewheel.min.js') }}"></script>

<!-- include mCustomScrollbar plugin //Custom Scrollbar  -->

<script type="text/javascript" src="{{ asset('/assets/js/jquery.mCustomScrollbar.js') }}"></script>

<!-- include checkRadio plugin //Custom check & Radio  -->
<script type="text/javascript" src="{{ asset('/assets/js/ion-checkRadio/ion.checkRadio.js') }}"></script>
<!--    <script type="text/javascript" src="--><?//= SITE_TEMPLATE_PATH; ?><!--/assets/js/ion-checkRadio/ion.checkRadio.min.js"></script>-->

<!-- include grid.js // for equal Div height  -->
<script src="{{ asset('/assets/js/grids.js') }}"></script>

<!-- include carousel slider plugin  -->
<script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>

<!-- jQuery minimalect // custom select   -->
<script src="{{ asset('/assets/js/jquery.minimalect.min.js') }}"></script>

<!-- include touchspin.js // touch friendly input spinner component   -->
<script src="{{ asset('/assets/js/bootstrap.touchspin.js') }}"></script>

<!-- include custom script for only homepage  -->
<!--<script src="--><?//= SITE_TEMPLATE_PATH; ?><!--/assets/js/home.js"></script>-->

<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>

<!-- include smoothproducts // product zoom plugin  -->
<!--    <script type="text/javascript" src="--><?//= SITE_TEMPLATE_PATH; ?><!--/assets/js/smoothproducts.min.js"></script>-->

<!-- include custom script for site  -->
<!--<script src="--><?//= SITE_TEMPLATE_PATH; ?><!--/assets/js/script.js?--><?//=time(); ?><!--"></script>-->
<script src="{{ asset('/assets/js/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap-slider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/application.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/catalog_element.js') }}"></script>



</body>
</html>
