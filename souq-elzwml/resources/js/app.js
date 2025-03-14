import "/resources/js/bootstrap.js";

jQuery(document).ready(function ($) {
    "use strict";
    // Mobile Nav toggle
    $(".menu-toggle > a").on("click", function (e) {
        e.preventDefault();
        $("#responsive-nav").toggleClass("active");
    });

    // Fix cart dropdown from closing
    $(".cart-dropdown").on("click", function (e) {
        e.stopPropagation();
    });

    /////////////////////////////////////////

    // Products Slick
    $(".products-slick").each(function () {
        var $this = $(this),
            $nav = $this.attr("data-nav");

        $this.slick({
            slidesToShow: 6,
            slidesToScroll: 4,
            autoplay: true,
            autoplaySpeed: 5000,
            infinite: true,
            speed: 700,
            dots: false,
            arrows: true,
            appendArrows: $nav ? $nav : false,
            prevArrow:
                '<button type="button" class="slick-prev">&#8249;</button>',
            nextArrow:
                '<button type="button" class="slick-next">&#8250;</button>',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    },
                },
            ],
        });
    });

    // Products Widget Slick
    $(".products-widget-slick").each(function () {
        var $this = $(this),
            $nav = $this.attr("data-nav");

        $this.slick({
            infinite: true,
            autoplay: true,
            speed: 300,
            dots: false,
            arrows: true,
            appendArrows: $nav ? $nav : false,
        });
    });

    /////////////////////////////////////////

    // Product Main img Slick
    $("#product-main-img").slick({
        infinite: true,
        speed: 300,
        dots: false,
        arrows: true,
        fade: true,
        asNavFor: "#product-imgs",
    });

    // Product imgs Slick
    $("#product-imgs").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: 0,
        vertical: true,
        asNavFor: "#product-main-img",
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    vertical: false,
                    arrows: false,
                    dots: true,
                },
            },
        ],
    });
    
    
    // //Product Zoom Image
    var zoomMainProduct = document.getElementById("product-main-img");
    if (zoomMainProduct) {
        $("#product-main-img .product-preview").zoom({ 
            on: 'mouseover',
            magnify: 5,
        });
    }

    /////////////////////////////////////////

    // Input number
    $(".input-number").each(function () {
        var $this = $(this),
            $input = $this.find('input[type="number"]'),
            up = $this.find(".qty-up"),
            down = $this.find(".qty-down");

        down.on("click", function () {
            var value = parseInt($input.val()) - 1;
            value = value < 1 ? 1 : value;
            $input.val(value);
            $input.change();
            updatePriceSlider($this, value);
        });

        up.on("click", function () {
            var value = parseInt($input.val()) + 1;
            $input.val(value);
            $input.change();
            updatePriceSlider($this, value);
        });

        var priceInputMax = document.getElementById("price-max"),
            priceInputMin = document.getElementById("price-min");

        priceInputMax.addEventListener("change", function () {
            updatePriceSlider($(this).parent(), this.value);
        });

        priceInputMin.addEventListener("change", function () {
            updatePriceSlider($(this).parent(), this.value);
        });

        function updatePriceSlider(elem, value) {
            if (elem.hasClass("price-min")) {
                console.log("min");
                priceSlider.noUiSlider.set([value, null]);
            } else if (elem.hasClass("price-max")) {
                console.log("max");
                priceSlider.noUiSlider.set([null, value]);
            }
        }

        // Price Slider
        var priceSlider = document.getElementById("price-slider");
        if (priceSlider) {
            noUiSlider.create(priceSlider, {
                start: [1, 999],
                connect: true,
                step: 1,
                range: {
                    min: 1,
                    max: 999,
                },
            });

            priceSlider.noUiSlider.on("update", function (values, handle) {
                var value = values[handle];
                handle
                    ? (priceInputMax.value = value)
                    : (priceInputMin.value = value);
            });
        }
    });
    

});
