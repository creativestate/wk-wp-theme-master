<?php if (!empty($instance['text'])): ?>
	<div class="wk-content-text">
		<div>
			<?php if ($instance['author']): ?>
				<div class="content">
			<?php endif; ?>
			<?php if (!empty($instance['title'])): ?>
				<h1 class="title"><?php echo wp_kses_post($instance['title']) ?></h1>
			<?php endif; ?>
			<?php if ($instance['date']): ?>
				<?php the_date('F j, Y', '<time><span class="wk-icon-clock-outline"></span>', '</time>'); ?>
			<?php endif; ?>
			<?php if ($instance['tags']): ?>
				<?php the_tags( '<div class="tags"><span class="wk-icon-list-outline"></span>', ', ', '</div>' ); ?> 
			<?php endif; ?>
			<?php if (!empty($instance['text'])): ?>
				<div class="text"><?php echo wp_kses_post($instance['text']) ?></div>
			<?php endif; ?>
					
			<?php if ($instance['author']): ?>
				</div>
			<?php endif; ?>

			<?php if ($instance['author']): ?>
				<div class="author">
					<h1>Contact</h1>
					<?php echo get_avatar(get_the_author_meta('ID')); ?>
					<h2><?php echo get_the_author(); ?></h2>
					<p><?php echo str_replace("\n", '<br/>', get_the_author_meta('description')); ?></p>
					<?php if (get_the_author_meta('email')): ?>
						<a href="mailto:<?php echo get_the_author_meta('email'); ?>">Email</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>