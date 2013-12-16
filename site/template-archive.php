<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content">


<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
    <?php $page_options = get_post_custom( $post->ID ); ?>
    
    <?php md_theme_header(); ?>
    
    <?php md_theme_rev_slider(); ?>

    <section class="section-full small">
        <div class="container">
            <div class="row">
            	<div class="col-sm-8 col-md-8">
    				<?php the_content(); ?>
                
                    <h4 class="md-special-heading"><?php _e('Latest 30 Posts', MD_THEME_NAME); ?></h4>
                    <ul class="simple-list"><?php wp_get_archives('type=postbypost&limit=30&show_post_count=1'); ?></ul> 

                    <h4 class="md-special-heading"><?php _e('Archives by Month', MD_THEME_NAME); ?></h4>
                    <ul class="simple-list"><?php wp_get_archives('type=monthly&limit=12'); ?></ul> 

                    <h4 class="md-special-heading"><?php _e('Archives by Subject', MD_THEME_NAME); ?></h4>
                    <ul class="simple-list"><?php wp_list_categories('title_li='); ?></ul> 

                </div>
                
                <div class="col-sm-4 col-md-4">
                    <aside id="sidebar">
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
                
            </div>
        </div>
    </section>
        
    <?php endwhile; endif; ?>
</div>
    
<?php get_footer(); ?>