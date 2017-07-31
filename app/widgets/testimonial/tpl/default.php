<?php if (!empty($instance['quote'])): ?>
	<div class="wk-testimonial">
		<div>
			<?php if (!empty($instance['media'])): ?>
				<?php $src = wp_get_attachment_image_src($instance['media'], 'default'); ?>
				<div class="image">
					<div style="background-image: url(<?php echo esc_attr($src[0]); ?>);"></div>
				</div>
			<?php endif; ?>

			<div class="text">
				<?php if (!empty($instance['quote'])): ?>
					<blockquote><?php echo wp_kses_post(trim($instance['quote'])) ?></blockquote>
				<?php endif; ?>

				<?php if (!empty($instance['author'])): ?>
					<p class="author"><?php echo wp_kses_post($instance['author']) ?></p>
				<?php endif; ?>
				<?php if (!empty($instance['position'])): ?>
					<p class="position"><?php echo wp_kses_post($instance['position']) ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>