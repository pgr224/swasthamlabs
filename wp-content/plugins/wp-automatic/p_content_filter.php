<?php

add_filter('the_content', 'wp_automatic_the_content_filter');
	
function wp_automatic_the_content_filter($cnt){
		global $post;
		
		
		
		//fix youtube deleted rating images
		if( stristr($cnt, 'youtube.com/static/images') ){
			
			$icn_star_empty = plugins_url('images/youtube_imgs/icn_star_empty_11x11.gif' , __FILE__);
			$icn_star_half = plugins_url('images/youtube_imgs/icn_star_half_11x11.gif' , __FILE__);
			$icn_star_full = plugins_url('images/youtube_imgs/icn_star_full_11x11.gif' , __FILE__);
				
				
			$cnt = str_replace('http://gdata.youtube.com/static/images/icn_star_full_11x11.gif', $icn_star_full,$cnt );
			$cnt = str_replace('http://gdata.youtube.com/static/images/icn_star_half_11x11.gif', $icn_star_half,$cnt );
			$cnt = str_replace('http://gdata.youtube.com/static/images/icn_star_empty_11x11.gif', $icn_star_empty,$cnt );
			
		}
		
		//remove first image
		$active = get_post_meta( $post->ID ,'wp_automatic_remove_first_image' ,1) ;
		
		
		if($active == 'yes'){
			//return 'active remove ';
			
			$cnt= preg_replace ( '/<img [^>]*src=["|\'][^"|\']+.*?>/i', '' ,$cnt ,1 );
			
		}else{
			
		}
		
		//remove gallery from home
		if(stristr($cnt, 'wp_automatic_gallery')){
			
			if(! is_single()){
				
				
				
				$cnt = preg_replace('{<img.*?class="wp_automatic_gallery.*?>}', '', $cnt);
			}
		}
		
		return $cnt;
		
}

//link to source instead

add_filter('post_link','wp_automatic_permalink_changer');

function wp_automatic_permalink_changer($permalink ){
  
	global $post;
	 
	if (!empty($post->ID)) {

		$link_to_source = get_post_meta($post->ID, '_link_to_source', true);
		
		if ( trim($link_to_source) != '' ) {
			
			$new_permalink = get_post_meta($post->ID, 'original_link', true);
			if(trim($new_permalink) != ''  ) return $new_permalink;
			
		}
	}
	
	return $permalink;
}
 

//Canonical urls
function wp_automatic_rel_canonical_with_custom_tag_override()
{
	if( !is_singular() )
		return;

	global $wp_the_query;
	if( !$id = $wp_the_query->get_queried_object_id() )
		return;

	// check whether the current post has content in the "canonical_url" custom field
	$canonical_url = get_post_meta( $id, 'canonical_url', true );
	if( '' != $canonical_url )
	{
		// trailing slash functions copied from http://core.trac.wordpress.org/attachment/ticket/18660/canonical.6.patch
		$link = user_trailingslashit( trailingslashit( $canonical_url ) );
		echo "<link rel='canonical' href='" . esc_url( $link ) . "' />\n";
	} 
	
}

// remove the default WordPress canonical URL function
if( function_exists( 'rel_canonical' ) )
{
	remove_action( 'wp_head', 'rel_canonical' );
}
// replace the default WordPress canonical URL function with your own
add_action( 'wp_head', 'wp_automatic_rel_canonical_with_custom_tag_override' );

//Facebook videos
add_shortcode( 'fb_vid', 'wp_automatic_fbvid_shortcode_func' );


function wp_automatic_fbvid_shortcode_func( $atts ) {
	

	$cont='';

	extract( shortcode_atts( array(
	'id' => 'something',
		
	), $atts ) );
	
	return '<div id="fb-root"></div><script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";  fjs.parentNode.insertBefore(js, fjs);}(document, \'script\', \'facebook-jssdk\'));</script><div class="fb-video" data-allowfullscreen="true" data-href="https://www.facebook.com/video.php?v='.$id.'&amp;set=vb.500808182&amp;type=1"><div class="fb-xfbml-parse-ignore"></div></div>';
	
}

//eBay redirect 
add_action('template_redirect', 'wp_automatic_eb_redirect_end');

function wp_automatic_eb_redirect_end(){
	
	 
	global $wp_the_query;
	if( !$id = $wp_the_query->get_queried_object_id() )
		return;

	// check whether the current post has content in the "canonical_url" custom field
	$wp_automatic_redirect_date = get_post_meta( $id, 'wp_automatic_redirect_date', true );
	 
	if(trim($wp_automatic_redirect_date) != ''){
		if( current_time('timestamp') > $wp_automatic_redirect_date ){
			
			//trash 
			$wp_automatic_trash_date = get_post_meta( $id, 'wp_automatic_trash_date', true );
			
			if(trim($wp_automatic_trash_date) != ''){
				//trash
				wp_trash_post($id);
			}
			
			$wp_automatic_redirect_link = get_post_meta( $id, 'wp_automatic_redirect_link', true );
			wp_redirect($wp_automatic_redirect_link,301);
			
			
			
		}
	}
 	
}

//Redable time shortcode
add_shortcode( 'readable_time', 'wp_automatic_redable_time' );


function wp_automatic_redable_time( $atts ,$cont='') {

	$now = date ( 'Y-m-d H:i:s' );
	
	$now = strtotime (get_date_from_gmt( $now) );
	$cont = strtotime($cont);
	
	if($now > $cont){
		return 'Ended';
	}else{
		return human_time_diff(    $cont , ($now) );
	}
	
	
 	
}

// Formated date
add_shortcode( 'formated_date', 'wp_automatic_formated_date' );


function wp_automatic_formated_date( $atts ,$cont='') {

	$a = shortcode_atts( array(
			'format' => 'M',
			'timestamp' => ''
 
	), $atts );
	
	
	$timeStamp = $a['timestamp'];
	
	if(trim($timeStamp) == '')
	$timeStamp = strtotime($cont);
	
	return date(  $a['format'] , $timeStamp);

}

add_shortcode( 'permalink', 'wp_automatic_permalink' );

function wp_automatic_permalink( $atts ,$cont='') {

 global $post;
 return $post->guid;

}

add_shortcode( 'price_with_discount', 'wp_automatic_price_with_discount' );

function wp_automatic_price_with_discount() {

	global $post; 
	$pID = $post->ID;

	$price = get_post_meta($pID,'product_price',1);
	$listPrice = get_post_meta($pID,'product_list_price',1);
	
	if($price == $listPrice){
		return $price;
	}else{
		return '<del>'.$listPrice.'</del> - '. $price ;
	}
	
	
	
}

