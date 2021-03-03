<?php 


/**
 *
 * Maxive theme shortcode class
 *
 */

class AppaiShortcodes {

	public function __construct()
	{
		add_shortcode( 'appai_list', array($this, 'shortcode_list_render_func') );
		add_shortcode( 'appai_social_list', array($this, 'appai_social_list_render_func') );

	}


	public function shortcode_list_render_func( $atts )
	{
			extract( shortcode_atts( array (
					'link' => '',
					'icon' => '',
					'text' => '+214-5212-829'
			), $atts ) );

			$output = '<li class="list-inline">';

			if( $link ) {
					$output .= '<a href="'. $link .'">';
			}

			if(  $icon ) {
				$output .= '<i class="fa '. $icon .'"></i> ' ; 
			}

			if( $text ) {
				$output .= $text;				
			}

			if( $link ) {
					$output .= '</a>';
			}

			$output .= '</li>';

			return $output;
	}


	public function appai_social_list_render_func( $atts )
	{
			extract( shortcode_atts( array (
					'link' => '',
					'icon' => '',
			), $atts ) );

			$output = '<li>';

			if( $link ) {
					$output .= '<a href="'. $link .'">';
			}

			if(  $icon ) {
				$output .= '<i class="'. $icon .'"></i> ' ; 
			}

			if( $link ) {
					$output .= '</a>';
			}

			$output .= '</li>';

			return $output;
	}


	/**
	 *
	 * CSS Animation Styles
	 *
	 */
	public function animation_style_list()
	{
		$data = array(
			'None' => 'None',
			'bounce' => 'bounce',
			'flash' => 'flash',
			'pulse' => 'pulse',
			'rubberBand' => 'rubberBand',
			'shake' => 'shake',
			'swing' => 'swing',
			'tada' => 'tada',
			'wobble' => 'wobble',
			'jello' => 'jello',
			'bounceIn' => 'bounceIn',
			'bounceInRight' => 'bounceInRight',
			'bounceInDown' => 'bounceInDown',
			'bounceInUp' => 'bounceInUp',
			'bounceOut' => 'bounceOut',
			'bounceOutDown' => 'bounceOutDown',
			'bounceOutLeft' => 'bounceOutLeft',
			'bounceOutRight' => 'bounceOutRight',
			'bounceOutUp' => 'bounceOutUp',
			'fadeIn' => 'fadeIn',
			'fadeInDown' => 'fadeInDown',
			'fadeInDownBig' => 'fadeInDownBig',
			'fadeInLeft' => 'fadeInLeft',
			'fadeInRight' => 'fadeInRight',
			'fadeInLeftBig' => 'fadeInLeftBig',
			'fadeInRightBig' => 'fadeInRightBig',
			'fadeInUp' => 'fadeInUp',
			'fadeInUpBig' => 'fadeInUpBig',
			'fadeOut' => 'fadeOut',
			'fadeOutDown' => 'fadeOutDown',
			'fadeOutDownBig' => 'fadeOutDownBig',
			'fadeOutLeft' => 'fadeOutLeft',
			'fadeOutLeftBig' => 'fadeOutLeftBig',
			'fadeOutRightBig' => 'fadeOutRightBig',
			'fadeOutUp' => 'fadeOutUp',
			'fadeOutUpBig' => 'fadeOutUpBig',
			'flip' => 'flip',
			'flipInX' => 'flipInX',
			'flipInY' => 'flipInY',
			'flipOutX' => 'flipOutX',
			'flipOutY' => 'flipOutY',
			'fadeOutDown' => 'fadeOutDown',
			'lightSpeedIn' => 'lightSpeedIn',
			'lightSpeedOut' => 'lightSpeedOut',
			'rotateIn' => 'rotateIn',
			'rotateInDownLeft' => 'rotateInDownLeft',
			'rotateInDownRight' => 'rotateInDownRight',
			'rotateInUpLeft' => 'rotateInUpLeft',
			'rotateInUpRight' => 'rotateInUpRight',
			'rotateOut' => 'rotateOut',
			'rotateOutDownLeft' => 'rotateOutDownLeft',
			'rotateOutDownRight' => 'rotateOutDownRight',
			'rotateOutUpLeft' => 'rotateOutUpLeft',
			'rotateOutUpRight' => 'rotateOutUpRight',
			'slideInUp' => 'slideInUp',
			'slideInDown' => 'slideInDown',
			'slideInLeft' => 'a_sl',
			'slideInRight' => 'slideInRight',
			'slideOutUp' => 'slideOutUp',
			'slideOutDown' => 'slideOutDown',
			'slideOutLeft' => 'slideOutLeft',
			'slideOutRight' => 'slideOutRight',
			'zoomIn' => 'zoomIn',
			'zoomInDown' => 'zoomInDown',
			'zoomInLeft' => 'zoomInLeft',
			'zoomInRight' => 'zoomInRight',
			'zoomInUp' => 'zoomInUp',
			'zoomOut' => 'zoomOut',
			'zoomOutDown' => 'zoomOutDown',
			'zoomOutLeft' => 'zoomOutLeft',
			'zoomOutUp' => 'zoomOutUp',
			'hinge' => 'hinge',
			'rollIn' => 'rollIn',
			'rollOut' => 'rollOut'
		);
         
        return $data;
	}

}

$appaiShortcodes = new AppaiShortcodes;

