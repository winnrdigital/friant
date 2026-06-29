<?php
/*
Template Name: Email Gallery
*/

get_header();
wp_enqueue_style( 'email-gallery-style', get_stylesheet_directory_uri() . '/css/email-gallery.css', [], rand(0,999) );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() ); ?>

<div class="hero-wrap" style="background-image: url(<?php the_field('hero_image'); ?>);">
  <div class="hero-inner">
    <div class="hero-content">
      <h1><?php the_field('hero_title'); ?></h1>
      <h2><?php the_field('hero_sub'); ?></h2>
      <a href="https://friant.com/idealab-contact" class="btn">Design With Us</a>
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

<div style="padding-top:25px;"></div>
<div class="masonry masonry--h">


<?php if( have_rows('accessories') ): ?>

<?php while ( have_rows('accessories') ) : the_row(); ?>


<?php if( get_row_layout() == 'accessories_title' ): ?>

<span id="<?php the_sub_field('scroll_id'); ?>"></span>

<div class="accessory-title"><?php the_sub_field('title'); ?></div>

<?php elseif( get_row_layout() == 'accessories' ):  ?>

  <figure class="masonry-brick masonry-brick--h masonry-brick--h<?php echo $slideNumber++; ?> seating-brick">
    <a href="<?php the_sub_field('image'); ?>" class="fancybox"  rel="mygallery"><img src="<?php the_sub_field('image'); ?>" class="masonry-img masonry-img<?php echo $imgNumber++; ?>" /></a>
  </figure>

<?php endif;?>
    
<?php
    endwhile;
endif; ?>
 
  </div><!--masonry masonry--h-->
 
<?php
    endwhile;
endif; ?>




<?php

get_footer();
