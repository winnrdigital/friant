<?php
get_header();
$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
$show_navigation = get_post_meta( get_the_ID(), '_et_pb_project_nav', true );
?>
<div id="main-content">
	<div class="back-link-wpr">
		<a href="<?php echo site_url(); ?>/solutions-gallery/" class="back-to-solution">< Back</a>
		<a href="#" class="solutions-gallery-label">Solutions Gallery</a>
	</div>
  <!--gallery -->

	<?php 
	if(get_field('display_visual_sales_gallery') == 'on'): ?>
		<div class="solution-banner">
			
			<div class="flexslider solutions-gallery-slider animated fadeIn duration1 eds-on-scroll">
				<div class="img-title">
					<?php $gallerytitle = get_field('gallery_title'); ?>
			      <h2><?php echo !empty($gallerytitle)?$gallerytitle:get_the_title(); ?></h2>
				</div>
				<ul class="slides">
					<?php 
					if ( have_posts() ) :
						$slideNumber = 1;
						$nodeNumber = 1;
						$contentNumber = 1;
						while ( have_posts() ) : the_post(); ?>
							<?php if( have_rows('visual_sales_gallery') ): ?>
								<?php while ( have_rows('visual_sales_gallery') ) : the_row(); 
									$attchmentid = get_sub_field('background_image');
									$background_image_url = wp_get_attachment_image_src($attchmentid,'visual-gallery-images');
									?>
									<li data-thumb="<?php echo $background_image_url[0]; ?>" class="visual-specs-wrap visual-slide<?php echo $slideNumber++; ?>" style="background-image:url(<?php echo $background_image_url[0] ?>);">
										<?php while ( have_rows('node') ) : the_row(); ?>
										<div class="visual-box-section" style="top: <?php the_sub_field('node_y_axis'); ?>%; left: <?php the_sub_field('node_x_axis'); ?>%">
											<?php $viclass = get_sub_field('pop-up_position'); ?>
											<div class="<?php echo !empty($viclass)?$viclass:'below'; ?> visual-content-box-new visual-specs-content visual-content<?php echo $contentNumber++; ?>">
												<?php $productlink = get_sub_field('product_link');
												$productimage = get_sub_field('product_image'); ?>
												<i class="fa fa-times-circle" aria-hidden="true"></i>
												<a href="<?php echo !empty($productlink)?$productlink['url']:'#' ?>" target="_blank" class="seat-product-link">
												<img src="<?php echo $productimage; ?>" alt="<?php the_sub_field('title'); ?>">
												<div class="specs-dash"></div>
												<h2><?php the_sub_field('title'); ?></h2>						
												<p><?php the_sub_field('content'); ?></p>
												</a>
											</div>
											<!--seating-specs-content-->
											<div class="node node<?php echo $nodeNumber++; ?>"><!-- <img src="https://winnr.digital/friant/wp-content/uploads/2019/10/node2.png" /> --><span><i class="fa fa-plus" aria-hidden="true"></i></span>

											</div>
										</div> 
											<?php
										endwhile; ?>
									</li>
									<?php
								endwhile;
								?>
								<?php
							endif; ?>					
							<?php
						endwhile;
					endif; ?>
				</ul>
			</div><!--flexslider-->

			<?php
			global $post;
			$terms = wp_get_post_terms( $post->ID, 'project_category');
			$cat_ids = array();
			if(!empty($terms) && count($terms) > 0){
				foreach ($terms as $key => $value) {
					$cat_ids[] = $value->term_id;
				}
			}
			$current_post_type = get_post_type( $post->ID );

			$args = array(
			    'post_type' => $current_post_type,
			    'posts_per_page' => '4',
			    'tax_query' => array(
			        array (
			            'taxonomy' => 'project_category',
			            'field' => 'term_id',
			            'terms' => $cat_ids,
			        )
			    ),
			    'post__not_in' => array($post->ID)
			);
			$query = new WP_Query( $args );			 
			if ( $query->have_posts() ) { ?>
			    <aside class="related-posts">
			    	<ol class="flex-control-thumbs">
					<?php
					while ( $query->have_posts() ) {
						$query->the_post(); 
						$visualgall = get_field('visual_sales_gallery',get_the_ID());
						if(!empty($visualgall)){
							$backgroundimage = $visualgall[0]['background_image'];
							$background_image_url = wp_get_attachment_image_src($backgroundimage,array(240*120));
						}
						?>
						<li>
							<a href="<?php the_permalink(); ?>"><img src="<?php echo $background_image_url[0]; ?>"></a>
						</li>
					<?php } ?>
 					</ol>
				</aside>
			<?php } 
			wp_reset_postdata();
			?>
		</div>
		<?php endif; ?>
		<?php 
		$recommended_product = get_field('product_image_gallery');
		//pr($recommended_product);
		if(!empty($recommended_product) && $recommended_product['enable'] == 1){
		?>
			<!---- START Recommended-section HTML ----->
			<div class="solution-products-section">
				<div class="recommended-section solution-products">
					<div class="heading-section">
						<?php echo (!empty($recommended_product['heading'])?'<h2>'.$recommended_product['heading'].'</h2>':''); ?>					
					</div>
					<?php 
					if(!empty($recommended_product['product_items'])){
						$upload_dir   = wp_upload_dir();
						$count = 1;
						foreach ($recommended_product['product_items'] as $postitem) {
							if ($count%3 == 1){
								echo '<div class="product-section">';
							}
							//setup_postdata( $post );
							echo '<div class="product-column">';
							echo '<div class="img-sec">';
							$featured_img_url = get_the_post_thumbnail_url($postitem,'full'); 
							$product_title = get_the_title($postitem);
							$product_link = get_permalink($postitem); 
							//echo '<a href="'.(!empty($featured_img_url)?$featured_img_url['url']:$upload_dir['baseurl'].'/2019/06/Systems-2-hero-2.jpg').'" class="wplightbox" data-group="gallery0" title="'.$product_title.'">';
							echo '<a href="'.(!empty($product_link)?$product_link:'#').'" class="wplightbox1" data-group="gallery0" title="'.$product_title.'">';
							echo '<img src="'.(!empty($featured_img_url)?$featured_img_url:$upload_dir['baseurl'].'/2019/06/Systems-2-hero-2.jpg').'">';
							echo '</a>';
							echo '</div>';
							echo '<div class="content-sec">';
							echo '<h3>'.$product_title.'</h3>';
							echo '</div>';
							echo '</div>';
							if ($count%3 == 0){
				        echo "</div>";
				    	}
				    	$count++;
						}
						if ($count%3 != 1) echo "</div>";
					}
					?>				
				</div>
			</div>
			<!---- END Recommended-section HTML ----->
			<?php } ?>		
	<?php 
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
          echo '<div class="iconitem">';
          echo '<img src="'.$value['button_icon'].'" width="64" height="64">';
          if(!empty($value['button_link'])){
            echo '<a href="'.$value['button_link']['url'].'" target="'.$value['button_link']['target'].'">'.$value['button_link']['title'].'</a>';
            }
          echo '</div>';
        }
        echo '</div>';
      }?>
    </div>
  </div>
  <?php } ?>

</div> <!-- #main-content -->
<?php
get_footer();
