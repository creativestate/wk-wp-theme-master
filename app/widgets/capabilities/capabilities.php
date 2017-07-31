<?php
/**
 * Widget Name: Capabilities
 * Description: Capabilities for pages
 */
class ZS_Widget_Capabilities extends SiteOrigin_Widget {
	
	function __construct() {
		parent::__construct(
			'capabilities',
			__('Capabilities', ZS_THEME_TEXT_DOMAIN),
			array(
				'description' => __('Capabilities for pages', ZS_THEME_TEXT_DOMAIN),
				'help' => '',
                'panels_icon' => 'dashicons dashicons-flag',
                'panels_groups' => array(ZS_THEME_TEXT_DOMAIN)
			),
			array(

			),
			array(
				'items' => array(
					'type' => 'repeater',
					'label' => __('Columns' , ZS_THEME_TEXT_DOMAIN),
					'item_name'  => __( 'Column', ZS_THEME_TEXT_DOMAIN),
					'fields' => array(
						'icon' => array(
							'type' => 'icon',
							'label' => __('Icon', ZS_THEME_TEXT_DOMAIN),
						),
						'title' => array(
							'type' => 'text',
							'label' => __( 'Title', ZS_THEME_TEXT_DOMAIN),
							'default' => '',
						),
						'text' => array(
							'type' => 'textarea',
							'label' => __( 'Text', ZS_THEME_TEXT_DOMAIN),
							'default' => '',
						),
					)
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

siteorigin_widget_register('capabilities', __FILE__, 'ZS_Widget_Capabilities');
