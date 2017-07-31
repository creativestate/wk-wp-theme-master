<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="robots" content="index, follow" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta http-equiv="cleartype" content="on">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

		<?php echo appIcons() ?>

		<link rel="stylesheet" href="<?php echo APP_CSS_URI; ?>standard.min.css">
		<link rel="stylesheet" href="<?php echo APP_CSS_URI; ?>site.min.css?v=<?php echo filemtime(APP_CSS_DIR . 'site.min.css'); ?>">

		<script type="text/javascript" src="<?php echo APP_VENDOR_URI; ?>jquery/jquery-2.1.3.min.js"></script>
        <script defer="defer" type="text/javascript" src="<?php echo APP_VENDOR_URI; ?>jquery/jquery-ui.min.js"></script>
        <script defer="defer" type="text/javascript" src="<?php echo APP_VENDOR_URI; ?>jquery/jquery-ui-touch-punch.min.js"></script>
		<script defer="defer" type="text/javascript" src="<?php echo APP_JS_URI; ?>site.min.js?v=<?php echo filemtime(APP_JS_DIR . 'site.min.js'); ?>"></script>

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> >
		<header role="banner" class="wk-header">
			<div class="wk-header-container">
				<a href="<?php echo home_url(); ?>" class="wk-logo">
					<img src="<?php echo APP_IMAGE_URI; ?>/brand/wk-brand-small.svg" data-src-light="<?php echo APP_IMAGE_URI; ?>/brand/wk-brand-small-white.svg" data-src-dark="<?php echo APP_IMAGE_URI; ?>/brand/wk-brand-small.svg" alt="Wolters Kluwer" class="wk-logo-small">
					<img src="<?php echo APP_IMAGE_URI; ?>/brand/wk-brand.svg" data-src-light="<?php echo APP_IMAGE_URI; ?>/brand/wk-brand-white.svg" data-src-dark="<?php echo APP_IMAGE_URI; ?>/brand/wk-brand.svg" alt="Wolters Kluwer" class="wk-logo-large">
				</a>
				<ul class="wk-nav">
					<li role="presentation" class="search <?php echo (get_search_query() ? 'open' : ''); ?>">
						<a href="<?php echo home_url(); ?>" class="wk-icon-search"></a>
					</li>
					<li role="presentation" class="search-form">
						<?php get_search_form(); ?>
					</li>
				</ul>
			</div>
		</header>

		<nav role="navigation" class="wk-navbar">
			<div class="wk-navbar-container">
				<ul class="wk-more-menu">
					<li role="presentation"><a href="javascript:void(0)"><span class="wk-icon-menu"></span>Menu</a></li>
				</ul>
				<?php
				echo wp_nav_menu(array(
					'theme_location' => 'main-menu',
					'menu_class' => 'wk-nav',
					'menu_id' => '',
					'container' => null,
					'depth' => 2,
					'walker' => new WK_Nav_Menu()
				));
				?>
				<div class="wk-product-name"><?php echo get_bloginfo('name'); ?></div>
			</div>
		</nav>