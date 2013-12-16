<?php 

/*-----------------------------------------------------------------------------------

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file,
	When things go wrong, they tend to go wrong in a big way.
	You have been warned!

-------------------------------------------------------------------------------------*/




/*-----------------------------------------------------------------------------------*/
/*	Globals Variables
/*-----------------------------------------------------------------------------------*/
if(!isset($md_metabox)){
	$md_metabox = array();
}


/*-----------------------------------------------------------------------------------*/
/*	Detect Plugin's Installation
/*-----------------------------------------------------------------------------------*/
require_once(MD_THEME_DIR .'/framework/plugin-activation/init.php');



/*-----------------------------------------------------------------------------------*/
/*	Setup Admin Backend
/*-----------------------------------------------------------------------------------*/
function md_theme_admin_setup(){

	/*-----------------------------------------------------------------------------------*/
	/*	Load Helpers
	/*-----------------------------------------------------------------------------------*/
	require_once(MD_THEME_DIR . '/framework/helpers/helpers.php');
	require_once(MD_THEME_DIR . '/framework/helpers/form.helper.php');
	require_once(MD_THEME_DIR . '/framework/helpers/metabox.helper.php');



	/*-----------------------------------------------------------------------------------*/
	/*	Register / Enqueue Admin CSS / JS
	/*-----------------------------------------------------------------------------------*/
	global $pagenow;

	wp_register_style('admin', MD_THEME_URI . '/framework/assets/css/style.css');
	wp_enqueue_style('admin');

	wp_register_style('redux-css', MD_THEME_URI . '/framework/redux/theme/assets/css/style.css');
	wp_enqueue_style('redux-css');
	if($pagenow == 'post-new.php' || $pagenow == 'post.php'){

		wp_register_style('chosen', MD_THEME_URI . '/framework/assets/css/chosen.css');
		wp_enqueue_style('chosen');

		wp_register_script('chosen', MD_THEME_URI . '/framework/assets/js/libs/chosen.jquery.min.js', array('jquery'), '0.9.15', true);
		wp_enqueue_script('chosen');

		wp_register_script('admin', MD_THEME_URI . '/framework/assets/js/admin.js', array('jquery'), '1.0', true);
		wp_enqueue_script('admin');
	}


	/*-----------------------------------------------------------------------------------*/
	/*	Metabox
	/*-----------------------------------------------------------------------------------*/
	if (isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])){

		// require_once(MD_THEME_DIR . '/framework/metabox/debug.metabox.php');
		require_once(MD_THEME_DIR . '/framework/metabox/header.metabox.php');
		require_once(MD_THEME_DIR . '/framework/metabox/revslider.metabox.php');
		require_once(MD_THEME_DIR . '/framework/metabox/post.metabox.php');

		$theme_metabox = new METABOX_HELPER();
		
		$theme_metabox->init();
	}
}
add_action('admin_init', 'md_theme_admin_setup' );

