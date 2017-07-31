<?php

/* 
 * App icons function
 */
function appIcons($themeColor = '#FFFFFF'){
	return ''
	. '<link rel="apple-touch-icon" href="'.APP_ICON_URI.'apple-touch-icon.png">'
    . '<link rel="apple-touch-icon-precomposed" href="'.APP_ICON_URI.'apple-touch-icon-precomposed.png">'
    . '<link rel="apple-touch-icon" sizes="57x57" href="'.APP_ICON_URI.'apple-touch-icon-57x57.png">'
    . '<link rel="apple-touch-icon" sizes="60x60" href="'.APP_ICON_URI.'apple-touch-icon-60x60.png">'
    . '<link rel="apple-touch-icon" sizes="72x72" href="'.APP_ICON_URI.'apple-touch-icon-72x72.png">'
    . '<link rel="apple-touch-icon" sizes="76x76" href="'.APP_ICON_URI.'apple-touch-icon-76x76.png">'
    . '<link rel="apple-touch-icon" sizes="114x114" href="'.APP_ICON_URI.'apple-touch-icon-114x114.png">'
    . '<link rel="apple-touch-icon" sizes="120x120" href="'.APP_ICON_URI.'apple-touch-icon-120x120.png">'
    . '<link rel="apple-touch-icon" sizes="144x144" href="'.APP_ICON_URI.'apple-touch-icon-144x144.png">'
    . '<link rel="apple-touch-icon" sizes="152x152" href="'.APP_ICON_URI.'apple-touch-icon-152x152.png">'
    . '<link rel="apple-touch-icon" sizes="180x180" href="'.APP_ICON_URI.'apple-touch-icon-180x180.png">'
    . '<link rel="icon" sizes="192x192" type="image/png" href="'.APP_ICON_URI.'android-chrome-192x192.png">'
    . '<link rel="icon" sizes="228x228" type="image/png" href="'.APP_ICON_URI.'coast-228x228.png">'
    . '<link rel="manifest" href="'.APP_ICON_URI.'manifest.json">'

    . '<link rel="icon" sizes="230x230" type="image/png" href="'.APP_ICON_URI.'favicon-230x230.png">'
    . '<link rel="icon" sizes="96x96" type="image/png" href="'.APP_ICON_URI.'favicon-96x96.png">'
    . '<link rel="icon" type="image/png" sizes="32x32" href="'.APP_ICON_URI.'favicon-32x32.png">'
    . '<link rel="icon" type="image/png" sizes="16x16" href="'.APP_ICON_URI.'favicon-16x16.png">'
	. '<link rel="shortcut icon" href="'.APP_ICON_URI.'favicon-wk.ico" type="image/x-icon">'
	. '<link rel="icon" href="'.APP_ICON_URI.'favicon-wk.ico" type="image/x-icon">'

    . '<meta name="msapplication-TileColor" content="'.$themeColor.'">'
    . '<meta name="msapplication-TileImage" content="'.APP_ICON_URI.'mstile-144x144.png">'
    . '<meta name="msapplication-config" content="'.APP_ICON_URI.'browserconfig.xml">'
    . '<meta name="theme-color" content="'.$themeColor.'">';
}
