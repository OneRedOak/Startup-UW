<?php

	/*-----------------------------------------------------------------------------------*/
	/*	Set Shortcodes
	/*-----------------------------------------------------------------------------------*/
	$required_shortcodes = array(
		'row',
		'row_inner',
		'column',
		'column_inner',
		'special_heading',
		'clearfix',
		'blank_space',
		'text',
		'icon',
		'alert',
		'box',
		'box_icon',
		'button',
		'progress_bar',
		'blockquote',
		'single_image',
		'posts_grid',
		'portfolio_grid',
		'team_grid',
		'divider',
		'video',
		'lightbox_image',
		'lightbox_video',
		'lightbox_map',
		'gmap',
		'gallery',
		'tabs',
		'toggles',
		'accordions',
		'tooltip',
		'highlight',
		'dropcap',
		'cta',
		'clients',
		'testimonials',
		'callout',
		'heading',
		'raw_html',
		'raw_js',
		'social_share',
		'social_share_classic',
		'carousel',
		'video_hosted',
		'audio_hosted',
		'counter',
		'shortcodes_list',
		'twitter_feed',
	);
	
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
	(is_plugin_active('contact-form-7/wp-contact-form-7.php')) ? $required_shortcodes[] = 'contact_form_7' : '';
	(is_plugin_active('revslider/revslider.php')) ? $required_shortcodes[] = 'revslider' : '';
?>