<?php
/**
 * Theme bootstrap for Estate Aid Network.
 *
 * @package EstateAidNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'EAN_THEME_VERSION', '1.0.0' );
define( 'EAN_THEME_DIR', get_template_directory() );
define( 'EAN_THEME_URI', get_template_directory_uri() );

require_once EAN_THEME_DIR . '/inc/customizer.php';
require_once EAN_THEME_DIR . '/inc/directory.php';

function ean_theme_setup() {
	load_theme_textdomain( 'estate-aid-network', EAN_THEME_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array( 'height' => 80, 'width' => 240, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f9fbf7',
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'estate-aid-network' ),
			'footer_services' => __( 'Footer Services Menu', 'estate-aid-network' ),
			'footer_resources' => __( 'Footer Resources Menu', 'estate-aid-network' ),
			'footer_legal' => __( 'Footer Legal Menu', 'estate-aid-network' ),
		)
	);
}
add_action( 'after_setup_theme', 'ean_theme_setup' );

function ean_enqueue_assets() {
	wp_enqueue_style(
		'ean-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'ean-theme-style', get_stylesheet_uri(), array(), EAN_THEME_VERSION );
	wp_enqueue_style( 'ean-main-style', EAN_THEME_URI . '/assets/css/main.css', array( 'ean-theme-style', 'ean-fonts' ), EAN_THEME_VERSION );

	wp_enqueue_script( 'ean-navigation', EAN_THEME_URI . '/assets/js/navigation.js', array(), EAN_THEME_VERSION, true );
	wp_enqueue_script( 'ean-home', EAN_THEME_URI . '/assets/js/home.js', array(), EAN_THEME_VERSION, true );

	wp_localize_script(
		'ean-navigation',
		'eanNavigation',
		array(
			'mobileBreakpoint' => 768,
			'expandText'       => __( 'Expand submenu', 'estate-aid-network' ),
			'collapseText'     => __( 'Collapse submenu', 'estate-aid-network' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'ean_enqueue_assets' );

function ean_register_sidebars() {
	$sidebars = array(
		'footer-1'      => __( 'Footer Column 1', 'estate-aid-network' ),
		'footer-2'      => __( 'Footer Column 2', 'estate-aid-network' ),
		'footer-3'      => __( 'Footer Column 3', 'estate-aid-network' ),
		'footer-4'      => __( 'Footer Column 4', 'estate-aid-network' ),
		'home-hero'     => __( 'Homepage Hero Area', 'estate-aid-network' ),
		'home-flexible' => __( 'Homepage Flexible Content', 'estate-aid-network' ),
	);

	foreach ( $sidebars as $id => $name ) {
		register_sidebar(
			array(
				'name'          => $name,
				'id'            => $id,
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
}
add_action( 'widgets_init', 'ean_register_sidebars' );

function ean_body_classes( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'ean-front-page';
	}

	return $classes;
}
add_filter( 'body_class', 'ean_body_classes' );

function ean_menu_item_classes( $classes, $item, $args, $depth ) {
	if ( 'primary' === $args->theme_location ) {
		$classes[] = 'ean-nav__item';

		if ( in_array( 'menu-item-has-children', $classes, true ) ) {
			$classes[] = 'ean-nav__item--has-children';
		}
	}

	if ( 0 === $depth && 'primary' === $args->theme_location && in_array( 'current-menu-item', $classes, true ) ) {
		$classes[] = 'ean-nav__item--active';
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'ean_menu_item_classes', 10, 4 );

function ean_menu_link_attributes( $atts, $item, $args, $depth ) {
	if ( 'primary' === $args->theme_location ) {
		$atts['class'] = isset( $atts['class'] ) ? $atts['class'] . ' ean-nav__link' : 'ean-nav__link';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'ean_menu_link_attributes', 10, 4 );

function ean_add_submenu_toggles( $item_output, $item, $depth, $args ) {
	if ( 'primary' !== $args->theme_location || 0 !== $depth || ! in_array( 'menu-item-has-children', $item->classes, true ) ) {
		return $item_output;
	}

	$toggle = sprintf(
		'<button class="ean-submenu-toggle" type="button" aria-expanded="false" aria-label="%1$s"><span class="screen-reader-text">%1$s</span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9l6 6 6-6"></path></svg></button>',
		esc_attr__( 'Toggle submenu', 'estate-aid-network' )
	);

	return $item_output . $toggle;
}
add_filter( 'walker_nav_menu_start_el', 'ean_add_submenu_toggles', 10, 4 );

function ean_fallback_menu() {
	?>
	<ul class="ean-nav__menu">
		<li class="ean-nav__item"><a class="ean-nav__link" href="#services"><?php esc_html_e( 'Services', 'estate-aid-network' ); ?></a></li>
		<li class="ean-nav__item"><a class="ean-nav__link" href="#resources"><?php esc_html_e( 'Resources', 'estate-aid-network' ); ?></a></li>
		<li class="ean-nav__item"><a class="ean-nav__link" href="#about"><?php esc_html_e( 'About', 'estate-aid-network' ); ?></a></li>
	</ul>
	<?php
}

function ean_get_social_links() {
	return array(
		'youtube'  => ean_get_theme_value( 'ean_social_youtube' ),
		'linkedin' => ean_get_theme_value( 'ean_social_linkedin' ),
		'facebook' => ean_get_theme_value( 'ean_social_facebook' ),
	);
}

function ean_get_theme_defaults() {
	return array(
		'ean_social_youtube'               => 'https://youtube.com',
		'ean_social_linkedin'              => '#',
		'ean_social_facebook'              => '#',
		'ean_contact_phone'                => '(555) 123-4567',
		'ean_contact_phone_link'           => '5551234567',
		'ean_contact_email'                => 'help@estateaid.net',
		'ean_newsletter_privacy'           => __( 'we respect your privacy', 'estate-aid-network' ),
		'ean_footer_about_title'           => __( 'estate aid network', 'estate-aid-network' ),
		'ean_footer_tagline'               => __( 'your estate administration concierge', 'estate-aid-network' ),
		'ean_footer_description'           => __( 'connecting families with trusted professionals for every stage of probate and estate settlement.', 'estate-aid-network' ),
		'ean_home_hero_eyebrow'            => __( 'your estate administration concierge', 'estate-aid-network' ),
		'ean_home_hero_heading'            => __( 'we handle it, or connect you with those who can.', 'estate-aid-network' ),
		'ean_home_hero_description'        => __( "navigating probate requires coordinating attorneys, real estate professionals, accountants, contractors, and more. we're your single point of contact for everything.", 'estate-aid-network' ),
		'ean_home_video_heading'           => __( 'how estate aid network works', 'estate-aid-network' ),
		'ean_home_video_description'       => __( 'watch this 3-minute overview to understand our concierge approach to estate administration.', 'estate-aid-network' ),
		'ean_home_youtube_url'             => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
		'ean_home_youtube_channel_url'     => 'https://youtube.com',
		'ean_home_video_button_text'       => __( 'subscribe to our channel', 'estate-aid-network' ),
		'ean_home_video_supporting_text'   => __( 'new guides every week on probate, estate sales, and property management', 'estate-aid-network' ),
		'ean_home_features_eyebrow'        => __( 'what we do', 'estate-aid-network' ),
		'ean_home_feature_1_title'         => __( 'connect you with professionals', 'estate-aid-network' ),
		'ean_home_feature_1_description'   => __( 'Vetted attorneys, agents, accountants, appraisers, and contractors in your area.', 'estate-aid-network' ),
		'ean_home_feature_1_link_text'     => __( 'explore network', 'estate-aid-network' ),
		'ean_home_feature_1_link_url'      => '#professionals',
		'ean_home_feature_2_title'         => __( 'provide cash offers', 'estate-aid-network' ),
		'ean_home_feature_2_description'   => __( 'Need to sell inherited real estate, vehicles, or personal property? We buy or connect you with buyers.', 'estate-aid-network' ),
		'ean_home_feature_2_link_text'     => __( 'get an offer', 'estate-aid-network' ),
		'ean_home_feature_2_link_url'      => '#cash-offer',
		'ean_home_feature_3_title'         => __( 'guide you through probate', 'estate-aid-network' ),
		'ean_home_feature_3_description'   => __( 'From securing property to closing the estate, we provide resources and coordination every step.', 'estate-aid-network' ),
		'ean_home_feature_3_link_text'     => __( 'view resources', 'estate-aid-network' ),
		'ean_home_feature_3_link_url'      => '#resources',
		'ean_home_stat_1_value'            => '2,500+',
		'ean_home_stat_1_label'            => __( 'families served', 'estate-aid-network' ),
		'ean_home_stat_2_value'            => '45',
		'ean_home_stat_2_label'            => __( 'markets nationwide', 'estate-aid-network' ),
		'ean_home_stat_3_value'            => '500+',
		'ean_home_stat_3_label'            => __( 'vetted professionals', 'estate-aid-network' ),
		'ean_home_stat_4_value'            => '$0',
		'ean_home_stat_4_label'            => __( 'cost to families', 'estate-aid-network' ),
		'ean_home_testimonial_quote'       => __( '"estate aid network made the impossible feel manageable. they connected me with an attorney, handled the estate sale, and even got us a cash offer on the property. one call, everything handled."', 'estate-aid-network' ),
		'ean_home_testimonial_attribution' => __( 'sarah m., denver, co', 'estate-aid-network' ),
		'ean_home_services_eyebrow'        => __( 'explore our services', 'estate-aid-network' ),
		'ean_home_service_1_title'         => __( 'Probate Attorneys', 'estate-aid-network' ),
		'ean_home_service_1_description'   => __( 'Experienced estate administration lawyers in your area.', 'estate-aid-network' ),
		'ean_home_service_1_url'           => '#attorneys',
		'ean_home_service_2_title'         => __( 'Real Estate Services', 'estate-aid-network' ),
		'ean_home_service_2_description'   => __( 'Trusted agents and buyers for inherited property transitions.', 'estate-aid-network' ),
		'ean_home_service_2_url'           => '#real-estate',
		'ean_home_service_3_title'         => __( 'Property Security', 'estate-aid-network' ),
		'ean_home_service_3_description'   => __( 'Secure, preserve, and prepare vacant homes with vetted help.', 'estate-aid-network' ),
		'ean_home_service_3_url'           => '#property-security',
		'ean_home_service_4_title'         => __( 'Estate Sales', 'estate-aid-network' ),
		'ean_home_service_4_description'   => __( 'Organize, market, and clear personal property with care.', 'estate-aid-network' ),
		'ean_home_service_4_url'           => '#estate-sales',
		'ean_home_service_5_title'         => __( 'Financial Services', 'estate-aid-network' ),
		'ean_home_service_5_description'   => __( 'Connect with accountants, appraisers, and support partners.', 'estate-aid-network' ),
		'ean_home_service_5_url'           => '#financial-services',
		'ean_home_service_6_title'         => __( 'View All Services', 'estate-aid-network' ),
		'ean_home_service_6_description'   => __( 'See the full network of professionals and support options.', 'estate-aid-network' ),
		'ean_home_service_6_url'           => '#services',
		'ean_home_cta_title'               => __( 'ready to get help?', 'estate-aid-network' ),
		'ean_home_cta_meta'                => __( 'no cost to families - nationwide service', 'estate-aid-network' ),
		'ean_home_cta_primary_text'        => __( 'free resources package', 'estate-aid-network' ),
		'ean_home_cta_primary_url'         => '#resources',
		'ean_home_cta_secondary_text'      => __( 'get cash offer', 'estate-aid-network' ),
		'ean_home_cta_secondary_url'       => '#cash-offer',
	);
}

function ean_get_theme_value( $key ) {
	$defaults = ean_get_theme_defaults();
	return get_theme_mod( $key, $defaults[ $key ] ?? '' );
}

function ean_get_home_field( $key ) {
	$mapped_keys = array(
		'hero_eyebrow'            => 'ean_home_hero_eyebrow',
		'hero_heading'            => 'ean_home_hero_heading',
		'hero_description'        => 'ean_home_hero_description',
		'video_heading'           => 'ean_home_video_heading',
		'video_description'       => 'ean_home_video_description',
		'youtube_url'             => 'ean_home_youtube_url',
		'youtube_channel_url'     => 'ean_home_youtube_channel_url',
		'video_button_text'       => 'ean_home_video_button_text',
		'video_supporting_text'   => 'ean_home_video_supporting_text',
		'features_eyebrow'        => 'ean_home_features_eyebrow',
		'testimonial_quote'       => 'ean_home_testimonial_quote',
		'testimonial_attribution' => 'ean_home_testimonial_attribution',
		'services_eyebrow'        => 'ean_home_services_eyebrow',
		'cta_title'               => 'ean_home_cta_title',
		'cta_meta'                => 'ean_home_cta_meta',
		'cta_primary_text'        => 'ean_home_cta_primary_text',
		'cta_primary_url'         => 'ean_home_cta_primary_url',
		'cta_secondary_text'      => 'ean_home_cta_secondary_text',
		'cta_secondary_url'       => 'ean_home_cta_secondary_url',
	);

	$theme_key = $mapped_keys[ $key ] ?? $key;

	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $key );

		if ( ! empty( $value ) ) {
			return $value;
		}
	}

	return ean_get_theme_value( $theme_key );
}

function ean_get_home_features() {
	return array(
		array(
			'title'       => ean_get_theme_value( 'ean_home_feature_1_title' ),
			'description' => ean_get_theme_value( 'ean_home_feature_1_description' ),
			'link_text'   => ean_get_theme_value( 'ean_home_feature_1_link_text' ),
			'link_url'    => ean_get_theme_value( 'ean_home_feature_1_link_url' ),
		),
		array(
			'title'       => ean_get_theme_value( 'ean_home_feature_2_title' ),
			'description' => ean_get_theme_value( 'ean_home_feature_2_description' ),
			'link_text'   => ean_get_theme_value( 'ean_home_feature_2_link_text' ),
			'link_url'    => ean_get_theme_value( 'ean_home_feature_2_link_url' ),
		),
		array(
			'title'       => ean_get_theme_value( 'ean_home_feature_3_title' ),
			'description' => ean_get_theme_value( 'ean_home_feature_3_description' ),
			'link_text'   => ean_get_theme_value( 'ean_home_feature_3_link_text' ),
			'link_url'    => ean_get_theme_value( 'ean_home_feature_3_link_url' ),
		),
	);
}

function ean_get_home_stats() {
	return array(
		array(
			'value' => ean_get_theme_value( 'ean_home_stat_1_value' ),
			'label' => ean_get_theme_value( 'ean_home_stat_1_label' ),
		),
		array(
			'value' => ean_get_theme_value( 'ean_home_stat_2_value' ),
			'label' => ean_get_theme_value( 'ean_home_stat_2_label' ),
		),
		array(
			'value' => ean_get_theme_value( 'ean_home_stat_3_value' ),
			'label' => ean_get_theme_value( 'ean_home_stat_3_label' ),
		),
		array(
			'value' => ean_get_theme_value( 'ean_home_stat_4_value' ),
			'label' => ean_get_theme_value( 'ean_home_stat_4_label' ),
		),
	);
}

function ean_get_home_service_cards() {
	return array(
		array(
			'title'       => ean_get_theme_value( 'ean_home_service_1_title' ),
			'description' => ean_get_theme_value( 'ean_home_service_1_description' ),
			'url'         => ean_get_theme_value( 'ean_home_service_1_url' ),
		),
		array(
			'title'       => ean_get_theme_value( 'ean_home_service_2_title' ),
			'description' => ean_get_theme_value( 'ean_home_service_2_description' ),
			'url'         => ean_get_theme_value( 'ean_home_service_2_url' ),
		),
		array(
			'title'       => ean_get_theme_value( 'ean_home_service_3_title' ),
			'description' => ean_get_theme_value( 'ean_home_service_3_description' ),
			'url'         => ean_get_theme_value( 'ean_home_service_3_url' ),
		),
		array(
			'title'       => ean_get_theme_value( 'ean_home_service_4_title' ),
			'description' => ean_get_theme_value( 'ean_home_service_4_description' ),
			'url'         => ean_get_theme_value( 'ean_home_service_4_url' ),
		),
		array(
			'title'       => ean_get_theme_value( 'ean_home_service_5_title' ),
			'description' => ean_get_theme_value( 'ean_home_service_5_description' ),
			'url'         => ean_get_theme_value( 'ean_home_service_5_url' ),
		),
		array(
			'title'       => ean_get_theme_value( 'ean_home_service_6_title' ),
			'description' => ean_get_theme_value( 'ean_home_service_6_description' ),
			'url'         => ean_get_theme_value( 'ean_home_service_6_url' ),
		),
	);
}
