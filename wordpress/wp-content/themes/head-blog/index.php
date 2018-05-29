<?php get_header(); ?>

<?php get_template_part( 'template-parts/template-part', 'head' ); ?>
<?php get_template_part( 'template-parts/homepage', 'widgets' );?>
<!-- start content container -->
<div class="row">

    <?php if ( head_blog_is_preview() ) { ?>
		<div class="col-md-8">
	<?php } else { ?>
		<div class="col-md-<?php head_blog_main_content_width_columns(); ?>">
	<?php }?>

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				get_template_part( 'content', get_post_format() );

			endwhile;

			the_posts_pagination();

		else :

			get_template_part( 'content', 'none' );

		endif;
		?>

	</div>

	<?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>
