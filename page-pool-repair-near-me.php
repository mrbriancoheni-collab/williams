<?php
/**
 * Template Name: Landing – Pool Repair Near Me
 *
 * Tight keyword match for:
 * "pool repair", "pool repairs", [pool repairs near me]
 *
 * @package AquaPro
 */

add_action( 'wp_head', function() {
	$phone = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
	$city  = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
	echo '<meta name="description" content="Pool repair near you in ' . esc_attr( $city ) . ' &amp; Sacramento. Fast pool repairs for pumps, filters, heaters &amp; more. Certified technicians. Most repairs done in 1–3 days. Call ' . esc_attr( $phone ) . '.">' . "\n";
	?>
	<script type="application/ld+json">{"@context":"https://schema.org","@type":"Service","name":"Pool Repair Near Me","alternateName":["Pool Repairs Near Me","Pool Repair Sacramento","Pool Equipment Repair"],"description":"Professional pool repair service in Sacramento, Fair Oaks, and surrounding communities. We repair pumps, motors, filters, heaters, salt cells, and automation systems for all major brands.","provider":{"@type":"LocalBusiness","name":"Williams Pool Care","telephone":"<?php echo esc_js( $phone ); ?>"},"areaServed":["Sacramento","Fair Oaks","Roseville","Folsom","Citrus Heights","Rocklin","Orangevale","Granite Bay","Carmichael","Rancho Cordova"]}</script>
	<script type="application/ld+json">{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Who does pool repairs near me in Sacramento?","acceptedAnswer":{"@type":"Answer","text":"Williams Pool Care provides pool repairs throughout Sacramento, Fair Oaks, Roseville, Folsom, Citrus Heights, Rocklin, and surrounding communities. We repair pumps, motors, filters, heaters, salt cells, and automation systems. Call (916) 532-5561 for same-day diagnosis."}},{"@type":"Question","name":"How much does a pool repair cost near me?","acceptedAnswer":{"@type":"Answer","text":"Pool repair costs vary by the type of repair needed. Williams Pool Care uses flat-rate transparent pricing with no hidden fees. Common repairs: pump motor replacement from $350, filter repair from $150, heater diagnosis from $99. We provide a free repair estimate before any work begins."}}]}</script>
	<?php
}, 5 );

get_header();
$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$city       = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
?>

<section class="hero-section" style="min-height:auto;padding-bottom:0;" aria-labelledby="lprnm-title">
	<div class="hero-background" aria-hidden="true">
		<div class="hero-bg-image" style="background:linear-gradient(135deg,#1A1A2E,#16213E,#0F3460);width:100%;height:100%;"></div>
		<div class="hero-bg-gradient"></div>
	</div>
	<div class="hero-wave" aria-hidden="true">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60" preserveAspectRatio="none"><path fill="#f9fafb" d="M0,40L48,36.7C96,33,192,27,288,28C384,29,480,37,576,38.3C672,39,768,33,864,29.3C960,25,1056,23,1152,26.7C1248,31,1344,39,1392,43L1440,47L1440,60L0,60Z"></path></svg>
	</div>
	<div class="container hero-content">
		<div class="hero-grid">
			<div class="hero-left">
				<div class="hero-badge"><i class="fas fa-wrench" aria-hidden="true"></i> Pool Repairs Near You — <?php echo esc_html( $city ); ?> &amp; Sacramento</div>
				<h1 class="hero-title" id="lprnm-title">
					Pool Repair Near Me —<br>Fast, Reliable Pool Repairs<br>
					<span class="highlight">All Brands. Flat-Rate Pricing.</span>
				</h1>
				<p class="hero-description">Pool pump broken? Filter failing? Heater not heating? Williams Pool Care diagnoses and fixes pool repairs throughout <?php echo esc_html( $city ); ?> and Sacramento — most repairs completed within 1–3 business days. All major brands serviced.</p>
				<div class="hero-actions">
					<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-primary btn-lg"><i class="fas fa-phone" aria-hidden="true"></i> Call for Pool Repair</a>
					<a href="#lprnm-form" class="btn btn-white btn-lg"><i class="fas fa-clipboard-list" aria-hidden="true"></i> Get Free Estimate</a>
				</div>
				<div style="display:flex;gap:16px;flex-wrap:wrap;margin-top:24px;">
					<?php foreach(array('Same-day diagnosis available','Flat-rate transparent pricing','All major brands: Pentair, Hayward, Jandy','Licensed & insured technicians') as $b) : ?>
					<div style="display:flex;align-items:center;gap:6px;color:rgba(255,255,255,0.85);font-size:0.82rem;">
						<i class="fas fa-check-circle" style="color:#4ADE80;" aria-hidden="true"></i> <?php echo esc_html($b); ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="hero-right">
				<div class="hero-form-card" id="lprnm-form">
					<div style="background:#FEF3C7;border:1px solid #F59E0B;border-radius:var(--radius-sm);padding:8px 14px;margin-bottom:14px;font-size:0.82rem;font-weight:600;color:#92400E;display:flex;align-items:center;gap:8px;">
						<i class="fas fa-bolt" aria-hidden="true"></i>
						<span>Emergency repairs available — <strong>call now for fastest response</strong></span>
					</div>
					<h2 class="hero-form-title">Get a Free Pool Repair Estimate</h2>
					<p class="hero-form-subtitle">Describe the issue — we'll respond within <strong>2 hours.</strong></p>
					<form id="quoteForm" class="quote-form" novalidate>
						<?php wp_nonce_field( 'aquapro_nonce', 'nonce' ); ?>
						<input type="hidden" name="action" value="aquapro_quote">
						<div class="form-row">
							<div class="form-group">
								<label for="lprnm_name">Your Name *</label>
								<input type="text" id="lprnm_name" name="name" class="form-control" placeholder="John Smith" required autocomplete="name">
							</div>
							<div class="form-group">
								<label for="lprnm_phone">Phone *</label>
								<input type="tel" id="lprnm_phone" name="phone" class="form-control" placeholder="(916) 555-0100" required autocomplete="tel">
							</div>
						</div>
						<div class="form-group">
							<label for="lprnm_email">Email *</label>
							<input type="email" id="lprnm_email" name="email" class="form-control" placeholder="john@example.com" required autocomplete="email">
						</div>
						<div class="form-group">
							<label for="lprnm_service">What needs repair?</label>
							<select id="lprnm_service" name="service" class="form-control">
								<option value="">Select issue...</option>
								<option value="pump-repair">Pump / Motor Not Working</option>
								<option value="filter-repair">Filter Issue</option>
								<option value="heater-repair">Heater Not Heating</option>
								<option value="salt-cell">Salt Cell / Chlorinator</option>
								<option value="leak">Pool Leak</option>
								<option value="automation">Automation / Controls</option>
								<option value="other-repair">Other / Not Sure</option>
							</select>
						</div>
						<div class="form-group">
							<label for="lprnm_address">Property Address</label>
							<input type="text" id="lprnm_address" name="address" class="form-control" placeholder="Street address, city" autocomplete="street-address">
						</div>
						<input type="hidden" name="pool_size" value="unknown">
						<div role="alert" aria-live="polite" style="display:none;"></div>
						<button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:16px;">
							<i class="fas fa-paper-plane" aria-hidden="true"></i> Get My Free Repair Estimate
						</button>
						<p style="font-size:0.78rem;color:var(--color-gray-500);text-align:center;margin-top:10px;"><i class="fas fa-lock" aria-hidden="true"></i> No spam. Free diagnosis, no obligation.</p>
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
			<span class="section-badge"><i class="fas fa-wrench" aria-hidden="true"></i> Pool Repairs We Handle</span>
			<h2 class="section-title">Pool Repairs Near <?php echo esc_html($city); ?> — All Equipment Types</h2>
			<p class="section-subtitle">We service and repair all major pool equipment brands including Pentair, Hayward, Jandy, and Zodiac.</p>
		</div>
		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:20px;margin-top:40px;">
			<?php
			$repairs = array(
				array('fa-cog','#2563EB','Pump & Motor Repair','Noisy pump, no flow, tripping breaker? We diagnose and repair or replace pool pump motors same-week. All major brands.'),
				array('fa-filter','#7C3AED','Filter Repair & Service','D.E., cartridge, and sand filter repair. Filter deep-cleaning, DE grid replacement, multiport valve repair.'),
				array('fa-fire','#DC2626','Heater Diagnosis & Repair','Gas and heat pump heater troubleshooting and repair. Most heater issues diagnosed in one visit.'),
				array('fa-tint','#059669','Salt Cell & Chlorinator','Salt cell cleaning, testing, and replacement. Salt system calibration and automation integration.'),
				array('fa-search','#D97706','Leak Detection','Pool losing water? We use dye testing and pressure testing to locate and repair pool leaks fast.'),
				array('fa-microchip','#0891B2','Automation & Controls','Pentair IntelliTouch, Jandy iAquaLink, Hayward Omnilogic — programming, repairs, and upgrades.'),
			);
			foreach ($repairs as $r) : ?>
			<div style="background:var(--color-white);border-radius:var(--radius-lg);padding:26px;box-shadow:var(--shadow-sm);">
				<div style="width:48px;height:48px;background:<?php echo esc_attr($r[1]); ?>;border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;margin-bottom:14px;">
					<i class="fas <?php echo esc_attr($r[0]); ?>" style="color:white;font-size:1.2rem;" aria-hidden="true"></i>
				</div>
				<h3 style="font-size:1rem;color:var(--color-dark);margin-bottom:8px;"><?php echo esc_html($r[2]); ?></h3>
				<p style="font-size:0.85rem;color:var(--color-gray-500);line-height:1.6;margin:0;"><?php echo esc_html($r[3]); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section-padding" style="background:var(--color-white);" itemscope itemtype="https://schema.org/FAQPage">
	<div class="container" style="max-width:800px;">
		<div class="section-header center">
			<h2 class="section-title">Pool Repairs Near Me — FAQ</h2>
		</div>
		<div style="margin-top:32px;">
			<?php
			$faqs = array(
				array('Who does pool repairs near me in Sacramento?','Williams Pool Care provides pool repairs throughout Sacramento, Fair Oaks, Roseville, Folsom, Citrus Heights, Rocklin, Granite Bay, Carmichael, Orangevale, and Rancho Cordova. Call (916) 532-5561 for a same-day diagnosis.'),
				array('How much does a pool repair cost near me?','Pool repair costs depend on the issue. Common repairs: pump motor replacement from $350, filter repair from $150, heater diagnosis from $99. We provide a free estimate before any work begins — no surprise charges.'),
				array('How fast can you do a pool repair near me?','Most pool repairs in the Sacramento area are diagnosed within 24 hours of your call and completed within 1–3 business days. Emergency same-day service is available for critical failures.'),
				array('What pool equipment brands do you repair?','We repair all major brands including Pentair, Hayward, Jandy, Zodiac, Sta-Rite, and more. Our technicians are factory-trained on the most common residential pool equipment.'),
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
		<h2 style="color:white;font-size:clamp(1.4rem,3vw,2rem);margin-bottom:12px;">Need a Pool Repair Near You? Call or Get a Free Estimate.</h2>
		<p style="color:rgba(255,255,255,0.8);max-width:500px;margin:0 auto 28px;">Serving <?php echo esc_html($city); ?> &amp; Sacramento. Fast pool repairs, all brands, flat-rate pricing.</p>
		<div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
			<a href="tel:+<?php echo esc_attr($phone_link); ?>" class="btn btn-white btn-lg"><i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html($phone); ?></a>
			<a href="#lprnm-form" class="btn btn-lg" style="border:2px solid rgba(255,255,255,0.5);color:white;"><i class="fas fa-clipboard-list" aria-hidden="true"></i> Free Repair Estimate</a>
		</div>
	</div>
</section>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<div id="lprnmMobileCta" style="display:none;position:fixed;bottom:0;left:0;right:0;z-index:9999;background:var(--color-primary);padding:12px 16px;box-shadow:0 -4px 16px rgba(0,0,0,0.2);">
	<div style="display:flex;gap:10px;max-width:480px;margin:0 auto;">
		<a href="tel:+<?php echo esc_attr($phone_link); ?>" style="flex:1;background:white;color:var(--color-primary);font-weight:700;font-size:0.9rem;padding:12px;border-radius:var(--radius-sm);text-align:center;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:6px;">
			<i class="fas fa-phone" aria-hidden="true"></i> Call for Repair
		</a>
		<a href="#lprnm-form" style="flex:1;background:rgba(255,255,255,0.15);color:white;font-weight:700;font-size:0.9rem;padding:12px;border-radius:var(--radius-sm);text-align:center;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:6px;border:1px solid rgba(255,255,255,0.3);">
			<i class="fas fa-clipboard-list" aria-hidden="true"></i> Free Estimate
		</a>
	</div>
</div>
<script>(function(){var b=document.getElementById('lprnmMobileCta');if(!b)return;function s(){if(window.innerWidth<768){b.style.display='block';document.body.style.paddingBottom='70px';}else{b.style.display='none';document.body.style.paddingBottom='';}}s();window.addEventListener('resize',s);})();</script>

<?php get_footer(); ?>
