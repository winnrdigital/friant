<?php
$current_ID = get_the_ID();

$hide_gallery_section = get_sub_field('hide_gallery_section');

$slides = get_sub_field('product_slider_section'); 
if ( empty($slides) || !is_array($slides) ) {
    return;
}

if ($hide_gallery_section != 1):
?>

<section class="home-hero-slider">
    <div class="hero-slider slick-slider">

        <?php foreach ( $slides as $index => $slide ) :

            $hide_slider_title   = $slide['hide_slider_title'] ?? 0;
            $hide_slider_content = $slide['hide_slider_content'] ?? 0;

            $img = $slide['background_image'] ?? null;
            $img_url = $img ? ($img['sizes']['full'] ?? $img['url']) : '';

            $title   = esc_html( $slide['title'] ?? '' );
            $content = wp_kses_post( $slide['content'] ?? '' );
            $link    = esc_url( $slide['link'] ?? '' );

            $position = $slide['title_position'] ?? 'left';
            $overlay_color = $slide['overlay_color'] ?? '#bf2f2b';
            $overlay_opacity = isset($slide['overlay_opacity']) ? floatval($slide['overlay_opacity']) : 0.95;
            $overlay_rgba = 'rgba(' . implode(',', hex_to_rgb($overlay_color)) . ',' . $overlay_opacity . ')';

            $hide_caption = false;
            if (
                ($title === '' || $hide_slider_title == 1) &&
                ($content === '' || $hide_slider_content == 1)
            ) {
                $hide_caption = true;
            }
        ?>

        <article class="hero-slide"
                 role="group"
                 aria-label="<?php echo esc_attr($title ?: 'Slide ' . ($index+1)); ?>"
                 style="background-image: url('<?php echo esc_url($img_url); ?>');">

            <!-- Lightbox link -->
            <a href="<?php echo esc_url($img_url); ?>" class="glightbox-slide" data-gallery="product-slider">
                <!-- Hidden img for GLightbox -->
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" style="display:none;">

                <div class="hero-overlay" style="background: <?php echo esc_attr($overlay_rgba); ?>;"></div>
                <div class="hero-inner">

                    <?php if (!$hide_caption) : ?>
                    <div class="hero-caption hero-caption--<?php echo esc_attr($position); ?>">

                        <?php if ($title && $hide_slider_title != 1) : ?>
                        <h2 class="hero-title"><?php echo $title; ?></h2>
                        <?php endif; ?>

                        <?php if ($content && $hide_slider_content != 1) : ?>
                        <div class="hero-content"><?php echo $content; ?></div>
                        <?php endif; ?>

                        <?php if ($link) : ?>
                        <a class="hero-cta" href="<?php echo $link; ?>">Learn more</a>
                        <?php endif; ?>

                    </div>
                    <?php endif; ?>

                </div>
            </a>

        </article>

        <?php endforeach; ?>

    </div>
</section>

<?php endif; ?>


<?php
function hex_to_rgb($hex) {
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) === 3) {
        return [
            hexdec(str_repeat(substr($hex,0,1),2)),
            hexdec(str_repeat(substr($hex,1,1),2)),
            hexdec(str_repeat(substr($hex,2,1),2))
        ];
    }
    return [
        hexdec(substr($hex,0,2)),
        hexdec(substr($hex,2,2)),
        hexdec(substr($hex,4,2))
    ];
}
?>

<script>
jQuery(document).ready(function($){
    // Initialize Slick slider
    $('.hero-slider').slick({
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1500,
        fade: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true
    });

    // Initialize GLightbox
    const lightbox = GLightbox({
        selector: '.glightbox-slide',
        touchNavigation: true,
        loop: true,
    });
});
</script>
