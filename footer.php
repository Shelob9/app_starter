<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package app_starter
 */
?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer <?php app_starter_footer_class(); ?>" role="contentinfo">
				<div class="site-info <?php app_starter_site_info_class(); ?>">
					<?php
						if ( apply_filters( 'app_starter_default_site_info', false  ) ) :
					?>
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'app_starter' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'app_starter' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'app_starter' ), 'App Starter', '<a href="http://JoshPress.net/" rel="designer">Josh Pollock</a>' );
					endif; //app_starter_default_site_info
					if ( false !== ( $site_info = apply_filters( 'app_starter_site_info', false ) ) ) {
						echo $site_info;
					}
					?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		<?php
			/**
			 * Output content before end of #page.
			 *
			 * @params bool|string $footer. String to output or false. If false app_starter_end_off_canvas() is used.
			 *
			 * @since 0.0.1
			 */
			$footer = apply_filters( 'app_starter_end_page', false );
			if ( ! $footer ) {
				app_starter_end_off_canvas();
			}
			else {
				echo $footer;
			}
		?>

</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
