<?php


// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function appai_theme_options_style() {

	// Globalizing theme options values
	global $appai;

	//
	// Enqueueing StyleSheet file
	//
	wp_enqueue_style( 'appai-theme-custom-style', get_template_directory_uri() . '/assets/css/theme_options_style.css'  );

	$css_output = '';


	/*=============================================
	=            CUSTOM FOOTER STYLES             =
	=============================================*/

    $custom_footer_padding_top = get_post_meta( get_the_ID(), 'footer_top_padding', true );
    $custom_footer_padding_bottom = get_post_meta( get_the_ID(), 'footer_bottom_padding', true );

    if( $custom_footer_padding_top ) {

    	$css_output = "
			footer#footer-area{
				padding-top: {$custom_footer_padding_top}px;
			}
    	";
    }

    if( $custom_footer_padding_bottom ) {

    	$css_output = "
			footer#footer-area{
				padding-bottom: {$custom_footer_padding_bottom}px;
			}
    	";
    }

	if( isset( $appai['preloader_background'] ) ) {

		$color_from = $appai['preloader_background']['from'];
		$color_to = $appai['preloader_background']['to'];

		$css_output .= "
			#preloader-wrapper{
				background: linear-gradient(to right, {$color_from} 0%, {$color_to} 100%);
			}
    	";
	}




	if( isset( $appai['accent_gradient'] ) ) {

		$color_from = $appai['accent_gradient']['from'];
		$color_to = $appai['accent_gradient']['to'];

		$css_output .= "
			.social a:after{
				background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
				background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
			}

			.comments-form-area form#commentform input[type='submit']{
				background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
				background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
			}

			.comming-soon-wrapper .grad-bg-hover li a:after{
				background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
				background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
			}
    	";
	}



	// Before Scroll header custom colors


	if( isset( $appai['header_nav_background_before_scroll'] ) ) {

		$color_from = $appai['header_nav_background_before_scroll']['from'];
		$color_to = $appai['header_nav_background_before_scroll']['to'];

		$css_output .= "
			header.custom .navbar.affix-top{
				background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
				-webkit-background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
			}
		";
	}


	if( isset( $appai['menu_item_dropdown_bg_color'] ) ) {

		$color = $appai['menu_item_dropdown_bg_color'];

		$css_output .= "
			header.custom .navbar.affix-top .navbar-nav li .sub-menu li a{
				background: {$color};
			}

		";
	}


	if( isset( $appai['menu_item_dropdown_border_color'] ) ) {

		$color = $appai['menu_item_dropdown_border_color'];

		$css_output .= "
			header.custom .navbar.affix-top .navbar-nav li .sub-menu, header.custom .navbar.affix-top .navbar-nav li .sub-menu li{
				border-color: {$color};
			}
		";
	}

	if( isset( $appai['menu_item_dropdown_hover_bg_color'] ) ) {

		$color = $appai['menu_item_dropdown_hover_bg_color'];

		$css_output .= "
			header.custom .navbar.affix-top .navbar-nav li .sub-menu li a:hover{
				background: {$color};
			}
		";

	}


	if( isset( $appai['menu_item_dropdown_hover_font_color'] ) ) {

		$color = $appai['menu_item_dropdown_hover_font_color'];

		$css_output .= "
			header.custom .navbar.affix-top .navbar-nav li .sub-menu li a:hover{
				color: {$color} !important;
			}
		";

	}



	// After Scroll header custom colors

	if( isset( $appai['header_nav_background_after_scroll'] ) ) {

		$color_from = $appai['header_nav_background_after_scroll']['from'];
		$color_to = $appai['header_nav_background_after_scroll']['to'];

		$css_output .= "
			header.custom .navbar.affix{
				background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
				-webkit-background: rgba(0, 0, 0, 0) linear-gradient(to right, {$color_from} 0%, {$color_to} 100%) repeat scroll 0 0;
			}
		";
	}


	if( isset( $appai['after_scroll_menu_item_dropdown_bg_color'] ) ) {

		$color = $appai['after_scroll_menu_item_dropdown_bg_color'];

		$css_output .= "
			header.custom .navbar.affix .navbar-nav li .sub-menu li a{
				background: {$color};
			}

		";
	}


	if( isset( $appai['after_scroll_menu_item_dropdown_border_color'] ) ) {

		$color = $appai['after_scroll_menu_item_dropdown_border_color'];

		$css_output .= "
			header.custom .navbar.affix .navbar-nav li .sub-menu, header.custom .navbar.affix .navbar-nav li .sub-menu li{
				border-color: {$color};
			}
		";
	}

	if( isset( $appai['after_scroll_menu_item_dropdown_hover_bg_color'] ) ) {

		$color = $appai['after_scroll_menu_item_dropdown_hover_bg_color'];

		$css_output .= "
			header.custom .navbar.affix .navbar-nav li .sub-menu li a:hover{
				background: {$color};
			}
		";

	}


	if( isset( $appai['after_scroll_menu_item_dropdown_hover_font_color'] ) ) {

		$color = $appai['after_scroll_menu_item_dropdown_hover_font_color'];

		$css_output .= "
			header.custom .navbar.affix .navbar-nav li .sub-menu li a:hover{
				color: {$color} !important;
			}
		";

	}



	wp_add_inline_style( 'appai-theme-custom-style', $css_output );

}
add_action('wp_enqueue_scripts', 'appai_theme_options_style');
