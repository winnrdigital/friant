<div class="footer-top-wrap">
<div class="footer-top-content">

<div class="footer-top-content-lt">
<?php echo do_shortcode ('[mc4wp_form id="132"]') ?>
<?php //echo do_shortcode ('[contact-form-7 id="7277" title="Join the Mailing List"]') ?>
</div><!--footer-top-content-lt-->

<div class="footer-top-content-rt">
<a href="https://www.instagram.com/friantworkspace" target="_blank"><i class="fab fa-instagram"></i></a>
<a href="https://www.youtube.com/channel/UCpKrvnN9AUwDCxByVkGM9Ew" target="_blank"><i class="fab fa-youtube"></i></a>
<a href="https://www.facebook.com/profile.php?id=61581568532607" target="_blank"><i class="fab fa-facebook-f"></i></a>
<a href="https://twitter.com/FriantUSA" target="_blank"><i class="fab fa-twitter"></i></a>
<a href="https://www.linkedin.com/company/friant-and-associates/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
</div><!--footer-top-content-rt-->

</div><!--footer-top-content-->
</div><!--footer-top-wrap-->



<div class="footer-wrap">
<img src="<?php echo site_url(); ?>/wp-content/uploads/2019/05/logo2.jpg" />
<div class="line-spacer"></div>

<div class="footer-content">

<div class="footer-menu menu-col-1">
<p><b><?php the_field('row_one_title', 'option'); ?></b></p>
 <?php
if( have_rows('row_one', 'option') ):
 while ( have_rows('row_one', 'option') ) : the_row(); ?>
	<p><a href="<?php the_sub_field('url'); ?>" <?php if(the_sub_field('blank_window') == 'Yes' ): ?><?php endif; ?>><?php the_sub_field('link'); ?></a></p>


<?php
endwhile;
else :
    // no rows found
endif;
?>
</div><!--footer-col-1-->


<div class="footer-menu menu-col-2">
<p><b><?php the_field('row_two_title', 'option'); ?></b></p>
 <?php
if( have_rows('row_two', 'option') ):
 while ( have_rows('row_two', 'option') ) : the_row(); ?>

	<p><a href="<?php the_sub_field('url'); ?>" <?php if(the_sub_field('blank_window') == 'Yes' ): ?><?php endif; ?>><?php the_sub_field('link'); ?></a></p>

<?php
endwhile;
else :
    // no rows found
endif;
?>
</div><!--footer-col-2-->

<div class="footer-menu menu-col-3">
<p><b><?php the_field('row_three_title', 'option'); ?></b></p>
 <?php
if( have_rows('row_three', 'option') ):
 while ( have_rows('row_three', 'option') ) : the_row(); ?>

	<p><a href="<?php the_sub_field('url'); ?>" <?php if(the_sub_field('blank_window') == 'Yes' ): ?><?php endif; ?>><?php the_sub_field('link'); ?></a></p>

<?php
endwhile;
else :
    // no rows found
endif;
?>
</div><!--footer-col-1-->

<div class="footer-menu menu-col-4">
<p><b><?php the_field('row_four_title', 'option'); ?></b></p>
 <?php
if( have_rows('row_four', 'option') ):
 while ( have_rows('row_four', 'option') ) : the_row(); ?>

	<p><a href="<?php the_sub_field('url'); ?>" <?php if(the_sub_field('blank_window') == 'Yes' ): ?><?php endif; ?>><?php the_sub_field('link'); ?></a></p>

<?php
endwhile;
else :
    // no rows found
endif;
?>
</div><!--footer-col-1-->

<div class="footer-menu menu-col-5">
<p><b><?php the_field('row_five_title', 'option'); ?></b></p>
 <?php
if( have_rows('row_five', 'option') ):
 while ( have_rows('row_five', 'option') ) : the_row(); ?>

	<p><a href="<?php the_sub_field('url'); ?>" <?php if(the_sub_field('blank_window') == 'Yes' ): ?><?php endif; ?>><?php the_sub_field('link'); ?></a></p>

<?php
endwhile;
else :
    // no rows found
endif;
?>
</div><!--footer-col-1-->


</div><!--footer-wrap-->
</div><!--footer-content->

<?php
/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action( 'et_after_main_content' );

if ( 'on' === et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>



<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
				<?php get_sidebar( 'footer' ); ?>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div id="footer-bottom">
					<div class="container clearfix">
				<?php
					if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
						get_template_part( 'includes/social_icons', 'footer' );
					}

					// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
					echo et_core_fix_unclosed_html_tags( et_core_esc_previously( et_get_footer_credits() ) );
					// phpcs:enable
				?>
					</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>

    <!-- mobile header -->

    <script type="text/javascript">
    jQuery( document ).ready(function() {
   /* jQuery(".linkcls2" ).click(function() {
	  jQuery(".nav-typical" ).click();
	});*/
	/*jQuery('.linkcls3').click(function(){
	   window.location.href='https://www.friant.com/where-to-buy';
	});*/
});


	<!-- collection page arrows -->

var $c =0;
function next(){
    var boxes = document.getElementsByClassName("collection-img");
    $c +=1;
    if($c >= boxes.length) $c = 0;
    for (var $i=0;$i<boxes.length;$i++){
        boxes[$i].style.display  = "none";
    }
    boxes[$c].style.display  = "block";
    return false;
}
function prev(){
    var boxes = document.getElementsByClassName("collection-img");
    $c -=1;
    if($c < 0) $c = (boxes.length-1);
    for (var $i=0;$i<boxes.length;$i++){
        boxes[$i].style.display  = "none";
    }
        boxes[$c].style.display  = "block";
    return false;
}


var $c =0;
function next(){
    var box = document.getElementsByClassName("collection-content");
    $c +=1;
    if($c >= box.length) $c = 0;
    for (var $i=0;$i<box.length;$i++){
        box[$i].style.display  = "none";
    }
    box[$c].style.display  = "block";
    return false;
}
function prev(){
    var box = document.getElementsByClassName("collection-content");
    $c -=1;
    if($c < 0) $c = (box.length-1);
    for (var $i=0;$i<box.length;$i++){
        box[$i].style.display  = "none";
    }
        box[$c].style.display  = "block";
    return false;
}



(function($) {
 function setup_collapsible_submenus() {
 $( "<div class='sub-menu-toggle'></div>" ).insertBefore( "#main-header #mobile_menu.et_mobile_menu .menu-item-has-children > a" );
 $( "#main-header #mobile_menu.et_mobile_menu .sub-menu-toggle" ).click(function () {
 $(this).toggleClass("popped");
 });
 }
 $(document).ready(function() {
 setup_collapsible_submenus();
 });
 $(window).load(function() {
 setup_collapsible_submenus();
 });
})(jQuery);

</script>



<script type="text/javascript">
    var $r = jQuery.noConflict();
    $r(document).ready(function() {
$r('.col-thumbimg-inner').html(function(r,t){
    return t.replace(/&nbsp;/g,'');
	});
	});
</script>


<script type="text/javascript">
    var $y = jQuery.noConflict();
    $y(document).ready(function() {
$y('.collection-content-wrap').html(function(y,t){
    return t.replace(/&nbsp;/g,'');
	});
	});
</script>


<!-- product pages -->

<script type="text/javascript">
    var $s = jQuery.noConflict();
    $s(document).ready(function() {


$s("div.meet-highlight-img img").click(function () {
	$s("div.meet-highlight-img img").addClass("wplightbox");
});




<!-- top bar -->


      $s(window).scroll(function() { // check if scroll event happened
        if ($s(document).scrollTop() > 200) { // check if user scrolled more than 50 from top of the browser window

           $s(".top-header-wrap").css({"margin-top": "-45px"});
		  $s("#main-header").css({"margin-top": "0px"});
		  $s(".mob-menu-header-holder").css({"margin-top": "0px"});

        } else {
          $s(".top-header-wrap").css({"margin-top": "0px"});
		  $s("#main-header").css({"margin-top": "45px"});
		  $s(".mob-menu-header-holder").css({"margin-top": "0px"});
        }
      });

<!-- seating menu -->



$s(".nav-seating-meet").click(function () {
    $s(".product-seating-meet-wrap").fadeIn("slow");
	$s(".nav-seating-meet").addClass("active");
	$s('html,body').animate({ scrollTop: 455 }, 'slow');

	$s(".product-seating-resource-wrap").hide();
	$s(".nav-seating-resource").removeClass("active");
});


$s(".nav-seating-resource").click(function () {
    $s(".product-seating-resource-wrap").fadeIn("slow");
	$s(".resource-wrap").fadeIn("slow");
	$s(".nav-seating-resource").addClass("active");
	$s('html,body').animate({ scrollTop: $s('.resource-wrap-scroll').offset().top + (-170) }, 1000);
	$s(".product-seating-meet-wrap").hide();
	$s(".nav-seating-meet").removeClass("active");
});


<!-- seating menu sticky -->

 $s(window).scroll(function() {
        if ($s(document).scrollTop() > 450) {
          $s(".product-seating-menu-wrap").css("position", "fixed");
		  $s(".product-seating-menu-wrap").css("top", "75px");
        } else {
          $s(".product-seating-menu-wrap").css("position", "relative");
		  $s(".product-seating-menu-wrap").css("top", "0px");
        }
      });

<!-- product menu -->

$s(".nav-meet").click(function () {
    $s(".product-meet-wrap").fadeIn("slow");
	$s(".nav-meet").addClass("active");
	$s('html,body').animate({ scrollTop: 455 }, 'slow');


    $s(".product-overview-wrap").hide();
	$s(".nav-overview").removeClass("active");

	$s(".product-typicals-wrap").hide();
	$s(".nav-typicals").removeClass("active");

	$s(".product-resource-wrap").hide();
	$s(".nav-resources").removeClass("active");
});

$s(".nav-overview").click(function () {
    $s(".product-overview-wrap").fadeIn("slow");
	$s(".nav-overview").addClass("active");
	$s('html,body').animate({ scrollTop: 455 }, 'slow');

    $s(".product-meet-wrap").hide();
	$s(".nav-meet").removeClass("active");

	$s(".product-typicals-wrap").hide();
	$s(".nav-typicals").removeClass("active");

	$s(".product-resource-wrap").hide();
	$s(".nav-resources").removeClass("active");
});

$s(".nav-typicals").click(function () {
    $s(".product-typicals-wrap").fadeIn("slow");
	$s(".nav-typicals").addClass("active");
	$s('html,body').animate({ scrollTop: 455 }, 'slow');

    $s(".product-meet-wrap").hide();
	$s(".nav-meet").removeClass("active");

	$s(".product-overview-wrap").hide();
	$s(".nav-overview").removeClass("active");

	$s(".product-resource-wrap").hide();
	$s(".nav-resources").removeClass("active");
});

$s(".nav-resources").click(function () {
    $s(".product-resource-wrap").fadeIn("slow");
	$s(".nav-resources").addClass("active");
	$s('html,body').animate({ scrollTop: 455 }, 'slow');

    $s(".product-meet-wrap").hide();
	$s(".nav-meet").removeClass("active");

	$s(".product-overview-wrap").hide();
	$s(".nav-overview").removeClass("active");

	$s(".product-typicals-wrap").hide();
	$s(".nav-typicals").removeClass("active");
});


$s(window).scroll(function() {
if ($s(document).scrollTop() > 200) {
  $s(".product-menu-wrap").css("position", "fixed");
  $s(".product-menu-wrap").css("top", "0");
   $s(".product-meet-wrap").css("margin-top", "120px");
    $s(".product-overview-wrap").css("margin-top", "120px");
	 $s(".product-typicals-wrap").css("margin-top", "120px");
	  $s(".product-resource-wrap").css("margin-top", "120px");
} else {
  $s(".product-menu-wrap").css("position", "fixed");
  $s(".product-menu-wrap").css("top", "74px");   
   $s(".product-meet-wrap").css("margin-top", "40px");
    $s(".product-overview-wrap").css("margin-top", "40px");
	 $s(".product-typicals-wrap").css("margin-top", "40px");
	  $s(".product-resource-wrap").css("margin-top", "40px");
}
});


$s(".two-pack").click(function () {
    $s(".two-pack-wrap").fadeIn("slow");
	$s(".two-pack").addClass("active");

    $s(".four-pack-wrap").hide();
	$s(".four-pack").removeClass("active");

	$s(".six-pack-wrap").hide();
	$s(".six-pack").removeClass("active");

	$s(".eight-pack-wrap").hide();
	$s(".eight-pack").removeClass("active");

	$s(".twelve-pack-wrap").hide();
	$s(".twelve-pack").removeClass("active");

	$s(".single-pack-wrap").hide("slow");
	$s(".single-pack").removeClass("active");

    $s(".beam-pack-wrap").hide();
	$s(".beam-pack").removeClass("active");
});

$s(".three-pack").click(function () {
    $s(".three-pack-wrap").fadeIn("slow");
	$s(".three-pack").addClass("active");

    $s(".two-pack-wrap").hide();
	$s(".two-pack").removeClass("active");

    $s(".four-pack-wrap").hide();
	$s(".four-pack").removeClass("active");

	$s(".six-pack-wrap").hide();
	$s(".six-pack").removeClass("active");

	$s(".eight-pack-wrap").hide();
	$s(".eight-pack").removeClass("active");

	$s(".twelve-pack-wrap").hide();
	$s(".twelve-pack").removeClass("active");

	$s(".single-pack-wrap").hide("slow");
	$s(".single-pack").removeClass("active");

    $s(".beam-pack-wrap").hide();
	$s(".beam-pack").removeClass("active");
});

$s(".four-pack").click(function () {
    $s(".four-pack-wrap").fadeIn("slow");
	$s(".four-pack").addClass("active");

    $s(".two-pack-wrap").hide();
	$s(".two-pack").removeClass("active");

    $s(".three-pack-wrap").hide();
	$s(".three-pack").removeClass("active");

	$s(".six-pack-wrap").hide();
	$s(".six-pack").removeClass("active");

	$s(".eight-pack-wrap").hide();
	$s(".eight-pack").removeClass("active");

	$s(".twelve-pack-wrap").hide();
	$s(".twelve-pack").removeClass("active");

	$s(".single-pack-wrap").hide();
	$s(".single-pack").removeClass("active");

    $s(".beam-pack-wrap").hide();
	$s(".beam-pack").removeClass("active");
});

$s(".six-pack").click(function () {
    $s(".six-pack-wrap").fadeIn("slow");
	$s(".six-pack").addClass("active");

    $s(".two-pack-wrap").hide();
	$s(".two-pack").removeClass("active");

    $s(".three-pack-wrap").hide();
	$s(".three-pack").removeClass("active");

	$s(".four-pack-wrap").hide();
	$s(".four-pack").removeClass("active");

	$s(".eight-pack-wrap").hide();
	$s(".eight-pack").removeClass("active");

	$s(".twelve-pack-wrap").hide();
	$s(".twelve-pack").removeClass("active");

	$s(".single-pack-wrap").hide();
	$s(".single-pack").removeClass("active");

    $s(".beam-pack-wrap").hide();
	$s(".beam-pack").removeClass("active");
});

$s(".eight-pack").click(function () {
    $s(".eight-pack-wrap").fadeIn("slow");
	$s(".eight-pack").addClass("active");

    $s(".two-pack-wrap").hide();
	$s(".two-pack").removeClass("active");

    $s(".three-pack-wrap").hide();
	$s(".three-pack").removeClass("active");

	$s(".four-pack-wrap").hide();
	$s(".four-pack").removeClass("active");

	$s(".six-pack-wrap").hide();
	$s(".six-pack").removeClass("active");

	$s(".twelve-pack-wrap").hide();
	$s(".twelve-pack").removeClass("active");

	$s(".single-pack-wrap").hide();
	$s(".single-pack").removeClass("active");

    $s(".beam-pack-wrap").hide();
	$s(".beam-pack").removeClass("active");
});


$s(".twelve-pack").click(function () {

    $s(".two-pack-wrap").hide();
	$s(".two-pack").removeClass("active");

    $s(".three-pack-wrap").hide();
	$s(".three-pack").removeClass("active");

	$s(".four-pack-wrap").hide();
	$s(".four-pack").removeClass("active");

	$s(".six-pack-wrap").hide();
	$s(".six-pack").removeClass("active");

	$s(".eight-pack-wrap").hide();
	$s(".eight-pack").removeClass("active");

    $s(".twelve-pack-wrap").fadeIn("slow");
	$s(".twelve-pack").addClass("active");

	$s(".single-pack-wrap").hide();
	$s(".single-pack").removeClass("active");

    $s(".beam-pack-wrap").hide();
	$s(".beam-pack").removeClass("active");
});


$s(".single-pack").click(function () {
    $s(".single-pack-wrap").fadeIn("slow");
	$s(".single-pack").addClass("active");

    $s(".two-pack-wrap").hide();
	$s(".two-pack").removeClass("active");

	$s(".three-pack-wrap").hide();
	$s(".three-pack").removeClass("active");

	$s(".four-pack-wrap").hide();
	$s(".four-pack").removeClass("active");

	$s(".six-pack-wrap").hide();
	$s(".six-pack").removeClass("active");

	$s(".twelve-pack-wrap").hide();
	$s(".twelve-pack").removeClass("active");

	$s(".eight-pack-wrap").hide();
	$s(".eight-pack").removeClass("active");

	$s(".beam-pack-wrap").hide();
	$s(".beam-pack").removeClass("active");
});


$s(".beam-pack").click(function () {
    $s(".beam-pack-wrap").fadeIn("slow");
	$s(".beam-pack").addClass("active");

	$s(".single-pack-wrap").hide();
	$s(".single-pack").removeClass("active");

    $s(".two-pack-wrap").hide();
	$s(".two-pack").removeClass("active");

	$s(".three-pack-wrap").hide();
	$s(".three-pack").removeClass("active");

	$s(".four-pack-wrap").hide();
	$s(".four-pack").removeClass("active");

	$s(".six-pack-wrap").hide();
	$s(".six-pack").removeClass("active");

	$s(".twelve-pack-wrap").hide();
	$s(".twelve-pack").removeClass("active");

	$s(".eight-pack-wrap").hide();
	$s(".eight-pack").removeClass("active");
});



<!--continue reading btn  -->

$s(".green-wrap .read-more").click(function () {
    $s(".green-wrap .read-more-mess").fadeIn("slow");
	$s(".green-wrap .read-less").fadeIn("slow");
	$s(".green-wrap .read-more").hide();
	});

$s(".green-wrap .read-less").click(function () {
    $s(".green-wrap .read-more-mess").fadeOut("slow");
	$s(".green-wrap .read-less").hide();
	$s(".green-wrap .read-more").fadeIn("slow");
	});

$s(".team-wrap .read-more").click(function () {
    $s(".team-wrap .read-more-mess").fadeIn("slow");
	$s(".team-wrap .read-less").fadeIn("slow");
	$s(".team-wrap .read-more").hide();
	});

$s(".team-wrap .read-less").click(function () {
    $s(".team-wrap .read-more-mess").fadeOut("slow");
	$s(".team-wrap .read-less").hide();
	$s(".team-wrap .read-more").fadeIn("slow");
	});


<!--Product Meet Summary continue reading btn -->

$s(".meet-read-more").click(function () {
    $s(".read-more-mess").fadeIn("slow");
	$s(".read-less").fadeIn("slow");
	$s(".read-more").hide();
	});

$s(".meet-read-less").click(function () {
    $s(".read-more-mess").fadeOut("slow");
	$s(".read-less").hide();
	$s(".read-more").fadeIn("slow");
	});



<!--Product Overview continue reading btn -->

$s(".about-wrap .read-more-overview").click(function () {
    $s(".about-wrap .read-more-bull").fadeIn("slow");
	$s(".about-wrap .read-less-overview").fadeIn("slow");
	$s(".about-wrap .read-more-overview").hide();
	});

$s(".about-wrap .read-less-overview").click(function () {
    $s(".about-wrap .read-more-bull").fadeOut("slow");
	$s(".about-wrap .read-less-overview").hide();
	$s(".about-wrap .read-more-overview").fadeIn("slow");
	});


$s(".electrical-wrap .read-more-overview").click(function () {
    $s(".electrical-wrap .read-more-bull").fadeIn("slow");
	$s(".electrical-wrap .read-less-overview").fadeIn("slow");
	$s(".electrical-wrap .read-more-overview").hide();
	});

$s(".electrical-wrap .read-less-overview").click(function () {
    $s(".electrical-wrap .read-more-bull").fadeOut("slow");
	$s(".electrical-wrap .read-less-overview").hide();
	$s(".electrical-wrap .read-more-overview").fadeIn("slow");
	});


$s(".features-wrap .read-more-overview").click(function () {
    $s(".features-wrap .read-more-bull").fadeIn("slow");
	$s(".features-wrap .read-less-overview").fadeIn("slow");
	$s(".features-wrap .read-more-overview").hide();
	});

$s(".features-wrap .read-less-overview").click(function () {
    $s(".features-wrap .read-more-bull").fadeOut("slow");
	$s(".features-wrap .read-less-overview").hide();
	$s(".features-wrap .read-more-overview").fadeIn("slow");
	});


$s(".environment-wrap .read-more-overview").click(function () {
    $s(".environment-wrap .read-more-bull").fadeIn("slow");
	$s(".environment-wrap .read-less-overview").fadeIn("slow");
	$s(".environment-wrap .read-more-overview").hide();
	});

$s(".environment-wrap .read-less-overview").click(function () {
    $s(".environment-wrap .read-more-bull").fadeOut("slow");
	$s(".environment-wrap .read-less-overview").hide();
	$s(".environment-wrap .read-more-overview").fadeIn("slow");
	});



<!-- collection page -->




for(let y = 1; y <= 50; y++){
    $s(".col-thumb"+y).click(function(){
	$s(".collection-img").fadeOut();
    $s(".collection-img"+y).fadeIn("slow");
	$s(".collection-content").hide();
	$s(".collection-img").hide();

	$s(".collection-content"+y).fadeIn("slow");
	$s(".collection-img"+y).show();
	$s(".col-thumb .thumb-img").css("border-bottom", "0px solid #D42029");
	$s(".col-thumb .thumb-img p").css("color", "#fff");
	$s(".col-thumb .thumb-img").removeClass("on");
	$s(".col-thumb .thumb-img-before").css("background-color", "rgba(0,0,0,0.6)");
	$s(".col-thumb"+y+" .thumb-img").css("border-bottom", "4px solid #D42029");
	$s(".col-thumb"+y+" .thumb-img p").css("color", "#D42029");
	$s(".col-thumb"+y+" .thumb-img").addClass("on");
	$s(".col-thumb"+y+" .thumb-img-before").css("background-color", "rgba(255,255,255, 0.7)");

  });

	}


<!-- blog archive get rid of &nbsp; -->

	$s('div.fabric-wrap').html(function(i,h){
    return h.replace(/&nbsp;/g,'');
	});


	 <!--accessories page-->




	$s(".product-btn").click(function () {
    $s(".masonry-brick--h").removeClass('mas');
	$s("img.masonry-img").css("transition","all 500ms ease-in");
	$s(".product-btn").fadeIn(500);
	$s(".masonry-img").css("filter", "brightness(70%)");
	$s(".acc-name").fadeIn(500);
	});

	$s(".acc-close").click(function () {
    $s(".masonry-brick--h").removeClass('mas');
	$s("img.masonry-img").css("transition","all 500ms ease-in");
	$s(".product-btn").fadeIn(500);
	$s(".masonry-img").css("filter", "brightness(70%)");
	$s(".acc-name").fadeIn(500);
	});



for (let f = 1; f <= 500; f++){
	 $s(".product-btn"+f).click(function(){
    $s(".masonry-brick--h"+f).addClass( "mas" );
	$s(".mas").css("transition","all 700ms ease-in");
	$s("img.masonry-img").css("transition","all 700ms ease-in");
	$s(".acc-product-info-wrap").css("display","table-cell");
	$s(".product-btn"+f).fadeOut(500);
	$s(".masonry-img"+f ).css("filter", "brightness(100%)");
	$s(".acc-name"+f ).fadeOut(0);
  });

}

});







	$s(document).ready(function() {
		if($s(".fancybox").length > 0){
			$s(".fancybox").fancybox();
		}
	});


(function($s) {
    $s(window).load(function() {
    	if($s(".fancybox").length > 0){
		  $s('.flexslider').not( ".solutions-gallery-slider" ).flexslider({
		    animation: "slide",
			controlNav: false,
		    pauseOnHover: true,
		  });
		}
	});
})(jQuery)

</script>



<script type="text/javascript">
    var $e = jQuery.noConflict();

	(function($e) {
    $e(window).load(function() {
	  $e('.flexslider2').not( ".solutions-gallery-slider" ).flexslider({
	    animation: "slide",
	    controlNav: "thumbnails"
	  });
  	})
  })(jQuery);
</script>

<!-------------Footer Class Tracking Script ---------------->
<script type="text/javascript">
  jQuery(document).ready(function() {
    // Select all anchor elements within the footer
    jQuery('.footer-menu a').on('click', function() {
      // Add the 'footer_link_click' class when the link is clicked
      jQuery(this).addClass('footer_link_click');
    });
  });
</script>

<script type="text/javascript">
_linkedin_partner_id = "1781330";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1781330&fmt=gif" />
</noscript>
 <noscript>
        <img src="https://ws.zoominfo.com/pixel/hLr3ogJEkswQYnWVWhBU" width="1" height="1" style="display: none;" />
      </noscript>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
jQuery(document).ready(function($) {
    function filterEvents() {
        var locations = [];
        var eventTypes = [];
        var isChecked = false;

        //Get checked checkboxes
        $(".filter-checkbox[data-filter='event-location']:checked").each(function() {
            locations.push($(this).val());
            isChecked = true;
        });

        $(".filter-checkbox[data-filter='event-type']:checked").each(function() {
            eventTypes.push($(this).val());
            isChecked = true;
        });

        //Get selected dropdown values (ignore defaults)
        var mobileLocation = $("#location option:selected").val();
        if (mobileLocation && mobileLocation !== "Location") {
            locations.push(mobileLocation);
            isChecked = true;
        }

        var mobileEventType = $("#eventType option:selected").val();
        if (mobileEventType && mobileEventType !== "Event Type") {
            eventTypes.push(mobileEventType);
            isChecked = true;
        }

        // Show all if nothing is selected
        var showAll = !isChecked;

        console.log("Sending Locations:", locations);
        console.log("Sending Event Types:", eventTypes);
        console.log("Show All:", showAll);

        $.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: "POST",
            data: {
                action: "filter_events",
                locations: locations,
                event_types: eventTypes,
                show_all: showAll ? 1 : 0
            },
            beforeSend: function() {
                $("#event-results").html("<p class='no-events'>Loading events...</p>");
            },
            success: function(response) {
                console.log("AJAX Response:", response);
                $("#event-results").html(response);
            }
        });
    }

    //Trigger AJAX on checkbox and dropdown change
    $(".filter-checkbox, #location, #eventType").on("change", function() {
        filterEvents();
    });
});
</script>

 <script>
			
			// ------------	event opt 1 slider code start-------------------- //
$(document).ready(function(){
    $('.image-slider').on('init', function(event, slick) {
        $('.slick-prev, .slick-next').show();
    });

    $('.image-slider').slick({
		  draggable: true,  // Enables mouse drag
    swipe: true,      // Enables touch swipe
    touchMove: true,  // Allows touch interactions
    infinite: true,   // Enables infinite scrolling
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
    autoplay: true,
		speed: 900,
// autoplaySpeed: 8000,
		swipeToSlide: true,
        prevArrow: '<button class="slick-prev" aria-label="Previous"><span class="fa-solid fa-chevron-left"></span></button>',
        nextArrow: '<button class="slick-next" aria-label="Next"><span class="fa-solid fa-chevron-right"></span></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 768,
                settings: { slidesToShow: 1 }
            }
        ]
    });
});
			
			
// 			count down code start
	

$(document).ready(function() {
    function updateCountdown() {
        var countdownDate = new Date("June 9, 2025 00:00:00").getTime();
        var now = new Date().getTime();
        var timeLeft = countdownDate - now;

        if (timeLeft > 0) {
            var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
            
            $("#days").text(days);
            $("#hours").text(hours);
            $("#minutes").text(minutes);
            $("#seconds").text(seconds);
        } else {
            $("#countdown ul").html("<li>Countdown expired</li>");
        }
    }
    
	// Disable countdown for 2025 NeoCon
    //updateCountdown();
    //setInterval(updateCountdown, 1000);
});
		
 </script>
	
<?php if (is_front_page()) : ?>
    <p style="position:absolute; left:-9999px; top:-9999px; width:1px; height:1px; overflow:hidden;">
        Get <a href="https://csgototem.com/crash/">csgo crash sites</a>
    </p>
<?php endif; ?>
</body>
</html>