<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

$show_navigation = get_post_meta( get_the_ID(), '_et_pb_project_nav', true );

?>


<!-- arrays -->

<?php $current_category = single_cat_title("", false); ?>

<!-- slug array -->
<?php
  $cat = get_category( get_query_var( 'cat' ) );
    
	$cat_slug = $cat->slug;


	$txt = "_subtxt";
	$hero_subtxt = $cat_slug . "" . $txt;
	
	$about = "_about";
	$hero_about = $cat_slug . "" . $about;
?>


<div id="main-content">


<!------- hero section --------->

			<div class="hero-wrap" style="background-image: url(<?php the_field( $cat_slug, 'option'); ?>);">
            <div class="hero-inner">
            <div class="hero-content">
            <h1><?php echo $current_category ?></h1>
            
            <h2><?php the_field($hero_subtxt, 'option'); ?></h2>
           
            </div><!--hero-content-->
            </div><!--hero-inner-->
            </div><!--hero-wrap-->
            
            
            <?php if( get_field($hero_about, 'option') ): ?>
            
<div class="main-product-wrap">

<h2><?php the_field($hero_about, 'option'); ?></h2>

</div><!--main-product-wrap-->

<?php  endif; ?>



<div class="mobile-navbar">
  <div class="mobile-dropdown">
    <button class="dropbtn">See More Products 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="mobile-dropdown-content">
      
      <div class="product-sidebar">
<?php
if(is_active_sidebar('product-archive-sidebar')){
dynamic_sidebar('product-archive-sidebar');
} ?>
</div>

<div class="seating-sidebar">
<?php
if(is_active_sidebar('seating-archive-sidebar')){
dynamic_sidebar('seating-archive-sidebar');
} ?>
</div>

    </div><!--mobile-dropdown-content-->
  </div> <!--mobile-dropdown-->
</div><!--mobile-navbar-->


<div class="product-content-wrap">      
      
     <!-- menu sidebar --> 

<div class="menu-product">

<div class="product-sidebar">
<?php
if(is_active_sidebar('product-archive-sidebar')){
dynamic_sidebar('product-archive-sidebar');
} ?>
</div>




</div>



<!-- product loop -->

<div class="product-loop-wrap">

<?php 

// the query
$wpb_all_query = new WP_Query(array('post_type'=>'product', 'post_status'=>'publish', 'category_name'=> $current_category, 'posts_per_page'=>-1)); ?>
 
<?php if ( $wpb_all_query->have_posts() ) : ?>

<?php get_the_category() ?>
<ul>
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
<li>



<?php if (in_category( 'The Hanno Collection' )) : ?>

<a href="<?php echo site_url(); ?>/category/soft-seating/the-hanno-collection/">
<?php
the_post_thumbnail( 'large' );
?>
<h3><?php the_title(); ?></h3>
</a>

<?php elseif (in_category( 'The Anza Collection' )) : ?>

<a href="<?php echo site_url(); ?>/category/soft-seating/the-anza-collection/">
<?php
the_post_thumbnail( 'large' );
?>
<h3><?php the_title(); ?></h3>
</a>

<?php elseif (in_category( 'The Jest Collection' )) : ?>

<a href="<?php echo site_url(); ?>/category/soft-seating/the-jest-collection/">
<?php
the_post_thumbnail( 'large' );
?>
<h3><?php the_title(); ?></h3>
</a>

<?php elseif (in_category( 'The Jot Collection' )) : ?>

<a href="<?php echo site_url(); ?>/category/soft-seating/the-jot-collection/">
<?php
the_post_thumbnail( 'large' );
?>
<h3><?php the_title(); ?></h3>
</a>

<?php elseif (in_category( 'The Nik Collection' )) : ?>

<a href="<?php echo site_url(); ?>/category/soft-seating/the-nik-collection/">
<?php
the_post_thumbnail( 'large' );
?>
<h3><?php the_title(); ?></h3>
</a>

<?php elseif (in_category( 'The Pog Collection' )) : ?>

<a href="<?php echo site_url(); ?>/category/soft-seating/the-pog-ii-collection/">
<?php
the_post_thumbnail( 'large' );
?>
<h3><?php the_title(); ?></h3>
</a>

<?php elseif (in_category( 'Home Office' )) : ?>

<a href="<?php echo site_url(); ?>/category/home-office/">
<?php
the_post_thumbnail( 'large' );
?>
<h3><?php the_title(); ?></h3>
</a>

<?php else : ?>

<a href="<?php the_permalink(); ?>">
<?php
the_post_thumbnail( 'large' );
?>
<h3><?php the_title(); ?></h3>
</a>

<?php endif;?>







<!--
<div class="product-tags">
<?php the_tags( 'Category ( ' , ' • ', ' )' ); ?>
</div>
-->
</li>
    <?php endwhile; ?>
    <!-- end of the loop -->
 
</ul>




    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p style="text-align: center;"><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

</div><!--product-loop-wrap-->


</div><!--product-content-wrap-->





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

</div><!--main-content-->


<?php

get_footer();
