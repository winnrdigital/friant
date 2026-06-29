<?php
/*
Template Name: Revit Page
*/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() ); ?>



<div id="main-content">

<!------- hero section --------->

			<div class="hero-wrap" style="background-image: url(<?php the_field('hero_image'); ?>);">
            <div class="hero-inner">
            <div class="hero-content">
            <h1><?php the_field('hero_title'); ?></h1>
            </div><!--hero-content-->
            </div><!--hero-inner-->
            </div><!--hero-wrap-->




<!------- content --------->

<?php 
  $file_path = get_stylesheet_directory() . '/page-content/' . sanitize_file_name("revit.txt");

  if ( ! file_exists( $file_path ) ) {
      return 'Error: File not found.';
  }

  global $wp_filesystem;
  if ( empty( $wp_filesystem ) ) {
      require_once( ABSPATH . 'wp-admin/includes/file.php' );
      WP_Filesystem();
  }
  $content = $wp_filesystem->get_contents_array( $file_path );

  $uploads = wp_upload_dir();

?>

<div class="resource-center-wrap">
  <h2 style="width: 60%; margin: 2rem auto; text-align: center;"><?php echo wp_strip_all_tags(get_the_excerpt()); ?></h2>

  <?php if( have_rows('brochures') ): ?>
  <div class="resource-center-section">
    <div class="resource-inner">

    <h2>Seating</h2>
    <?php 
      foreach ($content as $row) {
        $filename = str_replace(" ", "-", str_replace(" - ", "-", $row));
        echo "<div class=\"pdf-item\">";
        echo "<div class=\"pdf-item-lt\">" . $row . "</div>";
        echo "<div class=\"pdf-item-rt\"><a href=\"" . $uploads['baseurl'] . "/2026/06/Friant-" . $filename . ".rfa\" target=\"_blank\"><i class=\"fas fa-download\"></i></a></div>";
        echo "</div>";
      }
    ?>

    </div><!--resource-inner-->
  </div><!--resource-center-section-->
  <?php endif; ?>

</div><!--resource-center-wrap-->



<!------------- footer ---------------->

<div class="et_pb_row et_pb_row_0">
				<div class="et_pb_column et_pb_column_4_4 et_pb_column_0    et_pb_css_mix_blend_mode_passthrough et-last-child">
				
				
				<div class="et_pb_module et_pb_code et_pb_code_0">
				
				
				<div class="et_pb_code_inner">
					<div class="workstyles">
  <h2>
    all workstyles welcome
  </h2>
  <p>
    Create a workplace that positions you for success. Collaborators can work together. And focus when they must. Standers can stand and sitters sit. Individual contributors feel empowered. Executives feel well served. 
  </p> 
  
  <a href="https://friant.com/california/">
   <div class="btn2">
   Find a dealer
   </div>
  </a>
  
</div>
				</div> <!-- .et_pb_code_inner -->
			</div> <!-- .et_pb_code -->
			</div> <!-- .et_pb_column -->
			</div> <!-- .et_pb_row -->

</div> <!-- #main-content -->

<?php

get_footer();
