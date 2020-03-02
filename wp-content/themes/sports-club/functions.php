<?php
/**
 * Sports Club functions and definitions
 *
 * @package Sports Club
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
function content($limit) {
$content = explode(' ', get_the_excerpt(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}
//Excerpt limit function
function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

if ( ! function_exists( 'sports_club_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function sports_club_pro_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'sports-club', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_filter('widget_text', 'do_shortcode');
	add_image_size('homepage-thumb',240,145,true);	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sports-club' ),
		'footer' => __( 'Footer Menu', 'sports-club' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // sports_club_pro_setup
add_action( 'after_setup_theme', 'sports_club_pro_setup' );

function sports_club_pro_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'sports-club' ),
		'description'   => __( 'Appears on blog page sidebar', 'sports-club' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Main', 'sports-club' ),
		'description'   => __( 'Appears on page sidebar', 'sports-club' ),
		'id'            => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'sports-club' ),
		'description'   => __( 'Appears on footer', 'sports-club' ),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget-column-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'sports-club' ),
		'description'   => __( 'Appears on footer', 'sports-club' ),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget-column-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'sports-club' ),
		'description'   => __( 'Appears on footer', 'sports-club' ),
		'id'            => 'footer-3',
		'before_widget' => '<div id="%1$s" class="widget-column-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'sports-club' ),
		'description'   => __( 'Appears on footer', 'sports-club' ),
		'id'            => 'footer-4',
		'before_widget' => '<div id="%1$s" class="widget-column-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

}
add_action( 'widgets_init', 'sports_club_pro_widgets_init' );

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once get_template_directory() . '/inc/options-framework.php';

function sports_club_pro_scripts() {	
	wp_enqueue_style( 'sports-club-gfonts-opensans', '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' );
	wp_enqueue_style( 'sports-club-gfonts-robotocondensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' );
	wp_enqueue_style( 'sports-club-gfonts-roboto', '//fonts.googleapis.com/css?family=Roboto:300,400,600,900' );
	wp_enqueue_style( 'sports-club-gfonts-gloria', '//fonts.googleapis.com/css?family=Gloria+Hallelujah' );
	wp_enqueue_style( 'sports-club-gfonts-lato', '//fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' );	
	wp_enqueue_style( 'sports-club-gfonts-assistant', '//fonts.googleapis.com/css?family=Assistant:200,300,400,600,700,800' );
		
	if( of_get_option('bodyfontface',true) != '' ){
		wp_enqueue_style( 'sports-club-gfonts-body', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('bodyfontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if( of_get_option('logofontface',true) != '' ){
		wp_enqueue_style( 'sports-club-gfonts-logo', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('logofontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('navfontface', true) != '' ) {
		wp_enqueue_style( 'sports-club-gfonts-nav', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('navfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('headfontface', true) != '' ) {
		wp_enqueue_style( 'sports-club-gfonts-heading', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('headfontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	} 
	if ( of_get_option('sectiontitlefontface', true) != '' ) {
		wp_enqueue_style( 'sports-club-gfonts-sectiontitle', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('sectiontitlefontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	} 
	if ( of_get_option('slidetitlefontface', true) != '' ) {
		wp_enqueue_style( 'sports-club-gfonts-slidetitle', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('slidetitlefontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	} 
	if ( of_get_option('slidedesfontface', true) != '' ) {
		wp_enqueue_style( 'sports-club-gfonts-slidedes', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('slidedesfontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	}	

	wp_enqueue_style( 'sports-club-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'sports-club-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style( 'sports-club-base-style', get_template_directory_uri().'/css/default.css' );	
	if ( is_home() || is_front_page() ) { 
	wp_enqueue_style( 'sports-club-nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'sports-club-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	}	

	wp_enqueue_script( 'sports-club-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );		
	wp_enqueue_style( 'sports-club-fontawesome-all-style', get_template_directory_uri().'/fontsawesome/css/fontawesome-all.css' );
	
				
	wp_enqueue_style( 'sports-club-animation', get_template_directory_uri().'/css/animation.css' );
	wp_enqueue_style( 'sports-club-hover', get_template_directory_uri().'/css/hover.css' );
	wp_enqueue_style( 'sports-club-hover-min', get_template_directory_uri().'/css/hover-min.css' );
	wp_enqueue_script( 'sports-club-testimonialsminjs', get_template_directory_uri().'/testimonialsrotator/js/jquery.quovolver.min.js', array('jquery') );
	wp_enqueue_style( 'sports-club-testimonialslider-style', get_template_directory_uri().'/testimonialsrotator/js/tm-rotator.css' );	
	wp_enqueue_style( 'sports-club-responsive-style', get_template_directory_uri().'/css/responsive.css' );		
	wp_enqueue_style( 'sports-club-owl-style', get_template_directory_uri().'/testimonialsrotator/js/owl.carousel.css' );
	wp_enqueue_script( 'sports-club-owljs', get_template_directory_uri().'/testimonialsrotator/js/owl.carousel.js', array('jquery') );
	
	wp_enqueue_script( 'sports-club-counterup', get_template_directory_uri().'/counter/js/jquery.counterup.min.js', array('jquery') );
	wp_enqueue_script( 'sports-club-waypoints', get_template_directory_uri().'/counter/js/waypoints.min.js', array('jquery') );
	
	
	// mixitup script
	wp_enqueue_style( 'sports-club-mixitup-style', get_template_directory_uri().'/mixitup/style-mixitup.css' );
	wp_enqueue_script( 'sports-club-jquery_013-script', get_template_directory_uri() . '/mixitup/jquery_013.js', array('jquery') );
	wp_enqueue_script( 'sports-club-jquery_003-script', get_template_directory_uri() . '/mixitup/jquery_003.js', array('jquery') );
	wp_enqueue_script( 'sports-club-screen-script', get_template_directory_uri() . '/mixitup/screen.js', array('jquery') );
	// prettyPhoto script
	wp_enqueue_style( 'sports-club-prettyphoto-style', get_template_directory_uri().'/mixitup/prettyPhotoe735.css' );
	wp_enqueue_script( 'sports-club-prettyphoto-script', get_template_directory_uri() . '/mixitup/jquery.prettyPhoto5152.js', array('jquery') );
	
	//Client Logo Rotator
	wp_enqueue_style( 'sports-club-flexiselcss', get_template_directory_uri().'/css/flexiselcss.css' );	
	wp_enqueue_script( 'sports-club-flexisel', get_template_directory_uri() . '/js/jquery.flexisel.js', array('jquery') );
	
	//Popup Video
	wp_enqueue_style( 'sports-club-youtube-popup', get_template_directory_uri().'/popupvideo/grt-youtube-popup.css' );	
	wp_enqueue_script( 'sports-club-youtube-popup', get_template_directory_uri() . '/popupvideo/grt-youtube-popup.js', array('jquery') );
	
	if( of_get_option('scrollanimation',true) != true) {
		wp_enqueue_style( 'sports-club-animation-style', get_template_directory_uri().'/css/animation-style.css' );
		wp_enqueue_script( 'sports-club-custom-animation', get_template_directory_uri() . '/js/custom-animation.js', array('jquery') );	
	}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sports_club_pro_scripts' );

function media_css_hook(){
	
	?>
    	
    	<script>
		jQuery(window).bind('scroll', function() {
	var wwd = jQuery(window).width();
	if( wwd > 939 ){
		var navHeight = jQuery( window ).height() - 575;
		<?php if( of_get_option('headstick',true) != '') { ?>
		if (jQuery(window).scrollTop() > navHeight) {
			jQuery(".site-header").addClass('fixed');
		}else {
			jQuery(".site-header").removeClass('fixed');
		}
		<?php } ?>
	}
});		

<?php if ( is_home() || is_front_page() ) { ?>
					
		jQuery(window).load(function() {
        jQuery('#slider').nivoSlider({
        	effect:'<?php echo of_get_option('slideefect',true); ?>', //sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft, fold, fade, random, slideInRight, slideInLeft, boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse
		  	animSpeed: <?php echo of_get_option('slideanim',true); ?>,
			pauseTime: <?php echo of_get_option('slidepause',true); ?>,
			directionNav: <?php echo of_get_option('slidenav',true); ?>,
			controlNav: <?php echo of_get_option('slidepage',true); ?>,
			pauseOnHover: <?php echo of_get_option('slidepausehover',true); ?>,
    });
});

<?php } ?>

jQuery(window).load(function() {   
  jQuery('.owl-carousel').owlCarousel({
    loop:true,	
	autoplay: <?php echo of_get_option('testimonialsautoplay',true); ?>,
	autoplayTimeout: <?php echo of_get_option('testimonialsrotatingspeed',true); ?>,
    margin:30,
    nav:false,
	dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})
    
  });


jQuery(document).ready(function() {
  
  jQuery('.link').on('click', function(event){
    var $this = jQuery(this);
    if($this.hasClass('clicked')){
      $this.removeAttr('style').removeClass('clicked');
    } else{
      $this.css('background','#7fc242').addClass('clicked');
    }
  });
 
});
		</script>
<?php   
}
add_action('wp_head','media_css_hook'); 


function sports_club_pro_custom_head_codes() { 
	if ( function_exists('of_get_option') ){
		if ( of_get_option('style2', true) != '' ) {
			echo "<style>". esc_html( of_get_option('style2', true) ) ."</style>";
		}
		echo "<style>";		
		if ( of_get_option('bodyfontcolor', true) != '' ) {
			echo 'body, .contact-form-section .address,  .accordion-box .acc-content{color:'. esc_html( of_get_option('bodyfontcolor', true) ) .';}';
		}
		if( of_get_option('bodyfontface', true) != '' || of_get_option('bodyfontsize',true) != ''){
			echo "body{font-family:".of_get_option('bodyfontface')."; font-size:".of_get_option('bodyfontsize',true).";}";
		}
		if( of_get_option('logofontface',true) != '' || of_get_option('logofontcolor',true) != '' || of_get_option('logofontsize',true) != ''){
			echo ".logo h1 {font-family:".of_get_option('logofontface').";color:".of_get_option('logofontcolor',true).";font-size:".of_get_option('logofontsize',true)."}";
		}
		
		if( of_get_option('logotaglinecolor',true) != '' ){
			echo ".tagline{color:".of_get_option('logotaglinecolor',true).";}";
		}
		if( of_get_option('logoheight',true) != '' ){
			echo ".logo img{height:".of_get_option('logoheight',true)."px;}";
		}		
				
		if ( of_get_option('navlibdcolor', true) != '' ) {
			echo ".sitenav ul li ul li{border-color:".of_get_option('navlibdcolor', true).";}"; 
		}
		if ( of_get_option('navfontface', true) != '' || of_get_option('navfontsize',true) != '' ) {
			echo '.sitenav ul{font-family:\''. esc_html( of_get_option('navfontface', true) ) .'\', sans-serif;font-size:'.of_get_option('navfontsize',true).'}';
		}		
			
		
		if ( of_get_option('navfontcolor', true) != '' ) {
			echo '.sitenav ul li a, .sitenav ul li.menu-item-object-page a, .sitenav ul li ul.sub-menu li.menu-item-object-page a{color:'. esc_html( of_get_option('navfontcolor', true) ) .';}';
		}		
			 
		if ( of_get_option('navfontactcolor', true) != '' ) {
				echo '.sitenav ul li a:hover, .sitenav ul li.current_page_item a, .sitenav ul li.current_page_item ul li a:hover, .sitenav ul li:hover, .sitenav ul li.current_page_item ul.sub-menu li a:hover, .sitenav ul li.current-menu-parent ul.sub-menu li a:hover, .sitenav ul li.current-menu-parent ul.sub-menu li.current_page_item a, .sitenav ul li:hover{color:'. esc_html( of_get_option('navfontactcolor', true) ) .';}';
			}
			 
		if( of_get_option('sectiontitlefontface',true) != '' || of_get_option('sectitlesize',true) != '' || of_get_option('sectitlecolor',true) != '' ){
			echo "h2.section_title, h3.section_title{ font-family:".of_get_option('sectiontitlefontface',true)."; font-size:".of_get_option('sectitlesize',true)."; color:".of_get_option('sectitlecolor',true)."; }";
		}	
				
		if ( of_get_option('linkhovercolor', true) != '' ) {
			echo 'a:hover, .slide_toggle a:hover{color:'. esc_html( of_get_option('linkhovercolor', true) ) .';}';
		}			
		if( of_get_option('foottitlecolor', true) != '' || of_get_option('ftfontsize', true) != '' ){
			echo ".footer h5{color:".of_get_option('foottitlecolor', true)."; font-size:".of_get_option('ftfontsize', true)."; }";
		}
		
		if( of_get_option('designcolor', true) != ''){
			echo ".design-by{color:".of_get_option('designcolor',true)."}";
		}		
		
		if ( of_get_option('headerbgcolor', true) != '' ) {
			echo ".logonavigation, .header-top .left:before, .header-top .left:after{background-color:".of_get_option('headerbgcolor',true)."; }";
		}
		
		if ( of_get_option('headertopfontcolor', true) != '' || of_get_option('headertopbgcolor', true) != '' ) {
			echo ".header-top{ color:".of_get_option('headertopfontcolor',true)."; }";
			echo ".header-top{background-color:".of_get_option('headertopbgcolor',true)."; }";
		}
						
		if( of_get_option('socialfontcolor',true) != '' ){
			echo ".header-top .social-icons a{ color:".of_get_option('socialfontcolor',true).";}";
		}			
		
				
		if( of_get_option('btntxtcolor', true) != ''){
			echo ".button, #commentform input#submit, input.search-submit, .post-password-form input[type=submit], p.read-more a, .pagination ul li span, .pagination ul li a, .headertop .right a, .wpcf7 form input[type='submit'], #sidebar .search-form input.search-submit{ color:". of_get_option('btntxtcolor', true) ."; }";
		}
		if( of_get_option('btnbghvcolor',true) != '' || of_get_option('btntxthvcolor', true) != '' ){
			echo "#commentform input#submit:hover, input.search-submit:hover, .post-password-form input[type=submit]:hover, p.read-more a:hover, .pagination ul li .current, .pagination ul li a:hover,.headertop .right a:hover, .wpcf7 form input[type='submit']:hover{background-color:".of_get_option('btnbghvcolor',true)."; color:". esc_html( of_get_option('btntxthvcolor', true) ) .";}";
		}		
		if( of_get_option('btntxtcolor', true) != ''){
			echo "a.morebutton{ color:". of_get_option('btntxtcolor', true) ."; }";
		}
		if( of_get_option('btnbghvcolor',true) != '' || of_get_option('btntxthvcolor', true) != '' ){
			echo "a.morebutton:hover{background-color:".of_get_option('btnbghvcolor',true)."; color:". esc_html( of_get_option('btntxthvcolor', true) ) .";}";
		}
 
		if ( of_get_option('widgetboxbgcolor', true) != '' || of_get_option('widgetboxfontcolor', true) != '' ) {
		echo "aside.widget{ background-color:".of_get_option('widgetboxbgcolor', true)."; color:".of_get_option('widgetboxfontcolor', true).";  }";
		}			
		if ( of_get_option('wdgttitleccolor', true) != '' ) {
			echo "h3.widget-title{ color:".of_get_option('wdgttitleccolor', true).";}";
		}				
		if ( of_get_option('footerbgcolor', true) != '' || of_get_option('footdesccolor', true) != '' ) {
		echo "#footer-wrapper{background-color:".of_get_option('footerbgcolor', true)."; color:".of_get_option('footdesccolor', true).";}";
		echo ".footer ul li a, .footerviewmore{color:".of_get_option('footdesccolor', true).";}";
		}
		
		if ( of_get_option('footerbgimage', true) != '') {
		echo "#footer-wrapper{background: url(".of_get_option('footerbgimage', true).") no-repeat; background-size: 100% 100% !important; }";
		}	
		
		if ( of_get_option('copybgcolor', true) != '' ) {
		echo ".copyright-wrapper{background-color:".of_get_option('copybgcolor', true)."; }";
		}
					
		
		if ( of_get_option('footdesccolor', true) != '' ) {
			echo ".contactdetail a{color:".of_get_option('footdesccolor', true)."; }";
		}			
				
		if( of_get_option('sldpagebg',true) != ''){
			echo ".nivo-controlNav a{background-color:".of_get_option('sldpagebg',true)."}";
		}
		
		if( of_get_option('sidebarliaborder', true) != '' ){
			echo "#sidebar ul li{border-color:".of_get_option('sidebarliaborder',true)."}";
		}	
		if( of_get_option('sidebarfontcolor',true) != '' ){
			echo "#sidebar ul li a{color:".of_get_option('sidebarfontcolor',true)."; }";
		}		
		
		if ( of_get_option('slidetitlefontface', true) != '' || of_get_option('slidetitlecolor', true) != '' || of_get_option('slidetitlefontsize', true) != '') {
		echo ".nivo-caption h2{font-family:".of_get_option('slidetitlefontface', true)."; color:".of_get_option('slidetitlecolor', true)."; font-size:".of_get_option('slidetitlefontsize', true).";}";
		}
		
		if ( of_get_option('slidedesfontface', true) != '' || of_get_option('slidedesccolor', true) != '' || of_get_option('slidedescfontsize', true) != '') {
		echo ".nivo-caption p{font-family:".of_get_option('slidedesfontface', true)."; color:".of_get_option('slidedesccolor', true)."; font-size:".of_get_option('slidedescfontsize', true).";}";
		}
					
		if ( of_get_option('copylinkshover', true) != '' ) {
		echo ".copyright-wrapper a:hover{ color: ".of_get_option('copylinkshover', true)."; }";
		}	
		
		if ( of_get_option('togglemenucolor', true) != '' ) {
		echo ".toggle a{ color:".of_get_option('togglemenucolor', true)."; }";
		}
		
		
		
/* Heading */
		if( of_get_option('headfontface', true) != '' ){
			echo "h1, h2, h3, h4, h5, h6{ font-family:".of_get_option('headfontface',true)."; }";
		}		
		if ( of_get_option('h1fontsize', true) != '' || of_get_option('h1fontcolor', true) != '' ) {
			echo "h1{ font-size:".of_get_option('h1fontsize', true)."; color:".of_get_option('h1fontcolor', true).";}";
		}
		if ( of_get_option('h2fontsize', true) != '' || of_get_option('h2fontcolor', true) != '' ) {
			echo "h2{ font-size:".of_get_option('h2fontsize', true)."; color:".of_get_option('h2fontcolor', true).";}";
		}		
		if ( of_get_option('h3fontsize', true) != '' || of_get_option('h3fontcolor', true) != '' ) {
			echo "h3{ font-size:".of_get_option('h3fontsize', true)."; color:".of_get_option('h3fontcolor', true).";}";
		}		
		if ( of_get_option('h4fontsize', true) != '' || of_get_option('h4fontcolor', true) != '' ) {
			echo "h4{ font-size:".of_get_option('h4fontsize', true)."; color:".of_get_option('h4fontcolor', true).";}";
		}		
		if ( of_get_option('h5fontsize', true) != '' || of_get_option('h5fontcolor', true) != '' ) {
			echo "h5{font-size:".of_get_option('h5fontsize', true)."; color:".of_get_option('h5fontcolor', true).";}";
		}		
		if ( of_get_option('h6fontsize', true) != '' || of_get_option('h6fontcolor', true) != '' ) {
			echo "h6{ font-size:".of_get_option('h6fontsize', true)."; color:".of_get_option('h6fontcolor', true).";}";
		}					
			
		if ( of_get_option('footsocialcolor', true) != '' ) {
			echo "#footer-wrapper .social-icons a{ color:".of_get_option('footsocialcolor', true)."; }";
		}		
		
 	$slidercaphex = of_get_option('slidercaptionbg',true); 
		list($r,$g,$b) = sscanf($slidercaphex,'#%02x%02x%02x');
		if ( of_get_option('sldarrowbg', true) != '' ) {
			echo ".nivo-caption{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('captionopacity',true).");}";
		} 
				
		if ( of_get_option('galleryfiltercolor', true) != '' ) {
			echo "ul.portfoliofilter li a{ color:".of_get_option('galleryfiltercolor', true)."; }";
		}			
		
		if ( of_get_option('gallerytitlecolorhv', true) != '' ) {
			echo ".holderwrap h5{ color:".of_get_option('gallerytitlecolorhv', true)."; }";
		}
		if ( of_get_option('gallerytitlecolorhv', true) != '' ) {
			echo ".holderwrap h5::after{ background-color:".of_get_option('gallerytitlecolorhv', true)."; }";
		}		
		
		if ( of_get_option('hometopfourbxtitlecolor', true) != '' ) {
			echo ".fourpagebox h3 a{ color:".of_get_option('hometopfourbxtitlecolor', true)."; }";
		}
				
		//Testimonials CSS			
		if ( of_get_option('testidotsbgcolor', true) != '' ) {
			echo ".owl-controls .owl-dot{ background-color:".of_get_option('testidotsbgcolor', true)."; }";
		}		
		
		if ( of_get_option('testimonialdescriptioncolor', true) != '' ) {
			echo "#clienttestiminials .item{ color:".of_get_option('testimonialdescriptioncolor', true)."; }";
		}			
				
		if ( of_get_option('footerpoststitlecolor', true) != '' ) {
			echo "ul.recent-post li h6 a{ color:".of_get_option('footerpoststitlecolor', true)."; }";
		}	
		
		//Color scheme for one click background color
		if ( of_get_option('colorscheme', true) != '' ) {
			echo "#commentform input#submit, 
			.button, 
			.button:after, 
			.button:before, .nivo-caption .button:before,
			input.search-submit, 
			.post-password-form input[type='submit'], 
			p.read-more a,
			.header-top .social-icons a:hover, 
			.pagination ul li span, 
			.pagination ul li a, 
			.headertop .right a, 
			.wpcf7 form input[type='submit'], 
			#sidebar .search-form input.search-submit,
			.nivo-controlNav a.active,			
			.holderwrap,
			.owl-controls .owl-dot.active,
			#section9 .owl-controls .owl-dot.active,			
			#commentform input#submit:hover, 
			input.search-submit:hover, 
			.post-password-form input[type=submit]:hover, 
			p.read-more a:hover, 
			.pagination ul li .current, 
			.pagination ul li a:hover,
			.headertop .right a:hover, 
			.wpcf7 form input[type='submit']:hover,					
			#footer-wrapper .social-icons a:hover,
			.toggle a,
			a.morebutton,						
			a.joinusstyle1,			
			.newspostdate,
			.blogrightsidebar .post-thumb,
			.bloggridlayout .post-thumb,			
			.woocommerce ul.products li.product a.add_to_cart_button:hover,
			.nbs-flexisel-nav-left:hover, .nbs-flexisel-nav-right:hover,		
			.teammember-list .thumnailbx,		
			.teammember-list:hover .degination,
			.woocommerce span.onsale,			
			.pagereadmore,
			.col-md-4:hover,
			.news_left_side .postdt,
			#teampanel .owl-prev:hover, #teampanel .owl-next:hover,
			#section7 .owl-prev:hover, #section7 .owl-next:hover,
			.moreicon .i, .news-title, .donatenow, a.projectReadMore, .causes-col a.read-more, .news_imgbox, .newsletter-form input[type=submit], .member-social-icon a:hover, .woocommerce ul.products li.product:hover i:after, .woocommerce ul.products li.product:hover .product-shadow:after, .newsletter-form i, .sitenav ul li:hover, .sitenav ul li.current-page-ancestor, .sitenav ul li.current_page_item:link, .sitenav ul li.current_page_item:visited, .sitenav ul li.current-menu-item, .sitenav ul li.current-menu-item:visited, .sitenav ul li.current-menu-parent:link, .sitenav ul li.current_page_parent:visited, .sitenav ul li.current-menu-ancestor:link, .sitenav ul li.current-menu-ancestor:visited, .header_right, .header_right:after, .servpagebox:hover .servread, .servpagebox:hover .servread:after, .servpagebox:hover .servthumbbx, .latest_results .gamedetail, .most_video:hover .most_video_bg, .most_video_bg i, #section4 .one_half.last_column, #section4 .one_half.last_column:after, .matchreadmore, .news_author_date, .news-readmore i:after, ul.recent-post .footerthumb span.ftdate, ul.recent-post .footerthumb span.ftdate:before, .facilities:hover .facilitiesbg, .owl-prev:hover, .owl-next:hover{background-color:".of_get_option('colorscheme', true)."; }";
			
echo ".upcomingmatch:hover .tripdate, .upcomingmatch:hover .triptitledes{background:".of_get_option('colorscheme', true)." !important; }";
echo ".awards-lists .owl-prev:hover, .awards-lists .owl-next:hover{border-color:".of_get_option('colorscheme', true)." !important; }";
echo ".awards-lists .owl-prev:hover:before, .awards-lists .owl-next:hover:before{border-color:".of_get_option('colorscheme', true)." !important; color:".of_get_option('colorscheme', true)." !important; }";

		}
		
				
		//Color scheme for one click font color
		if ( of_get_option('colorscheme', true) != '' ) {
			echo "a, .offcontnt .pricedv,			
			.contactdetail a:hover, 
			.footer h5 span, 
			.footer ul li a:hover, .footerviewmore:hover, 
			.footer ul li.current_page_item a, 
			div.recent-post a:hover,		
			.copyright-wrapper a,				
			.slide_toggle a,			
			#sidebar ul li a:hover,
			h3.post-title a:hover,
			.welcome_titlecolumn h3 span,		
			.woocommerce table.shop_table th, 
			.woocommerce-page table.shop_table th,
			#clienttestiminials h6 a,			
			ul.portfoliofilter li a.selected, 
			ul.portfoliofilter li a:hover,
			ul.portfoliofilter li:hover a,
			h2.section_title span, h3.section_title span, 
			.mycounterbox .counter,
			.woocommerce ul.products li.product h2:hover,
			#section8 h3 span,
			.ftr_textlogo h2 span,
			.woocommerce div.product p.price, 
			.woocommerce div.product span.price, .header-top .social-icons a:hover, .cuase-raised h5 span, .circle-title, .nextmatch h4, .servicesboxbg:hover .services-title h5{ color:".of_get_option('colorscheme', true)."; }";
		}
		
		if ( of_get_option('colorscheme', true) != '' ) {
			echo "@media screen and (max-width: 980px) { .sitenav ul li a:hover, .sitenav ul li.current_page_item a, .sitenav ul li.current_page_item ul li a:hover, .sitenav ul li:hover, .sitenav ul li.current_page_item ul.sub-menu li a:hover, .sitenav ul li.current-menu-parent ul.sub-menu li a:hover, .sitenav ul li.current-menu-parent ul.sub-menu li.current_page_item a, .sitenav ul li:hover{color:".of_get_option('colorscheme', true)."; }}";
		}
		
		
		//Color scheme for one click border color
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".nivo-controlNav a.active::after,
			.col-md-4,
			#section7 .owl-prev:hover, #section7 .owl-next:hover,
			ul.portfoliofilter li:hover a, .circle-left, .red-dot{ border-color:".of_get_option('colorscheme', true)."; }";
		}
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".contact-image{box-shadow: 15px 15px 0 ".of_get_option('colorscheme', true)."; }";
			echo ".nextmatch h6.next-title{color:".of_get_option('colorscheme', true)." !important; }";
		}
		//Color scheme for one click border color
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".newspostdate::after{ border-top-color:".of_get_option('colorscheme', true)."; }";
		}
		
		// Second Color scheme for hole site
		if ( of_get_option('colorscheme_hover', true) != '' ) {
			echo ".button:hover, .button:hover:after, .button:hover:before, .nivo-caption .button:hover:before, .sd-search input, .sd-top-bar-nav .sd-search input, .donatenow:hover, a.projectReadMore:hover, .causes-col a.read-more:hover, .latest_results .gamedetail:hover{background-color:".of_get_option('colorscheme_hover', true)."; }";
		}
		
		
		echo "</style>";
	}
}
add_action('wp_head', 'sports_club_pro_custom_head_codes');


//pagination
function sports_club_pro_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}


//pagination
function sports_club_pro_custom_blogpost_pagination( $wp_query ){
	$big = 999999999; // need an unlikely integer
	if ( get_query_var('paged') ) { $pageVar = 'paged'; }
	elseif ( get_query_var('page') ) { $pageVar = 'page'; }
	else { $pageVar = 'paged'; }
	$pagin = paginate_links( array(
		'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' 		=> '?'.$pageVar.'=%#%',
		'current' 		=> max( 1, get_query_var($pageVar) ),
		'total' 		=> $wp_query->max_num_pages,
		'prev_text'		=> '&laquo; Prev',
		'next_text' 	=> 'Next &raquo;',
		'type'  => 'array'
	) ); 
	if( is_array($pagin) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $pagin as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	} 
}



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom functions file.
 */
require get_template_directory() . '/inc/custom-functions.php';
