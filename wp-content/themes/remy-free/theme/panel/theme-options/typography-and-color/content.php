<?php
/**
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * Return an array with the options for Theme Options > Typography and Color > Content
 *
 * @package Yithemes
 * @author  Andrea Grillo <andrea.grillo@yithemes.com>
 * @author  Antonio La Rocca <antonio.larocca@yithemes.it>
 * @since   2.0.0
 * @return mixed array
 *
 */
return array(

    /* Typography and Color > Content > 404 Page */
    array(
        'type' => 'title',
        'name' => __( '404 Page', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'content-not-found-general-font',
        'type'            => 'typography',
        'name'            => __( 'Custom 404 page general font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 30,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#1f1f1f',
            'align'     => 'center',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    /* Typography and Color > Content > FAQ */
    array(
        'type' => 'title',
        'name' => __( 'FAQ', 'yit' ),
        'desc' => '',
    ),

    array(
        'id'              => 'content-faq-title-font',
        'type'            => 'typography',
        'name'            => __( 'FAQ\'s title font', 'yit' ),
        'desc'            => __( 'Choose the font type, size, text transform and align for faq\'s.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'             => array(
            'size'      => 14,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'color'     => '#686868',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                             font-family,
                             font-weight,
                             color,
                             text-transform,
                             text-align'
        ),
        'disabled' => true
    ),


    /* Typography and Color > Content > Blog & Portfolios */
    array(
        'type' => 'title',
        'name' => __( 'Blog & Portfolios', 'yit' ),
        'desc' => '',
    ),

    array(
        'id'              => 'content-blog-portfolios-title-font',
        'type'            => 'typography',
        'name'            => __( 'Blog & Portfolios page title font', 'yit' ),
        'desc'            => __( 'Choose the font type, size, text transform and align for blog and portfolios page.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 20,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'align'     => 'center',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                             font-family,
                             font-weight,
                             text-transform,
                             text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'content-blog-portfolios-single-title-font',
        'type'            => 'typography',
        'name'            => __( 'Blog & Portfolios single page title font', 'yit' ),
        'desc'            => __( 'Choose the font type, size, text transform and align for single blog & portfolios page.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 30,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  =>     '',
            'properties' =>     'font-size,
                                 font-family,
                                 font-weight,
                                 text-transform,
                                 text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'content-blog-portfolios-title-link-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Title Color', 'yit' ),
            'hover'  => __( 'Title Color Hover', 'yit' )
        ),
        'name'       => __( 'Blog & Portfolios Title Color', 'yit' ),
        'desc'       => __( 'Select the colors to use for the links title in normal state and on hover.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#434343',
                'hover'  => '#b0b0b0'
            )
        ),
        'style'      => array(
            'normal' => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'hover'  => array(
                'selectors'  => '',
                'properties' => 'color'
            )
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'content-blog-meta-font',
        'type'            => 'typography',
        'name'            => __( 'Meta info box', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color for meta info box.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'             => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#afafaf',
            'align'     => 'center',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-weight,
                              color,
                              text-transform,
                              text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'content-blog-meta-link-hover-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal' => __( 'Meta Link', 'yit' ),
            'hover'  => __( 'Meta Link Hover', 'yit' )
        ),
        'name'       => __( 'Meta Links', 'yit' ),
        'desc'       => __( 'Select the colors to use for the links in normal state and on hover.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal' => '#434343',
                'hover'  => '#b0b0b0'
            )
        ),
        'style'      => array(
            'normal' => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'hover'  => array(
                'selectors'  => '',
                'properties' => 'color'
            )
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'content-blog-big-font',
        'type'            => 'typography',
        'name'            => __( 'Content font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color for content.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'             => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#afafaf',
            'align'     => 'left',
            'transform' => 'none',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-family,
                              font-weight,
                              color,
                              text-align,
                              text-transform'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'content-blog-small-font',
        'type'            => 'typography',
        'name'            => __( 'Content font', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color for content.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'             => array(
            'size'      => 12,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => '400',
            'color'     => '#afafaf',
            'align'     => 'center',
            'transform' => 'none',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                              font-family,
                              font-family,
                              font-weight,
                              color,
                              text-align,
                              text-transform'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'content-blog-postformat-quote-content-font',
        'type'            => 'typography',
        'name'            => __( 'Postformat quote: Content', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color for the content in quote postformat.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 18,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'bold-italic',
            'color'     => '#ffffff',
            'align'     => 'center',
            'transform' => 'none',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                             font-family,
                             font-family,
                             font-weight,
                             color,
                             text-align,
                             text-transform'
        ),
        'disabled' => true
    ),

    array(
        'id'              => 'content-blog-postformat-quote-title-font',
        'type'            => 'typography',
        'name'            => __( 'Postformat quote: Title', 'yit' ),
        'desc'            => __( 'Choose the font type, size and color for the title in quote postformat.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-paragraph',
        'std'             => array(
            'size'      => 11,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'color'     => '#ffffff',
            'align'     => 'left',
            'transform' => 'uppercase',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                             font-family,
                             font-family,
                             font-weight,
                             color,
                             text-align,
                             text-transform'
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'content-blog-date-background-color',
        'type'       => 'colorpicker',
        'name'       => __( 'Blog: Post date background color', 'yit' ),
        'desc'       => __( 'Select the background color to use for the post date box.', 'yit' ),
        'variations' => array(
            'background' => __( 'Background Color', 'yit' ),
            'color'      => __( 'Text Color', 'yit' )
        ),
        'std'        => array(
            'color' => array(
                'background' => '#acc327',
                'color'      => '#ffffff'
            )
        ),
        'style'      => array(
            'background' => array(
                'selectors'  => '',
                'properties' => 'background-color'
            ),
            'color'      => array(
                'selectors'  => '',
                'properties' => 'color'
            )
        ),
        'disabled' => true
    ),

    /* Typography and Color > Content > Comments */
    array(
        'type' => 'title',
        'name' => __( 'Comments', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'content-comments-font',
        'type'            => 'typography',
        'name'            => __( 'Comments Link font', 'yit' ),
        'desc'            => __( 'the font type, size, text transform and align.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'      => 12,
            'unit'      => 'px',
            'family'    => 'default',
            'style'     => 'regular',
            'transform' => 'uppercase',
            'color'     => '#555555'
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                             font-family,
                             font-weight,
                             text-transform,
                             color'
        ),
        'disabled' => true
    ),

    /* Typography and Color > Content > Pagination */
    array(
        'type' => 'title',
        'name' => __( 'Pagination', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'content-pagination-font',
        'type'            => 'typography',
        'name'            => __( 'Pagination font', 'yit' ),
        'desc'            => __( 'the font type, size, text transform and align.', 'yit' ),
        'min'             => 1,
        'max'             => 80,
        'default_font_id' => 'typography-website-title',
        'std'             => array(
            'size'   => 13,
            'unit'   => 'px',
            'family' => 'default',
            'style'  => 'regular',
            'align'  => 'center',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-size,
                             font-family,
                             font-weight,
                             text-align'
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'content-pagination-text-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal'   => __( 'Normal Color', 'yit' ),
            'hover'    => __( 'Hover Color', 'yit' ),
            'selected' => __( 'Selected Color', 'yit' )
        ),
        'name'       => __( 'Pagination Number Color', 'yit' ),
        'desc'       => __( 'Select the colors to use for the pagination links.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal'   => '#B0B0B0',
                'hover'    => '#434343',
                'selected' => '#434343',
            )
        ),
        'style'      => array(
            'normal'   => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'hover'    => array(
                'selectors'  => '',
                'properties' => 'color'
            ),
            'selected' => array(
                'selectors'  => '',
                'properties' => 'color'
            )
        ),
        'disabled' => true
    ),

    array(
        'id'         => 'content-pagination-background-color',
        'type'       => 'colorpicker',
        'variations' => array(
            'normal'   => __( 'Normal Color', 'yit' ),
            'hover'    => __( 'Hover Color', 'yit' ),
            'selected' => __( 'Selected Color', 'yit' )
        ),
        'name'       => __( 'Pagination Background Color', 'yit' ),
        'desc'       => __( 'Select the colors to use for the pagination links.', 'yit' ),
        'std'        => array(
            'color' => array(
                'normal'   => '#ffffff',
                'hover'    => '#ffffff',
                'selected' => '#ffffff',
            )
        ),
        'style'      => array(
            'normal'   => array(
                'selectors'  => '',
                'properties' => 'background-color'
            ),
            'hover'    => array(
                'selectors'  => '',
                'properties' => 'background-color'
            ),
            'selected' => array(
                'selectors'  => '',
                'properties' => 'background-color'
            )
        ),
        'disabled' => true
    ),




    /* Typography and Color > Content > Shortcode: Banner with text and images */
    array(
        'type' => 'title',
        'name' => __( 'Shortcode: Banner with text and images', 'yit' ),
        'desc' => ''
    ),

    array(
        'id'              => 'content-banner-font',
        'type'            => 'typography',
        'name'            => __( 'Banner with text and image font', 'yit' ),
        'desc'            => __( 'choose the font type.', 'yit' ),
        'default_font_id' => 'typography-banner-with-text-and-image',
        'std'             => array(
            'family' => 'Roboto Slab',
        ),
        'style'           => array(
            'selectors'  => '',
            'properties' => 'font-family'
        ),
        'disabled' => true
    ),

);

