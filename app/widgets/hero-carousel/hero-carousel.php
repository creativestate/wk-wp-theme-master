<?php
/**
 * Widget Name: Hero_Carousel
 * Description: Hero banner for pages
 */
class ZS_Widget_Hero_Carousel extends SiteOrigin_Widget {
	
	function __construct() {
		parent::__construct(
			'hero-carousel',
			__('Hero Carousel', ZS_THEME_TEXT_DOMAIN),
			array(
				'description' => __('Hero carousel for pages', ZS_THEME_TEXT_DOMAIN),
				'help' => '',
                'panels_icon' => 'dashicons dashicons-welcome-view-site',
                'panels_groups' => array(ZS_THEME_TEXT_DOMAIN)
			),
			array(

			),
			array(
				'block_color' => array(
					'type' => 'color',
					'label' => __( 'Block Color', ZS_THEME_TEXT_DOMAIN),
					'default' => '#007ac3'
				),
				'link_color' => array(
					'type' => 'color',
					'label' => __( 'Link Color', ZS_THEME_TEXT_DOMAIN),
					'default' => '#007ac3'
				),
				'images' => array(
					'type' => 'repeater',
					'label' => __('Images' , ZS_THEME_TEXT_DOMAIN),
					'item_name'  => __( 'Image', ZS_THEME_TEXT_DOMAIN),
					'fields' => array(
						'media' => array(
							'type' => 'media',
							'label' => __( 'Image', ZS_THEME_TEXT_DOMAIN),
							'choose' => __( 'Choose image', ZS_THEME_TEXT_DOMAIN),
							'update' => __( 'Set image', ZS_THEME_TEXT_DOMAIN),
							'library' => 'image',
							'fallback' => false
						),
						'text' => array(
							'type' => 'tinymce',
							'label' => __( 'Text', ZS_THEME_TEXT_DOMAIN),
							'default' => '',
							'rows' => 3,
							'button_filters' => array(
								'mce_buttons' => array( $this, 'tinymce_editor_buttons')
							),
						),
						'description' => array(
							'type' => 'tinymce',
							'label' => __( 'Description', ZS_THEME_TEXT_DOMAIN),
							'default' => '',
							'rows' => 5,
							'button_filters' => array(
								'mce_buttons' => array( $this, 'tinymce_editor_buttons')
							),
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
						'speed' => array(
							'type' => 'number',
							'label' => __( 'Seconds to wait for next item', ZS_THEME_TEXT_DOMAIN),
							'default' => '7.5',
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

siteorigin_widget_register('hero-carousel', __FILE__, 'ZS_Widget_Hero_Carousel');
