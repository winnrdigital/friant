<?php
/*
Template Name: Accessories Page
*/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() ); ?>


<div class="hero-wrap" style="background-image: url(<?php the_field('hero_image'); ?>);">
            <div class="hero-inner">
            <div class="hero-content">
            <h1><?php the_field('hero_title'); ?></h1>
            <h2><?php the_field('hero_sub'); ?></h2>
            </div><!--hero-content-->
            </div><!--hero-inner-->
            </div><!--hero-wrap-->

 

 <?php 
if ( have_posts() ) :
    $slideNumber = 1;
	$contentNumber = 1;
	$imgNumber = 1;
	$nameNumber = 1;
    while ( have_posts() ) : the_post(); ?>
    
<div class="masonry masonry--h">


<?php if( have_rows('accessories') ): ?>

<?php while ( have_rows('accessories') ) : the_row(); ?>


<?php if( get_row_layout() == 'accessories_title' ): ?>

<span id="<?php the_sub_field('scroll_id'); ?>"></span>

<div class="accessory-title"><?php the_sub_field('title'); ?></div>

<?php elseif( get_row_layout() == 'accessories' ):  ?>



<figure class="masonry-brick masonry-brick--h masonry-brick--h<?php echo $slideNumber++; ?>">

<div class="acc-name acc-name<?php echo $nameNumber++; ?>">
  <h3><?php the_sub_field('product_name'); ?></h3>
  <div class="product-btn product-btn<?php echo $contentNumber++; ?>">More Info</div>
  </div><!--acc-name-->
  
<img src="<?php the_sub_field('image'); ?>" class="masonry-img masonry-img<?php echo $imgNumber++; ?>" />


<div class="acc-product-wrap">
   <div class="acc-product-info-wrap">
   <div class="acc-product-info">
   <div class="acc-close"><i class="fa fa-times" aria-hidden="true"></i></div>
   <h3><?php the_sub_field('product_name'); ?></h3>
<?php the_sub_field('product_info'); ?>
</div><!--acc-product-info-->
   </div><!--acc-product-info-wrap-->
 </div><!--acc-product-wrap-->
  </figure>

<?php 
endif;

	?>
    
<?php
    endwhile;
endif; ?>
 
  </div><!--masonry masonry--h-->
 
<?php
    endwhile;
endif; ?>




<?php

get_footer();
