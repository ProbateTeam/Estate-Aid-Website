<?php
/**
 * Theme customizer settings.
 *
 * @package EstateAidNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ean_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'ean_social_section',
		array(
			'title'    => __( 'Estate Aid Network Social Links', 'estate-aid-network' ),
			'priority' => 40,
		)
	);

	$social_controls = array(
		'ean_social_youtube'  => __( 'YouTube URL', 'estate-aid-network' ),
		'ean_social_linkedin' => __( 'LinkedIn URL', 'estate-aid-network' ),
		'ean_social_facebook' => __( 'Facebook URL', 'estate-aid-network' ),
	);

	foreach ( $social_controls as $setting => $label ) {
		$wp_customize->add_setting(
			$setting,
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			$setting,
			array(
				'label'   => $label,
				'section' => 'ean_social_section',
				'type'    => 'url',
			)
		);
	}
}
add_action( 'customize_register', 'ean_customize_register' );
