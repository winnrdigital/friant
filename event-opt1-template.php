<?php
/*
Template Name: Event Opt 1
*/

get_header();

?>

    <section class="hero d-flex align-items-center justify-content-center text-center event-page" style=" background: url('<?php the_field('hero_image'); ?>') no-repeat center center/cover;">
        <div class="overlay">
            <h4><?php echo esc_html( get_field('hero_heading') ); ?></h4>
            <h1><?php echo wp_kses_post ( get_field('hero_sub-heading') ); ?></h1>
            <!--
            <div id="countdown" class="countdown">
                <ul class="d-flex">
                    <li><span id="days"></span>days</li>
                    <li><span id="hours"></span>Hours</li>
                    <li><span id="minutes"></span>Minutes</li>
 					  <li><span id="seconds"></span>seconds</li>
                </ul>
            </div>
            -->
        </div>
    </section>
	
<section>
    <div class="event-slider wrapper container">
        <div class="image-slider">
            <?php if (have_rows('event_image')) : ?>
                <?php while (have_rows('event_image')) : the_row(); ?>
                    <div><img src="<?php the_sub_field('add_image'); ?>"></div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

	
    <section class="text-center my-5 common-title event-page">
        <h2><?php echo esc_html( get_field('common_title_heading') ); ?></h2>
        <h5><?php echo esc_html( get_field('common_sub_heading') ); ?></h5>
        <h3 class="text-danger"><?php echo esc_html( get_field('timeline') ); ?></h3>
		<?php 
		$common_button_link = get_field('common_button_link');
		if( $common_button_link ): 
			$link_url = $common_button_link['url'];
			$link_title = $common_button_link['title'];
			$link_target = $common_button_link['target'] ? $link['target'] : '_blank';
            // echo '<a type="button" class="btn event-btn" href="' . esc_url($link_url) . '" target="_blank">' . esc_html( $link_title ) . '</a>';

		endif; ?>
    </section>

    <section class="container-fluid text-center my-8 event-page">
        <div class="row g-4">
            <div class="col-lg-4 col-md-12 red-bg p-4">
                <div class="card-box">
                <h3><?php echo esc_html( get_field('first_box_heading') ); ?></h3>
                <p><?php echo esc_html( get_field('first_box_sub_heading') ); ?></p>
            </div>
            </div>
            <div class="col-lg-4 col-md-12 bg-light p-4">
                <div class="card-box">
                <h3 class="text-danger"><?php echo esc_html( get_field('second_box_heading') ); ?></h3>
                <p><?php echo esc_html( get_field('second_box_sub_heading') ); ?></p>
            </div>
            </div>
            <div class="col-lg-4 col-md-12 red-bg p-4">
                <div class="card-box">
                <h3><?php echo esc_html( get_field('third_box_heading') ); ?></h3>
                <p><?php echo esc_html( get_field('third_box_sub_heading') ); ?></p>
            </div>
            </div>
        </div>
    </section>

    <section class="container-fluid text-center common-title my-8 event-page">
        <h2><?php echo esc_html( get_field('event_tagline_text') ); ?></h2>
    </section>

    <section class="container-fluid  event-page ">
        <div class="row text-center map-section ">
        <div class="col-lg-6  map-content common-title py-5">
        <h2><?php echo esc_html( get_field('map_heading') ); ?></h2>
        <h5><?php echo esc_html( get_field('map_sub_heading') ); ?></h5>
		<?php 
		$map_button_url = get_field('map_button_url');
		if( $map_button_url ): 
			$link_url = $map_button_url['url'];
			$link_title = $map_button_url['title'];
			$link_target = $map_button_url['target'] ? $link['target'] : '_blank';
            // echo '<a type="button" class="btn btn-danger event-btn" href="' . esc_url($link_url) . '" target="_blank">' . esc_html( $link_title ) . '</a>';
		endif; ?>
        <h5 class="text-red mt-4 mb-0"><?php echo esc_html( get_field('map_bottom_sub_title') ); ?></h5>
      
    </div>
    <div class="col-lg-6 map-box p-0">
<!--         <div style="width: 100%"> -->
				<?php
global $post;
$map_iframe = get_field('map_iframe', $post->ID);

if ($map_iframe) {
    // Allow iframes explicitly
    $allowed_html = array(
        'iframe' => array(
            'src' => array(),
            'width' => array(),
            'height' => array(),
            'frameborder' => array(),
            'allow' => array(),
            'allowfullscreen' => array(),
        ),
    );

    echo '<div style="width: 100%">' . wp_kses($map_iframe, $allowed_html) . '</div>';
} else {
    echo '<p>No map available</p>'; // Debugging message
}
?>
<!-- 		</div> -->
		

</div>
    </div>
    </section>

    <section class="text-center red-bg party-section  flex-center event-page">
        <div class="row">
        <div class="col-lg-12 party-content ">
        <h2><?php echo esc_html( get_field('banner_heading') ); ?></h2>
        <h5><?php echo esc_html( get_field('banner_sub_heading') ); ?></h5>
        </div>

        <div class="col-lg-6 party-button d-flex flex-center">
			<?php 
                $banner_button_url = get_field('banner_button_url');
                if($banner_button_url):
                    $link_url = $banner_button_url['url'];
                    $link_title = $banner_button_url['title'];
                    $link_target = $banner_button_url['target'] ? $link['target'] : '_blank';
                    // echo '<a type="button" class="btn btn-danger event-btn" href="' . esc_url($link_url) . '" target="_blank">' . esc_html( $link_title ) . '</a>';
                endif;
            ?>
        </div>
    </div>
    </section>

   <?php if( get_field('show_sponsor_section') ): ?>
<section class="container-fluid text-center my-8 common-title event-page footer-btm-section">
    <h3><?php echo esc_html( get_field('sponsor_heading') ); ?></h3>
    
    <?php if( get_field('sponsor_image') ): ?>
        <img src="<?php the_field('sponsor_image'); ?>" alt="Bentley Logo" class="img-fluid">
    <?php endif; ?>
</section>
<?php endif; ?>


<?php get_footer(); ?>