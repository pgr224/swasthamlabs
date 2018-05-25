<?php
/**
 * Footer widget areas.
 *
 * @package Green Ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 */

// count the active widgets to determine column sizes.
$footerwidgets = is_active_sidebar('footer-widget-area-1') + is_active_sidebar('footer-widget-area-2') + is_active_sidebar('footer-widget-area-3') + is_active_sidebar('footer-widget-area-4');

// default.
$footergrid = 'one_fourth';

if ( 1 === $footerwidgets ) {
	$footergrid = 'full-width';

} elseif ( 2 === $footerwidgets ) {
	$footergrid = 'one_half';

} elseif ( 3 === $footerwidgets ) {
	$footergrid = 'one_third';

} elseif ( 4 === $footerwidgets ) {
	$footergrid = 'one_fourth';
}

$footergrid = $footergrid . ' widget-container';
?>

<?php if ($footerwidgets) : ?>

<?php if ( is_active_sidebar( 'footer-widget-area-1' ) ) : ?>
	<div class="<?php echo esc_attr( $footergrid );?>">
		<?php dynamic_sidebar( 'footer-widget-area-1' ); ?>
	</div>
<?php endif;?>

<?php if ( is_active_sidebar( 'footer-widget-area-2' ) ) : $last = ( '2' === $footerwidgets ? ' last' : false ); ?>
	<div class="<?php echo esc_attr( $footergrid ) . esc_attr( $last );?>">
		<?php dynamic_sidebar( 'footer-widget-area-2' ); ?>
	</div>
<?php endif;?>

<?php if ( is_active_sidebar( 'footer-widget-area-3' ) ) : $last = ( '3' === $footerwidgets ? ' last' : false ); ?>
	<div class="<?php echo esc_attr( $footergrid ) . esc_attr( $last );?>">
		<?php dynamic_sidebar( 'footer-widget-area-3' ); ?>
	</div>
<?php endif;?>

<?php if ( is_active_sidebar( 'footer-widget-area-4' ) ) : $last = ( '4' === $footerwidgets ? ' last' : false );?>
	<div class="<?php echo esc_attr( $footergrid ) . esc_attr( $last );?>">
		<?php dynamic_sidebar( 'footer-widget-area-4' ); ?>
	</div>
<?php endif;?>

<div class="clear"></div>

<?php endif;?>