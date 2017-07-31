<?php

function zs_setup() {
	
}

add_action('after_setup_theme', 'zs_setup');
add_theme_support('post-thumbnails');

// Allowed tags within editor
function allow_multisite_tags($tags) {
	$tags['iframe'] = array(
		'src' => true,
		'width' => true,
		'height' => true,
		'align' => true,
		'class' => true,
		'name' => true,
		'id' => true,
		'frameborder' => true,
		'seamless' => true,
		'srcdoc' => true,
		'sandbox' => true,
		'allowfullscreen' => true,
		'webkitallowfullscreen' => true,
		'mozallowfullscreen' => true
	);

	return $tags;
}

add_filter('wp_kses_allowed_html', 'allow_multisite_tags');

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 * 
 * @param string $form
 */
function wpdocs_my_search_form($form) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
    <input type="text" placeholder="Type to search" value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit">' . esc_attr__('Search') . '</button>
    </form>';

	return $form;
}

add_filter('get_search_form', 'wpdocs_my_search_form');


/**
 * Custom login form
 */
function my_login_logo_url() {
    return home_url();
}

add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background: transparent url(<?php echo APP_IMAGE_URI; ?>/brand/wk-brand.svg) no-repeat center center;
			background-size: contain;
			width: auto;
			display: block;
			margin: 0 15px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );