<?php
/**
 * Template Name: FAQ Page
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
		<h1 class="page-hero-title"><?php _e( 'Pool Care FAQ', 'aquapro' ); ?></h1>
		<p style="color:rgba(255,255,255,0.7);max-width:560px;margin:12px auto 16px;line-height:1.7;">
			<?php _e( 'Answers to the most common questions about pool cleaning, chemistry, equipment, and our service.', 'aquapro' ); ?>
		</p>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<!-- FAQ Sections -->
<section class="section-padding" style="background:var(--color-white);">
	<div class="container" style="max-width:860px;">

		<?php
		$faq_sections = array(
			array(
				'icon'  => 'fas fa-broom',
				'title' => __( 'Pool Cleaning & Service', 'aquapro' ),
				'faqs'  => array(
					array(
						'q' => __( 'How often should I have my pool cleaned?', 'aquapro' ),
						'a' => __( 'Most residential pools benefit from weekly cleaning, especially during the heavy-use summer months. Weekly service keeps water chemistry balanced, prevents algae growth, and ensures equipment runs efficiently. Bi-weekly service works well for pools with low use or covered pools in mild seasons.', 'aquapro' ),
					),
					array(
						'q' => __( 'What does a professional pool cleaning service include?', 'aquapro' ),
						'a' => __( 'Our complete pool cleaning service includes: skimming the surface, brushing walls and steps, vacuuming the floor, emptying skimmer and pump baskets, testing and balancing water chemistry (pH, chlorine, alkalinity, calcium hardness), adding necessary chemicals, and inspecting all visible pool equipment.', 'aquapro' ),
					),
					array(
						'q' => __( 'Do I need to be home during the pool service?', 'aquapro' ),
						'a' => __( 'No — you don\'t need to be home. Our technicians are licensed, insured, and background-checked. As long as we have gate access, we\'ll complete the service and send you a digital service report right after each visit.', 'aquapro' ),
					),
					array(
						'q' => __( 'Will I get the same technician every visit?', 'aquapro' ),
						'a' => __( 'Yes. We assign a dedicated technician to your pool so they learn your system, your preferences, and your pool\'s history. Consistency means better service — they\'ll catch small problems before they become expensive ones.', 'aquapro' ),
					),
					array(
						'q' => __( 'How quickly can you start service?', 'aquapro' ),
						'a' => __( 'We typically offer same-week start dates for new clients. Call us or fill out the quote form and we\'ll confirm a start date within 2 business hours.', 'aquapro' ),
					),
				),
			),
			array(
				'icon'  => 'fas fa-flask',
				'title' => __( 'Water Chemistry', 'aquapro' ),
				'faqs'  => array(
					array(
						'q' => __( 'How do I know if my pool chemicals are balanced?', 'aquapro' ),
						'a' => __( 'Properly balanced water should have: pH 7.2–7.8, free chlorine 1–3 ppm, total alkalinity 80–120 ppm, and calcium hardness 200–400 ppm. Our technicians test all these levels on every visit and document the readings in your service report.', 'aquapro' ),
					),
					array(
						'q' => __( 'Why does my pool water look cloudy?', 'aquapro' ),
						'a' => __( 'Cloudy water is usually caused by poor filtration, pH imbalance, low sanitizer levels, or high calcium hardness. It can also follow heavy rain or a big pool party. Our technicians diagnose and correct the cause — don\'t just add more chemicals without understanding the root issue.', 'aquapro' ),
					),
					array(
						'q' => __( 'Is saltwater pool maintenance different?', 'aquapro' ),
						'a' => __( 'Yes, saltwater pools still require regular maintenance — the salt cell generates chlorine but water chemistry still needs testing and balancing. Salt cells also need periodic cleaning and inspection. We service both saltwater and traditional chlorine pools.', 'aquapro' ),
					),
					array(
						'q' => __( 'My kids have sensitive skin — can you use gentler chemicals?', 'aquapro' ),
						'a' => __( 'Properly balanced pool water is gentle by definition. The key is keeping pH and chlorine in the correct range — both too high and too low chlorine can cause irritation. We take special care with chemistry balance for families with sensitive skin.', 'aquapro' ),
					),
				),
			),
			array(
				'icon'  => 'fas fa-tools',
				'title' => __( 'Equipment & Repairs', 'aquapro' ),
				'faqs'  => array(
					array(
						'q' => __( 'Do you repair pool equipment?', 'aquapro' ),
						'a' => __( 'Yes — we repair and replace pumps, motors, filters, heaters, salt cells, automation systems, and more. We service all major brands. For most repairs we can give you a flat-rate quote before starting any work.', 'aquapro' ),
					),
					array(
						'q' => __( 'How do I know if my pump is failing?', 'aquapro' ),
						'a' => __( 'Signs of a failing pump include unusual noises (grinding, screeching), reduced water flow, the pump not priming, frequent tripping of the breaker, or visible leaks around the pump housing. Don\'t ignore these — a failed pump leads to a green pool fast.', 'aquapro' ),
					),
					array(
						'q' => __( 'How often should my filter be cleaned?', 'aquapro' ),
						'a' => __( 'Cartridge filters: every 3–6 months depending on use. Sand filters: backwash monthly, full service annually. DE filters: backwash when pressure rises 8–10 psi above clean pressure, full teardown annually. We track this for you and remind you when service is due.', 'aquapro' ),
					),
				),
			),
			array(
				'icon'  => 'fas fa-leaf',
				'title' => __( 'Green Pool & Algae', 'aquapro' ),
				'faqs'  => array(
					array(
						'q' => __( 'Can you fix a green pool?', 'aquapro' ),
						'a' => __( 'Yes — green pool treatment (algae remediation / pool shock) is one of our specialties. Most pools are restored to crystal clear water within 24–72 hours depending on the severity of the algae bloom. We use a multi-step treatment including shock, algaecide, and a filter deep-clean.', 'aquapro' ),
					),
					array(
						'q' => __( 'Why does my pool keep turning green?', 'aquapro' ),
						'a' => __( 'Recurring algae usually means an underlying issue: low or inconsistent chlorine, high phosphate levels, inadequate filtration run time, or a malfunctioning salt cell. We diagnose the root cause so it doesn\'t keep coming back — not just treat the symptom.', 'aquapro' ),
					),
					array(
						'q' => __( 'Is a green pool dangerous to swim in?', 'aquapro' ),
						'a' => __( 'Yes. Green pools indicate inadequate sanitizer, which allows bacteria and algae to thrive. Swimming in a green pool can cause skin rashes, ear infections, and eye irritation. Stay out of the water until it\'s been treated and tested clear.', 'aquapro' ),
					),
				),
			),
			array(
				'icon'  => 'fas fa-dollar-sign',
				'title' => __( 'Pricing & Service Plans', 'aquapro' ),
				'faqs'  => array(
					array(
						'q' => __( 'How much does pool cleaning service cost?', 'aquapro' ),
						'a' => __( 'Our bi-weekly service starts at $89/month and weekly service starts at $129/month. One-time cleanings start at $149. Exact pricing depends on pool size, condition, and your location. Contact us for a free quote — we respond within 2 business hours.', 'aquapro' ),
					),
					array(
						'q' => __( 'Do you have a contract?', 'aquapro' ),
						'a' => __( 'No long-term contracts. Our service is month-to-month. We earn your business every visit. That said, most clients stay with us for years because consistent, quality service keeps pools in better shape and saves money on repairs.', 'aquapro' ),
					),
					array(
						'q' => __( 'Do chemicals cost extra?', 'aquapro' ),
						'a' => __( 'Routine chemicals (chlorine, pH adjustment, alkalinity) are included in our service plans. Specialty treatments like shock, algaecide, phosphate remover, or major chemical overhauls may have an additional charge, which we always disclose before adding.', 'aquapro' ),
					),
					array(
						'q' => __( 'Is there a new client special?', 'aquapro' ),
						'a' => __( 'Yes — new weekly service clients get their first cleaning FREE. Call us or submit the quote form to claim your spot.', 'aquapro' ),
					),
				),
			),
		);

		foreach ( $faq_sections as $section ) : ?>
		<div style="margin-bottom:64px;">
			<h2 style="font-size:1.5rem;color:var(--color-dark);margin-bottom:28px;display:flex;align-items:center;gap:12px;padding-bottom:16px;border-bottom:2px solid var(--color-gray-100);">
				<span style="width:40px;height:40px;background:linear-gradient(135deg,var(--color-primary),var(--color-secondary));border-radius:10px;display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;">
					<i class="<?php echo esc_attr( $section['icon'] ); ?>" style="color:#fff;font-size:0.95rem;" aria-hidden="true"></i>
				</span>
				<?php echo esc_html( $section['title'] ); ?>
			</h2>
			<div class="faq-list" style="max-width:none;">
				<?php foreach ( $section['faqs'] as $faq ) : ?>
				<div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<button class="faq-question" itemprop="name" aria-expanded="false">
						<?php echo esc_html( $faq['q'] ); ?>
						<span class="faq-icon" aria-hidden="true">+</span>
					</button>
					<div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<div class="faq-answer-inner" itemprop="text">
							<?php echo wp_kses_post( $faq['a'] ); ?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endforeach; ?>

		<!-- Still have a question -->
		<div style="background:linear-gradient(135deg,rgba(0,119,182,0.06),rgba(0,180,216,0.06));border:1px solid rgba(0,119,182,0.15);border-radius:20px;padding:40px;text-align:center;margin-top:16px;">
			<h3 style="font-size:1.4rem;color:var(--color-dark);margin-bottom:12px;"><?php _e( 'Still Have a Question?', 'aquapro' ); ?></h3>
			<p style="color:var(--color-gray-500);margin-bottom:28px;line-height:1.7;">
				<?php _e( "We're happy to answer any question about your pool. Call us or send a message — real people, real answers.", 'aquapro' ); ?>
			</p>
			<div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
				<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-primary">
					<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
				</a>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary">
					<?php _e( 'Send a Message', 'aquapro' ); ?>
				</a>
			</div>
		</div>

	</div>
</section>

<!-- CTA -->
<section class="cta-section section-padding">
	<div class="container">
		<div class="cta-grid">
			<div>
				<h2 class="cta-title"><?php printf( __( 'Ready for a Pool You Actually Enjoy in %s?', 'aquapro' ), esc_html( $city ) ); ?></h2>
				<p class="cta-description"><?php _e( 'Get your free no-obligation quote today. We respond within 2 business hours.', 'aquapro' ); ?></p>
			</div>
			<div class="cta-actions">
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-white">
					<?php _e( 'Get Free Quote', 'aquapro' ); ?>
				</a>
				<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-gold btn-lg" style="width:100%;justify-content:center;">
					<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
				</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
