<?php
/**
 * Widget Name: Business Units
 * Description: Business Units for pages
 */
class ZS_Widget_Business_Units extends SiteOrigin_Widget {
	
	function __construct() {
		// Get menus
		$menus = wp_get_nav_menus();
		$options = array();

		foreach ( $menus as $menu ) {
			$options[$menu->term_id] = $menu->name;
		}
		
		parent::__construct(
			'business-units',
			__('Business Units', ZS_THEME_TEXT_DOMAIN),
			array(
				'description' => __('Business units for pages', ZS_THEME_TEXT_DOMAIN),
				'help' => '',
                'panels_icon' => 'dashicons dashicons-editor-justify',
                'panels_groups' => array(ZS_THEME_TEXT_DOMAIN)
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __( 'Title', ZS_THEME_TEXT_DOMAIN),
					'default' => 'Markets we serve',
				),
				'items' => array(
					'type' => 'repeater',
					'label' => __('Columns' , ZS_THEME_TEXT_DOMAIN),
					'item_name'  => __( 'Column', ZS_THEME_TEXT_DOMAIN),
					'fields' => array(
						'icon' => array(
							'type' => 'icon',
							'label' => __('Icon', ZS_THEME_TEXT_DOMAIN),
						),
						'color' => array(
							'type' => 'color',
							'label' => __( 'Color', ZS_THEME_TEXT_DOMAIN),
							'default' => '#85bc20'
						),
						'title' => array(
							'type' => 'text',
							'label' => __( 'Title', ZS_THEME_TEXT_DOMAIN),
							'default' => 'Business Unit',
						),
						'text' => array(
							'type' => 'textarea',
							'label' => __( 'Text', ZS_THEME_TEXT_DOMAIN),
							'default' => '',
						),
						'menu_title' => array(
							'type' => 'text',
							'label' => __( 'Menu title', ZS_THEME_TEXT_DOMAIN),
							'default' => 'Products',
						),
						'menu' => array(
							'type' => 'select',
							'label' => __('Menu', ZS_THEME_TEXT_DOMAIN),
							'default' => '',
							'options' => $options
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

siteorigin_widget_register('business-units', __FILE__, 'ZS_Widget_Business_Units');
