<?php 
	$image = wp_get_attachment_image_src( get_post_meta( $post->ID, 'post_image', true ), 'post-image' );
?>

<?php if( !is_single() ) { ?>

<h2 class="entry-title">
	<a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title()); ?>"> <?php the_title(); ?></a>
</h2>

<?php get_template_part( 'content' , 'meta-header' ); ?>

<?php if (has_post_thumbnail($post->ID)) { ?>
<div class="post-thumb">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<span class="over"><i class="md-icon icon-2x icon-circled icon-link"></i></span>
		<?php the_post_thumbnail('post-image'); ?>
	</a>
</div>
<?php } ?>

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

<?php get_template_part( 'content' , 'meta-header' ); ?>

<div class="entry-content">
    <?php the_content();?>
</div>

<?php get_template_part( 'content' , 'meta-footer' ); ?>

<?php } ?>
