<?php
$current_ID = get_the_ID();
$product_hero_hide_section        = get_sub_field('product_hero_hide_section', $current_ID);
$product_hero_section_bg_color    = get_sub_field('product_hero_section_bg_color', $current_ID);
$product_hero_section_title       = get_sub_field('product_hero_section_title', $current_ID);
$product_hero_section_subtitle    = get_sub_field('product_hero_section_subtitle', $current_ID);
$product_hero_section_description = get_sub_field('product_hero_section_description', $current_ID);
$hero_banner_cta_button           = get_sub_field('hero_banner_cta_button', $current_ID);
$product_hero_section_image       = get_sub_field('product_hero_section_image', $current_ID);
$background_video_section            = get_sub_field('background_video_section', $current_ID);

if($product_hero_hide_section != 1){

    $hero_image_url = '';
    $hero_image_alt = '';

    if(!empty($product_hero_section_image)) {
        $hero_image_url = $product_hero_section_image['url'];
        $hero_image_alt = $product_hero_section_image['alt'] ? $product_hero_section_image['alt'] : 'Hero Banner Image';
    }
?>

<section class="pro-hero-banner-section common-padding hero-video-wrapper">

   <!-- Background Video -->
	<?php
	$background_video_section = get_sub_field('background_video_section');

	$video_url = '';
	if (!empty($background_video_section['url'])) {
		$video_url = $background_video_section['url'];
	}
	?>

	<?php if(!empty($video_url)): ?>
	 <div class="hero-banner-video-wrapper">
		 <video class="hero-bg-video" autoplay muted loop playsinline>
			<source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
		</video>
	</div>	
	<?php endif; ?>


    <div class="custom-container">
        <div class="hero-banner-main">
            <div class="hero-banner-left">
                <div class="hero-banner-info">

                    <?php if(!empty($product_hero_section_subtitle)): ?>
						<h1 class="banner-title" data-aos="fade-down" data-aos-easing="ease-in-sine" data-aos-duration="1100"><?php echo esc_html($product_hero_section_title); ?></h1>    
                    <?php endif; ?>

                    <?php if(!empty($product_hero_section_title)): ?>
                        <h3 class="banner-subtitle" data-aos="fade-down" data-aos-easing="ease-in-sine" data-aos-duration="800"><?php echo esc_html($product_hero_section_subtitle); ?></h3>
                    <?php endif; ?>

                    <?php if(!empty($product_hero_section_description)): ?>
                        <div class="banner-desc" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1300">
                            <?php echo wp_kses_post($product_hero_section_description); ?>
                        </div>
                    <?php endif; ?>
					<?php 
						$button = get_sub_field('hero_banner_cta_button');
						if( $button ):
						?>
							<div class="o-button desktop-view-btn" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1400">
								<a class="reedispace-cta-btn" href="<?php echo esc_url($button['url']); ?>"  target="<?php echo esc_attr($button['target'] ?: '_self'); ?>">
								<?php echo esc_html($button['title']); ?>
								</a>
							</div>
					<?php endif; ?>
					

                </div>
            </div>

            <div class="hero-banner-right" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1800">
                <?php if(!empty($product_hero_section_image)): ?>
                    <div class="section-image" data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-duration="1000">
                        <img src="<?php echo esc_url($hero_image_url); ?>" class="img-responsive" alt="<?php echo esc_attr($hero_image_alt); ?>" />
                    </div>
					<div class="o-button mobile-view-btn" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1400">
						<a class="reedispace-cta-btn" href="<?php echo esc_url($button['url']); ?>"  target="<?php echo esc_attr($button['target'] ?: '_self'); ?>">
							<?php echo esc_html($button['title']); ?>
						</a>
					</div>
                <?php endif; ?>
            </div>

        </div>
    </div>

</section>

<?php } ?>
