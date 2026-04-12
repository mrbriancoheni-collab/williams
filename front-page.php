<?php
/**
 * Front Page Template
 *
 * @package AquaPro
 */

get_header();

$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$city       = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
$state      = get_theme_mod( 'aquapro_state', 'California' );
$years_exp  = get_theme_mod( 'aquapro_years_exp', '20+' );
$pools      = get_theme_mod( 'aquapro_pools_cleaned', '5,000+' );
$reviews    = get_theme_mod( 'aquapro_reviews', '500+' );
?>

<!-- =============================================
     HERO SECTION
     ============================================= -->
<section class="hero-section" aria-labelledby="hero-title">
	<div class="hero-background" aria-hidden="true">
		<?php
		$hero_id = get_theme_mod( 'aquapro_hero_image', '' );
		if ( $hero_id ) :
			echo wp_get_attachment_image( $hero_id, 'aquapro-hero', false, array( 'class' => 'hero-bg-image', 'alt' => '' ) );
		else : ?>
			<div class="hero-bg-image" style="background:linear-gradient(135deg,#0D1B2A,#005F92,#0096C7);width:100%;height:100%;"></div>
		<?php endif; ?>
		<div class="hero-bg-gradient"></div>
	</div>

	<!-- Wave bottom -->
	<div class="hero-wave" aria-hidden="true">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60" preserveAspectRatio="none">
			<path fill="#ffffff" fill-opacity="1" d="M0,40L48,36.7C96,33,192,27,288,28C384,29,480,37,576,38.3C672,39,768,33,864,29.3C960,25,1056,23,1152,26.7C1248,31,1344,39,1392,43L1440,47L1440,60L1392,60C1344,60,1248,60,1152,60C1056,60,960,60,864,60C768,60,672,60,576,60C480,60,384,60,288,60C192,60,96,60,48,60L0,60Z"></path>
		</svg>
	</div>

	<div class="container hero-content">
		<div class="hero-grid">

			<!-- Left: Headline + Stats -->
			<div class="hero-left">
				<div class="hero-badge">
					<i class="fas fa-star" aria-hidden="true"></i>
					<?php echo esc_html( get_theme_mod( 'aquapro_hero_badge', sprintf( '#1 Pool Service in %s', $city ) ) ); ?>
				</div>

				<h1 class="hero-title" id="hero-title">
					<?php
					$title = get_theme_mod( 'aquapro_hero_title', 'Crystal Clear Pools.<br>Every Visit.<br><span class="highlight">Guaranteed.</span>' );
					echo wp_kses_post( $title );
					?>
				</h1>

				<p class="hero-description">
					<?php echo esc_html( get_theme_mod(
						'aquapro_hero_subtitle',
						sprintf( 'Professional pool cleaning, water chemistry balancing, and equipment repair — trusted by homeowners across %s, %s and surrounding Sacramento communities for over 20 years.', $city, $state )
					) ); ?>
				</p>

				<div class="hero-actions">
					<a href="#quote-form" class="btn btn-primary btn-lg">
						<i class="fas fa-clipboard-list" aria-hidden="true"></i>
						<?php _e( 'Get Free Quote', 'aquapro' ); ?>
					</a>
					<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-white btn-lg">
						<i class="fas fa-phone" aria-hidden="true"></i>
						<?php echo esc_html( $phone ); ?>
					</a>
				</div>

				<div class="hero-stats" aria-label="<?php esc_attr_e( 'Business statistics', 'aquapro' ); ?>">
					<div class="hero-stat">
						<span class="hero-stat-number"><?php echo esc_html( $years_exp ); ?><span></span></span>
						<span class="hero-stat-label"><?php _e( 'Years Experience', 'aquapro' ); ?></span>
					</div>
					<div class="hero-stat" style="border-left:1px solid rgba(255,255,255,0.15);padding-left:32px;">
						<span class="hero-stat-number"><?php echo esc_html( $pools ); ?><span></span></span>
						<span class="hero-stat-label"><?php _e( 'Pools Serviced', 'aquapro' ); ?></span>
					</div>
					<div class="hero-stat" style="border-left:1px solid rgba(255,255,255,0.15);padding-left:32px;">
						<span class="hero-stat-number"><?php echo esc_html( $reviews ); ?><span></span></span>
						<span class="hero-stat-label"><?php _e( '5-Star Reviews', 'aquapro' ); ?></span>
					</div>
				</div>
			</div>

			<!-- Right: Quote Form -->
			<div class="hero-right">
				<div class="hero-form-card" id="quote-form">
					<h2 class="hero-form-title"><?php _e( 'Get Your Free Quote', 'aquapro' ); ?></h2>
					<p class="hero-form-subtitle">
						<?php _e( 'No obligation. Response within', 'aquapro' ); ?>
						<strong><?php _e( '2 business hours.', 'aquapro' ); ?></strong>
					</p>

					<form id="quoteForm" class="quote-form" novalidate aria-label="<?php esc_attr_e( 'Free quote request form', 'aquapro' ); ?>">
						<?php wp_nonce_field( 'aquapro_nonce', 'quote_nonce' ); ?>

						<div class="form-row">
							<div class="form-group">
								<label for="quote_name"><?php _e( 'Your Name *', 'aquapro' ); ?></label>
								<input type="text" id="quote_name" name="name" class="form-control"
									placeholder="<?php esc_attr_e( 'John Smith', 'aquapro' ); ?>"
									required autocomplete="name">
							</div>
							<div class="form-group">
								<label for="quote_phone"><?php _e( 'Phone Number *', 'aquapro' ); ?></label>
								<input type="tel" id="quote_phone" name="phone" class="form-control"
									placeholder="<?php esc_attr_e( '(916) 555-0100', 'aquapro' ); ?>"
									required autocomplete="tel">
							</div>
						</div>

						<div class="form-group">
							<label for="quote_email"><?php _e( 'Email Address *', 'aquapro' ); ?></label>
							<input type="email" id="quote_email" name="email" class="form-control"
								placeholder="<?php esc_attr_e( 'john@example.com', 'aquapro' ); ?>"
								required autocomplete="email">
						</div>

						<div class="form-row">
							<div class="form-group">
								<label for="quote_service"><?php _e( 'Service Needed', 'aquapro' ); ?></label>
								<select id="quote_service" name="service" class="form-control">
									<option value=""><?php _e( 'Select service...', 'aquapro' ); ?></option>
									<option value="weekly"><?php _e( 'Weekly Cleaning', 'aquapro' ); ?></option>
									<option value="biweekly"><?php _e( 'Bi-Weekly Cleaning', 'aquapro' ); ?></option>
									<option value="chemical"><?php _e( 'Chemical Balancing', 'aquapro' ); ?></option>
									<option value="green-pool"><?php _e( 'Green Pool Treatment', 'aquapro' ); ?></option>
									<option value="equipment"><?php _e( 'Equipment Repair', 'aquapro' ); ?></option>
									<option value="startup"><?php _e( 'New Pool Start-Up', 'aquapro' ); ?></option>
									<option value="filter"><?php _e( 'Filter Cleaning', 'aquapro' ); ?></option>
									<option value="other"><?php _e( 'Other / Not Sure', 'aquapro' ); ?></option>
								</select>
							</div>
							<div class="form-group">
								<label for="quote_pool_size"><?php _e( 'Pool Size', 'aquapro' ); ?></label>
								<select id="quote_pool_size" name="pool_size" class="form-control">
									<option value=""><?php _e( 'Approximate size...', 'aquapro' ); ?></option>
									<option value="small"><?php _e( 'Small (< 10,000 gal)', 'aquapro' ); ?></option>
									<option value="medium"><?php _e( 'Medium (10–20k gal)', 'aquapro' ); ?></option>
									<option value="large"><?php _e( 'Large (20–40k gal)', 'aquapro' ); ?></option>
									<option value="xlarge"><?php _e( 'Extra Large (40k+)', 'aquapro' ); ?></option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="quote_address"><?php _e( 'Property Address', 'aquapro' ); ?></label>
							<input type="text" id="quote_address" name="address" class="form-control"
								placeholder="<?php esc_attr_e( '123 Main St, Fair Oaks, CA', 'aquapro' ); ?>"
								autocomplete="street-address">
						</div>

						<div id="quoteFormMsg" role="alert" aria-live="polite" style="display:none;"></div>

						<button type="submit" class="btn btn-primary form-submit-btn" id="quoteSubmitBtn">
							<i class="fas fa-paper-plane" aria-hidden="true"></i>
							<?php _e( 'Send My Free Quote Request', 'aquapro' ); ?>
						</button>

						<p class="form-trust">
							<i class="fas fa-lock" aria-hidden="true"></i>
							<?php _e( 'Your info is secure. We never share or sell your data.', 'aquapro' ); ?>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- =============================================
     TRUST BAR
     ============================================= -->
<section class="trust-bar" aria-label="<?php esc_attr_e( 'Trust indicators', 'aquapro' ); ?>">
	<div class="container">
		<div class="trust-bar-inner">
			<div class="trust-item">
				<div class="trust-icon" aria-hidden="true"><i class="fas fa-certificate"></i></div>
				<span><?php _e( 'Licensed &amp; Insured', 'aquapro' ); ?></span>
			</div>
			<div class="trust-item">
				<div class="trust-icon" aria-hidden="true"><i class="fas fa-medal"></i></div>
				<span><?php _e( '20+ Years Experience', 'aquapro' ); ?></span>
			</div>
			<div class="trust-item">
				<div class="trust-icon" aria-hidden="true"><i class="fas fa-star"></i></div>
				<span><?php _e( '5-Star Google &amp; Yelp Rated', 'aquapro' ); ?></span>
			</div>
			<div class="trust-item">
				<div class="trust-icon" aria-hidden="true"><i class="fas fa-thumbs-up"></i></div>
				<span><?php _e( 'Satisfaction Guaranteed', 'aquapro' ); ?></span>
			</div>
			<div class="trust-item">
				<div class="trust-icon" aria-hidden="true"><i class="fas fa-clock"></i></div>
				<span><?php _e( 'Same-Week Service Available', 'aquapro' ); ?></span>
			</div>
			<div class="trust-item">
				<div class="trust-icon" aria-hidden="true"><i class="fas fa-file-invoice-dollar"></i></div>
				<span><?php _e( 'Free Estimates', 'aquapro' ); ?></span>
			</div>
		</div>
	</div>
</section>

<!-- =============================================
     SERVICES SECTION
     ============================================= -->
<section class="services-section section-padding" id="services" aria-labelledby="services-title">
	<div class="container">
		<div class="section-header center" data-reveal>
			<span class="section-badge">
				<i class="fas fa-water" aria-hidden="true"></i>
				<?php _e( 'What We Do', 'aquapro' ); ?>
			</span>
			<h2 class="section-title" id="services-title">
				<?php printf( __( 'Complete Pool Care<br><span>Services in %s</span>', 'aquapro' ), esc_html( $city ) ); ?>
			</h2>
			<p class="section-subtitle">
				<?php _e( 'From routine weekly maintenance to emergency green pool recovery, our certified technicians handle everything — so your pool is always ready when you are.', 'aquapro' ); ?>
			</p>
		</div>

		<div class="services-grid">

			<?php
			$services = array(
				array(
					'icon'    => '🧹',
					'name'    => __( 'Weekly Pool Cleaning', 'aquapro' ),
					'desc'    => __( 'Our most popular service. We visit your pool every week to skim, brush, vacuum, and test chemicals — keeping your pool pristine 52 weeks a year.', 'aquapro' ),
					'features'=> array(
						__( 'Surface skimming & debris removal', 'aquapro' ),
						__( 'Wall & step brushing', 'aquapro' ),
						__( 'Pool floor vacuuming', 'aquapro' ),
						__( 'Basket emptying', 'aquapro' ),
						__( 'Chemical testing & balancing', 'aquapro' ),
						__( 'Digital service report emailed', 'aquapro' ),
					),
					'link'    => home_url( '/services/weekly-pool-cleaning/' ),
				),
				array(
					'icon'    => '🧪',
					'name'    => __( 'Chemical Balancing', 'aquapro' ),
					'desc'    => __( 'Improper water chemistry is the #1 cause of pool damage and swimmer health issues. We test and precisely adjust pH, chlorine, alkalinity, and calcium hardness.', 'aquapro' ),
					'features'=> array(
						__( 'Full 6-point water analysis', 'aquapro' ),
						__( 'pH, chlorine & alkalinity balance', 'aquapro' ),
						__( 'Calcium hardness adjustment', 'aquapro' ),
						__( 'Cyanuric acid stabilizer check', 'aquapro' ),
						__( 'Safe & swimmer-ready certification', 'aquapro' ),
					),
					'link'    => home_url( '/services/chemical-balancing/' ),
				),
				array(
					'icon'    => '🔧',
					'name'    => __( 'Equipment Repair', 'aquapro' ),
					'desc'    => __( 'Pool pump not running? Filter pressure too high? Our experienced technicians diagnose and repair all major pool equipment brands quickly and affordably.', 'aquapro' ),
					'features'=> array(
						__( 'Pool pump repair & replacement', 'aquapro' ),
						__( 'Filter repair & media replacement', 'aquapro' ),
						__( 'Heater diagnostics & repair', 'aquapro' ),
						__( 'Automatic cleaner service', 'aquapro' ),
						__( 'Plumbing & valve repairs', 'aquapro' ),
					),
					'link'    => home_url( '/services/equipment-repair/' ),
				),
				array(
					'icon'    => '🌿',
					'name'    => __( 'Green Pool Treatment', 'aquapro' ),
					'desc'    => __( "Algae taking over? We'll have your pool back to sparkling blue within 24–72 hours. Our proven shock treatment and algaecide protocol is fast and effective.", 'aquapro' ),
					'features'=> array(
						__( 'Algae assessment & treatment plan', 'aquapro' ),
						__( 'Shock treatment application', 'aquapro' ),
						__( 'Multi-phase algaecide treatment', 'aquapro' ),
						__( 'Brush & vacuum service', 'aquapro' ),
						__( 'Follow-up inspection included', 'aquapro' ),
					),
					'link'    => home_url( '/services/green-pool-treatment/' ),
				),
				array(
					'icon'    => '🏊',
					'name'    => __( 'New Pool Start-Up', 'aquapro' ),
					'desc'    => __( "Just installed a new pool or opening after winter? We'll properly establish your water chemistry from scratch so your pool starts off on the right foot.", 'aquapro' ),
					'features'=> array(
						__( 'Startup chemical package', 'aquapro' ),
						__( 'Plaster cure treatment', 'aquapro' ),
						__( 'Equipment startup inspection', 'aquapro' ),
						__( 'Owner education session', 'aquapro' ),
						__( 'First 30-day care plan', 'aquapro' ),
					),
					'link'    => home_url( '/services/pool-startup/' ),
				),
				array(
					'icon'    => '🔄',
					'name'    => __( 'Filter Cleaning', 'aquapro' ),
					'desc'    => __( 'A dirty filter means a dirty pool — and wasted energy. We deep-clean cartridge, sand, and DE filters to restore full circulation and filtration efficiency.', 'aquapro' ),
					'features'=> array(
						__( 'Cartridge filter cleaning', 'aquapro' ),
						__( 'Sand filter backwash', 'aquapro' ),
						__( 'DE filter cleaning & recharge', 'aquapro' ),
						__( 'Pressure check & flow test', 'aquapro' ),
						__( 'Filter condition report', 'aquapro' ),
					),
					'link'    => home_url( '/services/filter-cleaning/' ),
				),
			);

			foreach ( $services as $service ) : ?>
			<article class="service-card" data-reveal>
				<div class="service-icon-wrap" aria-hidden="true"><?php echo $service['icon']; ?></div>
				<h3 class="service-name"><?php echo esc_html( $service['name'] ); ?></h3>
				<p class="service-description"><?php echo esc_html( $service['desc'] ); ?></p>
				<ul class="service-features" role="list">
					<?php foreach ( $service['features'] as $feat ) : ?>
					<li class="service-feature"><?php echo esc_html( $feat ); ?></li>
					<?php endforeach; ?>
				</ul>
				<a href="<?php echo esc_url( $service['link'] ); ?>" class="service-link">
					<?php _e( 'Learn More', 'aquapro' ); ?>
					<i class="fas fa-arrow-right" aria-hidden="true"></i>
				</a>
			</article>
			<?php endforeach; ?>

		</div>

		<div class="text-center" style="margin-top:48px;">
			<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-secondary">
				<?php _e( 'View All Services', 'aquapro' ); ?>
				<i class="fas fa-arrow-right" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</section>

<!-- =============================================
     HOW IT WORKS
     ============================================= -->
<section class="how-section section-padding" aria-labelledby="how-title">
	<div class="container">
		<div class="section-header center" data-reveal>
			<span class="section-badge">
				<i class="fas fa-route" aria-hidden="true"></i>
				<?php _e( 'Simple Process', 'aquapro' ); ?>
			</span>
			<h2 class="section-title" id="how-title">
				<?php _e( 'Up &amp; Running in<br><span>4 Easy Steps</span>', 'aquapro' ); ?>
			</h2>
			<p class="section-subtitle">
				<?php _e( 'Getting professional pool service has never been easier. We handle everything — you just enjoy your pool.', 'aquapro' ); ?>
			</p>
		</div>

		<div class="steps-grid">
			<?php
			$steps = array(
				array( '📞', __( 'Call or Request Online', 'aquapro' ), __( 'Call us or fill out our quick quote form. We respond within 2 business hours with a custom quote.', 'aquapro' ) ),
				array( '📋', __( 'Free In-Person Assessment', 'aquapro' ), __( "We visit your property at no charge to assess your pool's condition, size, and specific needs.", 'aquapro' ) ),
				array( '📅', __( 'Schedule Your Service', 'aquapro' ), __( "Choose a recurring service plan that fits your schedule and budget. We'll lock in your day/time slot.", 'aquapro' ) ),
				array( '🏊', __( 'Relax &amp; Enjoy', 'aquapro' ), __( "Our certified techs handle everything. You'll get a digital service report after every visit.", 'aquapro' ) ),
			);
			foreach ( $steps as $i => $step ) : ?>
			<div class="step-item" data-reveal>
				<div class="step-number" aria-hidden="true">
					<span class="step-icon"><?php echo $step[0]; ?></span>
				</div>
				<h3 class="step-title"><?php echo wp_kses_post( $step[1] ); ?></h3>
				<p class="step-description"><?php echo esc_html( $step[2] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>

		<div class="text-center" style="margin-top:56px;">
			<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-primary btn-lg">
				<i class="fas fa-phone" aria-hidden="true"></i>
				<?php printf( __( 'Call %s Now', 'aquapro' ), esc_html( $phone ) ); ?>
			</a>
		</div>
	</div>
</section>

<!-- =============================================
     WHY CHOOSE US
     ============================================= -->
<section class="why-section section-padding" aria-labelledby="why-title">
	<div class="container">
		<div class="why-grid">
			<div class="why-image-wrap" data-reveal="left">
				<div class="why-image-main">🏊</div>
				<div class="why-image-badge">
					<div class="why-badge-number"><?php echo esc_html( $years_exp ); ?></div>
					<div class="why-badge-text"><?php printf( __( 'Years Serving<br>%s', 'aquapro' ), esc_html( $city ) ); ?></div>
				</div>
			</div>

			<div class="why-content" data-reveal="right">
				<span class="section-badge">
					<i class="fas fa-award" aria-hidden="true"></i>
					<?php _e( 'Why Williams Pool Care', 'aquapro' ); ?>
				</span>
				<h2 class="section-title" id="why-title">
					<?php _e( "Sacramento's Most Trusted<br><span>Pool Cleaning Team</span>", 'aquapro' ); ?>
				</h2>
				<p style="color:var(--color-gray-500);line-height:1.8;margin-bottom:28px;">
					<?php printf( esc_html__( "We've built our reputation one satisfied customer at a time. Since 2006, Williams Pool Care has been the go-to pool service company for homeowners and communities across %s and the greater Sacramento region. Our business is built on three pillars: excellence, dependability, and personal service.", 'aquapro' ), esc_html( $city ) ); ?>
				</p>

				<div class="why-features">
					<?php
					$features = array(
						array( '🏅', __( 'Certified Pool Technicians', 'aquapro' ), __( 'All our technicians are trained, certified, and background-checked. You can trust who is at your property.', 'aquapro' ) ),
						array( '📱', __( 'Digital Service Reports', 'aquapro' ), __( 'After every visit you receive a detailed report with chemicals added, equipment status, and photos.', 'aquapro' ) ),
						array( '💰', __( 'Transparent, Flat-Rate Pricing', 'aquapro' ), __( 'No surprise charges. We customize your plan and give you a clear, flat monthly rate upfront.', 'aquapro' ) ),
						array( '🌟', __( 'Satisfaction Guaranteed', 'aquapro' ), __( 'Not happy with a visit? We come back and make it right — at no additional charge.', 'aquapro' ) ),
					);
					foreach ( $features as $f ) : ?>
					<div class="why-feature">
						<div class="why-feature-icon" aria-hidden="true"><?php echo $f[0]; ?></div>
						<div>
							<h3 class="why-feature-title"><?php echo esc_html( $f[1] ); ?></h3>
							<p class="why-feature-text"><?php echo esc_html( $f[2] ); ?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>

				<div style="margin-top:36px;display:flex;gap:16px;flex-wrap:wrap;">
					<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn-primary">
						<?php _e( 'Meet Our Team', 'aquapro' ); ?>
					</a>
					<a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>" class="btn btn-secondary">
						<?php _e( 'Read Reviews', 'aquapro' ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- =============================================
     TESTIMONIALS
     ============================================= -->
<section class="testimonials-section section-padding" aria-labelledby="testimonials-title">
	<div class="container">
		<div class="section-header center" data-reveal>
			<span class="section-badge">
				<i class="fas fa-quote-left" aria-hidden="true"></i>
				<?php _e( 'Customer Reviews', 'aquapro' ); ?>
			</span>
			<h2 class="section-title" id="testimonials-title">
				<?php printf( __( 'What %s Homeowners<br><span>Are Saying</span>', 'aquapro' ), esc_html( $city ) ); ?>
			</h2>
			<p class="section-subtitle">
				<?php printf( esc_html__( 'Don\'t just take our word for it. Here\'s what our %s+ satisfied customers across the Sacramento area have to say.', 'aquapro' ), esc_html( $reviews ) ); ?>
			</p>
		</div>

		<div class="testimonials-grid">
			<?php
			// Query custom testimonials if they exist, otherwise show defaults
			$testimonial_args = array(
				'post_type'      => 'testimonial',
				'posts_per_page' => 6,
				'post_status'    => 'publish',
			);
			$testimonials_query = new WP_Query( $testimonial_args );

			if ( $testimonials_query->have_posts() ) :
				while ( $testimonials_query->have_posts() ) :
					$testimonials_query->the_post();
					$rating   = get_post_meta( get_the_ID(), '_rating', true ) ?: 5;
					$reviewer = get_post_meta( get_the_ID(), '_reviewer_name', true ) ?: get_the_title();
					$location = get_post_meta( get_the_ID(), '_reviewer_location', true ) ?: $city;
					$service  = get_post_meta( get_the_ID(), '_service_type', true ) ?: '';
					?>
					<article class="testimonial-card" data-reveal itemscope itemtype="https://schema.org/Review">
						<?php if ( $service ) : ?>
						<div class="testimonial-service-tag"><?php echo esc_html( $service ); ?></div>
						<?php endif; ?>
						<div class="testimonial-quote" aria-hidden="true">"</div>
						<div class="testimonial-stars" aria-label="<?php echo esc_attr( sprintf( __( '%d out of 5 stars', 'aquapro' ), $rating ) ); ?>">
							<?php echo aquapro_stars( $rating ); ?>
						</div>
						<blockquote class="testimonial-text" itemprop="reviewBody">
							<?php the_content(); ?>
						</blockquote>
						<div class="testimonial-author">
							<div class="testimonial-avatar" aria-hidden="true"><?php echo esc_html( mb_substr( $reviewer, 0, 1 ) ); ?></div>
							<div>
								<div class="testimonial-name" itemprop="author"><?php echo esc_html( $reviewer ); ?></div>
								<div class="testimonial-location"><?php echo esc_html( $location ); ?></div>
							</div>
						</div>
					</article>
				<?php endwhile;
				wp_reset_postdata();
			else :
				// Default testimonials seeded from research
				$defaults = array(
					array(
						'quote'    => "Williams Pool Care has been servicing our pool in Fair Oaks for over 3 years. They are reliable, thorough, and our pool has never looked better. The digital report after each visit is a great touch — we always know exactly what was done.",
						'name'     => 'Sarah M.',
						'location' => 'Fair Oaks, CA',
						'service'  => 'Weekly Cleaning',
						'initial'  => 'S',
					),
					array(
						'quote'    => "Our pool turned green after we went on vacation. Williams had it crystal clear in under 48 hours. Fast, professional, and priced fairly. Now we're on their weekly plan and couldn't be happier.",
						'name'     => 'David L.',
						'location' => 'Roseville, CA',
						'service'  => 'Green Pool Treatment',
						'initial'  => 'D',
					),
					array(
						'quote'    => "The team is amazing. We've been customers since 2012 and they've always gone above and beyond. They noticed our pump was struggling before it failed and fixed it proactively. That saved us from a much bigger repair bill.",
						'name'     => 'Karen &amp; Tom R.',
						'location' => 'Citrus Heights, CA',
						'service'  => 'Weekly + Equipment',
						'initial'  => 'K',
					),
					array(
						'quote'    => "As a new pool owner I had no idea what I was doing. Williams Pool Care was incredibly patient, taught me about my equipment, and set up a weekly service plan that fits my budget. Highly recommend to anyone in Sacramento.",
						'name'     => 'Marcus J.',
						'location' => 'Folsom, CA',
						'service'  => 'New Pool Start-Up',
						'initial'  => 'M',
					),
					array(
						'quote'    => "I've tried two other pool services in the area. None of them come close to Williams. They actually show up when they say they will, and the pool always looks great. Worth every penny.",
						'name'     => 'Stephanie O.',
						'location' => 'Orangevale, CA',
						'service'  => 'Bi-Weekly Cleaning',
						'initial'  => 'S',
					),
					array(
						'quote'    => "Called them on a Wednesday for a green pool emergency before our 4th of July party. They squeezed us in Thursday and the pool was perfect by Friday. That is exceptional customer service right there.",
						'name'     => 'Robert P.',
						'location' => 'Granite Bay, CA',
						'service'  => 'Green Pool Treatment',
						'initial'  => 'R',
					),
				);
				foreach ( $defaults as $t ) : ?>
				<article class="testimonial-card" data-reveal itemscope itemtype="https://schema.org/Review">
					<div class="testimonial-service-tag"><?php echo esc_html( $t['service'] ); ?></div>
					<div class="testimonial-quote" aria-hidden="true">"</div>
					<div class="testimonial-stars" aria-label="5 out of 5 stars">
						<?php echo aquapro_stars( 5 ); ?>
					</div>
					<blockquote class="testimonial-text" itemprop="reviewBody">
						<?php echo wp_kses_post( $t['quote'] ); ?>
					</blockquote>
					<div class="testimonial-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
						<div class="testimonial-avatar" aria-hidden="true"><?php echo esc_html( $t['initial'] ); ?></div>
						<div>
							<div class="testimonial-name" itemprop="name"><?php echo esc_html( $t['name'] ); ?></div>
							<div class="testimonial-location"><?php echo esc_html( $t['location'] ); ?></div>
						</div>
					</div>
				</article>
				<?php endforeach;
			endif; ?>
		</div>

		<div class="text-center" style="margin-top:48px;">
			<a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>" class="btn btn-secondary">
				<?php _e( 'Read All Reviews', 'aquapro' ); ?>
			</a>
			<a href="<?php echo esc_url( get_theme_mod( 'aquapro_google', '#' ) ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-gold" style="margin-left:12px;">
				<i class="fab fa-google" aria-hidden="true"></i>
				<?php _e( 'Leave Us a Review', 'aquapro' ); ?>
			</a>
		</div>
	</div>
</section>

<!-- =============================================
     SERVICE AREAS
     ============================================= -->
<section class="areas-section section-padding" id="service-areas" aria-labelledby="areas-title">
	<div class="container">
		<div class="section-header center" data-reveal>
			<span class="section-badge">
				<i class="fas fa-map-marker-alt" aria-hidden="true"></i>
				<?php _e( 'Where We Serve', 'aquapro' ); ?>
			</span>
			<h2 class="section-title" id="areas-title">
				<?php _e( 'Serving the Greater<br><span>Sacramento Area</span>', 'aquapro' ); ?>
			</h2>
			<p class="section-subtitle">
				<?php printf( esc_html__( "Based in %s, we provide professional pool cleaning services to homeowners and communities throughout Sacramento, Placer, and surrounding counties.", 'aquapro' ), esc_html( $city ) ); ?>
			</p>
		</div>

		<div class="areas-grid" aria-label="<?php esc_attr_e( 'Service areas list', 'aquapro' ); ?>">
			<?php
			$areas = array(
				array( '📍', 'Fair Oaks' ),
				array( '📍', 'Sacramento' ),
				array( '📍', 'Citrus Heights' ),
				array( '📍', 'Roseville' ),
				array( '📍', 'Rocklin' ),
				array( '📍', 'Folsom' ),
				array( '📍', 'Orangevale' ),
				array( '📍', 'Granite Bay' ),
				array( '📍', 'Loomis' ),
				array( '📍', 'Penryn' ),
				array( '📍', 'Carmichael' ),
				array( '📍', 'Rancho Cordova' ),
				array( '📍', 'Gold River' ),
				array( '📍', 'Elk Grove' ),
				array( '📍', 'Lincoln' ),
				array( '📍', 'Auburn' ),
			);
			foreach ( $areas as $area ) : ?>
			<div class="area-item">
				<span class="area-icon" aria-hidden="true"><?php echo $area[0]; ?></span>
				<span class="area-name"><?php echo esc_html( $area[1] ); ?></span>
			</div>
			<?php endforeach; ?>
		</div>

		<div class="text-center" style="margin-top:40px;">
			<p style="color:var(--color-gray-500);margin-bottom:20px;">
				<?php _e( "Don't see your city? Call us — we may still serve your area!", 'aquapro' ); ?>
			</p>
			<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-primary">
				<i class="fas fa-phone" aria-hidden="true"></i>
				<?php printf( __( 'Call %s', 'aquapro' ), esc_html( $phone ) ); ?>
			</a>
		</div>
	</div>
</section>

<!-- =============================================
     CTA SECTION
     ============================================= -->
<section class="cta-section section-padding" aria-labelledby="cta-title">
	<div class="container">
		<div class="cta-grid">
			<div class="cta-content" data-reveal="left">
				<h2 class="cta-title" id="cta-title">
					<?php _e( 'Ready for a Crystal<br>Clear Pool?', 'aquapro' ); ?>
				</h2>
				<p class="cta-description">
					<?php printf( esc_html__( "Join over %s happy pool owners across the Sacramento area who trust Williams Pool Care to keep their pools perfect. Get your no-obligation quote today.", 'aquapro' ), esc_html( $pools ) ); ?>
				</p>
				<div style="display:flex;gap:12px;margin-top:28px;flex-wrap:wrap;">
					<a href="#quote-form" class="btn btn-white">
						<i class="fas fa-clipboard-list" aria-hidden="true"></i>
						<?php _e( 'Get Free Quote Online', 'aquapro' ); ?>
					</a>
				</div>
			</div>
			<div class="cta-actions" data-reveal="right">
				<div class="cta-phone">
					<div class="cta-phone-icon" aria-hidden="true">
						<i class="fas fa-phone-alt"></i>
					</div>
					<div>
						<p class="cta-phone-label"><?php _e( 'Or call us directly', 'aquapro' ); ?></p>
						<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="cta-phone-number">
							<?php echo esc_html( $phone ); ?>
						</a>
					</div>
				</div>
				<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-gold btn-lg" style="width:100%;justify-content:center;">
					<i class="fas fa-phone" aria-hidden="true"></i>
					<?php _e( 'Call Now — Same-Week Service', 'aquapro' ); ?>
				</a>
				<p style="font-size:0.8rem;color:rgba(255,255,255,0.6);text-align:center;">
					<?php _e( 'Mon–Sat 7AM–6PM · No answering service', 'aquapro' ); ?>
				</p>
			</div>
		</div>
	</div>
</section>

<!-- =============================================
     FAQ SECTION
     ============================================= -->
<section class="faq-section section-padding" aria-labelledby="faq-title">
	<div class="container">
		<div class="section-header center" data-reveal>
			<span class="section-badge">
				<i class="fas fa-question-circle" aria-hidden="true"></i>
				<?php _e( 'FAQ', 'aquapro' ); ?>
			</span>
			<h2 class="section-title" id="faq-title">
				<?php _e( 'Frequently Asked<br><span>Questions</span>', 'aquapro' ); ?>
			</h2>
		</div>

		<div class="faq-list" itemscope itemtype="https://schema.org/FAQPage">
			<?php
			$faqs = array(
				array(
					'q' => __( 'How often should I have my pool professionally cleaned?', 'aquapro' ),
					'a' => sprintf( __( 'For most residential pools in the Sacramento area, we recommend weekly service — especially during our hot summers when pools get heavy use and chemicals evaporate faster. Weekly cleaning keeps your water chemistry balanced, prevents algae growth, and extends the life of your equipment. We also offer bi-weekly plans for pools with lighter use.', 'aquapro' ), $city ),
				),
				array(
					'q' => __( 'Do I need to be home when you service my pool?', 'aquapro' ),
					'a' => __( "No, you don't need to be home. Our technicians are fully background-checked and insured. As long as we have gate access (a code or unlocked gate), we can complete the full service and will email you a detailed service report with notes and photos after every visit.", 'aquapro' ),
				),
				array(
					'q' => __( 'What is included in your weekly pool cleaning service?', 'aquapro' ),
					'a' => __( 'Our weekly service includes: surface skimming, wall and step brushing, floor vacuuming, emptying skimmer and pump baskets, testing your water chemistry (pH, chlorine, alkalinity, calcium hardness), adding all necessary chemicals, checking equipment operation, and emailing you a full service report.', 'aquapro' ),
				),
				array(
					'q' => __( 'Can you fix a green pool quickly?', 'aquapro' ),
					'a' => __( "Yes! Green pool remediation is one of our specialties. Depending on the severity, we can typically restore a green pool to crystal clear within 24–72 hours using our proven shock and algaecide treatment protocol. We'll schedule a follow-up visit to ensure the problem is fully resolved.", 'aquapro' ),
				),
				array(
					'q' => __( 'Do you provide free estimates?', 'aquapro' ),
					'a' => __( "Absolutely. We provide free, no-obligation consultations and estimates for all services. We'll visit your property, assess your pool, and give you a clear flat-rate quote with no hidden fees.", 'aquapro' ),
				),
				array(
					'q' => __( 'Are your technicians licensed and insured?', 'aquapro' ),
					'a' => __( "Yes. Williams Pool Care is fully licensed and insured in California. All our pool technicians are background-checked, trained in pool chemistry, and knowledgeable about all major pool equipment brands. Your property and investment are always protected.", 'aquapro' ),
				),
				array(
					'q' => __( 'What areas do you serve?', 'aquapro' ),
					'a' => sprintf( __( 'We serve %s and the entire Greater Sacramento area, including Citrus Heights, Folsom, Orangevale, Roseville, Rocklin, Penryn, Granite Bay, Loomis, Carmichael, Gold River, Rancho Cordova, Lincoln, Auburn, and Elk Grove. Not sure if we cover your area? Just call us and ask!', 'aquapro' ), $city ),
				),
			);
			foreach ( $faqs as $faq ) : ?>
			<div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
				<button class="faq-question" aria-expanded="false">
					<span itemprop="name"><?php echo esc_html( $faq['q'] ); ?></span>
					<span class="faq-icon" aria-hidden="true">+</span>
				</button>
				<div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
					<div class="faq-answer-inner" itemprop="text">
						<?php echo esc_html( $faq['a'] ); ?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		<div class="text-center" style="margin-top:40px;">
			<p style="color:var(--color-gray-500);">
				<?php _e( 'Have more questions?', 'aquapro' ); ?>
				<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" style="color:var(--color-primary);font-weight:700;">
					<?php printf( __( 'Call us at %s', 'aquapro' ), esc_html( $phone ) ); ?>
				</a>
			</p>
		</div>
	</div>
</section>

<!-- =============================================
     BLOG PREVIEW
     ============================================= -->
<?php
$blog_args  = array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'has_password'   => false,
);
$blog_query = new WP_Query( $blog_args );

if ( $blog_query->have_posts() ) : ?>
<section class="section-padding" style="background:var(--color-white);" aria-labelledby="blog-title">
	<div class="container">
		<div class="section-header center" data-reveal>
			<span class="section-badge">
				<i class="fas fa-newspaper" aria-hidden="true"></i>
				<?php _e( 'Pool Care Tips', 'aquapro' ); ?>
			</span>
			<h2 class="section-title" id="blog-title">
				<?php _e( 'Expert Pool Care<br><span>Advice &amp; Tips</span>', 'aquapro' ); ?>
			</h2>
		</div>

		<div class="posts-grid">
			<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
			<article class="post-card" data-reveal>
				<div class="post-thumbnail">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
							<?php the_post_thumbnail( 'aquapro-thumb' ); ?>
						</a>
					<?php else : ?>
						<span aria-hidden="true">🏊</span>
					<?php endif; ?>
				</div>
				<div class="post-content">
					<?php if ( has_category() ) : ?>
					<span class="post-category">
						<?php the_category( ', ' ); ?>
					</span>
					<?php endif; ?>
					<h3 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<p class="post-excerpt"><?php echo aquapro_excerpt( 20 ); ?></p>
					<div class="post-meta">
						<span><?php the_date(); ?></span>
						<a href="<?php the_permalink(); ?>" style="color:var(--color-primary);font-weight:700;font-size:0.85rem;">
							<?php _e( 'Read More →', 'aquapro' ); ?>
						</a>
					</div>
				</div>
			</article>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>

		<div class="text-center" style="margin-top:40px;">
			<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="btn btn-secondary">
				<?php _e( 'View All Pool Tips', 'aquapro' ); ?>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<?php get_footer(); ?>
