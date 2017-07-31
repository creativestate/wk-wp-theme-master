<?php
/**
 * Index page - main WP page
 *
 * @package WoltersKluwer
 * version 1.0
 */
get_header();
?>

<div class="wk-search-result">
	<div>
		<div class="items">
			<?php if (have_posts()): ?>
				<?php while (have_posts()): the_post(); ?>
					<div class="item">
						<?php if(has_post_thumbnail()): ?>
							<div class="image">
								<a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url('medium'); ?>"></a>
							</div>
						<?php endif; ?>

						<div class="text">
							<h2 class="title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title() ?></a></h2>
							<?php the_date('F j, Y', '<time><span class="wk-icon-clock-outline"></span>', '</time>'); ?>
							<?php the_tags( '<div class="tags"><span class="wk-icon-list-outline"></span>', ', ', '</div>' ); ?> 
							<div class="body"><?php 
								$content = strip_tags(strip_shortcodes(get_the_content()));
								$content = strlen($content) > 400 ? substr($content, 0, 400) . '...' : $content;
							
								echo $content;
							?></div>
						</div>

						<a class="more" href="<?php the_permalink(); ?>">
							More information
							<span class="wk-icon-arrow-right" style="background-color:rgba(<?php echo hex2rgb($instance['color'], true, ','); ?>)"></span>
						</a>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		
		<?php
			global $wp_query;
			$total = $wp_query->max_num_pages;

			if ($total > 1): ?>

		<div class="wk-pagination-bar">
			<ul class="wk-pagination">
				<?php
				
					// get the current page
					if (!$current = get_query_var('paged'))
						$current = 1;

					$link = get_pagenum_link(1) . (get_option('permalink_structure') ? '&paged=' . ($current - 1) : 'page/' . ($current - 1) . '/');
					echo '<li ' . ($current > 1 ? '' : 'class="wk-disabled"') . '><a href="' . $link . '" tabIndex="0" class="wk-button wk-button-icon"><span class="wk-icon-arrow-left"></span></a></li>';

					for ($a = 1; $a <= $total; $a++) {
						$link = get_pagenum_link(1) . (get_option('permalink_structure') ? '&paged=' . $a : 'page/' . $a . '/');

						echo '<li tabIndex="0" ' . ($a === $current ? 'class="wk-active"' : '') . '><a href="' . $link . '">' . $a . '</a></li>';
					}

					$link = get_pagenum_link(1) . (get_option('permalink_structure') ? '&paged=' . ($current + 1) : 'page/' . ($current + 1) . '/');
					echo '<li ' . ($current < $total ? '' : 'class="wk-disabled"') . '><a href="' . $link . '" tabIndex="0" class="wk-button wk-button-icon"><span class="wk-icon-arrow-right"></span></a></li>';

				?>
			</ul>
		</div>
		<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>