<?php
/*
Template Name: Resources Page
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


<div class="resource-center-wrap">


<?php if( have_rows('brochures') ): ?>
<div class="resource-center-section">
<div class="resource-inner">

<h2>Pricebooks</h2>
<?php while ( have_rows('brochures') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile; ?>

</div><!--resource-inner-->
</div><!--resource-center-section-->
<?php endif; ?>
	
	

<?php if( have_rows('prod_specs') ): ?>
<div class="resource-center-section">
<div class="resource-inner">

<h2>Product Specifications</h2>
<?php while ( have_rows('prod_specs') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile;?>

</div><!--resource-inner-->
</div><!--resource-center-section-->
<?php endif; ?>




<?php if( have_rows('sales_sheet') ): ?>
<div class="resource-center-section">
<div class="resource-inner">

<h2>Sales Sheets</h2>
<?php while ( have_rows('sales_sheet') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile;?>

</div><!--resource-inner-->
</div><!--resource-center-section-->
<?php endif; ?>




<?php if( have_rows('manuels') ): ?>
<div class="resource-center-section">
<div class="resource-inner">

<h2>Manuals</h2>
<?php while ( have_rows('manuels') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile; ?>

</div><!--resource-inner-->
</div><!--resource-center-section-->
<?php endif; ?>
	

<?php if( have_rows('other') ): ?>
<div class="resource-center-section">
<div class="resource-inner">


<h2><?php if ($post->post_name == "3d-models-cad") echo "3D Models / Cad"; else echo "Other"; ?></h2>
<?php while ( have_rows('other') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> <?php echo strtoupper(substr(get_sub_field('pdf'), -3, 3)); ?></a></div>
</div><!--pdf-item-->
<?php 
endwhile; ?>

</div><!--resource-inner-->
</div><!--resource-center-section-->
<?php endif; ?>

<?php if( have_rows('ga_state') ): ?>
<div class="resource-center-section">
<div class="resource-inner">

<h2 id="ga-state">GA State</h2>
<?php while ( have_rows('ga_state') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile; ?>

</div><!--resource-inner-->
</div><!--resource-center-section-->
<?php endif; ?>
	
<?php if( have_rows('gsa-res') ): ?>
<div class="resource-center-section">
<div class="resource-inner">
<h2 id="gsa">GSA</h2>
<?php while ( have_rows('gsa-res') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile; ?>
	

</div><!--resource-inner-->
</div><!--resource-center-section-->	
<?php endif; ?>	


	
	
</div><!--resource-center-wrap-->



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
  
  <a href="https://friant.com/california/">
   <div class="btn2">
   Find a dealer
   </div>
  </a>
  
</div>
				</div> <!-- .et_pb_code_inner -->
			</div> <!-- .et_pb_code -->
			</div> <!-- .et_pb_column -->
			</div> <!-- .et_pb_row -->

</div> <!-- #main-content -->

<?php

get_footer();
