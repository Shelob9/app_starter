<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package app_starter
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div>

	<?php
		/**
		 * Header content
		 *
		 * If false app_starter_start_off_canvas() is used.
		 *
		 * @param bool|string $header The header content or false for Off Canvas
		 *
		 * @since 0.0.1
		 */
		$header = apply_filters( 'app_starter_header', false  );
		if ( ! $header ) {
			echo app_starter_start_off_canvas();
		}
		else {
			if ( is_string( $header ) ) {
				echo $header;
			}

		}
	?>
			<section class="main-section">
				<div id="content" class="site-content">
