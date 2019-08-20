<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package simplessystem
 */

get_header();
?>

	<main id="main" class="main main--container">

	<?php
	while ( have_posts() ) :
		the_post();
		?>
			<div class="pages__title" style="margin-bottom: 50px"><?php the_title(); ?></div>
			<div class="pages__container std"><?php the_content(); ?></div>
		<?php 
	endwhile; // End of the loop.
	?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
