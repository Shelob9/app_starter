<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package app_starter
 */

app_starter_header(); ?>

<div id="primary" class="content-area <?php app_starter_primary_class(); ?>">
	<main id="main" class="site-main <?php app_starter_main_class(); ?>" role="main">

		<?php
		/**
		 * Filter to use some content <em>instead of the loop</em>.
		 *
		 * @params bool|string False to not use or a string to echo, or a file path to include (via pods_view() or include()
		 *
		 * @return The view or false to use the loop normally.
		 *
		 * @since 0.0.2
		 */
		$alt_view = apply_filters( 'app_starter_alt_main_view', false );
		if ( ! $alt_view ) {
			if ( have_posts() ) :


				while ( have_posts() ) : the_post();

					/**
					 * Override what content part is used for main item view
					 *
					 * @param string|null $view Path to the view relative to theme/child theme or the complete content to echo.
					 *
					 * @return file name.
					 *
					 * @since 0.0.2
					 */
					$view = apply_filters( 'app_starter_content_part_view', null );

					if ( is_null( $view ) ) {
						$type = get_post_type();
						if ( $type === false || $type === 'post' || ( is_singular( $type ) && ! file_exists( 'content-' . $type ) ) ) {
							$type = 'single';
						}

						get_template_part( 'content', $type );
					}
					else {
						/**
						 * Filter to prevent theme from attempting to use pods_view() for the
						 *
						 * @since 0.0.2
						 *
						 * @param bool True to bypass, false to attempt to use it.
						 */
						$bypass_pods_view = apply_filters( 'app_starter_bypass_pods_view_in_index', false );
						if ( $bypass_pods_view && function_exists( 'pods_view' ) && is_file( $view ) ) {
							pods_view( $view, null, app_starter_cache_expires(), app_starter_cache_mode() );
						}
						else {

							if ( is_file( $view ) ) {
								if ( file_exists( trailingslashit( get_stylesheet_directory() ) . $view ) ) {
									$view = trailingslashit( get_stylesheet_directory() ) . $view;
								}
								include( $view );
							}
							else {
								echo $view;
							}

						}

					}


				endwhile;

				app_starter_paging_nav();

			else :

			get_template_part( 'content', 'none' );

			endif;
		}
		else {
			if ( is_file( $alt_view ) && file_exists( $alt_view )  ) {
				if ( function_exists( 'pods_view' ) ) {
					pods_view( $alt_view, null, app_starter_cache_expires(), app_starter_cache_mode() );
				}
				else {
					include ( $alt_view );
				}
			}
			else {
				if ( is_string( $alt_view ) ) {
					echo $alt_view;
				}
			}
		}

		?>

	</main><!-- #main -->
	<?php app_starter_sidebar(); ?>
</div><!-- #primary -->

<?php app_starter_footer(); ?>
