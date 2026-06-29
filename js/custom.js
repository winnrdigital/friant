class CutomeMain {
    constructor() {
		if(jQuery('.dropbtn').length > 0){
      jQuery(document).on('click','.dropbtn', function(e){
        e.preventDefault();
          jQuery(".mobile-dropdown .mobile-dropdown-content").toggle();
      });
    }
    jQuery(document).on('click','.product-tab', function(e){
			e.preventDefault();
			var tabid = jQuery(this).data("ids");
			jQuery('.product-menu-inner .product-tab').removeClass('active');
			//jQuery(this).addClass('active');
      		jQuery('.product-menu-inner .product-tab[data-ids='+tabid+']').addClass('active');
			jQuery('#'+tabid).addClass('active').fadeIn("slow");
		    jQuery('.product-tab-content').not('#'+tabid).removeClass('active').hide();
		    jQuery('html,body').animate({ scrollTop: 0 }, 'slow');
		});
    if(jQuery('.cat-internal-link').length > 0){
      jQuery(document).on('click','.cat-internal-link', function(e){
        var url = jQuery(this).attr("href");
        var hash = url.substring(url.indexOf('#'));
        var hash = url.split('#')[1];
        if(hash != undefined){
          e.preventDefault();
          var tabid = hash.replace(/^#/, '');
          var ctab = '';
          if(tabid == 'material'){
            ctab = 'material';
            tabid  = 'product-details';
          }
			/*else if(tabid == 'nav-resource')
          {
             ctab = 'nav-resource';
            tabid  = 'nav-typical';
          }*/
          jQuery('.product-menu-inner .product-tab').removeClass('active');
          jQuery('.product-menu-inner .product-tab[data-ids='+tabid+']').addClass('active');
          jQuery('#'+tabid).addClass('active').fadeIn("slow");
          jQuery('.product-tab-content').not('#'+tabid).removeClass('active').hide();
          if(ctab == 'material'){
            //console.log(jQuery("#material").offset().top);
            jQuery('html, body').animate({
                scrollTop: jQuery("#material").offset().top + 1
            }, 'slow');
          }else{
            jQuery('html,body').animate({ scrollTop: 0 }, 'slow');
          }

        }
      });
    }
    if(jQuery('.product-tab-link').length > 0){
      jQuery(document).on('click','.product-tab-link', function(e){
        var url = jQuery(this).attr("href");
        var hash = url.split('#')[1];
        if(hash){
          e.preventDefault();
          var hash = url.substring(url.indexOf('#'));
          var tabid = hash.replace(/^#/, '');
          jQuery('html, body').animate({
              scrollTop: jQuery("#"+tabid).offset().top
          }, 'slow');
          jQuery('.product-tab-link').removeClass('active');
          jQuery(this).addClass('active');
        }
      });
    }
    if(jQuery('.expand-content').length > 0){
      jQuery('.expand-content').click(function(e) {
          e.preventDefault();
          if(jQuery(this).hasClass('hiden')){
            jQuery('div.material-section').animate({height: '450px'}, 100);
            /*jQuery('div.material-section').css({
               'height': '450px'
            });*/
            jQuery(this).removeClass('hiden').addClass('show');
            jQuery(this).find('span').html('Expand');
          }else{
            jQuery('div.material-section').animate({ 'height': jQuery('div.material-section')[0].scrollHeight }, 100);
            /*jQuery('div.material-section').css({
                'height': 'auto'
            }).slideDown();*/
            jQuery(this).removeClass('show').addClass('hiden');
            jQuery(this).find('span').html('Hide');
          }
      });
    }

    jQuery(window).load(function() {
        if(jQuery('.solutions-gallery-slider').length > 0){
          jQuery('.flexslider').flexslider({
            animation: "slide",
            directionNav: false,
            //reverse: true,
            slideshow: false,
            controlNav: false,
            //controlNav: "thumbnails",
            animationLoop: false,
          });

          jQuery(".visual-specs-content i").click(function () {
            jQuery(".visual-specs-content").removeClass('active').fadeOut("slow");
          });



          for(let i = 1; i <= 50; i++){
              jQuery(".node"+i).hover(function(){
              jQuery(".visual-content"+i).addClass('active').delay(270).fadeIn("slow");
              for(let j = 1; j <= 50; j++){
                  if(j != i){
                  jQuery(".visual-content"+j).removeClass('active').fadeOut();
                }
              }
            }/*, function() {
              jQuery(".visual-specs-content").fadeOut();
            } */);
          }

          /*jQuery( "div.node" )
          .on( "mouseleave", function() {
            jQuery(".visual-specs-content.active").hover(function(){

            }, function() {
              jQuery(".visual-specs-content").fadeOut();
            }
            );
          });*/
        }
    });

    if(jQuery('.gallery-slides').length > 0){
  		jQuery('.gallery-slides').slick({
  		  dots: false,
  		  infinite: true,
  		  speed: 3000,
  		  autoplay: true,
  		  arrows: true,
  		  slidesToShow: 3,
        slidesToScroll: 1,
  		  adaptiveHeight: true,
  		    responsive: [{
            breakpoint:1200,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint:767,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
             breakpoint: 400,
             settings: {
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1
             }
          }]
  		});
    }
  }
}

var main; //Declare in global scope if other functions may want to call it
jQuery(document).ready(() => {
    main = new CutomeMain();
});

jQuery(document).ready(function($){
  //Animation for sections
  AOS.init();
  
  if($('.product-menu-wrap.product-tabs').length > 0){
    $(window).scroll(function() {
        if ($(window).scrollTop() > 200) {
                $("#main-header .et_menu_container").css('display','none');
                  $(".product-menu-wrap").css("position", "fixed");
                  $(".product-menu-wrap").css("top", "0");
        } else {
                $("#main-header .et_menu_container").css('display','block');
                $(".product-menu-wrap").css("position", "fixed");
                $(".product-menu-wrap").css("top", "129px");               
        }
    });
  }
  if($('.product-menu-wrap-page.sticky-tab-menu').length > 0){
    var divpost = $('.product-menu-wrap-page.sticky-tab-menu').offset();
    $(window).scroll(function() {
        if ($(window).scrollTop() > divpost.top) {
                $("#main-header .et_menu_container").css('display','none');
                  $(".product-menu-wrap-page").css("position", "fixed");
                  //$(".product-menu-wrap-page").css("top", "0px");
        } else {
                $("#main-header .et_menu_container").css('display','block');
                $(".product-menu-wrap-page").css("position", "sticky");
                //$(".product-menu-wrap-page").css("top", "divpost.top+"px"");
        }
    });
  }
});


jQuery(function($){
    var $slider = $('.hero-slider');

    if (!$slider.length) return;

    $slider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: MySliderOptions.dots,
        arrows: MySliderOptions.arrows,
        infinite: true,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 1000,
        speed: 1500,
        fade: false,
        prevArrow: '<button type="button" class="slick-prev custom-arrow"><span class="arrow-left"></span></button>',
        nextArrow: '<button type="button" class="slick-next custom-arrow"><span class="arrow-right"></span></button>',

        responsive: [
            {
                breakpoint: 900,
                settings: {
                    dots: true,
                    arrows: false
                }
            }
        ]
    });

});

