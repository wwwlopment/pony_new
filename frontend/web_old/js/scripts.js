(function($) {
    "use strict";
    /*===================================================================================*/
/*	OWL CAROUSEL
/*===================================================================================*/
$(document).ready(function () {
    var dragging = true;
    var owlElementID = "#owl-main";

    function fadeInReset() {
        if (!dragging) {
            $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").stop().delay(800).animate({ opacity: 0 }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            $(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").css({ opacity: 0 });
        }
    }

    function fadeInDownReset() {
        if (!dragging) {
            $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").stop().delay(800).animate({ opacity: 0, top: "-15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            $(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").css({ opacity: 0, top: "-15px" });
        }
    }

    function fadeInUpReset() {
        if (!dragging) {
            $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").stop().delay(800).animate({ opacity: 0, top: "15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            $(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").css({ opacity: 0, top: "15px" });
        }
    }

    function fadeInLeftReset() {
        if (!dragging) {
            $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").stop().delay(800).animate({ opacity: 0, left: "15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            $(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").css({ opacity: 0, left: "15px" });
        }
    }

    function fadeInRightReset() {
        if (!dragging) {
            $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").stop().delay(800).animate({ opacity: 0, left: "-15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            $(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").css({ opacity: 0, left: "-15px" });
        }
    }

    function fadeIn() {
        $(owlElementID + " .active .caption .fadeIn-1").stop().delay(500).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeIn-2").stop().delay(700).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeIn-3").stop().delay(1000).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInDown() {
        $(owlElementID + " .active .caption .fadeInDown-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInDown-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInDown-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInUp() {
        $(owlElementID + " .active .caption .fadeInUp-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInUp-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInUp-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInLeft() {
        $(owlElementID + " .active .caption .fadeInLeft-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInLeft-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInLeft-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInRight() {
        $(owlElementID + " .active .caption .fadeInRight-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInRight-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        $(owlElementID + " .active .caption .fadeInRight-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    $(owlElementID).owlCarousel({

        autoPlay: 5000,
        stopOnHover: true,
        navigation: true,
        pagination: true,
        singleItem: true,
        addClassActive: true,
        transitionStyle: "fade",
        navigationText: ["<i class='icon fa fa-angle-left'></i>", "<i class='icon fa fa-angle-right'></i>"],

        afterInit: function() {
            fadeIn();
            fadeInDown();
            fadeInUp();
            fadeInLeft();
            fadeInRight();
        },

        afterMove: function() {
            fadeIn();
            fadeInDown();
            fadeInUp();
            fadeInLeft();
            fadeInRight();
        },

        afterUpdate: function() {
            fadeIn();
            fadeInDown();
            fadeInUp();
            fadeInLeft();
            fadeInRight();
        },

        startDragging: function() {
            dragging = true;
        },

        afterAction: function() {
            fadeInReset();
            fadeInDownReset();
            fadeInUpReset();
            fadeInLeftReset();
            fadeInRightReset();
            dragging = false;
        }

    });

if ($(owlElementID).hasClass("owl-one-item")) {
    $(owlElementID + ".owl-one-item").data('owlCarousel').destroy();
}

$(owlElementID + ".owl-one-item").owlCarousel({
    singleItem: true,
    navigation: true,
    pagination: true
});

$('#transitionType li a').click(function () {

    $('#transitionType li a').removeClass('active');
    $(this).addClass('active');

    var newValue = $(this).attr('data-transition-type');

    $(owlElementID).data("owlCarousel").transitionTypes(newValue);
    $(owlElementID).trigger("owl.next");

    return false;

});


$('.home-owl-carousel').each(function(){

    var owl = $(this);
    var  itemPerLine = owl.data('item');
    if(!itemPerLine){
        itemPerLine = 4;
    }
    owl.owlCarousel({
        items : itemPerLine,
        itemsTablet:[768,2],
        navigation : true,
        pagination : false,

        navigationText: ["", ""]
    });
});

$('.homepage-owl-carousel').each(function(){

    var owl = $(this);
    var  itemPerLine = owl.data('item');
    if(!itemPerLine){
        itemPerLine = 4;
    }
    owl.owlCarousel({
        items : itemPerLine,
        itemsTablet:[768,2],
        itemsDesktop : [1199,2],
        navigation : true,
        pagination : false,

        navigationText: ["", ""]
    });
});

$(".blog-slider").owlCarousel({
    items : 3,
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,2],
    navigation : true,
    slideSpeed : 300,
    pagination: false,
    navigationText: ["", ""]
});

$(".best-seller").owlCarousel({
    items : 3,
    navigation : true,
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,2],
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigationText: ["", ""]
});

$(".sidebar-carousel").owlCarousel({
    items : 1,
    itemsTablet:[768,2],
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,1],
    navigation : true,
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigationText: ["", ""]
});

$(".brand-slider").owlCarousel({
    items : 6,
    navigation : true,
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigationText: ["", ""]
});    
$("#advertisement").owlCarousel({
    items : 1,
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,1],
    navigation : true,
    slideSpeed : 300,
    pagination: true,
    paginationSpeed : 400,
    navigationText: ["", ""]
});    

var $owl_controls_custom = $('.owl-controls-custom');
$('.owl-next' , $owl_controls_custom).click(function(event){
    var selector = $(this).data('owl-selector');
    var owl = $(selector).data('owlCarousel');
    owl.next();
    return false;
});
$('.owl-prev' , $owl_controls_custom).click(function(event){
    var selector = $(this).data('owl-selector');
    var owl = $(selector).data('owlCarousel');
    owl.prev();
    return false;
});

$(".owl-next").click(function(){
    $($(this).data('target')).trigger('owl.next');
    return false;
});

$(".owl-prev").click(function(){
    $($(this).data('target')).trigger('owl.prev');
    return false;
});

});

/*===================================================================================*/
/*  LAZY LOAD IMAGES USING ECHO
/*===================================================================================*/
$(document).ready(function(){
    echo.init({
        offset: 100,
        throttle: 250,
        unload: false
    });
});

/*===================================================================================*/
/*  RATING
/*===================================================================================*/

$(document).ready(function(){
    $('.rating').rateit({max: 5, step: 1, value : 4, resetable : false , readonly : true});
});

/*===================================================================================*/
/* PRICE SLIDER
/*===================================================================================*/
$(document).ready(function () {
    $(function() {

        $('#slider').slider({
             animate: "fast",
            min: 0,
            max: parseInt($('.pull-right').text()),
            values: [0, parseInt($('.pull-right').text())],
           // step: 10,
            //values: [0, 1000000],
        range: true,
        create: displaySliderValues,
        slide:
             function( event, ui ) {
                 //console.log(ui.value);
          //      $("#slider").css('background', 'linear-gradient(90deg, #abd07e'+ui.value+'%, #cccccc 0%)');
                //$( "#price" ).val( "$" + ui.value);
              // $('#lower').text($('#slider').slider("values", 0));
               displaySliderValues();
            }
        });
 function displaySliderValues() {
        $('#lower').text($('#slider').slider("values", 0)+' грн.');
        $('#from').val($('#slider').slider("values", 0));
        $('#upper').text($('#slider').slider("values", 1)+' грн.');
        $('#to').val($('#slider').slider("values", 1));
    }
    });
});


/*===================================================================================*/
/* SINGLE PRODUCT GALLERY
/*===================================================================================*/
$(document).ready(function(){
    $('#owl-single-product').owlCarousel({
        items:1,
        itemsTablet:[768,2],
        itemsDesktop : [1199,1]

    });

    $('#owl-single-product-thumbnails').owlCarousel({
        items: 4,
        pagination: true,
        rewindNav: true,
        itemsTablet : [768, 4],
        itemsDesktop : [1199,3]
    });

    $('#owl-single-product2-thumbnails').owlCarousel({
        items: 6,
        pagination: true,
        rewindNav: true,
        itemsTablet : [768, 4],
        itemsDesktop : [1199,3]
    });

    $('.single-product-slider').owlCarousel({
        stopOnHover: true,
        rewindNav: true,
        singleItem: true,
        pagination: true
    });

    $(".slider-next").click(function () {
        var owl = $($(this).data('target'));
        owl.trigger('owl.next');
        return false;
    });

    $(".slider-prev").click(function () {
        var owl = $($(this).data('target'));
        owl.trigger('owl.prev');
        return false;
    });

    $('.single-product-gallery .horizontal-thumb').click(function(){
        var $this = $(this), owl = $($this.data('target')), slideTo = $this.data('slide');
        owl.trigger('owl.goTo', slideTo);
        $this.addClass('active').parent().siblings().find('.active').removeClass('active');
        return false;
    });
});


/*===================================================================================*/
/*  QUANTITY
/*===================================================================================*/

$('body').on('click', '.quant-input .plus', function() {
    var val = $(this).parent().next().val();
    val = parseInt(val) + 1;
var subtotal = $(this).closest('tr').find('.cart-sub-total-price').text();
var sum = parseInt(val,10)*parseFloat(subtotal);
    $(this).closest('tr').find('.cart-grand-total-price').html(function() {
    return sum +' грн.';
    });
    var product_id = $(this).parent().next().data('id');
    var quantity = val;
    $.ajax({
        url: '/site/quantity',
        data: {product_id : product_id, quantity : quantity},
        type: 'get',
        success: function (res) {
            $.pjax.reload({container: '#pjaxContent'});
            $(document).on('ready pjax:success', function() {
                grand_total();
                cp_total();
            });
        },
        error: function () {
            alert('Ajax add error!');
        }
    });

    $(this).parent().next().val(val);
});

$('body').on('click', '.quant-input .minus', function() {
    var val = $(this).parent().next().val();
    if (val > 0) {
        val = parseInt(val) - 1;
        var subtotal = $(this).closest('tr').find('.cart-sub-total-price').text();
        var sum = parseInt(val,10)*parseFloat(subtotal);
        $(this).closest('tr').find('.cart-grand-total-price').html(function() {
            return sum +' грн.';
        });
        var product_id = $(this).parent().next().data('id');
        var quantity = val;
        $.ajax({
            url: '/site/quantity',
            data: {product_id : product_id, quantity : quantity},
            type: 'get',
            success: function (res) {
                $.pjax.reload({container: '#pjaxContent'});
                $(document).on('ready pjax:success', function() {
                    grand_total();
                    cp_total();
                });
            },
            error: function () {
                alert('Ajax add error!');
            }
        });
        $(this).parent().next().val(val);
    }
});
    grand_total();

    function grand_total()
    {
        var total=0;
        $("table tbody tr").each(function()
        {

            var val = $(this).find('td .qinput').val();
            var subtotal = $(this).find('td .cart-sub-total-price').text();
            var sum = parseInt(val,10)*parseFloat(subtotal);
            $(this).find("td .cart-grand-total-price").html(function() {
                total+= sum;
                return sum +' грн.';
            });
        });
        $('.inner-left-md').text(total +' грн.');
    }

/*===================================================================================*/
/*  WOW 
/*===================================================================================*/
/*
$(document).ready(function () {
    new WOW().init();
});*/


/*===================================================================================*/
/*  TOOLTIP 
/*===================================================================================*/
$("[data-toggle='tooltip']").tooltip(); 

$('#transitionType li a').click(function () {

    $('#transitionType li a').removeClass('active');
    $(this).addClass('active');

    var newValue = $(this).attr('data-transition-type');

    $(owlElementID).data("owlCarousel").transitionTypes(newValue);
    $(owlElementID).trigger("owl.next");

    return false;

});

    $('body').on('click', '.buy', function(e) {
//$('.buy').on('click', function (e) {

    e.preventDefault();
    var product_id = $(this).data('id');
    if ($(document).find('#view_quantity').length) {
        var view_quantity = parseInt($(document).find('#view_quantity').val());
    }else {
        var view_quantity = 1;
    }
    $.ajax({
         url: '/site/addtocart',
         data: {product_id : product_id, view_quantity : view_quantity},
         type: 'get',
         success: function (res) {
             $.pjax.reload({container: '#pjaxContent'});
             $(document).on('ready pjax:success', function() {
                 cp_total();
             });
         },
        error: function () {
            alert('Ajax add error!');
        }
    });
    cp_total();
});

$(document).on('click', '.rm_from_cart', function (e) {
    e.preventDefault();
    var rm_product_id = $(this).data('id');
    $.ajax({
         url: '/site/rmfromcart',
         data: {product_id : rm_product_id},
         type: 'get',
         success: function (res) {
           //  console.log(res);
             $.pjax.reload({container: '#pjaxContent'}).done(function (){
                $.pjax.reload({container: '#pjaxCreateOrder'});
             });
             $(document).on('ready pjax:success', function() {
                 grand_total();
             });
         },
        error: function () {
            alert('Ajax rm error!');
        }

    });
    cp_total();
    //grand_total();
});



cp_total();

    $(document).on('click', '.rm_from_cart', function (e) {
    $(document).on('ready pjax:success', function() {
        // will fire on initial page load, and subsequent PJAX page loads

        cp_total();

            e.preventDefault();
            $('#cart').addClass('open');
        });


    });

    function cp_total() {
        $('.value').html(function () {
            var newhtml = $(document).find('#price_subtotal').html();
            return newhtml;
        });
    }

    $(document).ready(function(){
        $('.description').each(function(){
            var highestBox = 0;
            $('.description', this).each(function(){
                if($(this).height() > highestBox) {
                    highestBox = $(this).height();
                }
            });
            $('.description',this).height(highestBox);
        });
    });

})(jQuery);


