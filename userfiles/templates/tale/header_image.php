<?php   $header_image = get_option('header_image', 'mw-template-tale');     ?>

<div id="header">
  <div id="header-container">
    <div class="container edit" field="dream-header" rel="global">
      <div class="header-cart pull-right">
        <?php /*<module type="shop/cart" template="small">*/ ?>
      </div>
    </div>
  </div>
  <div id="bgimage" style="background-image: url(<?php print $header_image; ?>);">
    <div id="bgimagemaster">
      <div id="bgimagecontent">
        <h1 class="edit" id="master-header" field="header-top" rel="global"> <span>Tale</span> <small>Tell your story</small> </h1>
      </div>
    </div>
  </div>
</div>
