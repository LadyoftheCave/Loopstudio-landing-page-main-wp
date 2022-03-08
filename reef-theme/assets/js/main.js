//TODO: Willen we document ready?

jQuery(document).ready(function($){

	// Mobiel menu
	$('.menu-toggle').click(function(){
		$('.search-toggle, .header-search').removeClass('active');
		$('.menu-toggle, .nav-menu').toggleClass('active');
	});


	// Submenus
	$('.menu-item-has-children > .submenu-expand').click(function(e){
		$(this).toggleClass('expanded');
		e.preventDefault();
	});


	// Search toggle
	$('.search-toggle').click(function(){
		$('.menu-toggle, .nav-menu').removeClass('active');
		$('.search-toggle, .header-search').toggleClass('active');
		$('.site-header .search-field').focus();
	});


	// Search toggle op overlay
	$('.header-search .overlay').click(function(){
		$('.menu-toggle, .nav-menu').removeClass('active');
		$('.search-toggle, .header-search').toggleClass('active');
	});


	// Hamburger on scroll
	$(window).scroll( function() {
		if($(window).scrollTop() > 50) { $('.site-header').addClass('active'); }
		else { $('.site-header').removeClass('active'); }
	});



});