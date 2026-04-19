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
		'ean_contact_section',
		array(
			'title'    => __( 'Estate Aid Network Contact', 'estate-aid-network' ),
			'priority' => 35,
		)
	);

	$wp_customize->add_section(
		'ean_social_section',
		array(
			'title'    => __( 'Estate Aid Network Social Links', 'estate-aid-network' ),
			'priority' => 40,
		)
	);

	$wp_customize->add_section(
		'ean_homepage_section',
		array(
			'title'    => __( 'Homepage Content', 'estate-aid-network' ),
			'priority' => 45,
		)
	);

	$wp_customize->add_section(
		'ean_homepage_cards_section',
		array(
			'title'    => __( 'Homepage Cards and Stats', 'estate-aid-network' ),
			'priority' => 46,
		)
	);

	$contact_controls = array(
		'ean_contact_phone'      => array( 'label' => __( 'Phone Display', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_contact_phone_link' => array( 'label' => __( 'Phone Link Digits', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_contact_email'      => array( 'label' => __( 'Contact Email', 'estate-aid-network' ), 'type' => 'email' ),
		'ean_newsletter_privacy' => array( 'label' => __( 'Newsletter Privacy Note', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_footer_about_title' => array( 'label' => __( 'Footer About Title', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_footer_tagline'     => array( 'label' => __( 'Footer Tagline', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_footer_description' => array( 'label' => __( 'Footer Description', 'estate-aid-network' ), 'type' => 'textarea' ),
	);

	foreach ( $contact_controls as $setting => $config ) {
		ean_customize_add_setting_and_control( $wp_customize, $setting, $config['label'], 'ean_contact_section', $config['type'] );
	}

	$social_controls = array(
		'ean_social_youtube'  => __( 'YouTube URL', 'estate-aid-network' ),
		'ean_social_linkedin' => __( 'LinkedIn URL', 'estate-aid-network' ),
		'ean_social_facebook' => __( 'Facebook URL', 'estate-aid-network' ),
	);

	foreach ( $social_controls as $setting => $label ) {
		ean_customize_add_setting_and_control( $wp_customize, $setting, $label, 'ean_social_section', 'url' );
	}

	$homepage_controls = array(
		'ean_home_hero_eyebrow'            => array( 'label' => __( 'Hero Eyebrow', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_hero_heading'            => array( 'label' => __( 'Hero Heading', 'estate-aid-network' ), 'type' => 'textarea' ),
		'ean_home_hero_description'        => array( 'label' => __( 'Hero Description', 'estate-aid-network' ), 'type' => 'textarea' ),
		'ean_home_video_heading'           => array( 'label' => __( 'Video Heading', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_video_description'       => array( 'label' => __( 'Video Description', 'estate-aid-network' ), 'type' => 'textarea' ),
		'ean_home_youtube_url'             => array( 'label' => __( 'YouTube Embed URL', 'estate-aid-network' ), 'type' => 'url' ),
		'ean_home_youtube_channel_url'     => array( 'label' => __( 'YouTube Channel URL', 'estate-aid-network' ), 'type' => 'url' ),
		'ean_home_video_button_text'       => array( 'label' => __( 'Video Button Text', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_video_supporting_text'   => array( 'label' => __( 'Video Supporting Text', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_testimonial_quote'       => array( 'label' => __( 'Testimonial Quote', 'estate-aid-network' ), 'type' => 'textarea' ),
		'ean_home_testimonial_attribution' => array( 'label' => __( 'Testimonial Attribution', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_cta_title'               => array( 'label' => __( 'Sticky CTA Title', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_cta_meta'                => array( 'label' => __( 'Sticky CTA Meta Text', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_cta_primary_text'        => array( 'label' => __( 'Primary CTA Button Text', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_cta_primary_url'         => array( 'label' => __( 'Primary CTA Button URL', 'estate-aid-network' ), 'type' => 'url' ),
		'ean_home_cta_secondary_text'      => array( 'label' => __( 'Secondary CTA Button Text', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_cta_secondary_url'       => array( 'label' => __( 'Secondary CTA Button URL', 'estate-aid-network' ), 'type' => 'url' ),
	);

	foreach ( $homepage_controls as $setting => $config ) {
		ean_customize_add_setting_and_control( $wp_customize, $setting, $config['label'], 'ean_homepage_section', $config['type'] );
	}

	$cards_controls = array(
		'ean_home_features_eyebrow'      => array( 'label' => __( 'Features Eyebrow', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_feature_1_title'       => array( 'label' => __( 'Feature 1 Title', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_feature_1_description' => array( 'label' => __( 'Feature 1 Description', 'estate-aid-network' ), 'type' => 'textarea' ),
		'ean_home_feature_1_link_text'   => array( 'label' => __( 'Feature 1 Link Text', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_feature_1_link_url'    => array( 'label' => __( 'Feature 1 Link URL', 'estate-aid-network' ), 'type' => 'url' ),
		'ean_home_feature_2_title'       => array( 'label' => __( 'Feature 2 Title', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_feature_2_description' => array( 'label' => __( 'Feature 2 Description', 'estate-aid-network' ), 'type' => 'textarea' ),
		'ean_home_feature_2_link_text'   => array( 'label' => __( 'Feature 2 Link Text', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_feature_2_link_url'    => array( 'label' => __( 'Feature 2 Link URL', 'estate-aid-network' ), 'type' => 'url' ),
		'ean_home_feature_3_title'       => array( 'label' => __( 'Feature 3 Title', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_feature_3_description' => array( 'label' => __( 'Feature 3 Description', 'estate-aid-network' ), 'type' => 'textarea' ),
		'ean_home_feature_3_link_text'   => array( 'label' => __( 'Feature 3 Link Text', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_feature_3_link_url'    => array( 'label' => __( 'Feature 3 Link URL', 'estate-aid-network' ), 'type' => 'url' ),
		'ean_home_stat_1_value'          => array( 'label' => __( 'Stat 1 Value', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_stat_1_label'          => array( 'label' => __( 'Stat 1 Label', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_stat_2_value'          => array( 'label' => __( 'Stat 2 Value', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_stat_2_label'          => array( 'label' => __( 'Stat 2 Label', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_stat_3_value'          => array( 'label' => __( 'Stat 3 Value', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_stat_3_label'          => array( 'label' => __( 'Stat 3 Label', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_stat_4_value'          => array( 'label' => __( 'Stat 4 Value', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_stat_4_label'          => array( 'label' => __( 'Stat 4 Label', 'estate-aid-network' ), 'type' => 'text' ),
		'ean_home_services_eyebrow'      => array( 'label' => __( 'Services Eyebrow', 'estate-aid-network' ), 'type' => 'text' ),
	);

	for ( $i = 1; $i <= 6; $i++ ) {
		$cards_controls[ "ean_home_service_{$i}_title" ]       = array( 'label' => sprintf( __( 'Service Card %d Title', 'estate-aid-network' ), $i ), 'type' => 'text' );
		$cards_controls[ "ean_home_service_{$i}_description" ] = array( 'label' => sprintf( __( 'Service Card %d Description', 'estate-aid-network' ), $i ), 'type' => 'textarea' );
		$cards_controls[ "ean_home_service_{$i}_url" ]         = array( 'label' => sprintf( __( 'Service Card %d URL', 'estate-aid-network' ), $i ), 'type' => 'url' );
	}

	foreach ( $cards_controls as $setting => $config ) {
		ean_customize_add_setting_and_control( $wp_customize, $setting, $config['label'], 'ean_homepage_cards_section', $config['type'] );
	}
}
add_action( 'customize_register', 'ean_customize_register' );

function ean_customize_add_setting_and_control( $wp_customize, $setting, $label, $section, $type ) {
	$wp_customize->add_setting(
		$setting,
		array(
			'default'           => ean_get_theme_value( $setting ),
			'sanitize_callback' => 'ean_customize_sanitize_by_type',
			'type'              => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		$setting,
		array(
			'label'   => $label,
			'section' => $section,
			'type'    => $type,
		)
	);
}

function ean_customize_sanitize_by_type( $value ) {
	if ( is_email( $value ) ) {
		return sanitize_email( $value );
	}

	if ( filter_var( $value, FILTER_VALIDATE_URL ) ) {
		return esc_url_raw( $value );
	}

	return sanitize_textarea_field( $value );
}
