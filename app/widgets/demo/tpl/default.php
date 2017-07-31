<?php if (!empty($instance['text'])): ?>
	<div class="wk-demo">
		<div>
			<?php if (!empty($instance['title'])): ?>
				<div class="title <?php echo (strpos($instance['title'], '<iframe') !== false ? 'video' : '') ?>">
					<?php echo wp_kses_post($instance['title']) ?>
				</div>
			<?php endif; ?>
			<?php if (!empty($instance['text'])): ?>
				<div class="text"><?php echo wp_kses_post($instance['text']) ?></div>
			<?php endif; ?>

			<?php if (!empty($instance['link'])): ?>
				<a class="more" href="<?php echo sow_esc_url($instance['link']); ?>" <?php echo ($instance['link_target'] ? 'target="_blank"' : ''); ?>>
					<?php echo wp_kses_post($instance['link_text']) ?>
					<span class="wk-icon-arrow-right"></span>
				</a>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>