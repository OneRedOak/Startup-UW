<?php
	$audio_mp3 = get_post_meta($post->ID, 'post_audio_mp3', true); 
	$audio_mp3 = wp_get_attachment_url( $audio_mp3 );
?>

<?php if( !is_single() ) { ?>

<h2 class="entry-title">
	<a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title()); ?>"> <?php the_title(); ?></a>
</h2>

<?php get_template_part( 'content' , 'meta-header' ); ?>

<div class="post-audio">
	<?php echo do_shortcode('[md_audio_hosted audio_mp3="'.$audio_mp3.'"]' ); ?>
</div>

<div class="entry-content">
    <?php the_content(''); ?>
</div>

<div class="post-more">
	<a href="<?php the_permalink() ?>" title="<?php esc_attr(the_title()); ?>" class="md-button accent no-fill"><?php _e("CONTINUE READING", MD_THEME_NAME); ?></a>
</div>

<?php } ?>


<?php if( is_single() ) { ?>

<?php if (has_post_thumbnail($post->ID)) { ?>
<div class="post-thumb">
	<?php the_post_thumbnail('post-image'); ?>
</div>
<?php } ?>

<div class="post-audio">
	<?php echo do_shortcode('[md_audio_hosted audio_mp3="'.$audio_mp3.'"]' ); ?>
</div>
<?php get_template_part( 'content' , 'meta-header' ); ?>

<div class="entry-content">
    <?php the_content();?>
</div>
	
<?php } ?>