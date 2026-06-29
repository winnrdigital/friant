<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

$show_navigation = get_post_meta( get_the_ID(), '_et_pb_project_nav', true );

?>

<div id="main-content">



<!------- hero section --------->

			<div class="hero-wrap" style="background-image: url(<?php the_field('sales_hero_image', 'options'); ?>);">
            <div class="hero-inner">
            <div class="hero-content">
            <h1><?php the_field('sales_rep_title', 'options'); ?></h1>
            <h2><?php the_field('sales_rep_subtitle', 'options'); ?></h2>
            </div><!--hero-content-->
            </div><!--hero-inner-->
            </div><!--hero-wrap-->
            
          
          
<div class="sales-rep-wrap">
<h2>Search By State</h2> 
<div id="start"></div>  

<div class="sales-rep-inner">

<div class="sales-wrap-info-wrap">

<h3><?php single_post_title(); ?></h3>

<div class="sales-wrap-info-inner">

<?php
if( have_rows('sales_rep_contact') ):
 while ( have_rows('sales_rep_contact') ) : the_row(); 
 ?>
 
 
<div class="sales-wrap-info-single">
<?php if( get_sub_field('name') ): ?>
<p class="rep-name"><?php the_sub_field('name'); ?></p>
<? endif ?>
<?php if( get_sub_field('region') ): ?>
<p><i class="fas fa-map-marker-alt"></i> <?php the_sub_field('region'); ?></p>
<? endif ?>
<?php if( get_sub_field('phone') ): ?>
<p><i class="fas fa-phone"></i></i> <?php the_sub_field('phone'); ?></p>
<? endif ?>
<?php if( get_sub_field('email') ): ?>
<p><i class="fas fa-envelope"></i> <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></p>
<? endif ?>
</div>


<?php 
endwhile;
else :
    // no rows found
endif;
?>

</div><!--sales-wrap-info-inner-->
</div><!--sales-wrap-info-wrap-->




<form class="form-wrap">
<select onchange='location = this.options[this.selectedIndex].value;'>

<option> Select </option>


<?php
global $post;
$args = array( 
'posts_per_page' => -1,
'post_type' => 'reps',
'orderby' => 'title',
'order'=> 'ASC',);
$posts = get_posts($args);
foreach( $posts as $post ) : setup_postdata($post); ?>
   <option value="<?php the_permalink() ?>"><?php the_title(); ?></option>   
<?php endforeach; ?>
</select>
</form>








</div><!--sales-rep-wrap-->


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
  
  <a href="https://www.friant.com/solutions-gallery/">
    <div class="btn2">
  See solutions
    </div>
  </a>
  
</div></div>
				</div> <!-- .et_pb_code_inner -->
			</div> <!-- .et_pb_code -->
			</div> <!-- .et_pb_column -->
			</div> <!-- .et_pb_row -->
            </div>


<!--sticky product menu -->

<script type="text/javascript">
    var $s = jQuery.noConflict();
    $s(document).ready(function() {
		
    $s("html,body").scrollTop(475);
	
	  });
</script>	
    
<?php

get_footer();
