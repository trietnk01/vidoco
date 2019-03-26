<?php 
// -------------------------------------
// Add breadcrumbs
// -------------------------------------

// p_add_breadcrumb( true ); // show bredcrumb
add_action('p_after_header','p_add_breadcrumb',10);
function p_add_breadcrumb( $show = false ){
  if ( $show == false ) {

    global $hidden_breadcrum;
    if( is_home() || $hidden_breadcrum ) return;

  }
?>
  
  <?php 
   if ( function_exists('yoast_breadcrumb') && get_option( 'wpseo_titles')['breadcrumbs-enable'] == "1" ) { 
      ob_start();

      echo "<!-- Breadcrumb yoast seo -->";

      yoast_breadcrumb( '<span class="">','</span>');
      
      echo "<!-- End Breadcrumb yoast seo -->";

      $r = ob_get_clean();

  } else {

      ob_start();
      echo "<!-- Breadcrumb train -->";
        p_breadcrumb();
      echo "<!-- Breadcrumb train -->";

      $r = ob_get_clean();
 
  }

  ?>
    
  <!-- Breadcrumb -->
  <div class="breadcrumb-box">
    <div class="container">
    <div class="row">
      <div class="col">
        <?php echo $r ?>
      </div>
    </div>      
  </div>
  </div>
  
  <!-- End Breadcrumb -->
  



<?php }


