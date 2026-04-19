<?php
/**
 * Site header.
 *
 * @package EstateAidNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'estate-aid-network' ); ?></a>

<header class="ean-site-header" id="site-header">
	<div class="ean-site-header__inner">
		<div class="ean-site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<div class="ean-site-branding__logo"><?php the_custom_logo(); ?></div>
			<?php endif; ?>
			<a class="ean-site-branding__text" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
		</div>

		<button class="ean-nav-toggle" type="button" aria-expanded="false" aria-controls="primary-menu-panel" aria-label="<?php esc_attr_e( 'Toggle menu', 'estate-aid-network' ); ?>">
			<span></span>
			<span></span>
			<span></span>
		</button>

		<div class="ean-nav-panel" id="primary-menu-panel">
			<nav class="ean-primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'estate-aid-network' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'ean-nav__menu',
						'fallback_cb'    => 'ean_fallback_menu',
					)
				);
				?>
			</nav>

			<?php $social_links = ean_get_social_links(); ?>
			<a class="ean-header-social" href="<?php echo esc_url( $social_links['youtube'] ); ?>" target="_blank" rel="noreferrer noopener" aria-label="<?php esc_attr_e( 'Visit our YouTube channel', 'estate-aid-network' ); ?>">
				<svg viewBox="0 0 24 24" aria-hidden="true">
					<path d="M23.5 6.2a3 3 0 0 0-2.1-2.1c-1.9-.5-9.4-.5-9.4-.5s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2C0 8.1 0 12 0 12s0 3.9.5 5.8a3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1c.5-1.9.5-5.8.5-5.8s0-3.9-.5-5.8ZM9.5 15.6V8.4l6.3 3.6-6.3 3.6Z"></path>
				</svg>
			</a>
		</div>
	</div>
</header>

<main id="content" class="ean-site-content">
