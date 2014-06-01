jQuery(window).load(function(){  
	jQuery('#jf-mainnav .menu').spasticNav();
	jQuery('#jf-mainnav .menu li:last-child').css('margin-right',0);
	jQuery('#jf-mainnav .menu li:last-child').prev().css('margin-right',0);
	
	sizeBanner();
	jQuery("#jf-slideshow a").click(function(){
		jQuery("#jf-body").slideto({highlight: false});
	});
	jQuery(".gotomenu").click(function(){
		jQuery("#jf-menu").slideto({highlight: false});
	});
	copyWidth = jQuery(".copyright").outerWidth();
	jQuery(".copyright").css('right', -copyWidth/2 + 20);
});

function sizeBanner() {
	var windowHeight = jQuery(window).height();
	var slideHeight  = jQuery("#jf-slideshow > div").height();

	jQuery("#jf-slideshow").css({ 'height' : windowHeight + "px"});
	jQuery("#jf-slideshow > div").css('padding-top', parseInt((windowHeight - slideHeight) / 2));
}

(function($) {

	$.fn.spasticNav = function(options) {
	
		options = $.extend({
			overlap : 20,
			speed : 300,
			reset : 1000,
			color : '#247D99'
		}, options);
	
		return this.each(function() {
		
		 	var nav = $(this),
		 		currentPageItem = $('.active', nav),
		 		blob,
		 		reset;
		 	
		 	var bleft, bwidth, shouldHide = false;
		 	if (currentPageItem.length > 0 && currentPageItem.position()) {
				bwidth = currentPageItem.outerWidth();
				bleft = currentPageItem.position().left;
		 	} else {
				shouldHide = true;
		 	}
		 	$('<li class="blob"></li>').css({
		 		width : bwidth,
		 		left : bleft,
		 		backgroundColor : options.color
		 	}).appendTo(this);
		 	
		 	blob = $('.blob', nav);
		 	
		 	if (shouldHide) blob.css('opacity', '0');

			$(nav).mouseleave(function() {
				if (shouldHide) blob.css('opacity', 0);
			});

			$('li:not(.blob)', nav).hover(function() {
				// mouse over
				clearTimeout(reset);
				blob.animate(
					{
						left : $(this).position().left,
						width : $(this).width(),
						opacity: 1
					},
					{
						duration : options.speed,
						easing : options.easing,
						queue : false
					}
				);
			}, function() {
				// mouse out
				reset = setTimeout(function() {
					blob.animate({
						width : bwidth,
						left : bleft
					}, options.speed)
				}, options.reset);
	
			});
		
		}); // end each
	
	};

})(jQuery);
	
jQuery(window).on("resize", function(){
	sizeBanner();
});

jQuery(window).on("scroll", function(){
	if (jQuery(window).width() > 765) {
		if (jQuery(window).scrollTop() > 55){
			jQuery('#jf-header').addClass('transparent');
		} else {
			jQuery('#jf-header').removeClass('transparent');
		}
	}
});