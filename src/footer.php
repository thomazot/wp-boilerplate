<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simplessystem
 */
$logo = get_theme_mod('footer_logo');
$facepage = get_theme_mod('iframefacepage');
$social = get_theme_mod('social');
$telefone = get_theme_mod('telefone');
$email = get_theme_mod('email');
$assistencia = get_theme_mod('assistencia');

?>
			</div>
		</div>

		<footer id="footer" class="footer">
			<div class="footer__container">
				<div class="footer__logo">
					<h3><img src="<?php echo $logo; ?>" /></h3>
				</div>
				<?php zotMenu('Menu Rodape'); ?>

				<div class="footer__info">
					<h3 class="footer__title">Contato</h3>
					<div class="footer__contact">
						<?php if($telefone): ?>
							<div><strong>Telefone:</strong> <a href="tel:<?php echo preg_replace("/[^0-9]/", "", $telefone);?>"><?php echo $telefone; ?></a></div>
						<?php endif; ?>

						<?php if($email): ?>
							<div><strong>Vendas:</strong> <a href="mailto:<?php echo $email;?>"><?php echo $email; ?></a></div>
						<?php endif; ?>
						
						<?php if($assistencia): ?>
							<div><strong>Assistência Técnica:</strong> <a href="mailto:<?php echo $assistencia;?>"><?php echo $assistencia; ?></a></div>
						<?php endif; ?>
					</div>
				</div>

				<?php if($facepage): ?>
				<div class="footer__social-iframe">
					<?php echo $facepage; ?>
					<?php if($social): ?>
					<div class="footer__social">
						<?php echo $social; ?>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>

			<div class="footer__copyright">
				@<?php echo date('Y') ?> Copyright. Todos os direitos reservados.
			</div>
		</footer>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
