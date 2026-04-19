<?php
/**
 * Archive for service providers.
 *
 * @package EstateAidNetwork
 */

get_header();
?>
<section class="ean-generic-page ean-directory-page">
	<div class="ean-container">
		<header class="ean-entry__header ean-directory-hero">
			<p class="ean-eyebrow"><?php esc_html_e( 'vetted professionals', 'estate-aid-network' ); ?></p>
			<h1 class="ean-entry__title"><?php esc_html_e( 'Browse the Estate Aid Network directory', 'estate-aid-network' ); ?></h1>
			<p><?php esc_html_e( 'Browse all vetted professionals currently loaded into the Estate Aid Network directory.', 'estate-aid-network' ); ?></p>
		</header>

		<?php if ( have_posts() ) : ?>
			<div class="ean-provider-grid">
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<article <?php post_class( 'ean-provider-card' ); ?>>
						<p class="ean-provider-card__kicker"><?php echo esc_html( ean_get_provider_term_list( get_the_ID(), 'provider_service' ) ); ?></p>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="ean-provider-card__location"><?php echo esc_html( trim( ean_get_provider_term_list( get_the_ID(), 'provider_region' ) . ' | ' . ean_get_provider_term_list( get_the_ID(), 'provider_state' ), ' |' ) ); ?></p>
						<p><?php echo esc_html( get_the_excerpt() ); ?></p>
						<a class="ean-provider-card__link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View professional profile', 'estate-aid-network' ); ?></a>
					</article>
				<?php endwhile; ?>
			</div>
			<div class="ean-directory-pagination">
				<?php the_posts_pagination(); ?>
			</div>
		<?php else : ?>
			<div class="ean-directory-empty">
				<h2><?php esc_html_e( 'Your vetted professionals directory is ready for entries.', 'estate-aid-network' ); ?></h2>
				<p><?php esc_html_e( 'Add your first professional in WordPress and they will appear here automatically.', 'estate-aid-network' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
