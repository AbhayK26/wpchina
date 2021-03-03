<?php 

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { 
	exit; 
}

// Define the DHRUBOK Folder
if( ! defined( 'APPAI_TEMPLATE_DIR' ) ) {
	define('APPAI_TEMPLATE_DIR', get_template_directory_uri() );
}