<?php
/**
 * @package Sports Club
 * Setup the WordPress core custom functions feature.
 *
*/

add_action('sports_club_pro_optionsframework_custom_scripts', 'sports_club_pro_optionsframework_custom_scripts');
function sports_club_pro_optionsframework_custom_scripts() { ?>
	<script type="text/javascript">
    jQuery(document).ready(function() {
    
        jQuery('#example_showhidden').click(function() {
            jQuery('#section-example_text_hidden').fadeToggle(400);
        });
        
        if (jQuery('#example_showhidden:checked').val() !== undefined) {
            jQuery('#section-example_text_hidden').show();
        }
        
    });
    </script><?php
}

// get_the_content format text
function get_the_content_format( $str ){
	$raw_content = apply_filters( 'the_content', $str );
	$content = str_replace( ']]>', ']]&gt;', $raw_content );
	return $content;
}
// the_content format text
function the_content_format( $str ){
	echo get_the_content_format( $str );
}

function is_google_font( $font ){
	$notGoogleFont = array( 'Arial', 'Comic Sans MS', 'FreeSans', 'Georgia', 'Lucida Sans Unicode', 'Palatino Linotype', 'Symbol', 'Tahoma', 'Trebuchet MS', 'Verdana' );
	if( in_array($font, $notGoogleFont) ){
		return false;
	}else{
		return true;
	}
}

// subhead section function
function sub_head_section( $more ) {
	$pgs = 0;
	do {
		$pgs++;
	} while ($more > $pgs);
	return $pgs;
}

//[clear]
function clear_func() {
	$clr = '<div class="clear"></div>';
	return $clr;
}
add_shortcode( 'clear', 'clear_func' );


//[column_content]Your content here...[/column_content]
function column_content_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => '',	
	), $atts ) );
	$colPos = strpos($type, '_last');
	if($colPos === false){
		$cnt = '<div class="'.$type.'">'.do_shortcode($content).'</div>';
	}else{
		$type = substr($type,0,$colPos);
		$cnt = '<div class="'.$type.' last_column">'.do_shortcode($content).'</div>';
	}
	return $cnt;
}
add_shortcode( 'column_content', 'column_content_func' );


//[hr]
function hrule_func() {
	$hrule = '<div class="hr"></div>';
	return $hrule;
}
add_shortcode( 'hr', 'hrule_func' );

//[hr_top]
function back_to_top_func() {
	$back_top = '<div id="back-top">
		<a title="Top of Page" href="#top"><span></span></a>
	</div>';
	return $back_top;
}
add_shortcode( 'back-to-top', 'back_to_top_func' );


// [searchform]
function searchform_shortcode_func( $atts ){
	return get_search_form( false );
}
add_shortcode( 'searchform', 'searchform_shortcode_func' );

// accordion
function accordion_func( $atts, $content = null ) {
	$acc = '<div style="margin-top:10px;">'.get_the_content_format( do_shortcode($content) ).'<div class="clear"></div></div>';
	return $acc;
}
add_shortcode( 'accordion', 'accordion_func' );
function accordion_content_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Accordion Title',
	), $atts ) );
	$content = wpautop(trim($content));
	$acn = '<div class="accordion-box"><h2>'.$title.'</h2>
			<div class="acc-content">'.$content.'</div><div class="clear"></div></div>';
	return $acn;
}
add_shortcode( 'accordion_content', 'accordion_content_func' );


// remove excerpt more
function new_excerpt_more( $more ) {
	return '... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

// get post categories function
function getPostCategories(){
	$categories = get_the_category();
	$catOut = '';
	$separator = ', ';
	$catOutput = '';
	if($categories){
		foreach($categories as $category) {
			$catOutput .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'sports-club' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
		}
		$catOut = ''.trim($catOutput, $separator);
	}
	return $catOut;
}

// replace last occurance of a string.
function str_lreplace($search, $replace, $subject){
	$pos = strrpos($subject, $search);
	if($pos !== false){
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}
	return $subject;
}

// custom post type for Testimonials
function my_custom_post_testimonials() {
	$labels = array(
		'name'               => __( 'Testimonial','sports-club'),
		'singular_name'      => __( 'Testimonial','sports-club'),
		'add_new'            => __( 'Add Testimonial','sports-club'),
		'add_new_item'       => __( 'Add New Testimonial','sports-club'),
		'edit_item'          => __( 'Edit Testimonial','sports-club'),
		'new_item'           => __( 'New Testimonial','sports-club'),
		'all_items'          => __( 'All Testimonials','sports-club'),
		'view_item'          => __( 'View Testimonial','sports-club'),
		'search_items'       => __( 'Search Testimonials','sports-club'),
		'not_found'          => __( 'No testimonials found','sports-club'),
		'not_found_in_trash' => __( 'No testimonials found in the Trash','sports-club'), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Testimonials',
		'public'        => true,
		'menu_icon'		=> 'dashicons-format-quote',
		'menu_position' => null,
		'supports'      => array( 'title', 'editor', 'thumbnail'),
		'has_archive'   => true,
	);
	register_post_type( 'testimonials', $args );	
}
add_action( 'init', 'my_custom_post_testimonials' );

// add meta box to testimonials
add_action( 'admin_init', 'my_testimonials_admin_function' );
function my_testimonials_admin_function() {
    add_meta_box( 'testimonials_meta_box',
        'Testimonials Info',
        'display_testimonials_meta_box',
        'testimonials', 'normal', 'high'
    );
}
// add meta box form to team
function display_testimonials_meta_box( $testimonials ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $designation = esc_html( get_post_meta( $testimonials->ID, 'designation', true ) );   
    ?>
    <table width="100%">
        <tr>
            <td width="20%">client info (designation) </td>
            <td width="80%"><input type="text" name="designation" value="<?php echo $designation; ?>" /></td>
        </tr>      
    </table>
    <?php      
}
// save team meta box form data
add_action( 'save_post', 'add_testimonials_fields_function', 10, 2 );
function add_testimonials_fields_function( $testimonials_id, $testimonials ) {
    // Check post type for testimonials
    if ( $testimonials->post_type == 'testimonials' ) {
        // Store data in post meta table if present in post data
        if ( isset($_POST['designation']) ) {
            update_post_meta( $testimonials_id, 'designation', $_POST['designation'] );
        }        
    }
}


//Testimonials function
function testimonials_output_func( $atts ){
	extract( shortcode_atts( array( 
	'show' => '',
	),
	$atts ) ); 		
	wp_reset_query();
 	query_posts('post_type=testimonials&posts_per_page='.$show);
	if ( have_posts() ) :
	 $testimonialoutput = '<div id="clienttestiminials"><div class="owl-carousel">';	
		while ( have_posts() ) : the_post();
		if ( has_post_thumbnail()) {
				$large_imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				$imgUrl = $large_imgSrc[0];
		}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
		}
		$designation = esc_html( get_post_meta( get_the_ID(), 'designation', true ) );		  		
			$testimonialoutput .= '			     
				<div class="item">
					<div class="tmthumb"><img src="'.$imgUrl.'" alt=" " /></div>
					<h6>'.get_the_title().' <span>'.$designation.'</span></h6>
					'.content( of_get_option('testimonialsexcerptlength') ).'					
				</div>
			';
		endwhile;
		 $testimonialoutput .= '</div></div>';
	else:
	  $testimonialoutput = '<div id="clienttestiminials"><div class="owl-carousel"> 
              
               <div class="item">				
				 <p>Donec ut ex ac nulla pellentesque mollis in a enim Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin seduisque velit nibh.Donec ut ex ac nulla&#8230;</p>
					 <h6>Stuart Joseph</h6>	
					 <span>Happy Customer</span>
				</div>	
							     
				 <div class="item">				
				 <p>Donec ut ex ac nulla pellentesque mollis in a enim Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin seduisque velit nibh.Donec ut ex ac nulla&#8230;</p>
					 <h6>Stuart Joseph</h6>	
					 <span>Happy Customer</span>
				</div>
				
				<div class="item">				
				 <p>Donec ut ex ac nulla pellentesque mollis in a enim Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin seduisque velit nibh.Donec ut ex ac nulla&#8230;</p>
					 <h6>Stuart Joseph</h6>	
					 <span>Happy Customer</span>
				</div>
				
				<div class="item">				
				 <p>Donec ut ex ac nulla pellentesque mollis in a enim Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin seduisque velit nibh.Donec ut ex ac nulla&#8230;</p>
					 <h6>Stuart Joseph</h6>	
					 <span>Happy Customer</span>
				</div>
			               
           
  </div></div>';			
	  endif;  
	wp_reset_query();	
	return $testimonialoutput;
}
add_shortcode( 'testimonials', 'testimonials_output_func' );



//Testimonials function
function testimonials_listing_output_func( $atts ){
	extract( shortcode_atts( array( 
	'show' => '',
	),
	$atts ) ); 		
	wp_reset_query();
 	query_posts('post_type=testimonials&posts_per_page='.$show);
	if ( have_posts() ) :
	 $testimonialoutput = '<div id="Tmnllist">';	
		while ( have_posts() ) : the_post();
		if ( has_post_thumbnail()) {
				$large_imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
				$imgUrl = $large_imgSrc[0];
			}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
			}	
		$designation = esc_html( get_post_meta( get_the_ID(), 'designation', true ) );		   
			$testimonialoutput .= '
			    <div class="tmnllisting">
			 	<div class="tmnlthumb"><a href="'.get_permalink().'"><img src="'.$imgUrl.'" alt=" " /></a></div>
				 <h6><a href="'.get_permalink().'">'.get_the_title().'</a></h6>	
				 <span>'.$designation.'</span>
				  '.content( of_get_option('testimonialsexcerptlength') ).'
				</div>	';
		endwhile;
		 $testimonialoutput .= '</div>';
	else:
	  $testimonialoutput = '<div id="Tmnllist"> 
           
              <div class="tmnllisting">
                <div class="tmnlthumb"><a href="#"><img src="'.get_template_directory_uri()."/images/team1.jpg".'" alt="" /></a></div>
                   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>
				   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
               </div>
			  
                <div class="tmnllisting">
                <div class="tmnlthumb"><a href="#"><img src="'.get_template_directory_uri()."/images/team2.jpg".'" alt="" /></a></div>
                   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>
				   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
               </div>
			  
			     <div class="tmnllisting">
                <div class="tmnlthumb"><a href="#"><img src="'.get_template_directory_uri()."/images/team3.jpg".'" alt="" /></a></div>
                   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>
				   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
               </div>
			  
			    <div class="tmnllisting">
                <div class="tmnlthumb"><a href="#"><img src="'.get_template_directory_uri()."/images/team4.jpg".'" alt="" /></a></div>
                   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>
				   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
               </div>
			               
           
  </div>';			
	  endif;  
	wp_reset_query();	
	return $testimonialoutput;
}
add_shortcode( 'testimonials-listing', 'testimonials_listing_output_func' );


//Testimonials function
function testimonials_rotator_output_func( $atts ){
	extract( shortcode_atts( array( 
	'show' => '',
	),
	$atts ) ); 		
	wp_reset_query();
 	query_posts('post_type=testimonials&posts_per_page='.$show);
	if ( have_posts() ) :
	 $testimonialoutput = '<div id="testimonials"><div class="quotes">';	
		while ( have_posts() ) : the_post();	
		$designation = esc_html( get_post_meta( get_the_ID(), 'designation', true ) );		   
			$testimonialoutput .= '
			  <div> '.content( of_get_option('testimonialsexcerptlength') ).'
				  <h6><a href="'.get_permalink().'">'.get_the_title().'</a></h6>
				  <span>'.$designation.'</span>					
              </div>
			';
		endwhile;
		 $testimonialoutput .= '</div></div>';
	else:
	  $testimonialoutput = '<div id="testimonials"><div class="quotes">
           
               <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
				   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>				  
               </div>
			  
                 <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
				   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>				  
               </div>
           
  </div></div>';			
	  endif;  
	wp_reset_query();	
	return $testimonialoutput;
}
add_shortcode( 'sidebar-testimonials', 'testimonials_rotator_output_func' );


//custom post type for Our Team
function my_custom_post_team() {
	$labels = array(
		'name'               => __( 'Our Team', 'sports-club' ),
		'singular_name'      => __( 'Our Team', 'sports-club' ),
		'add_new'            => __( 'Add New', 'sports-club' ),
		'add_new_item'       => __( 'Add New Team Member', 'sports-club' ),
		'edit_item'          => __( 'Edit Team Member', 'sports-club' ),
		'new_item'           => __( 'New Member', 'sports-club' ),
		'all_items'          => __( 'All Members', 'sports-club' ),
		'view_item'          => __( 'View Members', 'sports-club' ),
		'search_items'       => __( 'Search Team Members', 'sports-club' ),
		'not_found'          => __( 'No Team members found', 'sports-club' ),
		'not_found_in_trash' => __( 'No Team members found in the Trash', 'sports-club' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Our Team'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Team',
		'public'        => true,
		'menu_position' => null,
		'menu_icon'		=> 'dashicons-groups',
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
		'rewrite' => array('slug' => 'our-team'),
		'has_archive'   => true,
	);
	register_post_type( 'team', $args );
}
add_action( 'init', 'my_custom_post_team' );

// add meta box to team
add_action( 'admin_init', 'my_team_admin_function' );
function my_team_admin_function() {
    add_meta_box( 'team_meta_box',
        'Member Info',
        'display_team_meta_box',
        'team', 'normal', 'high'
    );
}
// add meta box form to team
function display_team_meta_box( $team ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $designation = esc_html( get_post_meta( $team->ID, 'designation', true ) );
    $facebook = get_post_meta( $team->ID, 'facebook', true );
	$facebooklink = esc_url( get_post_meta( $team->ID, 'facebooklink', true ) );
    $twitter = get_post_meta( $team->ID, 'twitter', true );
	$twitterlink = esc_url( get_post_meta( $team->ID, 'twitterlink', true ) );
    $linkedin = get_post_meta( $team->ID, 'linkedin', true );
	$linkedinlink = esc_url( get_post_meta( $team->ID, 'linkedinlink', true ) );
	$pint = get_post_meta( $team->ID, 'google', true );
	$googlelink = esc_url( get_post_meta( $team->ID, 'googlelink', true ) );
    $dribbble = get_post_meta( $team->ID, 'dribbble', true );
	$dribbblelink = get_post_meta( $team->ID, 'dribbblelink', true );
    ?>
    <table width="100%">
        <tr>
            <td width="20%">Designation </td>
            <td width="80%"><input type="text" name="designation" value="<?php echo $designation; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social link 1</td>
            <td width="40%"><input type="text" name="facebook" value="<?php echo $facebook; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="facebooklink" value="<?php echo $facebooklink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 2</td>
            <td width="40%"><input type="text" name="twitter" value="<?php echo $twitter; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="twitterlink" value="<?php echo $twitterlink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 3</td>
            <td width="40%"><input type="text" name="linkedin" value="<?php echo $linkedin; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="linkedinlink" value="<?php echo $linkedinlink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 4</td>
            <td width="40%"><input type="text" name="dribbble" value="<?php echo $dribbble; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="dribbblelink" value="<?php echo $dribbblelink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 5</td>
            <td width="40%"><input type="text" name="google" value="<?php echo $pint; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="googlelink" value="<?php echo $googlelink; ?>" /></td>
        </tr>
        <tr>
        	<td width="100%" colspan="3"><label style="font-size:12px;"><strong>Note:</strong> Icon name should be in lowercase without space. More social icons can be found at: https://fontawesome.com/icons</label> </td>
        </tr>
    </table>
    <?php                   
}
// save team meta box form data
add_action( 'save_post', 'add_team_fields_function', 10, 2 );
function add_team_fields_function( $team_id, $team ) {
    // Check post type for testimonials
    if ( $team->post_type == 'team' ) {
        // Store data in post meta table if present in post data
        if ( isset($_POST['designation']) ) {
            update_post_meta( $team_id, 'designation', $_POST['designation'] );
        }
        if ( isset($_POST['facebook']) ) {
            update_post_meta( $team_id, 'facebook', $_POST['facebook'] );
        }
		if ( isset($_POST['facebooklink']) ) {
            update_post_meta( $team_id, 'facebooklink', $_POST['facebooklink'] );
        }
        if ( isset($_POST['twitter']) ) {
            update_post_meta( $team_id, 'twitter', $_POST['twitter'] );
        }
		if ( isset($_POST['twitterlink']) ) {
            update_post_meta( $team_id, 'twitterlink', $_POST['twitterlink'] );
        }
        if ( isset($_POST['linkedin']) ) {
            update_post_meta( $team_id, 'linkedin', $_POST['linkedin'] );
        }
		if ( isset($_POST['linkedinlink']) ) {
            update_post_meta( $team_id, 'linkedinlink', $_POST['linkedinlink'] );
        }
        if ( isset($_POST['dribbble']) ) {
            update_post_meta( $team_id, 'dribbble', $_POST['dribbble'] );
        }
		if ( isset($_POST['dribbblelink']) ) {
            update_post_meta( $team_id, 'dribbblelink', $_POST['dribbblelink'] );
        }
		if ( isset($_POST['google']) ) {
            update_post_meta( $team_id, 'google', $_POST['google'] );
        }
		if ( isset($_POST['googlelink']) ) {
            update_post_meta( $team_id, 'googlelink', $_POST['googlelink'] );
        }
    }
}

function our_teamposts_func( $atts ) {
   extract( shortcode_atts( array(
		'show' => '',
	), $atts ) );
	  extract( shortcode_atts( array( 'show' => '',), $atts ) ); 
	$bposts = '<div id="teampanel">';
	$args = array( 'post_type' => 'team', 'posts_per_page' => $show, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
	query_posts( $args );
	$posts = query_posts( $args );
	$count = count($posts);
	if($count < 4) {
	echo "<style> #charitydonor .owl-controls { display: none !important; } </style>";
	}
	$n = 0;
	if ( have_posts() ) {
		while ( have_posts() ) { 
			the_post();
			$n++; if( $n%4 == 0 ) $nomargn = ' lastcols'; else $nomargn = '';
			$designation = esc_html( get_post_meta( get_the_ID(), 'designation', true ) );
			$facebook = get_post_meta( get_the_ID(), 'facebook', true );
			$facebooklink = get_post_meta( get_the_ID(), 'facebooklink', true );
			$twitter = get_post_meta( get_the_ID(), 'twitter', true );
			$twitterlink = get_post_meta( get_the_ID(), 'twitterlink', true );
			$linkedin = get_post_meta( get_the_ID(), 'linkedin', true );
			$linkedinlink = get_post_meta( get_the_ID(), 'linkedinlink', true );
			$dribbble = get_post_meta( get_the_ID(), 'dribbble', true );
			$dribbblelink = get_post_meta( get_the_ID(), 'dribbblelink', true );
			$pint = get_post_meta( get_the_ID(), 'google', true );
			$googlelink = get_post_meta( get_the_ID(), 'googlelink', true );				
			
			$bposts .= '<div class="item teammember-list'.$nomargn.'">';	
			$bposts .= '<div class="thumnailbx"><a class="hvr-grow" href="'.get_the_permalink().'">'. get_the_post_thumbnail().'</a>';
			
			$bposts .= '<div class="titledesbox"><span class="title">'.get_the_title().'</span><cite>'.$designation.'</cite></div>';
			
			$bposts .= '<div class="member-social-icon">';
				if( $facebook != '' ){
					$bposts .= '<a href="'.$facebooklink.'" title="'.$facebook.'" target="_blank"><i class="'.$facebook.'"></i></a>';
				}
				if( $twitter != '' ){
					$bposts .= '<a href="'.$twitterlink.'" title="'.$twitter.'" target="_blank"><i class="'.$twitter.'"></i></a>';
				}
				if( $linkedin != '' ){
					$bposts .= '<a href="'.$linkedinlink.'" title="'.$linkedin.'" target="_blank"><i class="'.$linkedin.'"></i></a>';
				}
				if( $dribbble != '' ){
					$bposts .= '<a href="'.$dribbblelink.'" title="'.$dribbble.'" target="_blank"><i class="'.$dribbble.'"></i></a>';
				}
				if( $pint != '' ){
					$bposts .= '<a href="'.$googlelink.'" title="'.$pint.'" target="_blank"><i class="'.$pint.'"></i></a><div class="clear"></div>';
				}
			$bposts .= '</div>';
			
			$bposts .= '</div>';
			$bposts .= '<div class="titledesbox"><span class="title">'.get_the_title().'</span>
						<cite>'.$designation.'</cite></div>';
						
			$bposts .= '</div>';
		}
	}else{
		$bposts .= 'There are not found our team members';
	}
	wp_reset_query();
	$bposts .= '</div><div class="clear"></div>';
    return $bposts;
}
add_shortcode( 'our-team', 'our_teamposts_func' );

// Social Icon Shortcodes
function sports_club_pro_social_area($atts,$content = null){
  return '<div class="social-icons">'.do_shortcode($content).'</div>';
 }
add_shortcode('social_area','sports_club_pro_social_area');

function sports_club_pro_social($atts){
 extract(shortcode_atts(array(
  'icon' => '',
  'link' => ''
 ),$atts));
  return '<a href="'.$link.'" target="_blank" class="'.$icon.'" title="'.$icon.'"></a>';
 }
add_shortcode('social','sports_club_pro_social');


function contactform_func( $atts ) {
    $atts = shortcode_atts( array(
        'to_email' => get_bloginfo('admin_email'),
		'title' => 'Contact enquiry - '.home_url( '/' ),
    ), $atts );

	$cform = "<div class=\"main-form-area\" id=\"contactform_main\">";

	$cerr = array();
	if( isset($_POST['c_submit']) && $_POST['c_submit']=='Submit' ){
		$name 			= trim( $_POST['c_name'] );
		$email 			= trim( $_POST['c_email'] );	
		$comments 		= trim( $_POST['c_comments'] );
		$captcha 		= trim( $_POST['c_captcha'] );
		$captcha_cnf	= trim( $_POST['c_captcha_confirm'] );

		if( !$name )
			$cerr['name'] = 'Please enter your name.';
		if( ! filter_var($email, FILTER_VALIDATE_EMAIL) ) 
			$cerr['email'] = 'Please enter a valid email.';		
		if( !$comments )
			$cerr['comments'] = 'Please enter your message.';
		if( !$captcha || (md5($captcha) != $captcha_cnf) )
			$cerr['captcha'] = 'Please enter the correct answer.';

		if( count($cerr) == 0 ){
			$subject = $atts['title'];
			$headers = "From: ".$name." <" . strip_tags($email) . ">\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

			$message = '<html><body>
							<table>
								<tr><td>Name: </td><td>'.$name.'</td></tr>
								<tr><td>Email: </td><td>'.$email.'</td></tr>													
								<tr><td>Message: </td><td>'.$comments.'</td></tr>
							</table>
						</body>
					</html>';
			mail( $atts['to_email'], $subject, $message, $headers);
			$cform .= '<div class="success_msg">Thank you! A representative will get back to you very shortly.</div>';
			unset( $name, $email, $comments, $captcha );
		}else{
			$cform .= '<div class="error_msg">';
			$cform .= implode('<br />',$cerr);
			$cform .= '</div>';
		}
	}

	$capNum1 	= rand(1,4);
	$capNum2 	= rand(1,5);
	$capSum		= $capNum1 + $capNum2;
	$sumStr		= $capNum1." + ".$capNum2 ." = ";

	$cform .= "<form name=\"contactform\" action=\"#contactform_main\" method=\"post\">
			<p><input type=\"text\" name=\"c_name\" value=\"". ( ( empty($name) == false ) ? $name : "" ) ."\" placeholder=\"Name\" /></p>
			<p><input type=\"email\" name=\"c_email\" value=\"". ( ( empty($email) == false ) ? $email : "" ) ."\" placeholder=\"Email\" /></p>			
			<p><textarea name=\"c_comments\" placeholder=\"Message\">". ( ( empty($comments) == false ) ? $comments : "" ) ."</textarea></p>";
	$cform .= "<p><span class=\"capcode\">$sumStr</span><input type=\"text\" placeholder=\"Captcha\" value=\"". ( ( empty($captcha) == false ) ? $captcha : "" ) ."\" name=\"c_captcha\" /><input type=\"hidden\" name=\"c_captcha_confirm\" value=\"". md5($capSum)."\"></p>";
	$cform .= "<p class=\"sub\"><input type=\"submit\" name=\"c_submit\" value=\"Submit\" class=\"search-submit\" /></p>
		</form>
	</div>";

    return $cform;
}
add_shortcode( 'contactform', 'contactform_func' );

//custom post type for Our photogallery
function my_custom_post_photogallery() {
	$labels = array(
		'name'               => __( 'Photo Gallery','sports-club' ),
		'singular_name'      => __( 'Photo Gallery','sports-club' ),
		'add_new'            => __( 'Add New','sports-club' ),
		'add_new_item'       => __( 'Add New Image ','sports-club' ),
		'edit_item'          => __( 'Edit Image','sports-club' ),
		'new_item'           => __( 'New Image','sports-club' ),
		'all_items'          => __( 'All Images','sports-club' ),
		'view_item'          => __( 'View Image','sports-club' ),
		'search_items'       => __( 'Search Images','sports-club' ),
		'not_found'          => __( 'No images found','sports-club' ),
		'not_found_in_trash' => __( 'No images found in the Trash','sports-club' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Photo Gallery'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Photo Gallery',
		'public'        => true,
		'menu_position' => 23,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'photogallery', $args );
}
add_action( 'init', 'my_custom_post_photogallery' );


//  register gallery taxonomy
register_taxonomy( "gallerycategory", 
	array("photogallery"), 
	array(
		"hierarchical" => true, 
		"label" => "Gallery Category", 
		"singular_label" => "Photo Gallery", 
		"rewrite" => true
	)
);

add_action("manage_posts_custom_column",  "photogallery_custom_columns");
add_filter("manage_edit-photogallery_columns", "photogallery_edit_columns");
function photogallery_edit_columns($columns){
	$columns = array(
		"cb" => '<input type="checkbox" />',
		"title" => "Gallery Title",
		"pcategory" => "Gallery Category",
		"view" => "Image",
		"date" => "Date",
	);
	return $columns;
}
function photogallery_custom_columns($column){
	global $post;
	switch ($column) {
		case "pcategory":
			echo get_the_term_list($post->ID, 'gallerycategory', '', ', ','');
		break;
		case "view":
			the_post_thumbnail('thumbnail');
		break;
		case "date":

		break;
	}
}


//[photogallery filter="false"]
function photogallery_shortcode_func( $atts ) {
	extract( shortcode_atts( array(
		'show' => -1,
		'filter' => 'true'
	), $atts ) );
	$pfStr = '';

	$pfStr .= '<div class="photobooth">';
	if( $filter == 'true' ){
		$pfStr .= '<ul class="portfoliofilter clearfix"><li><a class="selected" data-filter="*" href="#">'.of_get_option('galleryshowallbtn').'</a><span></span></li>';
		$categories = get_categories( array('taxonomy' => 'gallerycategory') );
		foreach ($categories as $category) {
			$pfStr .= '<li><a data-filter=".'.$category->slug.'" href="#">'.$category->name.'</a></li>';
		}
		$pfStr .= '</ul>';
	}

	$pfStr .= '<div class="row threecol portfoliowrap"><div class="portfolio">';
	$j=0;
	query_posts('post_type=photogallery&posts_per_page='.$show); 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$j++;
		$videoUrl = get_post_meta( get_the_ID(), 'video_file_url', true);
		$imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		$terms = wp_get_post_terms( get_the_ID(), 'gallerycategory', array("fields" => "all"));
		$slugAr = array();
		foreach( $terms as $tv ){
			$slugAr[] = $tv->slug;
		}
		if ( $imgSrc[0]!='' ) {
			$imgUrl = $imgSrc[0];
		}else{
			$imgUrl = get_template_directory_uri().'/images/img_404.png';
		}
		$pfStr .= '<div class="entry '.implode(' ', $slugAr).'">
						<div class="holderwrap">
							 <figure><a href="'.( ($videoUrl) ? $videoUrl : $imgSrc[0] ).'" data-rel="prettyPhoto[bkpGallery]"><img src="'.$imgSrc[0].'"/>
							 <h5>'.get_the_title().'</h5></a>	
							 </figure>						
						</div>
					</div>';
		unset( $slugAr );
	endwhile; else: 
		$pfStr .= '<p>Sorry, photo gallery is empty.</p>';
	endif; 
	wp_reset_query();
	$pfStr .= '</div></div>';
	$pfStr .= '</div>';
	return $pfStr;
}
add_shortcode( 'photogallery', 'photogallery_shortcode_func' );

/*toggle function*/
function toggle_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Click here to toggle content',
	), $atts ) );
	$tog_content = "<div class=\"toggle_holder\"><h3 class=\"slide_toggle\"><a href=\"#\">{$title}</a></h3>
					<div class=\"slide_toggle_content\">".get_the_content_format( $content )."</div></div>";

	return $tog_content;
}
add_shortcode( 'toggle_content', 'toggle_func' );

function tabs_func( $atts, $content = null ) {
	$tabs = '<div class="tabs-wrapper"><ul class="tabs">'.do_shortcode($content).'</ul></div>';
	return $tabs;
}
add_shortcode( 'tabs', 'tabs_func' );

function tab_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Tab Title',
	), $atts ) );
	$rand = rand(100,999);
	$tab = '<li><a rel="tab'.$rand.'" href="javascript:void(0)">'.$title.'</a><div id="tab'.$rand.'" class="tab-content">'.get_the_content_format($content).'</div></li>';
	return $tab;
}
add_shortcode( 'tab', 'tab_func' );

// Button Shortcode
function readmorebtn_fun($atts){
	extract(shortcode_atts(array(
	'name'	=> '',
	'align'	=> '',
	'link'	=> '#',
	'target'=> '',
	), $atts));
	return '<div class="custombtn" style="text-align:'.$align.'">	
	   <a class="button" href="'.$link.'" target"'.$target.'">'.$name.'</a>	   	   
	</div>';
	}
add_shortcode('button','readmorebtn_fun');

// Button Shortcode
function joinusbtn_style2_fun($atts){
	extract(shortcode_atts(array(
	'name'	=> '',
	'align'	=> '',
	'link'	=> '#',
	'target'=> '',	
	), $atts));
	return '<div class="joinusbtn" style="text-align:'.$align.'">	
	   <a class="joinusstyle1" href="'.$link.'" target"'.$target.'">'.$name.'</a>	   	   
	</div>';
	}
add_shortcode('joinusbtn','joinusbtn_style2_fun');

// space Shortcode
// [space height="30px"]
function space_fun($atts){
	extract(shortcode_atts(array(
	'height'	=> '',	
	), $atts));
	return '<div class="space" style="height:'.$height.'"></div>';
	}
add_shortcode('space','space_fun');

// sub title Shortcode
function subtitle_fun($atts){
	extract(shortcode_atts(array(
	'size'	=> '',
	'color'	=> '',	
	'description'	=> '',
	'align'	=> '',
	), $atts));
	return '<div class="subtitle" style="font-size:'.$size.'; color:'.$color.'; text-align:'.$align.';">'.$description.'</div>';
	}
add_shortcode('subtitle','subtitle_fun');

// inner title Shortcode
//[innertitle size="34px" color="#ffffff" span="Professional advice" description="The best model agency in the world"]
function inner_title_fun($atts){
	extract(shortcode_atts(array(
	'size'	=> '',
	'color'	=> '',	
	'description'	=> '',
	'fontweight'	=> '',	
	
	), $atts));
	return '<h2 class="section_inner_title" style="font-size:'.$size.'; color:'.$color.'; font-weight:'.$fontweight.';">'.$description.'</h2>';
	}
add_shortcode('innertitle','inner_title_fun');


// Latest News function
// Latest Post
function latestpostsoutput_func( $atts ){
   extract( shortcode_atts( array(
		'showposts' => 5,
		'comment' => '',
		'date' => '',
		'author' => '',	
		'readmore' => '',	
		'excerptlength' => '',	
	), $atts ) );
	$postoutput = '';
	$postoutput .= '<div class="latestnews">';
	wp_reset_query();
	$n = 0;
	query_posts(  array( 'posts_per_page'=>$showposts, 'post__not_in' => get_option('sticky_posts') )  );
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$n++;
			$post_comment = '';
			if($comment=='show' || $comment==''){   
				$post_comment = '<span>Comment <a href="'.get_the_permalink().'#comments">'.get_comments_number().' </a></span>';
			} else {
				$post_date = '';
			}			
			if($date=='show'){   
				$post_date = '<span class="postdt">'.get_the_date('d').'</span><span class="postdm">'.get_the_date('M').'</span>';
			} else {
				$post_date = '';
			}	
			if($author=='show'){   
				$post_author = '<span>By '.get_the_author_posts_link().'</span>';
			} else {
				$post_author = '';
			}				
			if ( has_post_thumbnail()) {
				$large_imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				$imgUrl = $large_imgSrc[0];
			}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
			}
			$postoutput .= '<div class="latest-news"><div class="newsbgcolor">
					<div class="news_imgbox">
						<a href="'.get_the_permalink().'" class="hvr-grow"><img src="'.$imgUrl.'" alt="" /></a>
						<div class="news_author_date">'.$post_date.'</div>
					</div>	
						    
					<div class="news_content">
						<a href="'.get_the_permalink().'" class="news-readmore">'.$readmore.' <i class="fas fa-angle-right"></i></a>
						<a href="'.get_the_permalink().'"><div class="news_title">'.get_the_title().'</div></a>
						<div class="news_author">
							'.$post_author.'
							'.$post_comment.'
							<div class="clear"></div>
						</div>
						<p>'.wp_trim_words( get_the_content(), $excerptlength, '').'</p>
					</div>
					<div class="clear"></div>
					</div>        	   
			</div>';	

		endwhile;
	endif;
	$postoutput .= '</div>';
	wp_reset_query();
	return $postoutput;
}
add_shortcode( 'latest-news', 'latestpostsoutput_func' );

/*Clients Logo function*/
function sports_club_pro_client_logos($atts, $content = null){
	return '<ul id="flexiselDemo3">'.do_shortcode($content).'</ul>';
	}
add_shortcode('client_lists','sports_club_pro_client_logos');

function sports_club_pro_client($atts){
	extract(shortcode_atts(array(
	'image'	=> '',	
	'link'	=> '#'	
	), $atts));
	return '<li><a href="'.$link.'" target="_blank"><img src="'.$image.'" /></a></li>';
	}
add_shortcode('client','sports_club_pro_client');


// add shortcode for skills
function sports_club_pro_skills($sports_club_pro_skill_var){
	extract( shortcode_atts(array(
		'title' 	=> 'title',
		'percent'	=> 'percent',
		'bgcolor'	=> 'bgcolor',
	), $sports_club_pro_skill_var));
	
	return '<div class="skillbar clearfix " data-percent="'.$percent.'%">
			<div class="skillbar-title"><span>'.$title.'</span> <span class="skill-bar-percent">('.$percent.'%)</span></div>
			<div class="skill-bg"><div class="skillbar-bar" style="background:'.$bgcolor.'"></div></div>			
			</div>';
}

add_shortcode('skill','sports_club_pro_skills');

// Counter Shortcode
function my_custom_counter_func($atts){
	extract(shortcode_atts(array(		
	'value'	=> '',
	'plus'	=> '',	
	'title'	=> '',
	'color'	=> '',	
	'icon'	=> '',	
	), $atts));
	return '
	<div class="mycounterbox" style="color:'.$color.'">
	    <div class="iconbox" style="color:'.$color.'"><i class="'.$icon.'"></i></div>
		<div class="counter">'.$value.'</div>
		<div class="counter-plus" style="color:'.$color.'">'.$plus.'</div>
	    <div class="countertitle" style="color:'.$color.'">'.$title.'</div>	   	   
	</div>';
	}
add_shortcode('counter','my_custom_counter_func');

/* [contactinfo address="" icon="" info="" ] */
function sports_club_pro_contact_details($atts, $content = null){
	extract( shortcode_atts(array(
		'icon'  => '',	
		'info'  => '',		
	), $atts));
	return '
			<div class="m-add-info">
			        <i class="'.$icon.'"></i>				
					<div class="m-addbox">					
					  <p>'.$info.'</p>
					</div>
			</div>';
	}
add_shortcode('contact-details','sports_club_pro_contact_details');

/* [contactinfo address="" icon="" info="" ] */
function sports_club_pro_contact_title_fun($atts, $content = null){
	extract( shortcode_atts(array(
		'address'  => '',			
	), $atts));
	return '
			<div class="homeaddress">'.$address.'</div>';
	}
add_shortcode('location-add','sports_club_pro_contact_title_fun');


/* [contactinfo title="" address="" icon="" ] */
function sports_club_pro_custom_video_fun($atts, $content = null){
	extract( shortcode_atts(array(
		'url'  => '',
		'image'  => '',		
		'youtubeid'  => '',
		
		
	), $atts));
	return '
			<div class="videobox">
			       <img src="'.$image.'"  alt="" /><a href="'.$url.'" class="youtube-link" youtubeid="'.$youtubeid.'"><div class="playbtn"></div></a>						
			</div>';
	}
add_shortcode('custom-video','sports_club_pro_custom_video_fun');



/* [most_video title="" address="" icon="" ] */
function most_notable_videos($atts, $content = null){
	extract( shortcode_atts(array(
		'url'  => '',
		'image'  => '',
		'title'  => '',		
		'youtubeid'  => '',
		'description'  => '',
	), $atts));
	return '
		<div class="most_video">
			<div class="most_video_bg">
				<div class="video-title-desc">
					<h3>'.$title.'</h3>
					<p>'.$description.'</p>
					<a href="'.$url.'" class="youtube-link" youtubeid="'.$youtubeid.'"><i class="fas fa-caret-right"></i></a>
				</div>
			   <img src="'.$image.'"  alt="" />
			</div>
		</div>';
	}
add_shortcode('most_video','most_notable_videos');

// Wild Safari Services Shortcode
function my_custom_services_box_func($atts){
	extract(shortcode_atts(array(	
	'title'	=> '',
	'description'	=> '',	
	'image' => '',  	
	'animation' => '',
	'class' => '',
	), $atts));
	return '<div class="col-md-4 '.$class.'">                
                  <div class="ih-item square effect10 '.$animation.'">
                      <div class="img"><img src="'.$image.'"  alt=""/></div>
                      <div class="info">
                          <h3>'.$title.'</h3>
                          <p>'.$description.'</p>
                      </div></div>                
                </div>';
	}
add_shortcode('services_box','my_custom_services_box_func');
//[services_box animation="" title="" description="" image=""]


define('GRACE_THEME_DOC','http://www.gracethemesdemo.com/documentation/sports-club/');

function causes($atts, $content = null ){
	extract(shortcode_atts(array(
	'image'	=> '',
	'title'	=> '',
	'content'	=> '',
	'skillbar_bgcolor'	=> '',
	'percent'	=> '',
	'percent_bgcolor'	=> '',
	'to_go_price'	=> '',
	'donate_price'	=> '',
	'donate_button'	=> '',
	'link'	=> '',
	'target'	=> '',
	), $atts));
	return '
		<div class="causes-col">
			<div class="causes-thumb">'.(($image!='') ? '<img src="'.$image.'" alt="" />' : '' ).'</div>
			<div class="causes-content">
			'.(($title!='') ? '<h3>'.$title.'</h3>' : '' ).'
			<div class="causes-skill">	
				<div class="skillbar " data-percent="'.$percent.'" style="background:'.$skillbar_bgcolor.';">
					<div class="skillbar-bar" style="background:'.$percent_bgcolor.';"></div>
				</div>
			</div>
			<div class="cuase-raised"><h5>'.$donate_price.'<span>'.$to_go_price.'</span></h5></div>
			'.(($donate_button!='') ? '<a href="'.$link.'" class="read-more" target="'.$target.'">'.$donate_button.'</a>' : '' ).'
				<div class="clear"></div>
			</div>
		</div>
		';
	}
add_shortcode('our_causes','causes');

// [row_area]
// Social Icon Shortcodes
function row_area_fun($atts,$content = null){
  return '<div class="row">'.do_shortcode($content).'</div>';
 }
add_shortcode('row_area','row_area_fun');

// [servicesbox icon="image" title="title" description="description" readmore="Read More" link="#"]
function featuresboxarea($atts){
		extract( shortcode_atts(array(
			'icon' => '',
			'title' => '',
			'description' => '',
			'readmore' => '',
			'bgcolor' => '',
			'link' => '',
		), $atts));
		return '
			 <div class="servicesbox">
			 	<div class="servicesboxbg" style="background:'.$bgcolor.'">
					'.( ($icon!='') ? '<div class="services-thumb"><a href="'.$link.'"><img src="'.$icon.'" /></a></div>' : '').'
					<div class="services-content">
					'.( ($title!='') ? '<a href="'.$link.'"><div class="services-title"><h5>'.$title.'</h5></div></a>' : '').'
					'.( ($description!='') ? '<div class="services-description">'.$description.'</div>' : '').'
					'.( ($readmore!='') ? '<a href="'.$link.'" class="seranc">'.$readmore.'</a>' : '').'
					<div class="clear"></div>
					</div>
				</div>
			 </div>
		';
}
add_shortcode('featuresbox','featuresboxarea');



// [latest_results icon="image" title="title" description="description" readmore="Read More" link="#"]
function latest_results_fun($atts){
		extract( shortcode_atts(array(
			'teamicon1' => '',
			'teamicon2' => '',
			'matchdate' => '',
			'teamscore1' => '',
			'teamscore2' => '',
			'bgcolor' => '',
			'link' => '',
			'readmore' => '',
		), $atts));
		return '
			 <div class="latest_results" style="background:'.$bgcolor.'">
			 	<h6>'.$matchdate.'</h6>
				<div class="latest_results_col"><img src="'.$teamicon1.'" /></div>
				<div class="latest_results_col goalscore">'.$teamscore1.'</div>
				<div class="latest_results_col goalscore">'.$teamscore2.'</div>
				<div class="latest_results_col"><img src="'.$teamicon2.'" /></div>
				<div class="clear"></div>
				<a href="'.$link.'" class="gamedetail">'.$readmore.'</a> 
 			 </div>
		';
}
add_shortcode('latest_results','latest_results_fun');


/*[countdown count="1" year="2017" month="07" date="27"]*/
function countdown($atts){
		extract( shortcode_atts(array(
		'year' => '',
		'month' => '',
		'date' => '',
		'count' => '',
		'color' => '',
		), $atts));	
		return ' 
		<script>CountDownTimer("'.$year.'/'.$month.'/'.$date.'", "countdown'.$count.'");</script>
		<div id="countdown'.$count.'" style="color:'.$color.';"></div>
		';
}
add_shortcode('countdown','countdown');


// Shortcode Upcoming trips
/*[upcomingmatch month="FEB" date="27" title="Climbing Course" matchtype="Group Trip" price="$99.00" url="#" target="_self"]*/
function upcomingmatch_fun($atts){
		extract( shortcode_atts(array(
		'month' => '',
		'date' => '',
		'title' => '',
		'matchtype' => '',
		'readmore' => '',
		'url' => '',
		'target' => '',
		'bgcolor' => '',
		), $atts));	
		return '
			<div class="upcomingmatch">
				<div class="tripdate" style=" background:'.$bgcolor.'" ><h5>'.$date.' <span>'.$month.'</span></h5></div>
				<div class="triptitledes">
					<span class="triptitle"><h6>'.$title.'</h6></span>
					<span class="matchtype">'.$matchtype.'</span>
					<a href="'.$url.'" '.(($target!='') ? 'target="'.$target.'"' : '' ).' class="matchreadmore">'.$readmore.'</a>
				</div>
			</div>
		';
}
add_shortcode('upcomingmatch','upcomingmatch_fun');

/*awards function*/
function awards_lists_fun($atts, $content = null){
	return '<div class="awards-lists">'.do_shortcode($content).'</div>';
	}
add_shortcode('awards_lists','awards_lists_fun');

// award Shortcode
function award_func($atts){
	extract(shortcode_atts(array(
			'icon'  => '',
			'title'  => '',
			'link' => '',
	), $atts));
	return '
		<div class="facilities">
			<div class="facilitiesbg">
				<a href="'.$link.'">'.(($icon!='') ? '<div class="facilities-icon"><img src="'.$icon.'" /><h5>'.$title.'</h5></div>' : '').'				
				<h5>'.$title.'</h5>
				</a>
			</div>
		</div> 	
		';
	}
add_shortcode('award','award_func');