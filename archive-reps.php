<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

$show_navigation = get_post_meta( get_the_ID(), '_et_pb_project_nav', true );

?>




<style type="text/css">


</style>



<script type="text/javascript">
    var $w = jQuery.noConflict();
    $w(document).ready(function() {
        $w('#colorselector').change(function(){
            $w('.colors').hide();
            $w('.colors').removeClass('all');
            $w('#' + $w(this).val()).show();
            
        });
    });

</script>



<p></p>
<p></p>
<p></p>
<p></p><p></p>
<p></p>
<p></p>


<?php

get_footer();
