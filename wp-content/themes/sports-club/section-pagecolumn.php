<?php if ( is_home() || is_front_page() ) { ?>


<?php $hidefourbxsec = of_get_option('hidefourbxsec', '1'); ?>
<?php if($hidefourbxsec == ''){ ?>                    
<section id="pagearea">
  <div class="container"> 
		<?php
			$title_arr = array( esc_attr__('Football','sports-club'),  esc_attr__('GOLF','sports-club'), esc_attr__('Tennis','sports-club'), esc_attr__('CRICKET','sports-club'), esc_attr__('Cycling','sports-club'));
			$boxArr = array();
			   if( of_get_option('box1',true) != '' ){
				$boxArr[] = of_get_option('box1',false);
			   }
			   if( of_get_option('box2',true) != '' ){
				$boxArr[] = of_get_option('box2',false);
			   }
			   if( of_get_option('box3',true) != '' ){
				$boxArr[] = of_get_option('box3',false);
			   }
			   if( of_get_option('box4',true) != '' ){
				$boxArr[] = of_get_option('box4',false);
			   }
			   if( of_get_option('box5',true) != '' ){
				$boxArr[] = of_get_option('box5',false);
			   }
			    if( of_get_option('box6',true) != '' ){
				$boxArr[] = of_get_option('box6',false);
			   }			   			  
			
			if (!array_filter($boxArr)) {
			for($fx=1; $fx<=5; $fx++) {
			?>           
            <div class="fourpagebox <?php if($fx % 5 == 0) { echo "last_column"; } ?>">
             <div class="thumbbx"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/services-icon<?php echo $fx; ?>.png" alt="" /></a></div>
             <div class="pagecontent">
             	<h3><a href="#"><?php echo $title_arr[$fx-1]; ?></a></h3>
             </div>
             <a href="#" class="pagereadmore"><i class="fas fa-link fa-rotate-90"></i></a>
         	</div>
			<?php 
			} 
			} else {			
				$box_column = array('no_column','one_column','two_column','three_column','four_column','five_column','six_column');
				$fx = 1;				
				$queryvar = new wp_query(array('post_type' => 'page', 'post__in' => $boxArr, 'posts_per_page' => 6, 'orderby' => 'post__in' ));				
				while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
        	    <div class="fourpagebox <?php echo $box_column[count($boxArr)]; ?> <?php if($fx % count($boxArr) == 0) { echo "last_column"; } ?>" >
				<?php if( of_get_option('boximg'.$fx, true) != '') { ?>	
                <div class="thumbbx imgbx"> <a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo esc_url( of_get_option( 'boximg'.$fx, true )); ?>" / ></a></div>
                <?php } ?>
                <div class="pagecontent">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>		  
                </div>
                <a href="<?php the_permalink(); ?>" class="pagereadmore"><i class="fas fa-link fa-rotate-90"></i></a>
        	   </div>
             <?php 
			 $fx++; 
			 endwhile;
			 wp_reset_postdata();
			 }  ?>  
        <div class="clear"></div>
    </div><!-- .container -->
</section><!-- #pagearea -->
<?php } ?>

<?php $hidewelcome = of_get_option('hidewelcomesection', '1'); ?>
<?php if($hidewelcome == ''){ ?>
<section id="welcomearea">
    <div class="container">  
        <div class="welcomebx">
            <?php if( of_get_option('welcomebox',false) ) { ?>
        	<?php $queryvar = new wp_query('page_id='.of_get_option('welcomebox',true));				
			while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>                       
                     <div class="welcome_titlecolumn">
                       <?php if( of_get_option('welcomeimg', true) != '') { ?>	
                      <img alt="" src="<?php echo esc_url( of_get_option( 'welcomeimg', true )); ?>" / >         
                     <?php } ?>
                     </div>                         
                     <div class="welcome_contentcolumn">  
                      <h3 class="section_title"><?php the_title(); ?></h3>                                
                      <?php /*?><p><?php echo wp_trim_words( get_the_content(), of_get_option('welcomepagelength'), '' ); ?></p> <?php */?>
          				<?php the_content(); ?>
                      </div>           
                     <div class="clear"></div>     	  
             <?php endwhile;
						wp_reset_postdata(); ?>
        <?php } else { ?> 
               <div class="welcome_titlecolumn">
                 <img src="<?php echo get_template_directory_uri(); ?>/images/about.png" alt="" />
               </div> 
               
        <div class="welcome_contentcolumn">
        <h3 class="section_title"><?php _e('About Sports Club','sports-club'); ?></h3>      
        <strong><p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce blandit nisi pulvinar faucibus.','sports-club'); ?></p></strong> 
        <p><?php _e('Nam fermentum ullamcorper luctus. Integer ultricies imperdiet rutrum. Donec vel ultrices purus. Vestibulum posuere eget magna eu blandit. Sed fermentum, est ut tincidunt luctus.','sports-club'); ?></p>
        <p>&nbsp;</p>
        <?php echo do_shortcode('
[skill title="FITNESS" percent="95" bgcolor="#ec4613"]
[skill title="GAME PLAN" percent="65" bgcolor="#ec4613"]
[skill title="STRATEGY" percent="75" bgcolor="#ec4613"]
[skill title="PASSION" percent="85" bgcolor="#ec4613"]'); ?>
        
        </div>               
               <div class="clear"></div>	       
		<?php } ?>
       
        </div>  
    </div><!-- .container -->
</section><!-- #welcomearea -->
<?php } ?>




<?php $hideservicesbxsec = of_get_option('hideservicesbxsec', '1'); ?>
<?php if($hideservicesbxsec == ''){ ?>                    
<section id="pagearea-services">
  <div class="container"> 
  
  	<?php if( of_get_option('sectionserstitle',true) != '') { ?>
		<h2 class="section_title"><?php echo of_get_option('sectionserstitle'); ?></h2>
	<?php } ?>
    <?php if( of_get_option('sectionservicesubtitle',true) != '') { ?>
		<p class="serv-ptag"><?php echo of_get_option('sectionservicesubtitle'); ?></p>
	<?php } ?>
		<?php
			$title_arr = array( esc_attr__('Rugby','social-care'),  esc_attr__('Table Tennis','social-care'), esc_attr__('Basketball','social-care'));
			$servboxArr = array();
			   if( of_get_option('servbox1',true) != '' ){
				$servboxArr[] = of_get_option('servbox1',false);
			   }
			   if( of_get_option('servbox2',true) != '' ){
				$servboxArr[] = of_get_option('servbox2',false);
			   }
			   if( of_get_option('servbox3',true) != '' ){
				$servboxArr[] = of_get_option('servbox3',false);
			   }
			   if( of_get_option('servbox4',true) != '' ){
				$servboxArr[] = of_get_option('servbox4',false);
			   }
			   if( of_get_option('servbox5',true) != '' ){
				$servboxArr[] = of_get_option('servbox5',false);
			   }
			    if( of_get_option('servbox6',true) != '' ){
				$servboxArr[] = of_get_option('servbox6',false);
			   }			   			  
			
			if (!array_filter($servboxArr)) {
			for($fx=1; $fx<=3; $fx++) {
			?>           
            <div class="servpagebox">
             <div class="servthumbbx"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/serv-icon<?php echo $fx; ?>.png" alt="" /></a></div>
             <div class="servpagecontent">
             	<a href="#"><h3><?php echo $title_arr[$fx-1]; ?> <span class="white-dot"></span> <span class="red-dot"></span></h3></a>
                <p>Nam fermentum ullamcorper luctus. Integer ultricies imperdiet rutrum. Donec vel ultrices purus. Vestibulum posuere eget magna eu blandit. Sed fermentum.</p>
                <a href="#" class="servread">READ MORE</a>
             </div>
         	</div>
			<?php 
			} 
			} else {			
				$servbox_column = array('no_column','one_column','two_column','three_column','four_column','five_column','six_column');
				$fx = 1;				
				$queryvar = new wp_query(array('post_type' => 'page', 'post__in' => $servboxArr, 'posts_per_page' => 6, 'orderby' => 'post__in' ));				
				while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
        	    <div class="servpagebox <?php echo $servbox_column[count($servboxArr)]; ?>" >
				<?php if( of_get_option('servboximg'.$fx, true) != '') { ?>	
                <div class="servthumbbx imgbx"> <a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo esc_url( of_get_option( 'servboximg'.$fx, true )); ?>" / ></a></div>
                <?php } ?>
                <div class="servpagecontent">
                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?> <span class="white-dot"></span> <span class="red-dot"></span></h3></a>                <p><?php echo wp_trim_words( get_the_content(), of_get_option('servboxlength'), '' ); ?></p>
                <?php if( of_get_option('servreadmore',true) != '') { ?>
                	<a href="<?php the_permalink(); ?>" class="servread"><?php echo of_get_option('servreadmore'); ?></a>
                <?php } ?>
                  		  
                </div>
        	   </div>
             <?php 
			 $fx++; 
			 endwhile;
			 wp_reset_postdata();
			 }  ?>  
        <div class="clear"></div>
    </div><!-- .container -->
</section><!-- #pagearea-services -->
<?php } ?>

<?php } ?>