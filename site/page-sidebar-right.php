<?php
/*
Template Name: Page Sidebar Right
*/
?>
<?php get_header(); ?>

<div id="content">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

		<?php $page_options = get_post_custom( $post->ID ); ?>
		
		<?php md_theme_header(); ?>
		
		<?php md_theme_rev_slider(); ?>
		<div class="container">
			<div class="row">
				<div class="page-main col-sm-8 col-md-8 float-left">
					<?php the_content(); ?>

				    <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', MD_THEME_NAME).'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
				<div class="page-sidebar col-xs-12 col-sm-4 col-md-4 float-right">
					<aside id="sidebar">
		                <?php dynamic_sidebar('sidebar-page-1'); ?>
		            </aside>
		        </div>
	        </div>
        </div>

	<?php endwhile; endif; ?>
</div>


<?php get_footer(); ?>