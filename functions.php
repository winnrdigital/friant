<?php
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', [], rand(0,999) );
    wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/css/slick.css', [], rand(0,999) );
	 // AOS (Animate On Scroll) styles
    wp_enqueue_style( 'aos-style', get_stylesheet_directory_uri() . '/css/aos.css', [], rand(0,999) );
    wp_enqueue_style( 'fontawesome-style1', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


 
/********* flex slider ***********/

function my_add_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('flexslider', get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'));
    wp_enqueue_script('slickslider', get_stylesheet_directory_uri().'/js/slick.min.js', array('jquery'),'',true);
	 // AOS (Animate On Scroll)
    wp_enqueue_script('aos-js', get_stylesheet_directory_uri() . '/js/aos.js', ['jquery'], rand(0,999), true);
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri().'/js/custom.js', array('jquery'), filemtime(get_stylesheet_directory().'/js/custom.js'), true);
}
add_action('wp_enqueue_scripts', 'my_add_scripts');



function my_add_styles() {
    wp_enqueue_style('flexslider', get_stylesheet_directory_uri().'/flexslider.css');
    wp_enqueue_style('header', get_stylesheet_directory_uri() . '/css/header.css', [], rand(0,999) );
    if (get_post_type() == "page"){
        if (is_page_template('reddispace-collection-template.php')) {
            wp_enqueue_style('page-template', get_stylesheet_directory_uri() . '/css/reddispace-collection.css', [], rand(0,999));
        } else if (is_page_template('reddispace-contact-template.php')) {
            wp_enqueue_style('page-template', get_stylesheet_directory_uri() . '/css/reddispace-contact.css', [], rand(0,999));
        }
    } else if (get_post_type() == "product") {
        if (get_the_category($id)[0]->slug == "reddispace") {
            wp_enqueue_style('page-template', get_stylesheet_directory_uri() . '/css/reddispace-product.css', [], rand(0,999));
         }
    }
}
add_action('wp_enqueue_scripts', 'my_add_styles', 11);

/********** Product Post Type ***********/

function codex_custom_init() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Product', 'Post Type General Name'),
        'singular_name'       => _x( 'Product', 'Post Type Singular Name'),
        'menu_name'           => __( 'Products'),
    );
	
     $args = array(
		'label'               => __( 'Product'),
		'taxonomies'          => array( 'category', 'post_tag' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes',),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
		'menu_icon'           => 'dashicons-cart',
		'show_admin_column' => true, 
            'show_ui' => true,
            'query_var' => true,
      );
 register_post_type( 'product', $args );
    }
    add_action( 'init', 'codex_custom_init', 0);
	
	
	
	
/********** Sales Rep Post Type ***********/

function custom_post_type() {
 

    $labels = array(
        'name'                => _x( 'Sales Rep', 'Post Type General Name'),
        'singular_name'       => _x( 'Sales Rep', 'Post Type Singular Name'),
        'menu_name'           => __( 'Sales Reps'),
    );
     
     
    $args = array(
        'label'               => __( 'Sales Rep'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes',),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
		'query_var'           => true,
        'capability_type'     => 'page',
		'menu_icon'           => 'dashicons-businessman',
		
		
        
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );
     

    register_post_type( 'reps', $args );
 
}
 
 
add_action( 'init', 'custom_post_type', 0 );



/********** Fabrics Post Type ***********/

function post_type() {

    $labels = array(
        'name'                => _x( 'Fabrics', 'Post Type General Name'),
        'singular_name'       => _x( 'Fabrics', 'Post Type Singular Name'),
        'menu_name'           => __( 'Fabrics'),
    );
     
     
    $args = array(
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes',),
            'hierarchical' => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 4,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
		'menu_icon'           => 'dashicons-grid-view',
		
		
        
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );
     

    register_post_type( 'fabrics', $args );
 
}
 
 
add_action( 'init', 'post_type', 0 );

add_action( 'init', 'build_taxonomies', 0 );  
function build_taxonomies() {  
    register_taxonomy(  
    'news_type',  
    'fabrics',  // this is the custom post type(s) I want to use this taxonomy for
    array(  
        'hierarchical' => false,  
        'label' => 'Fabric Categories',  
        'query_var' => true,  
        'rewrite' => true  
    )  
);  
}



/********** Finishes Post Type ***********/

function custom_post_type2() {
 

    $labels = array(
        'name'                => _x( 'Finishes', 'Post Type General Name'),
        'singular_name'       => _x( 'Finishes', 'Post Type Singular Name'),
        'menu_name'           => __( 'Finishes'),
    );
     
     
    $args = array(
        'label'               => __( 'Finishes'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes',),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 4,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
		'query_var'           => true,
        'capability_type'     => 'page',
		'menu_icon'           => 'dashicons-grid-view',
		
		
        
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
    );
     

    register_post_type( 'Finishes', $args );
 
}
 
 
add_action( 'init', 'custom_post_type2', 0 );

add_action( 'init', 'build_taxonomies2', 0 );  
function build_taxonomies2() {  
    register_taxonomy(  
    'finish_types',  
    'finishes',  // this is the custom post type(s) I want to use this taxonomy for
    array(  
        'hierarchical' => false,  
        'label' => 'Finish Categories',  
        'query_var' => true,  
        'rewrite' => true  
    )  
);  
}


// renaming project custom post type


function rename_project_cpt() {
 
register_post_type( 'project',
	array(
	'labels' => array(
	'name'          => __( 'Visual Gallery', 'Post Type General Name' ), // change the text portfolio to anything you like
	'singular_name' => __( 'Visual Gallery', 'Post Type General Name' ), // change the text portfolio to anything you like
	),
	'has_archive'  => true,
	'menu_position'       => 4,
	'hierarchical' => true,
    'menu_icon'    => 'dashicons-images-alt2',
	'public'       => true,	
	'rewrite'      => array( 'slug' => 'solution', 'with_front' => true ), 
    'supports'     => array()         
    ));
}
add_action( 'init', 'rename_project_cpt' );

	
/************ footer Options *****************/	
	if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}


// Begin custom image size for Portfolio Thumbs
add_filter( 'et_pb_portfolio_image_height', 'port_size_h' );
add_filter( 'et_pb_portfolio_image_width', 'port_size_w' );

function port_size_h($height) {
return '350';
}

function port_size_w($width) {
return '580';
}

add_image_size( 'custom-port-size', 2050, 2050 );
add_image_size( 'visual-gallery-images', 1920, 1080, true );   

// End custom image size for Portfolio Thumbs

// design request folder
define( 'WPCF7_UPLOADS_TMP_DIR', 'wp-content/uploads/design-request' );

//AFC pro remove <p>

function acf_wysiwyg_remove_wpautop() {
    remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop', 15);


// product sidebar widget

register_sidebar( array(
'name' => 'Product Archive Sidebar',
'id' => 'product-archive-sidebar',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );


// product sidebar widget

register_sidebar( array(
'name' => 'Seating Archive Sidebar',
'id' => 'seating-archive-sidebar',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

function pr($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

add_filter( 'salesforce_w2l_api_url', 'my_w2l_api_url', 10, 2 );
function my_w2l_api_url( $url, $form_type ){
    return 'https://winnr.digital/friant/';
}

function search_all_content_types($query) {
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', array('post', 'page', 'product')); // Add any custom post types you want here
    }
    return $query;
}
add_filter('pre_get_posts', 'search_all_content_types');

// Register a shortcode to display the case study number box
function case_study_number_box_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <?php if( have_rows('number_box_section') ): ?>
        <div class="case-study-container">
            <?php while( have_rows('number_box_section') ): the_row();
                // Get sub field values
                $number = get_sub_field('number');
                $number_title = get_sub_field('number_title');
                $number_description = get_sub_field('number_description');
            ?>
                <div class="case-study-card">
                    <?php if( $number ): ?>
                        <h2 class="case-study-number"><?php echo esc_html($number); ?></h2>
                        <div class="case-study-underline"></div>
                    <?php endif; ?>

                    <?php if( $number_title ): ?>
                        <h3 class="case-study-title"><?php echo esc_html($number_title); ?></h3>
                    <?php endif; ?>

                    <?php if( $number_description ): ?>
                        <p class="case-study-description"><?php echo esc_html($number_description); ?></p>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php
    return ob_get_clean(); // Return the output buffer content
}
add_shortcode('case_study_number_box', 'case_study_number_box_shortcode');

function case_study_random_shortcode() {
    ob_start(); // Start output buffering

    // Query 3 random posts from custom post type "case-study"
    $args = array(
        'post_type'      => 'case-study',
        'posts_per_page' => 3,
        'orderby'        => 'rand', // Random order
        'post_status'    => 'publish',
    );

    $query = new WP_Query($args);

    // Check if posts exist
    if ($query->have_posts()) {
        ?>
        <div class="customer-stories-container">
            <h2 class="customer-stories-heading">More Customer Stories</h2>
            <?php while ($query->have_posts()) : $query->the_post(); 
                // Get ACF field "company_name"
                $company_name = get_field('company_name'); // ACF function
                ?>
                <div class="customer-story">
                    <p class="story-company">
                        <?php echo esc_html($company_name ? $company_name : ''); ?>
                    </p>
                    <p class="story-title">
                        <strong>Case Study Title:</strong> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </p>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
        wp_reset_postdata(); // Reset post data
    } else {
        // Fallback if no posts are found
        echo '<p>No case studies available at the moment.</p>';
    }

    return ob_get_clean(); // Return the buffered output
}

// Register the shortcode
add_shortcode('case_study_random', 'case_study_random_shortcode');

function case_study_latest_shortcode() {
    ob_start();
    
    // Query to get the latest case-study post
    $args = array(
        'post_type'      => 'case-study',
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            // Get the company name ACF field
            $company_name = get_field('company_name'); // Replace 'company_name' with the correct ACF field name
            
            // Get the featured image
            $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
            
            // Default to a placeholder image if no featured image exists
            if (!$featured_image) {
                $featured_image = 'https://via.placeholder.com/600x300';
            }

            // Output the HTML structure
            ?>
            <div class="case-study-card">
                <div class="case-study-image">
                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>">
                </div>
                <div class="case-study-content">
                    <p class="case-study-company"><?php echo esc_html($company_name ?: 'COMPANY'); ?></p>
                    <p class="case-study-title">
                        <strong>Case Study Title:</strong> <?php the_title(); ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="case-study-button">READ MORE</a>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p>No case study found.</p>';
    }

    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('case_study_latest', 'case_study_latest_shortcode');
// Hook into the wp_head action to inject custom CSS into the <head> section of the page
add_action('wp_head', function() {
    // Check if we're viewing a single post of the 'case-study' custom post type
    if (is_singular('case-study')) {

        // Get the value of the ACF true/false field 'right_information_section'
        $right_info = get_field('right_information_section');

        // Define an array of CSS class names that should be controlled by the ACF field
        $classes = [
            'cate-main-title', 'cate-p', 'et_pb_column.et_pb_column_1_3.et_pb_column_2_tb_body.singlepage-sidebar.et_pb_css_mix_blend_mode_passthrough.et_pb_column_single'
        ];

        // Check if the ACF field is set to FALSE
        if (!$right_info) {
            $css = ''; // Initialize an empty CSS string

            // Loop through each class and add CSS to hide it
            foreach ($classes as $class) {
                $css .= ".$class { display: none !important; } "; 
                // This will generate CSS like: .cate-main-title { display: none !important; }
            }

            // Output the generated CSS inside <style> tags to apply it on the frontend
            echo "<style>$css</style>";
        }
    }
});
// Hook into wp_head to inject custom CSS into the <head> section of the page
add_action('wp_head', function() {
    // Check if we're on a single 'case-study' post
    if (is_singular('case-study')) {
        
        // Get the ACF Repeater field data (replace 'repeater_field_name' with your actual field name)
        $repeater_data = get_field('number_box_section');

        // If the repeater field is empty or has no rows, apply CSS to hide the Divi row
        if (empty($repeater_data)) {
            echo '<style>.number_box_novalue { display: none !important; }</style>';
        }
    }
});

function register_friant_event_post_type() {
    $labels = array(
        'name'               => 'Friant Events',
        'singular_name'      => 'Friant Event',
        'menu_name'          => 'Events',
        'add_new'            => 'Add New Event',
        'add_new_item'       => 'Add New Event',
        'edit_item'          => 'Edit Event',
        'new_item'           => 'New Event',
        'view_item'          => 'View Event',
        'all_items'          => 'All Events',
        'search_items'       => 'Search Events',
        'not_found'          => 'No events found.',
        'not_found_in_trash' => 'No events found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'friant-event'),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-calendar', // WordPress calendar icon
        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'taxonomies'         => array('event-location', 'event-type'),
        'show_in_rest'       => true, // Enables Gutenberg support
    );

    register_post_type('friant-event', $args);
}
add_action('init', 'register_friant_event_post_type');

function register_friant_event_taxonomies() {
    // Register Event Location Taxonomy
    $location_labels = array(
        'name'          => 'Event Locations',
        'singular_name' => 'Event Location',
        'search_items'  => 'Search Locations',
        'all_items'     => 'All Locations',
        'edit_item'     => 'Edit Location',
        'update_item'   => 'Update Location',
        'add_new_item'  => 'Add New Location',
        'new_item_name' => 'New Location Name',
        'menu_name'     => 'Event Locations',
    );

    $location_args = array(
        'hierarchical'      => true, // Acts like categories
        'labels'            => $location_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'event-location'),
    );

    register_taxonomy('event-location', array('friant-event'), $location_args);

    // Register Event Type Taxonomy
    $type_labels = array(
        'name'          => 'Event Types',
        'singular_name' => 'Event Type',
        'search_items'  => 'Search Types',
        'all_items'     => 'All Types',
        'edit_item'     => 'Edit Type',
        'update_item'   => 'Update Type',
        'add_new_item'  => 'Add New Type',
        'new_item_name' => 'New Type Name',
        'menu_name'     => 'Event Types',
    );

    $type_args = array(
        'hierarchical'      => true, // Acts like categories
        'labels'            => $type_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'event-type'),
    );

    register_taxonomy('event-type', array('friant-event'), $type_args);
}
add_action('init', 'register_friant_event_taxonomies');

//Friant Event Post Type
function filter_events() {
    $locations = isset($_POST['locations']) ? array_filter($_POST['locations']) : [];
    $event_types = isset($_POST['event_types']) ? array_filter($_POST['event_types']) : [];
    $show_all = isset($_POST['show_all']) && $_POST['show_all'] == 1;

    $args = array(
        'post_type'      => 'friant-event',
        'posts_per_page' => -1,
    );

    // ✅ If no filters are applied, show all posts
    if (!$show_all) {
        $tax_query = array('relation' => 'OR');

        if (!empty($locations)) {
            $tax_query[] = array(
                'taxonomy' => 'event-location',
                'field'    => 'slug',
                'terms'    => $locations,
            );
        }

        if (!empty($event_types)) {
            $tax_query[] = array(
                'taxonomy' => 'event-type',
                'field'    => 'slug',
                'terms'    => $event_types,
            );
        }

        if (!empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        }
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
        echo '<p class="no-events">No events found.</p>';
    endif;

    die();
}
add_action('wp_ajax_filter_events', 'filter_events');
add_action('wp_ajax_nopriv_filter_events', 'filter_events');

function load_bootstrap_for_events() {
    if (is_post_type_archive('friant-event') || is_singular('friant-event')) {
        wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    }
}
add_action('wp_enqueue_scripts', 'load_bootstrap_for_events');
function custom_post_type_friant_event() {
    $args = array(
        'label'               => __('Events', 'textdomain'),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'events'), // Updated slug
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'        => true, // Enables Gutenberg editor
    );
    
    register_post_type('friant-event', $args);
}
add_action('init', 'custom_post_type_friant_event');

add_filter('upload_mimes', function() {
	$mimes = [
	  'dwg' => 'application/acad',
	];
	return $mimes;
});

// only for event op1 page
function conditionally_enqueue_assets() {
    if (is_page('friant-event')) { // Change slug if needed
        wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
        wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css');
        wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css');
        wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');

        wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js', array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'conditionally_enqueue_assets');

/*For gallery lightbox*/
function theme_enqueue_product_gallery_lightbox() {
    // GLightbox CSS & JS from CDN (you can replace w/ local files if preferred)
    wp_enqueue_style( 'glightbox-css', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css', array(), '3.2.0' );
    wp_enqueue_script( 'glightbox-js', 'https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js', array(), null, true );

    // Custom init script - add inline to ensure it runs after GLightbox
    $init_js = "
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof GLightbox !== 'undefined') {
            GLightbox({
                selector: '.product-glightbox',
                touchNavigation: true,
                loop: true,
                zoomable: true,
                plyr: {
                    css: 'https://cdn.plyr.io/3.6.8/plyr.css',
                    js: 'https://cdn.plyr.io/3.6.8/plyr.min.js'
                }
            });
        }
    });
    ";
    wp_add_inline_script( 'glightbox-js', $init_js );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_product_gallery_lightbox' );


// -----------------------------------------------------
// 1. Allow JPG, JPEG, PNG, WEBP, GIF (and SVG optional)
// -----------------------------------------------------
function my_custom_upload_mime_types( $mime_types ) {

    $mime_types['jpg']  = 'image/jpeg';
    $mime_types['jpeg'] = 'image/jpeg';
    $mime_types['png']  = 'image/png';
    $mime_types['gif']  = 'image/gif';
    $mime_types['webp'] = 'image/webp';

    // Uncomment this if you want SVG support:
    // $mime_types['svg'] = 'image/svg+xml';

    return $mime_types;
}
add_filter( 'upload_mimes', 'my_custom_upload_mime_types' );


// -----------------------------------------------------
// 2. Fix WP's incorrect MIME/extension detection
// (prevents "file cannot be processed" errors)
// -----------------------------------------------------
function my_fix_filetype_and_ext( $types, $file, $filename, $mimes ) {

    $wp_filetype = wp_check_filetype( $filename, $mimes );

    if ( in_array( $wp_filetype['ext'], array( 'jpg', 'jpeg', 'png', 'gif', 'webp' ) ) ) {
        $types['ext']  = $wp_filetype['ext'];
        $types['type'] = $wp_filetype['type'];
    }

    return $types;
}
add_filter( 'wp_check_filetype_and_ext', 'my_fix_filetype_and_ext', 99, 4 );


// -----------------------------------------------------
// 3. Mark JPG, JPEG, PNG, GIF, WEBP as displayable images
// (fixes "this file cannot be processed by the server")
// -----------------------------------------------------
function my_displayable_image_types( $result, $path ) {

    if ( $result === false ) {

        $allowed_image_types = array(
            IMAGETYPE_JPEG,
            IMAGETYPE_PNG,
            IMAGETYPE_GIF,
            IMAGETYPE_WEBP
        );

        $info = @getimagesize( $path );

        if ( ! empty( $info ) && in_array( $info[2], $allowed_image_types, true ) ) {
            return true;
        }
    }

    return $result;
}
add_filter( 'file_is_displayable_image', 'my_displayable_image_types', 10, 2 );
add_action('wp_footer', function() { ?>
<script>
(function() {
  var style = `
    html, body {
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
      height: 100% !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      overflow: hidden !important;
    }
    img {
      max-width: 100% !important;
      max-height: 100% !important;
      width: auto !important;
      height: auto !important;
      object-fit: contain !important;
      display: block !important;
      margin: auto !important;
    }
  `;

  function injectStyle(iframe) {
    try {
      var doc = iframe.contentDocument || iframe.contentWindow.document;
      // Inject immediately into whatever state the doc is in
      if (doc.head) {
        var el = doc.createElement('style');
        el.textContent = style;
        doc.head.appendChild(el);
      } else {
        // doc not ready yet, write directly
        doc.open();
        doc.write('<style>' + style + '</style>');
        doc.close();
      }
    } catch(e) { console.log(e); }
  }

  // Intercept iframe src BEFORE it loads by watching srcdoc/src attribute
  var observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      // New iframe added
      if (mutation.addedNodes) {
        mutation.addedNodes.forEach(function(node) {
          if (node.nodeType === 1) {
            var iframe = node.classList && node.classList.contains('html5lightbox-web-iframe')
              ? node
              : node.querySelector && node.querySelector('.html5lightbox-web-iframe');

            if (iframe) {
              // Hide iframe until style is injected — prevents flash
              iframe.style.visibility = 'hidden';

              iframe.addEventListener('load', function() {
                injectStyle(iframe);
                // Small delay then show — ensures style applied before visible
                setTimeout(function() {
                  iframe.style.visibility = 'visible';
                }, 30);
              });
            }
          }
        });
      }
    });
  });

  observer.observe(document.body, { childList: true, subtree: true });
})();
</script>
<?php });