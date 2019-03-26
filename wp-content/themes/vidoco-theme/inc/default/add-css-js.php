<?php
// Load css
add_action('wp_enqueue_scripts','p_load_css_js');
if(!function_exists('p_load_css_js')){
    function p_load_css_js(){    
        global $wp_scripts;   
        $js_css_ran = rand(1000,100000);
        //normalize
        wp_enqueue_style('normalize',get_template_directory_uri() . '/assets/normalize/normalize-4.2.0.css',array(),@$js_css_ran,'all');
        //begin bootstrap
        wp_enqueue_style('bootstrap_css',get_template_directory_uri() . '/assets/bootstrap-4/css/bootstrap.min.css',array(),@$js_css_ran,'all');
        wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/assets/bootstrap-4/js/bootstrap.min.js',array('jquery'),@$js_css_ran,true);
        //end bootstrap
        // begin jquery-ui
        wp_enqueue_style('jquery-ui-css',get_template_directory_uri() . '/assets/jquery/jquery-ui.min.css',array(),@$js_css_ran,'all');
        wp_enqueue_script('jquery-ui-js', get_template_directory_uri() . '/assets/jquery/jquery-ui.min.js',array('jquery'),@$js_css_ran,true);
        // end jquery-ui      
        // begin font-awesome
        wp_enqueue_style('font-awesome',get_template_directory_uri() . '/assets/fontawesome/css/fontawesome.min.css',array(),@$js_css_ran,'all');
        // end font-awesome
        // begin animate
        wp_enqueue_style('animate',get_template_directory_uri() . '/assets/animated/animate-3.5.2.css',array(),@$js_css_ran,'all');
        // end animate        
        // begin simplelightbox
        wp_enqueue_style('lightbox-css', get_template_directory_uri() . '/assets/simpleLightbox/simplelightbox.min.css',array(),@$js_css_ran,'all');       
        wp_enqueue_script('lightbox-js',get_template_directory_uri() . '/assets/simpleLightbox/simple-lightbox.min.js',array('jquery'),@$js_css_ran,true);
        // end simplelightbox        
        // begin modal video
        wp_enqueue_style('modalvideo',get_template_directory_uri() . '/assets/modalvideo/css/modal-video.min.css',array(),@$js_css_ran,'all');
        wp_enqueue_script('modalvideo',get_template_directory_uri() . '/assets/modalvideo/js/jquery-modal-video.min.js',array('jquery'),@$js_css_ran,true);
        // end modal video        
        // begin owlcarousel2-2.2
        wp_enqueue_style('owl-min', get_template_directory_uri() . '/assets/owlcarousel/owl.carousel.min.css',array(),@$js_css_ran,'all');
        wp_enqueue_style('owl-themes', get_template_directory_uri() . '/assets/owlcarousel/owl.theme.default.min.css',array(),@$js_css_ran,'all');
        wp_enqueue_script('owl-js', get_template_directory_uri() . '/assets/owlcarousel/owl.carousel.min.js',array('jquery'),@$js_css_ran,true);
        // end owlcarousel2-2.2
        // begin wow.min
        wp_enqueue_script('wow.min',get_template_directory_uri() . '/assets/wow/wow.min.js',array('jquery'),@$js_css_ran,true);
        // end wow.min
        // begin counterup
        wp_enqueue_script('counterup.min',get_template_directory_uri() . '/assets/counterup/jquery.counterup.min.js',array('jquery'),@$js_css_ran,true);
        wp_enqueue_script('waypoints.min',get_template_directory_uri() . '/assets/counterup/waypoints.min.js',array('jquery'),@$js_css_ran,true);
        // end counterup
        // begin scroll-top
        wp_enqueue_script('scroll-top',get_template_directory_uri() . '/assets/js/scroll-top.js',array('jquery'),@$js_css_ran,true);
        // end scroll-top
        // start ddsmoothmenu
        wp_enqueue_script('ddsmoothmenu_js',get_template_directory_uri() . '/assets/ddsmoothmenu/js/ddsmoothmenu.js',array('jquery'),@$js_css_ran,false);
        wp_enqueue_style('ddsmoothmenu_css', get_template_directory_uri() . '/assets/ddsmoothmenu/css/ddsmoothmenu.css',array(),@$js_css_ran,'all'); 
        // end ddsmoothmenu
        // start select2
        wp_enqueue_script('select2_js',get_template_directory_uri() . '/assets/select2/select2.min.js',array('jquery'),@$js_css_ran,true);
        wp_enqueue_style('select2_css',get_template_directory_uri() . '/assets/select2/select2.min.css',array(),@$js_css_ran,'all'); 
        // end select2
        // begin matchHeight-min
        wp_enqueue_script('jquery.matchHeight-min',get_template_directory_uri() . '/assets/jquery/jquery.matchHeight-min.js',array('jquery'),@$js_css_ran,true);
        // end matchHeight-min
        // begin  carousel-pro
        wp_enqueue_script('carousel-pro',get_template_directory_uri() . '/assets/js/owl-carousel-pro.js',array('jquery'),@$js_css_ran,true);
        // end   carousel-pro            
        wp_enqueue_style('pcss', get_template_directory_uri() . '/assets/css/pcss.css',array(),@$js_css_ran,'all');  
        // begin alo_phone               
        wp_enqueue_style('alophonecss',get_template_directory_uri() . '/assets/alophone/css/callnow.css',array(),@$js_css_ran,'all');
        // end alo_phone
        // begin custom               
        wp_enqueue_style('stylecss',get_template_directory_uri() . '/assets/css/style.css',array(),@$js_css_ran,'all');
        wp_enqueue_script('stylefuncjs',get_template_directory_uri() . '/assets/js/function.js',array('jquery'),@$js_css_ran,true);                             
        wp_enqueue_script('stylecustomjs',get_template_directory_uri() . '/assets/js/custom.js',array('jquery'),@$js_css_ran,true);
        // end custom
    }
}   