<?php
/**
 * Single provider template.
 *
 * @package EstateAidNetwork
 */

get_header();
?>
<section class="ean-generic-page ean-provider-profile-page">
	<div class="ean-container ean-container--narrow">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php
			$company_name  = ean_get_provider_meta( get_the_ID(), 'ean_provider_company' );
			$contact_name  = ean_get_provider_meta( get_the_ID(), 'ean_provider_contact' );
			$phone         = ean_get_provider_meta( get_the_ID(), 'ean_provider_phone' );
			$email         = ean_get_provider_meta( get_the_ID(), 'ean_provider_email' );
			$website       = ean_get_provider_meta( get_the_ID(), 'ean_provider_website' );
			$address       = ean_get_provider_meta( get_the_ID(), 'ean_provider_address' );
			$service_area  = ean_get_provider_meta( get_the_ID(), 'ean_provider_service_area' );
			$cta_label     = ean_get_provider_meta( get_the_ID(), 'ean_provider_cta_label' );
			$cta_url       = ean_get_provider_meta( get_the_ID(), 'ean_provider_cta_url' );
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'ean-provider-profile' ); ?>>
				<header class="ean-provider-profile__hero">
					<p class="ean-provider-card__kicker"><?php echo esc_html( ean_get_provider_term_list( get_the_ID(), 'provider_service' ) ); ?></p>
					<?php the_title( '<h1 class="ean-entry__title">', '</h1>' ); ?>
					<p class="ean-provider-card__location"><?php echo esc_html( trim( ean_get_provider_term_list( get_the_ID(), 'provider_region' ) . ' | ' . ean_get_provider_term_list( get_the_ID(), 'provider_state' ), ' |' ) ); ?></p>
					<p class="ean-provider-profile__summary"><?php echo esc_html( get_the_excerpt() ); ?></p>
				</header>

				<div class="ean-provider-profile__layout">
					<div class="ean-provider-profile__main">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="ean-provider-profile__image"><?php the_post_thumbnail( 'large' ); ?></div>
						<?php endif; ?>
						<div class="ean-entry__content">
							<?php the_content(); ?>
						</div>
					</div>

					<aside class="ean-provider-profile__sidebar">
						<div class="ean-provider-detail-card">
							<h2><?php esc_html_e( 'Provider Details', 'estate-aid-network' ); ?></h2>
							<ul class="ean-provider-detail-list">
								<?php if ( $company_name ) : ?><li><strong><?php esc_html_e( 'Company', 'estate-aid-network' ); ?></strong><span><?php echo esc_html( $company_name ); ?></span></li><?php endif; ?>
								<?php if ( $contact_name ) : ?><li><strong><?php esc_html_e( 'Contact', 'estate-aid-network' ); ?></strong><span><?php echo esc_html( $contact_name ); ?></span></li><?php endif; ?>
								<?php if ( $phone ) : ?><li><strong><?php esc_html_e( 'Phone', 'estate-aid-network' ); ?></strong><span><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></span></li><?php endif; ?>
								<?php if ( $email ) : ?><li><strong><?php esc_html_e( 'Email', 'estate-aid-network' ); ?></strong><span><a href="mailto:<?php echo esc_attr( sanitize_email( $email ) ); ?>"><?php echo esc_html( $email ); ?></a></span></li><?php endif; ?>
								<?php if ( $website ) : ?><li><strong><?php esc_html_e( 'Website', 'estate-aid-network' ); ?></strong><span><a href="<?php echo esc_url( $website ); ?>" target="_blank" rel="noreferrer noopener"><?php echo esc_html( $website ); ?></a></span></li><?php endif; ?>
								<?php if ( $address ) : ?><li><strong><?php esc_html_e( 'Address', 'estate-aid-network' ); ?></strong><span><?php echo esc_html( $address ); ?></span></li><?php endif; ?>
							</ul>
						</div>

						<?php if ( $service_area ) : ?>
							<div class="ean-provider-detail-card">
								<h2><?php esc_html_e( 'Service Area Notes', 'estate-aid-network' ); ?></h2>
								<p><?php echo esc_html( $service_area ); ?></p>
							</div>
						<?php endif; ?>

						<div class="ean-provider-detail-card">
							<h2><?php esc_html_e( 'Quick Actions', 'estate-aid-network' ); ?></h2>
							<a class="ean-button ean-button--primary" href="<?php echo esc_url( $cta_url ? $cta_url : '#contact' ); ?>"><?php echo esc_html( $cta_label ? $cta_label : __( 'Contact this provider', 'estate-aid-network' ) ); ?></a>
							<a class="ean-provider-back-link" href="<?php echo esc_url( get_post_type_archive_link( 'service_provider' ) ); ?>"><?php esc_html_e( 'Back to directory', 'estate-aid-network' ); ?></a>
						</div>
					</aside>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</section>
<?php
get_footer();
