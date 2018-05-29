<?php
add_action( 'wp_enqueue_scripts', 'movershub_theme_css',999);
function movershub_theme_css() {
    wp_enqueue_style( 'movershub-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'movershub-child-style', get_stylesheet_uri(), array( 'movershub-parent-style' ) );
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'movershub-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
	wp_dequeue_style( 'default',get_template_directory_uri() .'/css/colors/default.css');
}
?>