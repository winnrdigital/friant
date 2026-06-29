<?php
/*
Template Name: Solutions Gallery Page
*/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() ); ?>



<div id="main-content">

<!------- hero section --------->

			<div class="hero-wrap" style="background-image: url(<?php the_field('hero_image'); ?>);">
            <div class="hero-inner">
            <div class="hero-content">
            <h1><?php the_field('hero_title'); ?></h1>
            </div><!--hero-content-->
            </div><!--hero-inner-->
            </div><!--hero-wrap-->




<!------- content --------->


<div class="gallery-menu">



<form class="form-wrap">
<select onchange='location = this.options[this.selectedIndex].value;'>

<option> All </option>


<?php

// check if the repeater field has rows of data
if( have_rows('gallery_menu') ):

 	// loop through the rows of data
    while ( have_rows('gallery_menu') ) : the_row();
?>
        

   <option value="<?php the_permalink() ?>"><?php the_sub_field('menu_item'); ?></option>   

<?php
endwhile;
endif;

?>

</select>
</form>






</div><!--gallery-menu-->



<div class="gallery-wrap">





</div><!--gallery-wrap-->



<!------------- footer ---------------->

<div class="et_pb_row et_pb_row_0">
				<div class="et_pb_column et_pb_column_4_4 et_pb_column_0    et_pb_css_mix_blend_mode_passthrough et-last-child">
				
				
				<div class="et_pb_module et_pb_code et_pb_code_0">
				
				
				<div class="et_pb_code_inner">
					<div class="workstyles">
  <h2>
    all workstyles welcome
  </h2>
  <p>
    Create a workplace that positions you for success. Collaborators can work together. And focus when they must. Standers can stand and sitters sit. Individual contributors feel empowered. Executives feel well served. 
  </p> 
  
  <div class="btn2">
  Find a dealer
  </div>
  
</div>
				</div> <!-- .et_pb_code_inner -->
			</div> <!-- .et_pb_code -->
			</div> <!-- .et_pb_column -->
			</div> <!-- .et_pb_row -->

</div> <!-- #main-content -->

<?php

get_footer();
