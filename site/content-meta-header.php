<div class="entry-meta entry-header">
	<span class="date"><i class="icon-calendar"></i><?php the_time( get_option('date_format') ); ?></span>
	<span class="author"><i class="icon-user"></i>By <?php the_author_link(); ?></span>
	<span class="comments"><i class="icon-comment"></i><?php comments_popup_link(__('0 Comments', MD_THEME_NAME), __('1 Comment', MD_THEME_NAME), __('% Comments', MD_THEME_NAME)); ?></span>
	<span class="entry-categories"><i class="icon-tag"></i><?php _e('Posted in: ', MD_THEME_NAME) ?> <?php the_category(', ') ?></span>
	<span class="entry-tags"><i class="icon-tags"></i><?php the_tags( __('Tags:', MD_THEME_NAME) . ' ', ', ', ''); ?></span>
	<?php edit_post_link( __('Edit', MD_THEME_NAME), '', '' ); ?>
</div>