<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Verdelux_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<!-- footer menu nav -->
		<div class="footer-menus">
			<nav class="footer-icons" id="footer-icons">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-left',
						)
					);
				?>
			</nav>
			<nav class="footer-navigation" id="footer-navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-right',
						)
					);
				?>
			</nav>
		</div>

        <!-- .site-info -->
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'verdelux-theme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'verdelux-theme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'verdelux-theme' ), 'verdelux-theme', '<a href="https://verdelux.bcitwebdeveloper.ca/">FWD35</a>' );
				?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
