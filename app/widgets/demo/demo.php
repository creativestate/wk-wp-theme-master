<?php
/**
 * Widget Name: Demo
 * Description: Demo for pages
 */
class ZS_Widget_Demo extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'demo',
			__('Demo', ZS_THEME_TEXT_DOMAIN),
			array(
				'description' => __('Demo for pages', ZS_THEME_TEXT_DOMAIN),
				'help' => '',
                'panels_icon' => 'dashicons dashicons-admin-network',
                'panels_groups' => array(ZS_THEME_TEXT_DOMAIN)
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'tinymce',
					'label' => __( 'Title', ZS_THEME_TEXT_DOMAIN),
					'default' => '',
					'rows' => 3,
					'button_filters' => array(
						'mce_buttons' => array( $this, 'tinymce_editor_buttons')
					),
				),
				'text' => array(
					'type' => 'textarea',
					'label' => __( 'Text', ZS_THEME_TEXT_DOMAIN),
					'default' => '',
					'rows' => 3,
				),
				'link' => array(
					'type' => 'link',
					'label' => __('Link URL', ZS_THEME_TEXT_DOMAIN),
					'default' => ''
				),
				'link_text' => array(
					'type' => 'text',
					'label' => __( 'Link text', ZS_THEME_TEXT_DOMAIN),
					'default' => 'More',
				),
				'link_target' => array(
					'type' => 'checkbox',
					'label' => __( 'Link opens in new window', ZS_THEME_TEXT_DOMAIN),
					'default' => false,
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

	function get_template_variables($instance, $args){
		return array();
	}
}

siteorigin_widget_register('demo', __FILE__, 'ZS_Widget_Demo');
