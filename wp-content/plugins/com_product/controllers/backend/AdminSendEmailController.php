<?php
class AdminSendEmailController{
	
	public function __construct(){
		$this->dispatch_function();
	}
	public function dispatch_function(){
		global $zController;		
		$action = $zController->getParams('action');
		switch ($action){			
			case 'sendmail'		: $this->sendEmail(); break;			
			default			: $this->display(); break;
		}
	}	
	public function sendEmail(){
		global $zController;		
		$title=trim($_POST["title"]);
		$message=$_POST["message"];
		$email_option_source=get_option('email_subcriber_source');
		$file_php_mailer=PLUGIN_PATH . "scripts" . DS . "phpmailer" . DS . "PHPMailerAutoload.php"	;
		require_once $file_php_mailer;
		$mail = new PHPMailer(true);
		$mail->SMTPDebug = 0;                           
		$mail->isSMTP();     
		$mail->CharSet = "UTF-8";          
		$mail->Host = "smtp.gmail.com"; 					
		$mail->SMTPAuth = true;                         
		$mail->Username = "dien.toannang@gmail.com";             
		$mail->Password = "bjsdgetadsutdono";             
		$mail->SMTPSecure = 'ssl';					                       
		$mail->Port = 465;    
		$mail->setFrom('dienit02@gmail.com', get_bloginfo( 'name' ));
		foreach ($email_option_source as $key => $value) {
			$mail->addAddress($value,$value);
		}	
		$mail->Subject = $title ;  
		$mail->msgHTML($message);
		$mail->Send();
		echo "<pre>".print_r("Gửi thông tin thành công",true)."</pre>";   			
	}
	public function display(){		
		global $zController;		
		$zController->getView('/backend/sendmail/form.php');
	}

}