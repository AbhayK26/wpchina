<?php 

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { 
	exit; 
}

// Scorn shortcode class
require_once plugin_dir_path(__FILE__) . 'shortcodes/shortcodes-class.php';

// Scorn registered shortcodes
require_once plugin_dir_path(__FILE__) . 'shortcodes/appai-shortcodes.php';

// Scorn shortcode class
require_once plugin_dir_path(__FILE__) . 'shortcodes/shortcode-mapper.php';
