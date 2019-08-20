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
		<div class="pages pages--product">
			<div class="pages__container">
				<div class="pages__content">
					<?php
					while ( have_posts() ) : the_post();
						$title          = get_the_title();
						$subtitle       = get_field('subtitle');
						$images         = get_field('images');
						$description    = get_field('description');
						$benefits       = get_field('benefits');
						$specifications = get_field('specifications');
						$related 		= get_field('relateds');
					?>
						<div class="pages__header">
							<h1 class="pages__title"><?php echo $title; ?></h1>
							<h2 class="pages__subtitle"><?php echo $subtitle; ?></h2>
						</div>
						<div class="pages__gallery">
							<div class="pages__images">
							<?php foreach($images as $image): ?>
								<div class="pages__images-item"><img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $title ?>"></div>
							<?php endforeach; ?>
							</div>
							<div class="pages__thumbs">
							<?php foreach($images as $image): ?>
								<div class="pages__thumbs-item"><img src="<?php echo $image['sizes']['medium'] ?>" alt="<?php echo $title ?>"></div>
							<?php endforeach; ?>
							</div>
						</div>
						<div class="pages__descriptions">
							<?php echo $description; ?>
						</div>	
					<?php 	
					endwhile; // End of the loop.
					?>
				</div>
				<div class="pages__mores">
					<?php if($benefits): ?>
						<section class="pages__benefits">
							<div class="pages__title-more">Benefícios</div>
							<div class="pages__text std">
								<?php echo apply_filters('the_content', $benefits); $benefits; ?>
							</div>
						</section>
					<?php endif; ?>
					<?php if($specifications): ?>
						<section class="pages__specifications">
							<div class="pages__title-more">Especificações técnicas</div>
							<div class="pages__text std">
								<?php echo apply_filters('the_content', $specifications); $specifications; ?>
							</div>
						</section>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
					<?php if($related): global $post; ?>
						<section class="pages__related product-list--related">
						<div class="pages__title-more">Produtos Relacionados</div>
						<div class="product-list__list">
							<?php foreach( $related as $post ):  ?>
								<?php setup_postdata( $post ); ?>
								<?php get_template_part( 'template-parts/content', 'products' );?>	
							<?php endforeach; ?>
							<div class="product-list__item product-list__item--empty"></div>
							<div class="product-list__item product-list__item--empty"></div>
							<div class="product-list__item product-list__item--empty"></div>
						</div>
						<?php wp_reset_postdata(); ?>
						</section>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
