<?php if ( head_blog_is_preview() ) { ?>
	<aside id="sidebar" class="col-md-3">
		<?php head_blog_preview_right_sidebar(); ?>
	</aside>
<?php } else if ( is_active_sidebar( 'head-blog-right-sidebar' ) ) { ?>
	<aside id="sidebar" class="col-md-3">
		<?php dynamic_sidebar( 'head-blog-right-sidebar' ); ?>
	</aside>
<?php } ?>
