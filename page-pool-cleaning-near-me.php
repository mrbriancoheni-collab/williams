<?php
/**
 * Template Name: Landing – Pool Cleaning Near Me
 *
 * Tight keyword match for:
 * [Pool Cleaning Service Near Me], [Affordable Pool Cleaning],
 * [Best Pool Cleaning Services], [Swimming Pool Cleaning Services]
 *
 * @package AquaPro
 */

add_action( 'wp_head', function() {
	$phone = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
	$city  = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
	echo '<meta name="description" content="Pool cleaning service near you in ' . esc_attr( $city ) . ' &amp; Sacramento. Affordable, professional swimming pool cleaning from certified technicians. Same-week service. Call ' . esc_attr( $phone ) . '.">' . "\n";
	?>
	<script type="application/ld+json">{"@context":"https://schema.org","@type":"Service","name":"Pool Cleaning Service Near Me","alternateName":["Affordable Pool Cleaning","Best Pool Cleaning Services","Swimming Pool Cleaning Services Near Me"],"description":"Professional pool cleaning service near you in Sacramento and Fair Oaks. Affordable rates, certified technicians, same-week availability.","provider":{"@type":"LocalBusiness","name":"Williams Pool Care","telephone":"<?php echo esc_js( $phone ); ?>"},"areaServed":["Sacramento","Fair Oaks","Roseville","Folsom","Citrus Heights","Rocklin","Orangevale","Granite Bay","Carmichael","Rancho Cordova"]}</script>
	<script type="application/ld+json">{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Is there a pool cleaning service near me in Sacramento?","acceptedAnswer":{"@type":"Answer","text":"Yes — Williams Pool Care provides pool cleaning service throughout Sacramento, Fair Oaks, Roseville, Folsom, Citrus Heights, Rocklin, Granite Bay, Carmichael, Orangevale, and Rancho Cordova. Same-week service is available. Call (916) 532-5561 or request a free quote online."}},{"@type":"Question","name":"What is the most affordable pool cleaning service near me?","acceptedAnswer":{"@type":"Answer","text":"Williams Pool Care offers the most competitive flat-rate pool cleaning pricing in the Sacramento area. Bi-weekly pool cleaning starts at $89/month and weekly service starts at $129/month, with no hidden fees. We include chemical balancing, equipment inspection, and a digital service report at every visit."}}]}</script>
	<?php
}, 5 );

get_header();
$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$city       = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
?>

<section class="hero-section" style="min-height:auto;padding-bottom:0;" aria-labelledby="lpcnm-title">
	<div class="hero-background" aria-hidden="true">
		<div class="hero-bg-image" style="background:linear-gradient(135deg,#0D1B2A,#005F92,#0096C7);width:100%;height:100%;"></div>
		<div class="hero-bg-gradient"></div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60" preserveAspectRatio="none"><path fill="#f9fafb" d="M0,40L48,36.7C96,33,192,27,288,28C384,29,480,37,576,38.3C672,39,768,33,864,29.3C960,25,1056,23,1152,26.7C1248,31,1344,39,1392,43L1440,47L1440,60L0,60Z"></path></svg>
	</div>
	<div class="container hero-content">
		<div class="hero-grid">
			<div class="hero-left">
				<div class="hero-badge"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Serving <?php echo esc_html( $city ); ?> &amp; All Sacramento Communities</div>
				<h1 class="hero-title" id="lpcnm-title">
					Pool Cleaning Service<br>Near Me — <?php echo esc_html( $city ); ?><br>
					<span class="highlight">Affordable. Same-Week.</span>
				</h1>
				<p class="hero-description">Williams Pool Care is the highest-rated pool cleaning service near you. Certified technicians, flat-rate affordable pricing starting at $89/month, and same-week service available across Sacramento and <?php echo esc_html( $city ); ?>.</p>
				<div class="hero-actions">
					<a href="#lpcnm-form" class="btn btn-primary btn-lg"><i class="fas fa-clipboard-list" aria-hidden="true"></i> Get Free Quote</a>
					<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-white btn-lg"><i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?></a>
				</div>
				<div class="hero-stats" style="margin-top:32px;">
					<div class="hero-stat"><span class="hero-stat-number">20+</span><span class="hero-stat-label">Years Local</span></div>
					<div class="hero-stat" style="border-left:1px solid rgba(255,255,255,0.15);padding-left:32px;"><span class="hero-stat-number">$89</span><span class="hero-stat-label">Starting /mo</span></div>
					<div class="hero-stat" style="border-left:1px solid rgba(255,255,255,0.15);padding-left:32px;"><span class="hero-stat-number">500+</span><span class="hero-stat-label">5-Star Reviews</span></div>
				</div>
			</div>
			<div class="hero-right">
				<div class="hero-form-card" id="lpcnm-form">
					<div style="background:#FEF3C7;border:1px solid #F59E0B;border-radius:var(--radius-sm);padding:8px 14px;margin-bottom:14px;font-size:0.82rem;font-weight:600;color:#92400E;display:flex;align-items:center;gap:8px;">
						<i class="fas fa-calendar-check" aria-hidden="true"></i>
						<span>Summer slots filling fast — <strong>3 openings left this week</strong></span>
					</div>
					<h2 class="hero-form-title">Get Free Quote — Pool Cleaning Near You</h2>
					<p class="hero-form-subtitle">Response within <strong>2 business hours.</strong> No commitment.</p>
					<form id="quoteForm" class="quote-form" novalidate>
						<?php wp_nonce_field( 'aquapro_nonce', 'nonce' ); ?>
						<input type="hidden" name="action" value="aquapro_quote">
						<div class="form-row">
							<div class="form-group">
								<label for="lpcnm_name">Your Name *</label>
								<input type="text" id="lpcnm_name" name="name" class="form-control" placeholder="John Smith" required autocomplete="name">
							</div>
							<div class="form-group">
								<label for="lpcnm_phone">Phone *</label>
								<input type="tel" id="lpcnm_phone" name="phone" class="form-control" placeholder="(916) 555-0100" required autocomplete="tel">
							</div>
						</div>
						<div class="form-group">
							<label for="lpcnm_email">Email *</label>
							<input type="email" id="lpcnm_email" name="email" class="form-control" placeholder="john@example.com" required autocomplete="email">
						</div>
						<div class="form-row">
							<div class="form-group">
								<label for="lpcnm_service">Service</label>
								<select id="lpcnm_service" name="service" class="form-control">
									<option value="">Select...</option>
									<option value="weekly">Weekly Cleaning ($129/mo)</option>
									<option value="biweekly">Bi-Weekly ($89/mo)</option>
									<option value="one-time">One-Time Clean ($149+)</option>
									<option value="green-pool">Green Pool Treatment</option>
									<option value="other">Other / Not Sure</option>
								</select>
							</div>
							<div class="form-group">
								<label for="lpcnm_address">Address</label>
								<input type="text" id="lpcnm_address" name="address" class="form-control" placeholder="Street address, city" autocomplete="street-address">
							</div>
						</div>
						<input type="hidden" name="pool_size" value="unknown">
						<div role="alert" aria-live="polite" style="display:none;"></div>
						<button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:16px;">
							<i class="fas fa-paper-plane" aria-hidden="true"></i> Get My Free Pool Cleaning Quote
						</button>
						<p style="font-size:0.78rem;color:var(--color-gray-500);text-align:center;margin-top:10px;"><i class="fas fa-lock" aria-hidden="true"></i> No spam. No commitment.</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require get_template_directory() . '/inc/lp-trust-bar.php'; ?>

<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Local Pool Cleaning</span>
			<h2 class="section-title">The Best Pool Cleaning Service Near <?php echo esc_html( $city ); ?></h2>
			<p class="section-subtitle">Not a national franchise — we're your neighbors. Williams Pool Care has been the most trusted swimming pool cleaning service in Sacramento since <?php echo esc_html( get_theme_mod('aquapro_founded','2004') ); ?>.</p>
		</div>
		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:20px;margin-top:40px;">
			<?php
			$why = array(
				array('fa-dollar-sign','Affordable Flat-Rate Pricing','Weekly cleaning from $89/mo. No surprise charges — your rate is locked in from day one.'),
				array('fa-calendar-check','Same-Week Service','Call today and we\'ll have your pool scheduled this week. No 3-week wait lists.'),
				array('fa-certificate','CPO-Certified Technicians','Every tech is a Certified Pool Operator — not just a hired worker with a net.'),
				array('fa-mobile-alt','Digital Service Reports','After every visit you receive a report with water chemistry readings and any notes.'),
				array('fa-shield-alt','Satisfaction Guaranteed','If your pool isn\'t crystal clear after our visit, we come back — at no charge.'),
				array('fa-map-marker-alt','Locally Owned & Operated','We live and work here. Your satisfaction is our neighborhood reputation.'),
			);
			foreach ($why as $w) : ?>
			<div style="background:var(--color-white);border-radius:var(--radius-lg);padding:24px;box-shadow:var(--shadow-sm);display:flex;gap:14px;">
				<div style="width:44px;height:44px;background:var(--color-primary);border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
					<i class="fas <?php echo esc_attr($w[0]); ?>" style="color:white;" aria-hidden="true"></i>
				</div>
				<div>
					<h3 style="font-size:0.95rem;color:var(--color-dark);margin-bottom:6px;"><?php echo esc_html($w[1]); ?></h3>
					<p style="font-size:0.85rem;color:var(--color-gray-500);margin:0;line-height:1.6;"><?php echo esc_html($w[2]); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section-padding" style="background:var(--color-white);" itemscope itemtype="https://schema.org/FAQPage">
	<div class="container" style="max-width:800px;">
		<div class="section-header center">
			<h2 class="section-title">Pool Cleaning Service Near Me — FAQ</h2>
		</div>
		<div style="margin-top:32px;">
			<?php
			$faqs = array(
				array('Is there a pool cleaning service near me in Sacramento?','Yes — Williams Pool Care serves Sacramento, Fair Oaks, Roseville, Folsom, Citrus Heights, Rocklin, Granite Bay, Carmichael, Orangevale, and Rancho Cordova. Same-week service is available. Call (916) 532-5561 or request a quote above.'),
				array('What is the most affordable pool cleaning service near me?','Williams Pool Care offers flat-rate pool cleaning starting at $89/month for bi-weekly service and $129/month weekly. No hidden fees, no chemicals upcharge. We include water chemistry balancing and equipment inspection at every visit.'),
				array('What makes Williams the best pool cleaning service in Sacramento?','500+ five-star Google reviews, 20+ years in business, CPO-certified technicians, digital service reports, and a 100% satisfaction guarantee. We\'re locally owned — your pool is our reputation.'),
				array('How quickly can I get pool cleaning service near me?','Most customers in the Sacramento area are scheduled within the same week. Call us at (916) 532-5561 or fill out the form above for a same-day response.'),
			);
			foreach ($faqs as $faq) : ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="border-bottom:1px solid var(--color-gray-100);padding:18px 0;">
				<h3 itemprop="name" style="font-size:0.95rem;color:var(--color-dark);cursor:pointer;display:flex;justify-content:space-between;align-items:center;margin:0;" onclick="var a=this.nextElementSibling;a.style.display=a.style.display==='none'?'block':'none'">
					<?php echo esc_html($faq[0]); ?>
					<i class="fas fa-chevron-down" style="color:var(--color-primary);font-size:0.8rem;flex-shrink:0;margin-left:12px;" aria-hidden="true"></i>
				</h3>
				<div itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer" style="display:none;padding-top:10px;">
					<p itemprop="text" style="font-size:0.875rem;color:var(--color-gray-600);line-height:1.7;margin:0;"><?php echo esc_html($faq[1]); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section style="background:linear-gradient(135deg,var(--color-primary),var(--color-primary-dark));padding:56px 0;text-align:center;">
	<div class="container">
		<h2 style="color:white;font-size:clamp(1.4rem,3vw,2rem);margin-bottom:12px;">Pool Cleaning Service Near You — Call or Get a Free Quote</h2>
		<p style="color:rgba(255,255,255,0.8);max-width:500px;margin:0 auto 28px;">Affordable pool cleaning in <?php echo esc_html($city); ?> &amp; Sacramento. Same-week service. Certified techs. Starting at $89/mo.</p>
		<div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
			<a href="#lpcnm-form" class="btn btn-white btn-lg"><i class="fas fa-clipboard-list" aria-hidden="true"></i> Get Free Quote</a>
			<a href="tel:+<?php echo esc_attr($phone_link); ?>" class="btn btn-lg" style="border:2px solid rgba(255,255,255,0.5);color:white;"><i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html($phone); ?></a>
		</div>
	</div>
</section>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<div id="lpcnmMobileCta" style="display:none;position:fixed;bottom:0;left:0;right:0;z-index:9999;background:var(--color-primary);padding:12px 16px;box-shadow:0 -4px 16px rgba(0,0,0,0.2);">
	<div style="display:flex;gap:10px;max-width:480px;margin:0 auto;">
		<a href="tel:+<?php echo esc_attr($phone_link); ?>" style="flex:1;background:white;color:var(--color-primary);font-weight:700;font-size:0.9rem;padding:12px;border-radius:var(--radius-sm);text-align:center;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:6px;">
			<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html($phone); ?>
		</a>
		<a href="#lpcnm-form" style="flex:1;background:rgba(255,255,255,0.15);color:white;font-weight:700;font-size:0.9rem;padding:12px;border-radius:var(--radius-sm);text-align:center;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:6px;border:1px solid rgba(255,255,255,0.3);">
			<i class="fas fa-clipboard-list" aria-hidden="true"></i> Free Quote
		</a>
	</div>
</div>
<script>(function(){var b=document.getElementById('lpcnmMobileCta');if(!b)return;function s(){if(window.innerWidth<768){b.style.display='block';document.body.style.paddingBottom='70px';}else{b.style.display='none';document.body.style.paddingBottom='';}}s();window.addEventListener('resize',s);})();</script>

<?php get_footer(); ?>
