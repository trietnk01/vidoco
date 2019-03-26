<?php

//if ( class_exists('Polylang') ) return;

function t_pll($vi = "",$en = "", $echo = false ){
	if ( !class_exists('Polylang') ){
		if ( $echo  ) {  echo $vi; } else { return $vi;  }
	}

	 if ( function_exists('pll_current_language') ){

		 if ( pll_current_language() == "vi" ) {
		 	if ( $echo  ) {  echo $vi; } else { return $vi;  }
		 	
		 } else {
		 	if ( $echo  ) {  echo $en; } else { return $en;  }
		 }

	}  else {

      	if ( $echo  ) {  echo $vi; } else { return $vi;  }
		 	
    }
}

function is_pvi(){
	if ( !class_exists('Polylang') ) return true;

	return function_exists('pll_current_language') && pll_current_language() == "vi";
}

function is_pen(){
	if ( !class_exists('Polylang') ) return false;

	return function_exists('pll_current_language') && pll_current_language() == "en";
}

/*
	<?php echo link_change_lang('vi') ?>
	<?php echo link_change_lang('en') ?>
*/
function link_change_lang( $lang ){
	if ( !class_exists('Polylang') ) return;

	$link_lang = pll_the_languages( array('dropdown' => 0, 'display_names_as' => 'slug', 'hide_current' => 0, 'echo' => 0, 'raw' => 1 ));

	return $link_lang[$lang]['url'];
	
}

function t_df_lang(){

    if ( function_exists('pll_current_language') ){

         $acf_pr = pll_current_language() == "vi" ? ""  : "_en";
         
    } else {
         $acf_pr = "";
    }

    return $acf_pr;
}