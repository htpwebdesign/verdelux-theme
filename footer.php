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
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
