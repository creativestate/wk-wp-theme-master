<?php
/**
 * Widget Name: Recent_News
 * Description: Recent News for pages
 */
class ZS_Widget_Recent_News extends SiteOrigin_Widget {
	
	function __construct() {
		parent::__construct(
			'recent-news',
			__('Recent News', ZS_THEME_TEXT_DOMAIN),
			array(
				'description' => __('Recent News for pages', ZS_THEME_TEXT_DOMAIN),
				'help' => '',
                'panels_icon' => 'dashicons dashicons-list-view',
                'panels_groups' => array(ZS_THEME_TEXT_DOMAIN)
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __( 'Title', ZS_THEME_TEXT_DOMAIN),
					'default' => 'Latest News',
				),
				'total' => array(
					'type' => 'number',
					'label' => __( 'Number of posts to show', ZS_THEME_TEXT_DOMAIN),
					'default' => '5',
				),
				'tags' => array(
					'type' => 'text',
					'label' => __( 'Tag', ZS_THEME_TEXT_DOMAIN),
					'default' => '',
				),
            ),
			plugin_dir_path(__FILE__)
		);
	}
	
	function tinymce_editor_buttons($buttons) {
		return array(
			"bold",
			"italic",
			"underline",
			"strikethrough",
		);
	}

	function get_template_variables( $instance, $args ){
		return array();
	}
}

siteorigin_widget_register('recent-news', __FILE__, 'ZS_Widget_Recent_News');
