<?php
get_header();
$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
$show_navigation = get_post_meta( get_the_ID(), '_et_pb_project_nav', true );

?>
<div id="main-content">
		<?php
	if(have_rows('product_single_page_sections')):
		while( have_rows('product_single_page_sections') ): the_row();
			get_template_part( 'components/flex', get_row_layout());
// 			get_template_part( 'components/flex', 'product_meet_reedispace' );
		endwhile;	
	endif;
	?>
	<div class="product-menu-wrap product-tabs">
		<div class="product-menu-wrap-main">
			<div class="product-name-sec"><?php echo get_the_title(); ?></div>
			<div class="product-menu-inner">
				<?php if( get_field('meet_tab') == 'on' ): ?>
					<a class="nav-meet-overview product-tab active" data-ids="product-overview" href="#"><?php the_field('tab_title'); ?></a>
				<?php endif; ?>
				<?php if( get_field('details_tab') == 'on' ): ?>
					<a class="product-details product-tab details_cta_top" data-ids="product-details" href="#">Details</a>
				<?php endif; ?>
				<?php if( get_field('resources_tab') == 'on' ): ?>
				    <a class="nav-typical product-tab resources_cta_top" data-ids="nav-resource" href="#">Resources</a>
				<?php endif; ?>    
				<a class="nav-contact-dealer buy_cta_bottom" target="_blank" href="<?php echo site_url().'/where-to-buy'; ?>">Where To Buy</a>
			</div>
		</div>
	</div>
	<?php if( get_field('meet_tab') == 'on' ): ?>
		<div class="product-tab-content active" id="product-overview">
			<div class="meet-summery-wrap hero-section">
				<div class="meet-summery-lt hero-section-left">
					<?php
						$herotitle = get_field('title');
						echo !empty($herotitle)?'<h1>'.$herotitle.'</h1>':''; 
						$herosubtitle = get_field('sub_title');
						echo !empty($herosubtitle)?'<h2>'.$herosubtitle.'</h2>':''; 
					?>
				</div>
				<div class="meet-summery-rt hero-section-right">
					<?php 
					$hero_imagevideo = get_field('hero_imagevideo'); 
					if($hero_imagevideo == 'video'){
						$herovideo = get_field('hero_video'); 
						if(!empty($herovideo)){
							echo '<div class="embed-container">'.$herovideo.'</div>';
						}
					}else{
						$heroimage = get_field('hero'); 
						if(!empty($heroimage)){
							echo '<img src="'.$heroimage['url'].'" alt="'.$heroimage['alt'].'">';
						}
					}
					?>
				</div>
			</div>
			
			<div class="three-d-viewer-coohom">
					 <?php echo get_field('coohom_iframe_code_here'); ?>
		    </div>
			
			<?php $cta = get_field('call_to_action'); 
			if(!empty($cta) && $cta['cta_enable'] == 1){
				$cta_items = $cta['cta_items'];
				?>
				
			<div class="overview-cta">
    <div class="overview-cta-inner">
        <?php
        echo !empty($cta_items['heading']) ? '<h2>' . $cta_items['heading'] . '</h2>' : ''; 
        echo !empty($cta_items['text']) ? $cta_items['text'] : ''; 
        $iconbox = $cta_items['icon_box'];
        if (!empty($iconbox)) {
            echo '<div class="iconbox">';
            $i = 1;
            foreach ($iconbox as $key => $value) {
                // Set class based on the link title
                $custom_class = '';
                if (!empty($value['link'])) {
                    $link_title = $value['link']['title'];
                    // Assign class based on title
                    if ($link_title == 'Details') {
                        $custom_class = 'details_cta_top';
                    } elseif ($link_title == 'Explore in Real Time!') {
                        $custom_class = 'real_time_cta_top';
                    } elseif ($link_title == 'Resources') {
                        $custom_class = 'resources_cta_top';
                    }
                }

                echo '<div class="iconitem ' . $custom_class . '">'; // Add the class here
                
                if (!empty($value['link'])) {
                    $linkurl = $value['link']['url'];
                    $linktarget = $value['link']['target'];
                    $linktitle = $value['link']['title'];
                }

                $qrcode = 0;
                if (!empty($value['qr_pop-up']) && $value['qr_pop-up'] == 1) {
                    $qrcode = 1;
                }

                if (empty($value['link'])) {
                    echo '<img src="' . $value['icon'] . '" width="64" height="64">';    
                } else {
                    if (!empty($value['link']) && $qrcode != 1) {
                        echo '<a href="' . $value['link']['url'] . '" target="' . $value['link']['target'] . '" class="cat-internal-link linkcls' . $i . '"><img src="' . $value['icon'] . '" width="64" height="64"></a>';
                    } else {
                        echo '<a href="' . $value['link']['url'] . '" target="' . $value['link']['target'] . '" class="cat-internal-link link-mobile-only linkcls' . $i . '"><img src="' . $value['icon'] . '" width="64" height="64"></a>';
                        echo '<a href="#lightboxdiv" data-width="250" class="wplightbox web-link-only linkcls' . $i . '"><img src="' . $value['icon'] . '" width="64" height="64"></a>';
                    }
                }

                if (!empty($value['link']) && $qrcode != 1) {
                    echo '<a href="' . $value['link']['url'] . '" target="' . $value['link']['target'] . '" class="cat-internal-link ' . $custom_class . '">' . $value['link']['title'] . '</a>';
                } else {
                    echo '<a href="#lightboxdiv" class="wplightbox web-link-only linkcls' . $i . ' ' . $custom_class . '" data-width=250>' . $value['link']['title'] . '</a>';
                    echo '<a href="' . $value['link']['url'] . '" target="' . $value['link']['target'] . '" class="cat-internal-link link-mobile-only ' . $custom_class . '">' . $value['link']['title'] . '</a>';
                }

                if ($qrcode == 1 && !empty($linkurl)) {
                    echo '<div id="lightboxdiv" style="position:absolute;top:0;left:-9000px;">';
                    echo '<div class="qr-wpr">' . do_shortcode('[kaya_qrcode content="' . $linkurl . '"]') . '<div class="qr-content"><p>Use your phone camera to scan the qr code and open it with system\'s default browser</p></div></div>';
                    echo '</div>';
                }

                echo '</div>'; // Close .iconitem
                $i++;
            }
            echo '</div>'; // Close .iconbox
        }
        ?>
    </div>
</div>


			
			<?php } ?>
			<div class="overview-highlights-wrap">
				<!-- <h2>Product Highlights</h2> -->
				<div class="overview-highlights-inner">
				<?php
					if( have_rows('hightlight') ):					
						$count = count(get_field("hightlight"));
						$item = 1;
				 		while ( have_rows('hightlight') ) : the_row(); 
							
							// Highlight Layout
							$highlight_layout = get_field('hightlight_layout');

				 			?>
		          <div class="overview-highlight<?php echo ($item % 2 != 0) ? ' highlight-full' : ' highlight-small';?>">

									<div class="meet-highlight-img overview-highlight-img">
					  				<img src="<?php the_sub_field('image'); ?>" />
					  			</div>
					  			<div class="overview-highlight-content">
					  				<h3><?php the_sub_field('title'); ?></h3>
					  				<p><?php the_sub_field('content'); ?></p>
					  			</div>
					 		</div><!--meet-highlight-->
						<?php 
						$item++;
						endwhile;
					endif;
				?>
				</div><!--meet-highlights-inner-->	
			</div>
			<?php if( get_field('display_image_gallery') == 'on' ): ?>
				<div class="image-gallery">
				  <div class="image-gallery-inner">
					<ul class="gallery-slides">
				  	<?php
					if( have_rows('image_gallery') ):
				 		while ( have_rows('image_gallery') ) : the_row(); 
				 			$image_gallery = get_sub_field('image');
				 			?>
				 			<li><a href="<?php echo $image_gallery; ?>" class="wplightbox" data-group="gallery0"><img class="wplightbox" src="<?php the_sub_field('image'); ?>" style="object-position: <?php the_sub_field('image_position'); ?>;"/></a></li>
				 			<?php 
						endwhile;
					endif;
					?> 
					</ul>
				  </div>
				</div>
			<?php endif; ?>  
			
			<?php 
			$detailsection = get_field('details_section');
			if(!empty($detailsection) && $detailsection['enable'] == 1){
			?>
			 <!--  <div class="details_section">
				<div class="meet-summery-wrap details_inner">
					<div class="meet-summery-lt">
						<h2><?php echo $detailsection['summary_title']; ?></h2>
						<p><?php echo $detailsection['summary_content']; ?></p>
						<?php if($detailsection['view_details_button'] == 1){ ?>
							<a class="product-tab default-btn btn-white" data-ids="product-details" href="#">View Details</a>
						<?php } ?>
					</div>
					<div class="meet-summery-rt">
						<img src="<?php echo $detailsection['summary_image']; ?>" />
					</div>
				</div>
			 </div> -->
			 <?php $detailsimages =  $detailsection['summary_image'];
			 if(empty($detailsimages)){
			 	$detailsimages = site_url().'/wp-content/uploads/2019/06/Systems-2-hero-2.jpg';
			 }
			 ?>
			 <div class="details_section parallax-details_section" style="background-image: url(<?php echo $detailsimages ?>);">
				<div class="meet-summery-wrap details_inner">
					<div class="meet-summery-center">
						<h2><?php echo $detailsection['summary_title']; ?></h2>
						<p><?php echo $detailsection['summary_content']; ?></p>
						<?php if($detailsection['view_details_button'] == 1){ ?>
							<a class="product-tab default-btn btn-white" data-ids="product-details" href="#">View Details</a>						
						<?php } ?>
					</div>
					<!-- <div class="meet-summery-rt">
						<img src="https://winnr.digital/friant/wp-content/uploads/2019/06/Systems-2-hero-2.jpg" />
					</div> -->
				</div>
			 </div>

			<?php } ?>
			<?php 
			$solutions_gallery_section = get_field('solutions_gallery_section');
			if(!empty($solutions_gallery_section) && $solutions_gallery_section['enable'] == 1){
			?>
			  <div class="solution-section">
				<div class="solution-inner-section">
					<div class="heading-section">
						<h2><?php echo $solutions_gallery_section['gallery_title']; ?></h2>
						<p><?php echo $solutions_gallery_section['gallery_text']; ?></p>
					</div>
					<?php 
					$select_solutions = $solutions_gallery_section['select_solutions'];
					if(!empty($select_solutions)){ ?>
						<div class="solution-gallery">
						<?php
						foreach ($select_solutions as $key => $value) {
							$postid = $value->ID;
							$featured_img_url = get_the_post_thumbnail_url($postid, 'full'); 
							 ?> 		
							<div class="img-sec">
								<a href="<?php echo get_permalink($postid) ?>">
									<img src="<?php echo $featured_img_url ?>">
									<span class="plus-sign-img"><i class="fas fa-plus"></i></span>
							   </a>
							</div>
						<?php } ?>
						</div>
						<?php 
 					}
					?>					
				</div>
			 </div>
			<?php } ?>
			<?php 
			$recommended_product = get_field('recommended_product');
			//pr($recommended_product);
			if(!empty($recommended_product) && $recommended_product['enable'] == 1){
			?>
				<!---- START Recommended-section HTML ----->
				<div class="recommended-section">
					<div class="heading-section">
						<?php echo (!empty($recommended_product['re_heading'])?'<h2>'.$recommended_product['re_heading'].'</h2>':''); ?>
						<?php echo (!empty($recommended_product['sub_heading'])?'<p>'.$recommended_product['sub_heading'].'</p>':''); ?>					
					</div>
					<?php 
					if(!empty($recommended_product['re_products'])){
						$upload_dir   = wp_upload_dir();
						echo '<div class="product-section">';
						foreach ($recommended_product['re_products'] as $post) {
							setup_postdata( $post );
							echo '<div class="product-column">';
							echo '<div class="img-sec">';
							$featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
							echo '<a href="'.get_permalink().'"><img src="'.(!empty($featured_img_url)?$featured_img_url:$upload_dir['baseurl'].'/2019/06/Systems-2-hero-2.jpg').'"></a>';
							echo '</div>';
							echo '<div class="content-sec">';
							echo '<h3>'.get_the_title().'</h3>';
							echo '<p>';
							the_excerpt();
							echo '</p>';
							echo '</div>';
							echo '</div>';
						}
						wp_reset_postdata();
						echo '</div>';
					}
					?>				
				</div>
				<!---- END Recommended-section HTML ----->
			<?php } ?>		
		</div>
	<?php endif; ?>
	<?php if( get_field('details_tab') == 'on' ): ?>
		<div class="product-tab-content" id="product-details">
			<!-- nav-overviews -->
			<?php $detailsmains = get_field('details_section_main'); 
			if(!empty($detailsmains) && $detailsmains['enable'] == 1){
				$detailsheading = $detailsmains['heading'];
				$detailstext = $detailsmains['text'];
				?>
				<?php $detailsimage =  $detailsmains['background_image'];
				 if(empty($detailsimage)){
				 	$detailsimage = site_url().'/wp-content/uploads/2019/06/Systems-2-hero-2.jpg';
				 }
				 ?>
				<div class="overview-cta details-cta parallax-details_section" style="background-image: url(<?php echo $detailsimage ?>);">
					<div class="overview-cta-inner">
							<?php echo !empty($detailsheading)?'<h2>'.$detailsheading.'</h2>':''; ?>
							<?php echo !empty($detailstext) ? $detailstext:''; ?>
					</div>
				</div>
			<?php } ?>
			<?php $typicals_section = get_field('typicals_section'); 
			if(!empty($typicals_section) && $typicals_section['enable'] == 1){
				$typicalsheading = $typicals_section['heading'];
				$typicalssubheading = $typicals_section['sub_heading'];
				$typicals_item = $typicals_section['typicals_item'];
				?>
				<div class="recommended-section popular-three-column">
				  <div class="heading-section">
				    <?php echo !empty($typicalsheading)?'<h2>'.$typicalsheading.'</h2>':''; ?>
				    <?php echo !empty($typicalssubheading)?'<p>'.$typicalssubheading.'</p>':''; ?>
				  </div>
				  <?php
				  if(!empty($typicals_item)){ ?>
				  	<div class="product-section">
				  		<?php
				  		foreach ($typicals_item as $key => $value) {
				  			echo '<div class="product-column">';
				  			echo '<div class="img-sec">';
				  			echo '<a href="'.(!empty($value['link'])?$value['link']['url']:'#').'" target="'.(!empty($value['link'])?$value['link']['target']:'').'"><img src="'.(!empty($value['image'])?$value['image']['url']:'').'" alt="'.(!empty($value['image'])?$value['image']['alt']:'').'"></a>';
				  			echo '</div>';
				    		echo '</div>';		
				  		}
				  		?>
				  	</div>
				  <?php }
				  ?>
				</div>
			<?php } ?>
			<?php //$material_library_section = get_field('material_library_section'); 
			$material_library_section = get_field('material_library_enable'); 
			if(!empty($material_library_section) && $material_library_section == 1){
				$materialheading = get_field('materials_heading');
				$materialtext = get_field('materials_text');
				//$material_link = $material_library_section['material_link'];
				?>
				<div class="material-section" id="material">
					<div class="material-library-section">
						<div class="heading-section">
						  	<?php echo !empty($materialheading)?'<h2>'.$materialheading.'</h2>':''; ?>
				    		<?php echo !empty($materialtext)?'<p>'.$materialtext.'</p>':''; ?>
					    </div>
					    <div class="materials-wrap">
							<?php
							if( have_rows('material_gallery') ): ?>
								<ul>
								<?php
								 while ( have_rows('material_gallery') ) : the_row(); ?>
									<li>
								    <a  class="wplightbox" href="<?php the_sub_field('image'); ?>" data-exitanimation="fadeOut"  exitanimation="fadeOut" data-enteranimation="fadeIn"  enteranimation="fadeIn" data-autoopenonce="true" data-description="<?php the_sub_field('info'); ?>">
								     <div class="material-overlay"><i class="fas fa-plus-circle"></i></div>  
								    <div class="material-info"><?php the_sub_field('info'); ?></div>
								    <img src="<?php the_sub_field('image'); ?>" />
								    </a>
								    </li>
								<?php 
								endwhile;
								else :
								    // no rows found
								?>
								</ul>
							<?php endif; ?>
						</div><!--materials-wrap-->

					     <?php
					     /*if(!empty($material_link)){
					     	echo '<div class="material-details">';
					     	foreach ($material_link as $mavalue) { ?>
					  			<div class="material-box">
						     		<div class="img-box">
						     			<?php if(!empty($mavalue['image'])) { ?>
						     				<a href="<?php echo !empty($mavalue['titlelink'])?$mavalue['titlelink']['url']:'#'?>" target="<?php echo !empty($mavalue['titlelink'])?$mavalue['titlelink']['target']:''?>">
							     				<img src="<?php echo $mavalue['image']['url']; ?>" alt="<?php echo $mavalue['image']['alt']; ?>">
							     		  	</a> 
						     			<?php }else{ ?>
						     				<a href="<?php echo !empty($mavalue['titlelink'])?$mavalue['titlelink']['url']:'#'?>" target="<?php echo !empty($mavalue['titlelink'])?$mavalue['titlelink']['target']:''?>">
							     				<img src="https://winnr.digital/friant/wp-content/uploads/2019/05/my-hite.jpg">
							     		  	</a> 
						     			<?php } ?> 						     	       	
						     		</div>
						     		<div class="content-sec">
						     			<h5><a href="<?php echo !empty($mavalue['titlelink'])?$mavalue['titlelink']['url']:'#'?>" target="<?php echo !empty($mavalue['titlelink'])?$mavalue['titlelink']['target']:''?>"><?php echo !empty($mavalue['titlelink'])?$mavalue['titlelink']['title']:''?></a></h5>
						     		</div>
						     	</div>	
					     	<?php
					     	}
					     	echo '</div>';
					     } */
					     ?>					     
					</div>
					<div class="expand-material-button-wpr">
						<a href="#" class="expand-content show"><i class="fas fa-plus-circle"></i><i class="fas fa-minus-circle"></i><span>Expand</span></a>
					</div>
				</div>
			<?php } ?>
			
			<?php $two_part_content = get_field('two_part_content'); 
			if(!empty($two_part_content) && $two_part_content['enable'] == 1){
				$two_content = $two_part_content['two_content'];
				if(!empty($two_content)){ 
					foreach ($two_content as $twovalue) {
						$twopart_heading =$twovalue['title'];
						$twopart_copy =$twovalue['copy'];
						$twopart_image =$twovalue['image'];
						?>
						<div class="details_section detail_highlight">
							<div class="meet-summery-wrap details_inner">
								<div class="meet-summery-lt">
									<?php echo !empty($twopart_heading) ? '<h2>'.$twopart_heading.'</h2>':''; ?>
									<?php echo !empty($twopart_copy) ? apply_filters('the_content', $twopart_copy):'';?>
								</div>
								<div class="meet-summery-rt">
									<img src="<?php echo !empty($twopart_image)?$twopart_image['url']:''; ?>" alt="<?php echo !empty($twopart_image)?$twopart_image['alt']:''; ?>">
								</div>
							</div>
						</div>
					<?php
					}
				}
			} ?>

			<?php $download_resources = get_field('download_resources'); 
			if(!empty($download_resources) && $download_resources['enable'] == 1){
				$download_resources_down_image = $download_resources['down_image'];
				$download_resources_title = $download_resources['title'];
				$download_resources_content = $download_resources['content'];
				$download_resources_button = $download_resources['download_resources_button'];

				$detailsimages =  $detailsection['summary_image'];
				 if(empty($download_resources_down_image)){
				 	$download_resources_down_image = site_url().'/wp-content/uploads/2019/06/Systems-2-hero-2.jpg';
				 }
				 ?>
				 <div class="details_section parallax-details_section" style="background-image: url(<?php echo $download_resources_down_image ?>);">
					<div class="meet-summery-wrap details_inner">
						<div class="meet-summery-center">
							<?php echo !empty($download_resources_title) ? '<h2>'.$download_resources_title.'</h2>':''; ?>
							<?php echo !empty($download_resources_content) ? apply_filters('the_content', $download_resources_content):'';?>
							<?php if($download_resources_button == 1){
								echo '<a class="nav-resource product-tab default-btn btn-white visti-resource-btn" data-ids="nav-resource" href="#">Visit Resources</a>';
							}?>
						</div>
						<!-- <div class="meet-summery-rt">
							<img src="https://winnr.digital/friant/wp-content/uploads/2019/06/Systems-2-hero-2.jpg" />
						</div> -->
					</div>
				 </div>
			
			<div class="three-d-viewer-coohom">
					 <?php echo get_field('details_coohom_iframe_code_here'); ?>
		    </div>
			
				<?php
				/*if(!empty($two_content)){ 					
					?>
					<div class="details_section part-section">
						<div class="meet-summery-wrap details_inner">
							<div class="meet-summery-rt">
								<img src="<?php echo !empty($download_resources_down_image)?$download_resources_down_image['url']:''; ?>" alt="<?php echo !empty($download_resources_down_image)?$download_resources_down_image['alt']:''; ?>">
							</div>
							<div class="meet-summery-lt">
								<?php echo !empty($download_resources_title) ? '<h2>'.$download_resources_title.'</h2>':''; ?>
								<?php echo !empty($download_resources_content) ? apply_filters('the_content', $download_resources_content):'';?>
								<?php if($download_resources_button == 1){
									echo '<a class="nav-resource product-tab default-btn btn-white visti-resource-btn" data-ids="nav-resource" href="#">Visit Resources</a>';
								}?>
							</div>

						</div>
					</div>
					<?php
				}*/
			} ?>			
		</div>
	<?php endif; ?>
	<?php if( get_field('resources_tab') == 'on' ): ?>
		<div class="product-tab-content" id="nav-resource">
			<!------- resource page --------->
			<div class="product-resource-wrap-main main-resource-wrap">
				<?php 
				$resources_list = get_field('resources_list');
				if(!empty($resources_list) && $resources_list['re_enable'] == 1){
				?>
					<!---- START Resources-section HTML ----->
					<div class="resource-section">
						<div class="recommended-section resources-list-section">
							<div class="heading-section">
								<?php echo (!empty($resources_list['list_resources'])?'<h2>'.$resources_list['res_heading'].'</h2>':''); ?>				
							</div>
							<?php 
							if(!empty($resources_list['list_resources'])){
								$upload_dir   = wp_upload_dir();
								echo '<div class="product-section">';
								foreach ($resources_list['list_resources'] as $reitem) {
									$re_image = $reitem['re_image'];
									$re_title = $reitem['re_title'];
									$re_link = $reitem['re_link'];
									echo '<div class="product-column">';
									echo '<div class="img-sec">';								
									echo '<a href="'.(!empty($re_link)?$re_link['url']:'#').'" target="'.(!empty($re_link)?$re_link['target']:'').'"><img src="'.(!empty($re_image)?$re_image['url']:$upload_dir['baseurl'].'/2019/06/Systems-2-hero-2.jpg').'"></a>';
									echo '</div>';
									echo '<div class="content-sec">';
									echo '<h3><a href="'.(!empty($re_link)?$re_link['url']:'#').'" target="'.(!empty($re_link)?$re_link['target']:'').'">'.$re_title.'</a></h3>';
									echo '</div>';
									echo '</div>';
								}
								echo '</div>';
							}
							?>				
						</div>
				   </div>
					<!---- END Resources-section HTML ----->
				<?php } ?>
				<h2 class="resource_download">Download</h2>
				<div class="resource-wrap">
					<div class="resource-inner">
						<h2>Pro Resources</h2>
						<?php
						if( have_rows('resource') ):
						 while ( have_rows('resource') ) : the_row(); ?>
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
				<?php if( get_field('product_manuals_enable') == 1): ?>
					<?php if( get_field('product_manuels') ): ?>
					<div class="resource-wrap">
						<div class="resource-inner">
							<h2>Manuals</h2>
							<?php
							if( have_rows('product_manuels') ):
							 while ( have_rows('product_manuels') ) : the_row(); ?>
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
				<?php endif; ?>
			</div><!--product-resource-wrap-->
		</div>
	<?php endif; ?>
	<?php 
	$hide_shop_on_dealer_site = get_field('hide_shop_on_dealer_site','option');
	$cta_button = get_field('cta_button');
	//pr($recommended_product);
	if(!empty($cta_button) && $cta_button['enable'] == 1){			
	?>
	<div class="overview-cta cta_buttons">
    <div class="overview-cta-inner">                
        <?php
        echo !empty($cta_button['cta_bt_heading']) ? '<h2>' . $cta_button['cta_bt_heading'] . '</h2>' : ''; 
        $cta_iconbox = $cta_button['buttons'];
        if (!empty($cta_iconbox)) {
            echo '<div class="iconbox">';
            foreach ($cta_iconbox as $key => $value) {
                if (!empty($value['button_link']) && $value['button_link']['title'] != 'Shop on Dealer Site' && $value['button_link']['title'] != 'Shop Dealer Site') {
                    // Set class based on the button title
                    $custom_class = '';
                    $button_title = $value['button_link']['title'];
                    if ($button_title == 'Where To Buy') {
                        $custom_class = 'buy_cta_bottom';
                    } elseif ($button_title == 'Find a Showroom') {
                        $custom_class = 'showroom_cta_bottom';
                    } elseif ($button_title == 'Contact a Sales Rep') {
                        $custom_class = 'sales_rep_cta_bottom';
                    }

                    // Wrap the entire div inside an <a> tag
                    echo '<a href="' . $value['button_link']['url'] . '" target="' . $value['button_link']['target'] . '" class="iconitem ' . $custom_class . '">';
                    echo '<img src="' . $value['button_icon'] . '" width="64" height="64">';
                    echo '<span>' . $value['button_link']['title'] . '</span>';
                    echo '</a>';
                } else if (!empty($value['button_link']) && $hide_shop_on_dealer_site == 0) {
                    echo '<a href="' . $value['button_link']['url'] . '" target="' . $value['button_link']['target'] . '" class="iconitem">';
                    echo '<img src="' . $value['button_icon'] . '" width="64" height="64">';
                    echo '<span>' . $value['button_link']['title'] . '</span>';
                    echo '</a>';
                }
            }
            echo '</div>';
        } ?>
    </div>
</div>


	<?php } ?>

<?php /* ?>
<!------- hero section --------->
<?php if (in_category( 'seating' )) { ?>

<div class="seating-hero" style="background-image: url(<?php the_field('seating_hero'); ?>);"></div>
<!--seating-hero-wrap-->
            
            
<?php } else {
$heroimage = get_field('hero'); 
 ?>

			<div class="hero-wrap" style="background-image: url(<?php echo $heroimage['url']; ?>);">
            <div class="hero-inner">
            <div class="hero-content">
            <h1><?php the_field('title'); ?></h1>
            <h2><?php the_field('sub_title'); ?></h2>
            </div><!--hero-content-->
            </div><!--hero-inner-->
            </div><!--hero-wrap-->

<?php }
?><!--if else (seating) hero-->     
     


     
<!------- menu section --------->               
            
<div class="product-menu-wrap">
  <div class="product-menu-inner">
  <?php if( get_field('meet_tab') == 'on' ): ?>
  
	<style>
	.product-meet-wrap{
		display: block;
	}

	.product-overview-wrap{
		display: none;
	}
	</style>

    <a class="nav-meet active" href""><?php the_field('tab_title'); ?></a>
     
	<?php if( get_field('overview_tab') == 'on' ): ?>
	  <a class="nav-overview" href"">Overview</a>
	<?php endif; ?>
	<?php if( get_field('typicals_tab') == 'on' ): ?>
	    <a class="nav-typicals" href"">Typicals</a>
	<?php endif; ?>    
	<?php if( get_field('resources_tab') == 'on' ): ?>
	    <a class="nav-resources" href"">Resources</a>
	<?php endif; ?>    
	<?php if( get_field('ship_tab') == 'on' ): ?>
	    <a class="nav-ship" href"">Quick Ship</a>
	<?php endif; ?>  

	<?php endif; ?>   


 	<?php if( get_field('meet_tab') == 'off' ): ?>
 
		 <style>
		.product-meet-wrap{
			display: none;
		}

		.product-overview-wrap{
			display: block;
		}
		</style>
		<?php if( get_field('overview_tab') == 'on' ): ?>
		  <a class="nav-overview active" href"">Overview</a>
		<?php endif; ?>
		<?php if( get_field('typicals_tab') == 'on' ): ?>
		    <a class="nav-typicals" href"">Typicals</a>
		<?php endif; ?>    
		<?php if( get_field('resources_tab') == 'on' ): ?>
		    <a class="nav-resources" href"">Resources</a>
		<?php endif; ?>    
		<?php if( get_field('ship_tab') == 'on' ): ?>
		    <a class="nav-ship" href"">Quick Ship</a>
		<?php endif; ?>  

	<?php endif; ?> 
  </div>
</div>
	



<div class="product-meet-wrap">

<!------- meet page --------->

<div class="product-meet-inner">

        
<div class="meet-summery-wrap">
	<div class="meet-summery-lt">
	<img src="<?php the_field('summary_image'); ?>" />
	</div>
	<div class="meet-summery-rt">
	<h2><?php the_field('summary_title'); ?>
	</h2>
	<p><?php the_field('summary_content'); ?><br />
	<p><p>
	<?php if( get_field('shop_link') ): ?>
	<a href="<?php the_field('shop_link'); ?>" target="_blank" class="product-btn">Shop Now</a>
	<?php endif ?>
	</div>
</div>


<div class="meet-highlights-wrap">

<h2>Product Highlights</h2>

<div class="meet-highlights-inner">
<?php
if( have_rows('hightlight') ):
 while ( have_rows('hightlight') ) : the_row(); ?>


 <div class="meet-highlight">
  <div class="meet-highlight-img">
  <img src="<?php the_sub_field('image'); ?>" />
  </div>
  <h3><?php the_sub_field('title'); ?></h3>
  <p><?php the_sub_field('content'); ?></p>
 </div><!--meet-highlight-->
 


<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--meet-highlights-inner-->
</div><!--meet-highlights-wrap-->
</div><!--product-meet-inner-->

   
   
   
   
   
   
   <!--gallery -->

<?php if( get_field('display_visual_sales_gallery') == 'on' ): ?>

<div class="flexslider animated fadeIn duration1 eds-on-scroll">
<ul class="slides">

<?php 
if ( have_posts() ) :
    $slideNumber = 1;
	$nodeNumber = 1;
	$contentNumber = 1;
    while ( have_posts() ) : the_post(); ?>
    
<?php if( have_rows('visual_sales_gallery') ): ?>

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

<?php endif; ?>  





<?php if( get_field('display_image_gallery') == 'on' ): ?>
 
<div class="flex-container">
  <div class="flexslider">
	<ul class="slides">

  <?php
if( have_rows('image_gallery') ):
 while ( have_rows('image_gallery') ) : the_row(); ?>
 
	<li><img src="<?php the_sub_field('image'); ?>" style="object-position: <?php the_sub_field('image_position'); ?>;"/></li>

<?php 
endwhile;
else :
    // no rows found
endif;
?>

	
	</ul>
  </div>
</div>
<?php endif; ?>  

</div><!--product-meet-wrap-->




<!------- overview page --------->




<div class="product-overview-wrap">


<!-- seating category start -->

<?php if (in_category( 'seating' )) { ?>


<?php if( get_field('display_image_1') ): ?>
<div class="seating-hero-wrap">
<div class="summary-img animated fadeInLeft duration1 eds-on-scroll" style="background-image: url(<?php the_field('display_image_1'); ?>);">
</div>

<div class="seating-hero-info-wrap animated fadeInUp duration1 eds-on-scroll">
<div class="seating-hero-info-inner">
<h2><?php the_field('seat_title'); ?></h2>
<p><?php the_field('seat_summary'); ?></p>
</div>
<?php if( get_field('shop_link') ): ?>
<a href="<?php the_field('shop_link'); ?>" target="_blank">Shop Now</a>
<?php endif; ?>
</div>


<div class="summary-img  animated fadeInRight duration1 eds-on-scroll" style="background-image: url(<?php the_field('display_image_2'); ?>);">
</div>
</div>
<?php endif; ?>

<?php if( get_field('seat_info') ): ?>


<?php if( have_rows('seat_info') ): ?>

<div class="seating-info-wrap">
   <?php while ( have_rows('seat_info') ) : the_row(); ?>

<div class="seating-info-inner">

<img class="animated fadeInLeft duration3 eds-on-scroll" src="<?php the_sub_field('seat_info_image'); ?>"/>


  <div class="seating-des animated fadeIn duration2 eds-on-scroll">
    <img src="https://winnr.digital/friant/wp-content/uploads/2019/10/chair-icon.jpg" />
   <div class="seating-info-txt ">
   <h2><?php the_sub_field('seat_info_title'); ?></h2>
<p><?php the_sub_field('seat_info_content'); ?></p>
   </div><!--seating-info-txt-->
  </div><!--seating-des-->
</div><!--seating-info-inner-->

 <?php  endwhile;
endif; ?>

</div><!--seating-info-wrap-->



<?php endif; ?>




<!--gallery -->

<?php if( get_field('display_visual_sales_gallery') == 'on' ): ?>

<div class="flexslider animated fadeIn duration1 eds-on-scroll">
<ul class="slides">

<?php 
if ( have_posts() ) :
    $slideNumber = 1;
	$nodeNumber = 1;
	$contentNumber = 1;
    while ( have_posts() ) : the_post(); ?>
    
<?php if( have_rows('visual_sales_gallery') ): ?>

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

<?php endif; ?>  









<?php if( get_field('seat_vid_bg') ): ?>

<a href="<?php the_field('seat_video'); ?>" class="wplightbox" data-width="5000" data-height="3000" data-exitanimation="fadeOut" data-enteranimation="fadeIn">
<div class="seat-vid-top">
<img src="https://winnr.digital/friant/wp-content/uploads/2019/10/play-btn.png" />
</div><!--seat-vid-top-->
<div class="seating-vid-wrap animated fadeInLeft duration1 eds-on-scroll" style="background-image:url(<?php the_field('seat_vid_bg'); ?>);">
</div>
</a>
<?php endif; ?>




<?php if( get_field('seat_image_gallery') ): ?>
<div class="seating-img-end-wrap animated fadeInLeft eds-on-scroll">
<?php

if( have_rows('seat_image_gallery') ):

    while ( have_rows('seat_image_gallery') ) : the_row(); ?>
   <div class="seating-img-end-inner">
     <img src="<?php  the_sub_field('gallery_image'); ?>" ? />
  </div>
 <?php   endwhile;
endif;
?>
</div><!--seating-img-end-wrap-->

<?php endif; ?>

</div><!--overview end-->






<?php } else { ?>
<!-- seating category end -->


<?php if( get_field('about_bullet') ): ?>
<div class="about-wrap">
<div class="about-wrap-lt">
<img src="<?php the_field('about_image') ?>" />
</div><!--about-wrap-lt-->
<div class="about-wrap-rt">
<h2><?php the_field('about_title') ?></h2>
<p>
<?php the_field('about_subtext') ?>
</p>

<div class="about-bullet">
<?php the_field('about_bullet') ?>

<?php if( get_field('about_more') ): ?>
<div class="read-more-overview"><i class="fas fa-plus-circle"></i> Read More</div>
<div class="read-more-bull">
<?php the_field('about_more') ?>
</div><!--read-more-mess-->
<div class="read-less-overview"><i class="fas fa-minus-circle"></i> Read Less</div>
<?php endif; ?>

</div><!--about-bullet-->

</div><!--about-wrap-rt-->
</div><!--about-wrap-->
<?php endif; ?>



<?php if( get_field('feature_bullet') ): ?>
<div class="electrical-wrap">

<div class="electrical-wrap-lt">

<h2><?php the_field('feature_title') ?></h2>
<p>
<?php the_field('feature_subtext') ?>
</p>
<div class="electrical-bullet">
<?php the_field('feature_bullet') ?>


<?php if( get_field('feature_more') ): ?>
<div class="read-more-overview"><i class="fas fa-plus-circle"></i> Read More</div>
<div class="read-more-bull">
<?php the_field('feature_more') ?>
</div><!--read-more-mess-->
<div class="read-less-overview"><i class="fas fa-minus-circle"></i> Read Less</div>
<?php endif; ?>


</div><!--electrical-bullet-->

</div><!--electrical-wrap-lt-->

<div class="electrical-wrap-rt">
<img src="<?php the_field('feature_image') ?>" />
</div><!--electrical-wrap-rt-->

</div><!--electrical-wrap-->
<?php endif; ?>



<?php if( get_field('electrical_bullet') ): ?>
<div class="features-wrap">
<div class="features-wrap-lt">
<img src="<?php the_field('electrical_image') ?>" />
</div><!--features-wrap-lt-->
<div class="features-wrap-rt">
<h2><?php the_field('electrical_title') ?></h2>
<p>
<?php the_field('electrical_subtext') ?>
</p>

<div class="feature-bullet">
<?php the_field('electrical_bullet') ?>


<?php if( get_field('electrical_more') ): ?>
<div class="read-more-overview"><i class="fas fa-plus-circle"></i> Read More</div>
<div class="read-more-bull">
<?php the_field('electrical_more') ?>
</div><!--read-more-mess-->
<div class="read-less-overview"><i class="fas fa-minus-circle"></i> Read Less</div>
<?php endif; ?>

</div><!--feature-bullet-->

</div><!--features-wrap-rt-->
</div><!--features-wrap-->
<?php endif; ?>




<?php if( get_field('benefits_bullet') ): ?>
<div class="environment-wrap">

<div class="environment-wrap-lt">

<h2><?php the_field('benefits_title') ?></h2>
<p>
<?php the_field('benefits_subtext') ?>
</p>
<div class="environment-bullet">
<?php the_field('benefits_bullet') ?>

<?php if( get_field('benefits_more') ): ?>
<div class="read-more-overview"><i class="fas fa-plus-circle"></i> Read More</div>
<div class="read-more-bull">
<?php the_field('benefits_more') ?>
</div><!--read-more-mess-->
<div class="read-less-overview"><i class="fas fa-minus-circle"></i> Read Less</div>
<?php endif; ?>


</div><!--environment-bullet-->

</div><!--environment-wrap-lt-->

<div class="environment-wrap-rt">
<img src="<?php the_field('benefits_image') ?>" />
</div><!--environment-wrap-rt-->

</div><!--environment-wrap-->
<?php endif; ?>




<?php if( get_field('quickship_bullet') ): ?>
<div class="features-wrap">
<div class="features-wrap-lt">
<img src="<?php the_field('quickship_image') ?>" />
</div><!--features-wrap-lt-->
<div class="features-wrap-rt">
<h2><?php the_field('Quickship_title') ?></h2>
<p>
<?php the_field('quickship_subtext') ?>
</p>

<div class="feature-bullet">

<?php the_field('quickship_bullet') ?>
</div><!--feature-bullet-->

</div><!--features-wrap-rt-->
</div><!--features-wrap-->
<?php endif; ?>




<!-- materials -->



<div class="materials-wrap">

<?php
if( have_rows('material_gallery') ): ?>

<h1> Materials </h1>

<ul>
 
<?php
 while ( have_rows('material_gallery') ) : the_row(); ?>
 
	<li>
    <a  class="wplightbox" href="<?php the_sub_field('image'); ?>" data-exitanimation="fadeOut"  exitanimation="fadeOut" data-enteranimation="fadeIn"  enteranimation="fadeIn" data-autoopenonce="true" data-description="<?php the_sub_field('info'); ?>">
     <div class="material-overlay"><i class="fas fa-plus-circle"></i></div>  
    <div class="material-info"><?php the_sub_field('info'); ?></div>
    <img src="<?php the_sub_field('image'); ?>" />
    </a>
    </li>

<?php 
endwhile;
else :
    // no rows found
?>

</ul>

<?php endif; ?>

</div><!--materials-wrap-->






<div class="worksurface-wrap">

<?php
if( have_rows('worksurface_gallery') ): ?>

<h1> Worksurfaces </h1>

<ul>
 
<?php
 while ( have_rows('worksurface_gallery') ) : the_row(); ?>
 
	<li>
    <a  class="wplightbox" href="<?php the_sub_field('image'); ?>" data-exitanimation="fadeOut"   data-description="<?php the_sub_field('info'); ?>">
     <div class="worksurface-overlay"><i class="fas fa-plus-circle"></i></div>  
    <div class="worksurface-info"><?php the_sub_field('info'); ?></div>
    <img src="<?php the_sub_field('image'); ?>" />
    </a>
    </li>
<?php 
endwhile;
else :
    // no rows found
?>

</ul>

<?php endif; ?>

</div><!--worksurface-wrap-->


<!-- workshops -->




<?php if( get_field('general_dimensions_image') ): ?>
<div class="general-wrap" style="background-image: url(<?php the_field('general_dimensions_image'); ?>);">

<div class="dime-wrap">
<h2><?php the_field('general_dimensions_title'); ?></h2>

<ul>
 <?php
if( have_rows('general_dimensions') ): ?>
<?php
 while ( have_rows('general_dimensions') ) : the_row(); ?>
 
  <p><?php the_sub_field('title'); ?></p>
  
 <div class="deminsions-wrap"><?php the_sub_field('dimensions'); ?></div>

<?php 
endwhile;
else :
    // no rows found
endif;
?>
</ul>

</div><!--dime-wrap-->
</div><!--general-wrap-->
<?php endif; ?>



<?php }
?><!--if else (seating) category-->


</div><!--product-overview-wrap-->



<!------- typicals page --------->

<div class="product-typicals-wrap">

<div class="typicals-title-wrap">
<h2>Typicals</h2>
<p>View a sample of available dimensions</p>
</div>

<div class="typicals-menu-wrap">


<?php if(have_rows('2_pack') ): ?>
<?php if( get_field('active_pack') == 'two-pack' ): ?>
<div class="two-pack active">2-pack</div>
<?php else: ?>
<div class="two-pack">2-pack</div>
<?php endif; ?>
<?php endif; ?>

<?php if(have_rows('3_pack') ): ?>
<?php if( get_field('active_pack') == 'three-pack' ): ?>
<div class="three-pack active">3-pack</div>
<?php else: ?>
<div class="three-pack">3-pack</div>
<?php endif; ?>
<?php endif; ?>

<?php if(have_rows('4_pack') ): ?>
<?php if( get_field('active_pack') == 'four-pack' ): ?>
<div class="four-pack active">4-pack</div>
<?php else: ?>
<div class="four-pack">4-pack</div>
<?php endif; ?>
<?php endif; ?>

<?php if(have_rows('6_pack') ): ?>
<?php if( get_field('active_pack') == 'six-pack' ): ?>
<div class="six-pack active">6-pack</div>
<?php else: ?>
<div class="six-pack">6-pack</div>
<?php endif; ?>
<?php endif; ?>

<?php if(have_rows('8_pack') ): ?>
<?php if( get_field('active_pack') == 'eight-pack' ): ?>
<div class="eight-pack active">8-pack</div>
<?php else: ?>
<div class="eight-pack">8-pack</div>
<?php endif; ?>
<?php endif; ?>

<?php if(have_rows('12_pack') ): ?>
<?php if( get_field('active_pack') == 'twelve-pack' ): ?>
<div class="twelve-pack active">12-pack</div>
<?php else: ?>
<div class="twelve-pack">12-pack</div>
<?php endif; ?>
<?php endif; ?>

<?php if(have_rows('single') ): ?>
<?php if( get_field('active_pack') == 'single-pack' ): ?>
<div class="single-pack active">single</div>
<?php else: ?>
<div class="single-pack">single</div>
<?php endif; ?>
<?php endif; ?>

<?php if(have_rows('beam') ): ?>
<?php if( get_field('active_pack') == 'beam-pack' ): ?>
<div class="beam-pack active">Beam Only</div>
<?php else: ?>
<div class="beam-pack">Beam Only</div>
<?php endif; ?>
<?php endif; ?>

</div><!--typicals-menu-wrap-->





<!-- 2 pack -->
<?php if( get_field('active_pack') == 'two-pack' ): ?>

<div class="two-pack-wrap" style="display: block;">
<div class="pack-inner">
<?php
if( have_rows('2_pack') ):
 while ( have_rows('2_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--two-pack-wrap-->


<?php else: ?>


<div class="two-pack-wrap">
<div class="pack-inner">
<?php
if( have_rows('2_pack') ):
 while ( have_rows('2_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--two-pack-wrap-->

<?php endif ?>


<!-- 3 pack -->

<?php if( get_field('active_pack') == 'three-pack' ): ?>

<div class="three-pack-wrap" style="display: block;">
<div class="pack-inner">
<?php
if( have_rows('3_pack') ):
 while ( have_rows('3_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--three-pack-wrap-->

<?php else: ?>

<div class="three-pack-wrap">
<div class="pack-inner">
<?php
if( have_rows('3_pack') ):
 while ( have_rows('3_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--three-pack-wrap-->


<?php endif ?>




<!-- 4 pack -->

<?php if( get_field('active_pack') == 'four-pack' ): ?>

<div class="four-pack-wrap" style="display: block;">
<div class="pack-inner">
<?php
if( have_rows('4_pack') ):
 while ( have_rows('4_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--four-pack-wrap-->

<?php else: ?>

<div class="four-pack-wrap">
<div class="pack-inner">
<?php
if( have_rows('4_pack') ):
 while ( have_rows('4_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--four-pack-wrap-->

<?php endif ?>

<!-- 6 pack -->

<?php if( get_field('active_pack') == 'six-pack' ): ?>

<div class="six-pack-wrap" style="display: block;">
<div class="pack-inner">
<?php
if( have_rows('6_pack') ):
 while ( have_rows('6_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--six-pack-wrap-->

<?php else: ?>

<div class="six-pack-wrap">
<div class="pack-inner">
<?php
if( have_rows('6_pack') ):
 while ( have_rows('6_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--six-pack-wrap-->

<?php endif ?>


<!-- 8 pack -->

<?php if( get_field('active_pack') == 'eight-pack' ): ?>

<div class="eight-pack-wrap" style="display: block;">
<div class="pack-inner">
<?php
if( have_rows('8_pack') ):
 while ( have_rows('8_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--eight-pack-wrap-->
 
 <?php else: ?>
 
 <div class="eight-pack-wrap" >
<div class="pack-inner">
<?php
if( have_rows('8_pack') ):
 while ( have_rows('8_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--eight-pack-wrap-->

 <?php endif ?>

<!-- 12 pack -->

<?php if( get_field('active_pack') == 'twelve-pack' ): ?>

<div class="twelve-pack-wrap" style="display: block;">
<div class="pack-inner">
<?php
if( have_rows('12_pack') ):
 while ( have_rows('12_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--eight-pack-wrap-->

<?php else: ?>

<div class="twelve-pack-wrap">
<div class="pack-inner">
<?php
if( have_rows('12_pack') ):
 while ( have_rows('12_pack') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--eight-pack-wrap-->


<?php endif ?>

<!-- single pack -->

<?php if( get_field('active_pack') == 'single-pack' ): ?>

<div class="single-pack-wrap" style="display: block;">
<div class="pack-inner">
<?php
if( have_rows('single') ):
 while ( have_rows('single') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--single-pack-wrap-->

<?php else: ?>

<div class="single-pack-wrap">
<div class="pack-inner">
<?php
if( have_rows('single') ):
 while ( have_rows('single') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--single-pack-wrap-->


<?php endif ?>
<!-- beam -->


<?php if( get_field('active_pack') == 'beam-pack' ): ?>

<div class="beam-pack-wrap" style="display: block;">
<div class="pack-inner">
<?php
if( have_rows('beam') ):
 while ( have_rows('beam') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--beam-pack-wrap-->

<?php else: ?>

<div class="beam-pack-wrap">
<div class="pack-inner">
<?php
if( have_rows('beam') ):
 while ( have_rows('beam') ) : the_row(); ?>
<div class="pack-item">
<img src="<?php the_sub_field('image'); ?>" />
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('subtitle'); ?></p>
<div class="bullets"><?php the_sub_field('bullets'); ?></div>
</div><!--pack-item-->
<?php 
endwhile;
else :
    // no rows found
endif;
?>
</div><!--pack-inner-->
</div><!--beam-pack-wrap-->

<?endif ?>

</div><!--product-typicals-wrap-->




<!------- resource page --------->

<div class="product-resource-wrap">

<div class="resource-wrap">
<div class="resource-inner">

<h2>Pro Resources</h2>
<?php
if( have_rows('resource') ):
 while ( have_rows('resource') ) : the_row(); ?>
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

<?php if( get_field('product_manuels') ): ?>
<div class="resource-wrap">
<div class="resource-inner">

<h2>Manuals</h2>
<?php
if( have_rows('product_manuels') ):
 while ( have_rows('product_manuels') ) : the_row(); ?>
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


</div><!--product-resource-wrap-->





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
				

<?php */ ?>                
</div> <!-- #main-content -->
<?php
get_footer();