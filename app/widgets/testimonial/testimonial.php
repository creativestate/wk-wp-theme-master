<?php
/**
 * Widget Name: Testimonial
 * Description: Testimonial for pages
 */
class ZS_Widget_Testimonial extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'testimonial',
			__('Testimonial', ZS_THEME_TEXT_DOMAIN),
			array(
				'description' => __('Testimonial for pages', ZS_THEME_TEXT_DOMAIN),
				'help' => '',
                'panels_icon' => 'dashicons dashicons-testimonial',
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
				'quote' => array(
					'type' => 'textarea',
					'label' => __( 'Quote', ZS_THEME_TEXT_DOMAIN),
					'rows' => 3,
					'default' => '',
				),
				'author' => array(
					'type' => 'text',
					'label' => __( 'Author', ZS_THEME_TEXT_DOMAIN),
					'default' => '',
				),
				'position' => array(
					'type' => 'text',
					'label' => __( 'Position', ZS_THEME_TEXT_DOMAIN),
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

	function get_template_variables($instance, $args){
		return array();
	}
}

siteorigin_widget_register('testimonial', __FILE__, 'ZS_Widget_Testimonial');
