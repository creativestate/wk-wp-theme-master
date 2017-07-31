<?php if (!empty($instance['media'])): ?>
	<?php $src = wp_get_attachment_image_src($instance['media'], 'default'); ?>
	<div class="wk-benefits" style="background-image: url(<?php echo esc_attr($src[0]); ?>);">
		<div class="items count-<?php echo count($instance['items']); ?>">
			<?php foreach ($instance['items'] as $id => $item): ?>
				<div class="item">
					<?php if (!empty($item['title'])): ?>
						<h2><?php echo wp_kses_post($item['title']) ?></h2>
					<?php endif; ?>
					<?php if (!empty($item['text'])): ?>
						<p><?php echo wp_kses_post($item['text']) ?></p>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if (!empty($instance['link'])): ?>
			<a class="more" href="<?php echo sow_esc_url($instance['link']); ?>" <?php echo ($instance['link_target'] ? 'target="_blank"' : ''); ?>>
				<?php echo wp_kses_post($instance['link_text']) ?>
				<span class="wk-icon-arrow-right"></span>
			</a>
		<?php endif; ?>
	</div>
<?php endif; ?>