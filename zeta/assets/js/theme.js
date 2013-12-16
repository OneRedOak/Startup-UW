(function($){

"use strict";

var MD_THEME = window.MD_THEME || {};


MD_THEME.menu = function(){
	
	function showSubmenu(){
		$('#menu').superfish({
			speed: 100,
			delay: 0
		});
	}
	showSubmenu();

	function resizeHeader(){
		$(window).scroll(function(){
	        var $this = $(this),
	            pos   = $this.scrollTop();
	        if (pos > 50){
	            $('.header-fixed header').addClass('tight');
	        } else {
	            $('.header-fixed header').removeClass('tight');
	        }
	    });
	}
	resizeHeader();

	function menuMobile(){
		$('#menu-mobile-trigger').on('click', function(){
			$('#menu-mobile').slideToggle(200);
			return false;
		});

		$('#menu-mobile a').on('click', function(){
			$(this).toggleClass('active');
			if($(this).parent('li').hasClass('menu-item-has-children')){
				$(this).parent('li').find('ul').eq(0).slideToggle();	
				return false;
			}
		});
	}
	menuMobile();


	function hideMenuMobile(){
		if ($(window).width() >= 979 ){
			$('#menu-mobile').hide();
		}
	}
	hideMenuMobile();

	$(window).resize(function(){
		hideMenuMobile();
	});
}


MD_THEME.init = function(){
	MD_THEME.menu();
}

MD_THEME.init();

})(jQuery);
