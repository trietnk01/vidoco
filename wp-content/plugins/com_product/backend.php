<?php
class Backend{
	
	private $_menuSlug = 'zendvn-sp-manager';
	
	private $_page = '';
	
	public function __construct(){
		global $zController;	
		if(isset($_GET['page'])) $this->_page = $_GET['page'];			
		add_action('admin_menu', array($this,'menus'));
		add_action('admin_init', array($this,'do_output_buffer'));	
	}
	
	public function do_output_buffer(){
		ob_start();
	}
	public function menus(){
		add_menu_page('Gửi tin tức', 'Gửi tin tức', 'manage_options', $this->_menuSlug.'-send-email',
			array($this,'dispatch_function'),'',3);			
		//add_submenu_page($this->_menuSlug, 'Send email', 'Send email', 'manage_options', $this->_menuSlug . '-send-email',array($this,'dispatch_function'));				
	}	
	public function dispatch_function(){		
		global $zController;
		$page = $this->_page;
		switch ($page) {	
			case 'zendvn-sp-manager-send-email':
			$zController->getController('/backend','AdminSendEmailController');
			break;													
			default:				
			break;
		}		
	}
}

















