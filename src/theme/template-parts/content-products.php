<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simplessystem
 */

	$title = get_the_title();
	$link = get_the_permalink();
	$images = get_field('images');
	$description = get_field('subtitle');
	$image = false;
	if(count($images)) {
		$image = $images[0]['sizes']['large'];
	}
?>

<article id="product-list-item-<?php the_ID(); ?>" <?php post_class('product-list__item'); ?>>
	<div class="product-list__border">
		<?php if( $image ): ?>
		<figure class="product-list__figure">
			<?php if ($link): ?><a href="<?php echo $link; ?>"><?php endif?>	
				<img src="<?php echo $image; ?>" class="product-list__img" alt="<?php echo $title;?>" />
			<?php if ($link): ?></a><?php endif?>
		</figure>
		<?php endif; ?>
		<h1 class="product-list__name"><?php echo $title ?></h1>
		<?php if($description): ?>
		<p class="product-list__description"><?php echo $description; ?></p>
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
