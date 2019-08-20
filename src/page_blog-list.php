<?php 
/**
 * Template Name: Listagem do Blog
 *
 * @package simplessystem
 */

get_header();
zotBanner('blog-banner'); 
?>

	<main id="main" class="main main--container">

	<?php
		zotPosts(16, 'desc', false, true);
	?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
