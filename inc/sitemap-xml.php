<?php
/**
 * Dynamic XML Sitemap
 * Served at /sitemap.xml via rewrite rule registered in functions.php
 *
 * @package AquaPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

header( 'Content-Type: application/xml; charset=UTF-8' );
header( 'X-Robots-Tag: noindex, follow' );

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
echo '        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"' . "\n";
echo '        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9' . "\n";
echo '          http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

$today = gmdate( 'Y-m-d' );

// ---- Homepage ----
echo '<url>' . "\n";
echo '  <loc>' . esc_url( home_url( '/' ) ) . '</loc>' . "\n";
echo '  <lastmod>' . $today . '</lastmod>' . "\n";
echo '  <changefreq>daily</changefreq>' . "\n";
echo '  <priority>1.0</priority>' . "\n";
echo '</url>' . "\n";

// ---- Static priority pages ----
$priority_pages = array(
	array( '/services/',         '0.9', 'weekly'  ),
	array( '/local-pool-services/',     '0.9', 'weekly'  ),
	array( '/local-pool-maintenance/',  '0.9', 'weekly'  ),
	array( '/contact/',          '0.8', 'monthly' ),
	array( '/about/',            '0.8', 'monthly' ),
	array( '/service-areas/',    '0.8', 'monthly' ),
	array( '/sitemap/',          '0.5', 'monthly' ),
);

foreach ( $priority_pages as $p ) {
	$post = get_page_by_path( trim( $p[0], '/' ) );
	$mod  = $post ? get_the_modified_date( 'Y-m-d', $post->ID ) : $today;
	echo '<url>' . "\n";
	echo '  <loc>' . esc_url( home_url( $p[0] ) ) . '</loc>' . "\n";
	echo '  <lastmod>' . esc_html( $mod ) . '</lastmod>' . "\n";
	echo '  <changefreq>' . esc_html( $p[2] ) . '</changefreq>' . "\n";
	echo '  <priority>' . esc_html( $p[1] ) . '</priority>' . "\n";
	echo '</url>' . "\n";
}

// ---- WordPress pages (excluding already listed & admin) ----
$listed_slugs = array( 'services', 'local-pool-services', 'local-pool-maintenance', 'contact', 'about', 'service-areas', 'sitemap' );

$pages = get_posts( array(
	'post_type'      => 'page',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
) );

foreach ( $pages as $page ) {
	if ( in_array( $page->post_name, $listed_slugs, true ) ) {
		continue;
	}
	echo '<url>' . "\n";
	echo '  <loc>' . esc_url( get_permalink( $page->ID ) ) . '</loc>' . "\n";
	echo '  <lastmod>' . esc_html( get_the_modified_date( 'Y-m-d', $page->ID ) ) . '</lastmod>' . "\n";
	echo '  <changefreq>monthly</changefreq>' . "\n";
	echo '  <priority>0.6</priority>' . "\n";
	echo '</url>' . "\n";
}

// ---- Service CPT ----
$services = get_posts( array(
	'post_type'      => 'service',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order',
) );

foreach ( $services as $service ) {
	echo '<url>' . "\n";
	echo '  <loc>' . esc_url( get_permalink( $service->ID ) ) . '</loc>' . "\n";
	echo '  <lastmod>' . esc_html( get_the_modified_date( 'Y-m-d', $service->ID ) ) . '</lastmod>' . "\n";
	echo '  <changefreq>monthly</changefreq>' . "\n";
	echo '  <priority>0.8</priority>' . "\n";
	echo '</url>' . "\n";
}

// ---- Location pages (pool-service-{city}) ----
if ( function_exists( 'aquapro_get_locations' ) ) {
	foreach ( array_keys( aquapro_get_locations() ) as $city_slug ) {
		$loc_url = home_url( '/pool-service-' . $city_slug . '/' );
		$loc_page = get_page_by_path( 'pool-service-' . $city_slug );
		$mod = $loc_page ? get_the_modified_date( 'Y-m-d', $loc_page->ID ) : $today;
		echo '<url>' . "\n";
		echo '  <loc>' . esc_url( $loc_url ) . '</loc>' . "\n";
		echo '  <lastmod>' . esc_html( $mod ) . '</lastmod>' . "\n";
		echo '  <changefreq>monthly</changefreq>' . "\n";
		echo '  <priority>0.7</priority>' . "\n";
		echo '</url>' . "\n";
	}
}

// ---- Blog posts ----
$posts = get_posts( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 100,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

foreach ( $posts as $post ) {
	echo '<url>' . "\n";
	echo '  <loc>' . esc_url( get_permalink( $post->ID ) ) . '</loc>' . "\n";
	echo '  <lastmod>' . esc_html( get_the_modified_date( 'Y-m-d', $post->ID ) ) . '</lastmod>' . "\n";
	echo '  <changefreq>weekly</changefreq>' . "\n";
	echo '  <priority>0.6</priority>' . "\n";
	echo '</url>' . "\n";
}

echo '</urlset>' . "\n";
