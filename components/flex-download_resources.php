<?php
$current_ID = get_the_ID();

$download_resources_hide_section = get_sub_field('download_resources_hide_section', $current_ID);
$download_resource_title         = get_sub_field('download_resource_title', $current_ID);

if ($download_resources_hide_section != 1): ?>
<section class="download-resources-section common-padding">
    <div class="custom-container">
        <div class="d-flex flex-row">
            <div class="flex-col left-col align-center">

                <?php if (!empty($download_resource_title)) : ?>
                    <h3 class="rt-product-title head-typ2">
                        <?php echo esc_html($download_resource_title); ?>
                    </h3>
                <?php endif; ?>

                <?php if (have_rows('download_resources_loop')) : ?>
                    <div class="dowanload-loop-wrapper">

                        <?php while (have_rows('download_resources_loop')) : the_row();

                            // New Background Image Field
                            $bg_image = get_sub_field('resource_background_image');
                            $bg_url   = !empty($bg_image['url']) ? $bg_image['url'] : '';

                            // Old Fields
                            $icon  = get_sub_field('download_resources_icon');
                            $title = get_sub_field('download_resources_title');
                            $link  = get_sub_field('download_resources_link');
                        ?>

                        <div class="download-item" data-aos="fade-up" data-aos-easing="ease-in-sine" data-aos-duration="1000"
                             <?php if ($bg_url) : ?>
                                style="background-image: url('<?php echo esc_url($bg_url); ?>'); 
                                       background-size: cover;
                                       background-position: center;
                                       background-repeat: no-repeat;"
                             <?php endif; ?>
                        >

                            <?php if (!empty($icon)) : ?>
                                <div class="download-icon">
                                    <img src="<?php echo esc_url($icon['url']); ?>"
                                         alt="<?php echo esc_attr($icon['alt'] ?: $title); ?>">
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($title)) : ?>
                                <h4 class="download-title"><?php echo esc_html($title); ?></h4>
                            <?php endif; ?>

                            <?php if (!empty($link)) : ?>
                                <a class="download-link"
                                   href="<?php echo esc_url($link['url']); ?>"
                                   target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
                                   <?php echo esc_html($link['title']); ?>
                                </a>
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
