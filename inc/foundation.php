<?php



function app_starter_primary_class() {
	$classes = 'row';
	$classes = apply_filters( 'app_starter_primary_class', $classes );

	echo $classes;

}

function app_starter_main_class() {
	$classes = 'large-9 small-12 columns';
	if ( do_action( 'app_starter_no_sidebar' ) ) {
		$classes = 'large-12 small-12';
	}
	$classes = apply_filters( 'app_starter_main_class', $classes );

	echo $classes;

}

function app_starter_sidebar_class() {
	$classes = 'large-3 small-12 columns';
	$classes = apply_filters( 'app_starter_sidebar_class', $classes );

	echo $classes;

}

function app_starter_footer_class() {
	$classes = 'row';
	$classes = apply_filters( 'app_starter_footer_class', $classes );

	echo $classes;
}

function app_starter_site_info_class() {
	$classes = 'large-12 small-12';
	$classes = apply_filters( 'app_starter_site_info_class', $classes );

	echo $classes;
}

add_action( 'wp_enqueue_scripts', 'app_starter_foundation_enqueue', 20 );
function app_starter_foundation_enqueue() {
	wp_enqueue_script( 'foundation', get_stylesheet_directory_uri().'/js/foundation.min.js', array( 'jquery' ), '5.2.1', true );
}

function app_starter_off_canvas() {
	if ( !do_action( 'app_starter_use_off_canvas_left') ) :
	?>
		<aside class="left-off-canvas-menu">
			<?php
			$defaults = array(
				'theme_location'  => 'off-canvas-left',
				'menu'            => '',
				'container'       => 'false',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'off-canvas-list"',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 1,
				'walker'          => ''
			);
			wp_nav_menu( $defaults );

			do_action( 'app_starter_after_off_canvas_left');
			?>
		</aside><!--/aside.left-off-canvas-menu -->
	<?php
		endif;
		if ( !do_action( 'app_starter_use_off_canvas_right') ) :
	?>

	<aside class="right-off-canvas-menu">
		<?php
		$defaults = array(
			'theme_location'  => 'off-canvas-right',
			'menu'            => '',
			'container'       => 'false',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'off-canvas-list"',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 1,
			'walker'          => ''
		);
		wp_nav_menu( $defaults );

		do_action( 'app_starter_after_off_canvas_right');
		?>
	</aside><!--/aside.left-off-canvas-menu -->
<?php
	endif;
}
