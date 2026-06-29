<?php

/** case goods archive template **/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

$show_navigation = get_post_meta( get_the_ID(), '_et_pb_project_nav', true );

?>


<div id="main-content">


<!------- hero section --------->

			<div class="hero-wrap" style="background-image: url(<?php the_field('case_goods_hero_image', 'option'); ?>);">
            <div class="hero-inner">
            <div class="hero-content">
            <h1><?php the_field('case_goods_hero_title', 'option'); ?></h1>
            <h2><?php the_field('case_goods_hero_subtext', 'option'); ?></h2>
            </div><!--hero-content-->
            </div><!--hero-inner-->
            </div><!--hero-wrap-->
            
            
            
            
<div class="main-product-wrap">

<h2><?php the_field('case_goods_about_text', 'option'); ?></h2>

</div><!--main-product-wrap-->



<!-- product loop -->

<div class="product-loop-wrap">
<?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'product', 'post_status'=>'publish', 'category_name'=>'casegoods', 'posts_per_page'=>-1)); ?>
 
<?php if ( $wpb_all_query->have_posts() ) : ?>
 
<ul>
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
<li>
<a href="<?php the_permalink(); ?>">
<?php
the_post_thumbnail( 'large' );
?>
        <h3><?php the_title(); ?></h3>
</a>
</li>
    <?php endwhile; ?>
    <!-- end of the loop -->
 
</ul>


    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

</div><!--product-loop-wrap-->





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

</div><!--main-content-->


<?php

get_footer();
