<?php
/*
Template Name: Contact Page
*/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() ); ?>

<div id="main-content">


<h2>Search By State</h2>


<form class="form-wrap">
<select onchange='location = this.options[this.selectedIndex].value;'>


<option> Select </option>


<?php
global $post;
$args = array( 
'posts_per_page' => -1,
'post_type' => 'reps',
'orderby' => 'title',);
$posts = get_posts($args);
foreach( $posts as $post ) : setup_postdata($post); ?>
   <option><?php the_title(); ?></option>   
<?php endforeach; ?>
</select>
</form>


</div> <!-- #main-content -->

<?php

get_footer();
