<?php get_header(); ?>

<div id="content">


<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<?php $page_options = get_post_custom( $post->ID ); ?>
	
	<?php md_theme_header(); ?>
	
	<?php md_theme_rev_slider(); ?>
	<div class="container">	
	<?php the_content(); ?>
	</div>


    <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', MD_THEME_NAME).'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>