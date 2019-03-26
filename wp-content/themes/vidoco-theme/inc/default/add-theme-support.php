<?php
// -------------------------------
//  Load support
// -------------------------------
add_action('init','p_load_support');
function p_load_support(){
    register_nav_menus(
        array(
            'primary'    => __( 'Primay Menu'),
            'mobile'  => __( 'Mobile Menu'),            
        )
    );

}
