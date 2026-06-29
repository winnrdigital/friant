<?php
$current_ID = get_the_ID();

$cohoom_iframe_hide_section      = get_sub_field('cohoom_iframe_hide_section', $current_ID);
$product_cohoom_iframe_section_title = get_sub_field('product_cohoom_iframe_section_title', $current_ID);
$product_cohoom_iframe_section_description = get_sub_field('product_cohoom_iframe_section_description', $current_ID);
$product_cohoom_iframe_code      = get_sub_field('product_cohoom_iframe_code', $current_ID);
$iframe_bg_color = get_sub_field('iframe_bg_color', $current_ID);

if( $cohoom_iframe_hide_section != 1 ) : ?>
<section class="cohoom-iframe-section common-padding" style="background-color:<?php echo $iframe_bg_color; ?>;">
    <div class="custom-container">

        <?php if( !empty($product_cohoom_iframe_section_title) ) : ?>
            <h3 class="cohoom-iframe-title head-typ2">
                <?php echo esc_html($product_cohoom_iframe_section_title); ?>
            </h3>
        <?php endif; ?>

        <?php if( !empty($product_cohoom_iframe_section_description) ) : ?>
            <div class="cohoom-iframe-description">
                <?php echo $product_cohoom_iframe_section_description; ?>
            </div>
        <?php endif; ?>

        <?php if( !empty($product_cohoom_iframe_code) ) : ?>
            <div class="cohoom-iframe-wrapper" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1000">
                <?php 
                    // iframe code from WYSIWYG editor
                    echo $product_cohoom_iframe_code; 
                ?>
            </div>
        <?php endif; ?>

    </div>
</section>
<?php endif; ?>
