<?php

if ( ! function_exists( 'app_starter_primary_class' ) ) :
/**
 * Sets the classes for #primary
 *
 * @since 0.0.1
 */
function app_starter_primary_class() {
	$classes = 'row';

	/**
	 * Override the classes for #primary
	 *
	 * @params string $classes Classes to set
	 *
	 * @since 0.0.1
	 */
	$classes = apply_filters( 'app_starter_primary_class', $classes );

	echo $classes;

}
endif;

if ( ! function_exists( 'app_starter_main_class' ) ) :
/**
 * Sets the classes for #main
 *
 * @since 0.0.1
 */
function app_starter_main_class() {
	$classes = 'large-9 small-12 columns';
	if ( do_action( 'app_starter_no_sidebar' ) ) {
		$classes = 'large-12 small-12';
	}

	/**
	 * Override the classes for #main
	 *
	 * @params string $classes Classes to set
	 *
	 * @since 0.0.1
	 */
	$classes = apply_filters( 'app_starter_main_class', $classes );

	echo $classes;

}
endif;

if ( ! function_exists( 'app_starter_sidebar_class' ) ) :
/**
 * Sets the classes for #secondary
 *
 * @since 0.0.1
 */
function app_starter_sidebar_class() {
	$classes = 'large-3 small-12 columns';

	/**
	 * Override the classes for #secondary
	 *
	 * @params string $classes Classes to set
	 *
	 * @since 0.0.1
	 */
	$classes = apply_filters( 'app_starter_sidebar_class', $classes );

	echo $classes;

}
endif;

if ( ! function_exists( 'app_starter_footer_class' ) ) :
/**
 * Sets the classes for .site-footer
 *
 * @since 0.0.1
 */
function app_starter_footer_class() {
	$classes = 'row';

	/**
	 * Override the classes for .site-footer
	 *
	 * @params string $classes Classes to set
	 *
	 * @since 0.0.1
	 */
	$classes = apply_filters( 'app_starter_footer_class', $classes );

	echo $classes;
}
endif;

if ( ! function_exists( 'app_starter_site_info_class' ) ) :
/**
 * Sets the classes for .site-info
 *
 * @since 0.0.1
 */
function app_starter_site_info_class() {
	$classes = 'large-12 small-12';

	/**
	 * Override the classes for .site-info
	 *
	 * @params string $classes Classes to set
	 *
	 * @since 0.0.1
	 */
	$classes = apply_filters( 'app_starter_site_info_class', $classes );

	echo $classes;
}
endif;

if ( ! function_exists( 'app_starter_foundation_enqueue' ) ) :
/**
 * Enqueue Foundation JS
 *
 * @since 0.0.1
 */
add_action( 'wp_enqueue_scripts', 'app_starter_foundation_enqueue', 20 );
function app_starter_foundation_enqueue() {
	wp_enqueue_script( 'foundation', get_template_directory_uri().'/js/foundation.min.js', array( 'jquery' ), '5.2.1', true );
}
endif;

if ( ! function_exists( 'app_starter_off_canvas' ) ) {
	/**
	 * Off Canvas menus
	 *
	 * @since 0.0.1
	 */
	function app_starter_off_canvas() {
		/**
		 *	Whether to use off canvas menu on right side or not.
		 *
		 *  @since 0.0.1
		 */
		if ( apply_filters( 'app_starter_use_off_canvas_left', true ) === true ) :

			/**
			 * Use to add content after the left off canvas menu.
			 *
			 * @since 0.0.1
			 */
			do_action( 'app_starter_before_off_canvas_left');
		?>
			<aside class="left-off-canvas-menu menu">
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

				/**
				 * Use to add content after the left off canvas menu.
				 *
				 * @since 0.0.1
				 */
				do_action( 'app_starter_after_off_canvas_left');
				?>
			</aside><!--/aside.left-off-canvas-menu -->
		<?php
			endif;
			/**
			 *	Whether to use off canvas menu on right side or not.
			 *
			 * 	@param bool
			 *
			 *  @since 0.0.1
			 */
			if ( apply_filters( 'app_starter_use_off_canvas_right', true ) === true ) :
				/**
				 * Use to add content after the right off canvas menu.
				 *
				 * @since 0.0.1
				 */
				do_action( 'app_starter_before_off_canvas_right');
		?>

		<aside class="right-off-canvas-menu menu">
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

			/**
			 * Use to add content after the right off canvas menu.
			 *
			 * @since 0.0.1
			 */
			do_action( 'app_starter_after_off_canvas_right');
			?>
		</aside><!--/aside.left-off-canvas-menu -->
	<?php
		endif;
	}
}
