<?php $images = get_post_meta( $post->ID, 'post_gallery'); ?>

<?php if( !is_single() ) { ?>

<h2 class="entry-title">
	<a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title()); ?>"> <?php the_title(); ?></a>
</h2>

<?php get_template_part( 'content' , 'meta-header' ); ?>

<div class="post-gallery">
	<?php 
		if(isset($images[0]))
		echo do_shortcode('[md_gallery type="slider" images="'.$images[0].'"]' );
	?>
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
	<?php the_post_thumbnail('post-image'); ?>
</div>
<?php } ?>
*/
?>

<?php echo do_shortcode('[md_gallery type="slider" images="'.$images[0].'"]' ); ?>

<?php get_template_part( 'content' , 'meta-header' ); ?>

<div class="entry-content">
    <?php the_content();?>
</div>

<?php } ?>