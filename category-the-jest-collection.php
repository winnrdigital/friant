<?php
get_header();
$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
$show_navigation = get_post_meta( get_the_ID(), '_et_pb_project_nav', true );
?>
<div id="main-content">
  <div class="product-menu-wrap product-tabs">
    <div class="product-menu-wrap-main">
      <div class="product-name-sec"><?php the_field('jest_hero_title', 'option'); ?></div>
      <div class="product-menu-inner">
        <a class="nav-meet-overview product-tab active" data-ids="product-overview" href="#">Overview</a>
        <a class="nav-typical product-tab" data-ids="nav-resource" href="#">Resources</a>
        <a class="nav-contact-dealer" target="_blank" href="<?php echo site_url().'/where-to-buy'; ?>">Where To Buy</a>
      </div>
    </div>
  </div>
  <div class="product-tab-content active" id="product-overview">
    <div class="meet-summery-wrap hero-section">
      <div class="meet-summery-lt hero-section-left">
        <?php
          $herotitle = get_field('jest_hero_title','option');
          echo !empty($herotitle)?'<h1>'.$herotitle.'</h1>':''; 
          $herosubtitle = get_field('jest_hero_sub_title','option');
          echo !empty($herosubtitle)?'<h2>'.$herosubtitle.'</h2>':''; 
        ?>
      </div>
      <div class="meet-summery-rt hero-section-right">
        <?php 
        $hero_imagevideo = get_field('just_hero_imagevideo','option'); 
        if($hero_imagevideo == 'video'){
          $herovideo = get_field('just_hero_video','option'); 
          if(!empty($herovideo)){
            echo '<div class="embed-container">'.$herovideo.'</div>';
          }
        }else{
          $heroimage = get_field('jest_hero_image','option'); 
          if(!empty($heroimage)){
            echo '<img src="'.$heroimage['url'].'" alt="'.$heroimage['alt'].'">';
          }
        }
        ?>
      </div>
    </div>
    <?php $cta = get_field('jest_call_to_action','option');
    $cta = $cta['call_to_action'];
      if(!empty($cta) && $cta['cta_enable'] == 1){
        $cta_items = $cta['cta_items'];
        ?>
        <div class="overview-cta">
          <div class="overview-cta-inner">
            <?php
            echo !empty($cta_items['heading']) ?'<h2>'.$cta_items['heading'].'</h2>':''; 
            echo !empty($cta_items['text']) ?$cta_items['text']:''; 
            $iconbox = $cta_items['icon_box'];
            if(!empty($iconbox)){
              echo '<div class="iconbox">';
              $i=1;
              foreach ($iconbox as $key => $value) {
                echo '<div class="iconitem">';
                if(!empty($value['link'])){
                  $linkurl = $value['link']['url'];
                  $linktarget = $value['link']['target'];
                  $linktitle = $value['link']['title'];
                }
                $qrcode = 0;
                if(!empty($value['qr_pop-up']) && $value['qr_pop-up'] == 1){
                  $qrcode = 1;
                }
                
                if(empty($value['link'])){
                  echo '<img src="'.$value['icon'].'" width="64" height="64">'; 
                }else{
                  if(!empty($value['link']) && $qrcode != 1){
                    echo '<a href="'.$value['link']['url'].'" target="'.$value['link']['target'].'" class="cat-internal-link linkcls'.$i.'"><img src="'.$value['icon'].'" width="64" height="64"></a>';
                  }else{
                    echo '<a href="'.$value['link']['url'].'" target="'.$value['link']['target'].'" class="cat-internal-link link-mobile-only linkcls'.$i.'"><img src="'.$value['icon'].'" width="64" height="64"></a>';
                    echo '<a href="#lightboxdiv" data-width="250" class="wplightbox web-link-only linkcls'.$i.'"><img src="'.$value['icon'].'" width="64" height="64"></a>';
                  }
                }

                if(!empty($value['link']) && $qrcode != 1){
                  echo '<a href="'.$value['link']['url'].'" target="'.$value['link']['target'].'" class="cat-internal-link">'.$value['link']['title'].'</a>';
                }else{
                  echo '<a href="#lightboxdiv" class="wplightbox web-link-only linkcls'.$i.'" data-width=250>'.$value['link']['title'].'</a>';
                  echo '<a href="'.$value['link']['url'].'" target="'.$value['link']['target'].'" class="cat-internal-link link-mobile-only">'.$value['link']['title'].'</a>';
                }
                if($qrcode == 1 && !empty($linkurl)){
                  echo '<div id="lightboxdiv" style="position:absolute;top:0;left:-9000px;">';
                  echo '<div class="qr-wpr">'.do_shortcode( '[kaya_qrcode content="'.$linkurl.'"]' ).'<div class="qr-content"><p>Use your phone camera to scan the qr code and open it with system\'s default browser</p></div></div>';
                  echo '</div>';
                }
                echo '</div>';
                $i++;
              }
              echo '</div>';
            }
            ?>
          </div>
        </div>
      <?php } ?>
    <div class="overview-highlights-wrap">
      <!-- <h2>Product Highlights</h2> -->
      <div class="overview-highlights-inner">
      <?php
	  $hide_shop_now = get_field('hide_shop_now','option');
      $wpb_all_query = new WP_Query(array('post_type'=>'product', 'post_status'=>'publish', 'category_name'=>'The Jest Collection', 'order' => 'ASC', 'posts_per_page'=>-1)); ?>
      <?php if ( $wpb_all_query->have_posts() ) :
        $count = $wpb_all_query->found_posts;
        $item = 1;
        while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
          <div class="overview-highlight<?php echo ($item % 2 != 0) ? ' highlight-full' : ' highlight-small';?>">
              <div class="meet-highlight-img overview-highlight-img">
                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                <img src="<?php echo $backgroundImg[0]; ?>" />
              </div>
              <div class="overview-highlight-content">
                <h3><?php echo get_the_title(); ?></h3>
                <p><?php the_field('content'); ?></p>
                <?php if( $hide_shop_now == 0 && get_field('shop_link') ): ?>
                  <a href="<?php the_field('shop_link'); ?>" target="_blank" class="product-btn">Shop Now</a>
                <?php endif; ?>
                <?php if( get_field('explore_in_ar_link') ): ?>
                  <a href="#explore_in_ar_<?php echo $item; ?>" class="wplightbox web-link-only product-btn" data-width=250>Explore in AR</a>
                  <a href="<?php the_field('explore_in_ar_link'); ?>" target="_blank" class="product-btn link-mobile-only">Explore in AR</a>
                  <?php
                  $linkurl = get_field('explore_in_ar_link');
                  echo '<div id="explore_in_ar_'.$item.'" style="position:absolute;top:0;left:-9000px;">';
                  echo '<div class="qr-wpr">'.do_shortcode( '[kaya_qrcode content="'.$linkurl.'"]' ).'<div class="qr-content"><p>Use your phone camera to scan the qr code and open it with system\'s default browser</p></div></div>';
                  echo '</div>';
                  ?>
                <?php endif ?>
              </div>
          </div><!--meet-highlight-->
        <?php $item++;
          endwhile;
          wp_reset_postdata();
        endif;
      ?>
      </div><!--meet-highlights-inner-->  
    </div>
    <?php 
    $display_image_gallery = get_field('jest_display_image_gallery','option');
    if( $display_image_gallery['display_image_gallery'] == 'on' ): ?>
      <div class="image-gallery">
        <div class="image-gallery-inner">
        <ul class="gallery-slides">
          <?php
          if($display_image_gallery['image_gallery']):
          foreach ($display_image_gallery['image_gallery'] as $key => $value) {
           $image_gallery = $value['image'];
            ?>
            <li><a href="<?php echo $image_gallery; ?>" class="wplightbox" data-group="gallery0"><img class="wplightbox" src="<?php echo $image_gallery; ?>" style="object-position: <?php $value['image_position']; ?>;"/></a></li>
            <?php  
          }
        endif;
        ?> 
        </ul>
        </div>
      </div>
    <?php endif; ?>  
  </div>
  <div class="product-tab-content" id="nav-resource">
    <div class="product-resource-wrap-main main-resource-wrap">
      <h2 class="resource_download">Download</h2>
      <div class="resource-wrap">
        <div class="resource-inner">
          <h2>Pro Resources</h2>
          <?php
          if( have_rows('jest_resources', 'option') ):
            while ( have_rows('jest_resources', 'option') ) : the_row(); ?>
              <div class="pdf-item">
              <div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
              <div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
              </div><!--pdf-item-->
            <?php 
            endwhile;
          else :
            // no rows found
          endif;
          ?>
        </div><!--resource-inner-->
      </div><!--resource-wrap-->
      <?php if( get_field('jest_manuals', 'option') ): ?>
        <div class="resource-wrap">
          <div class="resource-inner">
          <h2>Manuals</h2>
          <?php
          if( have_rows('jest_manuals', 'option') ):
            while ( have_rows('jest_manuals', 'option') ) : the_row(); ?>
            <div class="pdf-item">
              <div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
              <div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
            </div><!--pdf-item-->
          <?php 
            endwhile;
          else :
              // no rows found
          endif;
          ?>
          </div><!--resource-inner-->
        </div><!--resource-wrap-->
      <?php endif; ?>
    </div>
  </div>

<?php 
	$hide_shop_on_dealer_site = get_field('hide_shop_on_dealer_site','option');
  $cta_button = get_field('cta_button','option');
  //pr($recommended_product);
  if(!empty($cta_button) && $cta_button['enable'] == 1){      
  ?>
  <div class="overview-cta cta_buttons">
    <div class="overview-cta-inner">        
      <?php       
      echo !empty($cta_button['cta_bt_heading']) ?'<h2>'.$cta_button['cta_bt_heading'].'</h2>':''; 
      $cta_iconbox = $cta_button['buttons'];
      if(!empty($cta_iconbox)){
        echo '<div class="iconbox">';
        foreach ($cta_iconbox as $key => $value) {
			if(!empty($value['button_link']) && $value['button_link']['title'] != 'Shop on Dealer Site')
			{
				echo '<div class="iconitem">';
				echo '<img src="'.$value['button_icon'].'" width="64" height="64">';
				if(!empty($value['button_link'])){
					echo '<a href="'.$value['button_link']['url'].'" target="'.$value['button_link']['target'].'">'.$value['button_link']['title'].'</a>';
				}
				echo '</div>';
			}
			else if(!empty($value['button_link']) && $hide_shop_on_dealer_site == 0)
			{
				echo '<div class="iconitem">';
				echo '<img src="'.$value['button_icon'].'" width="64" height="64">';
				if(!empty($value['button_link'])){
					echo '<a href="'.$value['button_link']['url'].'" target="'.$value['button_link']['target'].'">'.$value['button_link']['title'].'</a>';
				}
				echo '</div>';
			}
        }
        echo '</div>';
      }?>
    </div>
  </div>
  <?php } ?>

</div><!--main-content-->


<?php

get_footer();
