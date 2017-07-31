<?php
/**
 * Widget Name: Promobox List
 * Description: Promobox List for pages
 */
class ZS_Widget_PromoboxList extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'promobox-list',
			__('Promobox List', ZS_THEME_TEXT_DOMAIN),
			array(
				'description' => __('Promobox List for pages', ZS_THEME_TEXT_DOMAIN),
				'help' => '',
                'panels_icon' => 'dashicons dashicons-products',
                'panels_groups' => array(ZS_THEME_TEXT_DOMAIN)
			),
			array(

			),
			array(
				'label' => array(
					'type' => 'text',
					'label' => __( 'Label', ZS_THEME_TEXT_DOMAIN),
					'default' => '',
				),
				'color' => array(
					'type' => 'color',
					'label' => __( 'Color', ZS_THEME_TEXT_DOMAIN),
					'default' => '#474747'
				),
				'items' => array(
					'type' => 'repeater',
					'label' => __('Columns' , ZS_THEME_TEXT_DOMAIN),
					'item_name'  => __( 'Column', ZS_THEME_TEXT_DOMAIN),
					'fields' => array(
						'media' => array(
							'type' => 'media',
							'label' => __( 'Image', ZS_THEME_TEXT_DOMAIN),
							'choose' => __( 'Choose image', ZS_THEME_TEXT_DOMAIN),
							'update' => __( 'Set image', ZS_THEME_TEXT_DOMAIN),
							'library' => 'image',
							'fallback' => false
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
							'rows' => 3,
						),
						'price' => array(
							'type' => 'text',
							'label' => __( 'Price', ZS_THEME_TEXT_DOMAIN),
							'default' => '0,00',
						),
						'link' => array(
							'type' => 'link',
							'label' => __('Link URL', ZS_THEME_TEXT_DOMAIN),
							'default' => ''
						),
						'link_text' => array(
							'type' => 'text',
							'label' => __( 'Link text', ZS_THEME_TEXT_DOMAIN),
							'default' => 'More information',
						),
						'link_target' => array(
							'type' => 'checkbox',
							'label' => __( 'Link opens in new window', ZS_THEME_TEXT_DOMAIN),
							'default' => false,
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

siteorigin_widget_register('promobox-list', __FILE__, 'ZS_Widget_PromoboxList');
