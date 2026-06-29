<?php
/*
Template Name: Reddispace Collection
*/
get_header();
$is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID());
$show_navigation = get_post_meta(get_the_ID(), '_et_pb_project_nav', true);

?>
<div id="main-content">
<?php
if (have_rows('product_single_page_sections')) {
  while (have_rows('product_single_page_sections')) {
    the_row();
    get_template_part('components/flex', get_row_layout());
  }
}
?>
</div>

<?php get_footer(); ?>

