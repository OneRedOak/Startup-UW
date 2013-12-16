<?php

/*
*	
*	REVOLUTION SLIDER METABOX
*
*/



include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
if (is_plugin_active('revslider/revslider.php')){

	global $md_metabox;

	$revSliders = getRevolutionSliders();

	$fields = array(
		array(
			'name'  => 'rev_slider_enabled',
			'label' => __('Revolution Slider', MD_THEME_NAME),
			'desc'	=> __('Enable / disable Revolution Slider.', MD_THEME_NAME),
			'type'  => 'toggle'
		),
		array(
			'name'  => 'rev_slider_alias',
			'label' => __('Select Slider', MD_THEME_NAME),
			'desc'	=> __('Select your Revolution Slider', MD_THEME_NAME),
			'type'  => 'dropdown',
			'options' => $revSliders,
			'chosen' => 'true'
		),
	);


	$md_metabox['rev_slider']['order'] = 2;
	$md_metabox['rev_slider']['title'] = 'Revolution Slider';
	$md_metabox['rev_slider']['icon'] = 'picture';
	$md_metabox['rev_slider']['fields'] = $fields;
}