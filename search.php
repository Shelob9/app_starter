<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package app_starter
 */

get_header(); ?>

	<section id="primary" class="content-area <?php app_starter_primary_class(); ?>">
		<main id="main" class="site-main <?php app_starter_main_class(); ?>" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'app_starter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php app_starter_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php app_starter_sidebar(); ?>
<?php get_footer(); ?>
