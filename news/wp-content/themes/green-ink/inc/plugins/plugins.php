<?php
/**
 * List of the recommended plugins
 *
 * @since 1.0.0
 *
 */

/*-----------------------------------------------------------------------------------*/
/*  TGM plugin activation
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'green_ink_recommended_plugins' ) ) 
{

    function green_ink_recommended_plugins() 
    {

        $plugins = array(
            array(
                'name'              => 'Rolo Slider',
                'slug'              => 'rolo-slider',
                'required'          => false,
                'force_activation'  => false,
                'force_deactivation'=> false,
            ),
            array(
                'name'              => 'KingComposer',
                'slug'              => 'kingcomposer',
                'required'          => false,
                'force_activation'  => false,
                'force_deactivation'=> false,
            ),
            array(
                'name'              => 'Winning Portfolio',
                'slug'              => 'winning-portfolio',
                'required'          => false,
                'force_activation'  => false,
                'force_deactivation'=> false,
            ),
            array(
                'name'              => 'WP-PageNavi',
                'slug'              => 'wp-pagenavi',
                'required'          => false,
                'force_activation'  => false,
                'force_deactivation'=> false,
            ),
            array(
                'name'              => 'One Click Demo Import',
                'slug'              => 'one-click-demo-import',
                'required'          => false,
                'force_activation'  => false,
                'force_deactivation'=> false,
            ),
        );
        tgmpa( $plugins );
    }
    add_action( 'tgmpa_register', 'green_ink_recommended_plugins' );
}
