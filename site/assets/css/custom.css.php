<?php 
header("Content-type: text/css; charset=utf-8"); 

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp . '/wp-load.php' );


$force_color = (isset($_COOKIE['force-color'])) ? $_COOKIE['force-color'] : '';

$accent_color = ($force_color) ? $force_color : $theme_options['accent-color'];
$link_color = ($force_color) ? $force_color : $theme_options['link-color'];

$bg_image = (isset($theme_options['bgimage-boxed']['url'])) ? $theme_options['bgimage-boxed']['url'] : '';
$bg_image = (isset($_COOKIE['force-bgimage'])) ? $_COOKIE['force-bgimage'] : $bg_image;
?>


body{
	<?php if($theme_options['boxed']): ?>
	background-color: <?php echo $theme_options['bg-boxed']; ?>;
	<?php else: ?>
	background-color: <?php echo $theme_options['bg-fluid']; ?>;
	<?php endif; ?>

	<?php if($bg_image) : ?>
	background-image: url('<?php echo $bg_image; ?>');
	<?php endif; ?>

	font-family: <?php echo $theme_options['font-body']['font-family']; ?>;
	font-size: <?php echo $theme_options['font-body']['font-size']; ?>;
	font-weight: <?php echo $theme_options['font-body']['font-weight']; ?>;
	line-height: <?php echo $theme_options['font-body']['line-height']; ?>;
	color: <?php echo $theme_options['font-body']['color']; ?>;
	<?php if(isset($theme_options['font-body']['font-style'])): ?>
	font-style: <?php echo $theme_options['font-body']['font-style']; ?>;
	<?php endif; ?>	
}

<?php if(!$theme_options['boxed']): ?>
#content{
	background-color: <?php echo $theme_options['bg-fluid']; ?>;
}
<?php endif; ?>

a,
#credits a,
#copyright #menu-footer ul li a:hover,
footer .widget a:hover,
.md-twitter-feed .item .tweet-text a,
#sidebar .widget ul li a:hover{
	color: <?php echo $link_color; ?>;
}

h1{
	font-family: <?php echo $theme_options['font-h1']['font-family'] ?>;
	font-size: <?php echo $theme_options['font-h1']['font-size'] ?>;
	font-weight: <?php echo $theme_options['font-h1']['font-weight'] ?>;
	color: <?php echo $theme_options['font-h1']['color'] ?>;
	line-height: <?php echo $theme_options['font-h1']['line-height'] ?>;
}

h1 a{
	color: <?php echo $theme_options['font-h1']['color'] ?>;	
}

h2{
	font-family: <?php echo $theme_options['font-h2']['font-family'] ?>;
	font-size: <?php echo $theme_options['font-h2']['font-size'] ?>;
	font-weight: <?php echo $theme_options['font-h2']['font-weight'] ?>;
	color: <?php echo $theme_options['font-h2']['color'] ?>;
	line-height: <?php echo $theme_options['font-h2']['line-height'] ?>;
}

h2 a{
	color: <?php echo $theme_options['font-h1']['color'] ?>;	
}

h3{
	font-family: <?php echo $theme_options['font-h3']['font-family'] ?>;
	font-size: <?php echo $theme_options['font-h3']['font-size'] ?>;
	font-weight: <?php echo $theme_options['font-h3']['font-weight'] ?>;
	color: <?php echo $theme_options['font-h3']['color'] ?>;
	line-height: <?php echo $theme_options['font-h3']['line-height'] ?>;
}

h3 a{
	color: <?php echo $theme_options['font-h1']['color'] ?>;	
}

h4{
	font-family: <?php echo $theme_options['font-h4']['font-family'] ?>;
	font-size: <?php echo $theme_options['font-h4']['font-size'] ?>;
	font-weight: <?php echo $theme_options['font-h4']['font-weight'] ?>;
	color: <?php echo $theme_options['font-h4']['color'] ?>;
	line-height: <?php echo $theme_options['font-h4']['line-height'] ?>;
}

h4 a{
	color: <?php echo $theme_options['font-h1']['color'] ?>;	
}

h5{
	font-family: <?php echo $theme_options['font-h5']['font-family'] ?>;
	font-size: <?php echo $theme_options['font-h5']['font-size'] ?>;
	font-weight: <?php echo $theme_options['font-h5']['font-weight'] ?>;
	color: <?php echo $theme_options['font-h5']['color'] ?>;
	line-height: <?php echo $theme_options['font-h5']['line-height'] ?>;
}

h5 a{
	color: <?php echo $theme_options['font-h1']['color'] ?>;	
}

h6{
	font-family: <?php echo $theme_options['font-h6']['font-family'] ?>;
	font-size: <?php echo $theme_options['font-h6']['font-size'] ?>;
	font-weight: <?php echo $theme_options['font-h6']['font-weight'] ?>;
	color: <?php echo $theme_options['font-h6']['color'] ?>;
	line-height: <?php echo $theme_options['font-h6']['line-height'] ?>;
}

h6 a{
	color: <?php echo $theme_options['font-h1']['color'] ?>;	
}

.md-heading.special-font,
.md-special-heading.special-font{
	font-family: <?php echo $theme_options['font-special']['font-family'] ?>;
}

#logo a:hover,

#menu ul li a:hover,
#menu ul li ul li a:hover,
header.show-icons #menu ul li a:hover,
header.show-icons #menu ul li ul li a:hover,
.md-accordions.accent.no-fill .panel-group .panel-heading a,
.md-box.accent.no-fill,
.md-button.accent.no-fill,
.md-button.accent.no-fill.with-icon .md-icon,
.md-portfolio-grid .item .portfolio-image .over a:hover i,
.md-team-grid .team-role,
.md-tooltip,
.md-icon.accent,
.md-heading.accent,
.md-counter .number,
.widget_calendar table tbody td#today,
.md-post h2.entry-title a:hover,
.md-pagination span a:hover,
#sidebar .tagcloud a{
	color: <?php echo $accent_color; ?>;
}

.special-button,
section.accent,
.md-page-header.accent,
.md-accordions.accent.fill .panel-group .panel-heading,
.md-box.accent.fill,
.md-button.accent.fill,
.md-button.accent.no-fill:hover,
.md-tabs.accent .nav-tabs>li.active>a,
.md-tabs.accent .nav-tabs>li.active>a:hover,
.md-tabs.accent .nav-tabs>li>a:hover,
.md-progress-bar.accent span,
.md-highlight.accent,
.md-dropcap.accent,
.md-icon.accent.fill,
.md-cta.accent,
.wpcf7 input.wpcf7-submit,
.md-portfolio-filter a:hover,
.md-portfolio-filter a.active,
.md-portfolio-pagination a,
.flexslider .flex-direction-nav a:hover,
.widget_search form #searchsubmit,
.widget_calendar caption,
.comment-respond input#submit,
#sidebar .tagcloud a:hover{
	background-color: <?php echo $accent_color; ?>;
}


#menu ul li a:hover,
#menu ul li.current-menu-parent a,
#menu ul li.current-menu-item a,
.md-accordions.accent.no-fill .panel-group .panel-heading,
.md-box.accent.no-fill,
.md-button.accent.no-fill,
.md-tooltip,
.md-icon.accent.icon-circled,
.md-icon.accent.icon-round,
.md-post.sticky,
#sidebar .tagcloud a{
	border-color: <?php echo $accent_color; ?>;
}

.md-page-header .arrow.arrow-out.accent{
	border-top-color: <?php echo $accent_color; ?>;
}

header{
	background-color:<?php echo $theme_options['header-bgcolor']; ?>;
	border-color:<?php echo $accent_color; ?>;
}

#logo a{
	color:<?php echo $theme_options['header-logo-color']; ?>;
}

#menu ul li:before{
	border-top-color:<?php echo $accent_color; ?>;
}

#menu ul li a{
	color:<?php echo $theme_options['header-link-color']; ?>;
}

#menu ul li ul{
	background-color:<?php echo $theme_options['submenu-bgcolor']; ?>;
}


#menu ul li ul li{
	border-color:<?php echo $theme_options['submenu-border-color']; ?>;
}

#menu ul li ul li a{
	color:<?php echo $theme_options['submenu-link-color']; ?>;
}

footer{
	background-color:<?php echo $theme_options['footer-bgcolor']; ?>;
}

footer .md-icon.accent:hover{
	border-color: <?php echo $accent_color; ?> !important;
	color: <?php echo $accent_color; ?> !important;
}

#copyright{
	background-color:<?php echo $theme_options['copyright-bgcolor']; ?>;
}

#copyright:after{
	border-bottom-color:<?php echo $theme_options['copyright-bgcolor']; ?>;
}

<?php echo $theme_options['custom-css']; ?>