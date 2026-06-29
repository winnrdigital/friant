<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

$show_navigation = get_post_meta( get_the_ID(), '_et_pb_project_nav', true );

?>

<div id="main-content">
<?php /* ?>
<!------- hero section --------->
<div class="hero-wrap" style="background-image: url(<?php the_field('fabric_hero_image', 'options'); ?>);">
  <div class="hero-inner">
    <div class="hero-content">
      <h1><?php the_field('fabric_hero_title', 'options'); ?></h1>
      <h2><?php the_field('fabric_hero_subtitle', 'options'); ?></h2>
    </div><!--hero-content-->
  </div><!--hero-inner-->
</div><!--hero-wrap-->
<div class="fabric-title-wrap">
<h2><?php the_field('fabric_choices_title', 'options'); ?></h2>
<p><?php the_field('fabric_choices_content', 'options'); ?></p>
</div>
<!------- all fabrics section --------->    
<?php */ ?>

<?php $fabric_header = get_field('fabric_header', 'options'); 
if(!empty($fabric_header) && $fabric_header['enable'] == 1){
  $detailsheading = $fabric_header['title'];
  $detailstext = $fabric_header['text'];
  $request_sample_url = $fabric_header['request_sample_url'];
  $download_link_resources = $fabric_header['download_link_resources'];
  ?>
  <div class="overview-cta details-cta fabric-cta">
    <div class="overview-cta-inner">
        <?php echo !empty($detailsheading)?'<h2>'.$detailsheading.'</h2>':''; ?>
        <?php echo !empty($detailstext) ? $detailstext:''; ?>
        <?php
        if(!empty($request_sample_url)){
          echo '<p class="request_sample_url"><a href="'.$request_sample_url.'" target="_blank">Download Sample</a></p>';
        }
        if(!empty($download_link_resources) && !empty($download_link_resources['title']) && !empty($download_link_resources['link'])){ ?>
          <div class="pdf-item resources-d-link">            
            <div class="pdf-item-lt"><?php 
            echo '<a href="'.$download_link_resources['link']['url'].'" target="'.$download_link_resources['link']['target'].'">'; ?><?php echo $download_link_resources['title']; ?></a></div>
              <div class="pdf-item-rt"><?php 
            echo '<a href="'.$download_link_resources['link']['url'].'" target="'.$download_link_resources['link']['target'].'">'; ?><i class="fas fa-download"></i> PDF</a></div>
          </div>            
        <?php }
        ?>
    </div>
  </div>
<?php } ?>


<div class="fabric-display-wrap">   


<div class="fabric-top-wrap">            
            
<div class="form-wrap">



<?php

  $categories = get_categories('taxonomy=news_type');

  $select = "<select name='cat' id='cat' class='postform'>n";
  $select.= "<option value='-1'>Select category</option>n";

  foreach($categories as $category){
    if($category->count > 0){
        $select.= "<option value='".$category->slug."'>".$category->name."</option>";
    }
  }

  $select.= "</select>";

  echo $select;
?>

</div>



<div class="guide">
<img src="https://www.friant.com/wp-content/uploads/2019/09/Icon_Set_Fast_Shipping.png" /> 10 Day Quickship Avail <div class="separate"></div> <i class="far fa-clock"></i> Limited Time Avail
</div>

</div><!--fabric-top-wrap-->


<div class="fabric-display-wrap">

<a href="<?php echo get_home_url(); ?>/fabrics/" class="single-blog-back-btn">
    <i class="fas fa-chevron-circle-left"></i> View All
    </a><!-- single-blog-back-btn -->
    
<h2><?php single_post_title(); ?></h2>

<div class="fabric-wrap">

<?php
if( have_rows('fabric') ): ?>


<?php
 while ( have_rows('fabric') ) : the_row(); 
 ?>
 
 <div class="fabric-inner">
 
 <img src="<?php the_sub_field('image') ?>" />

<div class="fabric-info-wrap">

 <div class="fabric-info-lt">
<b><?php the_sub_field('category') ?></b><br />

<?php the_title() ?><br />

<?php the_sub_field('model_number') ?>
 </div><!--fabric-info-lt-->
 
 <div class="fabric-info-rt">
 
<?php if( get_sub_field('10_day_quick_ship') == 'yes' ): ?>
<img src="https://www.friant.com/wp-content/uploads/2019/09/Icon_Set_Fast_Shipping.png" /> 
<?php endif; ?>

<?php if( get_sub_field('limited_time_available') == 'yes' ): ?>
<i class="far fa-clock"></i>
<?php endif; ?>

 </div><!--fabric-info-rt-->
 
</div><!--fabric-info-->


</div><!--fabric-inner-->


<?php 
endwhile;
else :
    // no rows found
endif;
?>

</div><!--fabric-wrap-->
</div><!--fabric-display-wrap-->




</div><!--fabric-display-wrap-->


<div class="own-fabric-wrap">
<div class="own-fabric-inner">
<h2><?php the_field('use_your_own_title', 'options'); ?></h2>
<p><?php the_field('use_your_own_content', 'options'); ?></p>
</div><!--own-fabric-inner-->
</div><!--own-fabric-wrap-->



<div class="com-wrap">
<div class="com-inner">

<div class="com-lt">
<img src="<?php the_field('com_program_image', 'options'); ?>" />
</div><!--com-lt-->

<div class="com-rt">

<h2><?php the_field('com_program_title', 'options'); ?></h2>
<p>
<?php the_field('com_program_content', 'options'); ?>
</p>

<a href="<?php the_field('button_link', 'options'); ?>"><div class="btn2"><?php the_field('button_title', 'options'); ?></div></a>
</div><!--com-rt-->

</div><!--com-inner-->
</div><!--com-wrap-->



</div> <!-- #main-content -->

<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>

<script>

(function($) {
    $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
})(jQuery)
</script>





<script type="text/javascript"><!--
    var dropdown = document.getElementById("cat");
    function onCatChange() {
        if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
            location.href = "<?php echo home_url();?>/fabrics/"+dropdown.options[dropdown.selectedIndex].value+"/";
        }
    }
    dropdown.onchange = onCatChange;
</script> 


<?php

get_footer();
