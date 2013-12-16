<?php $link_url = get_post_meta($post->ID, 'post_link_url', true); ?>
<?php $link_label = get_post_meta($post->ID, 'post_link_label', true); ?>

<?php if( !is_single() ) { ?>
<div class="post-link">
	<h3><a href="<?php echo $link_url; ?>" target="_blank"><?php echo $link_label; ?></a></h3>
	
	<div class="clearfix"></div>
	
	<a href="<?php echo $link_url; ?>" target="_blank"><?php echo $link_url; ?></a>
	
	<a href="<?php  the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', THEME_NAME), get_the_title()); ?>">#</a>
</div>
<?php } ?>


<?php if( is_single() ) { ?>

<?php if (has_post_thumbnail($post->ID)) { ?>
<div class="post-thumb">
	<?php the_post_thumbnail('post-image'); ?>
</div>

<?php } ?>

<div class="post-link">
	<h3><a href="<?php echo $link_url; ?>" target="_blank"><?php echo $link_label; ?></a></h3>
	<div class="clearfix"></div>
	<a href="<?php echo $link_url; ?>" target="_blank"><?php echo $link_url; ?></a>
	<a href="<?php  the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', THEME_NAME), get_the_title()); ?>">#</a>
</div>

<?php get_template_part( 'content' , 'meta-header' ); ?>

<div class="entry-content">
    <?php the_content();?>
</div>

<?php } ?>