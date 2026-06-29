<?php
$current_ID = get_the_ID();

$product_gallery_hide_section = get_sub_field('product_gallery_hide_section', $current_ID);
$product_gallery = get_sub_field('product_gallery', $current_ID);

if ($product_gallery_hide_section != 1):
?>
<section class="product-gallery-section common-padding">
    <div class="">
        <?php if (!empty($product_gallery) && is_array($product_gallery)) : ?>
            <div class="product-gallery-wrapper d-flex flex-row flex-wrap">
                <?php foreach ($product_gallery as $gallery_image) : 
                    // ACF image array typically provides ID, url, alt, sizes
                    $img_id      = isset($gallery_image['ID']) ? intval($gallery_image['ID']) : 0;
                    $img_alt     = !empty($gallery_image['alt']) ? $gallery_image['alt'] : '';
                    // get full size URL for lightbox
                    $full_url    = $img_id ? wp_get_attachment_image_url($img_id, 'full') : ($gallery_image['url'] ?? '');
                    // get thumbnail (medium) for display
                    $thumb_html  = $img_id ? wp_get_attachment_image($img_id, 'medium') : '<img src="' . esc_url($gallery_image['url']) . '" alt="' . esc_attr($img_alt) . '">';
                ?>  
                <div class="gallery-item">
                    <a href="<?php echo esc_url($full_url); ?>"
                       class="product-glightbox"
                       data-gallery="product-gallery"
                       title="<?php echo esc_attr($img_alt); ?>">
                        <?php echo $thumb_html; ?>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
