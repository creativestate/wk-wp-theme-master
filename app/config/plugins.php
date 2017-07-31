<?php

function plugin_dir_url_custom($file) {
	$path = wp_normalize_path(dirname($file));
	return WP_CONTENT_URL . substr($path, strpos($path, 'wp-content') + 10) . '/';
}

require_once(APP_PLUGIN_DIR . 'siteorigin-panels/siteorigin-panels.php');
require_once(APP_PLUGIN_DIR . 'so-widgets-bundle/so-widgets-bundle.php');
require_once(APP_PLUGIN_DIR . 'openid-connect-generic/openid-connect-generic.php');