<!DOCTYPE HTML>
<html prefix="og: http://ogp.me/ns#" class="tr-coretext tr-aa-subpixel">
    <head>
    <title>{content_meta_title}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="{content_meta_title}">
    <meta name="keywords" content="{content_meta_keywords}">
    <meta name="description" content="{content_meta_description}">
    <meta property="og:type" content="{og_type}">
    <meta property="og:url" content="{content_url}">
    <meta property="og:image" content="{content_image}">
    <meta property="og:description" content="{og_description}">
    <meta property="og:site_name" content="{og_site_name}">
    
         
    <script type="text/javascript">
        mw.lib.require("bootstrap3");
        mw.require(mw.settings.template_url + "js/functions.js");
    </script>
    <link rel="stylesheet" href="<?php print template_url(); ?>css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php print template_url(); ?>css/fonts.css" type="text/css" />

    <?php include template_dir() . 'header_options.php'; ?>
   
    </head>
    <body>
<div id="main-container">
<div id="header-master">
      <div class="container">
    <div class="mw-ui-row-nodrop">
          <div class="mw-ui-col" style="width: 200px;">
        <div class="mw-ui-col-container">
              <module type="logo" id="site-logo">
            </div>
      </div>
          <div class="mw-ui-col">
        <div class="mw-ui-col-container"> <span id="mobile-menu"><span></span><span></span><span></span><span></span></span>
              <div id="main-menu">
            <module type="menu" />
          </div>
            </div>
      </div>
        </div>
  </div>
    </div>
<?php include(__DIR__.DS.'header_image.php'); ?>
<div id="content-holder">
