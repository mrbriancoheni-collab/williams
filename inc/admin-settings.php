<?php
/**
 * Admin Settings & Dashboard Widget
 *
 * @package AquaPro
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Include meta boxes
require_once get_template_directory() . '/inc/meta-boxes.php';

// ============================================================
// DASHBOARD WIDGET
// ============================================================

function aquapro_dashboard_widget() {
	add_meta_box(
		'aquapro_dashboard_widget',
		__( '🏊 AquaPro Pool Cleaning — Quick Start', 'aquapro' ),
		'aquapro_dashboard_widget_cb',
		'dashboard',
		'normal',
		'high'
	);
}
add_action( 'wp_dashboard_setup', 'aquapro_dashboard_widget' );

function aquapro_dashboard_widget_cb() {
	$phone = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
	?>
	<div style="font-family:sans-serif;">
		<p>Welcome to your <strong>AquaPro Pool Cleaning</strong> website! Here's your quick-start checklist:</p>
		<ul style="padding-left:20px;line-height:2;">
			<li>✅ <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>">Set your phone number, email, and business hours</a> in Customizer → Business Information</li>
			<li>✅ <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=aquapro_seo_local' ) ); ?>">Configure your service areas and SEO settings</a></li>
			<li>✅ <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=service' ) ); ?>">Add your pool cleaning services</a></li>
			<li>✅ <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=testimonial' ) ); ?>">Add customer testimonials</a></li>
			<li>✅ <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=aquapro_analytics' ) ); ?>">Add your Google Analytics 4 ID</a></li>
			<li>✅ <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">Set up your navigation menu</a></li>
			<li>✅ <a href="<?php echo esc_url( admin_url( 'options-reading.php' ) ); ?>">Set the front page to display</a> (Settings → Reading → Static Page)</li>
		</ul>
		<p style="color:#666;font-size:0.875rem;">Current phone: <strong><?php echo esc_html( $phone ); ?></strong></p>
	</div>
	<?php
}

// ============================================================
// ADMIN COLUMNS
// ============================================================

// Service columns
function aquapro_service_columns( $columns ) {
	$columns['service_icon']  = __( 'Icon', 'aquapro' );
	$columns['service_price'] = __( 'Price', 'aquapro' );
	return $columns;
}
add_filter( 'manage_service_posts_columns', 'aquapro_service_columns' );

function aquapro_service_column_content( $column, $post_id ) {
	if ( 'service_icon' === $column ) {
		echo esc_html( get_post_meta( $post_id, '_service_icon', true ) ?: '🏊' );
	}
	if ( 'service_price' === $column ) {
		$price = get_post_meta( $post_id, '_service_price', true );
		echo $price ? esc_html( $price ) : '—';
	}
}
add_action( 'manage_service_posts_custom_column', 'aquapro_service_column_content', 10, 2 );

// Testimonial columns
function aquapro_testimonial_columns( $columns ) {
	$columns['reviewer']  = __( 'Reviewer', 'aquapro' );
	$columns['rating']    = __( 'Rating', 'aquapro' );
	$columns['service_t'] = __( 'Service', 'aquapro' );
	return $columns;
}
add_filter( 'manage_testimonial_posts_columns', 'aquapro_testimonial_columns' );

function aquapro_testimonial_column_content( $column, $post_id ) {
	if ( 'reviewer' === $column ) {
		$name     = get_post_meta( $post_id, '_reviewer_name', true );
		$location = get_post_meta( $post_id, '_reviewer_location', true );
		echo esc_html( $name );
		if ( $location ) echo ' <span style="color:#999;font-size:0.8em;">— ' . esc_html( $location ) . '</span>';
	}
	if ( 'rating' === $column ) {
		$rating = get_post_meta( $post_id, '_rating', true ) ?: 5;
		echo str_repeat( '⭐', intval( $rating ) );
	}
	if ( 'service_t' === $column ) {
		echo esc_html( get_post_meta( $post_id, '_service_type', true ) ?: '—' );
	}
}
add_action( 'manage_testimonial_posts_custom_column', 'aquapro_testimonial_column_content', 10, 2 );

// ============================================================
// ADMIN STYLES
// ============================================================

function aquapro_admin_styles() {
	echo '<style>
		#aquapro_dashboard_widget { border-left: 4px solid #0077B6; }
		.column-service_icon { width: 60px; font-size: 1.5rem; }
		.column-service_price, .column-rating, .column-service_t { width: 120px; }
	</style>';
}
add_action( 'admin_head', 'aquapro_admin_styles' );

// Register customizer preview script
function aquapro_customize_preview_js() {
	wp_enqueue_script(
		'aquapro-customizer-preview',
		get_template_directory_uri() . '/inc/customizer-preview.js',
		array( 'customize-preview' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'aquapro_customize_preview_js' );
