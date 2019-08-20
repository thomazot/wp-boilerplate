<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package simplessystem
 */

get_header();
?>


	<main id="main" class="main">

		<?php
			zotAbout();
		?>

		<div class="post-list post-list--services" id="servicos">
			<div class="post-list__container">
				<div class="post-list__header">
					<h3 class="post-list__title">Conheça nossos serviços</h3>
				</div>
				<?php zotPosts(); ?>
			</div>
		</div>

		<div class="post-list post-list--cases" id="depoimento">
			<div class="post-list__container">
				<div class="post-list__header">
					<h3 class="post-list__title">Cases de Sucesso</h3>
				</div>
				<?php zotCases(); ?>
			</div>
		</div>

		<?php 
			$years = get_theme_mod('numbers_years');
			$clients = get_theme_mod('numbers_clients');
			$works = get_theme_mod('numbers_works');
			if($years && $clients && $works):
		?>
		<div class="numbers">
			<div class="numbers__container">
				<div class="numbers__inner">
					<div class="numbers__header">
						<h3 class="numbers__title">Números alcançados</h3>
					</div>
					<div class="numbers__content">

						<div class="numbers__item numbers__item--years">
							<div class="numbers__label">
								<i class="fas fa-university"></i>
								<span data-number="<?php echo $years ?>">0</span>
							</div>
							<div class="numbers__description">Anos</div>
						</div>
						<div class="numbers__item numbers__item--clients">
							<div class="numbers__label">
								<i class="fas fa-dollar-sign"></i>
								<span>+<span data-number="<?php echo $clients ?>">0</span></span>
							</div>
							<div class="numbers__description">Clientes</div>
						</div>
						<div class="numbers__item numbers__item--works">
							<div class="numbers__label">
								<i class="fas fa-trophy"></i>
								<span>+<span data-number="<?php echo $works ?>">0</span></span>
							</div>
							<div class="numbers__description">Trabalhos</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<div class="partners" data-carousel="true">
			<div class="partners__container">
				<div class="partners__inner">
					<div class="partners__header">
						<h3 class="partners__title">Empresas Parceiras</h3>
					</div>
					<div class="partners__content">
						<?php zotPartners(); ?>
					</div>
				</div>
			</div>
		</div>

		<?php 
		$contactTitle = get_theme_mod('contact_title');
		$contactDescription = get_theme_mod('contact_text');
		?>
		<div class="contact" id="contato">
			<div class="contact__container">
				<div class="contact__inner">
					<div class="contact__header">
						<h3 class="contact__title"><?php echo $contactTitle; ?></h3>
						<div class="contact__description">
							<?php echo $contactDescription; ?>
						</div>
					</div>
					<div class="contact__content">
						<div class="contact__legend">PREENCHA O FORMULÁRIO ABAIXO E RECEBA O CONTATO DE UM ESPECIALISTA</div>
						<?php echo do_shortcode('[contact-form-7 id="15" title="Formulário de contato 1"]'); ?>
					</div>
				</div>
			</div>
		</div>

	</main>


<?php
get_sidebar();
get_footer();
