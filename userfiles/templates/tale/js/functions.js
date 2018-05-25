
TempateFunctions = {
  contentHeight:function(){

    /**************************************
     Minimum height for the Main Container
    **************************************/

    var content = document.getElementById('content-holder'),
        footer = document.getElementById('footer'),
        header = document.getElementById('header');

    $(content).css('minHeight', $(window).height() - $(header).outerHeight(true) - $(footer).outerHeight(true));

  }
}


$(document).ready(function(){

    TempateFunctions.contentHeight();
 
    $("#mobile-menu").bind("click", function(){
        $(document.body).toggleClass("mobile-visible");
    });
	
	
	
	$(window).bind('mw.cart.add', function(){
   var modal_html = ''
        + '<div id="mw-product-added-popup-holder"> '
		+ '<h4>'+mw.msg.product_added+'</h4>'
		+ '<div id="mw-product-added-popup" class="text-center" style="width:210px;"> '
		+ ' </div>';
        + ' </div>';
		Alert(modal_html)
	mw.load_module('shop/cart','#mw-product-added-popup', false,{template:'small'});	
	
	setTimeout(function(){
									window.location.href = mw.settings.site_url+'checkout';
 
	}, 10)


	});

});

$(window).bind('load resize', function(e){

    TempateFunctions.contentHeight();



});




