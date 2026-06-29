<?php
$current_ID = get_the_ID();
$choices_made_hide_section = get_sub_field('choices_made_hide_section', $current_ID);
$section_bg_color = get_sub_field('section_bg_color', $current_ID);
$sales_cta_title           = get_sub_field('sales_cta_title', $current_ID);
$sales_cta_subtitle        = get_sub_field('sales_cta_subtitle', $current_ID);
$sales_cta_description     = get_sub_field('sales_cta_description', $current_ID);
$sales_cta_button          = get_sub_field('sales_cta_button', $current_ID);

if ($choices_made_hide_section != 1): ?>
<section class="choiced-made-section common-padding" style="background-color:<?php echo $section_bg_color; ?>;">
    <div class="custom-container">
        <div class="d-flex flex-row">
            <div class="flex-col left-col align-center">
                <?php if (have_rows('feature_loop')) : ?>
                    <div class="feature-loop-wrapper">
                        <?php while (have_rows('feature_loop')) : the_row(); 
                            $icon   = get_sub_field('feature_icon');
                            $title  = get_sub_field('feature_title');
                            $desc   = get_sub_field('feature_description');
                        ?>                   
                        <div class="feature-item" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1200">
                            <?php if (!empty($icon)) : ?>
                                <div class="feature-icon">
                                    <img src="<?php echo esc_url($icon['url']); ?>" 
                                         alt="<?php echo esc_attr($icon['alt'] ?: $title); ?>">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($title)) : ?>
                                <h4 class="feature-title"><?php echo esc_html($title); ?></h4>
                            <?php endif; ?>

                            <?php if (!empty($desc)) : ?>
                                <div class="feature-description"><?php echo esc_html($desc); ?></div>
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>