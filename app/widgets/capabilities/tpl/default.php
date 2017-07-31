<?php if (!empty($instance['items'])): ?>
	<div class="wk-capabilities">
		<div>
			<div class="items count-<?php echo count($instance['items']); ?>">
				<?php foreach ($instance['items'] as $id => $item): ?>
					<div class="item">
						<?php if (!empty($item['icon'])): ?>
							<span class="icon">
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
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>