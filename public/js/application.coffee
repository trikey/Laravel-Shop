$ ->
    $.ajaxSetup
        headers:
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    getTopCart = ->
        $.ajax
            url: "/ajax/cart/getsmall"
            data:
                act: "get_top_cart"
            type: "GET"
            success: (data) ->
                $("#top_cart").html data;
                updateScrollBars()

    getOrder = ->
        $.ajax
            url: "/ajax/cart/getorder"
            data:
                act: "get_order"
            type: "POST"
            success: (data) ->
                $('#order_component').html(data)
                $("input[type='radio'], input[type='checkbox']").ionCheckRadio()

    #    update scroll bars after added to cart
    cart_path = '/personal/cart/'
    updateScrollBars = ->
        $(".scroll-pane").mCustomScrollbar
            advanced:
                updateOnContentResize: true
            scrollButtons:
                enable: false
            mouseWheelPixels: "200"
            theme: "dark-2"
        $(".smoothscroll").mCustomScrollbar
            advanced:
                updateOnContentResize: true
            scrollButtons:
                enable: false
            mouseWheelPixels: "100"
            theme: "dark-2"

    touchSpin = ->
        $(".quanitySniper").TouchSpin
            buttondown_class: "btn btn-link"
            buttonup_class: "btn btn-link"

    $(document).on "click", ".add_to_cart", ->
        product_id = $(this).attr "data-product-id"
        quantity = $("#quantity_#{product_id}").val()
        $this = $(this)
        if $("#product-details-modal #size_#{product_id}").length
            size = $("#product-details-modal #size_#{product_id}").find("option:selected").val()
        else
            size = $("#size_#{product_id}").find("option:selected").val()
        max_quantity = $("#size_#{product_id}").find("option:selected").attr('data-max-quantity')
        if(quantity > max_quantity)
            $("#added-to-cart").css('top', $(this).offset().top + 'px')
            $("#added-to-cart").removeClass "hide";
            setTimeout ( ->
                $("#added-to-cart").addClass "hide";
            ), 3000
            return false


        $.ajax
            url: "/ajax/cart/add"
            data:
                act: "add2cart",
                product_id: product_id,
                quantity: quantity,
                props:
                    size: size
            type: "POST"
            success: (data, textStatus, jqXHR) ->
                $("#top_cart").html data;
                updateScrollBars()
                $this.die("click")
                $this.text($this.attr("data-in-cart-text")).removeClass('add_to_cart').addClass('in-cart').off().addClass('to_cart')
#                $("#added-to-cart").removeClass "hide";
#                setTimeout ( ->
#                    $("#added-to-cart").addClass "hide";
#                ), 3000
        false

    $(document).on 'click', '.to_cart', ->
        window.location = cart_path
        false

    $(".form_auth_wide").validate
        submitHandler: (form) ->
            $.ajax
                type: "post"
                data: $(".form_auth_wide").serialize()
                url: "/ajax/login.php"
                dataType: "json"
                success: (data, textStatus, jqXHR) ->
                    if data.status == "success"
                        window.location.reload()
                    else
                        $("#auth_errors_wide")
                            .html data.info
                            .show();
            false

    $(".form_auth").validate
        submitHandler: (form) ->
            $.ajax
                type: "post"
                data: $(".form_auth").serialize()
                url: "/ajax/login.php"
                dataType: "json"
                success: (data, textStatus, jqXHR) ->
                    if data.status == "success"
                        window.location.reload()
                    else
                        $("#auth_errors")
                        .html data.info
                        .show();
            false

    $(".form_register").validate
        submitHandler: (form) ->
            $.ajax
                type: "post"
                data: $(".form_register").serialize()
                url: "/ajax/register.php"
                dataType: "json"
                success: (data, textStatus, jqXHR) ->
                    if data.status == "success"
                        window.location.reload()
                    else
                        $("#register_errors")
                        .html data.info
                        .show();
            false

    $('#product-details-modal').on 'show.bs.modal', (event) ->
        button = $(event.relatedTarget)
        product_card = button.data 'product-id'
        console.log(product_card)
        $("#product-card-content")
            .html $("#modal-card-#{product_card}").html();
        $("#product-details-modal select").minimalect();

        $("#product-card-content").find(".addthis_sharing_toolbox2").addClass("addthis_sharing_toolbox")
        script = 'http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5606a674f234f9d4';
        if (window.addthis)
            window.addthis = null
            window._adr = null
            window._atc = null
            window._atd = null
            window._ate = null
            window._atr = null
            window._atw = null
        $.getScript(script);


    if (swiper_container = $(".swiper-container")).length
        mySwiper = new Swiper ".swiper-container",
            pagination: ".box-pagination"
            keyboardControl: true
            paginationClickable: true
            slidesPerView: 'auto'
            autoResize: true
            resizeReInit: true

        $('.prevControl').on "click", (e) ->
            e.preventDefault();
            mySwiper.swipePrev()

        $('.nextControl').on "click", (e) ->
            e.preventDefault();
            mySwiper.swipeNext()


    $(document).on "click", ".search-box .getFullSearch", (e) ->
        $('.search-full').addClass "active"
        e.preventDefault();



    $(document).on "click", ".delete_cart_item", ->
        basket_id = $(this).attr "data-basket-id";
        $.ajax
            url: "/ajax/cart/delete"
            data:
                act: "delete"
                basket_id: basket_id
            type: "POST"
        .done (data) ->
            $("#top_cart").html(data)
            $('#top_cart_desctop').addClass('hover')
            updateScrollBars()
            $.ajax
                url: "/ajax/cart/getbig"
                data:
                    act: "get_cart"
                type: "POST"
            .done (data) ->
                $("#main_cart").html(data)
                touchSpin()
                getOrder()
        false

    $(document).on('mouseover', '#top_cart_desctop', (e) ->
        $(this).addClass('hover')
    )

    $(document).on('mouseout', '#top_cart_desctop', (e) ->
        $(this).removeClass('hover')
    )

    timer = 0
    doneClickingInterval = 500
    touchSpin()

    $(document).on "change", ".quanitySniper", ->
        clearTimeout(timer);
        $this = $(this);
        basket_id = $this.attr "data-basket-id";
        quantity = $this.val();
        timer = setTimeout ( ->
            $.ajax
                url: "/ajax/cart/update"
                data:
                    basket_id: basket_id
                    act: "main_update"
                    quantity: quantity
                type: "POST"
            .done (data) ->
                $("#main_cart").html(data)
                touchSpin()
                getTopCart()
                getOrder()
        ), doneClickingInterval


    $(document).on "click", ".delete_main_item", ->
        basket_id = $(this).attr "data-basket-id"
        $.ajax
            url: "/ajax/cart/delete"
            data:
                act: "main_delete"
                basket_id: basket_id
            type: "POST"
        .done (data) ->
            $("#main_cart").html(data);
            touchSpin()
            getTopCart()
            getOrder()
        false

    $(document).on "click", "#coupon_apply", ->
        coupon = $(".coupon_in_cart").val()
        $.ajax
            url: "/ajax/cart.php"
            data:
                coupon:coupon
                act:"apply_coupon"
            type: "POST"
        .done (data) ->
            $("#main_cart").html(data);
            touchSpin()
            getTopCart()
            getOrder()
        false


    $(window).load ->
        updateScrollBars()
        $("select")
            .not ".hidden-select"
            .minimalect();
        $("#catalog_sort").minimalect
            onchange: (value, text) ->
                window.location = value


#    NEW ARRIVALS Carousel
    $("#productslider").owlCarousel
        pagination: false,
        navigation: true,
        navigationText: ['<', '>'],
        items: 4,
        itemsTablet: [768, 2]

    owl = $(".brand-carousel")
    owl.owlCarousel
        navigation: false,
        pagination: false,
        items: 8,
        itemsTablet: [768, 4],
        itemsMobile: [400, 2]

    $("#nextBrand").click ->
        owl.trigger('owl.next')

    $("#prevBrand").click ->
        owl.trigger('owl.prev')


    $("#SimilarProductSlider").owlCarousel
        navigation: true
        navigationText: ['<', '>']

    pshowcase = $("#productShowCase")
    pshowcase.owlCarousel
        autoPlay: 4000,
        stopOnHover: true,
        navigation: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: true,
        autoHeight: true

    $("#ps-next").click ->
        pshowcase.trigger('owl.next')

    $("#ps-prev").click ->
        pshowcase.trigger('owl.prev')

    imageShowCase = $("#imageShowCase")
    imageShowCase.owlCarousel
        autoPlay: 4000,
        stopOnHover: true,
        navigation: false,
        pagination: false,
        paginationSpeed: 1000,
        goToFirstSpeed: 2000,
        singleItem: true,
        autoHeight: true

    $("#ps-next").click ->
        imageShowCase.trigger('owl.next')

    $("#ps-prev").click ->
        imageShowCase.trigger('owl.prev')

    $('.categoryProduct > .item').responsiveEqualHeightGrid()
    $('.thumbnail.equalheight').responsiveEqualHeightGrid()
    $('.featuredImgLook2 .inner').responsiveEqualHeightGrid()
    $('.featuredImageLook3 .inner').responsiveEqualHeightGrid()

    $(document).on "click", ".modal-product-thumb a", ->
        largeImage = $(this).find("img").attr('data-large')
        $(this).parents(".modal-card-img-container").find(".product-largeimg").attr('src', largeImage)
        $(".zoomImg").attr('src', largeImage)

    $('.collapseWill').on 'click', (e) ->
        $(this).toggleClass("pressed")
        e.preventDefault()


    $('.search-close').on 'click', (e) ->
        $('.search-full').removeClass("active")
        e.preventDefault()

    $(".dropdown-tree-a").click ->
        $(this).parent('.dropdown-tree').toggleClass("open-tree active")


    $('.add-fav').click (e) ->
        e.preventDefault();
        $(this).addClass("active")
        $(this).attr('data-original-title', 'Added to Wishlist')

    $(".change-view .list-view, .change-view-flat .list-view").click (e) ->
        e.preventDefault()
        $('.item').addClass("list-view")
        $('.add-fav').attr("data-placement", $(this).attr("left"))
        $('.categoryProduct > .item').detectGridColumns()

    $(".change-view .grid-view, .change-view-flat .grid-view").click (e) ->
        e.preventDefault()
        $('.item').removeClass("list-view")
        $('.categoryProduct > .item').detectGridColumns()
        setTimeout ( ->
            $('.categoryProduct > .item').responsiveEqualHeightGrid()
        ), 500


    $(document).on "click", ".swatches li", ->
        $(this).parent().find("li").removeClass("selected")
        $(this).addClass('selected')

    $(".modal-product-thumb a").click ->
        $(".modal-product-thumb a.selected").removeClass("selected")
        $(this).addClass('selected')


    $('.navbar-brand').addClass('windowsphone') if (/IEMobile/i.test(navigator.userAgent))


    isMobile = ->
        return /(iphone|ipod|ipad|android|blackberry|windows ce|palm|symbian)/i.test(navigator.userAgent);


    if isMobile()
        $('.introContent').addClass('ismobile')
    else
        tshopScroll = 0;
        $(window).scroll (event) ->
            ts = $(this).scrollTop()

            if (ts > tshopScroll)
                $('.navbar').addClass('stuck')
            else
                $('.navbar').removeClass('stuck')

            if (ts < 600)
                $('.navbar').removeClass('stuck')

            tshopScroll = ts



    if /iPhone|iPad|iPod/i.test(navigator.userAgent)
        $('.parallax-section').addClass('isios')
        $('.navbar-header').addClass('isios')
        $('.blog-intro').addClass('isios')

    if /Android|IEMobile|Opera Mini/i.test(navigator.userAgent)
        $('.parallax-section').addClass('isandroid')

    if /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
        $('.parallax-section').addClass('ismobile')
        $('.parallaximg').addClass('ismobile')
    else
        $(window).bind 'scroll', (e) ->
            parallaxScroll()

        parallaxScroll = ->
            scrolledY = $(window).scrollTop()
            sc = ((scrolledY * 0.3)) + 'px'
            $('.parallaximg').css('marginTop', '' + ((scrolledY * 0.3)) + 'px')

        if $(window).width() < 768
        else
            $('.parallax-image-aboutus').parallax("50%", 0, 0.2, true)
            $('.parallaxbg').parallax("50%", 0, 0.2, true)

    window.onload = ->
        $(window).scroll ->
            if $(window).scrollTop() > 86
                $('.parallax-image-aboutus .animated').removeClass('fadeInDown')
                $('.parallax-image-aboutus .animated').addClass('fadeOutUp')
            else
                $('.parallax-image-aboutus .animated').addClass('fadeInDown')
                $('.parallax-image-aboutus .animated').removeClass('fadeOutUp')

            if ($(window).scrollTop() > 250)
            else


    if $(window).width() < 989
        $('.collapseWill').trigger('click')
    else

    $(".tbtn").click ->
        $(".themeControll").toggleClass("active")

    $("input[type='radio'], input[type='checkbox']").ionCheckRadio()

    $('.tooltipHere').tooltip('hide')

    options = []

    $('.dropdown-menu').find('input').click (e) ->
        e.stopPropagation();

    $(".scrollto").click (event) ->
        event.preventDefault();
        dest = 0;
        if $(this.hash).offset().top > $(document).height() - $(window).height()
            dest = $(document).height() - $(window).height()
        else
            dest = $(this.hash).offset().top

        $('html,body').animate({scrollTop: dest - 51}, 1000, 'swing')


    $(".tablebodytext").remove()

    $("#ex2").slider()
    $("#ex2").on(
        'slideStop', (event) ->
            vals = event.value;
            $('.filter_min_price').val(vals[0])
            $('.filter_min_price').trigger('keyup')
            $('.filter_max_price').val(vals[1])
            $('.filter_max_price').trigger('keyup')
    )

    $('.set_list_view').click ->
        view = $(this).data('list-view')
        $.ajax
            type: 'post'
            data:
                view: view
            url: '/ajax/set_view.php'

    if($('.active_catalog_view').length > 0)
        $('.item').addClass('list-view')

    $("#buy_one_click_phone").mask("+7 (999) 999-9999");

    $('#buy_in_one_click').on 'show.bs.modal', (event) ->
        button = $(event.relatedTarget)
        product_card = button.data 'product-id'
        $('#buy_in_one_click_product_id').val(product_card)
        $('#product-details-modal').modal('hide')

    $('#buy_in_one_click_submit_btn').click ->
        form = $('#buy_in_one_click_form')
        thanks = $('#thanks_buy_one_click')
        error = false
        form.find('input[type=text].required').each ->
            if $(this).val().length
                $(this).parent().removeClass('has-error')
            else
                $(this).parent().addClass('has-error')
                error = true
        .promise().done ->
            if !error
                $.ajax
                    type: 'post'
                    data: form.serialize()
                    url: form.attr('action')
                .done (data) ->
                    form.hide()
                    thanks.show()
                    $("body").append(data)
                    text = 'good'
        false


    $('.slider-v1').cycle
        fx: 'scrollHorz'
        slides: '.slider-item'
        timeout: 200000
        speed: 1200
        easeIn: 'easeInOutExpo'
        easeOut: 'easeInOutExpo'
        pager: '#pager2'

#    $('.order_method').change ->
#        val = $(this).val()
#        if val == 'order_call_center'
#            $('#sam_form').addClass('hidden')
#            $('#call_center_form').removeClass('hidden')
#        else
#            $('#call_center_form').addClass('hidden')
#            $('#sam_form').removeClass('hidden')