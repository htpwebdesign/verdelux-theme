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

	<footer id="colophon" class="vlx__footer site-footer">
		<!-- footer menu nav -->
		<section class="vlx__footer__section footer-menus">
			<nav class="vlx__footer--navLeft footer-icons" id="footer-icons" aria-label="Footer Social Media Navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-left',
						)
					);
				?>
			</nav>
			<section class="vlx__footer__section footer-logo">
    			<?php include get_template_directory() . '/images/logo.php'; ?>
			</section>
			<nav class="vlx__footer--navRight footer-navigation" id="footer-navigation" aria-label="Footer Pages Navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-right',
						)
					);
				?>
			</nav>
		</section>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
