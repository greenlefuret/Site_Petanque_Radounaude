<?php
/**
 * The template for displaying audio post format content.
 *
 * @package Chuchadon
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php chuchadon_post_thumbnail(); ?>

	<?php echo ( $audio = hybrid_media_grabber( array( 'type' => 'audio', 'split_media' => true, 'before' => '<div class="entry-media">', 'after' => '</div>' ) ) ); ?>

	<div class="entry-inner">

		<header class="entry-header">
	
			<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
		
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
			?>
		
		</header><!-- .entry-header -->
		
		<?php if( !is_single() || is_page_template( 'pages/front-page.php' ) ) : ?>
		
			<div class="entry-summary" <?php hybrid_attr( 'entry-summary' ); ?>>
				<?php
					the_excerpt();
				?>
			</div>
			
		<?php else : ?>
		
			<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Read more %s', 'chuchadon' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );
				
					wp_link_pages( array(
						'before'      => '<div class="page-links">' . __( 'Pages:', 'chuchadon' ),
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'chuchadon' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">,</span> ',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php chuchadon_post_terms( array( 'taxonomy' => 'post_tag', 'sep' => '', 'text' => __( '<span class="screen-reader-text">Tagged</span> %s', 'chuchadon' ) ) ); ?>
			</footer><!-- .entry-footer -->
		
		<?php endif; // End check for single post ?>
		
	</div><!-- .entry-inner -->
	
</article><!-- #post-## -->