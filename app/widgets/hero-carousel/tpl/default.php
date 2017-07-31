<?php if (!empty($instance['images'])): ?>
	<?php $cls = '';$cls2=''; ?>
	<?php foreach ($instance['images'] as $id => $item): ?>
		<?php if (!empty($item['description'])){
			$cls = ' with-description';
		} ?>
		<?php if (substr_count($item['text'], '<p>') >= 2){
			$cls2 = ' with-long-text';
		} ?>
	<?php endforeach; ?>
	<figure class="wk-hero-carousel count-<?php echo count($instance['images']); ?> <?php echo $cls . $cls2; ?> <?php echo (count($instance['images']) > 0 && !empty($instance['images'][0]['description']) ? 'description' : ''); ?>">
		<div>
			<div class="image">
				<?php foreach ($instance['images'] as $id => $item): ?>
					<?php if (!empty($item['media'])): ?>
						<?php $src = wp_get_attachment_image_src($item['media'], 'default'); ?>
						<div class="item <?php echo ($id == 0 ? 'visible' : ''); ?>" data-id="<?php echo $id; ?>" style="background-image: url(<?php echo esc_attr($src[0]); ?>);"></div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div class="text">
				<div class="container">
					<div class="block" style="background-color:rgba(<?php echo hex2rgb($instance['block_color'], true , ',', .75);?>)">
						<div class="dots">
							<?php foreach ($instance['images'] as $id => $item): ?>
								<a href="#" class="<?php echo ($id == 0 ? 'visible' : ''); ?>" data-id="<?php echo $id; ?>" data-speed="<?php echo $item['speed']; ?>"></a>
							<?php endforeach; ?>
						</div>
						<?php foreach ($instance['images'] as $id => $item): ?>
							<?php if (!empty($item['text'])): ?>
								<div class="item <?php echo ($id == 0 ? 'visible' : ''); ?>" data-id="<?php echo $id; ?>">
									<div class="item-text"><?php echo wp_kses_post($item['text']) ?></div>
									<?php if (!empty($item['link'])): ?>
										<a href="<?php echo sow_esc_url($item['link']); ?>" <?php echo ($item['link_target'] ? 'target="_blank"' : ''); ?> style="background-color:<?php echo $instance['link_color'];?>">
											<?php echo wp_kses_post($item['link_text']) ?>
											<span class="wk-icon-arrow-right"></span>
										</a>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
					<div class="description-block">
						<?php foreach ($instance['images'] as $id => $item): ?>
							<?php if (!empty($item['description'])): ?>
								<div class="item <?php echo ($id == 0 ? 'visible' : ''); ?>" data-id="<?php echo $id; ?>">
									<?php echo wp_kses_post($item['description']) ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</figure>
<?php endif; ?>