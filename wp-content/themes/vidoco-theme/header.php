<!DOCTYPE html>
<html <?php language_attributes() ?> data-user-agent="<?php echo $_SERVER['HTTP_USER_AGENT'] ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="icon" href="#" sizes="16x16" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object())) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php } ?>
	<?php wp_head(); ?>	
</head>
<body >
