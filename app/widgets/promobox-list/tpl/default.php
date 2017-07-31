<div class="wk-promobox-list">
	<div>
		<?php if (!empty($instance['label'])): ?>
			<div id="<?php echo sanitize_title($instance['label']); ?>" class="label" style="background-color:rgba(<?php echo hex2rgb($instance['color'], true, ','); ?>)">
				<?php echo wp_kses_post($instance['label']) ?>
			</div>
		<?php endif; ?>

		<div class="items <?php echo count($instance['items']) % 4 == 0 ? 'four' : 'three'; ?>">
			<?php foreach ($instance['items'] as $id => $item): ?>
				<div class="item">
					<?php if (!empty($item['media'])): ?>
						<?php $src = wp_get_attachment_image_src($item['media'], 'default'); ?>
						<div class="image" style="background-image: url(<?php echo esc_attr($src[0]); ?>);"></div>
					<?php endif; ?>

					<div class="text">
						<?php if (!empty($item['title'])): ?>
							<h2 class="title">
								<a href="<?php echo sow_esc_url($item['link']); ?>" <?php echo ($item['link_target'] ? 'target="_blank"' : ''); ?>>
									<?php echo wp_kses_post($item['title']) ?>
								</a>
							</h2>
						<?php endif; ?>

						<?php if (!empty($item['text'])): ?>
							<div class="body"><?php echo wp_kses_post($item['text']) ?></div>
						<?php endif; ?>

						<?php if (!empty($item['price'])): ?>
							<div class="price"><?php echo wp_kses_post($item['price']) ?></div>
						<?php endif; ?>
					</div>

					<?php if (!empty($item['link'])): ?>
						<a class="more" href="<?php echo sow_esc_url($item['link']); ?>" <?php echo ($item['link_target'] ? 'target="_blank"' : ''); ?>>
							<?php echo wp_kses_post($item['link_text']) ?>
							<span class="wk-icon-arrow-right"></span>
						</a>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>