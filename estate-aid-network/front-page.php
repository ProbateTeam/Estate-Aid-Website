<?php
/**
 * Front page template.
 *
 * @package EstateAidNetwork
 */

get_header();

$hero_eyebrow            = ean_get_home_field( 'hero_eyebrow' );
$hero_heading            = ean_get_home_field( 'hero_heading' );
$hero_description        = ean_get_home_field( 'hero_description' );
$video_heading           = ean_get_home_field( 'video_heading' );
$video_description       = ean_get_home_field( 'video_description' );
$youtube_url             = ean_get_home_field( 'youtube_url' );
$youtube_channel_url     = ean_get_home_field( 'youtube_channel_url' );
$video_supporting_text   = ean_get_home_field( 'video_supporting_text' );
$testimonial_quote       = ean_get_home_field( 'testimonial_quote' );
$testimonial_attribution = ean_get_home_field( 'testimonial_attribution' );
$cta_primary_url         = ean_get_home_field( 'cta_primary_url' );
$cta_secondary_url       = ean_get_home_field( 'cta_secondary_url' );

$stats = array(
	array(
		'value' => '2,500+',
		'label' => __( 'families served', 'estate-aid-network' ),
	),
	array(
		'value' => '45',
		'label' => __( 'markets nationwide', 'estate-aid-network' ),
	),
	array(
		'value' => '500+',
		'label' => __( 'vetted professionals', 'estate-aid-network' ),
	),
	array(
		'value' => '$0',
		'label' => __( 'cost to families', 'estate-aid-network' ),
	),
);

$service_cards = array(
	array(
		'title'       => __( 'Probate Attorneys', 'estate-aid-network' ),
		'description' => __( 'Experienced estate administration lawyers in your area.', 'estate-aid-network' ),
		'url'         => '#attorneys',
	),
	array(
		'title'       => __( 'Real Estate Services', 'estate-aid-network' ),
		'description' => __( 'Trusted agents and buyers for inherited property transitions.', 'estate-aid-network' ),
		'url'         => '#real-estate',
	),
	array(
		'title'       => __( 'Property Security', 'estate-aid-network' ),
		'description' => __( 'Secure, preserve, and prepare vacant homes with vetted help.', 'estate-aid-network' ),
		'url'         => '#property-security',
	),
	array(
		'title'       => __( 'Estate Sales', 'estate-aid-network' ),
		'description' => __( 'Organize, market, and clear personal property with care.', 'estate-aid-network' ),
		'url'         => '#estate-sales',
	),
	array(
		'title'       => __( 'Financial Services', 'estate-aid-network' ),
		'description' => __( 'Connect with accountants, appraisers, and support partners.', 'estate-aid-network' ),
		'url'         => '#financial-services',
	),
	array(
		'title'       => __( 'View All Services', 'estate-aid-network' ),
		'description' => __( 'See the full network of professionals and support options.', 'estate-aid-network' ),
		'url'         => '#services',
	),
);
?>

<article class="ean-homepage" itemscope itemtype="https://schema.org/Organization">
	<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">

	<section class="ean-section ean-hero" id="top">
		<div class="ean-container ean-container--narrow">
			<?php if ( is_active_sidebar( 'home-hero' ) ) : ?>
				<?php dynamic_sidebar( 'home-hero' ); ?>
			<?php else : ?>
				<p class="ean-eyebrow"><?php echo esc_html( $hero_eyebrow ); ?></p>
				<h1 class="ean-hero__title"><?php echo esc_html( $hero_heading ); ?></h1>
				<p class="ean-hero__description"><?php echo esc_html( $hero_description ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="ean-section ean-video-section" id="resources">
		<div class="ean-container ean-container--narrow">
			<div class="ean-section-heading">
				<h2><?php echo esc_html( $video_heading ); ?></h2>
				<p><?php echo esc_html( $video_description ); ?></p>
			</div>
			<div class="ean-video-frame">
				<iframe src="<?php echo esc_url( $youtube_url ); ?>" title="<?php esc_attr_e( 'Estate Aid Network overview video', 'estate-aid-network' ); ?>" loading="lazy" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</div>
			<div class="ean-video-cta">
				<a class="ean-button ean-button--primary" href="<?php echo esc_url( $youtube_channel_url ); ?>" target="_blank" rel="noreferrer noopener"><?php esc_html_e( 'subscribe to our channel', 'estate-aid-network' ); ?></a>
				<p><?php echo esc_html( $video_supporting_text ); ?></p>
			</div>
		</div>
	</section>

	<section class="ean-section ean-what-we-do" id="services">
		<div class="ean-container">
			<p class="ean-eyebrow"><?php esc_html_e( 'what we do', 'estate-aid-network' ); ?></p>
			<div class="ean-feature-grid">
				<div class="ean-feature-card">
					<div class="ean-feature-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24"><path d="M16 11c1.7 0 3-1.3 3-3S17.7 5 16 5s-3 1.3-3 3 1.3 3 3 3ZM8 11c1.7 0 3-1.3 3-3S9.7 5 8 5 5 6.3 5 8s1.3 3 3 3Zm0 2c-2.7 0-8 1.3-8 4v2h10v-2c0-1.4.7-2.5 1.9-3.4C10.7 13.2 9.2 13 8 13Zm8 0c-.2 0-.5 0-.8.1 1.2.9 1.8 2 1.8 3.4v2H24v-2c0-2.7-5.3-4-8-4Z"></path></svg>
					</div>
					<h3><?php esc_html_e( 'connect you with professionals', 'estate-aid-network' ); ?></h3>
					<p><?php esc_html_e( 'Vetted attorneys, agents, accountants, appraisers, and contractors in your area.', 'estate-aid-network' ); ?></p>
					<a href="#professionals"><?php esc_html_e( 'explore network', 'estate-aid-network' ); ?></a>
				</div>
				<div class="ean-feature-card">
					<div class="ean-feature-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24"><path d="M12 1a11 11 0 1 0 11 11A11 11 0 0 0 12 1Zm1 17.9V20h-2v-1.1a5 5 0 0 1-3.4-2.3l1.7-1.1A3 3 0 0 0 12 17a2 2 0 0 0 0-4 4 4 0 0 1-1-7.9V4h2v1.1a5 5 0 0 1 2.8 1.8L14.3 8A3 3 0 0 0 12 7a2 2 0 0 0 0 4 4 4 0 0 1 1 7.9Z"></path></svg>
					</div>
					<h3><?php esc_html_e( 'provide cash offers', 'estate-aid-network' ); ?></h3>
					<p><?php esc_html_e( 'Need to sell inherited real estate, vehicles, or personal property? We buy or connect you with buyers.', 'estate-aid-network' ); ?></p>
					<a href="#cash-offer"><?php esc_html_e( 'get an offer', 'estate-aid-network' ); ?></a>
				</div>
				<div class="ean-feature-card">
					<div class="ean-feature-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24"><path d="M6 2h9l5 5v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2Zm8 1.5V8h4.5ZM8 13h8v-2H8Zm0 4h8v-2H8Z"></path></svg>
					</div>
					<h3><?php esc_html_e( 'guide you through probate', 'estate-aid-network' ); ?></h3>
					<p><?php esc_html_e( 'From securing property to closing the estate, we provide resources and coordination every step.', 'estate-aid-network' ); ?></p>
					<a href="#resources"><?php esc_html_e( 'view resources', 'estate-aid-network' ); ?></a>
				</div>
			</div>
		</div>
	</section>

	<section class="ean-section ean-stats">
		<div class="ean-container">
			<div class="ean-stats-grid">
				<?php foreach ( $stats as $stat ) : ?>
					<div class="ean-stat">
						<p class="ean-stat__value"><?php echo esc_html( $stat['value'] ); ?></p>
						<p class="ean-stat__label"><?php echo esc_html( $stat['label'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="ean-section ean-testimonial" id="about">
		<div class="ean-container ean-container--narrow">
			<blockquote>
				<p><?php echo esc_html( $testimonial_quote ); ?></p>
			</blockquote>
			<p class="ean-testimonial__attribution"><?php echo esc_html( $testimonial_attribution ); ?></p>
		</div>
	</section>

	<section class="ean-section ean-services-grid-section">
		<div class="ean-container">
			<p class="ean-eyebrow"><?php esc_html_e( 'explore our services', 'estate-aid-network' ); ?></p>
			<div class="ean-services-grid">
				<?php foreach ( $service_cards as $card ) : ?>
					<a class="ean-service-card" href="<?php echo esc_url( $card['url'] ); ?>">
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( $card['description'] ); ?></p>
						<span aria-hidden="true">&rarr;</span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php if ( is_active_sidebar( 'home-flexible' ) ) : ?>
		<section class="ean-section ean-home-flexible">
			<div class="ean-container">
				<?php dynamic_sidebar( 'home-flexible' ); ?>
			</div>
		</section>
	<?php endif; ?>
</article>

<aside class="ean-sticky-cta" aria-label="<?php esc_attr_e( 'Quick actions', 'estate-aid-network' ); ?>">
	<div class="ean-sticky-cta__content">
		<div>
			<p class="ean-sticky-cta__title"><?php esc_html_e( 'ready to get help?', 'estate-aid-network' ); ?></p>
			<p class="ean-sticky-cta__meta"><?php esc_html_e( 'no cost to families - nationwide service', 'estate-aid-network' ); ?></p>
		</div>
		<div class="ean-sticky-cta__actions">
			<a class="ean-button ean-button--primary" href="<?php echo esc_url( $cta_primary_url ); ?>"><?php esc_html_e( 'free resources package', 'estate-aid-network' ); ?></a>
			<a class="ean-button ean-button--accent" href="<?php echo esc_url( $cta_secondary_url ); ?>"><?php esc_html_e( 'get cash offer', 'estate-aid-network' ); ?></a>
		</div>
	</div>
</aside>

<?php
get_footer();
