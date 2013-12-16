<?php $quote = get_post_meta($post->ID, 'post_quote', true); ?>

<?php if( !is_single() ) { ?>

<div class="post-quote">
	<?php echo $quote; ?>
</div>

<?php } ?>