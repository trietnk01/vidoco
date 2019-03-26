<?php 
/*

404 template

*/
global $hidden_banner;
$hidden_banner = true;

global $hidden_breadcrum;
$hidden_breadcrum = true;

?>

<?php get_header() ?>

<div class="sc-404 p-ptb-100 p991-ptb-50 p767-ptb-20">
<div class="container">
	<div class="p-t-c">
		

		<img src="<?php echo P_IMG ?>/404-2.png ?>" alt="404">


	<!-- 	<h1 class="p-h-title">
			<?php echo t_pll("Không tìm thấy trang này","This page is not found") ?>
		</h1> -->

		<p class="p-fs-16 p-mt-10">
			<?php printf(
				__( t_pll("Quay lại trang chủ tại %sđây%s !", "Back to home page %shere%s !") ,TDM),
				"<a href='" . home_url() . "'>",
				"</a>"
			) ?>
		</p>

	</div>
</div>
</div>


<?php get_footer() ?>