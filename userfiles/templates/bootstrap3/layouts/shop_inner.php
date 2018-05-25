<?php include template_dir(). "header.php"; ?>

<section id="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <h2 class="edit"  field="title" rel="post">Product inner page</h2>
        <hr>
        <div class="edit"  field="content" rel="post">
          <div class="mw-row">
            <div class="mw-col" style="width:50%">
              <div class="mw-col-container">
                <module type="pictures" rel="content" template="product_gallery" />
              </div>
            </div>
            <div class="mw-col" style="width:50%">
              <div class="mw-col-container">
                <div class="product-description">
                  <div class="edit"  field="content_body" rel="post">
                    <p class="element">This text is set by default and is suitable for edit in real time. By default the drag and drop core feature will allow you to position it anywhere on the site. Get creative &amp; <strong style="font-weight: 600">Make Web</strong>.</p>
                  </div>
                  <module type="shop/cart_add" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="edit"  field="related_products" rel="inherit">
          <h4 class="element sidebar-title">Related Products</h4>
          <module type="shop/products"   related="true" />
          <p class="element">&nbsp;</p>
        </div>
      </div>
      <!------------ Sidebar -------------->
      <div class="col-sm-4">
        <?php include_once "shop_sidebar_inner.php"; ?>
      </div>
    </div>
  </div>
</section>
<?php include template_dir(). "footer.php"; ?>
