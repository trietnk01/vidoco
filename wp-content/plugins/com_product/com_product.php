<?php
/*
Plugin Name: com_product
Plugin URI: http://cloudbeauty.vn
Description: Xay dung shopping don gian WP
Author: laptrinhtainhatui
Version: 1.0
Author URI: http://cloudbeauty.vn
*/
ob_start();
require_once 'define.php';
require_once PLUGIN_PATH . DS .  'includes'. DS .'Controller.php';
$zController;
$zController = new zController();
if(is_admin()){
	$zController->getController('/backend','AdminProductController');
}
