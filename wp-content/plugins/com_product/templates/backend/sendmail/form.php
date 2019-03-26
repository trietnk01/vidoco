<?php 
global $zController;
$action = ($zController->getParams('action') != '')? $zController->getParams('action'):'sendmail';		
?>
<div class="wrap">
	<form method="POST" action="" enctype="multipart/form-data">				
		<input name="action" value="<?php echo $action;?>" type="hidden">				
		<?php wp_nonce_field($action,'security_code',true);?>				
		<table class="content-form">
			<tr>
				<td scope="row" valign="top"><b><i><label>Tiêu đề</label></i></b></td>
				<td>
					<input type="text"  name="title" class="regular-text" value="" />
				</td>
			</tr>
			<tr>
				<td scope="row" valign="top"><b><i><label>Nội dung</label></i></b></td>
				<td>
					<?php wp_editor( '','message', array() ); ?>
				</td>
			</tr>
		</table>
		<p class="submit">
			<input name="submit" class="button button-primary" value="Gửi" type="submit">
		</p>
	</form>
</div>