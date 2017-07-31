<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php
		
			if(get_post_type() == 'post'){
				//echo '<div class="post-title"><h1>' . get_the_title() . '</h1></div>';
			}

			the_content();
			wp_reset_postdata();

			if (get_the_content()) {

				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;
			}
		?>
		<?php

	endwhile;
endif;
?>

<?php get_footer(); ?>
