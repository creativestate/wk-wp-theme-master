<?php
/**
 * Shortcodes.
 *
 * @package Rocco
 * @author Muffin group
 * @link http://muffingroup.com
 */


/* ---------------------------------------------------------------------------
 * Shortcode [one] [/one]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one' ) )
{
	function sc_one( $attr, $content = null )
	{
		$output  = '<div class="column one">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [one_second] [/one_second]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_second' ) )
{
	function sc_one_second( $attr, $content = null )
	{
		$output  = '<div class="column one-second">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [one_third] [/one_third]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_third' ) )
{
	function sc_one_third( $attr, $content = null )
	{
		$output  = '<div class="column one-third">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [two_third] [/two_third]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_two_third' ) )
{
	function sc_two_third( $attr, $content = null )
	{
		$output  = '<div class="column two-third">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [one_fourth] [/one_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_one_fourth' ) )
{
	function sc_one_fourth( $attr, $content = null )
	{
		$output  = '<div class="column one-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [two_fourth] [/two_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_two_fourth' ) )
{
	function sc_two_fourth( $attr, $content = null )
	{
		$output  = '<div class="column two-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [three_fourth] [/three_fourth]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_three_fourth' ) )
{
	function sc_three_fourth( $attr, $content = null )
	{
		$output  = '<div class="column three-fourth">';
		$output .= do_shortcode($content);
		$output .= '</div>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [call_to_action]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_call_to_action' ) )
{
	function sc_call_to_action( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'image' => '',
			'title' => '',
			'btn_title' => '',
			'btn_link' => '',
			'class' => '',
			'target' => '',
		), $attr));
		
		// background image
		if( $image ){
			$bg = ' style="background:url('. $image .') center center;"';
		} else {
			$bg = false;
		}
		
		// call to action box with title only
		if( ! $content && ! $btn_title ){
			$box_class = ' short';
		} else {
			$box_class = false;
		}
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		$output = '<div class="call_to_action '. $box_class .'"'. $bg .'>';
			if( $btn_link ) $output .= '<a href="'. $btn_link .'" class="'. $class .'" '. $target .'>';
				$output .= '<div class="inner-padding">';
					if( $title ) $output .= '<h4>'. $title .'</h4>';
					$output .= '<p>'. do_shortcode( $content ) .'</p>';
					if( $btn_title ) $output .= '<span class="button">&mdash; '. $btn_title .' &mdash;</span>';
				$output .= '</div>';
			if( $btn_link ) $output .= '</a>';
		$output .= '</div>'."\n";
			
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [code] [/code]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_code' ) )
{
	function sc_code( $attr, $content = null )
	{
		$output  = '<pre>';
			$output .= do_shortcode(htmlspecialchars($content));
		$output .= '</pre>'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Alert [alert] [/alert]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_alert' ) )
{
	function sc_alert( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'style'		=> 'warning',
		), $attr));

		switch( $style ){
			case 'error':
				$icon = 'icon-remove';
				break;
			case 'info':
				$icon = 'icon-question';
				break;
			case 'success':
				$icon = 'icon-ok';
				break;
			default:
				$icon = 'icon-exclamation';
				break;
		}
			
		$output  = '<div class="alert alert_'. $style .'">';
			$output .= '<i class="alert_icon '. $icon .'"></i>';
			$output .= '<div class="alert_desc">';	
				$output .= do_shortcode( $content );
			$output .= '</div>';
		$output .= '</div>'."\n";

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Tooltip [tooltip] [/tooltip]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_tooltip' ) )
{
	function sc_tooltip( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'hint' 			=> '',
		), $attr));

		$output = '';
		if( $hint ){
			$output .= '<span class="tooltip" data-tooltip="'. $hint .'" ontouchstart="this.classList.toggle(\'hover\');">';
				$output .= do_shortcode( $content );
			$output .= '</span>'."\n";
		}

		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Progress Bars [progress_bars]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_progress_bars' ) )
{
	function sc_progress_bars( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
		), $attr));
	
		$output = '<div class="progress_bars">';
			if( $title ) $output .= '<h4 class="title">'. $title .'</h4>';
			$output .= '<ul class="bars_list">';
				$output .= do_shortcode( $content );
			$output .= '</ul>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * _Bar [bar]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_bar' ) )
{
	function sc_bar( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'value' => 0,
		), $attr));
	
		$value = intval( $value );
	
		$output  = '<li>';
			$output .= '<h6>'. $title .'<span class="label">'. $value .'%</span></h6>';
			$output .= '<div class="bar"><span class="progress" style="width:'. $value .'%"></span></div>';
		$output .= '</li>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [article_box]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_article_box' ) )
{
	function sc_article_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'image' => '',
			'title' => '',
			'link' => '',
			'link_title' => 'Read more &rarr;',
			'target' => '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		$output = '<div class="article_box">';
			$output .= '<div class="photo">';
				if( $link )  $output .= '<a href="'. $link .'" '. $target .'>';
					$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $title .'" />';
				if( $link )  $output .= '</a>';
			$output .= '</div>';
			
			$output .= '<div class="desc">';
				$output .= '<h5>'. $title .'</h5>';
				$output .= '<p>'. do_shortcode( $content ) .'</p>';
				if( $link ) $output .= '<a class="button" href="'. $link .'" '. $target .'>'. $link_title .'</a>';
			$output .= '</div>';
		
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [info_box] [/info_box]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_info_box' ) )
{
	function sc_info_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
		), $attr));
	
		$output = '<div class="info_box">';
			$output .= '<h4>'. $title .'</h4>';
			$output .= '<div class="inside">';
				$output .= do_shortcode($content);
			$output .= '</div>';
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [fact]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_fact' ) )
{
	function sc_fact( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'icon' => '',
			'value' => '',
		), $attr));
	
		$output  = '<li>';
			$output .= '<span>';
				if( $icon ) $output .= '<i class="'. $icon .'"></i>';
				$output .= $value;
			$output .= '</span>';
			$output .= $title;
		$output .= '</li>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [contact_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_contact_box' ) )
{
	function sc_contact_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'		=> '',
			'image' 	=> '',
			'address' 	=> '',
			'telephone'	=> '',
			'email' 	=> '',
			'www' 		=> '',
		), $attr));
		
		$output = '<div class="get_in_touch">';
			if( $title ) $output .= '<h3>'. $title .'</h3>';
			$output .= '<div class="inside">';
				if( $image ) $output .= '<div class="photo"><img class="scale-with-grid" src="'. $image .'" alt="'. $title .'" /></div>';
				$output .= '<ul>';
					if( $address ){
						$output .= '<li class="address">';
						$output .= '<i class="icon-map-marker"></i><p>'. $address .'</p>';
						$output .= '</li>';
					}
					if( $telephone ){
						$output .= '<li class="phone">';
						$output .= '<i class="icon-phone"></i><p>'. $telephone .'</p>';
						$output .= '</li>';
					}
					if( $email ){
						$output .= '<li class="mail">';
						$output .= '<i class="icon-envelope"></i><p><a href="mailto:'. $email .'">'. $email .'</a></p>';
						$output .= '</li>';
					}
					if( $www ){
						$output .= '<li class="www">';
						$output .= '<i class="icon-globe"></i><p><a href="http://'. $www .'">'. $www .'</a></p>';
						$output .= '</li>';
					}
				$output .= '</ul>';
			$output .= '</div>';
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [divider]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_divider' ) )
{
	function sc_divider( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'height' => '0',
			'line' => '',
		), $attr));
		
		$line = ( $line ) ? false : ' border:none; width:0; height:0;';		
		$output = '<hr style="margin: 0 0 '. intval($height) .'px;'. $line .'" />'."\n";
		
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [portfolio]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_portfolio' ) )
{
	function sc_portfolio( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' 		=> '',
			'count' 		=> '5',
			'category' 		=> '',
			'orderby' 		=> 'menu_order',
			'order' 		=> 'ASC',
			'link'			=> '',
			'link_title'	=> 'View more &rarr;',
		), $attr));
		
		$args = array(
			'post_type' 			=> 'portfolio',
			'posts_per_page' 		=> intval($count),
			'paged' 				=> -1,
			'orderby' 				=> $orderby,
			'order' 				=> $order,
			'ignore_sticky_posts' 	=>1,
		);
		if( $category ) $args['portfolio-types'] = $category;
		
		$query = new WP_Query();
		$query->query( $args );
		$post_count = $query->post_count;
		
		if ($query->have_posts())
		{
			$output  = '<div class="recent_works">';
				if( $title ) $output .= '<h3>'. $title .'</h3>';
				$output .= '<div class="inside">';
					$output .= '<ul class="da-thumbs">';
						while ($query->have_posts())
						{
							$query->the_post();
								
							$output .= '<li>';
								$output .= '<h6>'. get_the_title() .'</h6>';
								$output .= '<a href="'. get_permalink() .'">';
									$output .= get_the_post_thumbnail( null, 'portfolio-list', array('class'=>'scale-with-grid' ) );
									$output .= '<div><span class="ico"><i class="icon-plus"></i></span></div>';
								$output .= '</a>';									
							$output .= '</li>';
						}
					$output .= '</ul>';
					if( $link ) $output .= '<div class="more"><a class="button button_large" href="'. $link .'">'. $link_title .'</a></div>';
				$output .= '</div>';
			$output .= '</div>'."\n";
		}
		wp_reset_query();
	
		return $output;	
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [pricing_item] [/pricing_item]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_pricing_item' ) )
{
	function sc_pricing_item( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'price' => '',
			'currency' => '',
			'period' => '',
			'link_title' => '',
			'link' => '',
			'featured' => '',
		), $attr));
		
		$classes = '';
		
		// featured
		if( $featured ){
			$classes .= ' pricing-box-featured';
		}
		
		// no price
		if( ! $price ){
			$classes .= ' no-price';
		}
	
		$output = '<div class="pricing-box'. $classes .'">';
			$output .= '<div class="plan-header">';
				if( $price ) $output .= '<div class="price"><span><sup>'. $currency .'</sup>'. $price .'<sup class="period">'. $period .'</sup></span></div>';
				$output .= '<h3>'. $title .'</h3>';
			$output .= '</div>';
			if( $link ) $output .= '<div class="btn"><center><a class="button" href="'. $link .'">'. $link_title .'</a></center></div>';
			$output .= '<div class="plan-inside">';
				$output .= do_shortcode($content);
			$output .= '</div>';
		$output .= '</div>'."\n";
			
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [icon_box] [/icon_box]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_icon_box' ) )
{
	function sc_icon_box( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'			=> '',
			'icon'			=> 'icon-gear',
			'background' 	=> '#2C3E50',
			'color' 		=> '#fff',
		), $attr));
	
		$output = '<div class="icon_box">';
			$output .= '<div class="ico" style="background:'. $background .'; color:'. $color .';">';
				$output .= '<i class="'. $icon .'"></i>';
			$output .= '</div>';
			if( $title ) $output .= '<h5>'. $title .'</h5>';
			if( $content ) $output .= '<p>'. do_shortcode($content) .'</p>';
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [ico]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_ico' ) )
{
	function sc_ico( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'type' => '',
		), $attr));
		
		$output = '<i class="'. $type .'"></i>';
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [image]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_image' ) )
{
	function sc_image( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'src' => '',
			'alt' => '',
			'caption' => '',
			'align' => '',
			'link' => '',
			'link_image' => '',
			'link_type' => '',
			'target' => '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		// align
		if( $align ) $align = ' align'. $align;
		
		// hoover icon
		if( $link_type == 'zoom' || $link_image )	{
			$class= 'prettyphoto';
			$link_type = 'icon-eye-open';
			$target = '';
		} else {
			$class = '';
			$link_type = 'icon-link';
		}
		
		// link
		if( $link_image ) $link = $link_image;
		
		if( $link )
		{
			$output  = '<div class="scale-with-grid aligncenter wp-caption'. $align .'">';
				$output .= '<div class="photo">';
					$output .= '<div class="photo_wrapper">';
						$output .= '<a href="'. $link .'" class="'. $class .'" '. $target .'>';
							$output .= '<img class="scale-with-grid" src="'. $src .'" alt="'. $alt .'" />';
							$output .= '<div class="mask"></div>';
	    					$output .= '<i class="'. $link_type .'"></i>';
						$output .= '</a>';
					$output .= '</div>';
				$output .= '</div>';
				if( $caption ) $output .= '<p class="wp-caption-text">'. $caption .'</p>';
			$output .= '</div>'."\n";
		}
		else 
		{
			$output  = '<div class="scale-with-grid aligncenter wp-caption no-hover'. $align .'">';
				$output .= '<div class="photo">';
					$output .= '<div class="photo_wrapper">';
						$output .= '<img class="scale-with-grid" src="'. $src .'" alt="'. $alt .'" />';
					$output .= '</div>';
				$output .= '</div>';
				if( $caption ) $output .= '<p class="wp-caption-text">'. $caption .'</p>';
			$output .= '</div>'."\n";
		}
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [latest_posts]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_latest_posts' ) )
{
	function sc_latest_posts( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title'			=> '',
			'category'		=> '',
			'count' 		=> 3,
			'link' 			=> '',
			'link_title'	=> '',
		), $attr));
		
		// blog page url
		$posts_page_id = get_option( 'page_for_posts');
		$posts_page_url = get_page_uri($posts_page_id);
		
		$args = array(
			'posts_per_page' => $count ? intval($count) : 0,
			'no_found_rows' => true,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true
		);
		if( $category ) $args['category_name'] = $category;
		
		$r = new WP_Query( apply_filters( 'widget_posts_args', $args ) );
		
		$output = '<div class="latest_posts">';
			$output .= '<h3>'. $title .'</h3>';
			$output .= '<div class="inside">';
				
				if ($r->have_posts()){
					$output .= '<ul>';
				
					while ( $r->have_posts() ){
						$r->the_post();
				
						$output .= '<li>';
							if( has_post_thumbnail( get_the_ID() ) ){
								$output .= '<div class="photo">';
								$output .= get_the_post_thumbnail(  get_the_ID(), 'blog-slider', array('class'=>'scale-with-grid' ) );
								$output .= '</div>';
							}
							if( has_post_thumbnail( get_the_ID() ) ) $output .= '<div class="desc">'; else $output .= '<div class="desc no_img">';
								$output .= '<h6><a class="title" href="'. get_permalink() .'">'. get_the_title() .'</a></h6>';
								$output .= '<span class="comments">'. mfn_comments_number() .'</span>';
							$output .= '</div>';
						$output .= '</li>';
				
					}
					wp_reset_postdata();
					$output .= '</ul>';
				}
				if( $link ) $output .= '<a class="button" href="'. $link .'">'. $link_title .'</a>';
			$output .= '</div>';
		$output .= '</div>'."\n";
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [button]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_button' ) )
{
	function sc_button( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'size' => '',
			'color' => '',
			'title' => 'Read more',
			'link' => '',
			'target' => '',
			'class' => '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
							
		$output = '<a class="button button_'. $size .' button_'. $color .' '. $class .'" href="'. $link .'" '. $target .'>'. $title .'</a>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [highlight] [/highlight]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_highlight' ) )
{
	function sc_highlight( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'background' 	=> '',
			'color' 		=> '',
		), $attr));
		
		// style
		$style = '';
		if( $background ) $style .= 'background-color:'. $background .';';
		if( $color ) $style .= ' color:'. $color .';';
		if( $style ) $style = 'style="'. $style .'"';
							
		$output  = '<span class="highlight" '. $style .'>';
			$output .= $content;
		$output .= '</span>'."\n";
	
	    return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [blockquote] [/blockquote]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_blockquote' ) )
{
	function sc_blockquote( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'photo' => '',
			'author' => '',
			'company' => '',
			'link' => '',
			'target' => '',
		), $attr));
		
		// target
		if( $target ){
			$target = 'target="_blank"';
		} else {
			$target = false;
		}
		
		$output = '<blockquote>';
		
			$output .= '<p>'. do_shortcode( $content ) .'</p>';
			$output .= '<span class="arrow"></span>';
	
			$output .= '<div class="author">';
				
				$output .= '<div class="photo">';
					if( $photo ){
						$output .= '<img class="scale-with-grid" src="'. $photo .'" alt="'.$author .'" />';
					} else {
						$output .= '<img class="scale-with-grid" src="'. THEME_URI .'/images/testimonials-placeholder.png" alt="'. $author .'" />';
					}
				$output .= '</div>';
				
				$output .= '<div class="desc">';
					$output .= '<h6>'. $author .'</h6>';
					if( $link ) $output .= '<a href="'. $link .'" '. $target .'>';
						$output .= '<span>'. $company .'</span>';
					if( $link ) $output .= '</a>';
				$output .= '</div>';
				
			$output .= '</div>';
			
		$output .= '</blockquote>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [our_team]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_our_team' ) )
{
	function sc_our_team( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'image' => '',	
			'title' => '',
			'subtitle' => '',
			'email' => '',
			'phone' => '',
			'facebook' => '',
			'twitter' => '',
			'linkedin' => '',
		), $attr));
		
		$output = '<div class="team">';
			$output .= '<div class="photo">';
				$output .= '<img class="scale-with-grid" src="'. $image .'" alt="'. $title .'" />';
				if( $email || $phone || $facebook || $twitter || $linkedin ){
					$output .= '<div class="mask"></div>';
					$output .= '<div class="links">';
						if( $email ) 	$output .= '<a target="_blank" class="link" href="mailto:'. $email .'"><i class="icon-envelope"></i></a>';
						if( $facebook ) $output .= '<a target="_blank" class="link" href="'. $facebook .'"><i class="icon-facebook"></i></a>';
						if( $twitter ) 	$output .= '<a target="_blank" class="link" href="'. $twitter .'"><i class="icon-twitter"></i></a>';
						if( $linkedin ) $output .= '<a target="_blank" class="link" href="'. $linkedin .'"><i class="icon-linkedin"></i></a>';
					$output .= '</div>';
				}
			$output .= '</div>';
			$output .= '<div class="desc">';
				if( $title ) $output .= '<h4>'. $title .'</h4>';
				if( $subtitle ) $output .= '<p>'. $subtitle .'</p>';
				if( $phone ) 	$output .= '<p class="phone"><i class="icon-phone"></i> <a target="_blank" href="tel:'. $phone .'">'. $phone .'</a></p>';
			$output .= '</div>';
		$output .= '</div>'."\n";	
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [map]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_map' ) )
{
	function sc_map( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'lat' => '',
			'lng' => '',
			'height' => 200,
			'zoom' => 13,
			'uid' => uniqid(),
		), $attr));
		
		$output  = '<script src="http://maps.google.com/maps/api/js?sensor=false"></script>'."\n";
		$output .= '<script>';
			//<![CDATA[
			$output .= 'function google_maps_'. $uid .'(){';
				$output .= 'var latlng = new google.maps.LatLng('. $lat .','. $lng .');';
				$output .= 'var myOptions = {';
					$output .= 'zoom: '. intval($zoom) .',';
					$output .= 'center: latlng,';
					$output .= 'zoomControl: true,';
					$output .= 'mapTypeControl: false,';
					$output .= 'streetViewControl: false,';
					$output .= 'scrollwheel: false,';       
					$output .= 'mapTypeId: google.maps.MapTypeId.ROADMAP';
				$output .= '};';
		
				$output .= 'var map = new google.maps.Map(document.getElementById("google-map-area-'. $uid .'"), myOptions);';
				$output .= 'var marker = new google.maps.Marker({';
					$output .= 'position: latlng,';
					$output .= 'map: map,';
				$output .= '});';
			$output .= '}';
		
			$output .= 'jQuery(document).ready(function($){';
				$output .= 'google_maps_'. $uid .'();';
			$output .= '});';	
			//]]>
		$output .= '</script>'."\n";
	
		$output .= '<div id="google-map-area-'. $uid .'" style="width:100%; height:'. intval($height) .'px;">&nbsp;</div>'."\n";	
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [tabs] [/tabs]
 * --------------------------------------------------------------------------- */
global $tabs_array, $tabs_count;
if( ! function_exists( 'sc_tabs' ) )
{
	function sc_tabs( $attr, $content = null )
	{
		global $tabs_array, $tabs_count;
		
		extract(shortcode_atts(array(
			'uid' => uniqid(),
			'tabs' => '',
		), $attr));	
		do_shortcode( $content );
		
		// content builder
		if( $tabs ){
			$tabs_array = $tabs;
		}
		
		if( is_array( $tabs_array ) )
		{
			$output  = '<div class="jq-tabs">';
			$output .= '<ul>';
			
			$i = 1;
			$output_tabs = '';
			foreach( $tabs_array as $tab )
			{
				$output .= '<li><a href="#tab-'. $uid .'-'. $i .'">'. $tab['title'] .'</a></li>';
				$output_tabs .= '<div id="tab-'. $uid .'-'. $i .'">'. do_shortcode( $tab['content'] ) .'</div>';
				$i++;
			}
			
			$output .= '</ul>';
			$output .= $output_tabs;
			$output .= '</div>';
			
			$tabs_array = '';
			$tabs_count = 0;
	
			return $output;
		}
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [tab] [/tab]
 * --------------------------------------------------------------------------- */
$tabs_count = 0;
if( ! function_exists( 'sc_tab' ) )
{
	function sc_tab( $attr, $content = null )
	{
		global $tabs_array, $tabs_count;
		
		extract(shortcode_atts(array(
			'title' => 'Tab title',
		), $attr));
		
		$tabs_array[] = array(
			'title' => $title,
			'content' => do_shortcode( $content )
		);	
		$tabs_count++;
	
		return true;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [accordion] [/accordion]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_accordion' ) )
{
	function sc_accordion( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'count' => '',
			'tabs' => '',
		), $attr));
		
		$output  = '<h3>'. $title .'</h3>';
		$output .= '<div class="mfn-acc accordion">';
					
			if( is_array( $tabs ) ){
				// content builder
				foreach( $tabs as $tab ){
					$output .= '<div class="question">';
						$output .= '<h5>'. $tab['title'] .'</h5>';
						$output .= '<div class="answer">';
							$output .= do_shortcode($tab['content']);	
						$output .= '</div>';
					$output .= '</div>'."\n";
				}
			} else {
				// shortcode
				$output .= do_shortcode($content);	
			}
			
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [faq] [/faq]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_faq' ) )
{
	function sc_faq( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' => '',
			'tabs' => '',
		), $attr));
		
		$output  = '<div class="mfn-acc faq">';
		
		if( is_array( $tabs ) ){
			// content builder
			foreach( $tabs as $tab ){
				$output .= '<div class="question">';
					$output .= '<h5>'. $tab['title'] .'</h5>';
					$output .= '<div class="answer">';
						$output .= do_shortcode($tab['content']);	
					$output .= '</div>';
				$output .= '</div>'."\n";
			}
		} else {
			// shortcode
			$output .= do_shortcode($content);	
		}
		
		$output .= '</div>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Timeline
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_timeline' ) )
{
	function sc_timeline( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'count' => '',
			'tabs' => '',
		), $attr));
		
		$output  = '<ul class="timeline_items">';
		
		if( is_array( $tabs ) ){
			// content builder
			foreach( $tabs as $tab ){
				$output .= '<li>';
					$output .= '<h5>'. $tab['title'] .'</h5>';
					if( $tab['content'] ){
						$output .= '<div class="desc">';
							$output .= do_shortcode($tab['content']);
						$output .= '</div>';
					}
				$output .= '</li>';
			}
		} else {
			// shortcode
			$output .= do_shortcode($content);
		}
		
		$output .= '</ul>'."\n";
	
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [testimonials]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_testimonials' ) )
{
	function sc_testimonials( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'title' => '',
			'category' => '',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'page' => '',
		), $attr));
		
		// page link
		if( $page ){
			$page_link = get_page_link( $page );
		} else {
			$page_link = false;
		}
		
		$args = array(
			'post_type' => 'testimonial',
			'posts_per_page' => -1,
			'orderby' => $orderby,
			'order' => $order,
			'ignore_sticky_posts' =>1,
		);
		if( $category ) $args['testimonial-types'] = $category;
		
		$query = new WP_Query();
		$query->query( $args );
		$post_count = $query->post_count;
		
		if ($query->have_posts())
		{
			$output = '<div class="testimonials">';
				$output .= '<h3>'. $title .'</h3>';
				$output .= '<ul class="slider">';
					while ($query->have_posts())
					{
						$query->the_post();
						
						$output .= '<li>';
							$output .= '<blockquote>';
								if( $page_link ) $output .= '<a href="'. $page_link .'">';
									$output .= mfn_excerpt( get_the_ID(), 28, false );
									$output .= '<span class="arrow"></span>';
								if( $page_link ) $output .= '</a>';
								$output .= '<div class="author">';
									$output .= '<div class="photo">';
										if( has_post_thumbnail() ){
											$output .= get_the_post_thumbnail( null, 'testimonials', array('class'=>'scale-with-grid' ) );
										} else {
											$output .= '<img class="scale-with-grid" src="'. THEME_URI .'/images/testimonials-placeholder.png" alt="'. get_post_meta(get_the_ID(), 'mfn-post-author', true) .'" />';
										}
									$output .= '</div>';
									$output .= '<div class="desc">';
										$output .= '<h6>'. get_post_meta(get_the_ID(), 'mfn-post-author', true) .'</h6>';
										if( $link = get_post_meta(get_the_ID(), 'mfn-post-link', true) ) $output .= '<a target="_blank" href="'. $link .'">';
											$output .= '<span>'. get_post_meta(get_the_ID(), 'mfn-post-company', true) .'</span>';
										if( $link ) $output .= '</a>';
									$output .= '</div>';
								$output .= '</div>';
							$output .= '</blockquote>';
						$output .= '</li>';
						
					}
				$output .= '</ul>';
			$output .= '</div>'."\n";
		}
		wp_reset_query();
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [testimonials_page]
* --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_testimonials_page' ) )
{
	function sc_testimonials_page( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'category' => '',
			'orderby' => 'menu_order',
			'order' => 'ASC',
		), $attr));
		
		$args = array(
			'post_type' => 'testimonial',
			'posts_per_page' => -1,
			'orderby' => $orderby,
			'order' => $order,
			'ignore_sticky_posts' =>1,
		);
		if( $category ) $args['testimonial-types'] = $category;
		
		$query = new WP_Query();
		$query->query( $args );
		$post_count = $query->post_count;
		
		if ($query->have_posts())
		{
			$output = '<div class="testimonials-page">';
				$output .= '<ul>';
					while ($query->have_posts())
					{
						$query->the_post();	
						$output .= '<li>';
	
							$output .= '<blockquote>';
	
								$output .= '<p>'. get_the_content() .'</p>';
								$output .= '<span class="arrow"></span>';
								
								$output .= '<div class="author">';
									
									$output .= '<div class="photo">';
										if( has_post_thumbnail() ){
											$output .= get_the_post_thumbnail( null, 'testimonials', array('class'=>'scale-with-grid' ) );
										} else {
											$output .= '<img class="scale-with-grid" src="'. THEME_URI .'/images/testimonials-placeholder.png" alt="'. get_post_meta(get_the_ID(), 'mfn-post-author', true) .'" />';
										}
									$output .= '</div>';
									
									$output .= '<div class="desc">';
										$output .= '<h6>'. get_post_meta(get_the_ID(), 'mfn-post-author', true) .'</h6>';
										if( $link = get_post_meta(get_the_ID(), 'mfn-post-link', true) ) $output .= '<a target="_blank" href="'. $link .'">';
											$output .= get_post_meta(get_the_ID(), 'mfn-post-company', true);
										if( $link ) $output .= '</a>';
									$output .= '</div>';
									
								$output .= '</div>';
								
							$output .= '</blockquote>';
							
						$output .= '</li>';
					}
				$output .= '</ul>';
			$output .= '</div>'."\n";
		}
		wp_reset_query();
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [vimeo]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_vimeo' ) )
{
	function sc_vimeo( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'width' => '710',
			'height' => '426',
			'video' => '',
		), $attr));
		
		$output  = '<div class="article_video">';
		$output .= '<iframe class="scale-with-grid" width="'. $width .'" height="'. $height .'" src="http://player.vimeo.com/video/'. $video .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'."\n";
		$output .= '</div>';
		
		return $output;
	}
}


/* ---------------------------------------------------------------------------
 * Shortcode [youtube]
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'sc_youtube' ) )
{
	function sc_youtube( $attr, $content = null )
	{
		extract(shortcode_atts(array(
			'width' => '710',
			'height' => '426',
			'video' => '',
		), $attr));
		
		$output  = '<div class="article_video">';
		$output .= '<iframe class="scale-with-grid" width="'. $width .'" height="'. $height .'" src="http://www.youtube.com/embed/'. $video .'?wmode=opaque" frameborder="0" allowfullscreen></iframe>'."\n";
		$output .= '</div>';
		
		return $output;
	}
}


// column shortcodes --------------------
add_shortcode( 'one', 'sc_one' );
add_shortcode( 'one_second', 'sc_one_second' );
add_shortcode( 'one_third', 'sc_one_third' );
add_shortcode( 'two_third', 'sc_two_third' );
add_shortcode( 'one_fourth', 'sc_one_fourth' );
add_shortcode( 'two_fourth', 'sc_two_fourth' );
add_shortcode( 'three_fourth', 'sc_three_fourth' );

// builder items --------------------
add_shortcode( 'blockquote', 'sc_blockquote' );
add_shortcode( 'call_to_action', 'sc_call_to_action' );
add_shortcode( 'code', 'sc_code' );
add_shortcode( 'contact_box', 'sc_contact_box' );
add_shortcode( 'divider', 'sc_divider' );
add_shortcode( 'map', 'sc_map' );
add_shortcode( 'our_team', 'sc_our_team' );
add_shortcode( 'progress_bars', 'sc_progress_bars' );

// content shortcodes -------------------
add_shortcode( 'alert', 'sc_alert' );
add_shortcode( 'button', 'sc_button' );
add_shortcode( 'highlight', 'sc_highlight' );
add_shortcode( 'ico', 'sc_ico' );
add_shortcode( 'image', 'sc_image' );
add_shortcode( 'tooltip', 'sc_tooltip' );
add_shortcode( 'vimeo', 'sc_vimeo' );
add_shortcode( 'youtube', 'sc_youtube' );

// private shortcodes -------------------
add_shortcode( 'bar', 'sc_bar' );
add_shortcode( 'fact', 'sc_fact' );

?>