<?php
/**
 * Template Name: Landing – Local Pool Maintenance
 *
 * Google Ads landing page targeting:
 * "pool maintenance", "pool repair", "pool repairs",
 * "Swimming Pool Maintenance", "Pool Maintenance Near Me",
 * "pool repairs near me", "Pool Cleaning and Maintenance"
 *
 * @package AquaPro
 */

add_action( 'wp_head', function() {
	$phone = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
	$city  = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
	echo '<meta name="description" content="Swimming pool maintenance &amp; pool repair services near you in Sacramento &amp; ' . esc_attr( $city ) . '. Pool cleaning and maintenance plans from certified technicians. Pool repairs near me — call ' . esc_attr( $phone ) . '.">' . "\n";
	?>
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "Service",
		"name": "Swimming Pool Maintenance & Repair",
		"alternateName": ["Pool Maintenance Near Me", "Pool Repairs Near Me", "Pool Cleaning and Maintenance"],
		"description": "Professional swimming pool maintenance and pool repair services in Sacramento and surrounding areas. Regular pool maintenance plans, chemical balancing, equipment repairs, and green pool recovery from certified technicians.",
		"provider": {
			"@type": "LocalBusiness",
			"name": "Williams Pool Care",
			"telephone": "<?php echo esc_js( $phone ); ?>",
			"address": { "@type": "PostalAddress", "addressLocality": "<?php echo esc_js( $city ); ?>", "addressRegion": "CA" }
		},
		"areaServed": ["Sacramento", "Fair Oaks", "Roseville", "Folsom", "Citrus Heights", "Rocklin", "Orangevale", "Granite Bay", "Carmichael", "Rancho Cordova"],
		"hasOfferCatalog": {
			"@type": "OfferCatalog",
			"name": "Pool Maintenance Services",
			"itemListElement": [
				{ "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Weekly Pool Maintenance" } },
				{ "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Pool Equipment Repair" } },
				{ "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Pool Chemical Balancing" } },
				{ "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Green Pool Recovery" } },
				{ "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Filter Cleaning & Repair" } }
			]
		}
	}
	</script>
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "FAQPage",
		"mainEntity": [
			{
				"@type": "Question",
				"name": "What does pool maintenance near me include?",
				"acceptedAnswer": { "@type": "Answer", "text": "Williams Pool Care's pool maintenance service includes regular cleaning (skimming, brushing, vacuuming), water chemistry testing and balancing, equipment inspection (pump, filter, heater), and minor adjustments to keep your pool healthy. We also handle pool repairs for pumps, filters, heaters, and more." }
			},
			{
				"@type": "Question",
				"name": "Do you do pool repairs near me in Sacramento?",
				"acceptedAnswer": { "@type": "Answer", "text": "Yes — Williams Pool Care provides pool repairs throughout Sacramento, Fair Oaks, Roseville, Folsom, and surrounding communities. We repair pumps, motors, filters, heaters, salt cells, and automation systems. Most pool repairs are diagnosed and completed within 1–3 business days." }
			},
			{
				"@type": "Question",
				"name": "How much does swimming pool maintenance cost?",
				"acceptedAnswer": { "@type": "Answer", "text": "Swimming pool maintenance plans from Williams Pool Care start at $89/month for bi-weekly service. Weekly full-service maintenance is $129/month. Pool repair costs vary by issue — we provide free diagnoses with all maintenance plans and transparent flat-rate repair pricing." }
			}
		]
	}
	</script>
	<?php
}, 5 );

get_header();

$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$city       = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
?>

<!-- =============================================
     HERO
     ============================================= -->
<section class="hero-section" style="min-height:auto;padding-bottom:0;" aria-labelledby="lpm-hero-title">
	<div class="hero-background" aria-hidden="true">
		<div class="hero-bg-image" style="background:linear-gradient(135deg,#0D1B2A,#0077A8,#00B4D8);width:100%;height:100%;"></div>
		<div class="hero-bg-gradient"></div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60" preserveAspectRatio="none">
			<path fill="#f9fafb" d="M0,40L48,36.7C96,33,192,27,288,28C384,29,480,37,576,38.3C672,39,768,33,864,29.3C960,25,1056,23,1152,26.7C1248,31,1344,39,1392,43L1440,47L1440,60L0,60Z"></path>
		</svg>
	</div>

	<div class="container hero-content">
		<div class="hero-grid">

			<!-- Left -->
			<div class="hero-left">
				<div class="hero-badge">
					<i class="fas fa-map-marker-alt" aria-hidden="true"></i>
					Pool Maintenance & Repair Near You in <?php echo esc_html( $city ); ?>, CA
				</div>

				<h1 class="hero-title" id="lpm-hero-title">
					Swimming Pool Maintenance<br>&amp; Pool Repair Services<br>
					<span class="highlight">Near Me — Done Right.</span>
				</h1>

				<p class="hero-description">
					Williams Pool Care provides complete pool cleaning and maintenance for homeowners across Sacramento and <?php echo esc_html( $city ); ?>. From regular swimming pool maintenance plans to emergency pool repairs near you — certified technicians, transparent pricing, same-week availability.
				</p>

				<div class="hero-actions">
					<a href="#lpm-quote-form" class="btn btn-primary btn-lg">
						<i class="fas fa-clipboard-list" aria-hidden="true"></i> Get Free Maintenance Quote
					</a>
					<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-white btn-lg">
						<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
					</a>
				</div>

				<div class="hero-stats" style="margin-top:32px;">
					<div class="hero-stat"><span class="hero-stat-number">20+</span><span class="hero-stat-label">Years Experience</span></div>
					<div class="hero-stat" style="border-left:1px solid rgba(255,255,255,0.15);padding-left:32px;"><span class="hero-stat-number">5,000+</span><span class="hero-stat-label">Pools Maintained</span></div>
					<div class="hero-stat" style="border-left:1px solid rgba(255,255,255,0.15);padding-left:32px;"><span class="hero-stat-number">2-hr</span><span class="hero-stat-label">Quote Response</span></div>
				</div>
			</div>

			<!-- Right: Quote Form -->
			<div class="hero-right">
				<div class="hero-form-card" id="lpm-quote-form">
					<div style="background:#FEF3C7;border:1px solid #F59E0B;border-radius:var(--radius-sm);padding:8px 14px;margin-bottom:14px;font-size:0.82rem;font-weight:600;color:#92400E;display:flex;align-items:center;gap:8px;">
						<i class="fas fa-calendar-check" aria-hidden="true"></i>
						<span>Summer slots filling fast — <strong>3 openings left this week</strong></span>
					</div>
					<h2 class="hero-form-title">Get a Free Pool Maintenance Quote</h2>
					<p class="hero-form-subtitle">Maintenance plan or pool repair — no obligation. Response within <strong>2 business hours.</strong></p>

					<form id="quoteForm" class="quote-form" novalidate aria-label="Free pool maintenance quote form">
						<?php wp_nonce_field( 'aquapro_nonce', 'nonce' ); ?>
						<input type="hidden" name="action" value="aquapro_quote">

						<div class="form-row">
							<div class="form-group">
								<label for="lpm_name">Your Name *</label>
								<input type="text" id="lpm_name" name="name" class="form-control" placeholder="John Smith" required autocomplete="name">
							</div>
							<div class="form-group">
								<label for="lpm_phone">Phone Number *</label>
								<input type="tel" id="lpm_phone" name="phone" class="form-control" placeholder="(916) 555-0100" required autocomplete="tel">
							</div>
						</div>

						<div class="form-group">
							<label for="lpm_email">Email Address *</label>
							<input type="email" id="lpm_email" name="email" class="form-control" placeholder="john@example.com" required autocomplete="email">
						</div>

						<div class="form-row">
							<div class="form-group">
								<label for="lpm_service">Service Needed</label>
								<select id="lpm_service" name="service" class="form-control">
									<option value="">Select service...</option>
									<option value="weekly-maintenance">Weekly Maintenance Plan</option>
									<option value="biweekly-maintenance">Bi-Weekly Maintenance</option>
									<option value="pool-repair">Pool Repair</option>
									<option value="equipment-repair">Equipment Repair</option>
									<option value="chemical">Chemical Balancing</option>
									<option value="green-pool">Green Pool Recovery</option>
									<option value="filter">Filter Cleaning</option>
									<option value="other">Other / Not Sure</option>
								</select>
							</div>
							<div class="form-group">
								<label for="lpm_pool_size">Pool Size</label>
								<select id="lpm_pool_size" name="pool_size" class="form-control">
									<option value="">Approximate size...</option>
									<option value="small">Small (&lt; 10,000 gal)</option>
									<option value="medium">Medium (10–20k gal)</option>
									<option value="large">Large (20–40k gal)</option>
									<option value="xlarge">Extra Large (40k+)</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="lpm_address">Property Address</label>
							<input type="text" id="lpm_address" name="address" class="form-control" placeholder="123 Main St, Fair Oaks, CA" autocomplete="street-address">
						</div>

						<div role="alert" aria-live="polite" style="display:none;"></div>

						<button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:16px;">
							<i class="fas fa-paper-plane" aria-hidden="true"></i> Get My Free Maintenance Quote
						</button>
						<p style="font-size:0.78rem;color:var(--color-gray-500);text-align:center;margin-top:10px;">
							<i class="fas fa-lock" aria-hidden="true"></i> No spam. No commitment. We'll call you back.
						</p>
					</form>
				</div>
			</div>

		</div>
	</div>
</section>

<?php require get_template_directory() . '/inc/lp-trust-bar.php'; ?>

<!-- =============================================
     MAINTENANCE SERVICES
     ============================================= -->
<section class="section-padding" style="background:var(--color-gray-100);" aria-labelledby="lpm-services-title">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-tools" aria-hidden="true"></i> Pool Maintenance &amp; Repair</span>
			<h2 class="section-title" id="lpm-services-title">Complete Pool Cleaning and Maintenance Services</h2>
			<p class="section-subtitle">From routine swimming pool maintenance to emergency pool repairs near you — Williams Pool Care handles it all in Sacramento and surrounding communities.</p>
		</div>

		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:24px;margin-top:48px;">
			<?php
			$services = array(
				array( 'fa-broom',      'var(--color-primary)',  'Regular Pool Maintenance',         'Weekly and bi-weekly pool cleaning and maintenance — skimming, vacuuming, brushing, chemical balancing, basket service, and full equipment inspection.' ),
				array( 'fa-flask',      '#8B5CF6',              'Water Chemistry & Chemical Balance', 'Precise water chemistry testing and balancing. We correct pH, chlorine, alkalinity, calcium hardness, and cyanuric acid to protect swimmers and equipment.' ),
				array( 'fa-tools',      '#F59E0B',              'Pool Equipment Repair',             'We repair and service pumps, motors, filters, heaters, salt cells, and automation systems. All major brands including Pentair, Hayward, Jandy, and Zodiac.' ),
				array( 'fa-leaf',       '#10B981',              'Green Pool Recovery',               'Green, cloudy, or swampy pool? Our proven multi-step algae elimination process has most pools swim-ready within 3–7 days, guaranteed.' ),
				array( 'fa-filter',     '#EF4444',              'Filter Cleaning & Service',         'D.E., cartridge, and sand filter cleaning, inspection, and repair. A clean filter is the foundation of a healthy, clear pool.' ),
				array( 'fa-star',       '#06B6D4',              'Acid Wash & Deep Cleaning',         'Remove years of staining, scale, and algae buildup with a professional acid wash that restores your pool\'s surface without full replastering.' ),
			);
			foreach ( $services as $svc ) : ?>
			<div style="background:var(--color-white);border-radius:var(--radius-lg);padding:28px;box-shadow:var(--shadow-sm);">
				<div style="width:52px;height:52px;background:<?php echo esc_attr( $svc[1] ); ?>;border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;margin-bottom:16px;">
					<i class="fas <?php echo esc_attr( $svc[0] ); ?>" style="color:white;font-size:1.3rem;" aria-hidden="true"></i>
				</div>
				<h3 style="font-size:1.05rem;color:var(--color-dark);margin-bottom:10px;"><?php echo esc_html( $svc[2] ); ?></h3>
				<p style="font-size:0.875rem;color:var(--color-gray-500);line-height:1.65;margin:0;"><?php echo esc_html( $svc[3] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- =============================================
     MAINTENANCE PLANS + REPAIR PROMISE
     ============================================= -->
<section class="section-padding" style="background:var(--color-white);" aria-labelledby="lpm-plans-title">
	<div class="container">
		<div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:start;">

			<!-- Maintenance Plans -->
			<div>
				<span class="section-badge"><i class="fas fa-calendar-alt" aria-hidden="true"></i> Maintenance Plans</span>
				<h2 class="section-title" id="lpm-plans-title" style="text-align:left;margin-top:12px;">Pool Maintenance Plans Near <?php echo esc_html( $city ); ?></h2>
				<p style="color:var(--color-gray-600);margin-bottom:28px;line-height:1.7;">Flat-rate swimming pool maintenance with no surprise charges. Choose the plan that fits your pool and your schedule.</p>
				<?php
				$plans = array(
					array( 'Bi-Weekly Maintenance', 'From $89/mo', 'Service every 2 weeks. Cleaning, chemistry, equipment check.' ),
					array( 'Weekly Maintenance',    'From $129/mo', 'Service every week. Includes digital report after each visit.' ),
					array( 'Full-Service Plan',     'From $179/mo', 'Weekly service + filter cleaning + priority repair scheduling.' ),
					array( 'One-Time Service',      'From $149',   'No commitment needed. Perfect for seasonal or pre-event cleanups.' ),
				);
				foreach ( $plans as $plan ) : ?>
				<div style="display:flex;gap:16px;align-items:flex-start;padding:16px 0;border-bottom:1px solid var(--color-gray-100);">
					<i class="fas fa-check-circle" style="color:var(--color-primary);margin-top:3px;flex-shrink:0;" aria-hidden="true"></i>
					<div>
						<div style="font-weight:700;color:var(--color-dark);"><?php echo esc_html( $plan[0] ); ?> <span style="color:var(--color-primary);font-size:0.9rem;"><?php echo esc_html( $plan[1] ); ?></span></div>
						<div style="font-size:0.875rem;color:var(--color-gray-500);margin-top:2px;"><?php echo esc_html( $plan[2] ); ?></div>
					</div>
				</div>
				<?php endforeach; ?>
				<a href="#lpm-quote-form" class="btn btn-primary" style="margin-top:24px;"><i class="fas fa-clipboard-list" aria-hidden="true"></i> Get My Maintenance Quote</a>
			</div>

			<!-- Pool Repair Promise -->
			<div style="background:var(--color-gray-100);border-radius:var(--radius-xl);padding:36px;">
				<span class="section-badge"><i class="fas fa-wrench" aria-hidden="true"></i> Pool Repairs Near Me</span>
				<h3 style="font-size:1.4rem;color:var(--color-dark);margin:12px 0 16px;">Pool Repairs Done Fast — Sacramento &amp; Surrounding Areas</h3>
				<p style="color:var(--color-gray-600);line-height:1.7;margin-bottom:20px;">
					When your pool equipment breaks down, you need pool repairs near you — fast. Williams Pool Care diagnoses and fixes pool equipment throughout Sacramento, <?php echo esc_html( $city ); ?>, and surrounding communities.
				</p>
				<ul style="display:flex;flex-direction:column;gap:12px;margin-bottom:24px;">
					<?php
					$repairs = array(
						'Pump & motor repair or replacement',
						'Pool filter repair & deep cleaning',
						'Heater diagnosis & repair',
						'Salt chlorinator cell cleaning & replacement',
						'Pool automation & controls',
						'Leak detection & repair',
						'All major brands: Pentair, Hayward, Jandy, Zodiac',
					);
					foreach ( $repairs as $r ) : ?>
					<li style="display:flex;align-items:center;gap:10px;font-size:0.9rem;color:var(--color-gray-700);">
						<i class="fas fa-wrench" style="color:var(--color-primary);flex-shrink:0;" aria-hidden="true"></i>
						<?php echo esc_html( $r ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
				<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-primary" style="width:100%;justify-content:center;">
					<i class="fas fa-phone" aria-hidden="true"></i> Call for Pool Repair: <?php echo esc_html( $phone ); ?>
				</a>
				<p style="font-size:0.8rem;color:var(--color-gray-500);text-align:center;margin-top:10px;">Most pool repairs diagnosed within 24 hours</p>
			</div>

		</div>
	</div>
</section>

<!-- =============================================
     TESTIMONIALS
     ============================================= -->
<section class="section-padding" style="background:var(--color-gray-100);" aria-labelledby="lpm-reviews-title">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-star" aria-hidden="true"></i> Reviews</span>
			<h2 class="section-title" id="lpm-reviews-title">Sacramento's Trusted Pool Maintenance &amp; Repair Service</h2>
		</div>

		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px;margin-top:48px;">
			<?php
			$reviews = array(
				array( 'Marcus J.',     'Folsom',          5, 'My pool pump died mid-summer. Williams had a tech out the same day and the repair was done by afternoon. Best pool repair service near me — they even checked my filter and chemicals while they were there at no extra charge.' ),
				array( 'Stephanie O.',  'Orangevale',      5, 'Been on their weekly pool maintenance plan for 2 years. The pool has never looked better and I never have to think about it. When I had a small heater issue they fixed it during a regular visit. Highly recommend.' ),
				array( 'Robert P.',     'Granite Bay',     5, 'I was searching for pool maintenance near me and Williams came up with the best reviews — they lived up to every one. Professional, on-time, great value. My pool went from green to crystal clear in 5 days.' ),
			);
			foreach ( $reviews as $r ) : ?>
			<div style="background:var(--color-white);border-radius:var(--radius-lg);padding:28px;box-shadow:var(--shadow-sm);" itemscope itemtype="https://schema.org/Review">
				<div style="display:flex;gap:4px;margin-bottom:14px;" aria-label="5 out of 5 stars">
					<?php for ( $i = 0; $i < $r[2]; $i++ ) echo '<i class="fas fa-star" style="color:#F59E0B;" aria-hidden="true"></i>'; ?>
				</div>
				<p style="font-size:0.9rem;color:var(--color-gray-700);line-height:1.7;margin-bottom:16px;" itemprop="reviewBody">"<?php echo esc_html( $r[3] ); ?>"</p>
				<div style="font-weight:700;color:var(--color-dark);font-size:0.875rem;" itemprop="author" itemscope itemtype="https://schema.org/Person">
					<span itemprop="name"><?php echo esc_html( $r[0] ); ?></span>
					<span style="font-weight:400;color:var(--color-gray-500);"> — <?php echo esc_html( $r[1] ); ?></span>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- =============================================
     FAQ
     ============================================= -->
<section class="section-padding" style="background:var(--color-white);" aria-labelledby="lpm-faq-title">
	<div class="container" style="max-width:860px;">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-question-circle" aria-hidden="true"></i> FAQ</span>
			<h2 class="section-title" id="lpm-faq-title">Pool Maintenance &amp; Repair — Frequently Asked Questions</h2>
		</div>

		<div style="margin-top:40px;" itemscope itemtype="https://schema.org/FAQPage">
			<?php
			$faqs = array(
				array(
					'What is included in swimming pool maintenance?',
					'Williams Pool Care\'s swimming pool maintenance service covers regular cleaning (surface skimming, brushing, vacuuming), complete water chemistry testing and balancing (pH, chlorine, alkalinity, calcium, stabilizer), pump and skimmer basket service, and a full equipment inspection at every visit. Weekly plans also include digital service reports.',
				),
				array(
					'Do you offer pool repairs near me in Sacramento?',
					'Yes — we provide pool repairs throughout Sacramento, Fair Oaks, Roseville, Folsom, Citrus Heights, Rocklin, Granite Bay, Carmichael, Orangevale, and Rancho Cordova. We repair pumps, motors, filters, heaters, salt cells, and automation systems for all major brands. Call (916) 532-5561 for pool repairs near you.',
				),
				array(
					'How much does pool maintenance cost near me?',
					'Pool cleaning and maintenance plans from Williams Pool Care start at $89/month for bi-weekly service. Weekly pool maintenance is $129/month. Pool repair costs vary by the issue — we provide transparent flat-rate pricing with no hidden fees. Contact us for a free quote based on your pool.',
				),
				array(
					'What is the difference between pool cleaning and pool maintenance?',
					'Pool cleaning typically refers to a single visit — skimming, vacuuming, and brushing the pool. Pool maintenance is broader and includes ongoing chemical balancing, equipment inspection, filter service, and repairs as needed. Williams Pool Care\'s maintenance plans include all of this on a regular schedule so your pool is always safe and clear.',
				),
				array(
					'How quickly can you fix a broken pool pump or filter near me?',
					'For pool equipment repairs in the Sacramento area, Williams Pool Care typically diagnoses the issue within 24 hours of your call and completes most repairs within 1–3 business days. Clients on a maintenance plan receive priority repair scheduling.',
				),
				array(
					'Can you fix a green pool near me?',
					'Yes — green pool recovery is one of our most requested services. We use a proven multi-step process: heavy shock and algaecide treatment, complete brush-out and vacuum, filter deep-clean, and follow-up visits until the pool is fully clear. Most Sacramento-area pools are swim-ready within 3–7 days.',
				),
			);
			foreach ( $faqs as $faq ) : ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="border-bottom:1px solid var(--color-gray-100);padding:20px 0;">
				<h3 itemprop="name" style="font-size:1rem;color:var(--color-dark);cursor:pointer;display:flex;justify-content:space-between;align-items:center;margin:0;" onclick="var a=this.nextElementSibling;a.style.display=a.style.display==='none'?'block':'none';this.querySelector('.fa-chevron-down').style.transform=a.style.display==='none'?'':'rotate(180deg)'">
					<?php echo esc_html( $faq[0] ); ?>
					<i class="fas fa-chevron-down" style="color:var(--color-primary);font-size:0.85rem;transition:transform 0.2s;flex-shrink:0;margin-left:16px;" aria-hidden="true"></i>
				</h3>
				<div itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer" style="display:none;padding-top:12px;">
					<p itemprop="text" style="font-size:0.9rem;color:var(--color-gray-600);line-height:1.7;margin:0;"><?php echo esc_html( $faq[1] ); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- =============================================
     BOTTOM CTA
     ============================================= -->
<section style="background:linear-gradient(135deg,var(--color-primary),var(--color-primary-dark));padding:64px 0;text-align:center;">
	<div class="container">
		<h2 style="color:white;font-size:clamp(1.5rem,3vw,2.2rem);margin-bottom:16px;">Need Pool Maintenance or a Pool Repair Near You?</h2>
		<p style="color:rgba(255,255,255,0.8);max-width:540px;margin:0 auto 32px;font-size:1rem;line-height:1.7;">
			Serving <?php echo esc_html( $city ); ?>, Sacramento, and surrounding communities. Pool cleaning and maintenance plans from $89/month. Same-week service available.
		</p>
		<div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
			<a href="#lpm-quote-form" class="btn btn-white btn-lg">
				<i class="fas fa-clipboard-list" aria-hidden="true"></i> Get Free Maintenance Quote
			</a>
			<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-lg" style="border:2px solid rgba(255,255,255,0.5);color:white;">
				<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
			</a>
		</div>
	</div>
</section>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<!-- Sticky mobile CTA bar -->
<div id="lpmMobileCta" style="display:none;position:fixed;bottom:0;left:0;right:0;z-index:9999;background:var(--color-primary);padding:12px 16px;box-shadow:0 -4px 16px rgba(0,0,0,0.2);">
	<div style="display:flex;gap:10px;max-width:480px;margin:0 auto;">
		<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" style="flex:1;background:white;color:var(--color-primary);font-weight:700;font-size:0.9rem;padding:12px;border-radius:var(--radius-sm);text-align:center;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:6px;">
			<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
		</a>
		<a href="#lpm-quote-form" style="flex:1;background:rgba(255,255,255,0.15);color:white;font-weight:700;font-size:0.9rem;padding:12px;border-radius:var(--radius-sm);text-align:center;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:6px;border:1px solid rgba(255,255,255,0.3);">
			<i class="fas fa-clipboard-list" aria-hidden="true"></i> Free Quote
		</a>
	</div>
</div>
<script>
(function(){
	var bar = document.getElementById('lpmMobileCta');
	if (!bar) return;
	function show() { if (window.innerWidth < 768) { bar.style.display = 'block'; document.body.style.paddingBottom = '70px'; } else { bar.style.display = 'none'; document.body.style.paddingBottom = ''; } }
	show(); window.addEventListener('resize', show);
})();
</script>

<?php get_footer(); ?>
