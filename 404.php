<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Verdelux_Theme
 */

get_header();
?>

<main id="primary" class="site-main vlx__main_404">

	<section class="error-404 not-found vlx__404">
		<header class="page-header vlx__404--header">
			<h1 class="page-title vlx__404__header--title"><?php esc_html_e('That page can&rsquo;t be found.', 'verdelux-theme'); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content vlx__404--content">
			<p class="vlx__404__content--msg"><?php esc_html_e('It looks like nothing was found at this location. Click the link below to go back to the home page.', 'verdelux-theme'); ?></p>
			<a href="<?php the_permalink(18) ?>">Go back to home Page</a>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
