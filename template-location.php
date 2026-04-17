<?php
/**
 * Template Name: Location – City Page
 * Template Post Type: page
 *
 * City-level landing page. Reads city from _aquapro_location_city post meta.
 *
 * @package AquaPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_template_directory() . '/inc/location-data.php';

$city_slug = get_post_meta( get_the_ID(), '_aquapro_location_city', true );
$location  = $city_slug ? aquapro_get_location( $city_slug ) : null;

// Fallback: attempt to infer city from the page slug
if ( ! $location ) {
	$page_slug = get_post_field( 'post_name', get_the_ID() );
	if ( strpos( $page_slug, 'pool-service-' ) === 0 ) {
		$city_slug = substr( $page_slug, strlen( 'pool-service-' ) );
		$location  = aquapro_get_location( $city_slug );
	}
}

if ( ! $location ) {
	// Bail gracefully
	get_header();
	echo '<div class="container" style="padding:120px 0;text-align:center;"><h1>Location page not configured.</h1></div>';
	get_footer();
	exit;
}

$services   = aquapro_get_services();
$locations  = aquapro_get_locations();
$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$city_name  = $location['name'];

get_header();
?>

<?php
/* ── LOCAL SCHEMA ─────────────────────────────────────────── */
$schema = array(
	'@context'        => 'https://schema.org',
	'@type'           => 'LocalBusiness',
	'name'            => 'Williams Pool Care',
	'@id'             => aquapro_location_url( $city_slug ),
	'url'             => aquapro_location_url( $city_slug ),
	'telephone'       => '+1' . preg_replace( '/\D/', '', $phone ),
	'email'           => get_theme_mod( 'aquapro_email', 'williamspoolcare@gmail.com' ),
	'areaServed'      => array(
		'@type'   => 'City',
		'name'    => $city_name,
		'address' => array(
			'@type'           => 'PostalAddress',
			'addressLocality' => $city_name,
			'addressRegion'   => 'CA',
			'postalCode'      => $location['zip'],
			'addressCountry'  => 'US',
		),
	),
	'hasOfferCatalog' => array(
		'@type'           => 'OfferCatalog',
		'name'            => 'Pool Services in ' . $city_name,
		'itemListElement' => array_values( array_map( function( $slug, $svc ) use ( $city_slug, $city_name ) {
			return array(
				'@type'       => 'Offer',
				'name'        => $svc['name'] . ' in ' . $city_name,
				'url'         => aquapro_location_service_url( $city_slug, $slug ),
			);
		}, array_keys( $services ), $services ) ),
	),
);
echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
?>

<!-- ── HERO ──────────────────────────────────────────────────── -->
<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title">Pool Service in <?php echo esc_html( $city_name ); ?></h1>
		<p style="color:rgba(255,255,255,0.8);max-width:600px;margin:12px auto 20px;line-height:1.75;font-size:1.05rem;">
			<?php echo esc_html( $location['desc'] ); ?> Williams Pool Care has served the Sacramento area for 20+ years.
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
			<span style="color:#fff;"><?php echo esc_html( $city_name ); ?></span>
		</nav>
	</div>
</div>

<!-- ── TRUST BAR ──────────────────────────────────────────────── -->
<div class="trust-bar">
	<div class="container">
		<div class="trust-bar-inner">
			<div class="trust-item"><i class="fas fa-certificate" aria-hidden="true"></i> <?php esc_html_e( 'Licensed & Insured', 'aquapro' ); ?></div>
			<div class="trust-item"><i class="fas fa-history" aria-hidden="true"></i> <?php esc_html_e( '20+ Years Experience', 'aquapro' ); ?></div>
			<div class="trust-item"><i class="fas fa-star" aria-hidden="true"></i> <?php esc_html_e( '5-Star Google & Yelp Rated', 'aquapro' ); ?></div>
			<div class="trust-item"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php printf( esc_html__( 'Serving %s', 'aquapro' ), esc_html( $city_name ) ); ?></div>
			<div class="trust-item"><i class="fas fa-calendar-check" aria-hidden="true"></i> <?php esc_html_e( 'Same-Week Service Available', 'aquapro' ); ?></div>
		</div>
	</div>
</div>

<!-- ── SERVICES GRID ──────────────────────────────────────────── -->
<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-swimming-pool" aria-hidden="true"></i> <?php esc_html_e( 'Our Services', 'aquapro' ); ?></span>
			<h2 class="section-title">
				<?php printf( esc_html__( 'Pool Services Available in %s', 'aquapro' ), esc_html( $city_name ) ); ?>
			</h2>
			<p class="section-subtitle">
				<?php printf(
					esc_html__( 'From routine weekly cleaning to equipment installation, Williams Pool Care covers every aspect of pool ownership in %s.', 'aquapro' ),
					esc_html( $city_name )
				); ?>
			</p>
		</div>

		<div class="services-grid">
			<?php foreach ( $services as $svc_slug => $svc ) :
				$svc_url = aquapro_location_service_url( $city_slug, $svc_slug );
			?>
			<article class="service-card" data-reveal>
				<div class="service-icon-wrap" aria-hidden="true"><?php echo esc_html( $svc['icon'] ); ?></div>
				<h2 class="service-name"><?php echo esc_html( $svc['name'] ); ?></h2>
				<p class="service-description"><?php echo esc_html( $svc['short'] ); ?></p>
				<ul class="service-features" role="list">
					<?php foreach ( array_slice( $svc['features'], 0, 3 ) as $feat ) : ?>
					<li class="service-feature"><?php echo esc_html( $feat ); ?></li>
					<?php endforeach; ?>
				</ul>
				<a href="<?php echo esc_url( $svc_url ); ?>" class="service-link">
					<?php printf( esc_html__( '%s in %s', 'aquapro' ), esc_html( $svc['name'] ), esc_html( $city_name ) ); ?>
					<i class="fas fa-arrow-right" aria-hidden="true"></i>
				</a>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ── LOCAL CONTENT ──────────────────────────────────────────── -->
<section class="section-padding">
	<div class="container">
		<div class="why-grid" style="align-items:center;gap:60px;">
			<div>
				<span class="section-badge"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo esc_html( $city_name ); ?></span>
				<h2 class="section-title" style="text-align:left;">
					<?php printf( esc_html__( 'Trusted Pool Cleaners in %s', 'aquapro' ), esc_html( $city_name ) ); ?>
				</h2>
				<p style="color:var(--color-gray-600);line-height:1.8;margin-bottom:20px;">
					<?php printf(
						esc_html__( 'Williams Pool Care has been keeping pools clean and healthy across %s and the greater Sacramento area for over 20 years. We know the local water, climate, and conditions that affect your pool.', 'aquapro' ),
						esc_html( $city_name )
					); ?>
				</p>
				<p style="color:var(--color-gray-600);line-height:1.8;margin-bottom:28px;">
					<?php printf(
						esc_html__( 'Neighborhoods we serve in %s include %s. Call or request a quote online and our team will reach out within 2 business hours.', 'aquapro' ),
						esc_html( $city_name ),
						esc_html( $location['neighborhoods'] )
					); ?>
				</p>
				<div style="display:flex;gap:12px;flex-wrap:wrap;">
					<a href="#quote-form" class="btn btn-primary"><?php esc_html_e( 'Request Free Quote', 'aquapro' ); ?></a>
					<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-outline">
						<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
					</a>
				</div>
			</div>
			<div>
				<div style="background:var(--color-gray-100);border-radius:var(--radius-xl);padding:40px;">
					<h3 style="color:var(--color-dark);font-size:1.2rem;margin-bottom:20px;">
						<i class="fas fa-check-circle" style="color:var(--color-primary);margin-right:8px;" aria-hidden="true"></i>
						<?php printf( esc_html__( 'Why %s Homeowners Choose Us', 'aquapro' ), esc_html( $city_name ) ); ?>
					</h3>
					<ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:14px;">
						<?php
						$reasons = array(
							__( 'Same technician every visit — we learn your pool', 'aquapro' ),
							__( 'Detailed service reports after every visit', 'aquapro' ),
							__( 'No long-term contracts — cancel any time', 'aquapro' ),
							__( 'Licensed, insured, and background-checked technicians', 'aquapro' ),
							__( 'Equipment issues caught early, saving you money', 'aquapro' ),
							__( 'Responsive communication — real humans answer', 'aquapro' ),
						);
						foreach ( $reasons as $reason ) : ?>
						<li style="display:flex;align-items:flex-start;gap:10px;color:var(--color-gray-700);font-size:0.95rem;line-height:1.5;">
							<i class="fas fa-check" style="color:var(--color-primary);margin-top:3px;flex-shrink:0;" aria-hidden="true"></i>
							<?php echo esc_html( $reason ); ?>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ── QUOTE FORM ──────────────────────────────────────────────── -->
<?php
// Pull in the front page quote form section by including front-page partial
// Use the same AJAX form defined in front-page.php
?>
<section class="section-padding" style="background:linear-gradient(135deg,var(--color-primary-dark),var(--color-primary));" id="quote-form">
	<div class="container">
		<div style="max-width:680px;margin:0 auto;background:var(--color-white);border-radius:var(--radius-xl);padding:48px;box-shadow:var(--shadow-xl);">
			<h2 style="color:var(--color-dark);font-size:1.8rem;margin-bottom:8px;text-align:center;">
				<?php printf( esc_html__( 'Free Quote for %s', 'aquapro' ), esc_html( $city_name ) ); ?>
			</h2>
			<p style="color:var(--color-gray-500);text-align:center;margin-bottom:32px;">
				<?php esc_html_e( 'No obligation. Response within 2 business hours.', 'aquapro' ); ?>
			</p>
			<form id="quoteForm" class="quote-form" novalidate>
				<div class="form-row">
					<div class="form-group">
						<label for="loc-name" class="form-label"><?php esc_html_e( 'Your Name', 'aquapro' ); ?> <span aria-hidden="true">*</span></label>
						<input type="text" id="loc-name" name="name" class="form-input" placeholder="<?php esc_attr_e( 'John Smith', 'aquapro' ); ?>" required>
					</div>
					<div class="form-group">
						<label for="loc-phone" class="form-label"><?php esc_html_e( 'Phone Number', 'aquapro' ); ?> <span aria-hidden="true">*</span></label>
						<input type="tel" id="loc-phone" name="phone" class="form-input" placeholder="(916) 555-0100" required>
					</div>
				</div>
				<div class="form-group">
					<label for="loc-email" class="form-label"><?php esc_html_e( 'Email Address', 'aquapro' ); ?> <span aria-hidden="true">*</span></label>
					<input type="email" id="loc-email" name="email" class="form-input" placeholder="john@example.com" required>
				</div>
				<div class="form-row">
					<div class="form-group">
						<label for="loc-service" class="form-label"><?php esc_html_e( 'Service Needed', 'aquapro' ); ?></label>
						<select id="loc-service" name="service" class="form-select">
							<option value=""><?php esc_html_e( 'Select service…', 'aquapro' ); ?></option>
							<?php foreach ( $services as $svc_slug => $svc ) : ?>
							<option value="<?php echo esc_attr( $svc['name'] ); ?>"><?php echo esc_html( $svc['name'] ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="loc-size" class="form-label"><?php esc_html_e( 'Pool Size', 'aquapro' ); ?></label>
						<select id="loc-size" name="pool_size" class="form-select">
							<option value=""><?php esc_html_e( 'Approximate size…', 'aquapro' ); ?></option>
							<option><?php esc_html_e( 'Small (under 10,000 gal)', 'aquapro' ); ?></option>
							<option><?php esc_html_e( 'Medium (10,000–20,000 gal)', 'aquapro' ); ?></option>
							<option><?php esc_html_e( 'Large (20,000–40,000 gal)', 'aquapro' ); ?></option>
							<option><?php esc_html_e( 'Extra Large (40,000+ gal)', 'aquapro' ); ?></option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="loc-address" class="form-label"><?php esc_html_e( 'Property Address', 'aquapro' ); ?></label>
					<input type="text" id="loc-address" name="address" class="form-input" placeholder="<?php printf( esc_attr__( '123 Main St, %s, CA', 'aquapro' ), esc_attr( $city_name ) ); ?>">
				</div>
				<div id="loc-form-status" role="alert" aria-live="polite" style="display:none;"></div>
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

<?php
$aquapro_current_city = $city_slug;
require get_template_directory() . '/inc/service-areas-section.php';
?>

<?php get_footer(); ?>
