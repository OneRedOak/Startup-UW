<?php

/*
*	
*	Debug Examples
*
*/


global $md_metabox;

$fields = array(
	array(
		'name'  => 'field_textfield',
		'label' => __('Textfield', MD_THEME_NAME),
		'type'  => 'textfield',
		'desc'	=> 'Description goes here'
	),
	array(
		'name'  => 'fied_name_textarea_html',
		'label' => __('Textarea Html', MD_THEME_NAME),
		'type'  => 'textarea_html',
		'desc'	=> 'Description goes here'
	),
	array(
		'name'  => 'field_name_textarea',
		'label' => __('Textarea', MD_THEME_NAME),
		'type'  => 'textarea',
		'desc'	=> 'Description goes here'
	),
	array(
		'name'  => 'field_name_checkbox',
		'label' => __('Checkbox', MD_THEME_NAME),
		'type'  => 'checkbox',
		'desc'	=> 'Description goes here'
	),
	array(
		'name'  => 'field_name_upload',
		'label' => __('Upload', MD_THEME_NAME),
		'type'  => 'upload',
		'media' => 'image', // image | audio | video
		'desc'	=> 'Description goes here'
	),
	array(
		'name'  => 'field_name_gallery',
		'label' => __('Gallery', MD_THEME_NAME),
		'type'  => 'gallery',
		'desc'	=> 'Description goes here'
	),
	array(
		'name'  => 'field_name_checkbox',
		'label' => __('Checkbox', MD_THEME_NAME),
		'type'  => 'checkbox',
		'desc'	=> 'Description goes here'
	),
	array(
		'name'  => 'field_name_dropdown',
		'label' => __('Dropdown', MD_THEME_NAME),
		'type'  => 'dropdown',
		'options' => array(
			array(
				'label' => 'Option 01',
				'value' => 'value_01'
			),
			array(
				'label' => 'Option 02',
				'value' => 'value_02'
			)
		),
		'chosen' => true, // true | false
		'desc'	=> 'Description goes here'
	),
	array(
		'name'  => 'field_name_colorpicker',
		'label' => __('Colorpicker', MD_THEME_NAME),
		'type'  => 'colorpicker',
		'default' => '#ffffff',
		'desc'	=> 'Description goes here'
	),
	array(
		'name'  => 'field_name_toggle',
		'label' => __('Toggle', MD_THEME_NAME),
		'type'  => 'toggle',
		'desc'	=> 'Description goes here'
	),
);

$md_metabox['debug']['order'] => 0;
$md_metabox['debug']['title'] = 'Debug';
$md_metabox['debug']['fields'] = $fields;