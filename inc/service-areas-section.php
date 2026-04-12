<?php
/**
 * Reusable Service Areas Grid Section
 *
 * Displays all service location cards linking to their primary location pages.
 * Optionally highlights the current city.
 *
 * Usage:
 *   // Plain (no highlight)
 *   require get_template_directory() . '/inc/service-areas-section.php';
 *
 *   // With current city highlighted
 *   $aquapro_current_city = 'fair-oaks'; // set before require
 *   require get_template_directory() . '/inc/service-areas-section.php';
 *
 * @package AquaPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$_locations     = aquapro_get_locations();
$_current_city  = isset( $aquapro_current_city ) ? $aquapro_current_city : '';
?>

<section class="service-areas-section section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-map" aria-hidden="true"></i> <?php esc_html_e( 'Service Areas', 'aquapro' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Pool Service Across the Sacramento Region', 'aquapro' ); ?></h2>
			<p class="section-subtitle">
				<?php esc_html_e( 'Williams Pool Care serves homeowners throughout Sacramento and Placer Counties. Click your city to see available services.', 'aquapro' ); ?>
			</p>
		</div>

		<div class="service-areas-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:16px;margin-top:40px;">
			<?php foreach ( $_locations as $loc_slug => $loc ) :
				$is_current = ( $loc_slug === $_current_city );
			?>
			<a href="<?php echo esc_url( aquapro_location_url( $loc_slug ) ); ?>"
			   class="service-area-card<?php echo $is_current ? ' service-area-card--active' : ''; ?>"
			   style="display:block;background:<?php echo $is_current ? 'var(--color-primary)' : 'var(--color-white)'; ?>;
			          color:<?php echo $is_current ? '#fff' : 'var(--color-dark)'; ?>;
			          border-radius:var(--radius-md);padding:18px 20px;
			          box-shadow:var(--shadow-sm);text-decoration:none;
			          border:2px solid <?php echo $is_current ? 'var(--color-primary)' : 'var(--color-gray-200)'; ?>;
			          transition:all 0.2s ease;font-weight:600;font-size:0.95rem;"
			   <?php if ( $is_current ) : ?>aria-current="page"<?php endif; ?>>
				<i class="fas fa-map-marker-alt" style="margin-right:8px;opacity:0.75;" aria-hidden="true"></i>
				<?php echo esc_html( $loc['name'] ); ?>
				<span style="display:block;font-size:0.75rem;font-weight:400;opacity:0.7;margin-top:2px;">
					<?php echo esc_html( $loc['county'] ); ?>
				</span>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
