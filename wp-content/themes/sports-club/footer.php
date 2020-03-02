<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Sports Club
 */
$footerlayout = of_get_option('footerlayout');
?>

<div id="footer-wrapper">
    	<div class="container footer"> 
           
<!-- =============================== Column One - 1 =================================== -->
			<?php if($footerlayout=='onecolumn'){ ?>
                <div class="cols-1">    
                   <?php if(!dynamic_sidebar('footer-1')) : ?> 
                <div class="widget-column-1">             
                 <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>  
                 
                 <?php if( of_get_option('footersocialicon') != '') { echo do_shortcode(of_get_option('footersocialicon')); } ; ?>     
               </div>             
            <?php endif; ?>
                
                </div>
            <?php 
            }
             elseif ($footerlayout=='twocolumn'){ ?>

<!-- =============================== Column Two - 2 =================================== -->

            <div class="cols-2">    
               <?php if(!dynamic_sidebar('footer-1')) : ?> 
                <div class="widget-column-1">
                   <h5><?php if( of_get_option('abouttitle') != '') { echo of_get_option('abouttitle'); } ; ?></h5>
                   <div class="contactdetail"><?php if( of_get_option('aboutusdescription') != '') { echo of_get_option('aboutusdescription');};?></div>
              </div>                  
			<?php  endif; ?>
           
                
            <?php if(!dynamic_sidebar('footer-2')) : ?>
              <div class="widget-column-2"> 
                 <h5><?php if( of_get_option('quicklinktitle') != ''){ echo of_get_option('quicklinktitle');}; ?></h5>
                 <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>           
               </div>
             <?php endif; ?>
            
                <div class="clear"></div>
            </div><!--end .cols-2-->  
			<?php 
            }
            elseif($footerlayout=='threecolumn'){ ?>
        
<!-- =============================== Column Three - 3 =================================== -->
            <div class="cols-3">    
                <?php if(!dynamic_sidebar('footer-1')) : ?>  
                <div class="widget-column-1">            	
                   <h5><?php if( of_get_option('abouttitle') != '') { echo of_get_option('abouttitle'); } ; ?></h5>
                   <div class="contactdetail"><?php if( of_get_option('aboutusdescription') != '') { echo of_get_option('aboutusdescription'); } ; ?></div>
              </div>                  
			<?php  endif; ?>
                
            <?php if(!dynamic_sidebar('footer-2')) : ?>
              <div class="widget-column-2"> 
                <h5><?php if( of_get_option('quicklinktitle') != ''){ echo of_get_option('quicklinktitle');}; ?></h5>
                 <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>           
               </div>
            <?php endif; ?>
            
            <?php if(!dynamic_sidebar('footer-3')) : ?>
             	 <div class="widget-column-3"> 
                     <h5><?php if( of_get_option('ourservicestitle') != ''){ echo of_get_option('ourservicestitle');}; ?></h5>
                     <?php if( of_get_option('donationarea') != '') { echo do_shortcode(of_get_option('donationarea')); } ; ?>         	
              	 </div>
            <?php endif; ?>
                
                    <div class="clear"></div>
            </div><!--end .cols-3-->  
            <?php
            }
            elseif($footerlayout=='fourcolumn'){ ?>

<!-- =============================== Column Fourth - 4 =================================== -->
          
    		<div class="cols-4">    
                <?php if(!dynamic_sidebar('footer-1')) : ?>  
                <div class="widget-column-1"> 
                  <h5><?php if( of_get_option('ourservicestitle') != ''){ echo of_get_option('ourservicestitle');}; ?></h5>
                 <?php if( of_get_option('donationarea') != '') { echo do_shortcode(of_get_option('donationarea')); } ; ?>
              </div>                  
			<?php  endif; ?>
           
                
            <?php if(!dynamic_sidebar('footer-2')) : ?>
              <div class="widget-column-2"> 
              <h5><?php if( of_get_option('letestpoststitle') != ''){ echo of_get_option('letestpoststitle');}; ?></h5>  
                  
                  <ul class="recent-post"> 
                	<?php query_posts(  array( 'post_type'=> 'post', 'posts_per_page'=> 2, 'post__not_in' => get_option('sticky_posts') )  ); ?>
                    <?php  while( have_posts() ) : the_post(); ?> 
                    <li>
                  
                  	<div class="footerthumb">
                    	<span class="ftdate"><?php the_time('D');?></span>
                        <span class="ftday"><?php the_time('d');?></span>
                    </div>
                    <div class="ftrpostdesc">
                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>              
                    <p><?php echo wp_trim_words( get_the_content(), of_get_option('footerpostslength'), '' ); ?></p>               
                    </div>
                    <div class="clear"></div>
                    </li>
                    <?php endwhile; ?>
<?php if( of_get_option('footerviewmore') != ''){ ?>
	<a class="footerviewmore" href="<?php echo of_get_option('footerviewmorelink'); ?> "><?php echo of_get_option('footerviewmore'); ?> </a>
<?php }; ?>
				</ul>
                    <?php wp_reset_query(); ?> 
                
               </div>
            <?php endif; ?>
                        
            
            <?php if(!dynamic_sidebar('footer-4')) : ?> 
              <div class="widget-column-3">
                  <h5><?php if( of_get_option('quicklinktitle') != ''){ echo of_get_option('quicklinktitle');}; ?></h5>
                 <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
              </div>             
            <?php endif; ?>
                
			<?php if(!dynamic_sidebar('footer-3')) : ?>
             <div class="widget-column-4"> 
             	 <h5><?php if( of_get_option('abouttitle') != '') { echo of_get_option('abouttitle'); } ; ?></h5>
                 <div class="contactdetail"><?php if( of_get_option('aboutusdescription') != '') { echo of_get_option('aboutusdescription'); } ; ?></div>
             </div>
            <?php endif; ?>

                
                    <div class="clear"></div>
                </div><!--end .cols-4-->
             <?php } ?>  
            <div class="clear"></div>       
    </div><!--end .container-->
     
    <div class="copyright-wrapper">
        <div class="container"> 
            <div class="design-by">
                <?php if( of_get_option( 'ftlink', true ) != '' ) { ; ?>
                    <div class="footer-logo">
                        <a href="<?php echo home_url('/'); ?>"><img src="<?php echo esc_url( of_get_option( 'ftlink', true )); ?>" / ></a>
                    </div>
                <?php } ?>
                <?php if( of_get_option( 'footersocialicon', true ) != '' ) { ; ?>
                    <div class="footer-social">
                         <?php if( of_get_option('footersocialicon') != '') { echo do_shortcode(of_get_option('footersocialicon')); } ; ?>     
                    </div>
                <?php } ?>
            </div>
            <div class="copyright-txt"><?php if( of_get_option('copytext',true) != ''){ echo of_get_option('copytext',true); }; ?></div>
    
            <div class="clear"></div>
        </div> 
    </div>
       
    </div>    
<?php if( of_get_option('backtotop') != '') { echo do_shortcode(of_get_option('backtotop')); } ; ?>
<?php wp_footer(); ?>
</div>
</body>
</html>