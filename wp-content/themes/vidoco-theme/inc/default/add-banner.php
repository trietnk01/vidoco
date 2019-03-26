<?php 
// -------------------------------------
// Add banner
// -------------------------------------

add_action('p_after_header','p_add_banner',1);
function p_add_banner( $show = false ){

  if ( $show == false ) {

    global $hidden_banner;

    if( is_home() || $hidden_banner  ) return;

  }

  $acf_pr = t_df_lang(); 

  $banner = p_acf_o("banner_post" .   $acf_pr , p_link_img_placeholder() );

  if ( is_singular() ) { 

    if ( get_field("banner_post2") ) {
  	 $banner = get_field("banner_post2");
    }

  } else if ( is_category()  ||  is_tag() || is_tax()  ) {	

  	global $wp_query;
  	$term = get_queried_object();

     if ( get_field("banner_post2", $term) ) {
      	$banner = get_field("banner_post2", $term);
    }
  }


  ?>

  <div class="sc-banner-theme">

    <div style="background:url(<?php echo $banner ?>) no-repeat center/cover;padding-top:20%;">

    </div>

  </div>

  <?php
}
