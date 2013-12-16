<?php 

/*-----------------------------------------------------------------------------------

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file,
	When things go wrong, they tend to go wrong in a big way.
	You have been warned!

-------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Theme Setup
/*-----------------------------------------------------------------------------------*/
add_action('after_setup_theme', 'md_theme_setup');

function md_theme_setup(){

	global $theme_options;

	/*-----------------------------------------------------------------------------------*/
	/*	Post Formats
	/*-----------------------------------------------------------------------------------*/
	add_theme_support( 'post-formats', array('quote','video','audio', 'image', 'gallery','link') );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
    add_theme_support( 'automatic-feed-links' );


	/*-----------------------------------------------------------------------------------*/
	/*	Post Thumbnails
	/*-----------------------------------------------------------------------------------*/
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'square-1', 600, 600, true);
	add_image_size( 'square-2', 1200, 1200, true);
	add_image_size( 'wide-1', 1200, 600, true);
	add_image_size( 'tall-1', 600, 1200, true);
	add_image_size( 'post-image', 800, 500, true);

	add_image_size( 'square-1-thumb', 400, 400, true);
	add_image_size( 'square-2-thumb', 800, 800, true);
	add_image_size( 'wide-1-thumb', 800, 400, true);
	add_image_size( 'tall-1-thumb', 400, 800, true);
	add_image_size( 'post-image-thumb', 600, 375, true);

	/*-----------------------------------------------------------------------------------*/
	/*	Load Theme Language
	/*-----------------------------------------------------------------------------------*/
	load_theme_textdomain(MD_THEME_URI . '/languages');

	add_action( 'init', 'md_register_menus' );
}




/*-----------------------------------------------------------------------------------*/
/*  Set Max Content Width
/* ----------------------------------------------------------------------------------*/
global $content_width;
if ( ! isset( $content_width ) )
	$content_width = 1170;




/*-----------------------------------------------------------------------------------*/
/*	Default Theme Constant
/*-----------------------------------------------------------------------------------*/
define('MD_THEME_NAME', 'zeta');
define('MD_THEME_DIR', get_template_directory());
define('MD_THEME_URI', get_template_directory_uri());

$theme_options = get_option(MD_THEME_NAME);




/*-----------------------------------------------------------------------------------*/
/*	Register / Enqueue JS / CSS
/*-----------------------------------------------------------------------------------*/
function md_theme_register_style() {
	if( is_singular() && comments_open() ){
		wp_enqueue_script( 'comment-reply' );	
	}

	wp_register_script('bootstrap3', MD_THEME_URI.'/assets/js/bootstrap.min.js', array('jquery'), '3.0.0', true);
	wp_enqueue_script('bootstrap3');

	wp_register_script('superfish', MD_THEME_URI.'/assets/js/libs/superfish.min.js', array('jquery'), '1.7.4', true);
	wp_enqueue_script('superfish');

	wp_register_script(MD_THEME_NAME, MD_THEME_URI . '/assets/js/theme.js', array('jquery'), '1.0', true);
	wp_enqueue_script(MD_THEME_NAME);


	wp_register_style('bootstrap3', MD_THEME_URI . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap3'); 

	(md_detect_user_agent('mobile')) ? '' : wp_enqueue_style('animate');

	wp_register_style(MD_THEME_NAME.'-style', MD_THEME_URI . "/style.css");		 
	wp_enqueue_style(MD_THEME_NAME.'-style');

	wp_register_style(MD_THEME_NAME.'-custom', MD_THEME_URI . "/assets/css/custom.css.php");		 
	wp_enqueue_style(MD_THEME_NAME.'-custom');
}
add_action('wp_enqueue_scripts', 'md_theme_register_style');







/*-----------------------------------------------------------------------------------*/
/*	Register Menus
/*-----------------------------------------------------------------------------------*/
if ( function_exists( 'register_nav_menus' ) ) {
	function md_register_menus(){
		register_nav_menus(
			array(
				'primary_menu' => __('Primary Menu', MD_THEME_NAME),
				'footer_menu' => __('Footer Menu', MD_THEME_NAME),
				)
		);
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Register Sidebars
/*-----------------------------------------------------------------------------------*/
if(function_exists('register_sidebar')) {
	function md_register_sidebars(){
		register_sidebar(array(
			'name' => __('Blog Sidebar 1', MD_THEME_NAME), 
			'description' => __('Widgets area for blog pages.', MD_THEME_NAME),
			'id' => 'sidebar-blog',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  =>
			'<h3 class="widget-title">',
			'after_title'   => '</h3>'
			)
		);


		register_sidebar(array(
			'name' => __('Page Sidebar 1', MD_THEME_NAME), 
			'description' => __('Widgets area for pages.', MD_THEME_NAME),
			'id' => 'sidebar-page-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  =>
			'<h3 class="widget-title">',
			'after_title'   => '</h3>'
			)
		);

		
		register_sidebar(array(
			'name' => __('Footer Area 1', MD_THEME_NAME), 
			'description' => __('Widgets area for footer area 1.', MD_THEME_NAME),
			'id' => 'footer-area-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  =>
			'<h3 class="widget-title">',
			'after_title'   => '</h3>'
			)
		);

		register_sidebar(array(
			'name' => __('Footer Area 2', MD_THEME_NAME), 
			'description' => __('Widgets area for footer area 2.', MD_THEME_NAME),
			'id' => 'footer-area-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  =>
			'<h3 class="widget-title">',
			'after_title'   => '</h3>'
			)
		);

		register_sidebar(array(
			'name' => __('Footer Area 3', MD_THEME_NAME), 
			'description' => __('Widgets area for footer area 3.', MD_THEME_NAME),
			'id' => 'footer-area-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  =>
			'<h3 class="widget-title">',
			'after_title'   => '</h3>'
			)
		);

		register_sidebar(array(
			'name' => __('Footer Area 4', MD_THEME_NAME), 
			'description' => __('Widgets area for footer area 4.', MD_THEME_NAME),
			'id' => 'footer-area-4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  =>
			'<h3 class="widget-title">',
			'after_title'   => '</h3>'
			)
		);
	}
}
add_action( 'widgets_init', 'md_register_sidebars' );



/*-----------------------------------------------------------------------------------*/
/*	Custom Login
/*-----------------------------------------------------------------------------------*/
if($theme_options['custom-login']){
	function md_theme_custom_login_logo() {
	    echo '<style type="text/css">
	    	body{background: #232323 !important}
	        h1 a { background-image:url('.MD_THEME_URI.'/framework/assets/img/logo-admin.png) !important; width: 320px !important; background-size: auto auto !important; }
	        .login p#nav a, .login p#backtoblog a{color: #fff !important; text-shadow: none !important; text-decoration:none !important;}
	        .login p#nav a:hover, .login p#backtoblog a:hover{color: #ffff !important;}
	    </style>';
	}
	add_action('login_head', 'md_theme_custom_login_logo');

	function md_theme_wp_login_url() {
		return home_url();
	}
	add_filter('login_headerurl', 'md_theme_wp_login_url');

	function md_theme_wp_login_title() {
		return get_option('blogname');
	}
	add_filter('login_headertitle', 'md_theme_wp_login_title');
}




/*-----------------------------------------------------------------------------------*/
/*	Pagination
/*-----------------------------------------------------------------------------------*/
function md_pagination() {	
	global $options;
	
	if( get_next_posts_link() || get_previous_posts_link() ) { 
		echo '<div class="md-pagination">';
		echo '<span class="prev"><h4>'.get_next_posts_link('&laquo; Previous').'</h4></span>';
		echo '<span class="next"><h4>'.get_previous_posts_link('Next &raquo;').'</h4></span>';
		echo '</div><div class="clearfix"></div>';
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Excerpt Length
/*-----------------------------------------------------------------------------------*/
function md_excerpt_length() {
	return 40; 
}
add_filter('excerpt_length', 'md_excerpt_length');



/*-----------------------------------------------------------------------------------*/
/*	Remove Pages From Search
/*-----------------------------------------------------------------------------------*/
function md_remove_page_from_search($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}
add_filter('pre_get_posts','md_remove_page_from_search');





/*-----------------------------------------------------------------------------------*/
/*	Init Theme Options Panel
/*-----------------------------------------------------------------------------------*/
if(!class_exists('ReduxFramework')){
	require_once(MD_THEME_DIR . '/framework/redux/ReduxCore/framework.php');
	require_once(MD_THEME_DIR . '/framework/redux/theme/config.php');
}



/*-----------------------------------------------------------------------------------*/
/*	Backend
/*-----------------------------------------------------------------------------------*/
require_once(MD_THEME_DIR .'/helpers/helpers.php');
require_once(MD_THEME_DIR .'/helpers/layout.helper.php');
require_once(MD_THEME_DIR .'/framework/init.php');





