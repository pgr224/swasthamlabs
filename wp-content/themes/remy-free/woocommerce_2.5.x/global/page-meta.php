<?php
/**
 * Content Wrappers
 */

if( is_product() ) return;
?>
<?php do_action( 'yith_before_shop_page_meta' ); ?>
<!-- PAGE META -->
<div id="page-meta" class="group clearfix">

    <?php if ( ( ! is_product_category() && yit_get_option( 'shop-show-page-title' ) == 'yes' ) || ( is_product_category() ) ) : ?>
        <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php do_action( 'shop-page-meta' );

    ?>
</div>
<!-- END PAGE META -->