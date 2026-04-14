<?php
/**
 * Template Name: Services Page
 * Template Post Type: page
 *
 * @package AquaPro
 */

get_header();

$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$city       = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title"><?php _e( 'Pool Cleaning &amp; Maintenance Services', 'aquapro' ); ?></h1>
		<p style="color:rgba(255,255,255,0.7);max-width:580px;margin:12px auto 16px;line-height:1.7;">
			<?php printf( esc_html__( 'Professional pool care services tailored to your needs — serving %s and the greater Sacramento area.', 'aquapro' ), esc_html( $city ) ); ?>
		</p>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<?php
// Query Service CPT
$services_query = new WP_Query( array(
	'post_type'      => 'service',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
) );

if ( $services_query->have_posts() ) : ?>

<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<div class="services-grid">
			<?php while ( $services_query->have_posts() ) : $services_query->the_post();
				$icon     = get_post_meta( get_the_ID(), '_service_icon', true ) ?: '🏊';
				$features = get_post_meta( get_the_ID(), '_service_features', true ) ?: array();
				$price    = get_post_meta( get_the_ID(), '_service_price', true ) ?: '';
			?>
			<article class="service-card" data-reveal>
				<div class="service-icon-wrap" aria-hidden="true"><?php echo esc_html( $icon ); ?></div>
				<h2 class="service-name"><?php the_title(); ?></h2>
				<p class="service-description"><?php the_excerpt(); ?></p>
				<?php if ( ! empty( $features ) ) : ?>
				<ul class="service-features" role="list">
					<?php foreach ( (array) $features as $feat ) : ?>
					<li class="service-feature"><?php echo esc_html( $feat ); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
				<?php if ( $price ) : ?>
				<div class="service-price">
					<span class="service-price-from"><?php _e( 'Starting at', 'aquapro' ); ?></span>
					<span class="service-price-amount"><?php echo esc_html( $price ); ?></span>
				</div>
				<?php endif; ?>
				<a href="<?php the_permalink(); ?>" class="service-link">
					<?php _e( 'Learn More', 'aquapro' ); ?> <i class="fas fa-arrow-right" aria-hidden="true"></i>
				</a>
			</article>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>

<?php else : ?>

<!-- Default services if CPT not populated -->
<section class="services-section section-padding">
	<div class="container">
		<p style="text-align:center;color:var(--color-gray-500);margin-bottom:40px;">
			<?php _e( 'Add services via the WordPress admin under Services.', 'aquapro' ); ?>
		</p>
		<?php
		// Re-use services from front page
		the_content();
		?>
	</div>
</section>

<?php endif; ?>

<!-- Pricing Section -->
<section class="pricing-section section-padding">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge">
				<i class="fas fa-tag" aria-hidden="true"></i>
				<?php _e( 'Transparent Pricing', 'aquapro' ); ?>
			</span>
			<h2 class="section-title">
				<?php _e( 'Simple, Flat-Rate<br><span>Service Plans</span>', 'aquapro' ); ?>
			</h2>
			<p class="section-subtitle">
				<?php _e( 'No hidden fees. No surprise charges. Just honest, reliable pool care at a price that fits your budget. All plans include chemicals and a digital service report.', 'aquapro' ); ?>
			</p>
		</div>

		<div class="pricing-grid">
			<!-- Basic Plan -->
			<div class="pricing-card" data-reveal>
				<div class="pricing-name"><?php _e( 'Bi-Weekly', 'aquapro' ); ?></div>
				<div class="pricing-price">
					<span class="pricing-currency">$</span>
					<span class="pricing-amount"><?php _e( 'Call', 'aquapro' ); ?></span>
				</div>
				<p class="pricing-desc"><?php _e( 'For pools with lighter use or smaller budgets. Service every two weeks.', 'aquapro' ); ?></p>
				<ul class="pricing-features">
					<?php
					$basic_features = array(
						array( true, __( 'Surface skimming', 'aquapro' ) ),
						array( true, __( 'Wall brushing', 'aquapro' ) ),
						array( true, __( 'Chemical testing', 'aquapro' ) ),
						array( true, __( 'Chemical balancing', 'aquapro' ) ),
						array( true, __( 'Basket emptying', 'aquapro' ) ),
						array( true, __( 'Digital service report', 'aquapro' ) ),
						array( false, __( 'Weekly floor vacuuming', 'aquapro' ) ),
						array( false, __( 'Priority scheduling', 'aquapro' ) ),
					);
					foreach ( $basic_features as $f ) : ?>
					<li class="pricing-feature <?php echo $f[0] ? '' : 'unavailable'; ?>">
						<span class="pricing-check"><?php echo $f[0] ? '✓' : '✕'; ?></span>
						<?php echo esc_html( $f[1] ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
				<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-secondary" style="width:100%;justify-content:center;">
					<?php _e( 'Get Quote', 'aquapro' ); ?>
				</a>
			</div>

			<!-- Featured Plan -->
			<div class="pricing-card featured" data-reveal>
				<div class="pricing-badge"><?php _e( '⭐ Most Popular', 'aquapro' ); ?></div>
				<div class="pricing-name"><?php _e( 'Weekly Service', 'aquapro' ); ?></div>
				<div class="pricing-price">
					<span class="pricing-currency">$</span>
					<span class="pricing-amount"><?php _e( 'Call', 'aquapro' ); ?></span>
				</div>
				<p class="pricing-desc"><?php _e( 'Our signature service. Perfect for families who use their pool regularly.', 'aquapro' ); ?></p>
				<ul class="pricing-features">
					<?php
					$featured_features = array(
						__( 'Surface skimming', 'aquapro' ),
						__( 'Wall &amp; step brushing', 'aquapro' ),
						__( 'Floor vacuuming', 'aquapro' ),
						__( 'Full chemical testing', 'aquapro' ),
						__( 'Chemical balancing included', 'aquapro' ),
						__( 'Basket emptying', 'aquapro' ),
						__( 'Equipment inspection', 'aquapro' ),
						__( 'Digital service report', 'aquapro' ),
					);
					foreach ( $featured_features as $f ) : ?>
					<li class="pricing-feature">
						<span class="pricing-check">✓</span>
						<?php echo wp_kses_post( $f ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
				<a href="#quote-form" class="btn btn-white" style="width:100%;justify-content:center;color:var(--color-primary);">
					<?php _e( 'Get Free Quote', 'aquapro' ); ?>
				</a>
			</div>

			<!-- Premium Plan -->
			<div class="pricing-card" data-reveal>
				<div class="pricing-name"><?php _e( 'Full-Service Plan', 'aquapro' ); ?></div>
				<div class="pricing-price">
					<span class="pricing-currency">$</span>
					<span class="pricing-amount"><?php _e( 'Call', 'aquapro' ); ?></span>
				</div>
				<p class="pricing-desc"><?php _e( 'Complete pool care including filter cleanings, minor repairs, and priority service.', 'aquapro' ); ?></p>
				<ul class="pricing-features">
					<?php
					$premium_features = array(
						__( 'Everything in Weekly', 'aquapro' ),
						__( 'Quarterly filter cleaning', 'aquapro' ),
						__( 'Minor equipment repairs', 'aquapro' ),
						__( 'Priority scheduling', 'aquapro' ),
						__( 'Seasonal green pool protection', 'aquapro' ),
						__( 'Annual pool inspection', 'aquapro' ),
						__( 'Direct tech phone line', 'aquapro' ),
						__( 'Photo service reports', 'aquapro' ),
					);
					foreach ( $premium_features as $f ) : ?>
					<li class="pricing-feature">
						<span class="pricing-check">✓</span>
						<?php echo esc_html( $f ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
				<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-primary" style="width:100%;justify-content:center;">
					<?php _e( 'Call for Pricing', 'aquapro' ); ?>
				</a>
			</div>
		</div>

		<div class="text-center" style="margin-top:40px;">
			<p style="color:var(--color-gray-500);font-size:0.9rem;">
				<i class="fas fa-info-circle" aria-hidden="true"></i>
				<?php _e( 'Pricing varies based on pool size, location, and current condition. All quotes are free and no-obligation.', 'aquapro' ); ?>
			</p>
		</div>
	</div>
</section>

<!-- CTA -->
<section class="cta-section section-padding">
	<div class="container">
		<div class="cta-grid">
			<div>
				<h2 class="cta-title"><?php _e( 'Not Sure Which Service You Need?', 'aquapro' ); ?></h2>
				<p class="cta-description">
					<?php _e( "No problem. Call us and we'll assess your pool for free and recommend exactly what you need — nothing more, nothing less.", 'aquapro' ); ?>
				</p>
			</div>
			<div class="cta-actions">
				<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-white btn-lg">
					<i class="fas fa-phone" aria-hidden="true"></i>
					<?php echo esc_html( $phone ); ?>
				</a>
			</div>
		</div>
	</div>
</section>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<?php get_footer(); ?>
