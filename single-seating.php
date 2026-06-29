<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">

<div class="hero-wrap" style="background-image: url(<?php the_field('hero'); ?>);">
            <div class="hero-inner">
            <div class="hero-content">
            <h1><?php the_field('title'); ?></h1>
            <h2><?php the_field('sub_title'); ?></h2>
            </div><!--hero-content-->
            </div><!--hero-inner-->
            </div><!--hero-wrap-->
    
    
</div> <!-- #main-content -->

<?php

get_footer();
