<?php
/*
Template Name: Home Page
*/

get_header();

?>

 

<div class="desktop-hero">
<?php if( have_rows('hero_gallery') ): ?>
<div class="flexslider2">
<ul class="slides">

<?php while ( have_rows('hero_gallery') ) : the_row(); ?>
<li class="hero-sec">


	<?php if( get_sub_field('hero_title') ): ?>
<div class="hero-content-wrap">
<div class="hero-content-inner">

<div class="hero-content" style="color: <?php the_sub_field('text_color'); ?>;top: <?php the_sub_field('vertical_content_position'); ?>%";>
<span><?php the_sub_field('hero_title'); ?></span><?php the_sub_field('hero_sub_title'); ?>

<div class="cta-btn-wrap">
<a href="<?php the_sub_field('hero_link'); ?>"class="cta-btn"><?php the_sub_field('hero_button'); ?></a>
</div><!--cta-btn-wrap-->

</div><!--hero-content-->





</div><!--hero-content-inner-->
</div><!--hero-content-wrap-->
	<?php
endif; ?>

<div class="fullscreen-bg">
    <video loop muted autoplay poster="<?php the_sub_field('hero_image'); ?>" class="bg_video">
        <source src="<?php the_sub_field('video_link_webm'); ?>" type="video/webm">
//         <source src="<?php the_sub_field('video_link_mp4'); ?>" type="video/mp4">
        <source src="<?php the_sub_field('video_link_ogg'); ?>" type="video/ogg">
    </video>
</div>



</li>

  <?php
  endwhile;
  ?>
  
  <?php
endif; ?>
</ul>
</div><!--flexslider-->
</div><!--desktop-hero-->






<div class="mobile-hero">
<?php if( have_rows('hero_gallery') ): ?>
<div class="flexslider2">
<ul class="slides">

<?php while ( have_rows('hero_gallery') ) : the_row(); ?>
<li class="hero-sec">
<div class="mobile-bg">

<?php
$video_link_mp4 = get_sub_field('video_link_mp4'); 
if(!empty($video_link_mp4) && $video_link_mp4 != ''){ ?>
<!-- <a href="<?php the_sub_field('video_link_mp4'); ?>" class="wplightbox" data-width=960 data-height=544><i class="fa fa-play" aria-hidden="true"></i></a> -->
	<video playsinline loop muted autoplay poster="<?php the_sub_field('hero_image'); ?>" class="bg_video">
	 <source src="<?php the_sub_field('video_link_mp4'); ?>" type="video/mp4">
    </video>
<?php } ?>

<img src="<?php the_sub_field('hero_image'); ?>" /></div>

	<?php if( get_sub_field('hero_title') ): ?>
<div class="hero-content-wrap">
<div class="hero-content-inner">

<div class="hero-content">
<span><?php the_sub_field('hero_title'); ?></span><?php the_sub_field('hero_sub_title'); ?>
</div>

<div class="cta-btn-wrap";>
<a href="<?php the_sub_field('hero_link'); ?>"class="cta-btn"><?php the_sub_field('hero_button'); ?></a>
</div>


</div>
</div>
	<?php
endif; ?>
</li>

  <?php
  endwhile;
  ?>
  
  <?php
endif; ?>
</ul>
</div><!--flexslider-->
</div><!--mobile-hero-->





<?php if( get_field('display_visual_sales_gallery') == 'on' ): ?>
<?php 
if ( have_posts() ) :
    $slideNumber = 1;
	$nodeNumber = 1;
	$contentNumber = 1;
    while ( have_posts() ) : the_post(); ?>
    
<?php if( have_rows('visual_sales_gallery') ): ?>
<div class="flexslider animated fadeIn duration1 eds-on-scroll">
<ul class="slides">
<?php while ( have_rows('visual_sales_gallery') ) : the_row(); ?>
<li class="visual-specs-wrap visual-slide<?php echo $slideNumber++; ?>" style="background-image:url(<?php the_sub_field('background_image'); ?>);">


<?php while ( have_rows('node') ) : the_row(); ?>
<div class="visual-specs-content visual-content<?php echo $contentNumber++; ?>">
<i class="fa fa-times-circle" aria-hidden="true"></i>
<b><?php wp_title(); ?></b>
<h2>I can be <?php the_sub_field('title'); ?></h2>
<div class="specs-dash"></div>
<p><?php the_sub_field('content'); ?></p> 

<a href="<?php the_sub_field('product_link'); ?>" class="seat-product-link">Click here to view product page.</a>

</div><!--seating-specs-content-->


<div class="node node<?php echo $nodeNumber++; ?>" style="top: <?php the_sub_field('node_y_axis'); ?>%; left: <?php the_sub_field('node_x_axis'); ?>%"><img src="https://winnr.digital/friant/wp-content/uploads/2019/10/node2.png" /></div>

 <?php


  endwhile; ?>
  </li>

  <?php
  endwhile;
  ?>
  
  <?php
endif; ?>
</ul>
</div><!--flexslider-->
<?php
    endwhile;
endif; ?>
		<?php
endif; ?>		



<div style="display: none;">
  <div class="new-collection-section" style="margin-bottom:10px;">
    <div class="inner-section">
      <h2>The Jest Collection</h2>
      <p>Premium comfort and morden design</p>
      <img src="https://cdn.shortpixel.ai/client/q_glossy,ret_img/https://winnr.digital/friant/wp-content/uploads/2020/11/chair.png">
      <div class="btn">
        <a href="https://friant.com/category/soft-seating/the-jest-collection/">Explore Now</a>
      </div>
    </div>
     <div class="inner-section">
      <h2>5 Days Shipping</h2>
      <p>Premium comfort and morden design</p>
      <img src="https://cdn.shortpixel.ai/client/q_glossy,ret_img/https://winnr.digital/friant/wp-content/uploads/2020/11/table.png">
      <div class="btn">
        <a href="#">Explore Now</a>
      </div>
    </div>
  </div>

  <div class="new-collection-section" style="margin-top:15px;">
    <div class="inner-section">
      <h2>COVID-19 Solutions</h2>
      <p>With our Shield collection of privacy screens and panels, employess can feel comfortable while they work.</p>
      <img src="https://winnr.digital/friant/wp-content/uploads/2020/11/covid-img.jpg">
      <div class="btn">
        <a href="#">Explore Now</a>
      </div>
    </div>
  </div>

</div>

<?php
  $display_product_row = get_field("display_product_row");

  if($display_product_row == 'yes'):
?>
<div class="product-row">

<?php if( have_rows('product_row') ): ?>

<?php while ( have_rows('product_row') ) : the_row(); ?>


<div class="product-single">
<a href="<?php the_sub_field('product_link'); ?>">
<img src="<?php the_sub_field('product_image'); ?>" />
</a>
<div class="product-content animated fadeInLeft duration1 eds-on-scroll">
<h2><?php the_sub_field('product_title'); ?></h2>
<p><?php the_sub_field('product_content'); ?></p>
</div>
</div>


<?php
  endwhile;
  ?>
  
  <?php
endif; ?>

</div>
<?php endif; // display row end?>

<?php //if(!is_home() && !is_front_page()): //temp condition ?>
<?php 
if( have_rows('category_row') ): 
?>
<div class="new-product-section">

 <?php
    while ( have_rows('category_row') ) : the_row();
	$category_image = get_sub_field('category_image');
	?>
    <div class="new-product-list">
      <div class="img">
        <a href="<?php the_sub_field('category_link'); ?>">
		  <?php echo wp_get_attachment_image( $category_image['ID'], 'et-pb-post-main-image' ); ?>
          <?php /* ?><img src="<?php the_sub_field('category_image'); ?>" /><?php */ ?>
        </a>
      </div>
      <div class="content">
        <h3><?php the_sub_field('category_title'); ?></h3>
        <p><?php the_sub_field('category_content'); ?></p>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
<?php endif; ?>

<?php
  $display_burb = get_field("display_burb");

  if($display_burb == 'yes'):
    if(get_field('burb')){
?>
  
<div class="home-mess new-home-mess eds-on-scroll eds-scroll-visible animated fadeIn duration1">
  <h2><?php the_field('burb'); ?></h2>
  <div class="home-sep"></div>
</div>
<?php 
  }
endif; ?>


<?php
  //Two column layout
// Check value exists.
if( have_rows('flex_column_section') ): ?>

<?php
    // Loop through rows.
    while ( have_rows('flex_column_section') ) : the_row();

        // Case: two_column_product_section.
        if( get_row_layout() == 'two_column_product_section' ){

           $display_two_column_product_section = get_sub_field("display_two_column_product_section");
          if($display_two_column_product_section == 'yes'){
            

          $title1 = get_sub_field('product_title_1');
          $subtitle1 = get_sub_field('product_subtitle_1');
          $image1 = get_sub_field('image_1');
          $link1 = get_sub_field('button_1');

          $title2 = get_sub_field('product_title_2');
          $subtitle2 = get_sub_field('product_subtitle_2');
          $image2 = get_sub_field('image_2');
          $link2 = get_sub_field('button_2');
          
        ?>
		 
		 
        <div class="new-collection-section">
          <?php if(!empty($title1) || !empty($subtitle1) || !empty($image1) || !empty($link1)):?>
          <div class="inner-section">
            <?php if(!empty($title1)): ?>
              <h2><?php echo $title1; ?></h2>
            <?php endif;
               if(!empty($subtitle1)) :?>
              <p><?php echo $subtitle1; ?></p>
            <?php 
            endif;
            if(!empty($image1)):
              echo wp_get_attachment_image( $image1['ID'], 'full' ); 
            endif;
            ?>
            <?php
              if( $link1 ): 
                $link_url1 = $link1['url'];
                $link_title1 = $link1['title'];
                $link_target1 = $link1['target'] ? $link1['target'] : '_self';
              if($link_title1 !=""){
            ?>
            <div class="btn">
                  <a href="<?php echo esc_url( $link_url1 ); ?>" target="<?php echo esc_attr( $link_target1 ); ?>"><?php echo esc_html( $link_title1 ); ?></a>
            </div>
            <?php  }
            endif; ?>
          </div>
         <?php
          endif;
            if(!empty($title2) || !empty($subtitle2) || !empty($image2) || !empty($link2)):
         ?> 
        <div class="inner-section">
          <?php if(!empty($title2)): ?>
            <h2><?php echo $title2; ?></h2>
          <?php endif;
             if(!empty($subtitle2)) :?>
            <p><?php echo $subtitle2; ?></p>
          <?php 
          endif;
          if(!empty($image2)):
            echo wp_get_attachment_image( $image2['ID'], 'full' ); 
          endif;
          ?>
          <?php
            if( $link2 ): 
              $link_url2 = $link2['url'];
              $link_title2 = $link2['title'];
              $link_target2 = $link2['target'] ? $link2['target'] : '_self';
                if($link_title2 !=""):
            ?>
          <div class="btn">
                <a href="<?php echo esc_url( $link_url2 ); ?>" target="<?php echo esc_attr( $link_target2 ); ?>"><?php echo esc_html( $link_title2 ); ?></a>
          </div>
          <?php
              endif;
           endif; ?>
        </div>
      <?php endif;  ?>
        </div>
        <?php
        }//end display 
      }  // End Case: two_column_product_section.
       
       // Case: hero_section.
        if( get_row_layout() == 'hero_section' ){
          $display_hero_section = get_sub_field("display_hero_section");
          if($display_hero_section == 'yes'){
            
          $title = get_sub_field('title');
          $description = get_sub_field('description');
          $image = get_sub_field('image');
		  $link5 = get_sub_field('link');
		  $link_url5 = $link5['url'];
        ?>
        <div class="new-collection-section single-collection">
           <div class="inner-section">
             <?php if(!empty($title)): ?>
              <h2><?php echo $title; ?></h2>
              <?php endif;?>
              <?php if(!empty($description)) :?>
                <p><?php echo $description; ?></p>
              <?php endif;
                 if(!empty($image)):
                  echo wp_get_attachment_image( $image['ID'], 'full' ); 
                endif;
              ?>
			   
			  <?php if(!empty($link5)): ?>
				<div class="btn"><a href="<?php echo $link5['url']; ?>"><?php the_sub_field('cta_button'); ?></a></div>
              <?php endif;?>
			  
            </div>
        </div>
        <?php
          }// end display
        } // end hero_section
         // Case: your_needs_section.
        if( get_row_layout() == 'your_needs_section' ){
           $display_blog_section = get_sub_field("display_blog_section");
          if($display_blog_section == 'yes'){
        ?>
        <div class="dark-bg">
          <div class="heading">
            <h2>Here For Your Needs</h2>
          </div>
          <?php
            if( get_sub_field('blog_section') ):
          ?>
          <div class="new-product-section">
            <?php
              while( has_sub_field('blog_section') ):
                $title = get_sub_field('titlte');
                $description = get_sub_field('description');
                $image = get_sub_field('image');
				$link6 = get_sub_field('link');
            ?>

            <div class="new-product-list">
              <?php
                if(!empty($image)){
              ?>
              <div class="img">
                  <a href="<?php echo $link6['url']; ?>"><?php
                    echo wp_get_attachment_image( $image['ID'], 'et-pb-post-main-image' ); 
                  ?></a>
              </div>
            <?php } ?>
              <div class="content">
                <?php if(!empty($title)): ?>
                  <h3><a href="<?php echo $link6['url']; ?>"><?php echo $title; ?></a></h3>
                <?php endif;?>
                <?php if(!empty($description)) :?>
                <p><?php echo $description; ?></p>
              <?php endif; ?>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
		<div class="new-product-section">
			<a href="wp-content/uploads/2025/09/Sustainability_That_Works.pdf">
				<img src="http://friant.com/wp-content/uploads/2025/10/logo-3-certifications.avif" align="center" style="height: 110px; border: none;"/>
			</a>
		</div>
         <?php endif;?>
        </div>

        <?php
          } // end display
        }// end your_needs_section

         // Case: fullwidth_hero_section.
        if( get_row_layout() == 'fullwidth_hero_section' ){
          $display_fullwidth_hero_section = get_sub_field("display_fullwidth_hero_section");
          if($display_fullwidth_hero_section == 'yes'){
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');
            $image = get_sub_field('image');
            $link = get_sub_field('link');
             $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
         <a href="<?php echo $link['url']; ?>" target="<?php echo $link_target;?>">
          <div class="home-banner">
            <?php if($title):?>
              <h1><?php echo $title; ?></h1>
            <?php endif; ?>
            <?php if($subtitle):?>
              <h3><?php echo $subtitle; ?></h3>
            <?php endif; 
              if(!empty($image)):
                  echo wp_get_attachment_image( $image['ID'], 'full' ); 
                endif;
              ?>
        </div><!--home-banner-->
        </a> 
       <?php 
          } // end display
        } //end fullwidth_hero_section
    endwhile; // end loop
?>
<?php endif;?>


<?php ///endif; //temp condtion end?>

<div style="display: none;">
<div class="dark-bg">
  <div class="heading">
    <h2>Here For Your Needs</h2>
  </div>
  <div class="new-product-section">
    
    <div class="new-product-list">
      <div class="img">
        <img src="https://cdn.shortpixel.ai/client/q_glossy,ret_img/https://winnr.digital/friant/wp-content/uploads/2020/11/home.png">
      </div>
      <div class="content">
        <h3>Keep Employees Safe</h3>
        <p>With our Shield collection of privacy screens and panels, employess can feel confortable while they work.</p>
      </div>
    </div>
    <div class="new-product-list">
      <div class="img">
        <img src="https://cdn.shortpixel.ai/client/q_glossy,ret_img/https://winnr.digital/friant/wp-content/uploads/2020/11/home-o.png">
      </div>
      <div class="content">
        <h3>Keep Employees Safe</h3>
        <p>With our Shield collection of privacy screens and panels, employess can feel confortable while they work.</p>
      </div>
    </div>
    <div class="new-product-list">
      <div class="img">
        <img src="https://cdn.shortpixel.ai/client/q_glossy,ret_img/https://winnr.digital/friant/wp-content/uploads/2020/11/home-r.png">
      </div>
      <div class="content">
        <h3>Keep Employees Safe</h3>
        <p>With our Shield collection of privacy screens and panels, employess can feel confortable while they work.</p>
      </div>
    </div>
  </div>
</div>

<div class="new-collection-section">
  <div class="inner-section">
    <h2>Task Seating</h2>
    <p>Seating that works for you</p>
    <img src="https://winnr.digital/friant/wp-content/uploads/2020/11/Task-Seating-Image-1.jpg">
    <div class="btn">
      <a href="https://winnr.digital/friant/category/office-seating/task-seating/">Explore Now</a>
    </div>
  </div>
   <div class="inner-section">
    <h2>Panel Systems</h2>
    <p>Reimagine the modern workplace</p>
    <img src="https://winnr.digital/friant/wp-content/uploads/2020/11/Interra-Square-Image-1.jpg">
    <div class="btn">
      <a href="#">Explore Now</a>
    </div>
  </div>
</div>

<a href="https://www.friant.com/category/quickship/">
<div class="home-banner">
<h1>10-Day Quickship</h1>
<h3>Click to Browse Available Products</h3>
<img src="https://www.friant.com/wp-content/uploads/2020/04/quickship-banner.png" />
</div><!--home-banner-->
</a>
</div>
<script type="text/javascript">
    var $t = jQuery.noConflict();
    $t(document).ready(function() {
$t(window).load(function() {
  // The slider being synced must be initialized first
  $t('.flexslider2').flexslider({
      animation: "slide",
	controlNav: false,
	slideshowSpeed: 5000,
	directionNav: true,
	pauseOnHover: true,
  });
});
});
</script>


<?php

get_footer();
