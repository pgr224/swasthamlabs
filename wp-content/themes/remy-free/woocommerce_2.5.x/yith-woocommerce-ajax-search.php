<?php
/**
 * YITH WooCommerce Ajax Search template
 *
 * @author  Yithemes
 * @package YITH WooCommerce Ajax Search Premium
 * @version 1.2.3
 */

if ( !defined( 'YITH_WCAS' ) ) {
    exit;
} // Exit if accessed directly


wp_enqueue_script( 'yith_wcas_jquery-autocomplete' );
wp_enqueue_script( 'yith_wcas_frontend' );

$research_post_type = ( get_option('yith_wcas_default_research') ) ? get_option('yith_wcas_default_research') : 'product';
?>
<div class="yith-ajaxsearchform-container">
    <form role="search" method="get" id="yith-ajaxsearchform" action="<?php echo esc_url( home_url( '/' ) ) ?>">
        <div class="yith-ajaxsearchform-container">
<div>
            <?php
            if ( get_option( 'yith_wcas_show_category_list' ) == 'yes' && defined( 'YITH_WCAS_PREMIUM' ) ):

                $product_categories = yith_wcas_get_shop_categories( get_option( 'yith_wcas_show_category_list_all' ) == 'all' );

                $selected_category = ( isset( $_REQUEST['product_cat'] ) ) ? $_REQUEST['product_cat'] : '';

                if ( !empty( $product_categories ) ) : ?>
                    <div class="yith-wcas-category-list">
                        <select class="search_categories selectbox" id="search_categories" name="product_cat">
                            <option value="" <?php selected( '', $selected_category ) ?>><?php _e( 'All', 'yit' ) ?></option>
                            <?php foreach ( $product_categories as $cat ): ?>
                                <option value="<?php echo $cat->slug ?>" <?php selected( $cat->slug, $selected_category ) ?>><?php echo $cat->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php endif ?>

            <?php endif ?>

            <?php
            if ( defined( 'YITH_WCAS_PREMIUM' ) ):
                if ( get_option( 'yith_wcas_show_search_list' ) == 'yes' ):

                    $selected_search = ( isset( $_REQUEST['post_type'] ) ) ? $_REQUEST['post_type'] : $research_post_type; ?>
                    <div class="yith-wcas-search-list">
                        <select class="yit_wcas_post_type selectbox" id="yit_wcas_post_type" name="post_type">
                            <option value="product" <?php selected( 'product', $selected_search ) ?>><?php _e( 'Products', 'yit' ) ?></option>
                            <option value="any" <?php selected( 'any', $selected_search ) ?>><?php _e( 'All', 'yit' ) ?></option>
                        </select>
                    </div>

                <?php else: ?>
                    <input type="hidden" name="post_type" class="yit_wcas_post_type" id="yit_wcas_post_type" value="<?php echo $research_post_type ?>" />
                <?php endif; ?>
            <?php endif; ?>


            <div class="search-navigation">
                <label class="screen-reader-text" for="yith-s"><?php _e( 'Search for:', 'yit' ) ?></label>
                <input type="search"
                       value="<?php echo get_search_query() ?>"
                       name="s"
                       id="yith-s"
                       class="yith-s"
                       placeholder="<?php echo get_option( 'yith_wcas_search_input_label' ) ?>"
                       data-append-to=".search-navigation"
                       data-loader-icon="<?php echo str_replace( '"', '', apply_filters( 'yith_wcas_ajax_search_icon', '' ) ) ?>"
                       data-min-chars="<?php echo get_option( 'yith_wcas_min_chars' ); ?>" />

            </div>
            <input type="submit" id="yith-searchsubmit" value="<?php echo get_option( 'yith_wcas_search_submit_label' ) ?>" class="btn btn-alternative" />
</div>
            <?php if ( defined( 'ICL_LANGUAGE_CODE' ) ): ?>
                <input type="hidden" name="lang" value="<?php echo( ICL_LANGUAGE_CODE ); ?>" />
            <?php endif ?>
        </div>
    </form>
</div>