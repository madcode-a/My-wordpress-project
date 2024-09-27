<?php

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function roofing_flooring_register_recommended_plugins() {
	$plugins = array(		
		array(
			'name'             => __( 'Contact Form 7', 'roofing-flooring' ),
			'slug'             => 'contact-form-7',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'roofing_flooring_register_recommended_plugins' );