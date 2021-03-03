<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


add_action('init', 'appai_kc_mapper', 99 );

function appai_kc_mapper(){

	global $kc, $appaiObj, $appaiShortcodes;

	// Check if the function exists
	if( method_exists($kc, 'add_map_param') ) {

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'row_separator',
		   		'label' => esc_html__('Use row separator?', 'appai'),
		   		'type' => 'toggle',
		  		'admin_label' => true,
		   		'description' => esc_html__('Toggle this to add beautiful row separator to your site. And go to Styles tab to give some style to the separator.', 'appai')
			), 3, 'general' );

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'row_pseudo_switch',
		   		'label' => esc_html__('Use advanced row style?', 'appai'),
		   		'type' => 'toggle',
		  		'admin_label' => true,
		   		'description' => esc_html__('Toggle this to add row:before and row:after styles. Go to Styles tab to give some style to elements.', 'appai')
			), 4, 'general' );

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'row_s_parallax',
		   		'label' => esc_html__('Use simple parallax?', 'appai'),
		   		'type' => 'toggle',
		  		'admin_label' => true,
		   		'description' => esc_html__('Toggle this to use simple parallax. It will use Background image as parallax image.', 'appai')
			), 5, 'general' );

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'use_pattern_bg',
				'label' => 'Use Pattern BG?',
				'type' => 'toggle',
				'value' => 'no',
				'description' => __(' Toggle this to use pattern in background. If you use this, you can not Row ID.', 'appai'),
			), 6, 'general' );

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'pattern_styles',
				'label' => 'Select pattern styles',
				'type' => 'select',
				'description' => __(' Toggle this to use pattern in background. If you use this, you can not Row ID.', 'appai'),
				'options' => array(
					'style_1' => __('Style 1', 'appai'),
					'style_2' => __('Style 2', 'appai'),
					'style_3' => __('Style 3', 'appai'),
					'style_4' => __('Style 4', 'appai'),
				),
				'value' => 'style_1',
				'relation'      => array(
					'parent'    => 'use_pattern_bg',
					'show_when' => 'yes'
				)
			), 7, 'general' );

		// $kc->add_map_param(
		// 	'kc_row',
		// 	array(
		// 		'name' => 'row_sep_bg_color',
		//    		'label' => esc_html__('Row separator fill color', 'appai'),
		//    		'type' => 'text',
		//   		'admin_label' => true,
		// 		'relation'      => array(
		// 			'parent'    => 'row_separator',
		// 			'show_when' => 'yes'
		// 		),
		//    		'description' => esc_html__('Enter hexa color code with # in front.', 'appai'),
		//   		'value' => '#F5F7FB',
		// 	), 4, 'general' );


		$kc->update_map(
			'kc_title',
			'params',
				array(
						'general' => array(
							array(
								'name'	      => 'text',
								'label'       => __(' Text'),
								'type'	      => 'textarea',
								'value'		  => base64_encode('The Title'),
								'admin_label' => true,
							),
							array(
								'name'	      => 'post_title',
								'label'       => __(' Use Post Title?'),
								'type'	      => 'toggle',
								'description' => __(' Use the title of current post/page as content element instead of text input value.', 'appai')
							),
							array(
								'name'	  => 'type',
								'label'   => __(' Type'),
								'type'	  => 'select',
								'admin_label' => true,
								'options' => array(
									'h1'  => 'H1',
									'h2'  => 'H2',
									'h3'  => 'H3',
									'h4'  => 'H4',
									'h5'  => 'H5',
									'h6'  => 'H6',
									'div'  => 'div',
									'span'  => 'Span',
									'p'  => 'P'
								)
							),
							array(
								'name'	=> 'divider',
								'label' => __(' Use Divider', 'appai'),
								'type'	=> 'toggle'
							),
							array(
								'name'	=> 'class',
								'label' => __(' Extra Class', 'appai'),
								'type'	=> 'text'
							),
							array(
								'name'	      => 'title_wrap',
								'label'       => __(' Advanced', 'appai'),
								'type'	      => 'toggle',
								'description' => __(' Add a &lt;div&gt; tag around the head tag, more code before or after the head tag.', 'appai')
							),
							array(
								'name'	      => 'before',
								'label'       => __(' Before Head Tag', 'appai'),
								'type'	      => 'textarea',
								'description' => __(' Add HTML text before the head tag.', 'appai'),
								'relation'      => array(
									'parent'    => 'title_wrap',
									'show_when' => 'yes'
								)
							),
							array(
								'name'	      => 'after',
								'label'       => 'After Head Tag',
								'type'	      => 'textarea',
								'description' => __(' Add HTML text after the head tag.', 'appai'),
								'relation'      => array(
									'parent'    => 'title_wrap',
									'show_when' => 'yes'
								)
							),
							array(
								'name'     => 'title_link',
								'label'    => __(' Link Title', 'appai'),
								'type'     => 'link',
								'description' => __(' Insert link for title', 'appai')
							),
							array(
								'name'	        => 'title_wrap_class',
								'label'         => __(' Wrapper class name', 'appai'),
								'type'	        => 'text',
								'description'   => __(' Enter class name for wrapper', 'appai'),
								'relation'      => array(
									'parent'    => 'title_wrap',
									'show_when' => 'yes'
								)
							)
						),

						'styling' => array(
							array(
								'name'    => 'css_custom',
								'type'    => 'css',
								'options'		=> array(
									array(
										"screens" => "any,1024,999,767,479",
										'Title Style' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'font-style', 'label' => 'Font Style', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'display', 'label' => 'Display'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link')
										),
										'Divider Style' => array(
											array('property' => 'width', 'label' => 'Divider Width', 'selector' => '+ .kc_title span.divider'),
											array('property' => 'height', 'label' => 'Divider Height', 'selector' => '+ .kc_title span.divider'),
											array('property' => 'margin', 'label' => 'Divider Margin', 'selector' => '+ .kc_title span.divider'),
											array('property' => 'background', 'label' => 'Divider Color', 'selector' => '+ .kc_title span.divider'),
										)
									)
								)
							)
						),
				)
		);


		$kc->update_map(
			'kc_row',
			'params',
				array(
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
						            'Typography' => array(
						                array('property' => 'color', 'label' => 'Color'),
						                array('property' => 'font-size', 'label' => 'Font Size'),
						                array('property' => 'font-weight', 'label' => 'Font Weight'),
						                array('property' => 'font-style', 'label' => 'Font Style'),
						                array('property' => 'font-family', 'label' => 'Font Family'),
						                array('property' => 'text-align', 'label' => 'Text Align'),
						                array('property' => 'text-shadow', 'label' => 'Text Shadow'),
						                array('property' => 'text-transform', 'label' => 'Text Transform'),
						                array('property' => 'text-decoration', 'label' => 'Text Decoration'),
						                array('property' => 'line-height', 'label' => 'Line Height'),
						                array('property' => 'letter-spacing', 'label' => 'Letter Spacing'),
						                array('property' => 'overflow', 'label' => 'Overflow'),
						                array('property' => 'word-break', 'label' => 'Word Break'),
						            ),

						            //Background group
						            'Background' => array(
						                array('property' => 'background'),
						            ),
						            //Box group
						            'Box' => array(
						                array('property' => 'margin', 'label' => 'Margin'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
						            ),
						            //Wrapper group
						            'Wrapper' => array(
						                array('property' => 'position', 'label' => 'Position'),
						                array('property' => 'top', 'label' => 'Top'),
						                array('property' => 'bottom', 'label' => 'Bottom'),
						                array('property' => 'left', 'label' => 'Left'),
						                array('property' => 'right', 'label' => 'Right'),
						            ),

						            // Separator group
						            'Row Separator' => array(
						                array('property' => 'fill', 'label' => 'Background Color', 'selector' => '+ .appai-row-sep'),
						                array('property' => 'height', 'label' => 'Height', 'selector' => '+ .appai-row-sep'),
						            ),

						            // Separator before
						            'Row:before' => array(
						                array('property' => 'transform', 'label' => 'Transform', 'selector' => '+.kc_row_psedue:before'),
						                array('property' => 'background', 'label' => 'Background', 'selector' => '+.kc_row_psedue:before'),
						                array('property' => 'opacity', 'label' => 'Opacity', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'z-index', 'label' => 'Z-Index', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'position', 'label' => 'Position', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'top', 'label' => 'Position Top', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'bottom', 'label' => 'Position Bottom', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'left', 'label' => 'Position Left', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'right', 'label' => 'Position Right', 'selector' => '+.kc_row_psedue:before'),
						            ),

						            // Separator after
						            'Row:after' => array(
						                array('property' => 'transform', 'label' => 'Transform', 'selector' => '+.kc_row_psedue:after'),
						                array('property' => 'background', 'label' => 'Background', 'selector' => '+.kc_row_psedue:after'),
						                array('property' => 'opacity', 'label' => 'Opacity', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'z-index', 'label' => 'Z-Index', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'position', 'label' => 'Position', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'top', 'label' => 'Position Top', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'bottom', 'label' => 'Position Bottom', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'left', 'label' => 'Position Left', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'right', 'label' => 'Position Right', 'selector' => '+.kc_row_psedue:after'),
						            ),

						            //Custom code css
						            'Custom' => array(
						                array('property' => 'custom', 'label' => 'Custom CSS')
						            )
								)
							)
						)
					),
				)
		);


		$kc->update_map(
			'kc_column',
			'params',
				array(
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Typography' => array(
						                array('property' => 'color', 'label' => 'Color'),
						                array('property' => 'font-size', 'label' => 'Font Size'),
						                array('property' => 'font-weight', 'label' => 'Font Weight'),
						                array('property' => 'font-style', 'label' => 'Font Style'),
						                array('property' => 'font-family', 'label' => 'Font Family'),
						                array('property' => 'text-align', 'label' => 'Text Align'),
						                array('property' => 'text-shadow', 'label' => 'Text Shadow'),
						                array('property' => 'text-transform', 'label' => 'Text Transform'),
						                array('property' => 'text-decoration', 'label' => 'Text Decoration'),
						                array('property' => 'line-height', 'label' => 'Line Height'),
						                array('property' => 'letter-spacing', 'label' => 'Letter Spacing'),
						                array('property' => 'overflow', 'label' => 'Overflow'),
						                array('property' => 'word-break', 'label' => 'Word Break'),
						            ),
						            //Background group
						            'Background' => array(
						                array('property' => 'background'),
						            ),
						            //Box group
						            'Box' => array(
						                array('property' => 'margin', 'label' => 'Margin'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'z-index', 'label' => 'Z index'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
										array('property' => 'position', 'label' => 'Position'),
										array('property' => 'top', 'label' => 'Top'),
										array('property' => 'bottom', 'label' => 'Bottom'),
										array('property' => 'left', 'label' => 'Left'),
										array('property' => 'right', 'label' => 'Right'),
						            ),

						            //Box group
						            'Inside' => array(
						                array('property' => 'margin', 'label' => 'Margin'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
						            ),

						            //Custom code css
						            'Custom' => array(
						                array('property' => 'custom', 'label' => 'Custom CSS')
						            )
								)
							)
						)
					),
				)
		);



		$kc->update_map(
			'kc_row_inner',
			'params',
				array(
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
						            'Typography' => array(
						                array('property' => 'color', 'label' => 'Color'),
						                array('property' => 'font-size', 'label' => 'Font Size'),
						                array('property' => 'font-weight', 'label' => 'Font Weight'),
						                array('property' => 'font-style', 'label' => 'Font Style'),
						                array('property' => 'font-family', 'label' => 'Font Family'),
						                array('property' => 'text-align', 'label' => 'Text Align'),
						                array('property' => 'text-shadow', 'label' => 'Text Shadow'),
						                array('property' => 'text-transform', 'label' => 'Text Transform'),
						                array('property' => 'text-decoration', 'label' => 'Text Decoration'),
						                array('property' => 'line-height', 'label' => 'Line Height'),
						                array('property' => 'letter-spacing', 'label' => 'Letter Spacing'),
						                array('property' => 'overflow', 'label' => 'Overflow'),
						                array('property' => 'word-break', 'label' => 'Word Break'),
						            ),

						            //Background group
						            'Background' => array(
						                array('property' => 'background'),
						            ),
						            //Box group
						            'Box' => array(
						                array('property' => 'margin', 'label' => 'Margin'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
						            ),

						            //Box group
						            'Inside' => array(
						                array('property' => 'margin', 'label' => 'Margin'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
						            ),
						            //Wrapper group
						            'Wrapper' => array(
						                array('property' => 'z-index', 'label' => 'Z index'),
						                array('property' => 'position', 'label' => 'Position'),
						                array('property' => 'top', 'label' => 'Top'),
						                array('property' => 'bottom', 'label' => 'Bottom'),
						                array('property' => 'left', 'label' => 'Left'),
						                array('property' => 'right', 'label' => 'Right'),
						            ),

						            //Custom code css
						            'Custom' => array(
						                array('property' => 'custom', 'label' => 'Custom CSS')
						            )
								)
							)
						)
					),
				)
		);


		$kc->update_map(
			'kc_progress_bars',
			'params',
			array(

					'styling' => array(
						array(
							'type'			=> 'css',
							'label'			=> __( 'css', 'appai' ),
							'name'			=> 'custom_css',
							'options'		=> array(
								array(
									'screens' => 'any,1024,999,767,479',
									'Title' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '+ .progress-item span.label'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .progress-item span.label'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .progress-item span.label'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .progress-item span.label'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .progress-item span.label'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .progress-item span.label'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .progress-item span.label'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .progress-item span.label'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .progress-item span.label'),
									),
									'Value' => array(
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .progress-item .value'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .progress-item .value'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .progress-item .value'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .progress-item .value'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .progress-item .value'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .progress-item .ui-label'),
									),
									'Item Style' => array(
										array('property' => 'height', 'label' => 'Progressbar Weight', 'selector' => '+ .kc-ui-progress-bar, .kc-ui-progress'),
										array('property' => 'background-color', 'label' => 'Progressbar Background Color', 'selector' => '+ .kc-ui-progress-bar'),
										array('property' => 'border-radius', 'label' => 'Trackbar Radius', 'selector' => '+ .kc-ui-progress-bar .kc-ui-progress, + .kc-ui-progress-bar'),
										array('property' => 'padding', 'label' => 'Progressbar Spacing', 'selector' => '+ .progress-item'),
									),
									'Wrapper' => array(
										array('property' => 'width', 'label' => 'Width'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'margin', 'label' => 'Margin'),
										array('property' => 'padding', 'label' => 'Padding'),
										array('property' => 'background', 'label' => 'Background'),
									)

								)
							)
						),
					)
			)
		);


		$kc->update_map(
			'kc_single_image',
			'params',
			array(

					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Image Style' => array(
										array('property' => 'text-align', 'label' => 'Image Alignment'),
										array('property' => 'display', 'label' => 'Image Display'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => 'img'),
										array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => 'img'),
										array('property' => 'border', 'label' => 'Border', 'selector' => 'img'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'img'),
										array('property' => 'width', 'label' => 'Width', 'selector' => 'img'),
										array('property' => 'height', 'label' => 'Height', 'selector' => 'img'),
										array('property' => 'max-width', 'label' => 'Max Width', 'selector' => 'img'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => 'img'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => 'img')
									),
									'Caption' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.scapt'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.scapt'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.scapt'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.scapt'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.scapt'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.scapt'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.scapt'),
										array('property' => 'text-align', 'label' => 'Text Alignment', 'selector' => '.scapt'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.scapt'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.scapt'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.scapt')
									),
									'Overlay Effect' => array(
										array('property' => 'background-color', 'label' => 'Overlay Background Color', 'selector' => '.kc-image-overlay'),
										array('property' => 'background-color', 'label' => 'Icon BG Color', 'selector' => '.kc-image-overlay i'),
										array('property' => 'color', 'label' => 'Icon Color', 'selector' => '.kc-image-overlay i'),
										array('property' => 'font-size', 'label' => 'Icon Size', 'selector' => '.kc-image-overlay i'),
										array('property' => 'line-height', 'label' => 'Icon Line Height', 'selector' => '.kc-image-overlay i'),
										array('property' => 'width', 'label' => 'Icon Width', 'selector' => '.kc-image-overlay i'),
										array('property' => 'height', 'label' => 'Icon Height', 'selector' => '.kc-image-overlay i'),
										array('property' => 'border', 'label' => 'Icon Border', 'selector' => '.kc-image-overlay i'),
										array('property' => 'border-radius', 'label' => 'Icon Border Radius', 'selector' => '.kc-image-overlay i')
									),
									'Wrapper' => array(
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'z-index', 'label' => 'Z-Index'),
										array('property' => 'transform', 'label' => 'Transform'),
										array('property' => 'position', 'label' => 'Position'),
										array('property' => 'top', 'label' => 'Position Top'),
										array('property' => 'bottom', 'label' => 'Position Bottom'),
										array('property' => 'left', 'label' => 'Position Left'),
										array('property' => 'right', 'label' => 'Position Right'),
										array('property' => 'margin', 'label' => 'Margin'),
										array('property' => 'padding', 'label' => 'Padding'),
									),
								)
							)
						)
					)
			)
		);



		$kc->update_map(
			'kc_contact_form7',
			'params',
			array(
				'styling' => array(
					array(
						'name'    => 'css_custom',
						'type'    => 'css',
						'options' => array(

							array(
								"screens" => "any",
								'Label' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => 'label'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => 'label'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => 'label'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => 'label'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => 'label'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => 'label'),
									array('property' => 'text-align', 'selector' => 'label'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => 'label'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => 'label'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => 'label'),
								),
								'Input' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-text'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-text'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.wpcf7-text'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-text'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-text'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-text'),
									array('property' => 'text-align', 'selector' => '.wpcf7-text'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.wpcf7-text'),
									array('property' => 'width', 'selector' => '.wpcf7-text'),
									array('property' => 'height', 'selector' => '.wpcf7-text'),
									array('property' => 'border', 'selector' => '.wpcf7-text'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-text'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-text'),
									array('property' => 'padding', 'selector' => '.wpcf7-text'),
								),
								'Text Area' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-textarea'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-textarea'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.wpcf7-textarea'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-textarea'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-textarea'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-textarea'),
									array('property' => 'text-align', 'selector' => '.wpcf7-textarea'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.wpcf7-textarea'),
									array('property' => 'width', 'selector' => '.wpcf7-textarea'),
									array('property' => 'height', 'selector' => '.wpcf7-textarea'),
									array('property' => 'border', 'selector' => '.wpcf7-textarea'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-textarea'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-textarea'),
									array('property' => 'padding', 'selector' => '.wpcf7-textarea'),
								),

								'Select' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-select'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-select'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.wpcf7-select'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-select'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-select'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-select'),
									array('property' => 'text-align', 'selector' => '.wpcf7-select'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.wpcf7-select'),
									array('property' => 'width', 'selector' => '.wpcf7-select'),
									array('property' => 'height', 'selector' => '.wpcf7-select'),
									array('property' => 'border', 'selector' => '.wpcf7-select'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-select'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-select'),
									array('property' => 'padding', 'selector' => '.wpcf7-select'),
								),
								'Radio - Checkbox' => array(
									array('property' => 'color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'background-color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'display', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'text-align', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
								),

								'Submit' => array(
									array('property' => 'color', 'selector' => '.wpcf7-submit'),
									array('property' => 'background', 'selector' => '.wpcf7-submit'),
									array('property' => 'display', 'selector' => '.wpcf7-submit'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.wpcf7-submit'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-submit'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-submit'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-submit'),
									array('property' => 'text-align', 'selector' => '.wpcf7-submit'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.wpcf7-submit'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.wpcf7-submit'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.wpcf7-submit'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-submit'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.wpcf7-submit'),
								)
							),

						)
					)
				),
				'focus' => array(
					array(
						'name'    => 'css_hover_custom',
						'type'    => 'css',
						'options' => array(

							array(
								"screens" => "any",
								'Input' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'width', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'height', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'border-color', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
								),
								'Text Area' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'width', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'height', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'border', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
								),
								'Select' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'width', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'height', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'border', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
								),
								'Radio - Checkbox' => array(
									array('property' => 'color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
									array('property' => 'background-color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
									array('property' => 'text-align', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
								),

								'Submit' => array(
									array('property' => 'color', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'background', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.wpcf7-submit:focus'),
								)
							),

						)
					)
				),
			)
		);

		$kc->update_map(
			'kc_button',
			'params',
			array(
				'styling' => array(
					array(
						'type'			=> 'css',
						'label'			=> __( 'css', 'kingcomposer' ),
						'name'			=> 'custom_css',
						'options'		=> array(
							array(
								'screens' => 'any,1024,999,767,479',
								'Button Style' => array(
									array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc_button'),
									array('property' => 'background', 'label' => 'Background', 'selector' => '.kc_button'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc_button'),
									array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc_button'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc_button'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc_button'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc_button'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.kc_button'),
									array('property' => 'text-align', 'label' => 'Align'),
									array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc_button'),
									array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.kc_button'),
									array('property' => 'width', 'selector' => '.kc_button'),
									array('property' => 'height', 'selector' => '.kc_button'),
									array('property' => 'display', 'label' => 'Display'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.kc_button'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc_button'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc_button'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc_button'),
									array('property' => 'padding', 'label' => 'Icon Spacing', 'selector' => '.kc_button i')
								),
								'Mouse Hover' => array(
									array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc_button:hover'),
									array('property' => 'color', 'label' => 'Text Color', 'selector'=>'.kc_button:hover'),
									array('property' => 'background-color', 'label' => 'Background Color', 'selector'=>'.kc_button:hover'),
									array('property' => 'border', 'label' => 'Border', 'selector'=>'.kc_button:hover'),
									array('property' => 'border-radius', 'label' => 'Border Radius Hover', 'selector'=>'.kc_button:hover'),
									array('property' => 'box-shadow', 'label' => 'Box shadow', 'selector'=>'.kc_button:hover')
								)
							)
						)
					),
				),
			)
		);

	}




	if (function_exists('kc_add_map'))
	{

		kc_add_icon( get_template_directory_uri().'/assets/css/icofont.css' );

		$contact_forms = kc_tools::get_cf7_names();

		// Scorn Spacing Add on
		kc_add_map(
		    array(

		        'appai_spacer' => array(
		        	'name' => esc_html__('Spacer - Appai', 'appai'),
		        	'description' => esc_html__('Add a responsive white space area', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Spacer - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Divider' => array(
	                    					array(
	                    						'property' => 'height',
	                    						'label' => 'Height',
	                    						'selector' => '+ .appai-spacer'
	                    					),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_section_title' => array(
		        	'name' => esc_html__('Section Title - Appai', 'appai'),
		        	'description' => esc_html__('Add a responsive section title area', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Section Title - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'appai' ),
								'name'			=> 'title',
								'description'	=> __( 'Give a title for section title.', 'appai' ),
								'value'			=> 'Section title',
							),
							array(
								'type'			=> 'textarea',
								'label'			=> __( 'Description', 'appai' ),
								'name'			=> 'desc',
								'description'	=> __( 'Give description for section description.', 'appai' ),
								'value'			=> 'Affronting discretion as do is announcing. Now months esteem oppose nearer enable too six.',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .section-heading h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .section-heading h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .section-heading h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .section-heading h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .section-heading h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .section-heading h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .section-heading h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .section-heading h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .section-heading h2'),
			                    		),
			                    		'Description' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .section-heading p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .section-heading p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .section-heading p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .section-heading p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .section-heading p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .section-heading p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .section-heading p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .section-heading p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .section-heading p'),
			                    		),
			                    		'Divider' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '.section-heading h2:after'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_about_block' => array(
		        	'name' => esc_html__('About Block - Appai', 'appai'),
		        	'description' => esc_html__('Add a responsive about block area', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('About Block - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'radio_image',
								'label'			=> __( 'Select Style', 'appai' ),
								'name'			=> 'about_style',
								'description'	=> __( 'Select a style for about block.', 'appai' ),
								'options'			=> array(
									'about-style-1' => get_template_directory_uri() . '/assets/img/helper-images/about-style-1.png',
									'about-style-2' => get_template_directory_uri() . '/assets/img/helper-images/about-style-2.png',
								),
								'value'			=> 'about-style-1',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'appai' ),
								'name'			=> 'title',
								'description'	=> __( 'Give a title for Service Column.', 'appai' ),
								'value'			=> 'Build Concept',
							),
							array(
								'type'			=> 'textarea',
								'label'			=> __( 'Description', 'appai' ),
								'name'			=> 'desc',
								'description'	=> __( 'Give service description for Service Column.', 'appai' ),
								'value'			=> 'Lorem ipsum dolor amet, consecte tempor incididunt ut labore et dolore tumber tur adipisicing elit.',
							),
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Use Icon?', 'appai' ),
								'name'			=> 'use_icon',
							),
							array(
								'type'			=> 'icon_picker',
								'label'			=> __( 'Icon', 'appai' ),
								'name'			=> 'icon',
								'description'	=> __( 'Choose your icon.', 'appai' ),
								'relation' => array(
									'parent' => 'use_icon',
									'show_when' => 'yes'
								),
							),
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Use Image?', 'appai' ),
								'name'			=> 'use_image',
							),
							array(
								'type'			=> 'attach_image',
								'label'			=> __( 'Image', 'appai' ),
								'name'			=> 'image',
								'description'	=> __( 'Select your image.', 'appai' ),
								'relation' 		=> array(
									'parent'	=> 'use_image',
									'show_when'	=> 'yes',
								),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-feature h5'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-feature h5'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-feature h5'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-feature h5'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-feature h5'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-feature h5'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-feature h5'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-feature h5'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-feature h5'),
			                    		),
			                    		'Description' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-feature p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-feature p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-feature p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-feature p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-feature p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-feature p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-feature p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-feature p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-feature p'),
			                    		),
			                    		'Image' => array(
											array('property' => 'width', 'label' => 'Width', 'selector' => '+ .single-feature .feature-icon img'),
											array('property' => 'height', 'label' => 'Height', 'selector' => '+ .single-feature .feature-icon img'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-feature .feature-icon img'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-feature .feature-icon img'),
			                    		),
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-feature .feature-icon .icon'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-feature .feature-icon .icon'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-feature .feature-icon .icon'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-feature .feature-icon .icon'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Box Padding', 'selector' => '+ .single-feature'),
			                    		),
			                    		'Wrapper Hover' => array(
											array('property' => 'height', 'label' => 'Box Border Height on Hover', 'selector' => '+ .single-feature:after'),
											array('property' => 'background', 'label' => 'Box Border Background on Hover', 'selector' => '+ .single-feature:after'),
			                    		),
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'appai_feature_block' => array(
		        	'name' => esc_html__('Feature Block - Appai', 'appai'),
		        	'description' => esc_html__('Add a responsive feature block area', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Feature Block - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'appai' ),
								'name'			=> 'title',
								'description'	=> __( 'Give a title for Service Column.', 'appai' ),
								'value'			=> 'Build Concept',
							),
							array(
								'type'			=> 'textarea',
								'label'			=> __( 'Description', 'appai' ),
								'name'			=> 'desc',
								'description'	=> __( 'Give service description for Service Column.', 'appai' ),
								'value'			=> 'Lorem ipsum dolor amet, consecte tempor incididunt ut labore et dolore tumber tur adipisicing elit.',
							),
							array(
								'type'			=> 'icon_picker',
								'label'			=> __( 'Icon', 'appai' ),
								'name'			=> 'icon',
								'description'	=> __( 'Choose your icon.', 'appai' ),
								'relation' => array(
									'parent' => 'use_icon',
									'show_when' => 'yes'
								),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .awesome-feature h5'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .awesome-feature h5'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .awesome-feature h5'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .awesome-feature h5'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .awesome-feature h5'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .awesome-feature h5'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .awesome-feature h5'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .awesome-feature h5'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .awesome-feature h5'),
			                    		),
			                    		'Description' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .awesome-feature p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .awesome-feature p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .awesome-feature p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .awesome-feature p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .awesome-feature p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .awesome-feature p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .awesome-feature p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .awesome-feature p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .awesome-feature p'),
			                    		),
			                    		'Icon' => array(
											array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .awesome-feature-icon i'),
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .awesome-feature-icon i'),
											array('property' => 'border-radius', 'label' => 'border-radius', 'selector' => '+ .awesome-feature-icon i'),
											array('property' => 'font-size', 'label' => 'font-size', 'selector' => '+ .awesome-feature-icon i'),
											array('property' => 'line-height', 'label' => 'line-height', 'selector' => '+ .awesome-feature-icon i'),
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .awesome-feature-icon i'),
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .awesome-feature-icon i'),
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .awesome-feature-icon i'),
			                    		),
			                    		'Icon Hover' => array(
											array('property' => 'background', 'label' => 'Background Color', 'selector' => '+ .awesome-feature-icon span:after'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Box Padding', 'selector' => '+ .awesome-feature'),
											array('property' => 'margin', 'label' => 'Box Margin', 'selector' => '+ .awesome-feature'),
			                    		),
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'appai_btn_group' => array(
		        	'name' => esc_html__('Button Group - Appai', 'appai'),
		        	'description' => esc_html__('Add button groups', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Button Group - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
								'label'			=> __('Buttons', 'appai'),
								'name'			=> 'buttons',
								'description'	=> '',
								'options'		=> array('add_text' => __('Add new button', 'appai')),


								// you can use all param type to register child params
								'params' => array(
									array(
										'type' => 'textarea',
										'label' => 'Button Label',
										'name' => 'btn_label',
										'description' => 'Enter button text',
										'admin_label' => true,
										'value' => 'available on <br> <span>Google Store</span>',
									),
									array(
										'type' => 'link',
										'label' => 'Button Link',
										'name' => 'href',
										'description' => 'Add button link',
										'admin_label' => true,
									),
									array(
										'type' => 'icon_picker',
										'label' => 'Button icon',
										'name' => 'icon',
										'description' => 'Choose button icon',
										'admin_label' => true,
									)
								)
							),
							array(
								'type' => 'select',
								'label' => 'Select Border Style',
								'name' => 'border_style',
								'description' => 'Select border style',
								'options'	=> array(
									'gradient-border' => __('Gradient Border', 'appai'),
									'white-border' => __('White Border', 'appai'),
								),
								'admin_label' => true,
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .store-buttons i'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .store-buttons i'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .store-buttons i'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .store-buttons i'),
			                    		),
			                    		'Text' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .store-buttons a p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .store-buttons a p'),
			                    		),
			                    		'Button' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+ .store-buttons .btn'),
											array('property' => 'margin', 'label' => 'Wrapper Margin', 'selector' => '+ .store-buttons .btn'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .button-group'),
											array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .btn.btn-bordered-grad:after'),
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper Margin'),
											array('property' => 'width', 'label' => 'Wrapper Width'),
			                    		)
		        					)
		        				)
		        			)
		        		),
		        		'Hover' => array(
		        			array(
		        				'name' => 'custom_css_hover',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .store-buttons a:hover i'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .store-buttons a:hover i'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .store-buttons a:hover i'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .store-buttons a:hover i'),
			                    		),
			                    		'Text' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .store-buttons a:hover p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .store-buttons a:hover p'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'background', 'label' => 'Background Color', 'selector' => '+ .btn.btn-bordered-grad:before'),
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+:hover'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '+:hover'),
			                    		),
			                    		'Button:after' => array(
											array('property' => 'background', 'label' => 'Background Color', 'selector' => '+ .btn.btn-bordered-white:after'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'appai_video_iframe' => array(
		        	'name' => esc_html__('Video iFrame - Appai', 'appai'),
		        	'description' => esc_html__('Add a responsive video iframe area', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Video iFrame - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'attach_image',
								'label'			=> __( 'Video Thumbnail Image', 'appai' ),
								'name'			=> 'image',
								'description'	=> __( 'Select video thumbnail image.', 'appai' ),
							),
							array(
								'type'			=> 'link',
								'label'			=> __( 'Video Link', 'appai' ),
								'name'			=> 'href',
								'description'	=> __( 'Enter video link.', 'appai' ),
							),
							array(
								'type'			=> 'icon_picker',
								'label'			=> __( 'Icon', 'appai' ),
								'name'			=> 'icon',
								'description'	=> __( 'Choose video play icon.', 'appai' ),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .section-heading h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .section-heading h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .section-heading h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .section-heading h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .section-heading h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .section-heading h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .section-heading h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .section-heading h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .section-heading h2'),
			                    		),
			                    		'Description' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .section-heading p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .section-heading p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .section-heading p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .section-heading p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .section-heading p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .section-heading p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .section-heading p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .section-heading p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .section-heading p'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'background', 'label' => 'background', 'selector' => '.overlay-grad-one:after'),
											array('property' => 'display', 'label' => 'Display'),
											array('property' => 'z-index', 'label' => 'Z-Index'),
											array('property' => 'transform', 'label' => 'Transform'),
											array('property' => 'position', 'label' => 'Position'),
											array('property' => 'top', 'label' => 'Position Top'),
											array('property' => 'bottom', 'label' => 'Position Bottom'),
											array('property' => 'left', 'label' => 'Position Left'),
											array('property' => 'right', 'label' => 'Position Right'),
											array('property' => 'margin', 'label' => 'Margin'),
											array('property' => 'padding', 'label' => 'Padding'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_counterup' => array(
		        	'name' => esc_html__('Counter Up - Appai', 'appai'),
		        	'description' => esc_html__('Add counter up facts', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Counter Up - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'appai' ),
								'name'			=> 'title',
								'description'	=> __( 'Give a title for section title.', 'appai' ),
								'value'			=> 'APP DOWNLOADS',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Fact Number', 'appai' ),
								'name'			=> 'counter',
								'description'	=> __( 'Enter the fact number.', 'appai' ),
								'value'			=> '69',
							),
							array(
								'type'			=> 'icon_picker',
								'label'			=> __( 'Icon', 'appai' ),
								'name'			=> 'icon',
								'description'	=> __( 'Give a title for section title.', 'appai' ),
								'value'			=> 'icofont-heart-alt',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-fact h5'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-fact h5'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-fact h5'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-fact h5'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-fact h5'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-fact h5'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-fact h5'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-fact h5'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-fact h5'),
			                    		),
			                    		'Counter' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-fact h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-fact h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-fact h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-fact h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-fact h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-fact h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-fact h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-fact h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-fact h2'),
			                    		),
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-fact i'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-fact i'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-fact i'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-fact i'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_screenshot_slider' => array(
		        	'name' => esc_html__('Screenshots Slider - Appai', 'appai'),
		        	'description' => esc_html__('Add a responsive screenshots slider', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Screenshots Slider - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'radio_image',
								'label'			=> __( 'Select slider styles', 'appai' ),
								'name'			=> 'slider_style',
								'description'	=> __( 'Select slilder styles.', 'appai' ),
								'options'		=> array(
									'screenshot-slider-1' => get_template_directory_uri() . '/assets/img/helper-images/screenshot-slider-1.png',
									'screenshot-slider-2' => get_template_directory_uri() . '/assets/img/helper-images/screenshot-slider-2.png',
								),
								'value'			=> 'screenshot-slider-1',
							),
							array(
								'type'			=> 'attach_images',
								'label'			=> __( 'Slider Screenshots', 'appai' ),
								'name'			=> 'images',
								'description'	=> __( 'Choose slider screenshots.', 'appai' ),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Overlay' => array(
											array('property' => 'background', 'label' => 'Background Color', 'selector' => '+ .preview-icon'),
			                    		),
			                    		'Overlay Icon' => array(
											array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .preview-icon i'),
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .preview-icon i'),
			                    		),
			                    		'Dots' => array(
											array('property' => 'border', 'label' => 'Border Color', 'selector' => '+ .slick-dots li, + .swiper-pagination-bullet'),
			                    		),
			                    		'Active Dots' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .slick-dots li.slick-active, + .swiper-pagination-bullet-active'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+ .swiper-container'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '+ .swiper-container'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'appai_team_member' => array(
		        	'name' => esc_html__('Team Member - Appai', 'appai'),
		        	'description' => esc_html__('Add a team member', 'appai'),
		        	'category' => 'appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Team Member', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Name', 'appai' ),
								'name'			=> 'name',
								'description'	=> __( 'Enter name of the team member.', 'appai' ),
								'value'			=> 'JULIA BENNETT',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Position', 'appai' ),
								'name'			=> 'position',
								'description'	=> __( 'Enter position of the team member.', 'appai' ),
								'value'			=> 'Creative Director',
							),
							array(
								'type'			=> 'textarea',
								'label'			=> __( 'About', 'appai' ),
								'name'			=> 'about',
								'description'   => __( 'Enter details about team member', 'appai' ),
								'value'	=> __( 'Lorem ipsum dolor sit amet, con sectetur adipisicing elit, sed do eiu smod tempor incididunt labore dolore magna.', 'appai' ),
							),
							array(
								'type'			=> 'attach_image',
								'label'			=> __( 'Team Member Image', 'appai' ),
								'name'			=> 'image',
								'description'   => __( 'Enter picture of team member', 'appai' ),
							),
							array(
								'type'			=> 'group',
								'label'			=> __(' Options', 'appai'),
								'name'			=> 'social_profiles',
								'description'	=> __( 'Add team members your social profiles.', 'appai' ),
								'options'		=> array('add_text' => __(' Add new social profile', 'appai')),

								'params' => array(
									array(
										'type' => 'icon_picker',
										'label' => __( 'Social Icon', 'appai' ),
										'name' => 'social_icon',
										'description' => __( 'Social icon.', 'appai' ),
									),
									array(
										'type' => 'text',
										'label' => __( 'Social Profile Link', 'appai' ),
										'name' => 'profile_link',
										'description' => __( 'Enter social profile link.', 'appai' ),
									),
								),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Name' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .member-description .member-name'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .member-description .member-name'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .member-description .member-name'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .member-description .member-name'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .member-description .member-name'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .member-description .member-name'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .member-description .member-name'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .member-description .member-name'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .member-description .member-name'),
			                    		),
			                    		'Position' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .member-description .designation'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .member-description .designation'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .member-description .designation'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .member-description .designation'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .member-description .designation'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .member-description .designation'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .member-description .designation'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .member-description .designation'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .member-description .designation'),
			                    		),
			                    		'About' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .member-description .short-description'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .member-description .short-description'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .member-description .short-description'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .member-description .short-description'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .member-description .short-description'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .member-description .short-description'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .member-description .short-description'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .member-description .short-description'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .member-description .short-description'),
			                    		),
			                    		'Social Icons' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .social a'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .social a'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .social a'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .social a'),
											array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+ .social a'),
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .social a'),
											array('property' => 'width', 'label' => 'Width', 'selector' => '+ .social a'),
											array('property' => 'height', 'label' => 'Height', 'selector' => '+ .social a'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .social a'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .social a'),
			                    		),
			                    		'Social Icons Hover' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .social a:after'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .social a:after'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .social a:after'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .social a:after'),
											array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+ .social a:after'),
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .social a:after'),
											array('property' => 'width', 'label' => 'Width', 'selector' => '+ .social a:after'),
											array('property' => 'height', 'label' => 'Height', 'selector' => '+ .social a:after'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .social a:after'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .social a:after'),
			                    		),
			                    		'overlay' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .member-description'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_testimonial' => array(
		        	'name' => esc_html__('Testimonial - Appai', 'appai'),
		        	'description' => esc_html__('Add a responsive testimonial area', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Testimonial - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
								'label'			=> __('Testimonials', 'appai'),
								'name'			=> 'testimonials',
								'description'	=> __( 'Add testimonials.', 'appai' ),
								'options'		=> array('add_text' => __(' Add new testimonial', 'appai')),

								'params' => array(

									array(
										'type'			=> 'text',
										'label'			=> __( 'Name', 'appai' ),
										'name'			=> 'name',
										'description'	=> __( 'Enter name of the person.', 'appai' ),
										'value'			=> 'JULIA BENNETT',
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Designation', 'appai' ),
										'name'			=> 'position',
										'description'	=> __( 'Enter designation of the person.', 'appai' ),
										'value'			=> 'Creative Director',
									),
									array(
										'type'			=> 'textarea',
										'label'			=> __( 'Testimonial', 'appai' ),
										'name'			=> 'about',
										'description'   => __( 'Enter the testimonial', 'appai' ),
										'value'	=> __( 'Lorem ipsum dolor sit amet, con sectetur adipisicing elit, sed do eiu smod tempor incididunt labore dolore magna.', 'appai' ),
									),
									array(
										'type'			=> 'attach_image',
										'label'			=> __( 'Author Image', 'appai' ),
										'name'			=> 'image',
										'description'   => __( 'Enter picture of the person', 'appai' ),
									),
								),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Name' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .client-testimonial h3'),
			                    		),
			                    		'Designation' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .client-testimonial .client-designation'),
			                    		),
			                    		'Review' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .client-testimonial .client-review'),
			                    		),
			                    		'Dots' => array(
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .slider-wrapper-3 .slick-dots li'),
			                    		),
			                    		'Active Dots' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .slider-wrapper-3 .slick-dots li.slick-active'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_testimonial2' => array(
		        	'name' => esc_html__('Testimonial Style 2 - Appai', 'appai'),
		        	'description' => esc_html__('Add a responsive testimonial area with different style.', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Testimonial Style 2 - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
								'label'			=> __('Testimonials', 'appai'),
								'name'			=> 'testimonials',
								'description'	=> __( 'Add testimonials.', 'appai' ),
								'options'		=> array('add_text' => __(' Add new testimonial', 'appai')),

								'params' => array(

									array(
										'type'			=> 'text',
										'label'			=> __( 'Name', 'appai' ),
										'name'			=> 'name',
										'description'	=> __( 'Enter name of the person.', 'appai' ),
										'value'			=> 'JULIA BENNETT',
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Designation', 'appai' ),
										'name'			=> 'position',
										'description'	=> __( 'Enter designation of the person.', 'appai' ),
										'value'			=> 'Creative Director',
									),
									array(
										'type'			=> 'textarea',
										'label'			=> __( 'Testimonial', 'appai' ),
										'name'			=> 'about',
										'description'   => __( 'Enter the testimonial', 'appai' ),
										'value'	=> __( 'Lorem ipsum dolor sit amet, con sectetur adipisicing elit, sed do eiu smod tempor incididunt labore dolore magna.', 'appai' ),
									),
									array(
										'type'			=> 'attach_image',
										'label'			=> __( 'Author Image', 'appai' ),
										'name'			=> 'image',
										'description'   => __( 'Enter picture of the person', 'appai' ),
									),
								),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Name' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .client-testimonial h3'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .client-testimonial h3'),
			                    		),
			                    		'Designation' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .client-testimonial .client-designation'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .client-testimonial .client-designation'),
			                    		),
			                    		'Review' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .client-testimonial .client-review'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .client-testimonial .client-review'),
			                    		),
			                    		'Dots' => array(
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .home-style-2 .slick-dots li'),
			                    		),
			                    		'Active Dots' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .home-style-2 .slick-dots li.slick-active'),
			                    		),
			                    		'Arrow styles' => array(
											array('property' => 'color', 'label' => 'color', 'selector' => '+ .testimonial-slider-2 .slick-prev:before, + .testimonial-slider-2 .slick-next:before'),
											array('property' => 'font-size', 'label' => 'font-size', 'selector' => '+ .testimonial-slider-2 .slick-prev:before, + .testimonial-slider-2 .slick-next:before'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_pricing_table' => array(
		        	'name' => esc_html__('Pricing Table - Appai', 'appai'),
		        	'description' => esc_html__('Add a responsive pricing table area', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		            'is_container' => true,
		        	'title' => esc_html__('Pricing Table - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Pricing Title', 'appai' ),
								'name'			=> 'title',
								'description'	=> __( 'Give a title for pricing table.', 'appai' ),
								'value'			=> 'BASIC',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Price', 'appai' ),
								'name'			=> 'price',
								'description'	=> __( 'Set price for pricing table.', 'appai' ),
								'value'			=> '19',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Currency', 'appai' ),
								'name'			=> 'currency',
								'description'	=> __( 'Set currency for pricing table.', 'appai' ),
								'value'			=> '$',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Subscription Interval', 'appai' ),
								'name'			=> 'interval',
								'description'	=> __( 'Give subscription interval timie for pricing table.', 'appai' ),
								'value'			=> '/ month',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Help Text', 'appai' ),
								'name'			=> 'help_text',
								'description'	=> __( 'Give help text for pricing table.', 'appai' ),
								'value'			=> '(Save 20 USD)',
							),
							array(
								'type'			=> 'textarea_html',
								'label'			=> __( 'Features of Pricing Table', 'appai' ),
								'name'			=> 'content',
								'description'	=> __( 'Enter the features of pricing <table></table>.', 'appai' )
							),
							array(
								'type'			=> 'link',
								'label'			=> __( 'Purchase Link and Label', 'appai' ),
								'name'			=> 'href',
								'description'	=> __( 'Set the purchase button link and label.', 'appai' ),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-price-table .plan-title'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-price-table:hover .price-value'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-price-table .plan-title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-price-table .plan-title'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .single-price-table .plan-title.blue-grad-bg'),
			                    		),
			                    		'Price' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-price-table .price-value'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-price-table .price-value'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .single-price-table .plan-title.blue-grad-bg'),
			                    		),
			                    		'Button' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .pricing-footer .btn'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .pricing-footer .btn'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .pricing-footer .btn'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .pricing-footer .btn'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .pricing-footer .btn'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .single-price-table .btn.btn-bordered-grad:before'),
			                    		),
			                    		'Divider' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .pricing-footer:after, + .pricing-footer:before'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
		        		'Hover' => array(
		        			array(
		        				'name' => 'custom_css_hover',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-price-table:hover .plan-title'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-price-table:hover .plan-title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-price-table:hover .plan-title'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .single-price-table:hover .plan-title.blue-grad-bg'),
			                    		),
			                    		'Price' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-price-table:hover .price-value'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-price-table:hover .price-value'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-price-table:hover .price-value'),
			                    		),
			                    		'Button' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .pricing-footer .btn'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .pricing-footer .btn'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .pricing-footer .btn'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .pricing-footer .btn'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .pricing-footer .btn'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .single-price-table:hover .btn.btn-bordered-grad:before'),
			                    		),
			                    		'Button Wrapper' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .pricing-footer:before'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => ':hover'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => ':hover'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_faq' => array(
		        	'name' => esc_html__('FAQ - Appai', 'appai'),
		        	'description' => esc_html__('Add freaquently asked questions area', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('FAQ - Appai', 'appai'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'group',
								'label'			=> __('FAQ\'s', 'appai'),
								'name'			=> 'faqs',
								'description'	=> __( 'Add freaquently asked questions.', 'appai' ),
								'options'		=> array('add_text' => __(' Add new FAQ', 'appai')),

								'params' => array(

									array(
										'type'			=> 'text',
										'label'			=> __( 'Title', 'appai' ),
										'name'			=> 'title',
										'description'	=> __( 'Add FAQ title.', 'appai' ),
										'value'			=> 'What is the refund policy?',
									),
									array(
										'type'			=> 'textarea',
										'label'			=> __( 'Answer', 'appai' ),
										'name'			=> 'answer',
										'description'	=> __( 'Enter answer for FAQ.', 'appai' ),
										'value'			=> 'There are...',
									),
								),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .panel-title a'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .panel-title a'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .panel-title a'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .panel-title a'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .panel-title a'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .panel-title a'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .panel-title a'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .panel-title a'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .panel-title a'),
			                    		),
			                    		'Answer' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .panel-body p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .panel-body p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .panel-body p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .panel-body p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .panel-body p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .panel-body p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .panel-body p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .panel-body p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .panel-body p'),
			                    		),
			                    		'Border' => array(
	                    					array('property' => 'background', 'label' => 'Background', 'selector' => '+ .panel:before' ),
			                    		),
			                    		'Icon' => array(
	                    					array('property' => 'color', 'label' => 'Color', 'selector' => '+ .panel-title a::after' ),
	                    					array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .panel-title a::after' ),
	                    					array('property' => 'border', 'label' => 'Border', 'selector' => '+ .panel-title a::after' )
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),




		        'appai_breadcrumb' => array(
		        	'name' => esc_html__('Breadcrumb - Appai', 'appai'),
		        	'description' => esc_html__('Add a breadcrumb section', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Breadcrumb - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'select',
								'label'			=> __( 'Select title', 'appai' ),
								'name'			=> 'select_title_type',
								'description'	=> __( 'Select the title type.', 'appai' ),
								'options'		=> array(
									'post_page_title' => 'Post/Page title',
									'custom_title' => 'Custom title',
								),
								'value'			=> 'post_page_title'
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'appai' ),
								'name'			=> 'title',
								'description'	=> __( 'Give a title for breadcrumb section.', 'appai' ),
								'value'			=> 'Title',
								'relation' => array(
									'parent' => 'select_title_type',
									'show_when' => 'custom_title'
								),
							),
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Show page link breadcrumbs', 'appai' ),
								'name'			=> 'show_pg_link_breadcrumbs',
								'description'	=> __( 'Toggle to show/hide page link breadcrumb.', 'appai' ),
								'value'			=> 'yes',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .breadcrumb-area h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .breadcrumb-area h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .breadcrumb-area h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .breadcrumb-area h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .breadcrumb-area h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .breadcrumb-area h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .breadcrumb-area h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .breadcrumb-area h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .breadcrumb-area h2'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .breadcrumb-area.breadcrumb-shortcode'),
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'appai_blog_grid' => array(
		        	'name' => esc_html__('Blog Grid - Appai', 'appai'),
		        	'description' => esc_html__('Add blog posts', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Blog Grid - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Limit', 'appai' ),
								'name'			=> 'limit',
								'description'	=> __( 'Set the number of the posts to show or enter -1 to show all the posts.', 'appai' ),
								'value'			=> -1,
							),
							array(
								'name'	  => 'blog_grid',
								'label'   => __('Blog Grid', 'appai'),
								'type'	  => 'select',
								'admin_label' => true,
								'options' => array(
									'one_col'  => '1 Column',
									'two_col'  => '2 Column',
									'three_col'  => '3 Column',
									'four_col'  => '4 Column',
								),
								'value'			=> 'three_col',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Content Charecter Limit', 'appai' ),
								'name'			=> 'content_limit',
								'description'	=> __( 'Set the number of the words you want to show in post content posts.', 'appai' ),
								'value'			=> 10,
							),
		        			array(
		        				'name' => 'orderby',
		        				'type' => 'select',
		        				'label' => esc_html__('Order By', 'appai'),
								'description'	=> esc_html__( 'Select post order by', 'appai' ),
		        				'options' => array(
		        					'id' => esc_html__('ID', 'appai'),
		        					'author' => esc_html__('author', 'appai'),
		        					'title' => esc_html__('title', 'appai'),
		        					'name' => esc_html__('name', 'appai'),
		        					'type' => esc_html__('type', 'appai'),
		        					'date' => esc_html__('date', 'appai'),
		        					'modified' => esc_html__('modified', 'appai'),
		        					'menu_order' => esc_html__('menu_order', 'appai'),
		        					'rand' => esc_html__('modified', 'appai'),
		        				),
		        				'value' => 'date'
		        			),
		        			array(
		        				'name' => 'order',
		        				'type' => 'select',
		        				'label' => esc_html__('Order', 'appai'),
								'description'	=> esc_html__( 'Select post order', 'appai' ),
		        				'options' => array(
		        					'DESC' => esc_html__('DESC', 'appai'),
		        					'ASC' => esc_html__('ASC', 'appai'),
		        				),
		        				'value' => 'DESC'
		        			),
							array(
								'type'			=> 'radio',
								'label'			=> __( 'Post Title', 'appai' ),
								'name'			=> 'post_title_show',
								'description'	=> __( 'Choose to display or hide post title from pots', 'appai' ),
								'options'		=> array(
									'yes'	=> 'Display',
									'no'	=> 'Hide'
								),
								'value'			=> 'yes',
							),
							array(
								'name'	  => 'title_tag',
								'label'   => __('Title Tag Type'),
								'type'	  => 'select',
								'admin_label' => true,
								'options' => array(
									'h1'  => 'H1',
									'h2'  => 'H2',
									'h3'  => 'H3',
									'h4'  => 'H4',
									'h5'  => 'H5',
									'h6'  => 'H6',
									'div'  => 'div',
									'span'  => 'Span',
									'p'  => 'P'
								),
								'value'			=> 'h3',
								'relation'      => array(
									'parent'    => 'post_title_show',
									'show_when' => 'yes'
								)
							),
							array(
								'type'			=> 'radio',
								'label'			=> __( 'Post Thumbnail', 'appai' ),
								'name'			=> 'post_thumbnail_show',
								'description'	=> __( 'Choose to display or hide post thumbnail from pots', 'appai' ),
								'options'		=> array(
									'yes'	=> 'Display',
									'no'	=> 'Hide'
								),
								'value'			=> 'yes',
							),
							array(
								'type'			=> 'radio',
								'label'			=> __( 'Post Meta', 'appai' ),
								'name'			=> 'post_meta_display',
								'description'	=> __( 'Choose to display or hide post meta from pots', 'appai' ),
								'options'		=> array(
									'yes'	=> 'Display',
									'no'	=> 'Hide'
								),
								'value'			=> 'yes',
							),
							array(
								'type'			=> 'radio',
								'label'			=> __( 'Post Excerpt', 'appai' ),
								'name'			=> 'post_excerpt_display',
								'description'	=> __( 'Choose to display or hide post excerpt from pots', 'appai' ),
								'options'		=> array(
									'yes'	=> 'Display',
									'no'	=> 'Hide'
								),
								'value'			=> 'yes',
							),
							array(
								'type'			=> 'radio',
								'label'			=> __( 'Show permalink', 'appai' ),
								'name'			=> 'post_permalink_display',
								'description'	=> __( 'Choose to display or hide post permalink', 'appai' ),
								'options'		=> array(
									'yes'	=> 'Display',
									'no'	=> 'Hide'
								),
								'value'			=> 'yes',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'read more button text', 'appai' ),
								'name'			=> 'read_more_btn_text',
								'description'	=> __( 'Enter text for read more button.', 'appai' ),
								'value'			=> 'Read More',

							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .appai-shortcode .post-title'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .appai-shortcode .post-title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .appai-shortcode .post-title'),
											array('property' => 'font-style', 'label' => 'Font Style', 'selector' => '+ .appai-shortcode .post-title'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .appai-shortcode .post-title'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .appai-shortcode .post-title'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .appai-shortcode .post-title'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .appai-shortcode .post-title'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+ .appai-shortcode .post-title'),
											array('property' => 'display', 'label' => 'Display'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .appai-shortcode .post-title'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .appai-shortcode .post-title')
										),
										'Hover' => array(
											array('property' => 'color', 'label' => 'Color on hover for links', 'selector' => '+ .meta-info a:hover, + .post-title a:hover, + .post-content .read-more-btn:hover, + .read-more-btn:hover i'),
										),
										'Blog Item' => array(
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .blog-post.appai-shortcode'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .blog-post.appai-shortcode'),
										),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => ':hover'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => ':hover'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'appai_mc_form' => array(
		        	'name' => esc_html__('MailChimp Form - Appai', 'appai'),
		        	'description' => esc_html__('Add MailChimp form', 'appai'),
		        	'category' => 'Appai',
		        	'is_container' => true,
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('MailChimp Form - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'textarea_html',
								'label'			=> __( 'MailChimp Form Shortcode', 'appai' ),
								'name'			=> 'content',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Button' => array(
	                    					array('property' => 'background', 'label' => 'Background', 'selector' => '+ .subscribe-box .email-submit-btn' ),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_google_map' => array(
		        	'name' => esc_html__('Google Map - Appai', 'appai'),
		        	'description' => esc_html__('Add a google map', 'appai'),
		        	'category' => 'appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Google Map - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Latitude', 'appai' ),
								'name'			=> 'latitude',
								'description'	=> __( 'Enter map latitude of the area.', 'appai' ),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Longitude', 'appai' ),
								'name'			=> 'longitude',
								'description'	=> __( 'Enter map longitude of the area.', 'appai' ),
							),
							array(
								'type'			=> 'attach_image',
								'label'			=> __( 'Map icon mark image', 'appai' ),
								'name'			=> 'map_icon_mark',
								'description'	=> __( 'Choose map icon mark image.', 'appai' ),
							),
							array(
								'type'			=> 'number_slider',
								'label'			=> __( 'Map zoom level', 'appai' ),
								'name'			=> 'zoom_level',
								'options' => array(    // REQUIRED
									'min' => 1,
									'max' => 16,
									'show_input' => true
								),
								'value'			=> '11',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Divider' => array(
	                    					array(
	                    						'property' => 'height',
	                    						'label' => 'Height',
	                    						'selector' => '+ #map'
	                    					),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_contact_box' => array(
		        	'name' => esc_html__('Contact Box - Appai', 'appai'),
		        	'description' => esc_html__('Add a contact box area', 'appai'),
		        	'category' => 'Appai',
		        	'is_container' => true,
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Contact Box - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Left Side Title', 'appai' ),
								'name'			=> 'ls_title',
								'description'	=> __( 'Give title for the left side of contact box.', 'appai' ),
								'value'			=> 'Get In Touch',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Left Side Subtitle', 'appai' ),
								'name'			=> 'ls_subtitle',
								'description'	=> __( 'Give subtitle for the left side of contact box.', 'appai' ),
								'value'			=> '',
							),
							array(
								'name'        => 'slug',
								'type'        => 'select',
								'label'       => __( 'Select Contact Form', 'appai' ),
								'admin_label' => true,
								'options'     => $contact_forms,
								'description' => __( 'Choose previously created contact form from the drop down list.', 'appai' )
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Right Side Title', 'appai' ),
								'name'			=> 'rs_title',
								'description'	=> __( 'Give title for the right side of contact box.', 'appai' ),
								'value'			=> 'Address',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Left Side Subtitle', 'appai' ),
								'name'			=> 'rs_subtitle',
								'description'	=> __( 'Give subtitle for the right side of contact box.', 'appai' ),
								'value'			=> 'Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
							),
							array(
								'type'			=> 'group',
								'label'			=> __('Contact Imformation', 'appai'),
								'name'			=> 'c_infos',
								'description'	=> __( 'Add information.', 'appai' ),
								'options'		=> array('add_text' => __(' Add new information', 'appai')),

								'params' => array(

									array(
										'type'			=> 'icon_picker',
										'label'			=> __( 'Icon', 'appai' ),
										'name'			=> 'icon',
										'description'	=> __( 'Choose icon for the information.', 'appai' ),
										'value'			=> 'icofont-paper-plane',
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Information', 'appai' ),
										'name'			=> 'info',
										'description'	=> __( 'Enter the information text.', 'appai' ),
										'value'			=> 'mail@example.com',
									),
								),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .get-in-touch h2, + .address-box h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .get-in-touch h2, + .address-box h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .get-in-touch h2, + .address-box h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .get-in-touch h2, + .address-box h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .get-in-touch h2, + .address-box h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .get-in-touch h2, + .address-box h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .get-in-touch h2, + .address-box h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .get-in-touch h2, + .address-box h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .get-in-touch h2, + .address-box h2'),
			                    		),
			                    		'Subtitle' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .get-in-touch p, + .address-box p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .get-in-touch p, + .address-box p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .get-in-touch p, + .address-box p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .get-in-touch p, + .address-box p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .get-in-touch p, + .address-box p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .get-in-touch p, + .address-box p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .get-in-touch p, + .address-box p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .get-in-touch p, + .address-box p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .get-in-touch p, + .address-box p'),
			                    		),
			                    		'List' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .info-details p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .info-details p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .info-details p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .info-details p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .info-details p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .info-details p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .info-details p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .info-details p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .info-details p'),
			                    		),
			                    		'Button' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .get-in-touch .btn'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .get-in-touch .btn'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .get-in-touch .btn'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .get-in-touch .btn'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .get-in-touch .btn'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .get-in-touch .btn'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .get-in-touch .btn'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .get-in-touch .btn'),
			                    		),
			                    		'Right Side' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .contact-box-inner'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'display', 'label' => 'Display'),
											array('property' => 'z-index', 'label' => 'Z-Index'),
											array('property' => 'transform', 'label' => 'Transform'),
											array('property' => 'position', 'label' => 'Position'),
											array('property' => 'top', 'label' => 'Position Top'),
											array('property' => 'bottom', 'label' => 'Position Bottom'),
											array('property' => 'left', 'label' => 'Position Left'),
											array('property' => 'right', 'label' => 'Position Right'),
											array('property' => 'margin', 'label' => 'Margin'),
											array('property' => 'padding', 'label' => 'Padding'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),




		        'appai_simple_list' => array(
		        	'name' => esc_html__('Simple List - Appai', 'appai'),
		        	'description' => esc_html__('Add list items', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Simple List - Appai', 'appai'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'group',
								'label'			=> __('Lists', 'appai'),
								'name'			=> 'lists',
								'description'	=> __( 'Add list items with icon.', 'appai' ),
								'options'		=> array('add_text' => __(' Add new list', 'appai')),

								'params' => array(

									array(
										'type'			=> 'text',
										'label'			=> __( 'Title', 'appai' ),
										'name'			=> 'title',
										'description'	=> __( 'Add list title.', 'appai' ),
										'value'			=> 'What is the refund policy?',
									),
									array(
										'type'			=> 'icon_picker',
										'label'			=> __( 'Icon', 'appai' ),
										'name'			=> 'icon',
										'description'	=> __( 'Choose icon.', 'appai' ),
									),
								),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .info-details p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .info-details p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .info-details p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .info-details p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .info-details p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .info-details p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .info-details p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .info-details p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .info-details p'),
			                    		),
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .info-icon i'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .info-icon i'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .info-icon i'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .info-icon i'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .info-icon i'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .info-icon i'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .info-icon i'),
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .info-icon i'),
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .info-icon i'),
											array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+ .info-icon i'),
											array('property' => 'height', 'label' => 'Height', 'selector' => '+ .info-icon i'),
											array('property' => 'width', 'label' => 'Width', 'selector' => '+ .info-icon i'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .info-icon i'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .info-icon i'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_slider' => array(
		        	'name' => esc_html__('Slider - Appai', 'appai'),
		        	'description' => esc_html__('Add slider', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Slider - Appai', 'appai'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'radio_image',
								'label'			=> __( 'Select slider styles', 'appai' ),
								'name'			=> 'slider_style',
								'description'	=> __( 'Select slilder styles.', 'appai' ),
								'options'		=> array(
									'style1' => get_template_directory_uri() . '/assets/img/slider-types/slider-style1.png',
									'style2' =>  get_template_directory_uri() . '/assets/img/slider-types/slider-style2.png',
									'style3' =>  get_template_directory_uri() . '/assets/img/slider-types/slider-style3.png',
								),
								'value'			=> 'style1',
							),
							array(
								'type'			=> 'group',
								'label'			=> __('Slides', 'appai'),
								'name'			=> 'appai_slides',
								'description'	=> '',
								'options'		=> array('add_text' => __('Add new slide', 'appai')),


								// you can use all param type to register child params
								'params' => array(
									array(
										'type' => 'textarea',
										'label' => 'Slider Title',
										'name' => 'title',
										'description' => __('Enter slider title', 'appai'),
										'admin_label' => true,
										'value' => 'SHOWCASE YOUR APPS',
									),
									array(
										'type' => 'textarea',
										'label' => 'Slider Description',
										'name' => 'description',
										'description' => 'Add subtitle',
										'admin_label' => true,
									),
									array(
										'type' => 'attach_image',
										'label' => 'Slider Image',
										'name' => 'image',
										'description' => __('Choose slide image.', 'appai'),
										'admin_label' => true,
									),
									array(
										'type' => 'select',
										'label' => 'Slider Image Animation',
										'name' => 'img_animation',
										'description' => __('Select image animation style.', 'appai'),
										'options' => $appaiShortcodes->animation_style_list(),
										'admin_label' => true,
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Button 1 URL', 'appai' ),
										'name'			=> 'btn1_url',
										'description'	=> __( 'Give button 1 URL, set link target.', 'appai' ),
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Button 1 Label', 'appai' ),
										'name'			=> 'btn1_label',
										'description'	=> __( 'Set button 1 link target.', 'appai' ),
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Button 2 URL', 'appai' ),
										'name'			=> 'btn2_url',
										'description'	=> __( 'Give button 2 URL, set link target.', 'appai' ),
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Button 2 Label', 'appai' ),
										'name'			=> 'btn2_label',
										'description'	=> __( 'Set button 2 link target.', 'appai' ),
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Button 3 URL', 'appai' ),
										'name'			=> 'btn3_url',
										'description'	=> __( 'Give button 3 URL, set link target.', 'appai' ),
									),
									array(
										'type'			=> 'text',
										'label'			=> __( 'Button 3 Label', 'appai' ),
										'name'			=> 'btn3_label',
										'description'	=> __( 'Set button 3 link target.', 'appai' ),
									),

								)
							),
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Use slider action buttons?', 'appai' ),
								'name'			=> 'slider_btn_switch',
								'description'	=> __( 'Toogle this to use slider buttons.', 'appai' ),
							),
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Show scroll to down icon?', 'appai' ),
								'name'			=> 'scroll_down_icon_switch',
								'description'	=> __( 'Toogle this to show/hide scroll to down icon.', 'appai' ),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'ID of Target div', 'appai' ),
								'name'			=> 'scroll_to_link',
								'description'	=> __( 'Enter the id of targeted div.', 'appai' ),
								'relation'		=> array(
									'parent' => 'scroll_down_icon_switch',
									'show_when' => 'yes',
								),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .slider-text .slider-title'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .slider-text .slider-title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .slider-text .slider-title'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .slider-text .slider-title'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .slider-text .slider-title'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .slider-text .slider-title'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .slider-text .slider-title'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .slider-text .slider-title'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .slider-text .slider-title'),
			                    		),
			                    		'Subtitle' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .slider-text p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .slider-text p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .slider-text p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .slider-text p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .slider-text p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .slider-text p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .slider-text p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .slider-text p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .slider-text p'),
			                    		),
			                    		'Image' => array(
											array('property' => 'display', 'label' => 'Display', 'selector' => '+ #slider-area .slider-image'),
											array('property' => 'z-index', 'label' => 'Z-Index', 'selector' => '+ #slider-area .slider-image'),
											array('property' => 'transform', 'label' => 'Transform', 'selector' => '+ #slider-area .slider-image'),
											array('property' => 'position', 'label' => 'Position', 'selector' => '+ #slider-area .slider-image'),
											array('property' => 'top', 'label' => 'Position Top', 'selector' => '+ #slider-area .slider-image'),
											array('property' => 'bottom', 'label' => 'Position Bottom', 'selector' => '+ #slider-area .slider-image'),
											array('property' => 'left', 'label' => 'Position Left', 'selector' => '+ #slider-area .slider-image'),
											array('property' => 'right', 'label' => 'Position Right', 'selector' => '+ #slider-area .slider-image'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ #slider-area .slider-image'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ #slider-area .slider-image'),
			                    		),
			                    		'Button' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .slider-text .btn.btn-bordered-white'),
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .slider-text .btn.btn-bordered-white'),
											array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+ .slider-text .btn.btn-bordered-white'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .slider-text .btn.btn-bordered-white'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .slider-text .btn.btn-bordered-white'),
			                    		),
			                    		'Button Hover' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .slider-text .btn.btn-bordered-white:after'),
			                    		),
			                    		'Triangle' => array(
											array('property' => 'top', 'label' => 'Position Top', 'selector' => '+ #slider-area.home-style-1:after, + #slider-area.home-style-1:before'),
											array('property' => 'bottom', 'label' => 'Position Bottom', 'selector' => '+ #slider-area.home-style-1:after, + #slider-area.home-style-1:before'),
											array('property' => 'left', 'label' => 'Position Left', 'selector' => '+ #slider-area.home-style-1:after, + #slider-area.home-style-1:before'),
											array('property' => 'right', 'label' => 'Position Right', 'selector' => '+ #slider-area.home-style-1:after, + #slider-area.home-style-1:before'),
			                    		),
			                    		'Text wrapper' => array(
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ #slider-area .slider-text'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ #slider-area .slider-text'),
			                    		),
			                    		'wrapper' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ #slider-area'),
											array('property' => 'z-index', 'label' => 'Z Index', 'selector' => '+ #slider-area'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ #slider-area'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ #slider-area'),
			                    		),
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'appai_swipe_slider' => array(
		        	'name' => esc_html__('Swiper Slider - Appai', 'appai'),
		        	'description' => esc_html__('Add swiper slider', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Swiper Slider - Appai', 'appai'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
								'label'			=> __('Sliders', 'appai'),
								'name'			=> 'swipe_sliders',
								'description'	=> __( 'Add swiper slider .', 'appai' ),
								'options'		=> array('add_text' => __(' Add new slide', 'appai')),

								'params' => array(

									array(
										'type'			=> 'attach_image',
										'label'			=> __( 'Slide Image', 'appai' ),
										'name'			=> 'image',
										'description'   => __( 'Choose the image for the slide', 'appai' ),
									),
								),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
										'Slide' => array(
											array('property' => 'width', 'label' => 'Width', 'selector' => '+ .swiper-slide'),
										),
										'Slide img' => array(
											array('property' => 'width', 'label' => 'Width', 'selector' => '+ .swiper-slide img'),
										),
										'Wrapper' => array(
											array('property' => 'margin', 'label' => 'Margin'),
											array('property' => 'padding', 'label' => 'Padding'),
										),
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'appai_simple_stats' => array(
		        	'name' => esc_html__('Simple Statistics - Appai', 'appai'),
		        	'description' => esc_html__('Add simple statistics info', 'appai'),
		        	'category' => 'Appai',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Simple Statistics - Appai', 'appai'),

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'text',
								'label'			=> __( 'Statistics name', 'appai' ),
								'name'			=> 'stats_name',
								'description'	=> __( 'Enter the name.', 'appai' ),
								'value'			=> 'Android User',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Statistics number', 'appai' ),
								'name'			=> 'stats_number',
								'description'	=> __( 'Enter the number.', 'appai' ),
								'value'			=> '1200',
							),
							array(
								'type'			=> 'icon_picker',
								'label'			=> __( 'Choose icon', 'appai' ),
								'name'			=> 'stats_icon',
							),
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Show divider?', 'appai' ),
								'name'			=> 'show_divider',
								'description'	=> __( 'Toggle to show/hide divider on the right side.', 'appai' ),
								'value'			=> 'yes',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Number' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .useges-quantity h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .useges-quantity h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .useges-quantity h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .useges-quantity h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .useges-quantity h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .useges-quantity h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .useges-quantity h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .useges-quantity h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .useges-quantity h2'),
			                    		),
			                    		'Name' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .useges-quantity p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .useges-quantity p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .useges-quantity p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .useges-quantity p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .useges-quantity p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .useges-quantity p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .useges-quantity p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .useges-quantity p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .useges-quantity p'),
			                    		),
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .usage-icon i'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .usage-icon i'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .usage-icon i'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .usage-icon i'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .usage-icon i'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .usage-icon i'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .usage-icon i'),
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .usage-icon i'),
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .usage-icon i'),
											array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+ .usage-icon i'),
											array('property' => 'height', 'label' => 'Height', 'selector' => '+ .usage-icon i'),
											array('property' => 'width', 'label' => 'Width', 'selector' => '+ .usage-icon i'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .usage-icon i'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .usage-icon i'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		    )
		);

	}


}
