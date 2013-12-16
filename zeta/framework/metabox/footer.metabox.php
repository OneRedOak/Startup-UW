<?php

/*
*	
*	FOOTER METABOX
*
*/


global $md_metabox;

$fields = array(
	array(
		'name'  => 'footer_enabled',
		'label' => __('Footer Enabled', MD_THEME_NAME),
		'desc'	=> __('Enable / disable Footer.', MD_THEME_NAME),
		'type'  => 'toggle'
	),
);

$md_metabox['footer']['order'] = 4;
$md_metabox['footer']['title'] = 'Footer Settings';
$md_metabox['footer']['fields'] = $fields;