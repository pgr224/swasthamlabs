<div id="settings-holder" style="padding: 22px;">
  <?php
         $header_image = get_option('header_image', 'mw-template-tale');
		 $font = get_option('font', 'mw-template-tale');
		 $header_image_pixum = pixum(250,250);	 
		 if($header_image == false){
		 $header_image = $header_image_pixum;	 
		 }
		 
      ?>
  <div id="imagepreview"><img src="<?php print $header_image; ?>"></div>
  <span id="headeruploader" class="mw-ui-btn">Upload Image</span>   <span id="removeimage" class="mw-ui-btn">Remove Image</span> <br>
  <div id="progress"></div>
  <style>
  
  #settings-container {
    font-family: Lato, sans-serif;
    color: #555566;
	overflow:visible;
	
}

      #imagepreview img{
          max-width: 100%;
      }

    </style>  
	
	<script>
	
	
	       mw.require("<?php print template_url();  ?>template_settings.css");
		     mw.require("<?php print template_url();  ?>css/fonts.css");
 </script>
  <script>

        $(document).ready(function(){
			 mw.dropdown();
			 
			 
			 
			  mw.$("#removeimage").bind("click", function(){ 
			      $("#header_image").val('').trigger('change');
				  window.top.mw.$("#bgimage").css("backgroundImage", "none");
			  });
			 
			 
			
			
			
            var up = mw.uploader({
                element:'#headeruploader',
                filetypes:"images",
                multiple:false
            });
            $(up).on('FileUploaded', function(e, data){
                mw.$("#headeruploader").show();
                mw.progress({
                     element:"#progress"
                })
                .hide();
                $("#imagepreview").html("<img src='"+data.src+"'>");
                $("#header_image").val(data.src).trigger('change');
                window.top.mw.$("#bgimage").css("backgroundImage", "url("+data.src+")");

            });
            $(up).bind('progress', function(up, file) {
                mw.$("#headeruploader").hide();
                mw.$("#mw_uploader_loading").show();
                mw.$("#upload_info").html(file.percent + "%");
                mw.progress({
                     element:"#progress"
                })
                .set(file.percent)
             });
        });

    </script>
  <input
            type="hidden"
            class="mw_option_field"
            id="header_image"
            name="header_image"
            value="<?php print $header_image; ?>"
            data-option-group="mw-template-tale"  />
  <input type="hidden" class="mw_option_field" id="font-input" name="font" value="<?php print $font; ?>" data-option-group="mw-template-tale"  />
  <hr>
  <script>
	  _body = window.parent.document.body;
	  cleanFont = function(){
        mw.$("#font_family li").each(function(){
           var val =  $(this).attr('value');
           //$(_body).removeClass(val);
		   $(_body).css('font-family','');
        });
      }
    $(document).ready(function(){
       mw.$("#font_family").bind("change", function(){
            cleanFont();
            var val = $(this).getDropdownValue();
			 
           // _body.className+=' '+val;
		    $(_body).css('font-family',val);
            mw.$("#font-input").val(val).trigger("change");
			
          });
		 });  
    </script>
  <label class="template-setting-label">Font</label>
  <div title="Template Font" id="font_family" class="mw-dropdown mw-dropdown-default body-class w100"> <span class="mw-dropdown-value"> <span class="mw-dropdown-value mw-ui-btn mw-dropdown-val w100" style="text-align: left">Select</span> </span>
    <div class="mw-dropdown-content" style="left: 0px;">
      <ul>
      <li value="Montserrat" ><a style="font-family: Montserrat" href="#">Montserrat</a></li>

       <li value="Lato" ><a style="font-family: Lato" href="#">Lato</a></li>
        <li value="Work Sans" ><a style="font-family: Work Sans" href="#">Work Sans</a></li>


        <li value="Arial" ><a style="font-family: Arial" href="#">Arial</a></li>
        <li value="Verdana" ><a style="font-family: Verdana" href="#">Verdana</a></li>
        <li value="Lato" ><a style="font-family: Lato" href="#">Lato</a></li>
        <li value="Georgia"><a style="font-family: Georgia" href="#">Georgia</a></li>
        <li value="Times New Roman"><a style="font-family: 'Times New Roman', Times, serif;" href="#">Times New Roman</a></li>
        <li value="Roboto Slab"><a style="font-family: Roboto Slab" href="#">Roboto Slab</a></li>
        <li value="Open Sans"><a style="font-family: Open Sans" href="#">Open Sans</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- /#settings-holder -->