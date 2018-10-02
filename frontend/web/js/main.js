jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var MqL = 1170;
	//move nav element position according to window width
	moveNavigation();
	$(window).on('resize', function(){
		(!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
	});

	//mobile - open lateral menu clicking on the menu icon
	$('.cd-nav-trigger').on('click', function(event){
		event.preventDefault();
		if( $('.cd-main-content').hasClass('nav-is-visible') ) {
			closeNav();
			$('.cd-overlay').removeClass('is-visible');
		} else {
			$(this).addClass('nav-is-visible');
			$('.cd-main-header').addClass('nav-is-visible');
			$('.cd-main-content').addClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').addClass('overflow-hidden');
			});
			toggleSearch('close');
			$('.cd-overlay').addClass('is-visible');
		}
	});

	//open search form
	$('.cd-search-trigger').on('click', function(event){
		event.preventDefault();
		toggleSearch();
		closeNav();
	});

	
	
	


	

	//submenu items - go back link
	$('.go-back').on('click', function(){
		$(this).parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('moves-out');
	});

	function closeNav() {
		$('.cd-nav-trigger').removeClass('nav-is-visible');
		$('.cd-main-header').removeClass('nav-is-visible');
		$('.cd-primary-nav').removeClass('nav-is-visible');
		$('.has-children ul').addClass('is-hidden');
		$('.has-children a').removeClass('selected');
		$('.moves-out').removeClass('moves-out');
		$('.cd-main-content').removeClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$('body').removeClass('overflow-hidden');
		});
	}

	function toggleSearch(type) {
		if(type=="close") {
			//close serach 
			$('.cd-search').removeClass('is-visible');
			$('.cd-search-trigger').removeClass('search-is-visible');
			$('.cd-overlay').removeClass('search-is-visible');
		} else {
			//toggle search visibility
			$('.cd-search').toggleClass('is-visible');
			$('.cd-search-trigger').toggleClass('search-is-visible');
			$('.cd-overlay').toggleClass('search-is-visible');
			if($(window).width() > MqL && $('.cd-search').hasClass('is-visible')) $('.cd-search').find('input[type="search"]').focus();
			($('.cd-search').hasClass('is-visible')) ? $('.cd-overlay').addClass('is-visible') : $('.cd-overlay').removeClass('is-visible') ;
		}
	}

	function checkWindowWidth() {
		//check window width (scrollbar included)
		var e = window, 
            a = 'inner';
        if (!('innerWidth' in window )) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        if ( e[ a+'Width' ] >= MqL ) {
			return true;
		} else {
			return false;
		}
	}

	function moveNavigation(){
		var navigation = $('.cd-nav');
  		var desktop = checkWindowWidth();
        if ( desktop ) {
			navigation.detach();
			navigation.insertBefore('.cd-header-buttons');
		} else {
			navigation.detach();
			navigation.insertAfter('.cd-main-content');
		}
	}





    $(function() {
        $('.img-responsive').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });
    });

    $(function() {
        $('.col-md-3').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });
    });
    $(function() {
        $('.col-md-4').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });
    });



//CART
    $('body').on('click', '.buy', function(e) {
		//$('.buy').on('click', function (e) {

        e.preventDefault();
        var product_id = $(this).data('id');
     /*   if ($(document).find('#view_quantity').length) {
            var view_quantity = parseInt($(document).find('#view_quantity').val());
        }else {
            var view_quantity = 1;
        }*/
        var view_quantity = 1;
        $.ajax({
            url: '/site/addtocart',
            data: {product_id : product_id, view_quantity : view_quantity},
            type: 'get',
            success: function (res) {
                $.pjax.reload({container: '#pjaxContent'});
                $(document).on('ready pjax:success', function() {
                    console.log(res);
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
            //$('#cart').addClass('open');
        });


    });

    function cp_total() {
        $('.value').html(function () {
            var newhtml = $(document).find('#price_subtotal').html();
            return newhtml;
        });
    }



    /*===================================================================================*/
    /*  QUANTITY
    /*===================================================================================*/

    $('body').on('click', '.quant-input .plus', function() {
        var val = $(this).parent().next().val();
        //console.log(val);
        val = parseInt(val) + 1;
      //  var subtotal = $(this).closest('p').find('.cart-sub-total-price').text();
    var subtotal = $(this).closest('.cart-item-info').find('span').text();
        //console.log(parseFloat($(this).closest('.delivery').find('.qt').text()));
        //var subtotal = $(this).closest('.delivery').find('.qt').text();

        var sum = parseInt(val,10)*parseFloat(subtotal);
       // console.log(sum);
        //$(this).closest('p').find('.cart-grand-total-price').html(function() {
        $(this).closest('.delivery').find('.qt').html(function() {
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
            var subtotal = $(this).closest('.cart-item-info').find('span').text();
            // var subtotal = $(this).closest('p').find('.cart-sub-total-price').text();
            var sum = parseInt(val,10)*parseFloat(subtotal);
            $(this).closest('.delivery').find('.qt').html(function() {
            //$(this).closest('p').find('.cart-grand-total-price').html(function() {
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
        $(".simpleCart_shelfItem").each(function()
        {

            var val = $(this).find('.qinput').val();
            var subtotal = $(this).closest('.cart-item-info').find('span').text();
            // var subtotal = $(this).find('td .cart-sub-total-price').text();
            var sum = parseInt(val,10)*parseFloat(subtotal);
          //  $(this).find("td .cart-grand-total-price").html(function() {
            $(this).closest('.delivery').find('.qt').html(function() {
                total+= sum;
                return sum +' грн.';
            });
        });
        var new_total = parseFloat($('.simpleCart_total').text());
        //$('.inner-left-md').text(total +' грн.');
        $('#price_subtotal').text('Підсумок : '+new_total +' грн.');
    }

});
