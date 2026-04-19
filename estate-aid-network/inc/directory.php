<?php
/**
 * Provider directory configuration.
 *
 * @package EstateAidNetwork
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function ean_register_provider_directory() {
	register_post_type(
		'service_provider',
		array(
			'labels'            => array(
				'name'               => __( 'Service Providers', 'estate-aid-network' ),
				'singular_name'      => __( 'Service Provider', 'estate-aid-network' ),
				'add_new_item'       => __( 'Add New Provider', 'estate-aid-network' ),
				'edit_item'          => __( 'Edit Provider', 'estate-aid-network' ),
				'new_item'           => __( 'New Provider', 'estate-aid-network' ),
				'view_item'          => __( 'View Provider', 'estate-aid-network' ),
				'search_items'       => __( 'Search Providers', 'estate-aid-network' ),
				'not_found'          => __( 'No providers found.', 'estate-aid-network' ),
				'not_found_in_trash' => __( 'No providers found in Trash.', 'estate-aid-network' ),
			),
			'public'            => true,
			'show_in_rest'      => true,
			'has_archive'       => true,
			'menu_icon'         => 'dashicons-groups',
			'rewrite'           => array( 'slug' => 'providers' ),
			'supports'          => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
			'menu_position'     => 21,
		)
	);

	$taxonomies = array(
		'provider_service' => array(
			'singular' => __( 'Service Type', 'estate-aid-network' ),
			'plural'   => __( 'Service Types', 'estate-aid-network' ),
			'slug'     => 'provider-service',
		),
		'provider_state'   => array(
			'singular' => __( 'State', 'estate-aid-network' ),
			'plural'   => __( 'States', 'estate-aid-network' ),
			'slug'     => 'provider-state',
		),
		'provider_region'  => array(
			'singular' => __( 'County or City', 'estate-aid-network' ),
			'plural'   => __( 'Counties and Cities', 'estate-aid-network' ),
			'slug'     => 'provider-region',
		),
	);

	foreach ( $taxonomies as $taxonomy => $config ) {
		register_taxonomy(
			$taxonomy,
			array( 'service_provider' ),
			array(
				'labels'       => array(
					'name'          => $config['plural'],
					'singular_name' => $config['singular'],
				),
				'public'       => true,
				'show_in_rest' => true,
				'hierarchical' => true,
				'rewrite'      => array( 'slug' => $config['slug'] ),
			)
		);
	}
}
add_action( 'init', 'ean_register_provider_directory' );

function ean_provider_directory_meta_boxes() {
	add_meta_box(
		'ean-provider-details',
		__( 'Provider Details', 'estate-aid-network' ),
		'ean_render_provider_details_meta_box',
		'service_provider',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'ean_provider_directory_meta_boxes' );

function ean_render_provider_details_meta_box( $post ) {
	wp_nonce_field( 'ean_provider_details', 'ean_provider_details_nonce' );

	$fields = ean_get_provider_meta_fields();
	?>
	<div class="ean-admin-grid">
		<?php foreach ( $fields as $key => $field ) : ?>
			<p>
				<label for="<?php echo esc_attr( $key ); ?>"><strong><?php echo esc_html( $field['label'] ); ?></strong></label><br>
				<?php if ( 'textarea' === $field['type'] ) : ?>
					<textarea id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" rows="4" style="width:100%;"><?php echo esc_textarea( get_post_meta( $post->ID, $key, true ) ); ?></textarea>
				<?php else : ?>
					<input id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" type="<?php echo esc_attr( $field['type'] ); ?>" value="<?php echo esc_attr( get_post_meta( $post->ID, $key, true ) ); ?>" style="width:100%;">
				<?php endif; ?>
			</p>
		<?php endforeach; ?>
	</div>
	<?php
}

function ean_save_provider_details( $post_id ) {
	if ( ! isset( $_POST['ean_provider_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ean_provider_details_nonce'] ) ), 'ean_provider_details' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	foreach ( ean_get_provider_meta_fields() as $key => $field ) {
		if ( ! isset( $_POST[ $key ] ) ) {
			continue;
		}

		$value = wp_unslash( $_POST[ $key ] );

		if ( 'textarea' === $field['type'] ) {
			$value = sanitize_textarea_field( $value );
		} elseif ( 'url' === $field['type'] ) {
			$value = esc_url_raw( $value );
		} elseif ( 'email' === $field['type'] ) {
			$value = sanitize_email( $value );
		} else {
			$value = sanitize_text_field( $value );
		}

		update_post_meta( $post_id, $key, $value );
	}
}
add_action( 'save_post_service_provider', 'ean_save_provider_details' );

function ean_get_provider_meta_fields() {
	return array(
		'ean_provider_company'     => array(
			'label' => __( 'Company Name', 'estate-aid-network' ),
			'type'  => 'text',
		),
		'ean_provider_contact'     => array(
			'label' => __( 'Primary Contact', 'estate-aid-network' ),
			'type'  => 'text',
		),
		'ean_provider_phone'       => array(
			'label' => __( 'Phone', 'estate-aid-network' ),
			'type'  => 'text',
		),
		'ean_provider_email'       => array(
			'label' => __( 'Email', 'estate-aid-network' ),
			'type'  => 'email',
		),
		'ean_provider_website'     => array(
			'label' => __( 'Website', 'estate-aid-network' ),
			'type'  => 'url',
		),
		'ean_provider_address'     => array(
			'label' => __( 'Street Address', 'estate-aid-network' ),
			'type'  => 'text',
		),
		'ean_provider_service_area' => array(
			'label' => __( 'Service Area Notes', 'estate-aid-network' ),
			'type'  => 'textarea',
		),
		'ean_provider_cta_label'   => array(
			'label' => __( 'Profile CTA Label', 'estate-aid-network' ),
			'type'  => 'text',
		),
		'ean_provider_cta_url'     => array(
			'label' => __( 'Profile CTA URL', 'estate-aid-network' ),
			'type'  => 'url',
		),
	);
}

function ean_get_provider_meta( $post_id, $key ) {
	return get_post_meta( $post_id, $key, true );
}

function ean_get_directory_filter_options( $taxonomy ) {
	return get_terms(
		array(
			'taxonomy'   => $taxonomy,
			'hide_empty' => false,
			'orderby'    => 'name',
			'order'      => 'ASC',
		)
	);
}

function ean_get_directory_query_args() {
	$tax_query = array();

	$filters = array(
		'provider_service' => isset( $_GET['service'] ) ? sanitize_title( wp_unslash( $_GET['service'] ) ) : '',
		'provider_state'   => isset( $_GET['state'] ) ? sanitize_title( wp_unslash( $_GET['state'] ) ) : '',
		'provider_region'  => isset( $_GET['region'] ) ? sanitize_title( wp_unslash( $_GET['region'] ) ) : '',
	);

	foreach ( $filters as $taxonomy => $slug ) {
		if ( empty( $slug ) ) {
			continue;
		}

		$tax_query[] = array(
			'taxonomy' => $taxonomy,
			'field'    => 'slug',
			'terms'    => $slug,
		);
	}

	$args = array(
		'post_type'      => 'service_provider',
		'posts_per_page' => 12,
		'orderby'        => 'title',
		'order'          => 'ASC',
	);

	if ( ! empty( $tax_query ) ) {
		$args['tax_query'] = $tax_query;
	}

	return $args;
}

function ean_get_provider_term_list( $post_id, $taxonomy ) {
	$terms = get_the_terms( $post_id, $taxonomy );

	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return '';
	}

	return implode(
		', ',
		wp_list_pluck( $terms, 'name' )
	);
}
