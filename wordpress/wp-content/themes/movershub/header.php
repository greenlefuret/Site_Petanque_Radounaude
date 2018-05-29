<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Movershub
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<div class="wrapper">
<header class="ta-trhead">
<!--==================== TOP BAR ====================-->
<?php 
$transportex_topbar_enable = get_theme_mod('transportex_topbar_enable','true');
if($transportex_topbar_enable !='false')
{ ?>
  <div class="ta-head-detail hidden-xs hidden-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-6">
          <ul class="info-left">
            <?php 
              $transportex_head_info_one = get_theme_mod('transportex_head_info_one','<a><i class="fa fa-clock-o "></i>Open-Hours:10 am to 7pm</a>','movershub');
              $transportex_head_info_two = get_theme_mod('transportex_head_info_two','<a href="mailto:info@themeansar.com" title="Mail Me"><i class="fa fa-envelope"></i> info@themeansar.com</a>','movershub');
            ?>
            <li><?php echo wp_kses_post($transportex_head_info_one); ?></li>
            <li><?php echo wp_kses_post($transportex_head_info_two); ?></li>
          </ul>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-6">
          <?php wp_nav_menu( 
              array(  
              'theme_location'  => 'top',
              'container' => '',
              'menu_class' => 'info-right',
              'fallback_cb' => 'transportex_custom_navwalker',
              'walker' => new transportex_custom_navwalker()
            ) ); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <?php } ?>
  <div class="ta-main-nav">
    <nav class="navbar navbar-default navbar-wp">
      <div class="container"> 
        <!-- Start Navbar Header -->
        <div class="navbar-header col-md-3"> 
          <?php if(has_custom_logo()) {
				// Display the Custom Logo
				the_custom_logo();
				} else { ?>
          	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
            <span> <?php bloginfo('name'); ?> </span> <br>
            <?php $description = get_bloginfo( 'description', 'display' );
  				if ( $description || is_customize_preview() ) : ?>
          		<span class="site-description"><?php echo $description; ?></span> 
          	<?php endif;?></a><?php }?>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only"><?php _e('Toggle Navigation'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <!-- /End Navbar Header --> 
        
        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="navbar-wp">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right', 'fallback_cb' => 'transportex_custom_navwalker::fallback' , 'walker' => new transportex_custom_navwalker() ) ); ?>
        </div>
        <!-- /Navigation --> 
      </div>
    </nav>
  </div>
</header>
<!-- #masthead --> 