<?php
/**
 * Programmatic creation of all localized service pages.
 * Runs on theme activation. Safe to re-run — skips existing pages.
 *
 * @package AquaPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function aquapro_create_location_pages() {
	$locations = aquapro_get_locations();
	$services  = aquapro_get_services();

	foreach ( $locations as $city_slug => $location ) {
		$city_page_slug = 'pool-service-' . $city_slug;

		// Find or create the city landing page
		$city_page_id = aquapro_find_page_by_slug( $city_page_slug, 0 );

		if ( ! $city_page_id ) {
			$city_page_id = wp_insert_post( array(
				'post_title'   => 'Pool Service in ' . $location['name'],
				'post_name'    => $city_page_slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			) );
		}

		if ( is_wp_error( $city_page_id ) || ! $city_page_id ) {
			continue;
		}

		update_post_meta( $city_page_id, '_wp_page_template', 'template-location.php' );
		update_post_meta( $city_page_id, '_aquapro_location_city', $city_slug );

		// Create each service child page under this city
		foreach ( $services as $service_slug => $service ) {
			$child_id = aquapro_find_page_by_slug( $service_slug, $city_page_id );

			if ( ! $child_id ) {
				$child_id = wp_insert_post( array(
					'post_title'   => $service['name'] . ' in ' . $location['name'],
					'post_name'    => $service_slug,
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_parent'  => $city_page_id,
					'post_content' => '',
				) );
			}

			if ( is_wp_error( $child_id ) || ! $child_id ) {
				continue;
			}

			update_post_meta( $child_id, '_wp_page_template', 'template-location-service.php' );
			update_post_meta( $child_id, '_aquapro_location_city', $city_slug );
			update_post_meta( $child_id, '_aquapro_location_service', $service_slug );
		}
	}

	// Flush rewrite rules so new slugs resolve immediately
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'aquapro_create_location_pages' );

/**
 * Find a page by slug and optional parent ID.
 * Returns post ID or 0.
 */
function aquapro_find_page_by_slug( $slug, $parent_id = 0 ) {
	$args = array(
		'name'           => $slug,
		'post_type'      => 'page',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'post_parent'    => $parent_id,
		'fields'         => 'ids',
	);
	$results = get_posts( $args );
	return ! empty( $results ) ? $results[0] : 0;
}
