<!-- start content container -->
<div class="row">
	<?php if ( head_blog_is_preview() ) { ?>
		<article class="col-md-9">
		<?php } else { ?>
			<article class="col-md-<?php head_blog_main_content_width_columns(); ?>">
			<?php } ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                          
					<div <?php post_class(); ?>>
						<div class="single-wrap col-md-12">
							<?php head_blog_thumb_img( 'head-blog-single' ); ?>
							<div class="main-content-page">
								<header>                              
									<?php the_title( '<h1 class="single-title">', '</h1>' ); ?>
									<time class="posted-on published" datetime="<?php the_time( 'Y-m-d' ); ?>"></time>                                                        
								</header>                            
								<div class="entry-content">                              
									<?php the_content(); ?>                            
								</div>
								<?php wp_link_pages(); ?>
							</div>
						</div>
						<div class="single-footer row">
							<div class="col-md-12">                                                                                    
								<?php comments_template(); ?>
							</div>
						</div>	
					</div>        
				<?php endwhile; ?>        
			<?php else : ?>            
				<?php get_template_part( 'content', 'none' ); ?>        
			<?php endif; ?>    
		</article>       
		<?php get_sidebar( 'right' ); ?>
</div>
<!-- end content container -->
