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
		<a class="exit-off-canvas"></a>

		</div><!--.inner-wrap-->
	</div><!--.off-canvas-wrap-->

</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
