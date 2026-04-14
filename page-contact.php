<?php
/**
 * Template Name: Contact Page
 * Template Post Type: page
 *
 * @package AquaPro
 */

get_header();

$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$email      = get_theme_mod( 'aquapro_email', 'williamspoolscare@gmail.com' );
$address    = get_theme_mod( 'aquapro_address', 'Fair Oaks, CA 95628' );
$hours      = get_theme_mod( 'aquapro_hours', 'Mon–Sat: 7AM–6PM' );
$city       = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title"><?php _e( 'Contact Us', 'aquapro' ); ?></h1>
		<p style="color:rgba(255,255,255,0.7);max-width:520px;margin:12px auto 16px;line-height:1.7;">
			<?php _e( "Ready for a crystal clear pool? Get your free no-obligation quote. We respond within 2 business hours.", 'aquapro' ); ?>
		</p>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<div style="display:grid;grid-template-columns:1.2fr 1fr;gap:60px;align-items:start;">

			<!-- Contact Form -->
			<div>
				<div style="background:var(--color-white);border-radius:var(--radius-xl);padding:48px;box-shadow:var(--shadow-md);">
					<h2 style="font-size:1.8rem;color:var(--color-dark);margin-bottom:8px;">
						<?php _e( 'Get Your Free Pool Quote', 'aquapro' ); ?>
					</h2>
					<p style="color:var(--color-gray-500);margin-bottom:32px;">
						<?php _e( 'Fill out the form below and a member of our team will be in touch within 2 business hours.', 'aquapro' ); ?>
					</p>

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>

					<!-- Inline contact form if no form plugin -->
					<form id="contactPageForm" novalidate>
						<?php wp_nonce_field( 'aquapro_nonce', 'contact_nonce' ); ?>

						<div class="form-row">
							<div class="form-group">
								<label for="cp_name"><?php _e( 'Full Name *', 'aquapro' ); ?></label>
								<input type="text" id="cp_name" name="name" class="form-control" required
									placeholder="<?php esc_attr_e( 'Your full name', 'aquapro' ); ?>">
							</div>
							<div class="form-group">
								<label for="cp_phone"><?php _e( 'Phone Number *', 'aquapro' ); ?></label>
								<input type="tel" id="cp_phone" name="phone" class="form-control" required
									placeholder="<?php esc_attr_e( '(916) 555-0100', 'aquapro' ); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="cp_email"><?php _e( 'Email Address *', 'aquapro' ); ?></label>
							<input type="email" id="cp_email" name="email" class="form-control" required
								placeholder="<?php esc_attr_e( 'your@email.com', 'aquapro' ); ?>">
						</div>
						<div class="form-row">
							<div class="form-group">
								<label for="cp_service"><?php _e( 'Service Needed', 'aquapro' ); ?></label>
								<select id="cp_service" name="service" class="form-control">
									<option value=""><?php _e( 'Select service...', 'aquapro' ); ?></option>
									<option value="weekly"><?php _e( 'Weekly Cleaning', 'aquapro' ); ?></option>
									<option value="biweekly"><?php _e( 'Bi-Weekly Cleaning', 'aquapro' ); ?></option>
									<option value="chemical"><?php _e( 'Chemical Balancing', 'aquapro' ); ?></option>
									<option value="green-pool"><?php _e( 'Green Pool Treatment', 'aquapro' ); ?></option>
									<option value="equipment"><?php _e( 'Equipment Repair', 'aquapro' ); ?></option>
									<option value="startup"><?php _e( 'New Pool Start-Up', 'aquapro' ); ?></option>
									<option value="other"><?php _e( 'Other / Not Sure', 'aquapro' ); ?></option>
								</select>
							</div>
							<div class="form-group">
								<label for="cp_pool_size"><?php _e( 'Pool Size (approx.)', 'aquapro' ); ?></label>
								<select id="cp_pool_size" name="pool_size" class="form-control">
									<option value=""><?php _e( 'Select size...', 'aquapro' ); ?></option>
									<option value="small"><?php _e( 'Small (&lt;10k gal)', 'aquapro' ); ?></option>
									<option value="medium"><?php _e( 'Medium (10–20k gal)', 'aquapro' ); ?></option>
									<option value="large"><?php _e( 'Large (20–40k gal)', 'aquapro' ); ?></option>
									<option value="xlarge"><?php _e( 'XL (40k+ gal)', 'aquapro' ); ?></option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="cp_address"><?php _e( 'Pool Address', 'aquapro' ); ?></label>
							<input type="text" id="cp_address" name="address" class="form-control"
								placeholder="<?php esc_attr_e( '123 Main St, Fair Oaks, CA', 'aquapro' ); ?>">
						</div>
						<div class="form-group">
							<label for="cp_message"><?php _e( 'Additional Notes', 'aquapro' ); ?></label>
							<textarea id="cp_message" name="message" class="form-control" rows="4"
								placeholder="<?php esc_attr_e( 'Tell us about your pool, any known issues, preferred service days, etc.', 'aquapro' ); ?>"></textarea>
						</div>

						<div id="contactPageMsg" role="alert" aria-live="polite" style="display:none;"></div>

						<button type="submit" class="btn btn-primary form-submit-btn" id="contactSubmitBtn">
							<i class="fas fa-paper-plane" aria-hidden="true"></i>
							<?php _e( 'Send My Quote Request', 'aquapro' ); ?>
						</button>

						<p class="form-trust" style="margin-top:16px;">
							<i class="fas fa-lock" aria-hidden="true"></i>
							<?php _e( 'Your information is secure and never shared.', 'aquapro' ); ?>
						</p>
					</form>
				</div>
			</div>

			<!-- Contact Info -->
			<div>
				<div style="background:linear-gradient(135deg,var(--color-primary),var(--color-primary-dark));border-radius:var(--radius-xl);padding:40px;color:white;margin-bottom:24px;">
					<h3 style="color:white;font-size:1.3rem;margin-bottom:24px;">
						<?php _e( 'Contact Information', 'aquapro' ); ?>
					</h3>

					<div style="display:flex;flex-direction:column;gap:20px;">
						<div style="display:flex;gap:16px;align-items:flex-start;">
							<div style="width:44px;height:44px;background:rgba(255,255,255,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.1rem;">
								<i class="fas fa-phone-alt" aria-hidden="true"></i>
							</div>
							<div>
								<div style="font-size:0.75rem;color:rgba(255,255,255,0.6);text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;"><?php _e( 'Call Us', 'aquapro' ); ?></div>
								<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" style="color:white;font-size:1.2rem;font-weight:700;"><?php echo esc_html( $phone ); ?></a>
								<div style="font-size:0.8rem;color:rgba(255,255,255,0.6);margin-top:2px;"><?php _e( 'Real person answers. No answering service.', 'aquapro' ); ?></div>
							</div>
						</div>

						<div style="display:flex;gap:16px;align-items:flex-start;">
							<div style="width:44px;height:44px;background:rgba(255,255,255,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.1rem;">
								<i class="fas fa-envelope" aria-hidden="true"></i>
							</div>
							<div>
								<div style="font-size:0.75rem;color:rgba(255,255,255,0.6);text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;"><?php _e( 'Email', 'aquapro' ); ?></div>
								<a href="mailto:<?php echo esc_attr( $email ); ?>" style="color:white;font-weight:600;"><?php echo esc_html( $email ); ?></a>
							</div>
						</div>

						<div style="display:flex;gap:16px;align-items:flex-start;">
							<div style="width:44px;height:44px;background:rgba(255,255,255,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.1rem;">
								<i class="fas fa-map-marker-alt" aria-hidden="true"></i>
							</div>
							<div>
								<div style="font-size:0.75rem;color:rgba(255,255,255,0.6);text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;"><?php _e( 'Service Area', 'aquapro' ); ?></div>
								<div style="color:white;font-weight:600;"><?php echo esc_html( $address ); ?></div>
								<div style="font-size:0.8rem;color:rgba(255,255,255,0.6);margin-top:2px;"><?php _e( 'Sacramento, Roseville, Citrus Heights &amp; surrounding areas', 'aquapro' ); ?></div>
							</div>
						</div>

						<div style="display:flex;gap:16px;align-items:flex-start;">
							<div style="width:44px;height:44px;background:rgba(255,255,255,0.15);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.1rem;">
								<i class="fas fa-clock" aria-hidden="true"></i>
							</div>
							<div>
								<div style="font-size:0.75rem;color:rgba(255,255,255,0.6);text-transform:uppercase;letter-spacing:1px;margin-bottom:4px;"><?php _e( 'Business Hours', 'aquapro' ); ?></div>
								<div style="color:white;font-weight:600;"><?php echo esc_html( $hours ); ?></div>
							</div>
						</div>
					</div>
				</div>

				<!-- Response Time Promise -->
				<div style="background:var(--color-white);border-radius:var(--radius-lg);padding:28px;box-shadow:var(--shadow-md);text-align:center;">
					<div style="font-size:2.5rem;margin-bottom:12px;" aria-hidden="true">⚡</div>
					<h4 style="font-size:1.1rem;color:var(--color-dark);margin-bottom:8px;"><?php _e( '2-Hour Response Guarantee', 'aquapro' ); ?></h4>
					<p style="font-size:0.875rem;color:var(--color-gray-500);line-height:1.7;">
						<?php _e( 'Submit a quote request and we guarantee a personal response from our team within 2 business hours — not an automated email.', 'aquapro' ); ?>
					</p>
				</div>

				<!-- Trust Indicators -->
				<div style="margin-top:20px;display:grid;grid-template-columns:1fr 1fr;gap:12px;">
					<?php
					$trust_items = array(
						array( '🏅', __( 'Licensed &amp; Insured', 'aquapro' ) ),
						array( '⭐', __( '5-Star Rated', 'aquapro' ) ),
						array( '✅', __( 'Background Checked', 'aquapro' ) ),
						array( '🎯', __( 'Satisfaction Guaranteed', 'aquapro' ) ),
					);
					foreach ( $trust_items as $item ) : ?>
					<div style="background:var(--color-white);border-radius:var(--radius-md);padding:16px;box-shadow:var(--shadow-sm);display:flex;align-items:center;gap:10px;font-size:0.875rem;font-weight:600;color:var(--color-dark);">
						<span aria-hidden="true"><?php echo $item[0]; ?></span>
						<?php echo wp_kses_post( $item[1] ); ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div>
	</div>
</section>

<script>
(function() {
	const form = document.getElementById('contactPageForm');
	const msg  = document.getElementById('contactPageMsg');
	const btn  = document.getElementById('contactSubmitBtn');

	if (!form) return;

	form.addEventListener('submit', function(e) {
		e.preventDefault();
		if (!form.checkValidity()) { form.reportValidity(); return; }

		btn.disabled = true;
		btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';

		const data = new FormData(form);
		data.append('action', 'aquapro_quote');
		data.append('nonce', typeof aquaproData !== 'undefined' ? aquaproData.nonce : '');

		fetch(typeof aquaproData !== 'undefined' ? aquaproData.ajaxUrl : '/wp-admin/admin-ajax.php', {
			method: 'POST', body: data
		}).then(r => r.json()).then(function(d) {
			if (d.success) {
				msg.style.cssText = 'display:block;background:#d1fae5;color:#065f46;padding:16px 20px;border-radius:10px;margin-bottom:16px;font-weight:600;';
				msg.textContent = '✓ ' + d.data.message;
				form.reset();
			} else {
				msg.style.cssText = 'display:block;background:#fee2e2;color:#991b1b;padding:16px 20px;border-radius:10px;margin-bottom:16px;font-weight:600;';
				msg.textContent = '✕ ' + (d.data ? d.data.message : 'Something went wrong. Please call us.');
			}
		}).catch(function() {
			msg.style.cssText = 'display:block;background:#fee2e2;color:#991b1b;padding:16px 20px;border-radius:10px;margin-bottom:16px;font-weight:600;';
			msg.textContent = '✕ Network error. Please call us directly.';
		}).finally(function() {
			btn.disabled = false;
			btn.innerHTML = '<i class="fas fa-paper-plane"></i> Send My Quote Request';
		});
	});
})();
</script>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<?php get_footer(); ?>
