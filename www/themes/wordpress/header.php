<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simplessystem
 */

?>
<!doctype html>
<html amp <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<meta name="Description" content="<?php get_bloginfo( 'description', 'display' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="mobile-web-app-capable" content="yes">
	<meta name="theme-color" content="#ffa500">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );  ?>
        <?php if($image[0] != "" ){ ?>
            <meta property="og:image" content="<?php echo $image[0]; ?>"  >
        <?php } else { ?>
			<?php 
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				if($custom_logo_id):
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );	
			?>
            <meta property="og:image" content="<?php echo logo; ?>"  >
			<?php endif; ?>
        <?php } ?>
        <meta property="og:image:width" content="3523" >
        <meta property="og:image:height" content="2372" >
		<?php if ( is_front_page() && is_home() ): ?>
			<meta property="og:url" content="/"  >
			<meta property="og:title" content="<?php bloginfo( 'name' ); ?>"  >
		<?php else: ?>
			<meta property="og:url" content="<?php the_permalink(); ?>"  >
			<meta property="og:title" content="<?php the_title(); ?>"  >
		<?php endif;?>
        <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
        <meta property="og:description" content="<?php get_bloginfo( 'description', 'display' ); ?>" >
    <?php endwhile; wp_reset_query(); ?>

    <link rel="profile" href="//gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="wrapper">
	<div class="wrapper__container">
		<div class="head">
			<div class="head__container">
				<?php $social = get_theme_mod('social'); ?>
				<?php if($social): ?>
					<?php echo $social; ?>
				<?php endif; ?>
			</div>
		</div>
		<header id="header" class="header">
			<div class="header__container">
				<?php zotLogo() ?>
				<nav id="header__menu" class="header__menu" aria-expanded="false">
					<button aria-label="Abrir e Fechar menu" role="button" class="header__menu-open" aria-controls="header__menu"><i class="fas fa-bars"></i></button>
					<button aria-label="Abrir e Fechar menu" role="button" class="header__menu-wrapper" aria-controls="header__menu"></button>
					<div class="header__menu-container">
						<button aria-label="Fechar Menu" class="header__menu-close" aria-controls="header__menu"><i class="fas fa-times"></i></button>
						<?php zotMenu(); ?>
					</div>
				</nav>
			</div>
		</header>
		
		<?php if ( is_home() ) { zotBanner(); } ?>

		<div id="content" class="content">
			<div class="content__container">
