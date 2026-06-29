<?php
// Hide section
$hide_section        = get_sub_field('hide_section');
$feature_main_title  = get_sub_field('feature_main_title');
$feature_description = get_sub_field('feature_description');
$center_image        = get_sub_field('center_image');
$feature_rows        = get_sub_field('feature_loop');
?>
<?php if ($hide_section != 1): ?>
<section class="features-list-section common-padding">
    <div class="custom-container">
        <div class="features-layout-wrapper">
            <?php if (!empty($feature_main_title)): ?>
                <h2 class="reedispace-title"><?php echo esc_html($feature_main_title); ?></h2>
            <?php endif; ?>
            <?php if (!empty($feature_description)): ?>
                <div class="reedispace-desc"><?php echo wp_kses_post($feature_description); ?></div>
            <?php endif; ?>
			<div class="feature-main-block">
			  <div class="features-left-side">
				<?php if (!empty($feature_rows)): ?>
					<?php foreach ($feature_rows as $row): ?>
					  <?php 
						  $placement_raw = $row['placement_side'] ?? '';
						  $placement = strtolower(trim(strtok($placement_raw, ':'))); 
					  ?>
					  <?php if ($placement === 'left'): ?>
					  <div class="feature-box left-box">
						  <?php if (!empty($row['feature_title'])): ?>
						  <h3 data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-duration="1300"><?php echo esc_html($row['feature_title']); ?></h3>
						  <?php endif; ?>
						  <?php if (!empty($row['feature_content'])): ?>
						  <div class="feature-desc" data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-duration="1500">
							  <?php echo wp_kses_post($row['feature_content']); ?>
						  </div>
						  <?php endif; ?>
						  <span class="red-line" data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-duration="1200"></span>
					  </div>
					  <?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<div class="features-center-image" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1000">
					<?php if (!empty($center_image)): ?>
						<img src="<?php echo esc_url($center_image['url']); ?>"
							 alt="<?php echo esc_attr($center_image['alt']); ?>">
					<?php endif; ?>
				</div>
				 <div class="features-right-side">
					<?php if (!empty($feature_rows)): ?>
						<?php foreach ($feature_rows as $row): ?>
							<?php 
								$placement_raw = $row['placement_side'] ?? '';
								$placement = strtolower(trim(strtok($placement_raw, ':'))); 
							?>
							<?php if ($placement === 'right'): ?>
								<div class="feature-box right-box">
									<?php if (!empty($row['feature_title'])): ?>
										<h3 data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-duration="1300"><?php echo esc_html($row['feature_title']); ?></h3>
									<?php endif; ?>

									<?php if (!empty($row['feature_content'])): ?>
										<div class="feature-desc" data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
											<?php echo wp_kses_post($row['feature_content']); ?>
										</div>
									<?php endif; ?>

									<span class="red-line" data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-duration="1200"></span>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
        </div>
    </div>
</section>
<?php endif; ?>
