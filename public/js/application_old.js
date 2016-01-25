$(function() {
    $(document).on("click", ".add_to_cart", function() {
        var product_id = $(this).attr("data-product-id");
        var quantity = $("#quantity_" + product_id).val();
        var size = $("#size_" + product_id).find("option:selected").val();
        $.ajax({
        		url: "/ajax/cart.php",
        		data: {
                    act: "add2cart",
                    product_id: product_id,
                    quantity: quantity,
                    props: {
                        size: size
                    }
                },
        		type: "POST"
        	}).done(function (data) {
                $("#top_cart").html(data);
                $("#added-to-cart").removeClass("hide");
                setTimeout(function(){
                    $("#added-to-cart").addClass("hide");
                }, 3000);
                $(".scroll-pane").mCustomScrollbar({
                    advanced: {
                        updateOnContentResize: true

                    },
                    scrollButtons: {
                        enable: false
                    },
                    mouseWheelPixels: "200",
                    theme: "dark-2"
                });
                $(".smoothscroll").mCustomScrollbar({
                    advanced: {
                        updateOnContentResize: true
                    },
                    scrollButtons: {
                        enable: false
                    },
                    mouseWheelPixels: "100",
                    theme: "dark-2"
                });
        });
        return false;
    });

    $(".form_auth_wide").validate({
        submitHandler: function(form) {
            $.ajax({
                type: "post",
                data: $(".form_auth_wide").serialize(),
                url: "/ajax/login.php",
                dataType: "json"
            }).done(function(data) {
                if (data.status == "success") {
                    window.location.reload();
                }
                else {
                    $("#auth_errors_wide").html(data.info).show();
                }
            });
            return false;
        }
    });

    $(".form_auth").validate({
        submitHandler: function(form) {
            $.ajax({
                type: "post",
                data: $(".form_auth").serialize(),
                url: "/ajax/login.php",
                dataType: "json"
            }).done(function(data) {
                if (data.status == "success") {
                    window.location.reload();
                }
                else {
                    $("#auth_errors").html(data.info).show();
                }
            });
            return false;
        }
    });

    $(".form_register").validate({
        submitHandler: function(form) {
            $.ajax({
                type: "post",
                data: $(".form_register").serialize(),
                url: "/ajax/register.php",
                dataType: "json"
            }).done(function(data) {
                if (data.status == "success") {
                    window.location.reload();
                }
                else {
                    $("#register_errors").html(data.info).show();
                }
            });
            return false;
        }
    });

    $('#product-details-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var product_card = button.data('product-id'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        $("#product-card-content").html($("#modal-card-" + product_card).html());
        $("#product-details-modal select").minimalect();

    });

    if ($(".swiper-container").length) {
        var mySwiper = new Swiper('.swiper-container', {
            pagination: '.box-pagination',
            keyboardControl: true,
            paginationClickable: true,
            slidesPerView: 'auto',
            autoResize: true,
            resizeReInit: true
        });

        $('.prevControl').on('click', function (e) {
            e.preventDefault();
            mySwiper.swipePrev();
        });
        $('.nextControl').on('click', function (e) {
            e.preventDefault();
            mySwiper.swipeNext();
        });
    }


    $(document).on("click", ".search-box .getFullSearch", function(e) {
        $('.search-full').addClass("active"); //you can list several class names
        e.preventDefault();
    });

    $(document).on("click", ".delete_cart_item", function() {
        var basket_id = $(this).attr("data-basket-id");
        console.log(basket_id);
        $.ajax({
            url: "/ajax/cart.php",
            data: {
                act: "delete",
                basket_id: basket_id
            },
            type: "POST"
        }).done(function (data) {
            $("#top_cart").html(data);
            $(".scroll-pane").mCustomScrollbar({
                advanced: {
                    updateOnContentResize: true

                },

                scrollButtons: {
                    enable: false
                },

                mouseWheelPixels: "200",
                theme: "dark-2"

            });


            $(".smoothscroll").mCustomScrollbar({
                advanced: {
                    updateOnContentResize: true

                },

                scrollButtons: {
                    enable: false
                },

                mouseWheelPixels: "100",
                theme: "dark-2"

            });
        });
        return false;
    });

    var timer;
    var doneClickingInterval = 500;
    $(".quanitySniper").TouchSpin({
        buttondown_class: "btn btn-link",
        buttonup_class: "btn btn-link"
    });

    $(document).on("change", ".quanitySniper", function() {
        clearTimeout(timer);
        var $this = $(this);
        var basket_id = $this.attr("data-basket-id");
        var quantity = $this.val();
        timer = setTimeout(function() {
            $.ajax({
                url: "/ajax/cart.php",
                data: {basket_id: basket_id, act: "main_update", quantity: quantity},
                type: "POST"
            }).done(function (data) {
                $("#main_cart").html(data);
                $(".quanitySniper").TouchSpin({
                    buttondown_class: "btn btn-link",
                    buttonup_class: "btn btn-link"
                });
            });
        }, doneClickingInterval);
    });
    $(document).on("click", ".delete_main_item", function() {
        var basket_id = $(this).attr("data-basket-id");
        $.ajax({
            url: "/ajax/cart.php",
            data: {
                act: "main_delete",
                basket_id: basket_id
            },
            type: "POST"
        }).done(function (data) {
            $("#main_cart").html(data);
            $(".quanitySniper").TouchSpin({
                buttondown_class: "btn btn-link",
                buttonup_class: "btn btn-link"
            });
        });
        return false;
    });

    $(document).on("click", "#coupon_apply", function() {
        var coupon = $(".coupon_in_cart").val();
        $.ajax({
        		url: "/ajax/cart.php",
        		data: {coupon:coupon, act:"apply_coupon"},
        		type: "POST"
        	}).done(function (data) {
                $("#main_cart").html(data);
                $(".quanitySniper").TouchSpin({
                    buttondown_class: "btn btn-link",
                    buttonup_class: "btn btn-link"
                });
            });
        return false;
    })
});

$(window).load(function() {
    $(".scroll-pane").mCustomScrollbar({
        advanced: {
            updateOnContentResize: true

        },

        scrollButtons: {
            enable: false
        },

        mouseWheelPixels: "200",
        theme: "dark-2"

    });


    $(".smoothscroll").mCustomScrollbar({
        advanced: {
            updateOnContentResize: true

        },

        scrollButtons: {
            enable: false
        },

        mouseWheelPixels: "100",
        theme: "dark-2"

    });



    // customs select by minimalect
    $("select").not(".hidden-select").minimalect();
    $("#catalog_sort").minimalect({
        onchange: function(value, text){
            // value will be the value of the selected option.
            // text will be the user-facing content of the selected option
            // use those to determine what options to put in the second one. Then simply do;
            window.location = value;
        }
    });
});