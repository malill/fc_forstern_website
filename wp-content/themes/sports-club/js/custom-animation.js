jQuery(window).scroll(function() {	
							   
	jQuery('#pagearea .container').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInUp");
			}
		});
	
	jQuery('.welcomebx .welcome_titlecolumn').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInLeft");
			}
		});
	
	jQuery('.welcomebx .welcome_contentcolumn').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInRight");
			}
		});
	
	jQuery('#pagearea-services .container').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInUp");
			}
		});
	jQuery('#section1 .container').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInUp");
			}
		});	
	jQuery('#section2 .container').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInUp");
			}
		});	
	
	jQuery('#section3 .container').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInLeft");
			}
		});
	
	jQuery('#section4 .container').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("bounceIn");
			}
		});
	
	jQuery('#section5 .container').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInRight");
			}
		});
	
	jQuery('#section6 .container').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("flipInX");
			}
		});
	
	jQuery('#section7 .container').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("zoomIn");
			}
		});
	
	jQuery('#section8 .container ').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInLeft");
			}
		});
		 
	jQuery('#section9 .container').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInRight");
			}
		});	
	
	jQuery('#section10 .container').each(function(){
		var imagePos = jQuery(this).offset().top;
		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInUp");
			}
		});	
	
		
	});