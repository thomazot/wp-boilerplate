<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simplessystem
 */

	$title = get_the_title();
	$link = get_field('link');
	$image = get_field('image');
	// $description = get_field('link');
?>

<article id="partners-item-<?php the_ID(); ?>" <?php post_class('partners__item'); ?>>
	<div class="partners__border">
		<?php if($image): ?>
		<figure class="partners__figure">
			<?php if($link): ?>
			<a class="partners__link" href="<?php echo $link; ?>">
			<?php endif ?>
				<img src="<?php echo $image?>" alt="<?php echo $title?>">
			<?php if($link): ?>
			</a>
			<?php endif ?>
		</figure>
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
