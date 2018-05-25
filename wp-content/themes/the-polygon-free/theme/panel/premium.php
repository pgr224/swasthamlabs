<?php

/* === CHANGE THIS ARGS === */

$premium_theme_name = 'the-polygon';

$yithemes_landing = 'https://yithemes.com/themes/wordpress/the-polygon/';

$name = 'The Polygon : Free WordPress theme for videogames';

/* ====================== */

// $landing_args = '?utm_source=yith-panel&utm_medium=wpadmin&utm_content=tab-premium-' . $premium_theme_name . '&utm_campaign=yith-admin';
$landing = $yithemes_landing;
$live = 'http://yithemes.com/live/demo?theme=' . $premium_theme_name;
$domain = 'https://yithemes.com';
$images_url = YIT_THEME_ASSETS_URL . '/images/premium';
?>

<?php /* === Edit the html and css code below, if necessary! === */?>

<style type="text/css">
    /* Title */
.container h1, h2, h3, h4, h5, h6 {font-weight:bold;color:#635f64;text-transform:uppercase;}
.container h1 {font-size:310%;line-height:1;margin:0.5em 0 0.3em;padding:0;text-align:center;}
.container h1.title-page {text-align:left;margin-top:2em;}
.container h2 {font-size:190%;margin:0.5em 0;border-bottom:1px solid #d0d0d0;padding-bottom:15px;}
.container h2.subtitle {font-size:220%;text-align:center;border-bottom:none;}
.container h2.big {font-size:260%;}
.container h2.big-big {font-size:670%;text-align:center;border-bottom:none;}
.container h2.big-big span {text-decoration:underline;}
.container h2.premium span {color:#3693a7;}
.container h3 {font-size:150%;text-transform:none;font-weight:normal;line-height:1.25;margin-bottom:0.75em;color:#919a01;padding:0 20px;}
.container h3.call {text-align:center;font-size:520%;text-transform:uppercase;color:#635f64;}
.container h3.call span {color:#3693a7;text-decoration:underline;}
.container h3.not-found {text-align:center;font-size:420%;text-transform:uppercase;color:#635f64;}
.container ul.premium-features h3 {color:#0f5b6b;}
.container .hentry h3,.hentry h1 {padding:0;}
.container h4 {font-size:140%;line-height:1.25;margin-bottom:1em;color:#2d96d8;padding:0 20px;}
.container h5 {font-size:120%;margin-bottom:1.0em;padding:0 20px;}
.container h6 {font-size:100%;}
.container h1 img, .container h2 img, .container h3 img, .container h4 img, .container h5 img, .container h6 img {margin:0;}
.container h1 span, .container h2 span, .container h5 span {color:#acb703;}
#footer h3 { padding-left:0; padding-right:0; }

    /* Text elements */
.container li {line-height:1.5}

    /* Align pagination */
.container #paginator table,#paginator tbody,#paginator tr,#paginator td {border:none;}

    /**********************   GENERAL LINK     *******************/
.container a { color:#01476b; text-decoration:none;}
.container a:link, .container a:visited {color:#0ba4ae;; text-decoration:none; }
.container a:active, .container a:hover {color:#408bc4;; }

    /******************       MAIN LAYOUT       ******************/

#footer h2, #footer h3{text-transform:none !important;font-weight:normal !important;}

    /*content*/
.container #content-full-width {margin:0 auto;padding:0 20px 0 20px;}
.container.landing li {
    font-size: 14px;
    line-height: 1.5;
    margin: 1.5em 0;
}
.container > img { display:block; margin:0 auto; max-width:100%; width:auto; }

    /*logo*/
.container img.logo {display:block;margin:18px auto 0;}

    /* call to actions buttons */
.container ul.actions {list-style-type:none;width:900px;margin:0 auto;padding:0;}
.container ul.actions li  {width:274px;float:left;display:block;text-align:center;}
.container ul.actions li a, .container div.buy-now a {color:#fff;}
.container ul.actions li a.btn-large, .container div.buy-now a.btn-large {padding:20px 30px;font-size:16px;}
.container ul.actions li a.btn.double i, .container div.buy-now a.btn.double i {left: 12px;}
.container ul.actions li.buy-now{
    margin-right: 25px;
}
.container ul.actions li.buy-now a{
    display: block;
    background-color: #d04210;
    background-image: url('<?php echo $images_url ?>/icon-cart.png');
    background-repeat: no-repeat;
    background-position: 25px center;
    border-radius: 25px;
    padding: 6px 0 6px 35px;
}

.container ul.actions li.live-preview a:hover{
    background-color: #0c273d;
}

.container ul.actions li.buy-now a:hover{
    background-color: #aa2f07;
}

.container ul.actions li.live-preview a{
    display: block;
    background-color: #163955;
    background-image: url('<?php echo $images_url ?>/icon-preview.png');
    background-repeat: no-repeat;
    background-position: 25px center;
    border-radius: 25px;
    padding: 6px 0 6px 35px;
}


.container ul.actions li p{
    margin: 0;
}

.container ul.actions li p:first-child{
    font-size: 25px;
    font-weight: 700;
    text-transform: uppercase;
}

.container .footer .wrap-button{
    text-align: center;
}

.container .footer .wrap-button a{
    display: block;
    background-color: #d04210;
    background-image: url('<?php echo $images_url ?>/icon-cart.png');
    background-repeat: no-repeat;
    background-position: 25px center;
    border-radius: 25px;
    padding: 6px 0 6px 35px;
    width: 270px;
    margin: 0 auto;
}

.container .footer .wrap-button a:hover{
    background-color: #aa2f07;
}

.container .footer .wrap-button p{
    margin: 0;
}

.container .footer .wrap-button p:first-child {
    font-size: 25px;
    font-weight: 700;
    text-transform: uppercase;
}



.landing-btn.btn > span {display: block;margin: 0 auto;text-align: left;}

.container

    /* call to action ADD TO CART */
.container .buy-now-new {text-align:center;padding:20px 5px;border:3px dashed #d4d5d5;margin:80px auto;width:760px;}
.container .buy-now-new h2 {font-size:270%;border:none;margin:1.0em 0 1.5em;}
.container .buy-now-new h2 span {font-size:130%;color:#9d9f00;}
.container .buy-now-new a:link, .container .buy-now-new a:visited, .container .buy-now-new a:active, .container .buy-now-new a:hover {color:#fff;}

.container .cards {margin:20px 0 0 0;}
.container .credit-card {display: block; margin: 0 auto;}

    /* features list */
.container ul.features-list {margin:0;padding:0;list-style-type:none;font-size:85%;height:170px;}
.container ul.features-list li {background:url('images/icons/check.gif') no-repeat top left;margin:0 0 22px 0;padding:0 0 0 3.125%;height:26px;line-height:26px;float:left;width:16.875%;display:block;}

    /* features free */
.container ul.free-features, ul.premium-features {margin:0;padding:0;list-style-type:none;}
.container ul.free-features li, ul.premium-features li {float:left;width:50%;}
.container ul.free-features li img, ul.premium-features li img {float:left;margin:0 15px 50px 0;padding:3px;}
.container ul.free-features li p, ul.premium-features li p {padding-right:20px;}

.container a img.add-to-cart {display:block;width:770px;margin:60px auto;}

    /* testimonial */
.container .testimonial {width:auto;margin:60px auto;padding:55px 35px;border:2px dashed #d4d5d5;}
.container .testimonial img {float:left;margin:20px 25px 50px 0;padding:8px;border:1px solid #d4d5d5;}
.container .testimonial img.no-margine {margin-bottom:0;}
.container .testimonial p {font-size:160%;line-height:1.8;color:#4f4c50;}
.container .testimonial p.sign {font-size:120%;color:#acafaf;}
.container ul.rating {height:30px;margin:0 0 20px;padding:0;}
.container ul.rating li {display:block;float:left;height:25px;line-height:25px;width:110px;padding:0 70px 0 0;font-size:100%;font-weight:bold;margin:0 0 0 50px;}
.container ul.rating li.rating-five {background: url("images/bg/five-star.png") no-repeat top right;}
.container ul.rating li.rating-four {background: url("images/bg/four-star.png") no-repeat top right;}
.container ul.rating li.first {margin-left:0;}
.container ul.rating li.last {padding-right:130px;}

    /*comparative table */
.container table.comparative {width:750px;margin:0 auto;border:none;background-color:#fff;font-size:16px;}
.container table.comparative th {margin:0;padding:0;border:1px solid #fff;width:100%;vertical-align:bottom;}
.container table.comparative th.features {background:url('images/table/table.png') repeat-x bottom center #fff;}
.container table.comparative th.features {width:50%}
.container table.comparative th.basic, .container table.comparative th.premium {width:25%}
.container table.comparative th.basic img, .container table.comparative th.premium img{display: block; vertical-align:bottom;width: 100%;}
.container table.comparative td {height:55px;min-height:55px;line-height: 55px;padding:0 20px;border:1px solid #fff;}
.container table.comparative td a {
    display: block;background: #c2d72e; /* Old browsers */
    background: -moz-linear-gradient(top,  #c2d72e 0%, #7e9a2a 78%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#c2d72e), color-stop(78%,#7e9a2a)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #c2d72e 0%,#7e9a2a 78%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #c2d72e 0%,#7e9a2a 78%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #c2d72e 0%,#7e9a2a 78%); /* IE10+ */
    background: linear-gradient(top,  #c2d72e 0%,#7e9a2a 78%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c2d72e', endColorstr='#7e9a2a',GradientType=0 ); /* IE6-9 */
    color:#f8ffcc;font-weight:bold;text-shadow: 0px 0px 4px rgba(126, 154, 42, 1);min-height:55px;height:55px;line-height:55px;}
.container table.comparative td.features {background-color:#f8f6f6;text-align:right;}
.container table.comparative td.free-odd {background-color:#f3f3f3;text-align:center;}
.container table.comparative td.free-even {background-color:#e9e9e9;text-align:center;}
.container table.comparative td.premium-odd {background-color:#eff6d8;text-align:center;}
.container table.comparative td.premium-even {background-color:#d9e4b6;text-align:center;}
.container table.comparative td.premium-even img, .container table.comparative td.premium-odd img, .container table.comparative td.free-odd img, .container table.comparative td.free-even img  {vertical-align: middle;}

    /* free bonus */
.container .free-bonus {width:770px;margin:60px auto;padding:55px 35px;border:2px dashed #9fb82c;}
.container .free-bonus p {font-size:14px;}
.container .free-bonus h2 {text-align:center;border-bottom:none;line-height:30px;}
.container .free-bonus img {display:block;margin:20px auto;}
.container .free-bonus ul {margin:40px 0;list-style-type:none;}
.container .free-bonus li {background:url('images/icons/check.gif') no-repeat top left;margin:11px 60px 11px 78px;padding:0 0 0 30px;line-height:26px;}
.container span.small-title {font-size:85%;display: block;margin-top: 20px;}

    /* table value resource */
.container .value-resource {width:500px;margin:0 auto;}
.container .value-resource td {height:30px;line-height:30px;}

    /* limited offer*/
.container img.limited-offer {display:block;margin:0 auto;}

    /* ====================== START SHORTCODE ====================== */
    /*toggle*/
.toggle .content-tab p{font-size:14px;}
.toggle p a {padding:0 0 1px;text-decoration:none;}
.toggle p.tab-index a {font-size: 16px;font-family:'Nunito', sans-serif !important}

.container div#post-107 input.eStore_buy_now_button {background:url("images/bg/buy-now-multisite.gif") no-repeat scroll center top transparent;cursor:pointer;display:block;height:64px;margin:0 auto;padding:0;text-indent:-9999px;width:241px;}
.container div#post-107 input.eStore_buy_now_button:hover {background-position:bottom center;}

.shop-socials {
    margin: 15px auto 0 auto;
    width: 310px;
}

.shop-socials .fb_iframe_widget span {
    vertical-align: baseline;
    width: 80px !important;
}

.shop-socials .twitter-count-horizontal {
    width: 85px !important;
}

.shop-socials .pin-it-button img {
    border: none;
    display: inline-block;
    vertical-align: top;
}

    /* google+ */
.shop-socials > div {
    margin-left: 6px !important;
    margin-right: 6px !important;
}

.container .free-bonus .cpt-bonus li {background:none;padding:0;margin:0 0 45px 0;}
.container .free-bonus .cpt-bonus li:last-child{border-top: 1px solid #aaa;}
.container .free-bonus .cpt-bonus li img{float:left;margin:0;width:150px;}
.container .free-bonus .cpt-bonus li .bonus-summary{float:left;width:405px;margin:30px 0 0 20px;}
.container .free-bonus .cpt-bonus li .bonus-summary h5 {padding:0;float:left;margin:0 !important;margin-left:20px !important;font-size:15px;color:#7b7778;font-weight:normal;}
.container .free-bonus .cpt-bonus li .bonus-summary .tagline{padding:0;float:left;margin:0 !important;margin-left:20px !important;font-size:12px;color:#7b7778;}
.container .free-bonus .cpt-bonus li .bonus-value{float:left;width:195px;margin-top:41px;}
.container .free-bonus .cpt-bonus li .value{font-size:12px;font-family:'Oswald', serif;margin:0 !important;color:#aaa;}
.container .free-bonus .cpt-bonus li .currency{font-size:40px;}
.container .free-bonus .cpt-bonus li .price {font-size: 55px;font-weight:bold;margin-left:30px;}
.container .free-bonus .cpt-bonus li .sign{font-size:35px;}
.container .free-bonus .cpt-bonus li .total{float:left;width:555px;padding-right:20px;text-align:right;color:#555354;font-size:40px;margin-top:45px;font-weight:bold;letter-spacing:-3px;}
.container .free-bonus .cpt-bonus li:last-child .price {margin-left:35px}

.landing h1 { color:#253963; }
.landing h2, .landing h2.post-title { color:#253963; }
.landing h3, .landing .home_item h4 a, .landing .home_item h4 { color:#253963; }
.landing h4 { color:#253963; }
.landing h5 { color:#253963; }
.landing h6 { color:#253963; }
.landing h1 span, .landing h2 span, .landing h3 span, .landing h4 span, .landing h5 span, .landing h6 span { color:#658103; }
.container.landing h1, .container.landing h2 {color:#635F64 !important;}
.container.landing h2{
    text-align: center;
    margin-bottom: 20px;
}

.landing h1 { font-size:23px; clear:both; }
.landing h2, .landing h2 a { font-size:20px; clear:both; }
.landing h3 { font-size:13px; }

.landing p, .landing .unoslider_caption { font-family: 'Droid Sans', sans-serif !important; }
.landing h1 { font-family: 'Nunito', sans-serif !important; }
.landing h2, .landing h2 a { font-family: 'Nunito', sans-serif !important; }
.landing h3 { font-family: 'Nunito', sans-serif !important; }
.landing h4 { font-family: 'Nunito', sans-serif !important; }
.landing h5 { font-family: 'Nunito', sans-serif !important; }
.landing h6 { font-family: 'Nunito', sans-serif !important; }

.container.landing {width:800px;margin-left:0;}
.container.landing ul.actions {width:600px;}
.container.landing ul.free-features li, .landing ul.premium-features li {width:400px;}
.container.landing ul.free-features li:nth-child(2n+1), .landing ul.premium-features li:nth-child(2n+1){clear: left;}
.container.landing ul.premium-features h3 {font-size:125%;margin-top:0;padding-left: 0}
.container.landing ul.free-features li p, .landing ul.premium-features li p {font-size:13px;}
.landing ul.premium-features li{display: table}
.landing ul.premium-features li figure{display: table-cell}
.landing ul.premium-features li .text{display: table-cell;vertical-align: top;padding-left: 15px}
.container.landing .free-bonus {width:730px;}
.container.landing .buy-now-new {width:784px;margin:20px auto;clear:both;}
</style>

<!-- START CONTAINER -->
<div class="container bolder-tpl landing">
<img src="<?php echo $images_url ?>/logo.png" class="logo" alt="<?php echo $name ?>" />
<!-- END LOGO -->

<h1><?php _e('Why you have to','yit');?></h1>
<h2 class="subtitle">
    <?php echo sprintf( __('%1$sUPGRADE%2$s TO THE %1$sPREMIUM VERSION%2$s ','yit'),'<span>','</span>' ) ?>
</h2>

<!-- START CALL TO ACTIONS -->
<ul class="actions">
    <li class="buy-now">
        <a href="<?php echo $landing ?>" target="_blank">
            <p><?php _e('Buy Now','yit');?></p>
            <p><?php _e('the premium version','yit');?></p>
        </a>
    </li>
    <li class="live-preview">
        <a href="<?php echo $live ?>">
            <p><?php _e('Live preview','yit');?></p>
            <p><?php _e('see the live preview','yit');?></p>
        </a>
    </li>
</ul>

<div class="clearer"></div>

<!-- START PREMIUM FEATURES -->
<ul class="premium-features">
    <li>
        <figure>
            <img src="<?php echo $images_url ?>/support.png" alt="Support Icon" />
        </figure>
        <div class="text">
            <h3><?php _e('TECHNICAL SUPPORT','yit');?></h3>
            <p>
                <?php _e('We offer a year of support with the purchase of the premium version , so you can open a new ticket and ask help to our developers.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/sample-data.png" alt="Sample data icon" />
        </figure>
        <div class="text">
            <h3><?php _e('SAMPLE DATA (DEMO FILES)','yit');?></h3>

            <p>
                <?php _e('With a simple click you can import our demo files, so your theme will appear exactly like the theme preview.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/theme-options.png" alt="Theme options icon" />
        </figure>
        <div class="text">
            <h3><?php _e('EXTENSIVE THEME OPTIONS','yit');?></h3>

            <p>
                <?php _e('With our advanced theme options page, you are given complete control over your theme and its settings.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/unlimited-colors.png" alt="Colors icon" />
        </figure>
        <div class="text">
            <h3><?php _e('UNLIMITED COLORS','yit');?></h3>

            <p>
                <?php _e('In the premium version of the theme you can easily edit the colors of all the sections and elements like text, links,slogan and so on.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/googlefont.png" alt="Google font icon" />
        </figure>
        <div class="text">
            <h3><?php _e('600+ GOOGLE FONTS','yit');?></h3>

            <p>
                <?php _e('Compose your front page chosing your favourite slider to display your product and services.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/contact.png" alt="<?php echo $name ?>Contact icon">
        </figure>
        <div class="text">
            <h3><?php _e('UNLIMITED CONTACT FORMS','yit');?></h3>

            <p>
                <?php _e('Create unlimited contact forms for your site and set up each form very easily by our panel.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/widgets.png" alt="widgets icon" />
        </figure>
        <div class="text">
            <h3><?php _e('CUSTOM WIDGETS','yit');?></h3>

            <p>
                <?php _e('Add new and useful widgets in your website pages.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/shortcode.png" alt="shortcode icon" />
        </figure>
        <div class="text">
            <h3><?php _e('SHORTCODE MANAGER','yit');?></h3>

            <p>
                <?php _e('Through a simple button in the editor bar, you can easily add shortcode in your posts and pages.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/login1.png" alt="login icon"/>
        </figure>
        <div class="text">
            <h3><?php _e('CUSTOM LOGIN','yit');?></h3>

            <p>
                <?php _e('Choose the colors, the background and the features suitable for your login page','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/visual-composer.png" alt="visual composer icon" />
        </figure>
        <div class="text">
            <h3><?php _e('VISUAL COMPOSER','yit');?></h3>

            <p>
                <?php _e('This plugin helps the user in the construction of the pages giving you the ability to drag and drop content is backend that frontend, thus providing a preview of the result obtained.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/ultimate.png" alt="visual composer icon" />
        </figure>
        <div class="text">
            <h3><?php _e('ULTIMATE ADDONS','yit');?></h3>

            <p>
                <?php _e('Who uses Visual Composer to build site pages easily and quickly will benefit from even new features. Brand new options and different effects in addition to the various features the plugin offers for a complete solution.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/newsletter.png" alt="newsletter icon" />
        </figure>
        <div class="text">
            <h3><?php _e('NEWSLETTER FORM','yit');?></h3>
            <p>
                <?php _e('With YIT Newsletter Form you can create tailored form for your newsletter that you will be able to add in any part of your site thanks to the available shortcode.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/sidebar.png" alt="sidebar icon" />
        </figure>
        <div class="text">
            <h3><?php _e('UNLIMITED SIDEBARS','yit');?></h3>
            <p>
                <?php _e('Create different sidebars directly from the panel to enjoy all the widgets the theme offers','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/team.png" alt="team icon" />
        </figure>
        <div class="text">
            <h3><?php _e('TEAM','yit');?></h3>
            <p>
                <?php _e('Create your About page with the "Team" custom post type to show gracefully the members of your company','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/sc.png" alt="shortcode icon" />
        </figure>
        <div class="text">
            <h3><?php _e('80+ SHORTCODES','yit');?></h3>
            <p>
                <?php _e('80+ shortcodes to compose your pages and add contents in an easy and rapid way.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/slider.png" alt="slider icon" />
        </figure>
        <div class="text">
            <h3><?php _e('4 SLIDER TYPES','yit');?></h3>
            <p>
                <?php echo sprintf( __('Compose your front page choosing your favourite slider to display your product and services betweeen "Banners","Flexislider" and "Parallax". Make your contents dynamic using also %1$sSlider Revolution%2$s, a plugin that is worth %1$s19$%2$s, and you will have for free with this theme.','yit'),'<b>','</b>');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/backup.png" alt="backup icon" />
        </figure>
        <div class="text">
            <h3><?php _e('BACKUP & RESET','yit');?></h3>
            <p>
                <?php _e('Import and export the sample data for your theme','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/layout.png" alt="layout icon" />
        </figure>
        <div class="text">
            <h3><?php _e('LAYOUT','yit');?></h3>

            <p>
                <?php _e('Customize the layout of one or more pages at the same time, setting particular configurations you don\'t want to apply to all contents of the site.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/blog-tab.png" alt="blog layout icon" />
        </figure>
        <div class="text">
            <h3><?php _e('BLOG LAYOUT','yit');?></h3>
            <p>
                <?php _e('Big and Small are the two available layouts for your blog: use them to show your articles in the way that most suits to your site.','yit');?>
            </p>
        </div>
    </li>

    <li>
        <figure>
            <img src="<?php echo $images_url ?>/shop-tab.png" alt="Shop layout icon" />
        </figure>
        <div class="text">
            <h3><?php _e('SHOP LAYOUT','yit');?></h3>

            <p>
                <?php _e('Show the products of your shop choosing among the available visualization modes: grid, list and view. A variable shop for every user\'s needs.','yit');?>
            </p>
        </div>
    </li>
</ul>

<div class="clearer"></div>

<!-- START BUTTON BUY NOW -->
<div class="buy-now-new footer">
    <div class="wrap-button">
        <a href="<?php echo $landing ?>" target="_blank">
            <p><?php _e('Buy Now','yit');?></p>
            <p><?php _e('the premium version','yit');?></p>
        </a>
        <img src="<?php echo $images_url ?>/credit-card.jpg" alt="" class="cards"/>
    </div>
</div>
<!-- END BUTTON BUY NOW -->

</div>
<!-- END CONTAINER -->