<?php
$current_ID = get_the_ID();
$sales_cta_hide_section = get_sub_field('sales_cta_hide_section', $current_ID);
$sales_cta_title = get_sub_field('sales_cta_title', $current_ID);
$sales_cta_subtitle = get_sub_field('sales_cta_subtitle', $current_ID);
$sales_cta_description = get_sub_field('sales_cta_description', $current_ID);
$sales_cta_button = get_sub_field('sales_cta_button', $current_ID);

if($sales_cta_hide_section != 1){
?>
<section class="meet-reedispace-section common-padding">
    <div class="custom-container">
        <div class="d-flex flex-row">
            <div class="flex-col left-col align-center">
                <div class="reedispace-block-section">
                    <?php if(!empty($sales_cta_subtitle)): ?>
                        <h3 class="reedispace-subtitle" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1100"><?php echo esc_html($sales_cta_subtitle); ?></h3>
                    <?php endif; ?>
					<?php if(!empty($sales_cta_title)): ?>
                        <h2 class="reedispace-title" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1200"><?php echo esc_html($sales_cta_title); ?></h2>
                    <?php endif; ?>
					<?php if(!empty($sales_cta_description)): ?>
                        <div class="reedispace-desc" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1300"><?php echo wp_kses_post($sales_cta_description); ?></div>
                    <?php endif; ?>
					<?php 
						$button = get_sub_field('sales_cta_button');
						if( $button ):
						?>
							<div class="o-button" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1400">
								<a class="reedispace-cta-btn" href="<?php echo esc_url($button['url']); ?>"  target="<?php echo esc_attr($button['target'] ?: '_self'); ?>">
								<?php echo esc_html($button['title']); ?>
								</a>
							</div>
					<?php endif; ?>
				</div>
			</div>
       	</div>
    </div>
</section>
<?php } ?>