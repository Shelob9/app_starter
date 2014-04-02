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
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div class="off-canvas-wrap">
		<div class="inner-wrap">
			<div class="fixed">
				<nav class="tab-bar">
					<?php
						/** This action is documented in inc/foundation.php */
						if ( !do_action( 'app_starter_use_off_canvas_left') ) :
					?>
						<section class="left-small">
							<a class="left-off-canvas-toggle menu-icon" ><span></span></a>
						</section>
					<?php
						endif;
					?>

					<section class="middle tab-bar-section">
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					</section>

					<?php
						/** This action is documented in inc/foundation.php */
						if ( !do_action( 'app_starter_use_off_canvas_right') ) :
					?>
						<section class="right-small">
							<a class="right-off-canvas-toggle menu-icon" ><span></span></a>
						</section>
					<?php
						endif;
					?>
				</nav>
			</div><!--.fixed-->

		<?php app_starter_off_canvas(); ?>
			<section class="main-section">
				<div id="content" class="site-content">