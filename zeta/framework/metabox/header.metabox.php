<?php

/*
*	
*	HEADER METABOX
*
*/

global $theme_options;
global $md_metabox;

$revSliders = getRevolutionSliders();


$fields = array(
	array(
		'name'  => 'header_enabled',
		'label' => __('Header', MD_THEME_NAME),
		'desc'	=> __('Enable / disable page header.', MD_THEME_NAME),
		'type'  => 'toggle'
	),
	array(
		'name' 	=> "header_class",
		'label' => __('Header Class', MD_THEME_NAME),
		'desc' 	=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", MD_THEME_NAME),
		'type'  => 'textfield'
	),
	array(
		'name' 	=> "header_id",
		'label' => __('Header ID', MD_THEME_NAME),
		'desc' 	=> __("If you wish to set a particular content element differently, then use this field to add a ID name and then refer to it in your css file.", MD_THEME_NAME),
		'type'  => 'textfield'
	),
	array(
		'name' 	=> "header_padding",
		'label' => __('Header Padding', MD_THEME_NAME),
		'desc' 	=> __("Set a padding for the header", MD_THEME_NAME),
		'type'  => 'dropdown',
		'options' => array(
			array(
				'label' => 'Small',
				'value' => 'small'
			),
			array(
				'label' => 'Medium',
				'value' => 'medium'
			),
			array(
				'label' => 'Large',
				'value' => 'large'
			),
			array(
				'label' => 'No Padding',
				'value' => 'no-padding'
			),
		)
	),
	array(
		'name'  => 'header_title',
		'label' => __('Header Title', MD_THEME_NAME),
		'desc'	=> __('Set header title. Default is the page title.', MD_THEME_NAME),
		'type'  => 'textfield'
	),
	array(
		'name'  => 'header_title_color',
		'label' => __('Header Title Color', MD_THEME_NAME),
		'desc'	=> __('Set header title color. Default is #FFFFFF.', MD_THEME_NAME),
		'type'  => 'colorpicker',
		'default' => '#FFFFFF'
	),
	array(
		'name'  => 'header_title_animation',
		'label' => __('Header Title Animation', MD_THEME_NAME),
		'desc'	=> __('Set Header Title animation.', MD_THEME_NAME),
		'type'  => 'animations',
	),
	array(
		'name'  => 'header_subtitle',
		'label' => __('Header Subtitle', MD_THEME_NAME),
		'desc'	=> __('Set header subtitle.', MD_THEME_NAME),
		'type'  => 'textfield'
	),
	array(
		'name'  => 'header_subtitle_color',
		'label' => __('Header Subtitle Color', MD_THEME_NAME),
		'desc'	=> __('Set header subtitle color. Default is #FFFFFF.', MD_THEME_NAME),
		'type'  => 'colorpicker',
		'default' => '#FFFFFF'
	),
	array(
		'name'  => 'header_subtitle_animation',
		'label' => __('Header Subtitle Animation', MD_THEME_NAME),
		'desc'	=> __('Set Header Subtitle animation.', MD_THEME_NAME),
		'type'  => 'animations',
	),
	array(
		'name'  => 'header_align',
		'label' => __('Header Align', MD_THEME_NAME),
		'desc'	=> __('Set header alignaments.', MD_THEME_NAME),
		'type'  => 'dropdown',
		'options' => array(
			array(
				'label' => 'Left',
				'value' => 'textalignleft'
			),
			array(
				'label' => 'Center',
				'value' => 'textaligncenter'
			),
			array(
				'label' => 'Right',
				'value' => 'textalignright'
			),
		)
	),
	array(
		'name'  => 'header_arrow',
		'label' => __('Header Arrow', MD_THEME_NAME),
		'desc'	=> __('Enable / disable arrow.', MD_THEME_NAME),
		'type'  => 'dropdown',
		'options' => array(
			array(
				'label' => 'None',
				'value' => ''
			),
			array(
				'label' => 'Arrow Outside',
				'value' => 'arrow-out'
			),
			array(
				'label' => 'Arrow Inside',
				'value' => 'arrow-in'
			),
		)
	),
	array(
		'name'  => 'header_color_scheme',
		'label' => __('Header Color Scheme', MD_THEME_NAME),
		'desc'	=> __('Set header color scheme. If custom, choose the color below.', MD_THEME_NAME),
		'type'  => 'dropdown',
		'options' => array(
			array(
				'label' => 'Accent Color',
				'value' => 'accent'
			),
			array(
				'label' => 'Custom',
				'value' => 'custom'
			),
		)
	),
	array(
		'name'  => 'header_bgcolor',
		'label' => __('Header Bg Color', MD_THEME_NAME),
		'desc'	=> __('Set header background color. Default is Theme Color.', MD_THEME_NAME),
		'type'  => 'colorpicker',
		'default' => $theme_options['accent-color']
	),
	array(
		'name'  => 'header_bgimage',
		'label' => __('Header Bg Image', MD_THEME_NAME),
		'desc'	=> __('Set header background image.', MD_THEME_NAME),
		'type'  => 'upload',
		'media' => 'image'
	),
	array(
		'name'  => 'header_bgimage_parallax',
		'label' => __('Header Bg Image Parallax', MD_THEME_NAME),
		'desc'	=> __('Enable / disable header background image parallax.', MD_THEME_NAME),
		'type'  => 'toggle'
	),
	array(
		'name'  => 'header_bgimage_fixed',
		'label' => __('Header Bg Image Fixed', MD_THEME_NAME),
		'desc'	=> __('Enable / disable bg image fixed(if parallax is active this will be ignored)', MD_THEME_NAME),
		'type'  => 'toggle'
	),
	array(
		'name'  => 'header_mask_bgcolor',
		'label' => __('Header Mask Bg Color', MD_THEME_NAME),
		'desc'	=> __('Set header mask background color. Default is #000000.', MD_THEME_NAME),
		'type'  => 'colorpicker',
		'default' => '#000000'
	),
	array(
		'name'  => 'header_mask',
		'label' => __('Header Mask', MD_THEME_NAME),
		'desc'	=> __('Enable / disable mask.', MD_THEME_NAME),
		'type'  => 'toggle'
	),
);

$md_metabox['header']['order'] = 1;
$md_metabox['header']['title'] = 'Header Settings';
$md_metabox['header']['icon'] = 'magic';
$md_metabox['header']['fields'] = $fields;
