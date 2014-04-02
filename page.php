<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package app_starter
 */

get_header(); ?>

	<div id="primary" class="content-area <?php app_starter_primary_class(); ?>">
		<main id="main" class="site-main <?php app_starter_main_class(); ?>" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
		<?php app_starter_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>