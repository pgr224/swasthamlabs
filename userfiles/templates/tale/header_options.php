<?php

    /************************************************
                    Template Options
    *************************************************/

    $tpl_prefix = 'mw-template-tale';


    $header_image       = get_option('headerimage', $tpl_prefix);
    $font       = get_option('font', $tpl_prefix);


?>
<style>
.module-products-template-columns-3 .valign, .module-posts-template-columns .valign, .module-posts-template-columns .valign *, .module-products-template-columns-3 .valign * {
	height: 160px;
}
hr {
	max-width: 150px;
	margin: 25px auto;
}
.quote {
	max-width: 658px;
	line-height: 24px;
	text-align: center;
	margin: auto;
	padding-left: 30px;
}
.quote h2 {
	padding-bottom: 20px;
}
.quote p {
	font-family: Georgia;
	font-style: italic;
	font-size: 14px;
	text-align: justify;
}
.lead {
	font-size: 16px;
}
<?php if($font){ ?>
body {
	font-family: <?php print $font; ?>, Verdana, sans-serif , serif;
}
<?php } else {?>
body {
	font-family: Montserrat, Lato,Open Sans, Verdana, serif;
}	
<?php } ?>
</style>
