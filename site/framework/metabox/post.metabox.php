<?php

/*
*	
*	POST METABOX
*
*/
if(isset($_GET['post']) || isset($_POST['post_ID']))
{

	$post_id = isset($_GET['post']) ? $_GET['post'] : $_POST['post_ID'] ;

	if('post' == get_post_type($post_id)){

		global $md_metabox;


		$fields = array(
			array(
				'name'  => 'post_quote',
				'label' => __('Quote Content', MD_THEME_NAME),
				'desc'	=> __('Insert the text for your quote.', MD_THEME_NAME),
				'type'  => 'textarea_html',
			)
		);

		$md_metabox['post-quote']['order'] = 5;
		$md_metabox['post-quote']['title'] = 'Quote Options';
		$md_metabox['post-quote']['class'] = 'md-post-format md-post-quote';
		$md_metabox['post-quote']['icon']  = 'quote-left';
		$md_metabox['post-quote']['fields'] = $fields;



		$fields = array(
			array(
				'name'  => 'post_video_poster',
				'label' => __('Video Poster', MD_THEME_NAME),
				'desc'	=> __('Select Poster video.', MD_THEME_NAME),
				'type'  => 'upload',
				'media' => 'image'
			),
			array(
				'name'  => 'post_video_mp4',
				'label' => __('Video MP4', MD_THEME_NAME),
				'desc'	=> __('Select MP4 video.', MD_THEME_NAME),
				'type'  => 'upload',
				'media' => 'video'
			),
			array(
				'name'  => 'post_video_webm',
				'label' => __('Video WEBM', MD_THEME_NAME),
				'desc'	=> __('Select WEBM video.', MD_THEME_NAME),
				'type'  => 'upload',
				'media' => 'video'
			),
			array(
				'name'  => 'post_video_ogv',
				'label' => __('Video OGV', MD_THEME_NAME),
				'desc'	=> __('Select OGV video.', MD_THEME_NAME),
				'type'  => 'upload',
				'media' => 'video'
			),
		);

		$md_metabox['post-video']['order'] = 5;
		$md_metabox['post-video']['title'] = 'Video Options';
		$md_metabox['post-video']['class'] = 'md-post-format md-post-video';
		$md_metabox['post-video']['icon']  = 'facetime-video';
		$md_metabox['post-video']['fields'] = $fields;



		$fields = array(
			array(
				'name'  => 'post_audio_mp3',
				'label' => __('Audio Url', MD_THEME_NAME),
				'desc'	=> __('Insert the url for your audio.', MD_THEME_NAME),
				'type'  => 'upload',
				'media' => 'audio'
			)
		);

		$md_metabox['post-audio']['order'] = 5;
		$md_metabox['post-audio']['title'] = 'Audio Options';
		$md_metabox['post-audio']['class'] = 'md-post-format md-post-audio';
		$md_metabox['post-audio']['icon']  = 'music';
		$md_metabox['post-audio']['fields'] = $fields;


		$fields = array(
			array(
				'name'  => 'post_image',
				'label' => __('Image', MD_THEME_NAME),
				'desc'	=> __('Insert your image.', MD_THEME_NAME),
				'type'  => 'upload',
				'media' => 'image'
			)
		);

		$md_metabox['post-image']['order'] = 5;
		$md_metabox['post-image']['title'] = 'Image Options';
		$md_metabox['post-image']['class'] = 'md-post-format md-post-image';
		$md_metabox['post-image']['icon']  = 'picture';
		$md_metabox['post-image']['fields'] = $fields;



		$fields = array(
			array(
				'name'  => 'post_gallery',
				'label' => __('Gallery', MD_THEME_NAME),
				'desc'	=> __('Select your galery.', MD_THEME_NAME),
				'type'  => 'gallery',
			)
		);

		$md_metabox['post-gallery']['order'] = 5;
		$md_metabox['post-gallery']['title'] = 'Gallery Options';
		$md_metabox['post-gallery']['class'] = 'md-post-format md-post-gallery';
		$md_metabox['post-gallery']['icon']  = 'picture';
		$md_metabox['post-gallery']['fields'] = $fields;


		$fields = array(
			array(
				'name'  => 'post_link_url',
				'label' => __('Link Url', MD_THEME_NAME),
				'desc'	=> __('Insert the url for your link.', MD_THEME_NAME),
				'type'  => 'textfield',
			),
			array(
				'name'  => 'post_link_label',
				'label' => __('Link Label', MD_THEME_NAME),
				'desc'	=> __('Insert the label for your link.', MD_THEME_NAME),
				'type'  => 'textfield',
			)
		);

		$md_metabox['post-link']['order'] = 5;
		$md_metabox['post-link']['title'] = 'Link Options';
		$md_metabox['post-link']['class'] = 'md-post-format md-post-link';
		$md_metabox['post-link']['icon']  = 'link';
		$md_metabox['post-link']['fields'] = $fields;

	}
}