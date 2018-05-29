<div class="site-header container-fluid" style="background-image: url(<?php esc_url( header_image() ); ?>)">
	<div class="custom-header container" >
			<div class="site-heading text-center">
				<div class="site-branding-logo">
					<?php the_custom_logo(); ?>
				</div>
				<div class="site-branding-text">
					<?php if ( is_front_page() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>

					<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) :
						?>
						<p class="site-description">
							<?php echo $description; ?>
						</p>
					<?php endif; ?>
				</div><!-- .site-branding-text -->
			</div>	

	</div>
</div>
<?php do_action( 'head_blog_before_menu' ); ?> 
<div class="main-menu">
	<nav id="site-navigation" class="navbar navbar-default navbar-center">     
		<div class="container">   
			<div class="navbar-header">
				<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
					<div id="main-menu-panel" class="open-panel" data-panel="main-menu-panel">
						<span></span>
						<span></span>
						<span></span>
					</div>
				<?php endif; ?>
			</div>
			<?php
			if ( head_blog_is_preview() ) {
				echo '<div class="menu-container"><ul id="main-menu" class="nav navbar-nav">';
				head_blog_preview_navigation();
				echo '</ul></div>';
			} else {
				wp_nav_menu( array(
					'theme_location'	 => 'main_menu',
					'depth'				 => 5,
					'container'			 => 'div',
					'container_class'	 => 'menu-container',
					'menu_class'		 => 'nav navbar-nav',
					'fallback_cb'		 => 'wp_bootstrap_navwalker::fallback',
					'walker'			 => new wp_bootstrap_navwalker(),
				) );
			}
			?>
		</div>
		<?php do_action( 'head_blog_menu' ); ?>
	</nav> 
</div>
<?php do_action( 'head_blog_after_menu' ); ?>
