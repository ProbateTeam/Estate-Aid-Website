<?php
/**
 * Template Name: Provider Directory
 * Template Post Type: page
 *
 * @package EstateAidNetwork
 */

get_header();

$services = ean_get_directory_filter_options( 'provider_service' );
$states   = ean_get_directory_filter_options( 'provider_state' );
$regions  = ean_get_directory_filter_options( 'provider_region' );
$query    = new WP_Query( ean_get_directory_query_args() );
?>
<section class="ean-generic-page ean-directory-page">
	<div class="ean-container">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'ean-entry' ); ?>>
				<header class="ean-entry__header ean-directory-hero">
					<?php the_title( '<p class="ean-eyebrow">', '</p>' ); ?>
					<h1 class="ean-entry__title"><?php esc_html_e( 'Explore vetted professionals by service and location', 'estate-aid-network' ); ?></h1>
					<div class="ean-entry__content">
						<?php the_content(); ?>
					</div>
				</header>

				<div class="ean-directory-steps">
					<div class="ean-directory-step">
						<span>1</span>
						<h2><?php esc_html_e( 'Choose a type of vetted help', 'estate-aid-network' ); ?></h2>
						<p><?php esc_html_e( 'Start broad with all vetted professionals, or narrow into a specific type of support.', 'estate-aid-network' ); ?></p>
					</div>
					<div class="ean-directory-step">
						<span>2</span>
						<h2><?php esc_html_e( 'Pick a state and county or city', 'estate-aid-network' ); ?></h2>
						<p><?php esc_html_e( 'Guide families to the area they need without forcing a map experience first.', 'estate-aid-network' ); ?></p>
					</div>
					<div class="ean-directory-step">
						<span>3</span>
						<h2><?php esc_html_e( 'Review matching professionals', 'estate-aid-network' ); ?></h2>
						<p><?php esc_html_e( 'Each result links to a templated profile page we can expand as your network grows.', 'estate-aid-network' ); ?></p>
					</div>
				</div>

				<form class="ean-directory-filters" method="get" action="<?php echo esc_url( get_permalink() ); ?>">
					<div class="ean-directory-field">
						<label for="ean-service-filter"><?php esc_html_e( 'Service', 'estate-aid-network' ); ?></label>
						<select id="ean-service-filter" name="service">
							<option value=""><?php esc_html_e( 'All vetted service types', 'estate-aid-network' ); ?></option>
							<?php foreach ( $services as $service ) : ?>
								<option value="<?php echo esc_attr( $service->slug ); ?>" <?php selected( isset( $_GET['service'] ) ? sanitize_title( wp_unslash( $_GET['service'] ) ) : '', $service->slug ); ?>><?php echo esc_html( $service->name ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="ean-directory-field">
						<label for="ean-state-filter"><?php esc_html_e( 'State', 'estate-aid-network' ); ?></label>
						<select id="ean-state-filter" name="state">
							<option value=""><?php esc_html_e( 'All states', 'estate-aid-network' ); ?></option>
							<?php foreach ( $states as $state ) : ?>
								<option value="<?php echo esc_attr( $state->slug ); ?>" <?php selected( isset( $_GET['state'] ) ? sanitize_title( wp_unslash( $_GET['state'] ) ) : '', $state->slug ); ?>><?php echo esc_html( $state->name ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="ean-directory-field">
						<label for="ean-region-filter"><?php esc_html_e( 'County or City', 'estate-aid-network' ); ?></label>
						<select id="ean-region-filter" name="region">
							<option value=""><?php esc_html_e( 'All counties and cities', 'estate-aid-network' ); ?></option>
							<?php foreach ( $regions as $region ) : ?>
								<option value="<?php echo esc_attr( $region->slug ); ?>" <?php selected( isset( $_GET['region'] ) ? sanitize_title( wp_unslash( $_GET['region'] ) ) : '', $region->slug ); ?>><?php echo esc_html( $region->name ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="ean-directory-actions">
						<button class="ean-button ean-button--primary" type="submit"><?php esc_html_e( 'Show professionals', 'estate-aid-network' ); ?></button>
						<a class="ean-directory-reset" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Reset filters', 'estate-aid-network' ); ?></a>
					</div>
				</form>

				<div class="ean-directory-results">
					<div class="ean-directory-results__header">
						<h2><?php esc_html_e( 'Matching vetted professionals', 'estate-aid-network' ); ?></h2>
						<p><?php echo esc_html( sprintf( _n( '%d professional found', '%d professionals found', (int) $query->found_posts, 'estate-aid-network' ), (int) $query->found_posts ) ); ?></p>
					</div>

					<?php if ( $query->have_posts() ) : ?>
						<div class="ean-provider-grid">
							<?php while ( $query->have_posts() ) : ?>
								<?php $query->the_post(); ?>
								<article <?php post_class( 'ean-provider-card' ); ?>>
									<p class="ean-provider-card__kicker"><?php echo esc_html( ean_get_provider_term_list( get_the_ID(), 'provider_service' ) ); ?></p>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p class="ean-provider-card__location"><?php echo esc_html( trim( ean_get_provider_term_list( get_the_ID(), 'provider_region' ) . ' | ' . ean_get_provider_term_list( get_the_ID(), 'provider_state' ), ' |' ) ); ?></p>
									<p><?php echo esc_html( get_the_excerpt() ); ?></p>
									<a class="ean-provider-card__link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View professional profile', 'estate-aid-network' ); ?></a>
								</article>
							<?php endwhile; ?>
						</div>
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<div class="ean-directory-empty">
							<h3><?php esc_html_e( 'No vetted professionals match those filters yet.', 'estate-aid-network' ); ?></h3>
							<p><?php esc_html_e( 'That is okay for now. We can launch the structure first and fill in professionals as your network grows.', 'estate-aid-network' ); ?></p>
						</div>
					<?php endif; ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
</section>
<?php
get_footer();
