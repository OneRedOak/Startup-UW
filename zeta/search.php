<?php get_header(); ?>
<?php global $theme_options; ?>
<?php 

$container_size = ($theme_options['blog-sidebar-enabled']) ? 'col-sm-8 col-md-8' : 'col-md-12'; 
$main_float = ($theme_options['blog-sidebar-enabled'] && $theme_options['blog-sidebar-layout'] == 'sidebar-left') ? 'float-right' : 'float-left';
$main_animated = ($theme_options['post-animation-enabled']) ? ' animate '.$theme_options['post-animation-type'] : ' ';


$sidebar_float = ($theme_options['blog-sidebar-enabled'] && $theme_options['blog-sidebar-layout'] == 'sidebar-left') ? 'float-left' : 'float-right'; 
$sidebar_animated = ($theme_options['blog-sidebar-animation-enabled']) ? ' class="animate '.$theme_options['blog-sidebar-animation-type'].'"' : '';

?>

<div id="content">

	
	<div class="md-page-header small accent textaligncenter"><h1 style="color:#fff">Search results for: <?php echo get_search_query(); ?></h1><div class="arrow arrow-out accent"></div></div>
	
	<section class="small">
		<div class="container">
			<div class="row">
	
				<div class="main-blog <?php echo $container_size.' '.$main_float; ?>">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<?php $format = get_post_format(); ?>
					<article <?php post_class('md-post md-post-'.$format.' '.$main_animated); ?>>	
						<div class="post-container">
							<?php 
								get_template_part( 'content', $format );
							?>
						</div>
					</article>
					<div class="clearfix"></div>
					<?php endwhile; ?>
	            	
					<?php md_pagination(); ?>
					
					<?php else: ?>
					<div class="md-404">
	                    <h2 class="animated shake"><?php _e('Sorry! posts not found', MD_THEME_NAME);?></h2>
	                    <i class="icon-remove-sign"></i>
                    </div>
					<?php endif; ?>
				</div>

				<?php  if($theme_options['blog-sidebar-enabled']): ?>
				<div class="col-xs-12 col-sm-4 col-md-4 <?php echo $sidebar_float;?>">
					<aside id="sidebar"<?php echo $sidebar_animated; ?>>
	                    <?php get_sidebar('sidebar-blog'); ?>
	                </aside>
	            </div>
				<?php  endif; ?>

			</div>
		</div>
	</section>
	
</div>
<?php get_footer(); ?>