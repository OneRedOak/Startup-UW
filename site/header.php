<!DOCTYPE html>
<!--[if gte IE 9]>
<html class="no-js lt-ie9" <?php language_attributes(); ?>>     
<![endif]-->
<html <?php language_attributes(); ?>>
<head>

<?php $theme_options = get_option(MD_THEME_NAME); ?>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<?php if(!empty($theme_options['favicon']['url'])) { ?>
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo $theme_options['favicon']['url'] ?>" />
<?php } ?>

<!-- Title -->
<title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>

<!-- RSS & Pingbacks -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo MD_THEME_URI; ?>/assets/js/libs/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>

</head>

<?php
	$is_mobile		= (md_detect_user_agent('mobile')) ? 'no-animated' : '';

	$is_fixed		= ($theme_options['header-fixed']) ? 'header-fixed' : '';
	$is_fixed		= (isset($_COOKIE['force-header'])) ? $_COOKIE['force-header'] : $is_fixed;

	$is_boxed		= ($theme_options['boxed']) ? 'boxed' : '';
	$is_boxed		= (isset($_COOKIE['force-boxed'])) ? $_COOKIE['force-boxed'] : $is_boxed;
?>
<body <?php body_class($is_boxed.' '.$is_fixed.' '.$is_mobile); ?>>


<div id="wrap">
<?php $header_icons	= ($theme_options['header-icons']) ? ' class="show-icons"' : ''; ?>
	<header<?php echo $header_icons; ?>>
	<?php if(has_nav_menu('top_menu')) {	?>
		<div id="top">
			<div class="container">
				
				<nav id="menu-top">
					<ul>
						<?php
						wp_nav_menu( array('theme_location' => 'top_menu', 'menu' => 'Top Menu', 'container' => '', 'items_wrap' => '%3$s' ) ); 
						?>	
					</ul>
				</nav>
			</div>
		</div>
	<?php } ?>

		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<div id="logo">
						<?php if( !$theme_options['logo-image-enabled']) { ?>
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
						<?php } else { ?>
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
						<img class="standard" src="<?php echo $theme_options['logo-image']['url']; ?>" alt="<?php bloginfo('name'); ?>" />
						<img class="retina" src="<?php echo $theme_options['logo-image-retina']['url']; ?>" alt="<?php bloginfo('name'); ?>" />
						</a>
						<?php } ?>
					</div>
				</div>

				<div class="col-md-10" id="menu-area">
					<nav id="menu">
						<ul>
							<?php 
							if(has_nav_menu('primary_menu')) {
							wp_nav_menu( array('theme_location' => 'primary_menu', 'menu' => 'Primary Menu', 'container' => '', 'items_wrap' => '%3$s' ) ); 
							}
							else {
							echo '<li><a href="#">No menu assigned!</a></li>';
							}
							?>	
						</ul>
					</nav>
					<?php if($theme_options['header-special-button']){ ?>
					<a href="<?php echo $theme_options['header-special-button-url']; ?>" class="special-button"><?php echo $theme_options['header-special-button-label']; ?></a>
					<?php } ?>
				</div>
			</div>
			<a href="#" id="menu-mobile-trigger"><i class="icon-reorder"></i></a>
		</div>
	</header>

	<nav id="menu-mobile">
		<div class="container">
			<ul>
				<?php 
				if(has_nav_menu('primary_menu')) {
				wp_nav_menu( array('theme_location' => 'primary_menu', 'menu' => 'Primary Menu', 'container' => '', 'items_wrap' => '%3$s' ) ); 
				}
				else {
				echo '<li><a href="#">No menu assigned!</a></li>';
				}
				?>	
			</ul>
			<?php if($theme_options['header-special-button']){ ?>
			<a href="<?php echo $theme_options['header-special-button-url']; ?>" class="special-button"><?php echo $theme_options['header-special-button-label']; ?></a>
			<?php } ?>
		</div>
	</nav>
	<div class="clearfix"></div>
