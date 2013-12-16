<?php
	$video_poster = get_post_meta($post->ID, 'post_video_poster', true); 
	$video_poster = wp_get_attachment_url( $video_poster );
	$video_mp4 = get_post_meta($post->ID, 'post_video_mp4', true); 
	$video_mp4 = wp_get_attachment_url( $video_mp4 );
	$video_webm = get_post_meta($post->ID, 'post_video_webm', true); 
	$video_webm = wp_get_attachment_url( $video_webm );
	$video_ogv = get_post_meta($post->ID, 'post_video_ogv', true); 
	$video_ogv = wp_get_attachment_url( $video_ogv );
?>

<?php if( !is_single() ) { ?>

<h2 class="entry-title">
	<a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title()); ?>"> <?php the_title(); ?></a>
</h2>

<?php get_template_part( 'content' , 'meta-header' ); ?>

<div class="post-video">
	<?php echo do_shortcode('[md_video_hosted video_poster="'.$video_poster.'" video_mp4="'.$video_mp4.'" video_webm="'.$video_webm.'" video_ogv="'.$video_ogv.'" controls="yes"]' ); ?>
</div>

<div class="entry-content">
    <?php the_content(''); ?>
</div>

<div class="post-more">
	<a href="<?php the_permalink() ?>" title="<?php esc_attr(the_title()); ?>" class="md-button accent no-fill"><?php _e("CONTINUE READING", MD_THEME_NAME); ?></a>
</div>

<?php } ?>


<?php if( is_single() ) { ?>

<?php
/*
<?php if (has_post_thumbnail($post->ID)) { ?>
<div class="post-thumb">
	<a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title()); ?>">
		<?php the_post_thumbnail('post-image'); ?>
	</a>
</div>
<?php } ?>
*/
?>

<div class="post-video">
	<?php echo do_shortcode('[md_video_hosted video_poster="'.$video_poster.'" video_mp4="'.$video_mp4.'" video_webm="'.$video_webm.'" video_ogv="'.$video_ogv.'" controls="yes"]' ); ?>
</div>

<?php get_template_part( 'content' , 'meta-header' ); ?>

<div class="entry-content">
    <?php the_content();?>
</div>

<?php } ?>

