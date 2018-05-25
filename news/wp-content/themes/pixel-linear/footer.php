<?php

/**
 * Footer Template
 * @file           footer.php
 * @package        Pixel-Linear 
 * @author         Pixel Theme Studio 
 * @copyright      2014 - 2015 Pixel Theme Studio Themes
 * @license        license.txt
 * @version        Release: 1.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

?>

</div><!-- end of wrapper-->

<?php gents_wrapper_end(); // after wrapper hook ?>





<?php gents_container_end(); // after container hook ?>


<?php if( bi_get_data('enable_disable_sm') == '1' ) { ?>
<!-- +++++ Social Section +++++ -->
<div id="social-wrap">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12 centered">
            	<ul class="sm-ico">
                	<?php if( bi_get_data('custom_facebook_link') != '' ) { ?>
                      <li><a class="sm-facebook" target="_blank" href="<?php echo bi_get_data('custom_facebook_link'); ?>"></a></li>	
                    <?php } ?>
                    <?php if( bi_get_data('custom_twitter_link') != '' ) { ?>
                      <li><a class="sm-tweet" target="_blank" href="<?php echo bi_get_data('custom_twitter_link'); ?>"></a></li>
                    <?php } ?>
                    <?php if( bi_get_data('custom_Googlep_link') != '' ) { ?>	
                      <li><a class="sm-gplus" target="_blank" href="<?php echo bi_get_data('custom_Googlep_link'); ?>"></a></li>
                    <?php } ?>
                    <?php if( bi_get_data('custom_linkedin_link') != '' ) { ?>	
                      <li><a class="sm-in" target="_blank" href="<?php echo bi_get_data('custom_linkedin_link'); ?>"></a></li>	
                    <?php } ?>
                    <?php if( bi_get_data('custom_instagram_link') != '' ) { ?>                    
                      <li><a class="sm-insta" target="_blank" href="<?php echo bi_get_data('custom_instagram_link'); ?>"></a></li>	
                    <?php } ?>
                    <?php if( bi_get_data('custom_pinterest_link') != '' ) { ?>
                      <li><a class="sm-pin" target="_blank" href="<?php echo bi_get_data('custom_pinterest_link'); ?>"></a></li>	
                    <?php } ?>
					<?php if( bi_get_data('custom_reddit_link') != '' ) { ?>                   
                      <li><a class="sm-red" target="_blank" href="<?php echo bi_get_data('custom_reddit_link'); ?>"></a></li>	
                    <?php } ?>
                    <?php if( bi_get_data('custom_tumblr_link') != '' ) { ?>
                      <li><a class="sm-tumb" target="_blank" href="<?php echo bi_get_data('custom_tumblr_link'); ?>"></a></li>	
                    <?php } ?>                        
                    <?php if( bi_get_data('custom_stumbleupon_link') != '' ) { ?>
                      <li><a class="sm-stumble" target="_blank" href="<?php echo bi_get_data('custom_stumbleupon_link'); ?>"></a></li>		
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
	
</div>
<?php } ?>


<!-- +++++ Footer Section +++++ -->
<footer id="footer">

<div class="container">

      <div class="row">
		<?php if ( is_active_sidebar( 'footer-col1' ) || is_active_sidebar( 'footer-col2' ) || is_active_sidebar( 'footer-col3' ) || is_active_sidebar( 'footer-col4' ) ) : ?>
		<?php $count = 0;
		if ( is_active_sidebar('footer-col1') ) : $count++; endif; 
		if ( is_active_sidebar('footer-col2') ) : $count++; endif; 
		if ( is_active_sidebar('footer-col3') ) : $count++; endif; 
		if ( is_active_sidebar('footer-col4') ) : $count++; endif;
		$row = 'col-sm-'. 12/$count;
		endif;
		?>
      	<?php if ( is_active_sidebar('footer-col1') ) : ?>
                <div class="<?php echo $row; ?>">
				<?php dynamic_sidebar('footer-col1'); ?>
				</div>
		<?php endif; ?>
        <?php if ( is_active_sidebar('footer-col2') ) : ?>
				<div class="<?php echo $row; ?>">
				<?php dynamic_sidebar('footer-col2'); ?>
				</div>
		<?php endif; ?>
		<?php if ( is_active_sidebar('footer-col3') ) : ?>
                <div class="<?php echo $row; ?>">
				<?php dynamic_sidebar('footer-col3'); ?>
				</div>
		<?php endif; ?>
		<?php if ( is_active_sidebar('footer-col4') ) : ?>
                <div class="<?php echo $row; ?>">
        <?php dynamic_sidebar('footer-col4'); ?>
				</div>
		<?php endif; ?>
      </div><!-- /row -->

    </div><!-- /container -->

</footer><!-- end #footer -->

<!-- socket -->
<div id="socket">
<div class="container">
	<div class="row">
    	<div class="col-sm-6">
        	<?php 
             $logo_url = bi_get_data('custom_footer_logo');             
            if( isset($logo_url['url']) && !empty($logo_url['url'])) {
             ?>
            	<a href="<?php echo home_url(); ?>">
            	<img src="<?php echo bi_get_data('custom_footer_logo')['url']; ?>" alt="<?php bloginfo( 'name' ) ?>" />
                </a>
            <?php } else { ?>
            	<a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri()."/images/footer-logo.png"; ?>" alt="<?php bloginfo( 'name' ) ?>" />
                </a>
            <?php  } ?>
		</div>
        <div class="col-sm-6 text-right">
        	<?php if( bi_get_data('custom_copy_info') !== '' ) { ?>
            	<p><?php echo bi_get_data('custom_copy_info'); ?></p>
            <?php } else { ?>
                <p>Copyright &copy; 2015 Pixel Theme Studio. All rights reserved.</p>
            <?php  } ?>
		</div>
    </div>
</div>
</div> <!-- end #socket -->






<?php wp_footer(); ?>



</body>

</html>