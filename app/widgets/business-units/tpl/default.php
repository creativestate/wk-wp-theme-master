<?php if (!empty($instance['items'])): ?>
	<div class="wk-business-units">
		<div>
			<?php if (!empty($instance['title'])): ?>
				<h1>
					<?php echo wp_kses_post($instance['title']) ?>
				</h1>
			<?php endif; ?>
			<div class="items count-<?php echo count($instance['items']); ?>">
				<?php foreach ($instance['items'] as $id => $item): ?>
					<div class="item">
						<?php if (!empty($item['icon'])): ?>
							<span class="icon" style="background-color:<?php echo esc_attr($item['color']); ?>">
								<?php echo siteorigin_widget_get_icon($item['icon']); ?>
							</span>
						<?php endif; ?>
						<?php if (!empty($item['title'])): ?>
							<h2 style="background-color:<?php echo esc_attr($item['color']); ?>">
								<?php echo wp_kses_post($item['title']) ?>
							</h2>
						<?php endif; ?>
						<?php if (!empty($item['text'])): ?>
							<p><?php echo wp_kses_post($item['text']) ?></p>
						<?php endif; ?>

						<?php if (!empty($item['link'])): ?>
							<a href="<?php echo sow_esc_url($item['link']); ?>">
								<?php echo wp_kses_post($item['link_text']) ?>
								<span class="wk-icon-arrow-right"></span>
							</a>
						<?php endif; ?>

						<?php
						if (!empty($item['menu'])) {
							echo '<h3>' .wp_kses_post($item['menu_title']) .'</h3>';
							echo wp_nav_menu(array(
								'menu' => $item['menu'],
								'menu_class' => 'wk-nav wk-nav-stacked',
								'container' => null,
								'depth' => 1,
								'walker' => new WK_Nav_Menu()
							));
						}
						?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>