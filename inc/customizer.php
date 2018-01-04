<?php
/**
 * sonnet Theme Customizer
 *
 * @package sonnet
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tt_sonnet_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Removing uneeded customizer controls
	$wp_customize->remove_control( 'display_header_text' );

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo h1 a',
		'render_callback' => 'tt_sonnet_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.tagline h2',
		'render_callback' => 'tt_sonnet_customize_partial_blogdescription',
	) );

	/**
	 * Site colour
	 */
	$wp_customize->add_setting( 'tt_sonnet_site_color', array(
			'default'   => '#00CED1',
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_control(
			$wp_customize,
			'tt_sonnet_site_color',
			array(
				'label'     => 'Site Color',
				'section'   => 'title_tagline',
				'settings'  => 'tt_sonnet_site_color'
			)
		)
	);

}
add_action( 'customize_register', 'tt_sonnet_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tt_sonnet_customize_preview_js() {
	wp_enqueue_script( 'tt_sonnet_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'tt_sonnet_customize_preview_js' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @since Twenty Seventeen 1.0
 * @see twentyseventeen_customize_register()
 *
 * @return void
 */
function tt_sonnet_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Twenty Seventeen 1.0
 * @see twentyseventeen_customize_register()
 *
 * @return void
 */
function tt_sonnet_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
