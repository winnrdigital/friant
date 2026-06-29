<?php
$args = array(
    'post_type'      => 'friant-event',
    'posts_per_page' => 10,
);

if (isset($_POST['locations']) || isset($_POST['event_types'])) {
    $tax_query = array('relation' => 'AND');

    if (!empty($_POST['locations'])) {
        $tax_query[] = array(
            'taxonomy' => 'event-location',
            'field'    => 'slug',
            'terms'    => $_POST['locations'],
        );
    }

    if (!empty($_POST['event_types'])) {
        $tax_query[] = array(
            'taxonomy' => 'event-type',
            'field'    => 'slug',
            'terms'    => $_POST['event_types'],
        );
    }

    $args['tax_query'] = $tax_query;
}

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        $event_url = get_field('event_url');
        ?>
        <a href="<?php echo esc_url($event_url); ?>" class="event-card" target="_blank">
            <div class="event-date"><?php echo esc_html( get_field('event_date') ); ?><br><small><?php echo esc_html( get_field('event_month') ); ?></small></div>
            <div class="event-content">
                <h2><?php the_title(); ?></h2>
                <p class="eventp"><?php the_excerpt(); ?></p>
            </div>
            <div class="event-link"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
        </a>
    <?php endwhile;
    wp_reset_postdata();
else :
    echo "<p class='no-events'>No events found.</p>";
endif;
?>
