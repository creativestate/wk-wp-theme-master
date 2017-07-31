<?php

$args = array(
	'posts_per_page' => $instance['total'],
	'post_type' => 'post',
	'no_found_rows' => true,
	'post_status' => 'publish',
	'ignore_sticky_posts' => true
);
$tag = null;

if (!empty($instance['tags'])){
	$tag = get_term_by('name', $instance['tags'], 'post_tag');

	if($tag) {
		$args['tag_id'] = $tag->term_id;
	}
}

$r = new WP_Query($args);
?>

<div class="wk-recent-news">
	<div>
		<?php if (!empty($instance['title'])): ?>
			<h2><?php echo wp_kses_post($instance['title']) ?></h2>
		<?php endif; ?>
		<?php if ($r->have_posts()): ?>
			<ul>
				<?php while ($r->have_posts()) : $r->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
						<span class="post-date"><?php echo get_the_date(); ?></span>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>

		<a class="more" href="<?php echo ($tag ? get_tag_link($tag) : home_url('/?post_type=post')); ?>">
			Show more
			<span class="wk-icon-arrow-right"></span>
		</a>
	</div>
</div>