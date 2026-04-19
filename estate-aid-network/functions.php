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
		'youtube'  => get_theme_mod( 'ean_social_youtube', 'https://youtube.com' ),
		'linkedin' => get_theme_mod( 'ean_social_linkedin', '#' ),
		'facebook' => get_theme_mod( 'ean_social_facebook', '#' ),
	);
}

function ean_get_home_defaults() {
	return array(
		'hero_eyebrow'            => __( 'your estate administration concierge', 'estate-aid-network' ),
		'hero_heading'            => __( 'we handle it, or connect you with those who can.', 'estate-aid-network' ),
		'hero_description'        => __( "navigating probate requires coordinating attorneys, real estate professionals, accountants, contractors, and more. we're your single point of contact for everything.", 'estate-aid-network' ),
		'video_heading'           => __( 'how estate aid network works', 'estate-aid-network' ),
		'video_description'       => __( 'watch this 3-minute overview to understand our concierge approach to estate administration.', 'estate-aid-network' ),
		'youtube_url'             => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
		'youtube_channel_url'     => 'https://youtube.com',
		'video_supporting_text'   => __( 'new guides every week on probate, estate sales, and property management', 'estate-aid-network' ),
		'testimonial_quote'       => __( '"estate aid network made the impossible feel manageable. they connected me with an attorney, handled the estate sale, and even got us a cash offer on the property. one call, everything handled."', 'estate-aid-network' ),
		'testimonial_attribution' => __( 'sarah m., denver, co', 'estate-aid-network' ),
		'cta_primary_url'         => '#resources',
		'cta_secondary_url'       => '#cash-offer',
	);
}

function ean_get_home_field( $key ) {
	$defaults = ean_get_home_defaults();

	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $key );

		if ( ! empty( $value ) ) {
			return $value;
		}
	}

	return $defaults[ $key ] ?? '';
}
