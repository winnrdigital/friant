<?php
$current_ID = get_the_ID();
$reedispace_hide_section = get_sub_field('reedispace_hide_section', $current_ID);
$meet_reedispace_title = get_sub_field('meet_reedispace_title', $current_ID);
$meet_reedispace_subtitle = get_sub_field('meet_reedispace_subtitle', $current_ID);
$meet_reedispace_description = get_sub_field('meet_reedispace_description', $current_ID);
$meetreedispace_cta_button = get_sub_field('meetreedispace_cta_button', $current_ID);

if($reedispace_hide_section != 1){

?>
<section class="meet-reedispace-section common-padding">
    <div class="custom-container">
        <div class="d-flex flex-row">
            <div class="flex-col left-col align-center">
                <div class="reedispace-block-section">
                    <?php if(!empty($meet_reedispace_subtitle)): ?>
                        <h3 class="reedispace-subtitle" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1000"><?php echo esc_html($meet_reedispace_subtitle); ?></h3>
                    <?php endif; ?>
					<?php if(!empty($meet_reedispace_title)): ?>
                        <h2 class="reedispace-title" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1200"><?php echo esc_html($meet_reedispace_title); ?></h2>
                    <?php endif; ?>
					<?php if(!empty($meet_reedispace_description)): ?>
                        <div class="reedispace-desc" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1300"><?php echo wp_kses_post($meet_reedispace_description); ?></div>
                    <?php endif; ?>
					<?php 
						$button = get_sub_field('meetreedispace_cta_button');
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