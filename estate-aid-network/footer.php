<?php
/**
 * Site footer.
 *
 * @package EstateAidNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$social_links = ean_get_social_links();
?>
</main>

<footer class="ean-site-footer" id="site-footer">
	<div class="ean-site-footer__inner">
		<div class="ean-footer-grid">
			<div class="ean-footer-column ean-footer-column--about">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php else : ?>
					<h2 class="ean-footer-title"><?php esc_html_e( 'estate aid network', 'estate-aid-network' ); ?></h2>
					<p class="ean-footer-tagline"><?php esc_html_e( 'your estate administration concierge', 'estate-aid-network' ); ?></p>
					<p><?php esc_html_e( 'connecting families with trusted professionals for every stage of probate and estate settlement.', 'estate-aid-network' ); ?></p>
				<?php endif; ?>
			</div>

			<div class="ean-footer-column">
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php else : ?>
					<h2 class="ean-footer-title"><?php esc_html_e( 'Services', 'estate-aid-network' ); ?></h2>
					<?php if ( has_nav_menu( 'footer_services' ) ) : ?>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer_services',
								'container'      => false,
								'menu_class'     => 'ean-footer-links',
								'fallback_cb'    => false,
							)
						);
						?>
					<?php else : ?>
						<ul class="ean-footer-links">
							<li><a href="#professionals"><?php esc_html_e( 'Find Professionals', 'estate-aid-network' ); ?></a></li>
							<li><a href="#attorneys"><?php esc_html_e( 'Find an Attorney', 'estate-aid-network' ); ?></a></li>
							<li><a href="#real-estate"><?php esc_html_e( 'Real Estate Services', 'estate-aid-network' ); ?></a></li>
							<li><a href="#property-security"><?php esc_html_e( 'Property Security', 'estate-aid-network' ); ?></a></li>
							<li><a href="#estate-sales"><?php esc_html_e( 'Estate Sales', 'estate-aid-network' ); ?></a></li>
							<li><a href="#services"><?php esc_html_e( 'View All Services', 'estate-aid-network' ); ?></a></li>
						</ul>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<div class="ean-footer-column">
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				<?php else : ?>
					<h2 class="ean-footer-title"><?php esc_html_e( 'Resources', 'estate-aid-network' ); ?></h2>
					<?php if ( has_nav_menu( 'footer_resources' ) ) : ?>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer_resources',
								'container'      => false,
								'menu_class'     => 'ean-footer-links',
								'fallback_cb'    => false,
							)
						);
						?>
					<?php else : ?>
						<ul class="ean-footer-links">
							<li><a href="#resources"><?php esc_html_e( 'How-To Guides', 'estate-aid-network' ); ?></a></li>
							<li><a href="#court-documents"><?php esc_html_e( 'Court Documents Help', 'estate-aid-network' ); ?></a></li>
							<li><a href="#blog"><?php esc_html_e( 'Blog', 'estate-aid-network' ); ?></a></li>
							<li><a href="#free-resources"><?php esc_html_e( 'Free Resources Package', 'estate-aid-network' ); ?></a></li>
							<li><a href="#about"><?php esc_html_e( 'About Us', 'estate-aid-network' ); ?></a></li>
							<li><a href="#contact"><?php esc_html_e( 'Contact', 'estate-aid-network' ); ?></a></li>
						</ul>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<div class="ean-footer-column ean-footer-column--connect">
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<?php dynamic_sidebar( 'footer-4' ); ?>
				<?php else : ?>
					<h2 class="ean-footer-title"><?php esc_html_e( 'Stay Connected', 'estate-aid-network' ); ?></h2>
					<form class="ean-newsletter-form" action="#" method="post">
						<label class="screen-reader-text" for="ean-newsletter-email"><?php esc_html_e( 'Email address', 'estate-aid-network' ); ?></label>
						<input id="ean-newsletter-email" type="email" name="email" placeholder="<?php esc_attr_e( 'Email address', 'estate-aid-network' ); ?>">
						<button type="submit"><?php esc_html_e( 'Subscribe', 'estate-aid-network' ); ?></button>
					</form>
					<p class="ean-privacy-note"><?php esc_html_e( 'we respect your privacy', 'estate-aid-network' ); ?></p>
					<div class="ean-footer-contact">
						<a href="tel:5551234567">(555) 123-4567</a>
						<a href="mailto:help@estateaid.net">help@estateaid.net</a>
					</div>
				<?php endif; ?>

				<div class="ean-social-links" aria-label="<?php esc_attr_e( 'Social media', 'estate-aid-network' ); ?>">
					<a href="<?php echo esc_url( $social_links['youtube'] ); ?>" target="_blank" rel="noreferrer noopener" aria-label="<?php esc_attr_e( 'YouTube', 'estate-aid-network' ); ?>">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1c-1.9-.5-9.4-.5-9.4-.5s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2C0 8.1 0 12 0 12s0 3.9.5 5.8a3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1c.5-1.9.5-5.8.5-5.8s0-3.9-.5-5.8ZM9.5 15.6V8.4l6.3 3.6-6.3 3.6Z"></path></svg>
					</a>
					<a href="<?php echo esc_url( $social_links['linkedin'] ); ?>" target="_blank" rel="noreferrer noopener" aria-label="<?php esc_attr_e( 'LinkedIn', 'estate-aid-network' ); ?>">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4.98 3.5a2.49 2.49 0 1 0 0 4.99 2.49 2.49 0 0 0 0-4.99ZM3 9h4v12H3zm7 0h3.8v1.7h.1c.5-1 1.8-2 3.8-2 4 0 4.7 2.6 4.7 6V21h-4v-5.3c0-1.3 0-2.8-1.8-2.8s-2 1.3-2 2.7V21h-4z"></path></svg>
					</a>
					<a href="<?php echo esc_url( $social_links['facebook'] ); ?>" target="_blank" rel="noreferrer noopener" aria-label="<?php esc_attr_e( 'Facebook', 'estate-aid-network' ); ?>">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 22v-8.2h2.8l.4-3.2h-3.2V8.5c0-.9.2-1.6 1.6-1.6h1.7V4.1c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.4H7.9v3.2h2.7V22z"></path></svg>
					</a>
				</div>
			</div>
		</div>

		<div class="ean-footer-bottom">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'estate-aid-network' ); ?></p>
			<?php if ( has_nav_menu( 'footer_legal' ) ) : ?>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer_legal',
						'container'      => false,
						'menu_class'     => 'ean-footer-legal',
						'fallback_cb'    => false,
					)
				);
				?>
			<?php else : ?>
				<ul class="ean-footer-legal">
					<li><a href="#privacy-policy"><?php esc_html_e( 'Privacy Policy', 'estate-aid-network' ); ?></a></li>
					<li><a href="#terms-of-service"><?php esc_html_e( 'Terms of Service', 'estate-aid-network' ); ?></a></li>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
