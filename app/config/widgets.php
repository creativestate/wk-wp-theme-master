<?php

$default_active_widgets = array(
	'button' => true,
	'google-map' => true,
	'image' => false,
	'slider' => false,
	'post-carousel' => false,
	'editor' => true,
	'hero-carousel' => true,
	'business-units' => true,
	'recent-news' => true,
	'capabilities' => true,
	'testimonial' => true,
	'benefits' => true,
	'demo' => true,
	'promobox' => true,
	'promobox-list' => true,
	'content-text' => true,
);

function zs_widgets_folders($folders) {
	$folders[] = APP_WIDGET_DIR;

	return $folders;
}

function zs_widgets_default_active($widgets) {
	global $default_active_widgets;
	return $default_active_widgets;
}

function zs_widget_tabs($tabs) {
	$tabs[] = array(
		'title' => __(ZS_THEME_NAME, ZS_THEME_TEXT_DOMAIN),
		'filter' => array(
			'groups' => array(ZS_THEME_TEXT_DOMAIN)
		)
	);

	return $tabs;
}

function zs_settings_default($defaults) {
	$defaults['home-page'] = false;
	$defaults['home-page-default'] = false;
	$defaults['home-template'] = 'home-panels.php';
	$defaults['affiliate-id'] = apply_filters('siteorigin_panels_affiliate_id', false);

	// The general fields
	$defaults['post-types'] = array('page', 'post');
	$defaults['live-editor-quick-link'] = true;
	$defaults['parallax-motion'] = '';

	// Widgets fields
	$defaults['title-html'] = '<h3 class="widget-title">{{title}}</h3>';
	$defaults['add-widget-class'] = apply_filters('siteorigin_panels_default_add_widget_class', true);
	$defaults['bundled-widgets'] = get_option('siteorigin_panels_is_using_bundled', false);
	$defaults['recommended-widgets'] = true;

	// The layout fields
	$defaults['responsive'] = false;
	$defaults['tablet-layout'] = false;
	$defaults['tablet-width'] = 1024;
	$defaults['mobile-width'] = 780;
	$defaults['margin-bottom'] = 0;
	$defaults['margin-bottom-last-row'] = false;
	$defaults['margin-sides'] = 0;
	$defaults['full-width-container'] = 'body';

	// Content fields
	$defaults['copy-content'] = true;

	return $defaults;
}

function zs_icon_families_filter( $icon_families ) {
//    $icon_families['wk-icons'] = array(
//        'name' => __( 'Wolters Kluwer Icons', ZS_THEME_TEXT_DOMAIN),
//        'style_uri' => APP_CSS_URI . 'wk-icons.css',
//        'icons' => array(
//            'alert-triangle' => '&#59392;',
//            'medkit' => '&#59503;',
//            'book-outline' => '&#59414;',
//            'bookmarks-outline' => '&#59416;',
//        ),
//    );
	
    return $icon_families;
}

add_filter('siteorigin_widgets_icon_families', 'zs_icon_families_filter' );
add_filter('siteorigin_panels_settings_defaults', 'zs_settings_default');
add_filter('siteorigin_widgets_widget_folders', 'zs_widgets_folders');
add_filter('siteorigin_widgets_default_active', 'zs_widgets_default_active');
add_filter('siteorigin_panels_widget_dialog_tabs', 'zs_widget_tabs');
