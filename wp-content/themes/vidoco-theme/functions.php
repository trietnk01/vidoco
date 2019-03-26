<?php
clearstatcache();
ob_start();
require_once trailingslashit( get_template_directory() ) . 'inc/init.php';
function is_localhost(){
    return in_array( $_SERVER["SERVER_ADDR"] ,  ['127.0.0.1' , "::1"] ) ;
}
if ( is_localhost() ) {
	show_admin_bar( false );
}
ob_get_clean();
// start ajaxurl 
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
// end add ajaxurl
// start datetime
function datetimeConverter($date,$format_to){
	$result="";
	$arrDate    = date_parse_from_format('Y-m-d H:i:s', $date) ;
	$ts         = mktime($arrDate["hour"],$arrDate["minute"],$arrDate["second"],$arrDate['month'],$arrDate['day'],$arrDate['year']);
	$result     = date($format_to, $ts);
	return $result;
}
// end datetime
// start ddsmoothmenu
add_action('wp_head', 'add_code_ddsmoothmenu');
function add_code_ddsmoothmenu(){			
	$chuoi= '	
	<script type="text/javascript" language="javascript">	
	ddsmoothmenu.init({
			mainmenuid: "smoothmainmenu", 
			orientation: "h", 
			classname: "ddsmoothmenu",
			contentsource: "markup" 
		});
	ddsmoothmenu.init({
			mainmenuid: "smoothmainmenumobile", 
			orientation: "h", 
			classname: "ddsmoothmobile",
			contentsource: "markup" 
		});
	</script>
	    ';				
	echo $chuoi;
}
// end ddsmoothmenu
/* begin template include */
add_filter( 'template_include', 'portfolio_page_template');
function portfolio_page_template( $template ) {

	$id=get_queried_object_id();
	$slug="";
	$term=get_term_by('id', $id,'category');
	if(!empty($term)){
		$slug=$term->slug;
	}	
	if(get_query_var('za_category') != ''){
		$file = get_template_directory() . '/template-05-product.php';
		if(file_exists($file)){
			return $file;
		}			
	}
	if(get_query_var('za_trade') != ''){
		$file = get_template_directory() . '/template-05-product.php';
		if(file_exists($file)){
			return $file;
		}			
	}
	if(get_query_var('za_vungmien') != ''){
		$file = get_template_directory() . '/template-05-product.php';
		if(file_exists($file)){
			return $file;
		}			
	}	
	if(get_query_var('zaproduct') != ''){
		$file = get_template_directory() . '/template-09-product-detail.php';
		if(file_exists($file)){
			return $file;
		}			
	}	
	if(strcmp($slug, 'diem-kinh-doanh') == 0 || strcmp($slug, 'tram-dung-chan') == 0){
		$file = get_template_directory() . '/template-06-business-position.php';
		if(file_exists($file)){
			return $file;
		}
	}		
	return $template;
}
/* end template include */
