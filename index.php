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

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Override what content part is used for main item view
				 *
				 * @param string|null $view Path to the view relative to theme/child theme
				 *
				 * @return file name.
				 *
				 * @since 0.0.2
				 */
				$view = apply_filters( 'app_starter_content_part_view', null );
				if ( is_null( $view ) ) {
					$type = get_post_type();
					if ( $type === FALSE || $type === 'post' || ( is_singular( $type ) && !file_exists( 'content-' . $type ) ) ) {
						$type = 'single';
					}

					get_template_part( 'content', $type );
				}
				else {

					if ( function_exists( 'pods_view' ) ) {
						pods_view( $view, null, app_starter_cache_expires(), app_starter_cache_mode() );
					}
					else {

						include( trailingslashit( get_stylesheet_directory() ).$view );
					}

				}
				?>

			<?php endwhile; ?>

			<?php app_starter_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		<?php app_starter_sidebar(); ?>
	</div><!-- #primary -->

<?php app_starter_footer(); ?>
