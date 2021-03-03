<?php
/*
Plugin Name: Appai Theme Support
Plugin URI: http://themes.graphichilly.com/appain
Description: This plugin is compatible with Appai Landing Page theme
Author: Ohidul
Author URI: http://ohidul.com
Version: 1.1.2
Text Domain: appai
*/


add_action( 'init', 'appai_ts_textdomain' );

function appai_ts_textdomain() {
  load_plugin_textdomain( 'appai', false, basename( dirname( __FILE__ ) ) . '/languages' );
}


// Theme Custom Post Types
require_once plugin_dir_path(__FILE__) . 'theme-custom-post-types.php';

// Theme Shortcodes
require_once plugin_dir_path(__FILE__) . '/theme-shortcodes.php';




// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');
