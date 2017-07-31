<?php
/**
 * Widget Name: Content Text
 * Description: Content Text for posts & pages
 */
class ZS_Widget_ContentText extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'content-text',
			__('Content Text', ZS_THEME_TEXT_DOMAIN),
			array(
				'description' => __('Text for content blocks', ZS_THEME_TEXT_DOMAIN),
				'help' => '',
                'panels_icon' => 'dashicons dashicons-text',
                'panels_groups' => array(ZS_THEME_TEXT_DOMAIN)
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __( 'Title', ZS_THEME_TEXT_DOMAIN),
					'default' => '',
				),
				'text' => array(
					'type' => 'tinymce',
					'label' => __( 'Text', ZS_THEME_TEXT_DOMAIN),
					'default' => '',
					'rows' => 10,
					'button_filters' => array(
						'mce_buttons_2' => array( $this, 'tinymce_editor_buttons')
					),
				),
				'author' => array(
					'type' => 'checkbox',
					'label' => __( 'Show author', ZS_THEME_TEXT_DOMAIN),
					'default' => true,
				),
				'date' => array(
					'type' => 'checkbox',
					'label' => __( 'Show date', ZS_THEME_TEXT_DOMAIN),
					'default' => false,
				),
				'tags' => array(
					'type' => 'checkbox',
					'label' => __( 'Show tags', ZS_THEME_TEXT_DOMAIN),
					'default' => false,
				),
            ),
			plugin_dir_path(__FILE__)
		);
	}

	function tinymce_editor_buttons($buttons) {
		$buttons[] = 'image';
		
		return $buttons;
	}

	function get_template_variables($instance, $args){
		return array();
	}
}

siteorigin_widget_register('content-text', __FILE__, 'ZS_Widget_ContentText');
