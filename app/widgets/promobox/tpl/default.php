<?php if (!empty($instance['text'])): ?>
	<div class="wk-promobox <?php echo (!empty($instance['link']) ? 'link' : ''); ?> <?php echo (empty($instance['price']) && empty($instance['title']) ? 'small' : '') ?>">
		<div>
			<?php if (!empty($instance['label'])): ?>
				<div class="label" style="background-color:rgba(<?php echo hex2rgb($instance['color'], true , ',');?>)">
					<?php echo wp_kses_post($instance['label']) ?>
				</div>
			<?php endif; ?>

			<?php if (!empty($instance['media'])): ?>
				<div class="image">
					<?php $src = wp_get_attachment_image_src($instance['media'], 'default'); ?>
					<img src="<?php echo esc_attr($src[0]); ?>">
				</div>
			<?php endif; ?>

			<div class="text">
				<?php if (!empty($instance['title'])): ?>
					<h2 class="title">
						<a href="<?php echo sow_esc_url($instance['link']); ?>" <?php echo ($instance['link_target'] ? 'target="_blank"' : ''); ?>>
							<?php echo wp_kses_post($instance['title']) ?>
						</a>
					</h2>
				<?php endif; ?>

				<?php if (!empty($instance['text'])): ?>
					<div class="body"><?php echo wp_kses_post($instance['text']) ?></div>
				<?php endif; ?>

				<?php if (!empty($instance['price'])): ?>
					<div class="price"><?php echo wp_kses_post($instance['price']) ?></div>
				<?php endif; ?>
			</div>

			<?php if (!empty($instance['link'])): ?>
				<a class="more" href="<?php echo sow_esc_url($instance['link']); ?>" <?php echo ($instance['link_target'] ? 'target="_blank"' : ''); ?>>
					<?php echo wp_kses_post($instance['link_text']) ?>
					<span class="wk-icon-arrow-right" style="background-color:rgba(<?php echo hex2rgb($instance['color'], true , ',');?>)"></span>
				</a>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>