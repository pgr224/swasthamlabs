<?php
/**
 * This file belongs to the YIT Plugin Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * Return the list of shortcodes and their settings
 *
 * @package Yithemes
 * @author  Francesco Licandro  <francesco.licandro@yithemes.com>
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly


$config          = YIT_Plugin_Common::load();
$awesome_icons   = YIT_Plugin_Common::get_awesome_icons();
$animate         = $config['animate'];

$theme_shortcodes = array(

    /* === Accordion === */
    'accordion' => array(
        'title' => __('Accordion', 'yit' ),
        'description' =>  __('Create a accordion content', 'yit' ),
        'tab' => 'shortcodes',
        'has_content' => true,
        'attributes' => array(
            'title' => array(
                'title' => __('Title', 'yit'),
                'type' => 'text',
                'std'  => 'your_title'
            ),
            'opened' => array(
                'title' => __('Opened', 'yit'),
                'type' => 'checkbox',
                'std'  => 'no'
            ),
            'class_icon_closed' => array(
                'title' => __('Class Icon Closed', 'yit'),
                'type' => 'select-icon',
                'options' => $awesome_icons,
                'std'  => 'plus'
            ),
            'class_icon_opened' => array(
                'title' => __('Class Icon Opened', 'yit'),
                'type' => 'select-icon',
                'options' => $awesome_icons,
                'std'  => 'minus'
            ),
            'animate' => array(
                'title' => __('Animation', 'yit'),
                'type' => 'select',
                'options' => $animate,
                'std'  => ''
            ),
            'animation_delay' => array(
                'title' => __('Animation Delay', 'yit'),
                'type' => 'text',
                'desc' => __('This value determines the delay to which the animation starts once it\'s visible on the screen.', 'yit'),
                'std'  => '0'
            )

        )
    ),

    /* ====== ONE PAGE ANCHOR ======== */
    'onepage_anchor' => array(
        'title' => __( 'OnePage Anchor', 'yit' ),
        'description' => __( 'Add the anchor for your OnePage', 'yit' ),
        'tab' => 'shortcodes',
        'has_content' => false,
        'attributes' => array(
            'name' => array(
                'title' => __('Name anchor (the name of anchor you define in the menu with #)', 'yit'),
                'type' => 'text',
                'std'  => ''
            )
        )

    ),

    /* === MODAL === */
    'modal'        => array(
        'title'              => __( 'Modal Window', 'yit' ),
        'description'        => __( 'Create a modal window', 'yit' ),
        'tab'                => 'shortcodes',
        'has_content'        => true,
        'attributes'         => array(
            'title'              => array(
                'title' => __( 'Modal Title', 'yit' ),
                'type'  => 'text',
                'std'   => __( 'Your title here', 'yit' )
            ),
            'opener'             => array(
                'title'   => __( 'Type of modal opener', 'yit' ),
                'type'    => 'select',
                'options' => array(
                    'button' => __( 'Button', 'yit' ),
                    'text'   => __( 'Textual Link', 'yit' ),
                    'image'  => __( 'Image', 'yit' )
                ),
                'std'     => 'button'
            ),
            'button_text_opener' => array(
                'title' => __( 'Text of the button', 'yit' ),
                'type'  => 'text',
                'std'   => __( 'Open Modal', 'yit' ),
                'deps'  => array(
                    'ids'    => 'opener',
                    'values' => 'button'
                )
            ),
            'button_style'       => array(
                'title'   => __( 'Style of the button', 'yit' ),
                'type'    => 'select',
                'options' => array(
                    'normal'      => __( 'Normal', 'yit' ),
                    'alternative' => __( 'Alternative', 'yit' )
                ),
                'std'     => 'normal',
                'deps'    => array(
                    'ids'    => 'opener',
                    'values' => 'button'
                )
            ),
            'link_text_opener'   => array(
                'title' => __( 'Text of the link', 'yit' ),
                'type'  => 'text',
                'std'   => __( 'Open Modal', 'yit' ),
                'deps'  => array(
                    'ids'    => 'opener',
                    'values' => 'text'
                )
            ),
            'link_icon_type'     => array(
                'title'   => __( 'Icon type', 'yit' ),
                'type'    => 'select',
                'options' => array(
                    'none'       => __( 'None', 'yit' ),
                    'theme-icon' => __( 'Theme Icon', 'yit' ),
                    'custom'     => __( 'Custom Icon', 'yit' )
                ),
                'std'     => 'none',
                'deps'    => array(
                    'ids'    => 'opener',
                    'values' => 'text'
                )
            ),
            'link_icon_theme'    => array(
                'title'   => __( 'Icon', 'yit' ),
                'type'    => 'select-icon', // home|file|time|ecc
                'options' => $awesome_icons,
                'std'     => '',
                'deps'    => array(
                    'ids'    => 'link_icon_type',
                    'values' => 'theme-icon'
                )
            ),
            'link_icon_url'      => array(
                'title' => __( 'Icon URL', 'yit' ),
                'type'  => 'text',
                'std'   => '',
                'deps'  => array(
                    'ids'    => 'link_icon_type',
                    'values' => 'custom'
                )
            ),
            'link_text_size'     => array(
                'title' => __( 'Font size of the link', 'yit' ),
                'type'  => 'number',
                'std'   => 17,
                'min'   => 1,
                'max'   => 99,
                'deps'  => array(
                    'ids'    => 'opener',
                    'values' => 'text'
                )
            ),
            'image_opener'       => array(
                'title' => __( 'Url of the image', 'yit' ),
                'type'  => 'text',
                'std'   => '',
                'deps'  => array(
                    'ids'    => 'opener',
                    'values' => 'image'
                )
            ),
        )
    ),

    /*================= FEATURED COLUMNS ================*/
    'featured_column' =>  array(
        'title' => __( 'Featured Columns', 'yit' ),
        'description' => __( 'Print a column with image, description and button', 'yit' ),
        'tab' => 'shortcodes',
        'has_content' => true,
        'create' => true,
        'attributes' => array(
            'title' => array(
                'title' => __( 'Title', 'yit' ),
                'type' => 'text',
                'std' => ''
            ),
            'subtitle' => array(
                'title' => __( 'Subtitle', 'yit' ),
                'type' => 'text',
                'std' => ''
            ),
            'show_button' => array(
                'title' => __( 'Show Button', 'yit' ),
                'type' => 'checkbox',
                'std' => 'yes'
            ),

            'label_button' => array(
                'title' => __( 'Label Button', 'yit' ),
                'type' => 'text',
                'std' => '',
                'deps' => array(
                    'ids' => 'show_button',
                    'values' => '1'
                )
            ),
            'url_button' => array(
                'title' => __( 'Url Button', 'yit' ),
                'type' => 'text',
                'std' => '',
                'deps' => array(
                    'ids' => 'show_button',
                    'values' => '1'
                )
            ),

            'background_image' => array(
                'title' => __( 'Background image URL', 'yit' ),
                'type' => 'text',
                'std' => ''
            ),
            'first' => array(
                'title' => __( 'First column?', 'yit' ),
                'type' => 'checkbox',
                'std' => 'no'
            ),
            'last' => array(
                'title' => __( 'Last Columns?', 'yit' ),
                'type' => 'checkbox',
                'std' => 'no'
            ),
            'animate' => array(
                'title' => __('Animation', 'yit'),
                'type' => 'select',
                'options' => $animate,
                'std'  => ''
            ),
            'animation_delay' => array(
                'title' => __('Animation Delay', 'yit'),
                'type' => 'text',
                'desc' => __('This value determines the delay to which the animation starts once it\'s visible on the screen.', 'yit'),
                'std'  => '0'
            )


        )
    ),

    /*================= PARALLAX ================*/
    'parallax'     => array(
        'title'              => __( 'Parallax effect', 'yit' ),
        'description'        => __( 'Create a fancy full-width parallax effect', 'yit' ),
        'tab'                => 'shortcodes',
        'has_content'        => true,
        'create'             => true,
        'attributes'         => array(
            'height'             => array(
                'title' => __( 'Container height', 'yit' ),
                'type'  => 'number',
                'std'   => 300
            ),
            'boxed_style' => array(
                'title' => __( 'Boxed style', 'yit' ),
                'type'  => 'select',
                'options' => array(
                            'yes' => __('Yes', 'yit'),
                            'no'  => __('No', 'yit')
                ),
                'std' => 'no'
            ),
            'image'              => array(
                'title' => __( 'Background Image URL', 'yit' ),
                'type'  => 'text',
                'std'   => ''
            ),
            'valign'             => array(
                'title'   => __( 'Vertical Align', 'yit' ),
                'type'    => 'select',
                'options' => array(
                    'top'    => __( 'Top', 'yit' ),
                    'center' => __( 'Center', 'yit' ),
                    'bottom' => __( 'Bottom', 'yit' ),
                ),
                'std'     => 'center'
            ),
            'halign'             => array(
                'title'   => __( 'Horizontal Align', 'yit' ),
                'type'    => 'select',
                'options' => array(
                    'left'   => __( 'Left', 'yit' ),
                    'center' => __( 'Center', 'yit' ),
                    'right'  => __( 'Right', 'yit' ),
                ),
                'std'     => 'center'
            ),
            'font_p'             => array(
                'title' => __( 'Paragraph Font Size', 'yit' ),
                'type'  => 'number',
                'std'   => 24
            ),
            'color'              => array(
                'title' => __( 'Content Text Color', 'yit' ),
                'type'  => 'colorpicker',
                'std'   => '#ffffff'
            ),
            'overlay_opacity'    => array(
                'title'       => __( 'Overlay', 'yit' ),
                'description' => __( 'Set an opacity of overlay (0-100)', 'yit' ),
                'type'        => 'number',
                'std'         => '0'
            ),
            'border_bottom'      => array(
                'title'       => __( 'Border Bottom', 'yit' ),
                'description' => __( 'Set a size for border bottom (0-10)', 'yit' ),
                'type'        => 'number',
                'min'         => 0,
                'max'         => 10,
                'std'         => '0'
            ),
            'effect'             => array(
                'title'   => __( 'Effect', 'yit' ),
                'type'    => 'select',
                'options' => array(
                    'fadeIn'            => __( 'fadeIn', 'yit' ),
                    'fadeInUp'          => __( 'fadeInUp', 'yit' ),
                    'fadeInDown'        => __( 'fadeInDown', 'yit' ),
                    'fadeInLeft'        => __( 'fadeInLeft', 'yit' ),
                    'fadeInRight'       => __( 'fadeInRight', 'yit' ),
                    'fadeInUpBig'       => __( 'fadeInUpBig', 'yit' ),
                    'fadeInDownBig'     => __( 'fadeInDownBig', 'yit' ),
                    'fadeInLeftBig'     => __( 'fadeInLeftBig', 'yit' ),
                    'fadeInRightBig'    => __( 'fadeInRightBig', 'yit' ),
                    'bounceIn'          => __( 'bounceIn', 'yit' ),
                    'bounceInDown'      => __( 'bounceInDown', 'yit' ),
                    'bounceInUp'        => __( 'bounceInUp', 'yit' ),
                    'bounceInLeft'      => __( 'bounceInLeft', 'yit' ),
                    'bounceInRight'     => __( 'bounceInRight', 'yit' ),
                    'rotateIn'          => __( 'rotateIn', 'yit' ),
                    'rotateInDownLeft'  => __( 'rotateInDownLeft', 'yit' ),
                    'rotateInDownRight' => __( 'rotateInDownRight', 'yit' ),
                    'rotateInUpLeft'    => __( 'rotateInUpLeft', 'yit' ),
                    'rotateInUpRight'   => __( 'rotateInUpRight', 'yit' ),
                    'lightSpeedIn'      => __( 'lightSpeedIn', 'yit' ),
                    'hinge'             => __( 'hinge', 'yit' ),
                    'rollIn'            => __( 'rollIn', 'yit' ),
                ),
                'std'     => 'fadeIn'
            ),

            'video_upload_mp4'   => array(
                'title' => __( 'Video Mp4', 'yit' ),
                'type'  => 'text',
                'std'   => ''
            ),
            'video_upload_ogg'   => array(
                'title' => __( 'Video Ogg', 'yit' ),
                'type'  => 'text',
                'std'   => ''
            ),
            'video_upload_webm'  => array(
                'title' => __( 'Video Webm', 'yit' ),
                'type'  => 'text',
                'std'   => ''
            ),
            'video_button'       => array(
                'title'       => __( 'Add a button', 'yit' ),
                'description' => __( 'Add a button to see a video in a lightbox', 'yit' ),
                'type'        => 'checkbox',
                'std'         => 'no'
            ),
            'video_button_style' => array(
                'title'       => __( 'Video button style', 'yit' ),
                'description' => __( 'Choose a style for video button', 'yit' ),
                'type'        => 'select',
                'options'     => yit_button_style(),
                'std'         => 'flast'
            ),
            'video_url'          => array(
                'title'       => __( 'Video URL', 'yit' ),
                'description' => __( 'Paste the url of the video that will be opened in the lightbox', 'yit' ),
                'type'        => 'text',
                'std'         => ''
            ),
            'label_button_video' => array(
                'title'       => __( 'Button Label', 'yit' ),
                'description' => __( 'Add the label of the button', 'yit' ),
                'type'        => 'text',
                'std'         => ''
            )
        )
    ),

    /*================= BLOG SECTION =================*/
    'blog_section' => array(
        'title'              => __( 'Blog', 'yit' ),
        'description'        => __( 'Print a blog section', 'yit' ),
        'tab'                => 'section',
        'has_content'        => false,
        'create'             => true,
        'attributes'         => array(
            'nitems'            => array(
                'title'       => __( 'Number of items', 'yit' ),
                'description' => __( '-1 to show all elements', 'yit' ),
                'type'        => 'number',
                'min'         => - 1,
                'max'         => 99,
                'std'         => - 1
            ),
            'ncolumns'          => array(
                'title'       => __( 'Number of columns', 'yit' ),
                'description' => __( 'Select number of columns to show', 'yit' ),
                'type'        => 'select',
                'options'     => array(
                    1 => 'One Column',
                    2 => 'Two Columns',
                    3 => 'Three Columns'
                ),
                'std'         => 1
            ),
            'enable_thumbnails' => array(
                'title' => __( 'Show Thumbnails', 'yit' ),
                'type'  => 'checkbox',
                'std'   => 'yes'
            ),
            'enable_date'       => array(
                'title' => __( 'Show Date', 'yit' ),
                'type'  => 'checkbox',
                'std'   => 'yes'
            ),
            'enable_title'      => array(
                'title' => __( 'Show Title', 'yit' ),
                'type'  => 'checkbox',
                'std'   => 'yes'
            ),
            'enable_author'     => array(
                'title' => __( 'Show Author', 'yit' ),
                'type'  => 'checkbox',
                'std'   => 'yes'
            ),
            'enable_comments'   => array(
                'title' => __( 'Show Comments', 'yit' ),
                'type'  => 'checkbox',
                'std'   => 'yes'
            )
        )
    ),

    /*================= SEPARATOR ================*/
    'separator'    => array(
        'title'              => __( 'Separator', 'yit' ),
        'description'        => __( 'Print a separator line', 'yit' ),
        'tab'                => 'shortcodes',
        'has_content'        => false,
        'create'             => true,
        'attributes'         => array(
            'style'         => array(
                'title'   => __( 'Separator style', 'yit' ),
                'type'    => 'select',
                'options' => array(
                    'single' => __( 'Single line', 'yit' ),
                    'double' => __( 'Double line', 'yit' ),
                    'dotted' => __( 'Dotted line', 'yit' ),
                    'dashed' => __( 'Dashed line', 'yit' )
                ),
                'std'     => 'single'
            ),
            'color'         => array(
                'title' => __( 'Separator color', 'yit' ),
                'type'  => 'colorpicker',
                'std'   => '#cdcdcd'
            ),
            'margin_top'    => array(
                'title' => __( 'Margin top', 'yit' ),
                'type'  => 'number',
                'min'   => 0,
                'max'   => 999,
                'std'   => 40
            ),
            'margin_bottom' => array(
                'title' => __( 'Margin bottom', 'yit' ),
                'type'  => 'number',
                'min'   => 0,
                'max'   => 999,
                'std'   => 40
            )
        )
    ),

    /* === BUTTON === */
    'button'              => array(
        'title'              => __( 'Button', 'yit' ),
        'description'        => __( 'Show a simple custom button', 'yit' ),
        'tab'                => 'shortcodes',
        'has_content'        => true,
        'attributes'         => array(
            'href'            => array(
                'title' => __( 'URL', 'yit' ),
                'type'  => 'text',
                'std'   => '#'
            ),
            'target'          => array(
                'title'   => __( 'Target', 'yit' ),
                'type'    => 'select',
                'options' => array(
                    ''        => __( 'Default', 'yit' ),
                    '_blank'  => __( 'Blank', 'yit' ),
                    '_parent' => __( 'Parent', 'yit' ),
                    '_top'    => __( 'Top', 'yit' )
                ),
                'std'     => ''
            ),
            'color'           => array(
                'title'       => __( 'Color', 'yit' ),
                'description' => __( 'You can find the buttons list', 'yit' ),
                'type'        => 'select', // btn-view-over-the-town-1|btn-the-bizzniss-1|btn-french-1|ecc
                'options'     => apply_filters( 'yit_button_style', '' ), //apply_filters( 'yit_button_style' , $button_style ),
                'std'         => 'flat'
            ),
            'dimension'       => array(
                'title'   => __( 'Width', 'yit' ),
                'type'    => 'select', // extra large!large|medium|small
                'options' => array(
                    'extra-large'   => __( 'Extra Large', 'yit' ),
                    'large'         => __( 'Large', 'yit' ),
                    'normal'        => __( 'Medium', 'yit' ),
                    'small'         => __( 'Small', 'yit' )
                ),
                'std'     => 'normal',
            ),
            'icon'            => array(
                'title'   => __( 'Icon', 'yit' ),
                'type'    => 'select-icon', // home|file|time|ecc
                'options' => $awesome_icons_with_null,
                'std'     => ''
            ),
            'icon_size'       => array(
                'title' => __( 'Icon size', 'yit' ),
                'type'  => 'number',
                'std'   => '12'
            ),
            'animation'       => array(
                'title'   => __( 'Icon Animation', 'yit' ),
                'type'    => 'select',
                'options' => array(
                    ''    => __( 'None', 'yit' ),
                    'RtL' => __( 'Right to Left', 'yit' ),
                    'LtR' => __( 'Left to Right', 'yit' ),
                    'CtL' => __( 'Center to Left', 'yit' ),
                    'CtR' => __( 'Center to Right', 'yit' ),
                    'UtC' => __( 'Up to Center', 'yit' ),
                    'LtC' => __( 'Left to Center', 'yit' ),
                    'RtC' => __( 'Right to Center', 'yit' ),
                ),
                'std'     => ''
            ),
            'animate'         => array(
                'title'   => __( 'Animation', 'yit' ),
                'type'    => 'select',
                'options' => $animate,
                'std'     => ''
            ),
            'animation_delay' => array(
                'title' => __( 'Animation Delay', 'yit' ),
                'type'  => 'text',
                'desc'  => __( 'This value determines the delay to which the animation starts once it\'s visible on the screen.', 'yit' ),
                'std'   => '0'
            ),
            'class'           => array(
                'title' => __( 'CSS class', 'yit' ),
                'type'  => 'text',
                'std'   => ''
            )
        ),
    ),
);

return $theme_shortcodes;