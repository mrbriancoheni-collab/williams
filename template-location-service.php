<?php
/**
 * Template Name: Location – Service Page
 * Template Post Type: page
 *
 * Service-in-city page. Reads city + service from post meta.
 *
 * @package AquaPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_template_directory() . '/inc/location-data.php';

$city_slug    = get_post_meta( get_the_ID(), '_aquapro_location_city', true );
$service_slug = get_post_meta( get_the_ID(), '_aquapro_location_service', true );
$location     = $city_slug    ? aquapro_get_location( $city_slug )    : null;
$service      = $service_slug ? aquapro_get_service( $service_slug )  : null;

if ( ! $location || ! $service ) {
	get_header();
	echo '<div class="container" style="padding:120px 0;text-align:center;"><h1>Location service page not configured.</h1></div>';
	get_footer();
	exit;
}

$all_services = aquapro_get_services();
$all_locations = aquapro_get_locations();
$phone       = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link  = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$city_name   = $location['name'];
$svc_name    = $service['name'];

get_header();
?>

<?php
/* ── LOCAL SCHEMA ─────────────────────────────────────────── */
$schema = array(
	'@context'        => 'https://schema.org',
	'@type'           => 'Service',
	'name'            => $svc_name . ' in ' . $city_name,
	'url'             => aquapro_location_service_url( $city_slug, $service_slug ),
	'description'     => $service['description'],
	'provider'        => array(
		'@type'     => 'LocalBusiness',
		'name'      => 'Williams Pool Care',
		'telephone' => '+1' . preg_replace( '/\D/', '', $phone ),
		'email'     => get_theme_mod( 'aquapro_email', 'williamspoolcare@gmail.com' ),
	),
	'areaServed'      => array(
		'@type'           => 'City',
		'name'            => $city_name,
		'address'         => array(
			'@type'           => 'PostalAddress',
			'addressLocality' => $city_name,
			'addressRegion'   => 'CA',
			'postalCode'      => $location['zip'],
			'addressCountry'  => 'US',
		),
	),
);
echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
?>

<!-- ── HERO ──────────────────────────────────────────────────── -->
<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title">
			<?php printf( esc_html__( '%s in %s', 'aquapro' ), esc_html( $svc_name ), esc_html( $city_name ) ); ?>
		</h1>
		<p style="color:rgba(255,255,255,0.8);max-width:600px;margin:12px auto 20px;line-height:1.75;font-size:1.05rem;">
			<?php echo esc_html( $service['short'] ); ?>
		</p>
		<div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-top:8px;">
			<a href="#quote-form" class="btn btn-primary"><?php esc_html_e( 'Get a Free Quote', 'aquapro' ); ?></a>
			<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-white">
				<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
			</a>
		</div>
		<nav aria-label="<?php esc_attr_e( 'Breadcrumb', 'aquapro' ); ?>" style="margin-top:20px;font-size:0.85rem;color:rgba(255,255,255,0.6);">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:rgba(255,255,255,0.6);">Home</a>
			<span style="margin:0 8px;">›</span>
			<a href="<?php echo esc_url( home_url( '/service-areas/' ) ); ?>" style="color:rgba(255,255,255,0.6);"><?php esc_html_e( 'Service Areas', 'aquapro' ); ?></a>
			<span style="margin:0 8px;">›</span>
			<a href="<?php echo esc_url( aquapro_location_url( $city_slug ) ); ?>" style="color:rgba(255,255,255,0.6);"><?php echo esc_html( $city_name ); ?></a>
			<span style="margin:0 8px;">›</span>
			<span style="color:#fff;"><?php echo esc_html( $svc_name ); ?></span>
		</nav>
	</div>
</div>

<!-- ── TRUST BAR ──────────────────────────────────────────────── -->
<div class="trust-bar">
	<div class="container">
		<div class="trust-bar-inner">
			<div class="trust-item"><i class="fas fa-certificate" aria-hidden="true"></i> <?php esc_html_e( 'Licensed & Insured', 'aquapro' ); ?></div>
			<div class="trust-item"><i class="fas fa-history" aria-hidden="true"></i> <?php esc_html_e( '20+ Years Experience', 'aquapro' ); ?></div>
			<div class="trust-item"><i class="fas fa-star" aria-hidden="true"></i> <?php esc_html_e( '5-Star Rated', 'aquapro' ); ?></div>
			<div class="trust-item"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php printf( esc_html__( 'Serving %s', 'aquapro' ), esc_html( $city_name ) ); ?></div>
		</div>
	</div>
</div>

<!-- ── SERVICE DETAIL ─────────────────────────────────────────── -->
<section class="section-padding">
	<div class="container">
		<div class="why-grid" style="align-items:flex-start;gap:60px;">

			<!-- Description + Features -->
			<div>
				<h2 style="color:var(--color-dark);font-size:1.7rem;margin-bottom:16px;">
					<?php printf( esc_html__( 'Professional %s in %s', 'aquapro' ), esc_html( $svc_name ), esc_html( $city_name ) ); ?>
				</h2>
				<p style="color:var(--color-gray-600);line-height:1.85;margin-bottom:28px;font-size:1.05rem;">
					<?php echo esc_html( $service['description'] ); ?>
				</p>
				<h3 style="color:var(--color-dark);font-size:1.1rem;margin-bottom:16px;">
					<?php esc_html_e( "What's Included", 'aquapro' ); ?>
				</h3>
				<ul style="list-style:none;padding:0;margin:0 0 32px;display:flex;flex-direction:column;gap:12px;">
					<?php foreach ( $service['features'] as $feat ) : ?>
					<li style="display:flex;align-items:flex-start;gap:10px;color:var(--color-gray-700);font-size:0.95rem;line-height:1.5;">
						<i class="fas fa-check-circle" style="color:var(--color-primary);margin-top:2px;flex-shrink:0;" aria-hidden="true"></i>
						<?php echo esc_html( $feat ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
				<div style="display:flex;gap:12px;flex-wrap:wrap;">
					<a href="#quote-form" class="btn btn-primary"><?php esc_html_e( 'Request a Free Quote', 'aquapro' ); ?></a>
					<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-outline">
						<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
					</a>
				</div>
			</div>

			<!-- Other services in same city -->
			<div style="background:var(--color-gray-100);border-radius:var(--radius-xl);padding:36px;">
				<h3 style="color:var(--color-dark);font-size:1.1rem;margin-bottom:20px;">
					<i class="fas fa-swimming-pool" style="color:var(--color-primary);margin-right:8px;" aria-hidden="true"></i>
					<?php printf( esc_html__( 'More Services in %s', 'aquapro' ), esc_html( $city_name ) ); ?>
				</h3>
				<ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:10px;">
					<?php foreach ( $all_services as $other_slug => $other_svc ) :
						if ( $other_slug === $service_slug ) continue;
					?>
					<li>
						<a href="<?php echo esc_url( aquapro_location_service_url( $city_slug, $other_slug ) ); ?>"
						   style="display:flex;align-items:center;gap:10px;color:var(--color-primary);text-decoration:none;font-weight:600;font-size:0.95rem;padding:10px 12px;background:var(--color-white);border-radius:var(--radius-sm);border:1px solid var(--color-gray-200);transition:all 0.2s ease;">
							<span aria-hidden="true"><?php echo esc_html( $other_svc['icon'] ); ?></span>
							<?php echo esc_html( $other_svc['name'] ); ?>
							<i class="fas fa-arrow-right" style="margin-left:auto;font-size:0.75rem;" aria-hidden="true"></i>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
				<a href="<?php echo esc_url( aquapro_location_url( $city_slug ) ); ?>"
				   class="btn btn-primary" style="width:100%;justify-content:center;margin-top:20px;font-size:0.9rem;">
					<?php printf( esc_html__( 'All Services in %s', 'aquapro' ), esc_html( $city_name ) ); ?>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- ── SAME SERVICE IN OTHER CITIES ──────────────────────────── -->
<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-map" aria-hidden="true"></i> <?php esc_html_e( 'Other Locations', 'aquapro' ); ?></span>
			<h2 class="section-title">
				<?php printf( esc_html__( '%s Near You', 'aquapro' ), esc_html( $svc_name ) ); ?>
			</h2>
			<p class="section-subtitle">
				<?php printf(
					esc_html__( 'Williams Pool Care provides %s throughout the Sacramento region. Find your city below.', 'aquapro' ),
					esc_html( strtolower( $svc_name ) )
				); ?>
			</p>
		</div>
		<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:14px;margin-top:40px;">
			<?php foreach ( $all_locations as $loc_slug => $loc ) :
				$is_current = ( $loc_slug === $city_slug );
			?>
			<a href="<?php echo esc_url( aquapro_location_service_url( $loc_slug, $service_slug ) ); ?>"
			   style="display:block;background:<?php echo $is_current ? 'var(--color-primary)' : 'var(--color-white)'; ?>;
			          color:<?php echo $is_current ? '#fff' : 'var(--color-dark)'; ?>;
			          border-radius:var(--radius-md);padding:16px 18px;
			          box-shadow:var(--shadow-sm);text-decoration:none;
			          border:2px solid <?php echo $is_current ? 'var(--color-primary)' : 'var(--color-gray-200)'; ?>;
			          transition:all 0.2s ease;font-weight:600;font-size:0.9rem;"
			   <?php if ( $is_current ) : ?>aria-current="page"<?php endif; ?>>
				<i class="fas fa-map-marker-alt" style="margin-right:6px;opacity:0.75;" aria-hidden="true"></i>
				<?php printf( esc_html__( '%s in %s', 'aquapro' ), esc_html( $svc_name ), esc_html( $loc['name'] ) ); ?>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
$aquapro_current_city = $city_slug;
require get_template_directory() . '/inc/service-areas-section.php';
?>

<!-- ── QUOTE FORM ──────────────────────────────────────────────── -->
<section class="section-padding" style="background:linear-gradient(135deg,var(--color-primary-dark),var(--color-primary));" id="quote-form">
	<div class="container">
		<div style="max-width:680px;margin:0 auto;background:var(--color-white);border-radius:var(--radius-xl);padding:48px;box-shadow:var(--shadow-xl);">
			<h2 style="color:var(--color-dark);font-size:1.8rem;margin-bottom:8px;text-align:center;">
				<?php printf( esc_html__( 'Free %s Quote in %s', 'aquapro' ), esc_html( $svc_name ), esc_html( $city_name ) ); ?>
			</h2>
			<p style="color:var(--color-gray-500);text-align:center;margin-bottom:32px;">
				<?php esc_html_e( 'No obligation. Response within 2 business hours.', 'aquapro' ); ?>
			</p>
			<form id="quoteForm" class="quote-form" novalidate>
				<div class="form-row">
					<div class="form-group">
						<label for="svc-name" class="form-label"><?php esc_html_e( 'Your Name', 'aquapro' ); ?> <span aria-hidden="true">*</span></label>
						<input type="text" id="svc-name" name="name" class="form-input" placeholder="<?php esc_attr_e( 'John Smith', 'aquapro' ); ?>" required>
					</div>
					<div class="form-group">
						<label for="svc-phone" class="form-label"><?php esc_html_e( 'Phone Number', 'aquapro' ); ?> <span aria-hidden="true">*</span></label>
						<input type="tel" id="svc-phone" name="phone" class="form-input" placeholder="(916) 555-0100" required>
					</div>
				</div>
				<div class="form-group">
					<label for="svc-email" class="form-label"><?php esc_html_e( 'Email Address', 'aquapro' ); ?> <span aria-hidden="true">*</span></label>
					<input type="email" id="svc-email" name="email" class="form-input" placeholder="john@example.com" required>
				</div>
				<div class="form-row">
					<div class="form-group">
						<label for="svc-service" class="form-label"><?php esc_html_e( 'Service Needed', 'aquapro' ); ?></label>
						<select id="svc-service" name="service" class="form-select">
							<option value=""><?php esc_html_e( 'Select service…', 'aquapro' ); ?></option>
							<?php foreach ( $all_services as $s_slug => $s ) : ?>
							<option value="<?php echo esc_attr( $s['name'] ); ?>"<?php selected( $s_slug, $service_slug ); ?>>
								<?php echo esc_html( $s['name'] ); ?>
							</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="svc-size" class="form-label"><?php esc_html_e( 'Pool Size', 'aquapro' ); ?></label>
						<select id="svc-size" name="pool_size" class="form-select">
							<option value=""><?php esc_html_e( 'Approximate size…', 'aquapro' ); ?></option>
							<option><?php esc_html_e( 'Small (under 10,000 gal)', 'aquapro' ); ?></option>
							<option><?php esc_html_e( 'Medium (10,000–20,000 gal)', 'aquapro' ); ?></option>
							<option><?php esc_html_e( 'Large (20,000–40,000 gal)', 'aquapro' ); ?></option>
							<option><?php esc_html_e( 'Extra Large (40,000+ gal)', 'aquapro' ); ?></option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="svc-address" class="form-label"><?php esc_html_e( 'Property Address', 'aquapro' ); ?></label>
					<input type="text" id="svc-address" name="address" class="form-input" placeholder="<?php printf( esc_attr__( '123 Main St, %s, CA', 'aquapro' ), esc_attr( $city_name ) ); ?>">
				</div>
				<div id="svc-form-status" role="alert" aria-live="polite" style="display:none;"></div>
				<button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:16px;">
					<i class="fas fa-paper-plane" aria-hidden="true"></i>
					<?php esc_html_e( 'Send My Free Quote Request', 'aquapro' ); ?>
				</button>
				<p style="text-align:center;color:var(--color-gray-400);font-size:0.8rem;margin-top:14px;">
					<i class="fas fa-lock" aria-hidden="true"></i>
					<?php esc_html_e( 'Your info is secure. We never share or sell your data.', 'aquapro' ); ?>
				</p>
			</form>
		</div>
	</div>
</section>

<?php get_footer(); ?>
