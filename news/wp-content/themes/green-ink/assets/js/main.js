jQuery(document).ready(function($) {

	var $breakpoint = 1024;
	var $header = $('#header');
	var $button = '.nav-collapse';
	var $top = $('#top');

	// If loaded on mobile, load mobile menu
	mobile_menu();

	// valid XHTML method of target_blank
	$(function(){ // run after page loads
		$('a[rel*=external]').click( function() {
			window.open(this.href);
			return false;
		});
	});

	// Style Tags
	$(function(){ // run after page loads
		$('p.tags a')
		.wrap('<span class="st_tag" />');
	});

	// Focus on search form on 404 pages
	$(function(){ // run after page loads
			// focus on search field after it has loaded
			$("body.error404 #content #s").focus();
	});

	// Apply Header layout
	$(function(){
		var $header = $('#header');
		if( $header.hasClass('header-over') && $('.header-over').find('.rolo_slider').length ) {
			var $height = $header.find('.inner').outerHeight();
			$header.find('.inner').css('margin-bottom', '-'+$height+'px');
		} 
	});

	// Style Tags
	$(function(){ // run after page loads
		if( $('.header-right .widget_green_ink_cart').length )
			$('.header-right .widget_green_ink_cart').height($header.find('.inner').outerHeight());
	});

	$(window).on('load', onLoad);
	$(window).on('scroll', onScroll);
	$(window).on('resize', mobile_menu);
	$top.on('click', toTop);
	$('body').on('click', $button, mobileOpen);
	$('.menu-item-has-children').on('click', '> a', mobileEl);

	function onScroll() {
		topShow();
	}

	function mobile_menu(){
		var $collapse = $('.nav-collapse');
		if( $(window).width() <= $breakpoint ) {
			$('#navigation').css('opacity', 0);
			$header.addClass('mobile');
			if( $collapse.length == 1 ) $collapse.clone().prependTo($('#navigation'));
			setTimeout(function(){
				$('#navigation').css('opacity', 1);
			},430)
		} else {
			$header.removeClass('mobile');
			$header.find('#navigation .nav-collapse').remove();
		}
	}

	function mobileOpen(){
		var $mobile = $('.mobile');
		var $collapse = $('.nav-collapse');
		if( $mobile.hasClass('active') ) {
			$mobile.removeClass('active');
		} else {
			$mobile.addClass('active');
		}
	}

	function mobileEl(e) {
		e.preventDefault();
		if( ! $(e.target).hasClass('menu-arrow') && e.target.tagName == 'SPAN' )
			window.location.href = $(e.target).parent().attr('href');
		else if( e.target.tagName == 'SPAN' ) {
			if( ! $(e.target).closest('li').hasClass('child-active') )
				$(e.target).closest('li').addClass('child-active');
			else
				$(e.target).closest('li').removeClass('child-active');
		}
	}

	function topShow() {
		var $view = ( $(window).height() / 100 ) * 30; 
		if( $(window).scrollTop() > $view )
			$top.addClass('active');
		else
			$top.removeClass('active');
	}

	// Scroll to top functionality
	function toTop() {
		$('html, body').animate({
			scrollTop: $('body').offset().top
		}, 1700);
	}

	// preloader
	function onLoad(){
		if( $('body').hasClass('has-preloader') ) {
			$('body').removeClass('has-preloader');
			$('.pf-gi-preloader-container').remove();
		}
		menuWidth();
	}

	// check for main menu
	function menuWidth(){
		$('#navigation').removeClass('not-ready');
		var $lh = $('.logo-wrap').outerWidth(true);
		if( $('.header-area').length )
			$lh = $lh + $('.header-area').outerWidth();
		// Additional check for padding
		$lh = $lh + 30; // include 15px padding left and right in calculation
		$('#navigation').css('width', 'calc(100% - '+$lh+'px)');
	}
});