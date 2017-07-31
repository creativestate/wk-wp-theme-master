<?php
/**
 * The template for displaying the footer
 */
?>
<footer role="contentinfo" class="wk-footer index-footer-nav index-last-footer">
	<div class="wk-footer-container">
		<div class="wk-footer-nav">
			<?php for ($i = 1; $i <= 3; $i++):
				?>
				<?php $menu = wk_get_menu('footer-column-' . $i); ?>
				<?php if ($menu && $menu->count > 0): ?>
					<div class="wk-footer-nav-list">
						<h3 class="wk-footer-heading"><?php echo esc_html($menu->name); ?></h3>
						<?php
						echo wp_nav_menu(array(
							'menu' => $menu->term_id,
							'menu_id' => '',
							'menu_class' => '',
							'container' => null,
							'depth' => 1,
							'walker' => new WK_Nav_Menu()
						));
						?>
					</div>
				<?php endif; ?>
			<?php endfor; ?>
			<div class="wk-footer-nav-list">
				<!--<h3 class="wk-footer-heading">Follow us</h3>
				<ul class="wk-nav">
					<li role="presentation"><a href="#" target="_blank" class="wk-corporate-icon"></a></li>
					<li role="presentation"><a href="#" target="_blank" class="wk-icon-twitter"></a></li>
					<li role="presentation"><a href="#" target="_blank" class="wk-icon-linkedin"></a></li>
					<li role="presentation"><a href="#" target="_blank" class="wk-icon-youtube"></a></li>
				</ul>-->
			</div>
		</div>
		<a href="<?php echo home_url(); ?>" class="wk-logo">
			<img src="<?php echo APP_IMAGE_URI; ?>/brand/wk-brand-small-white.svg" alt="Wolters Kluwer Product Name - Page anchor links to" class="wk-logo-small"/>
			<img src="<?php echo APP_IMAGE_URI; ?>/brand/wk-brand-white.svg" alt="Wolters Kluwer Product Name - Page anchor links to" class="wk-logo-large"/>
		</a>
		<div class="wk-tagline"><?php echo get_bloginfo('description'); ?></div>
	</div>
	<div class="wk-footer-copyright">
		<div class="wk-footer-copyright-container">
			<?php
				echo wp_nav_menu(array(
					'theme_location' => 'footer-links',
					'menu_id' => '',
					'menu_class' => 'wk-nav',
					'container' => null,
					'depth' => 1,
					'walker' => new WK_Nav_Menu()
				));
			?>
			<span>&copy; 2016 Wolters Kluwer</span>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
