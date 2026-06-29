<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( ! $is_page_builder_used ) : ?>

					<h1 class="entry-title main_title"><?php the_title(); ?></h1>
				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_featured_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
				?>

				<?php endif; ?>

					<div class="entry-content">
					<?php
						the_content();

						if ( ! $is_page_builder_used )
							wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div> <!-- .entry-content -->

				<?php
					if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
				?>

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

<?php if ( ! $is_page_builder_used ) : ?>

			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

<?php endif; ?>
<?php 
	$cta_button = get_field('cta_button');
	//pr($recommended_product);
	if(!empty($cta_button) && $cta_button['enable'] == 1){			
	?>
	<div class="overview-cta cta_buttons">
		<div class="overview-cta-inner">				
			<?php				
			echo !empty($cta_button['cta_bt_heading']) ?'<h2>'.$cta_button['cta_bt_heading'].'</h2>':''; 
			$cta_iconbox = $cta_button['buttons'];
			if(!empty($cta_iconbox)){
				echo '<div class="iconbox">';
				foreach ($cta_iconbox as $key => $value) {
					echo '<div class="iconitem">';
					echo '<img src="'.$value['button_icon'].'" width="64" height="64">';
					if(!empty($value['button_link'])){
						echo '<a href="'.$value['button_link']['url'].'" target="'.$value['button_link']['target'].'">'.$value['button_link']['title'].'</a>';
						}
					echo '</div>';
				}
				echo '</div>';
			}?>
		</div>
	</div>
	<?php } ?>

</div> <!-- #main-content -->

<?php

get_footer();
