jQuery(document).ready( function($){
    "use strict";

    var $body = $('body'),
        $topbar = $( document.getElementById('topbar') ),
        $products_sliders = $('.products-slider-wrapper, .categories-slider-wrapper');


    /***************************************
     * UPDATE CALCULATE SHIPPING SELECT
    ***************************************/

    // FIX SHIPPING CALCULATOR SHOW
    $( '.shipping-calculator-form' ).show();

    var wc_version = 2.2;
    if(typeof yit_woocommerce != 'undefined')  wc_version = parseFloat( yit_woocommerce.version );

    if ( wc_version < 2.3 && $.fn.selectbox ) {
        $('#calc_shipping_state').next('.sbHolder').addClass('stateHolder');
        $body.on('country_to_state_changing', function(){
            $('.stateHolder').remove();
            $('#calc_shipping_state').show().attr('sb', '');

            $('select#calc_shipping_state').selectbox({
                effect: 'fade',
                classHolder: 'stateHolder sbHolder'
            });
        });
    }

    /**********************************
     * SHOP STYLE ZOOM
     **********************************/

    var apply_hover = function(){

        $body.find( 'ul.products li:not(.category)' ).each( function(){

            var $this_item = $(this), to;

            var $wrapper = $this_item.find('.product-wrapper');

            $this_item.on({
                mouseenter: function() {
                    if ( $this_item.hasClass('grid') && $wrapper.hasClass('zoom') ) {
                        $this_item.height( $this_item.height()-1 );
                        $this_item.find('.product-actions-wrapper').height( $this_item.find('.product-actions').height() + 20 );

                        clearTimeout(to);
                    }
                },
                mouseleave: function() {
                    if ( $this_item.hasClass('grid') && $wrapper.hasClass('zoom') ) {

                        $this_item.find('.product-actions-wrapper').height( 0 );
                        to = setTimeout(function()
                        {
                            $this_item.css( 'height', 'auto' );
                        },700);
                    }
                }
            });
        })
    };

    $(document).on('yith-wcan-ajax-filtered', apply_hover );

    /*************************
     * SHOP STYLE SWITCHER
     *************************/

    $('#list-or-grid').on( 'click', 'a', function() {

        var trigger = $(this),
                view = trigger.attr( 'class' ).replace('-view', '');

            $( 'ul.products li' ).removeClass( 'list grid' ).addClass( view );
            trigger.parent().find( 'a' ).removeClass( 'active' );
            trigger.addClass( 'active' );

            $.cookie( yit_shop_view_cookie, view );

            return false;
    });

     apply_hover();


    /***************************************************
     * ADD TO CART & ADD TO WISHLIST ( SHOP PAGE )
     **************************************************/
     
    var $pWrapper = new Array(),
        $i=0,
        $j=0;

    var add_to_cart = function(){

        $('ul.products').on('click', 'li.product .add_to_cart_button, .product-other-action .yith-wcwl-add-button .add_to_wishlist', function () {

            $pWrapper[$i] = $(this).parents('.product-wrapper');

            if (typeof yit.load_gif != 'undefined') {
                $pWrapper[$i].block({message: null, overlayCSS: {background: '#fff url(' + yit.load_gif + ') no-repeat center', opacity: 0.3, cursor: 'none'}});
            } else {
                $pWrapper[$i].block({message: null, overlayCSS: {background: '#fff url(' + woocommerce_params.ajax_loader_url.substring(0, woocommerce_params.ajax_loader_url.length - 7) + '.gif) no-repeat center', opacity: 0.3, cursor: 'none'}});
            }

            $i++;

        });
    };

    add_to_cart();
    $(document).on( 'yith-wcan-ajax-filtered', add_to_cart );

    $body.on('added_to_cart added_to_wishlist', function (e) {

        if (typeof $pWrapper[$j] === 'undefined' )  return;

        var $ico,
            $thumb = $pWrapper[$j].find('.thumb-wrapper');

        if( e.type === 'added_to_wishlist' ) {
            $ico = '<span class="added_to_wishlist_ico"><img src="' + yit.added_to_wishlist_ico + '"></span>';
        }
        else {
            $ico = '<span class="added_to_cart_ico"><img src="' + yit.added_to_cart_ico + '"></span>';
        }

        $thumb.append( $ico );

        setTimeout(function () {
            $thumb.find('.added_to_wishlist_ico').fadeOut(2000, function () {
                $(this).remove();
            });
        }, 3000);

        $pWrapper[$j].unblock();

        $j++;

    });

    /********************************************
     * ADD TO WISHLIST ( SINGLE PRODUCT PAGE )
     *******************************************/

    $( '.product-actions .yith-wcwl-add-button .add_to_wishlist').on( 'click', function() {

        var feedback = $(this).closest('.yith-wcwl-add-to-wishlist').find('.yith-wcwl-wishlistaddedbrowse span.feedback');

        feedback.fadeIn();

        setTimeout( function(){
            feedback.fadeOut('slow');
        }, 4000 );

    });

    /*************************
     * PRODUCTS SLIDER
     *************************/

    if( $.fn.owlCarousel && $.fn.imagesLoaded && $products_sliders.length ) {
        var product_slider = function(t) {

            t.imagesLoaded(function(){
                var cols = t.data('columns') ? t.data('columns') : 4,
                    autoplay = ( t.attr('data-autoplay') == 'true' ) ? true : false;

                var loop = ! YIT_Browser.isMobile() ? true : false;

                var owl = t.find('.products').owlCarousel({
                    items             : cols,
                    responsiveClass   : true,
                    responsive:{
                        0 : {
                            items: 2
                        },
                        479 : {
                            items: 2
                        },
                        767 : {
                            items: 3
                        },
                        992 : {
                            items: cols
                        }
                    },
                    autoplay          : autoplay,
                    autoplayTimeout   : 2000,
                    autoplayHoverPause: true,
                    loop              : loop
                })
                .on( 'translated.owl.carousel', function(){
                    apply_hover();
                    yit_change_thumb_loop();
                });

                // Custom Navigation Events
                t.on('click', '.es-nav-next', function () {
                    owl.trigger('next.owl.carousel');
                });

                t.on('click', '.es-nav-prev', function () {
                    owl.trigger('prev.owl.carousel');
                });

            });
        };

        // initialize slider in only visible tabs
        $products_sliders.each(function(){
            var t = $(this);
            if( ! t.closest('.panel.group').length || t.closest('.panel.group').hasClass('showing')  ){
                product_slider( t );
            }
        });

        $('.tabs-container').on( 'yit_tabopened', function( e, tab ) {
            product_slider( tab.find( $products_sliders ) );
        });

    }

    /*************************
     * VARIATIONS SELECT
     *************************/

    var variations_select = function(){
        // variations select
        if( $.fn.selectbox ) {
            var form = $('form.variations_form');
            var select = form.find('select:not( .yith_wccl_custom )');

            if( form.data('wccl') ) {
                select = select.filter(function(){
                    return $(this).data('type') == 'select'
                });
            }

            select.selectbox({
                effect: 'fade',
                onOpen: function() {
                    //$('.variations select').trigger('focusin');
                }
            });

            var update_select = function(event){  // console.log(event);
                select.selectbox("detach");
                select.selectbox("attach");
            };

            // fix variations select
            form.on( 'woocommerce_update_variation_values', update_select);
            form.find('.reset_variations').on('click.yit', update_select);

        }
    };

    variations_select();

    /*************************
     * Login Form
     *************************/

//    $('#login-form').on('submit', function(){
//        var a = $('#reg_password').val();
//        var b = $('#reg_password_retype').val();
//        if(!(a==b)){
//            $('#reg_password_retype').addClass('invalid');
//            return false;
//        }else{
//            $('#reg_password_retype').removeClass('invalid');
//            return true;
//        }
//    });

    /*************************
     * Widget Woo Price Filter
     *************************/

    if( typeof yit != 'undefined' && ( typeof yit.price_filter_slider == 'undefined' || yit.price_filter_slider == 'no' ) ) {
        var removePriceFilterSlider = function() {
            $( 'input#min_price, input#max_price' ).show();
            $('form > div.price_slider_wrapper').find( 'div.price_slider, div.price_label' ).hide();
        };

        $(document).on('ready', removePriceFilterSlider);
    }

    /*********************
     * SHARE IN SHOP PAGE
    **********************/

    $(document).on('click', '#yit_share', function(e){
        e.preventDefault();

        var share = $(this).parents('.product-other-action').siblings('.share-container');
        console.log(share);
        var template = '<div class="popupOverlay share"></div>' +
            '<div id="popupWrap" class="popupWrap share">' +
            '<div class="product-share">' +
            share.html() +
            '</div>' +
            '<i class="fa fa-times close-popup"></i>' +
            '</div>';

        $body.append(template);

        $('#popupWrap').center() ;
        $('.popupOverlay').css( { display: 'block', opacity:0 } ).animate( { opacity:0.7 }, 500 );
        $('#popupWrap').css( { display: 'block', opacity:0 } ).animate( { opacity:1 }, 500 );

        /** Close popup function **/
        var close_popup = function() {
            $('.popupOverlay').animate( {opacity:0}, 200);
            $('.popupOverlay').remove();
            $('.popupWrap').animate( {opacity:0}, 200);
            $('.popupWrap').remove();
        }

        /**
         *	Close popup on:
         *	- 'X button' click
         *   - wrapper click
         *   - esc key pressed
         **/
        $('.close-popup, .popupOverlay').click(function(){
            close_popup();
        });

        $(document).bind('keydown', function(e) {
            if (e.which == 27) {
                if($('.popupOverlay')) {
                    close_popup();
                }
            }
        });

        /** Center popup on windows resize **/
        $(window).resize(function(){
            $('#popupWrap').center();
        });
    });


    /*****************************************
     * CHANGE THUMB PRODUCT IN SHOP PAGE
     ******************************************/

    var yit_change_thumb_loop = function() {

        $( '.thumb-wrapper.zoom .single-attachment-thumbnail').off('click');

        $('.thumb-wrapper.zoom').on('click', '.single-attachment-thumbnail', function(){

            $(this).siblings().removeClass('active');

            var $main = $(this).parents( '.thumb-wrapper.zoom').find( '.thumb img' );
            var $attachment = $(this).data('img');

            $main.attr( 'src', $attachment);
            $(this).addClass('active');

        });
    }

    yit_change_thumb_loop();

    $(document).on( 'yith-wcan-ajax-filtered', yit_change_thumb_loop );


    /****************************************************
     * UPDATE SKU AND IMAGES FOR PRODUCTS LAYOUT IN SIDEBAR
     ***************************************************/

    $(document).on( 'found_variation', 'form.variations_form', function( event, variation ) {
        var $product 	= $(this).parents( '.sidebar').prev( '.content').find( '.product' );

        var $sku 		= $product.find('.product_meta .sku');
        var $weight 	= $product.find('.product_weight');
        var $dimensions = $product.find('.product_dimensions');


        if ( ! $sku.attr( 'data-o_sku' ) )
            $sku.attr( 'data-o_sku', $sku.text() );

        if ( ! $weight.attr( 'data-o_weight' ) )
            $weight.attr( 'data-o_weight', $weight.text() );

        if ( ! $dimensions.attr( 'data-o_dimensions' ) )
            $dimensions.attr( 'data-o_dimensions', $dimensions.text() );


        if ( variation.sku ) {
            $sku.text( variation.sku );
        } else {
            $sku.text( $sku.attr( 'data-o_sku' ) );
        }

        if ( variation.weight ) {
            $weight.text( variation.weight );
        } else {
            $weight.text( $weight.attr( 'data-o_weight' ) );
        }

        if ( variation.dimensions ) {
            $dimensions.text( variation.dimensions );
        } else {
            $dimensions.text( $dimensions.attr( 'data-o_dimensions' ) );
        }


        /* UPDATE IMAGES */
        var $variation_form   = $(this),
            $product_img      = $product.find('div.images img:eq(0)'),
            $product_link     = $product.find('div.images a.zoom:eq(0)'),
            o_src             = $product_img.attr('data-o_src'),
            o_title           = $product_img.attr('data-o_title'),
            o_alt             = $product_img.attr('data-o_alt'),
            o_href            = $product_link.attr('data-o_href'),
            variation_image   = variation.image_src,
            variation_link    = variation.image_link,
            variation_title   = variation.image_title,
            variation_alt     = variation.image_alt;

        $variation_form.find( '.variations_button' ).show();
        $variation_form.find( '.single_variation' ).html( variation.price_html + variation.availability_html );

        if ( o_src === undefined ) {
            o_src = ( ! $product_img.attr( 'src' ) ) ? '' : $product_img.attr( 'src' );
            $product_img.attr( 'data-o_src', o_src );
        }

        if ( o_href === undefined ) {
            o_href = ( ! $product_link.attr( 'href' ) ) ? '' : $product_link.attr( 'href' );
            $product_link.attr( 'data-o_href', o_href );
        }

        if ( o_title === undefined ) {
            o_title = ( ! $product_img.attr( 'title' ) ) ? '' : $product_img.attr( 'title' );
            $product_img.attr( 'data-o_title', o_title );
        }

        if ( o_alt === undefined ) {
            o_alt = ( ! $product_img.attr( 'alt' ) ) ? '' : $product_img.attr( 'alt' );
            $product_img.attr( 'data-o_alt', o_alt );
        }

        if ( variation_image && variation_image.length > 1 ) {
            $product_img
                .attr( 'src', variation_image )
                .attr( 'alt', variation_alt )
                .attr( 'title', variation_title );
            $product_link
                .attr( 'href', variation_link )
                .attr( 'title', variation_title );
        } else {
            $product_img
                .attr( 'src', o_src )
                .attr( 'alt', o_alt )
                .attr( 'title', o_title );
            $product_link
                .attr( 'href', o_href )
                .attr( 'title', o_title );
        }



    })
        // On clicking the reset variation button
    //$(this).closest('form.variations_form').find('.variations select').val('').change();

    .on( 'click', '.reset_variations', function( event ) {
            var $product 	= $(this).parents( '.sidebar').prev( '.content').find( '.product' );
            var $sku 		= $product.find('.product_meta').find('.sku');
            var $weight 	= $product.find('.product_weight');
            var $dimensions = $product.find('.product_dimensions');

            if ( $sku.attr( 'data-o_sku' ) )
                $sku.text( $sku.attr( 'data-o_sku' ) );

            if ( $weight.attr( 'data-o_weight' ) )
                $weight.text( $weight.attr( 'data-o_weight' ) );

            if ( $dimensions.attr( 'data-o_dimensions' ) )
                $dimensions.text( $dimensions.attr( 'data-o_dimensions' ) );

            return false;
        } )


     .on( 'reset_image', 'form.variations_form', function( event ) {

            var $product 	  = $(this).parents( '.sidebar').prev( '.content').find( '.product'),
                $product_img  = $product.find( 'div.images img:eq(0)' ),
                $product_link = $product.find( 'div.images a.zoom:eq(0)' ),
                o_src         = $product_img.attr( 'data-o_src' ),
                o_title       = $product_img.attr( 'data-o_title' ),
                o_alt         = $product_img.attr( 'data-o_alt' ),
                o_href        = $product_link.attr( 'data-o_href' );

            if ( o_src !== undefined ) {
                $product_img
                    .attr( 'src', o_src );
            }

            if ( o_href !== undefined ) {
                $product_link
                    .attr( 'href', o_href );
            }

            if ( o_title !== undefined ) {
                $product_img
                    .attr( 'title', o_title );
                $product_link
                    .attr( 'title', o_title );
            }

            if ( o_alt !== undefined ) {
                $product_img
                    .attr( 'alt', o_alt );
            }


        } );


    // Woocommerce pagination current page fix
    $('span.page-numbers.current').parent().addClass("current");

    // COLOR E LABEL VARIATIONS
    $(document).on('yith-wcan-ajax-filtered', function(){

        if( typeof $.yith_wccl != 'undefined' && typeof $.fn.wc_variation_form != 'undefined' )  {
            $(document).find('.variations_form').wc_variation_form();
            $.yith_wccl();
        }
    });

});