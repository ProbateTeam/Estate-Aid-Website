<?php
/**
 * Page template.
 *
 * @package EstateAidNetwork
 */

get_header();
?>
<section class="ean-generic-page">
	<div class="ean-container ean-container--narrow">
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
	</div>
</section>
<?php
get_footer();
