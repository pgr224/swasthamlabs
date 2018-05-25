<?php
/**
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'YIT' ) ) {
    exit( 'Direct access forbidden.' );
}


extract( $args );
?>
<input type="hidden" id="<?php echo $id ?>" name="<?php echo $name ?>" value="<?php echo $val ?>" <?php if( isset( $std ) ) : ?>data-std="<?php echo $std ?>"<?php endif ?> /> 