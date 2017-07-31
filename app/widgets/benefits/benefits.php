<?php
/**
 * Widget Name: Benefits
 * Description: Benefits for pages
 */
class ZS_Widget_Benefits extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'benefits',
			__('Benefits', ZS_THEME_TEXT_DOMAIN),
			array(
				'description' => __('Benefits for pages', ZS_THEME_TEXT_DOMAIN),
				'help' => '',
                'panels_icon' => 'dashicons dashicons-exerpt-view',
                'panels_groups' => array(ZS_THEME_TEXT_DOMAIN)
			),
			array(

			),
			array(
				'media' => array(
					'type' => 'media',
					'label' => __( 'Image', ZS_THEME_TEXT_DOMAIN),
					'choose' => __( 'Choose image', ZS_THEME_TEXT_DOMAIN),
					'update' => __( 'Set image', ZS_THEME_TEXT_DOMAIN),
					'library' => 'image',
					'fallback' => false
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
				'items' => array(
					'type' => 'repeater',
					'label' => __('Columns' , ZS_THEME_TEXT_DOMAIN),
					'item_name'  => __( 'Column', ZS_THEME_TEXT_DOMAIN),
					'fields' => array(
						'title' => array(
							'type' => 'text',
							'label' => __( 'Title', ZS_THEME_TEXT_DOMAIN),
							'default' => '',
						),
						'text' => array(
							'type' => 'textarea',
							'label' => __( 'Text', ZS_THEME_TEXT_DOMAIN),
							'default' => '',
							'rows' => 3,
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

	function get_template_variables($instance, $args){
		return array();
	}
}

siteorigin_widget_register('benefits', __FILE__, 'ZS_Widget_Benefits');
