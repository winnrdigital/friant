<?php 
$current_ID = get_the_ID();

$technical_specs_hide_section = get_sub_field('technical_specs_hide_section', $current_ID);
$technical_specs_section_title = get_sub_field('technical_specs_section_title', $current_ID);
$technical_space_image = get_sub_field('technical_space_image', $current_ID);
$technical_specs_section_subtitle = get_sub_field('technical_specs_section_subtitle', $current_ID);
$technical_specs_section_description = get_sub_field('technical_specs_section_description', $current_ID);
$technical_specs_loop = get_sub_field('technical_specs_loop', $current_ID);
$technical_space_bg_color = get_sub_field('technical_space_bg_color', $current_ID);
$tech_cta_button = get_sub_field('tech_cta_button', $current_ID);

if($technical_specs_hide_section != 1){
?>

<section class="pro-tech-space-section common-padding" style="background-color:<?php echo esc_attr($technical_space_bg_color); ?>;">
    <div class="custom-container">

        <div class="d-flex flex-row">
            <div class="flex-col">
                <div class="pro-tech-title-wrapper" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1000">

                    <?php if(!empty($technical_specs_section_title)): ?>
                        <h2 class="tech-title head-typ2"><?php echo esc_html($technical_specs_section_title); ?></h2>
                    <?php endif; ?>

                    <?php if(!empty($technical_specs_section_subtitle)): ?>
                        <h3 class="tech-subtitle"><?php echo esc_html($technical_specs_section_subtitle); ?></h3>
                    <?php endif; ?>

                    <?php if(!empty($technical_specs_section_description)): ?>
                        <div class="tech-desc">
                            <?php echo apply_filters('the_content', $technical_specs_section_description); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="d-flex flex-row">
            <div class="flex-col left-col align-center lft-tech-img" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1000">
                <div class="pro-tech-image-wrapper">
                    <?php if(!empty($technical_space_image)): ?>
                        <img src="<?php echo esc_url($technical_space_image['url']); ?>" alt="<?php echo esc_attr($technical_space_image['alt'] ?? ''); ?>">
                    <?php endif; ?>
                </div>
            </div>

            <div class="flex-col left-col align-center rlt-tech-cont">

                <?php if ($technical_specs_loop):

                    $total = count($technical_specs_loop);
                    $half  = ceil($total / 2);
                ?>

                <div class="tech-specs-wrapper">

                    <!-- Left Column -->
                    <div class="tech-specs-column" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1200">
                        <?php for ($i = 0; $i < $half; $i++):
                            $item = $technical_specs_loop[$i];
                        ?>
                        <div class="tech-spec-item">

                            <div class="tech-spec-left-icon">
                                <?php if (!empty($item['technical_space_icon']['url'])): ?>
                                    <img src="<?php echo esc_url($item['technical_space_icon']['url']); ?>" alt="">
                                <?php endif; ?>
                            </div>

                            <div class="tech-spec-right-content">
                                <div class="tech-inner-title"><?php echo esc_html($item['technical_specs_title']); ?></div>
                                <div class="tech-inner-info">
                                    <?php echo apply_filters('the_content', $item['technical_specs_description']); ?>
                                </div>
                            </div>

                        </div>
                        <?php endfor; ?>
                    </div>

                    <!-- Right Column -->
                    <div class="tech-specs-column" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1300">
                        <?php for ($i = $half; $i < $total; $i++):
                            $item = $technical_specs_loop[$i];
                        ?>
                        <div class="tech-spec-item">

                            <div class="tech-spec-left-icon">
                                <?php if (!empty($item['technical_space_icon']['url'])): ?>
                                    <img src="<?php echo esc_url($item['technical_space_icon']['url']); ?>" alt="">
                                <?php endif; ?>
                            </div>

                            <div class="tech-spec-right-content">
                                <div class="tech-inner-title"><?php echo esc_html($item['technical_specs_title']); ?></div>
                                <div class="tech-inner-info">
                                    <?php echo apply_filters('the_content', $item['technical_specs_description']); ?>
                                </div>
                            </div>

                        </div>
                        <?php endfor; ?>
                    </div>

                </div>
                <?php endif; ?>
            </div>
        </div>

        <?php 
        $button = get_sub_field('tech_cta_button'); 
        if( $button ): ?>
        <div class="o-button o-button-dark" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1500">
            <a class="reedispace-cta-btn" href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr($button['target'] ?: '_self'); ?>">
                <?php echo esc_html($button['title']); ?>
            </a>
        </div>
        <?php endif; ?>

    </div>
</section>

<?php } ?>
