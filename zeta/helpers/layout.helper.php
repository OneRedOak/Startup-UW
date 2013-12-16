<?php 

/*-----------------------------------------------------------------------------------

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file,
	When things go wrong, they tend to go wrong in a big way.
	You have been warned!

-------------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------*/
/*	Theme Comment
/*-----------------------------------------------------------------------------------*/
function md_comment($comment, $args, $depth) {

    $isByAuthor = false;

    if($comment->comment_author_email == get_the_author_meta('email')) {
        $isByAuthor = true;
    }

    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-section">              
            <div class="comment-side">
            	<div class="comment-avatar"><?php echo get_avatar($comment,$size='80'); ?></div>
            </div>
         
            <div class="comment-cont">
                <div class="comment-author">
                    <?php echo get_comment_author_link(); ?><?php if( $isByAuthor ) { ?><em>Author</em><?php } ?>
                </div>
                
                <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( __('%1$s at %2$s', MD_THEME_NAME), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link(__('Edit', MD_THEME_NAME), ' / ','') ?> / <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
                
                <?php if ( $comment -> comment_approved == '0') : ?>
                    <em class="moderation"><?php _e('Your comment is awaiting moderation.', MD_THEME_NAME) ?></em>
                <?php endif; ?>
                
                <div class="comment-body">
                    <?php comment_text() ?>
                </div>
            </div>
        </div>
<?php
}




/*-----------------------------------------------------------------------------------*/
/*	Pings
/*-----------------------------------------------------------------------------------*/
function md_pings($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
	<?php 
}


/*-----------------------------------------------------------------------------------*/
/*	Theme Header
/*-----------------------------------------------------------------------------------*/
function md_theme_header($page_id = null){
	if(isset($page_id)){
		$page_options = get_post_custom($page_id);
	}
	else{
		global $page_options;
		global $post;
		$page_id = $post->ID;
	}


	if(!isset($page_options['header_enabled'][0]) || !$page_options['header_enabled'][0])
	return;
	

	if($page_options['header_bgimage'][0]){
		$image = wp_get_attachment_image_src( $page_options['header_bgimage'][0], 'full');
		$page_options['header_bgimage'][0] = $image[0];
	}

	$bgimage =  ($page_options['header_bgimage'][0]) ? "background-image:url('".$page_options['header_bgimage'][0]."');" : '';

	$bgattach = ($page_options['header_bgimage_fixed'][0]) ? "background-attachment: fixed;" : '';

	$bgimage_parallax = ($page_options['header_bgimage_parallax'][0]) ?  ' data-type="background" data-speed="1"' : '';

	$class_parallax = ($page_options['header_bgimage_parallax'][0]) ? 'bg-parallax' : '';

	$mask_bgcolor = ($page_options['header_mask_bgcolor'][0]) ?  "background-color:".$page_options['header_mask_bgcolor'][0].";" : '';
	
	$title_animation = ($page_options['header_title_animation'][0]) ? ' class="animated '.$page_options['header_title_animation'][0].'"': '';

	$title_color = ($page_options['header_title_color'][0]) ? ' style="color:'.$page_options['header_title_color'][0].'"': '';

	$title = ($page_options['header_title'][0]) ?  '<h1'.$title_animation.$title_color.'><span>'.$page_options['header_title'][0].'</span></h1>' :  '<h1'.$title_animation.$title_color.'><span>'.get_the_title($page_id).'</span></h1>';

	$subtitle_color =  ($page_options['header_subtitle_color'][0]) ? ' style="color:'.$page_options['header_subtitle_color'][0].'"': '';

	$subtitle_animation = ($page_options['header_subtitle_animation'][0]) ? ' class="animated '.$page_options['header_subtitle_animation'][0].'"': '';

	$subtitle = ($page_options['header_subtitle'][0]) ?  '<h3'.$subtitle_animation.$subtitle_color.'><span>'.$page_options['header_subtitle'][0].'</span></h3>' : '';

	$class 	= setClass(array('md-page-header', $page_options['header_padding'][0], $class_parallax, $page_options['header_class'][0], $page_options['header_color_scheme'][0]));
	$id 	= setId($page_options['header_id'][0]);
	
	$s_bgcolor = ($page_options['header_color_scheme'][0] == 'custom') ? 'background-color:'.$page_options['header_bgcolor'][0].';' : '';

	$style = '';
	if($s_bgcolor || $bgimage)
	$style = ' style="'.$s_bgcolor.$bgimage.$bgattach.'"';
?>
	<div<?php echo $class.$id.$style;?><?php echo $bgimage_parallax;?>>
		
		<?php if ($page_options['header_mask'][0]) { ?>
		<div class="mask" style="<?php echo $mask_bgcolor;?>"></div>
		<?php } ?>

		<?php if (isset($page_options['header_arrow'][0])) {
			$arrow_border = '';
			if($page_options['header_color_scheme'][0] == 'custom') 
			$arrow_border = ($page_options['header_arrow'][0] == 'arrow-out') ? ' style="border-top-color:'.$page_options['header_bgcolor'][0].'"' : '';
		?>
		<span class="arrow <?php echo $page_options['header_arrow'][0].' '.$page_options['header_color_scheme'][0];?>"<?php echo $arrow_border;?>></span>
		<?php } ?>

		<div class="container <?php echo $page_options['header_align'][0]; ?>">
			<div class="cell">
			<?php echo $title; ?>
			<?php echo $subtitle; ?>
			</div>
		</div>
	</div>
<?php
}



/*-----------------------------------------------------------------------------------*/
/*	Theme Revolution Slider
/*-----------------------------------------------------------------------------------*/
function md_theme_rev_slider($slider_alias = false){
	global $page_options;

	if(!isset($page_options['rev_slider_enabled'][0]) || !$page_options['rev_slider_enabled'][0])
		return;

	if(!$slider_alias)
	{
		($page_options['rev_slider_alias'][0]) ? $slider_alias = $page_options['rev_slider_alias'][0] : $slider_alias = '';
	}
	if(!$slider_alias)
		return;

	echo '<div id="md-slider-header">';
	echo do_shortcode('[rev_slider '.$slider_alias.']');
	echo '</div>';
}