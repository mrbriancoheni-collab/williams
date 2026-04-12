<?php
/**
 * Template Name: Service Areas Page
 * Template Post Type: page
 *
 * @package AquaPro
 */

get_header();

$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$city       = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
$state      = get_theme_mod( 'aquapro_state', 'California' );
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title"><?php _e( 'Pool Cleaning Service Areas', 'aquapro' ); ?></h1>
		<p style="color:rgba(255,255,255,0.7);max-width:580px;margin:12px auto 16px;line-height:1.7;">
			<?php printf( esc_html__( 'Williams Pool Care serves homeowners throughout the Sacramento and Placer County area in %s. Find your city below.', 'aquapro' ), esc_html( $state ) ); ?>
		</p>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="entry-content container-narrow" style="line-height:1.85;color:var(--color-gray-700);margin-bottom:60px;">
				<?php the_content(); ?>
			</div>
		<?php endwhile; endif; ?>

		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php _e( 'Cities We Serve', 'aquapro' ); ?></span>
			<h2 class="section-title"><?php printf( __( 'Pool Cleaning Services<br><span>Near %s</span>', 'aquapro' ), esc_html( $city ) ); ?></h2>
		</div>

		<?php
		$service_areas = array(
			array(
				'city'    => 'Fair Oaks',
				'county'  => 'Sacramento County',
				'desc'    => 'Our home base. We know Fair Oaks pools inside and out — from the older neighborhoods near the river to new construction in the subdivisions.',
				'zip'     => '95628',
			),
			array(
				'city'    => 'Citrus Heights',
				'county'  => 'Sacramento County',
				'desc'    => 'Serving Citrus Heights homeowners with weekly, bi-weekly, and one-time pool cleaning services.',
				'zip'     => '95610',
			),
			array(
				'city'    => 'Orangevale',
				'county'  => 'Sacramento County',
				'desc'    => 'Pool cleaning and maintenance for Orangevale residents. Same-day service often available.',
				'zip'     => '95662',
			),
			array(
				'city'    => 'Folsom',
				'county'  => 'Sacramento County',
				'desc'    => 'Professional pool care throughout Folsom, including Empire Ranch, Willow Creek, and surrounding communities.',
				'zip'     => '95630',
			),
			array(
				'city'    => 'Carmichael',
				'county'  => 'Sacramento County',
				'desc'    => 'Serving Carmichael with expert pool cleaning, chemical balancing, and equipment maintenance.',
				'zip'     => '95608',
			),
			array(
				'city'    => 'Rancho Cordova',
				'county'  => 'Sacramento County',
				'desc'    => 'Pool cleaning and repair services for Rancho Cordova homeowners and HOAs.',
				'zip'     => '95670',
			),
			array(
				'city'    => 'Gold River',
				'county'  => 'Sacramento County',
				'desc'    => 'Serving the Gold River community with reliable, professional pool cleaning service.',
				'zip'     => '95670',
			),
			array(
				'city'    => 'Elk Grove',
				'county'  => 'Sacramento County',
				'desc'    => 'Full-service pool cleaning and maintenance for Elk Grove area homeowners.',
				'zip'     => '95624',
			),
			array(
				'city'    => 'Roseville',
				'county'  => 'Placer County',
				'desc'    => 'Proud to serve Roseville, including newer developments in West Roseville and Junction neighborhoods.',
				'zip'     => '95661',
			),
			array(
				'city'    => 'Rocklin',
				'county'  => 'Placer County',
				'desc'    => 'Pool cleaning services for Rocklin communities including Stanford Ranch and Whitney Oaks.',
				'zip'     => '95765',
			),
			array(
				'city'    => 'Granite Bay',
				'county'  => 'Placer County',
				'desc'    => 'Serving Granite Bay\'s upscale communities with premium pool care service.',
				'zip'     => '95746',
			),
			array(
				'city'    => 'Loomis',
				'county'  => 'Placer County',
				'desc'    => 'Pool cleaning and maintenance for Loomis area properties, including rural pools.',
				'zip'     => '95650',
			),
			array(
				'city'    => 'Penryn',
				'county'  => 'Placer County',
				'desc'    => 'Serving Penryn homeowners with professional pool care and equipment expertise.',
				'zip'     => '95663',
			),
			array(
				'city'    => 'Lincoln',
				'county'  => 'Placer County',
				'desc'    => 'Pool cleaning services for Lincoln communities including Sun City Lincoln Hills.',
				'zip'     => '95648',
			),
			array(
				'city'    => 'Auburn',
				'county'  => 'Placer County',
				'desc'    => 'Serving Auburn and surrounding foothill communities with quality pool care.',
				'zip'     => '95603',
			),
			array(
				'city'    => 'Sacramento',
				'county'  => 'Sacramento County',
				'desc'    => 'Pool cleaning throughout Sacramento, including East Sacramento, Land Park, and surrounding neighborhoods.',
				'zip'     => '95814',
			),
		);
		?>

		<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;">
			<?php foreach ( $service_areas as $area ) :
				$slug = sanitize_title( $area['city'] );
			?>
			<article style="background:var(--color-white);border-radius:var(--radius-lg);padding:28px;box-shadow:var(--shadow-md);border:1px solid var(--color-gray-100);transition:all 0.25s ease;" itemscope itemtype="https://schema.org/Service">
				<div style="display:flex;align-items:flex-start;gap:14px;margin-bottom:16px;">
					<div style="width:44px;height:44px;background:linear-gradient(135deg,var(--color-primary),var(--color-secondary));border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0;" aria-hidden="true">📍</div>
					<div>
						<h2 style="font-size:1.1rem;color:var(--color-dark);margin-bottom:2px;" itemprop="serviceType">
							<?php printf( __( 'Pool Cleaning in %s', 'aquapro' ), esc_html( $area['city'] ) ); ?>
						</h2>
						<span style="font-size:0.75rem;color:var(--color-primary);font-weight:600;background:rgba(0,119,182,0.08);padding:2px 10px;border-radius:var(--radius-full);">
							<?php echo esc_html( $area['county'] ); ?>
						</span>
					</div>
				</div>
				<p style="font-size:0.875rem;color:var(--color-gray-500);line-height:1.7;margin-bottom:16px;" itemprop="description">
					<?php echo esc_html( $area['desc'] ); ?>
				</p>
				<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" style="display:inline-flex;align-items:center;gap:8px;color:var(--color-primary);font-size:0.875rem;font-weight:700;text-decoration:none;">
					<i class="fas fa-phone" aria-hidden="true"></i>
					<?php printf( __( 'Service %s', 'aquapro' ), esc_html( $area['city'] ) ); ?>
				</a>
			</article>
			<?php endforeach; ?>
		</div>

		<div class="text-center" style="margin-top:48px;padding:40px;background:var(--color-white);border-radius:var(--radius-xl);box-shadow:var(--shadow-md);">
			<div style="font-size:2.5rem;margin-bottom:16px;" aria-hidden="true">🗺️</div>
			<h3 style="font-size:1.4rem;color:var(--color-dark);margin-bottom:12px;">
				<?php _e( "Don't See Your City?", 'aquapro' ); ?>
			</h3>
			<p style="color:var(--color-gray-500);max-width:500px;margin:0 auto 24px;line-height:1.7;">
				<?php _e( "We may still be able to serve you! Call us and let's discuss your location. We're always looking to expand our service area.", 'aquapro' ); ?>
			</p>
			<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-primary btn-lg">
				<i class="fas fa-phone" aria-hidden="true"></i>
				<?php printf( __( 'Call %s', 'aquapro' ), esc_html( $phone ) ); ?>
			</a>
		</div>
	</div>
</section>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<?php get_footer(); ?>
