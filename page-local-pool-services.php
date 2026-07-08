<?php
/**
 * Template Name: Landing – Local Pool Services
 *
 * Google Ads landing page targeting:
 * "pool cleaning", "Swimming Pool Cleaning Services",
 * "Professional Pool Cleaning", "Pool Cleaning Service Near Me",
 * "Affordable Pool Cleaning", "Best Pool Cleaning Services"
 *
 * @package AquaPro
 */

// Inject meta description + Service schema before <head> closes
add_action( 'wp_head', function() {
	$phone = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
	$city  = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
	echo '<meta name="description" content="Professional pool cleaning services near you in Sacramento &amp; ' . esc_attr( $city ) . '. Affordable swimming pool cleaning, chemical balancing &amp; equipment checks. Certified technicians. Call ' . esc_attr( $phone ) . '.">' . "\n";
	?>
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "Service",
		"name": "Professional Pool Cleaning Services",
		"alternateName": ["Swimming Pool Cleaning Services", "Pool Cleaning Service Near Me", "Affordable Pool Cleaning"],
		"description": "Professional swimming pool cleaning services in Sacramento and surrounding areas. Weekly and bi-weekly pool cleaning, chemical balancing, and equipment inspection from certified pool technicians.",
		"provider": {
			"@type": "LocalBusiness",
			"name": "Williams Pool Care",
			"telephone": "<?php echo esc_js( $phone ); ?>",
			"address": { "@type": "PostalAddress", "addressLocality": "<?php echo esc_js( $city ); ?>", "addressRegion": "CA" }
		},
		"areaServed": ["Sacramento", "Fair Oaks", "Roseville", "Folsom", "Citrus Heights", "Rocklin", "Orangevale", "Granite Bay", "Carmichael", "Rancho Cordova"],
		"hasOfferCatalog": {
			"@type": "OfferCatalog",
			"name": "Pool Cleaning Services",
			"itemListElement": [
				{ "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Weekly Pool Cleaning" } },
				{ "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Bi-Weekly Pool Cleaning" } },
				{ "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Chemical Balancing" } },
				{ "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Green Pool Treatment" } }
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
				"name": "How much does professional pool cleaning cost near me?",
				"acceptedAnswer": { "@type": "Answer", "text": "Williams Pool Care offers affordable pool cleaning starting at $89/month for bi-weekly service and $129/month for weekly pool cleaning in Sacramento and Fair Oaks. All plans include chemical balancing, skimming, vacuuming, and equipment inspection." }
			},
			{
				"@type": "Question",
				"name": "What does a professional swimming pool cleaning service include?",
				"acceptedAnswer": { "@type": "Answer", "text": "Our swimming pool cleaning service includes surface skimming, wall and tile brushing, pool floor vacuuming, emptying pump and skimmer baskets, full water chemistry testing and balancing, and a complete equipment inspection at every visit." }
			},
			{
				"@type": "Question",
				"name": "How often should I get my pool cleaned?",
				"acceptedAnswer": { "@type": "Answer", "text": "Most Sacramento-area pools benefit from weekly cleaning during summer and bi-weekly service in cooler months. Pools surrounded by trees or with heavy use may require weekly service year-round. We recommend a free assessment to determine the right schedule for your pool." }
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
<section class="hero-section" style="min-height:auto;padding-bottom:0;" aria-labelledby="lps-hero-title">
	<div class="hero-background" aria-hidden="true">
		<div class="hero-bg-image" style="background:linear-gradient(135deg,#0D1B2A,#005F92,#0096C7);width:100%;height:100%;"></div>
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
					Pool Cleaning Service Near You in <?php echo esc_html( $city ); ?>, CA
				</div>

				<h1 class="hero-title" id="lps-hero-title">
					Professional Pool Cleaning Services<br>
					<span class="highlight">Affordable. Certified. Local.</span>
				</h1>

				<p class="hero-description">
					Looking for the best swimming pool cleaning service near you? Williams Pool Care provides professional pool cleaning throughout Sacramento, <?php echo esc_html( $city ); ?>, and surrounding communities. Certified technicians, flat-rate pricing, and same-week availability.
				</p>

				<div class="hero-actions">
					<a href="#lps-quote-form" class="btn btn-primary btn-lg">
						<i class="fas fa-clipboard-list" aria-hidden="true"></i> Get Free Quote
					</a>
					<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-white btn-lg">
						<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
					</a>
				</div>

				<div class="hero-stats" style="margin-top:32px;">
					<div class="hero-stat"><span class="hero-stat-number">20+</span><span class="hero-stat-label">Years Experience</span></div>
					<div class="hero-stat" style="border-left:1px solid rgba(255,255,255,0.15);padding-left:32px;"><span class="hero-stat-number">5,000+</span><span class="hero-stat-label">Pools Cleaned</span></div>
					<div class="hero-stat" style="border-left:1px solid rgba(255,255,255,0.15);padding-left:32px;"><span class="hero-stat-number">500+</span><span class="hero-stat-label">5-Star Reviews</span></div>
				</div>
			</div>

			<!-- Right: Quote Form -->
			<div class="hero-right">
				<div class="hero-form-card" id="lps-quote-form">
					<h2 class="hero-form-title">Get a Free Pool Cleaning Quote</h2>
					<p class="hero-form-subtitle">No obligation. Response within <strong>2 business hours.</strong></p>

					<form id="quoteForm" class="quote-form" novalidate aria-label="Free pool cleaning quote form">
						<?php wp_nonce_field( 'aquapro_nonce', 'nonce' ); ?>
						<input type="hidden" name="action" value="aquapro_quote">

						<div class="form-row">
							<div class="form-group">
								<label for="lps_name">Your Name *</label>
								<input type="text" id="lps_name" name="name" class="form-control" placeholder="John Smith" required autocomplete="name">
							</div>
							<div class="form-group">
								<label for="lps_phone">Phone Number *</label>
								<input type="tel" id="lps_phone" name="phone" class="form-control" placeholder="(916) 555-0100" required autocomplete="tel">
							</div>
						</div>

						<div class="form-group">
							<label for="lps_email">Email Address *</label>
							<input type="email" id="lps_email" name="email" class="form-control" placeholder="john@example.com" required autocomplete="email">
						</div>

						<div class="form-row">
							<div class="form-group">
								<label for="lps_service">Service Needed</label>
								<select id="lps_service" name="service" class="form-control">
									<option value="">Select service...</option>
									<option value="weekly">Weekly Pool Cleaning</option>
									<option value="biweekly">Bi-Weekly Cleaning</option>
									<option value="chemical">Chemical Balancing</option>
									<option value="green-pool">Green Pool Treatment</option>
									<option value="equipment">Equipment Repair</option>
									<option value="startup">New Pool Start-Up</option>
									<option value="other">Other / Not Sure</option>
								</select>
							</div>
							<div class="form-group">
								<label for="lps_pool_size">Pool Size</label>
								<select id="lps_pool_size" name="pool_size" class="form-control">
									<option value="">Approximate size...</option>
									<option value="small">Small (&lt; 10,000 gal)</option>
									<option value="medium">Medium (10–20k gal)</option>
									<option value="large">Large (20–40k gal)</option>
									<option value="xlarge">Extra Large (40k+)</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="lps_address">Property Address</label>
							<input type="text" id="lps_address" name="address" class="form-control" placeholder="123 Main St, Fair Oaks, CA" autocomplete="street-address">
						</div>

						<div role="alert" aria-live="polite" style="display:none;"></div>

						<button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:16px;">
							<i class="fas fa-paper-plane" aria-hidden="true"></i> Get My Free Pool Cleaning Quote
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

<!-- =============================================
     TRUST BAR
     ============================================= -->
<div style="background:var(--color-white);border-bottom:1px solid var(--color-gray-100);padding:18px 0;">
	<div class="container">
		<div style="display:flex;flex-wrap:wrap;justify-content:center;gap:32px;align-items:center;">
			<?php
			$trust = array(
				array( 'fas fa-certificate',  'Certified Pool Operators' ),
				array( 'fas fa-dollar-sign',  'Flat-Rate Affordable Pricing' ),
				array( 'fas fa-calendar-check','Same-Week Service Available' ),
				array( 'fas fa-shield-alt',   'Satisfaction Guaranteed' ),
				array( 'fas fa-star',         '500+ Five-Star Reviews' ),
				array( 'fas fa-map-marker-alt','Locally Owned & Operated' ),
			);
			foreach ( $trust as $t ) : ?>
			<div style="display:flex;align-items:center;gap:8px;font-size:0.875rem;font-weight:600;color:var(--color-gray-700);">
				<i class="<?php echo esc_attr( $t[0] ); ?>" style="color:var(--color-primary);" aria-hidden="true"></i>
				<?php echo esc_html( $t[1] ); ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<!-- =============================================
     WHAT'S INCLUDED IN POOL CLEANING SERVICE
     ============================================= -->
<section class="section-padding" style="background:var(--color-gray-100);" aria-labelledby="lps-included-title">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-broom" aria-hidden="true"></i> Pool Cleaning Services</span>
			<h2 class="section-title" id="lps-included-title">What Our Swimming Pool Cleaning Service Includes</h2>
			<p class="section-subtitle">Every professional pool cleaning visit covers everything your pool needs to stay crystal clear, safe, and swim-ready.</p>
		</div>

		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:24px;margin-top:48px;" itemscope itemtype="https://schema.org/ItemList">

			<?php
			$cleaning_items = array(
				array( 'fa-water',          'Surface Skimming',           'We remove all leaves, bugs, and floating debris from the water surface at every visit.' ),
				array( 'fa-broom',          'Brushing Walls & Steps',     'Walls, steps, and the tile waterline are brushed to prevent algae buildup and calcium scaling.' ),
				array( 'fa-wind',           'Pool Floor Vacuuming',       'The entire pool floor is vacuumed to remove settled dirt, debris, and algae spores.' ),
				array( 'fa-filter',         'Basket & Filter Service',    'Pump and skimmer baskets are emptied. Filter pressure is checked and backwashed as needed.' ),
				array( 'fa-flask',          'Water Chemistry Balancing',  'We test and balance pH, chlorine, alkalinity, calcium hardness, and stabilizer at every visit.' ),
				array( 'fa-tools',          'Equipment Inspection',       'Pump, motor, filter, and heater are visually inspected — catching small issues before they become expensive.' ),
			);
			foreach ( $cleaning_items as $i => $item ) : ?>
			<div style="background:var(--color-white);border-radius:var(--radius-lg);padding:28px;box-shadow:var(--shadow-sm);display:flex;gap:16px;" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<meta itemprop="position" content="<?php echo $i + 1; ?>">
				<div style="width:48px;height:48px;background:linear-gradient(135deg,var(--color-primary),var(--color-secondary));border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
					<i class="fas <?php echo esc_attr( $item[0] ); ?>" style="color:white;font-size:1.2rem;" aria-hidden="true"></i>
				</div>
				<div>
					<h3 style="font-size:1rem;color:var(--color-dark);margin-bottom:6px;" itemprop="name"><?php echo esc_html( $item[1] ); ?></h3>
					<p style="font-size:0.875rem;color:var(--color-gray-500);line-height:1.6;margin:0;" itemprop="description"><?php echo esc_html( $item[2] ); ?></p>
				</div>
			</div>
			<?php endforeach; ?>

		</div>
	</div>
</section>

<!-- =============================================
     PRICING — AFFORDABLE POOL CLEANING
     ============================================= -->
<section class="section-padding" style="background:var(--color-white);" aria-labelledby="lps-pricing-title">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-tag" aria-hidden="true"></i> Transparent Pricing</span>
			<h2 class="section-title" id="lps-pricing-title">Affordable Pool Cleaning Plans — No Hidden Fees</h2>
			<p class="section-subtitle">Flat-rate pool cleaning pricing for Sacramento, <?php echo esc_html( $city ); ?>, and the surrounding area. Your quote is locked in — no surprises.</p>
		</div>

		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:24px;margin-top:48px;max-width:900px;margin-left:auto;margin-right:auto;">

			<div style="border:1px solid var(--color-gray-200);border-radius:var(--radius-xl);padding:36px;text-align:center;">
				<h3 style="font-size:1.1rem;color:var(--color-dark);margin-bottom:8px;">Bi-Weekly Cleaning</h3>
				<div style="font-size:2.5rem;font-weight:800;color:var(--color-primary);line-height:1;margin:16px 0 4px;">$89<span style="font-size:1rem;font-weight:400;color:var(--color-gray-500);">/mo</span></div>
				<p style="font-size:0.8rem;color:var(--color-gray-500);margin-bottom:20px;">Service every 2 weeks</p>
				<ul style="text-align:left;display:flex;flex-direction:column;gap:10px;margin-bottom:24px;">
					<?php foreach ( array('Skimming & vacuuming', 'Chemical test & balance', 'Basket service', 'Equipment check') as $f ) : ?>
					<li style="display:flex;align-items:center;gap:8px;font-size:0.875rem;color:var(--color-gray-700);">
						<i class="fas fa-check" style="color:var(--color-primary);" aria-hidden="true"></i> <?php echo esc_html( $f ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
				<a href="#lps-quote-form" class="btn btn-secondary" style="width:100%;justify-content:center;">Get This Rate</a>
			</div>

			<div style="border:2px solid var(--color-primary);border-radius:var(--radius-xl);padding:36px;text-align:center;position:relative;box-shadow:var(--shadow-lg);">
				<div style="position:absolute;top:-14px;left:50%;transform:translateX(-50%);background:var(--color-primary);color:white;font-size:0.75rem;font-weight:700;padding:4px 16px;border-radius:20px;white-space:nowrap;">MOST POPULAR</div>
				<h3 style="font-size:1.1rem;color:var(--color-dark);margin-bottom:8px;">Weekly Pool Cleaning</h3>
				<div style="font-size:2.5rem;font-weight:800;color:var(--color-primary);line-height:1;margin:16px 0 4px;">$129<span style="font-size:1rem;font-weight:400;color:var(--color-gray-500);">/mo</span></div>
				<p style="font-size:0.8rem;color:var(--color-gray-500);margin-bottom:20px;">Service every week</p>
				<ul style="text-align:left;display:flex;flex-direction:column;gap:10px;margin-bottom:24px;">
					<?php foreach ( array('Everything in Bi-Weekly', 'Priority scheduling', 'Digital service reports', 'Free filter rinse') as $f ) : ?>
					<li style="display:flex;align-items:center;gap:8px;font-size:0.875rem;color:var(--color-gray-700);">
						<i class="fas fa-check" style="color:var(--color-primary);" aria-hidden="true"></i> <?php echo esc_html( $f ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
				<a href="#lps-quote-form" class="btn btn-primary" style="width:100%;justify-content:center;">Get This Rate</a>
			</div>

			<div style="border:1px solid var(--color-gray-200);border-radius:var(--radius-xl);padding:36px;text-align:center;">
				<h3 style="font-size:1.1rem;color:var(--color-dark);margin-bottom:8px;">One-Time Clean</h3>
				<div style="font-size:2.5rem;font-weight:800;color:var(--color-primary);line-height:1;margin:16px 0 4px;">$149<span style="font-size:1rem;font-weight:400;color:var(--color-gray-500);">+</span></div>
				<p style="font-size:0.8rem;color:var(--color-gray-500);margin-bottom:20px;">One visit, no commitment</p>
				<ul style="text-align:left;display:flex;flex-direction:column;gap:10px;margin-bottom:24px;">
					<?php foreach ( array('Full deep clean', 'Chemical balancing', 'Pre-party or seasonal', 'Upgrade to plan anytime') as $f ) : ?>
					<li style="display:flex;align-items:center;gap:8px;font-size:0.875rem;color:var(--color-gray-700);">
						<i class="fas fa-check" style="color:var(--color-primary);" aria-hidden="true"></i> <?php echo esc_html( $f ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
				<a href="#lps-quote-form" class="btn btn-secondary" style="width:100%;justify-content:center;">Book One-Time</a>
			</div>

		</div>
		<p style="text-align:center;color:var(--color-gray-500);font-size:0.85rem;margin-top:20px;">All prices are for a standard residential pool. Get a free exact quote for your pool size and location.</p>
	</div>
</section>

<!-- =============================================
     TESTIMONIALS
     ============================================= -->
<section class="section-padding" style="background:var(--color-gray-100);" aria-labelledby="lps-reviews-title">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-star" aria-hidden="true"></i> Customer Reviews</span>
			<h2 class="section-title" id="lps-reviews-title">Why We're the Best Pool Cleaning Service in Sacramento</h2>
		</div>

		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px;margin-top:48px;" itemscope itemtype="https://schema.org/Review">
			<?php
			$reviews = array(
				array( 'Sarah M.',    'Fair Oaks',     5, 'Williams Pool Care has been cleaning my pool for 3 years. They\'re always on time, professional, and my pool has never looked better. Best pool cleaning service I\'ve used — and I\'ve tried a few.' ),
				array( 'David L.',   'Roseville',     5, 'I was looking for an affordable pool cleaning service near me and found Williams. Their pricing is transparent, no hidden fees. Pool is crystal clear every week without fail.' ),
				array( 'Karen R.',   'Citrus Heights', 5, 'Professional pool cleaning at its finest. They showed up same-week, did a thorough job, and left a digital report in my email. Highly recommend to anyone in the Sacramento area.' ),
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
<section class="section-padding" style="background:var(--color-white);" aria-labelledby="lps-faq-title">
	<div class="container" style="max-width:860px;">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-question-circle" aria-hidden="true"></i> FAQ</span>
			<h2 class="section-title" id="lps-faq-title">Pool Cleaning Service — Frequently Asked Questions</h2>
		</div>

		<div style="margin-top:40px;" itemscope itemtype="https://schema.org/FAQPage">
			<?php
			$faqs = array(
				array(
					'What is included in a professional pool cleaning service?',
					'Our professional pool cleaning service includes surface skimming, brushing walls and steps, vacuuming the pool floor, emptying pump and skimmer baskets, testing and balancing all water chemistry (pH, chlorine, alkalinity, calcium, stabilizer), and a full equipment inspection. You receive a digital service report after each visit.',
				),
				array(
					'How much does pool cleaning cost near me in Sacramento?',
					'Williams Pool Care offers affordable pool cleaning starting at $89/month for bi-weekly service and $129/month for weekly cleaning. Pricing may vary slightly based on pool size and location. We provide free, no-obligation quotes — call (916) 532-5561 or fill out the form above.',
				),
				array(
					'How do I find the best pool cleaning service near me?',
					'Look for a certified, locally owned pool cleaning company with verified reviews. Williams Pool Care is CPO-certified, has 500+ five-star reviews, and has served Sacramento-area homeowners for 20+ years. We serve Fair Oaks, Roseville, Folsom, Citrus Heights, Rocklin, Granite Bay, Carmichael, and more.',
				),
				array(
					'What makes Williams Pool Care the best pool cleaning service in Sacramento?',
					'We are certified pool operators, use flat-rate transparent pricing, provide digital service reports, and guarantee our work. Unlike national franchises, we\'re locally owned and our technicians serve the same routes consistently so they know your pool. Same-week service is available.',
				),
				array(
					'Do you offer swimming pool cleaning services without a contract?',
					'Yes — we offer one-time professional pool cleaning with no commitment required. Most customers start with a one-time clean and switch to a weekly or bi-weekly plan after seeing the results. There are no long-term contracts required for any of our plans.',
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
		<h2 style="color:white;font-size:clamp(1.5rem,3vw,2.2rem);margin-bottom:16px;">Ready for a Cleaner Pool? Get a Free Quote Today.</h2>
		<p style="color:rgba(255,255,255,0.8);max-width:540px;margin:0 auto 32px;font-size:1rem;line-height:1.7;">
			Professional pool cleaning service in <?php echo esc_html( $city ); ?> and across Sacramento. Same-week availability. Certified technicians. Affordable flat-rate pricing.
		</p>
		<div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
			<a href="#lps-quote-form" class="btn btn-white btn-lg">
				<i class="fas fa-clipboard-list" aria-hidden="true"></i> Get Free Cleaning Quote
			</a>
			<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-lg" style="border:2px solid rgba(255,255,255,0.5);color:white;">
				<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
			</a>
		</div>
	</div>
</section>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<?php get_footer(); ?>
