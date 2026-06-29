<?php
/*
Template Name: Manuals
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

<div class="tabs-container">
  <a class="tablink" href="#reddispace">ReddiSpace</a>
  <a class="tablink" href="#beam">Beam</a>
  <a class="tablink" href="#dash">Dash</a>
  <a class="tablink" href="#gitana">Gitana</a>
  <a class="tablink" href="#interra">Interra</a>
  <a class="tablink" href="#myhite">My-Hite</a>
  <a class="tablink" href="#novo">Novo</a>
  <a class="tablink" href="#power">Power</a>
  <a class="tablink" href="#system2">System 2</a>
  <a class="tablink" href="#tables">Tables</a>
  <a class="tablink" href="#verity">Verity</a>
  <a class="tablink" href="#seating">Seating</a>
  <a class="tablink" href="#accessories" >Accessories</a>
</div>

<div class="resource-center-wrap">

<?php if( have_rows('reddispace') ): ?>
  <div class="resource-center-section">
    <div class="resource-inner">
      <h2 id="reddispace">ReddiSpace</h2>
      <?php while ( have_rows('reddispace') ) : the_row(); ?>
        <div class="pdf-item">
          <div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
          <div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
        </div><!--pdf-item-->
      <?php endwhile; ?>
    </div><!--resource-inner-->
  </div><!--resource-center-section-->
<?php endif; ?>


<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('beam') ): ?>

<h2 id="beam">Beam</h2>
<?php while ( have_rows('beam') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile; ?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->



<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('dash') ): ?>

<h2 id="dash">Dash</h2>
<?php while ( have_rows('dash') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile;?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->

<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('gitana') ): ?>

<h2 id="gitana">Gitana</h2>
<?php while ( have_rows('gitana') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile;?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->

<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('interra') ): ?>

<h2 id="interra">Interra</h2>
<?php while ( have_rows('interra') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile;?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->

<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('my-hite') ): ?>

<h2 id="myhite">My-Hite</h2>
<?php while ( have_rows('my-hite') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile;?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->



<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('novo') ): ?>

<h2 id="novo" >Novo</h2>
<?php while ( have_rows('novo') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile;?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->

<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('power') ): ?>

<h2 id="power" >Power</h2>
<?php while ( have_rows('power') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile;?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->

<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('system-2') ): ?>

<h2 id="system2" >System 2</h2>
<?php while ( have_rows('system-2') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile;?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->

<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('verity') ): ?>

<h2 id="verity" >Verity</h2>
<?php while ( have_rows('verity') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile;?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->
	
	
<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('tables') ): ?>

<h2 id="tables" >Tables</h2>
<?php while ( have_rows('tables') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile; ?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->

	
<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('seating') ): ?>

<h2 id="seating">Seating</h2>
<?php while ( have_rows('seating') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile; ?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->

	
<div class="resource-center-section">
<div class="resource-inner">
<?php if( have_rows('accessories') ): ?>

<h2 id="accessories" >Accessories</h2>
<?php while ( have_rows('accessories') ) : the_row(); ?>
<div class="pdf-item">
<div class="pdf-item-lt"><?php the_sub_field('title'); ?></div>
<div class="pdf-item-rt"><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><i class="fas fa-download"></i> PDF</a></div>
</div><!--pdf-item-->
<?php 
endwhile; ?>

<?php endif; ?>
</div><!--resource-inner-->
</div><!--resource-center-section-->
	



	
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
