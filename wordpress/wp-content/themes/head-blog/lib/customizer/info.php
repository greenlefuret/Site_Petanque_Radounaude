<?php
/**
 * Head Blog Theme Info
 *
 * @package Head Blog
 */

function head_blog_customizer_theme_info( $wp_customize ) {
	$theme_data = wp_get_theme();
    $wp_customize->add_section( 'theme_info', array(
  		'title'       => esc_html__( 'Video Documentation & Demo' , 'head-blog' ),
  		'priority'    => 6,
  	) );
    
    /** Important Links */
	  $wp_customize->add_setting( 'theme_info_theme',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<p>';
	/* translators: %s: "demos here" string */
	$theme_info .= sprintf( __( 'You can use this theme to create a website like these %1$s', 'head-blog' ),  '<a href="' . esc_url( 'https://headthemes.com/theme/head-blog/' ) . '" target="_blank">' . esc_html__( 'demos', 'head-blog' ) . '</a>' );
    $theme_info .= '</p><p>';
	/* translators: %s: "documentation" string */
    $theme_info .= sprintf( __( 'For step-by-step videos and text tutorials, see %1$s', 'head-blog' ),  '<a href="' . esc_url( 'https://headthemes.com/head-blog-demo/documentation/' ) . '" target="_blank">' . esc_html__( 'documentation', 'head-blog' ) . '</a>' );   
    $theme_info .= '</p>';

	  $wp_customize->add_control( new head_blog_Info_Text( $wp_customize,
        'theme_info_theme', 
            array(
                'section'     => 'theme_info',
                'description' => $theme_info
            )
        )
    );
    
    
}
add_action( 'customize_register', 'head_blog_customizer_theme_info' );

if ( class_exists( 'WP_Customize_control' ) ) {

	class head_blog_Info_Text extends Wp_Customize_Control {
		
		public function render_content(){ ?>
    	    <span class="customize-control-title">
    			<?php echo esc_html( $this->label ); ?>
    		</span>
    
    		<?php if( $this->description ){ ?>
    			<span class="description customize-control-description">
    			<?php echo wp_kses_post($this->description); ?>
    			</span>
    		<?php }
        }
	}
}
