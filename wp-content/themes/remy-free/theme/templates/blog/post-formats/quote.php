<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

$blog_type = is_singular( 'post' ) ? 'single_' . $blog_type : $blog_type;
?>
<?php if( ! is_singular( 'post' ) ) : ?>
    <?php if ( $show_date ) : ?>
        <div class="yit_post_meta_date">
            <span class="day">
                <?php echo get_the_date( 'd' ) ?>
            </span>

            <span class="month">
                <?php echo get_the_date( 'M' ) ?>
            </span>
        </div>
    <?php endif; ?>

    <div class="yit_the_content">
        <?php  ( true == $show_read_more ) ? the_content( $read_more_text ) : the_excerpt(); ?>
    </div>

    <?php if ( $show_title ) : ?>
        <?php yit_string( "<h3 class='post-title'><a href='{$link}'>", $title, "</a></h3>" ); ?>
    <?php endif; ?>

    <?php // yit_image( 'size=blog_' . $blog_type . '&class=img-responsive&alt='.get_the_title() ); ?>
<?php else: ?>
    <?php // singular page starts here ?>
    <?php yit_get_template('blog/post-formats/standard.php', array('show_thumbnail' => $show_thumbnail, 'show_date' => $show_date, 'post_format' => $post_format, 'blog_type' => $blog_type, 'link' => $link)) ?>
<?php endif; ?>