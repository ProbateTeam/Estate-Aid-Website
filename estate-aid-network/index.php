<?php
/**
 * Main template file.
 *
 * @package EstateAidNetwork
 */

get_header();
?>
<section class="ean-generic-page">
	<div class="ean-container ean-container--narrow">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'ean-entry' ); ?>>
					<header class="ean-entry__header">
						<?php the_title( '<h1 class="ean-entry__title">', '</h1>' ); ?>
					</header>
					<div class="ean-entry__content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No content found yet.', 'estate-aid-network' ); ?></p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
