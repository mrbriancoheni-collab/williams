<?php
$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$email      = get_theme_mod( 'aquapro_email', 'williamspoolscare@gmail.com' );
$address    = get_theme_mod( 'aquapro_address', 'Fair Oaks, CA 95628' );
$hours      = get_theme_mod( 'aquapro_hours', 'Mon–Sat: 7AM–6PM' );
$city       = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
$state      = get_theme_mod( 'aquapro_state', 'California' );
$license    = get_theme_mod( 'aquapro_license', '' );
$year       = date( 'Y' );
?>

</main><!-- /#main-content -->

<!-- =============================================
     FOOTER
     ============================================= -->
<footer class="site-footer" role="contentinfo" itemscope itemtype="https://schema.org/LocalBusiness">
	<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
	<meta itemprop="telephone" content="<?php echo esc_attr( $phone ); ?>">

	<div class="footer-top">
		<div class="container">
			<div class="footer-grid">

				<!-- Brand Column -->
				<div class="footer-brand">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo" rel="home" aria-label="<?php bloginfo( 'name' ); ?> – <?php esc_attr_e( 'Home', 'aquapro' ); ?>">
						<?php if ( has_custom_logo() ) : ?>
							<?php the_custom_logo(); ?>
						<?php else : ?>
							<div class="logo-icon" aria-hidden="true">🏊</div>
							<div class="logo-text">
								<span class="logo-name"><?php bloginfo( 'name' ); ?></span>
								<span class="logo-tagline"><?php _e( 'Pool Cleaning Experts', 'aquapro' ); ?></span>
							</div>
						<?php endif; ?>
					</a>

					<p class="footer-brand-desc">
						<?php echo esc_html( sprintf(
							__( 'Serving the %s area for over 20 years. We keep your pool crystal clear, chemically balanced, and equipment running at peak performance — so you can enjoy it, not maintain it.', 'aquapro' ),
							$city
						) ); ?>
					</p>

					<div class="footer-social" aria-label="<?php esc_attr_e( 'Social media links', 'aquapro' ); ?>">
						<?php if ( $fb = get_theme_mod( 'aquapro_facebook', 'https://www.facebook.com/swimsafe247/' ) ) : ?>
						<a href="<?php echo esc_url( $fb ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
							<i class="fab fa-facebook-f" aria-hidden="true"></i>
						</a>
						<?php endif; ?>
						<?php if ( $ig = get_theme_mod( 'aquapro_instagram', '' ) ) : ?>
						<a href="<?php echo esc_url( $ig ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
							<i class="fab fa-instagram" aria-hidden="true"></i>
						</a>
						<?php endif; ?>
						<?php if ( $yelp = get_theme_mod( 'aquapro_yelp', '' ) ) : ?>
						<a href="<?php echo esc_url( $yelp ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Yelp">
							<i class="fab fa-yelp" aria-hidden="true"></i>
						</a>
						<?php endif; ?>
						<?php if ( $nd = get_theme_mod( 'aquapro_nextdoor', 'https://nextdoor.com/pages/williams-pool-care-fair-oaks-ca/' ) ) : ?>
						<a href="<?php echo esc_url( $nd ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Nextdoor">
							<i class="fas fa-home" aria-hidden="true"></i>
						</a>
						<?php endif; ?>
					</div>
				</div>

				<!-- Services Column -->
				<div class="footer-services">
					<h4 class="footer-heading"><?php _e( 'Our Services', 'aquapro' ); ?></h4>
					<ul class="footer-links" role="list">
						<li><a href="<?php echo esc_url( home_url( '/services/weekly-pool-cleaning/' ) ); ?>">
							<i class="fas fa-check-circle" aria-hidden="true"></i> <?php _e( 'Weekly Pool Cleaning', 'aquapro' ); ?>
						</a></li>
						<li><a href="<?php echo esc_url( home_url( '/services/bi-weekly-cleaning/' ) ); ?>">
							<i class="fas fa-check-circle" aria-hidden="true"></i> <?php _e( 'Bi-Weekly Cleaning', 'aquapro' ); ?>
						</a></li>
						<li><a href="<?php echo esc_url( home_url( '/services/chemical-balancing/' ) ); ?>">
							<i class="fas fa-check-circle" aria-hidden="true"></i> <?php _e( 'Chemical Balancing', 'aquapro' ); ?>
						</a></li>
						<li><a href="<?php echo esc_url( home_url( '/services/equipment-repair/' ) ); ?>">
							<i class="fas fa-check-circle" aria-hidden="true"></i> <?php _e( 'Equipment Repair', 'aquapro' ); ?>
						</a></li>
						<li><a href="<?php echo esc_url( home_url( '/services/green-pool-treatment/' ) ); ?>">
							<i class="fas fa-check-circle" aria-hidden="true"></i> <?php _e( 'Green Pool Treatment', 'aquapro' ); ?>
						</a></li>
						<li><a href="<?php echo esc_url( home_url( '/services/pool-startup/' ) ); ?>">
							<i class="fas fa-check-circle" aria-hidden="true"></i> <?php _e( 'New Pool Start-Up', 'aquapro' ); ?>
						</a></li>
						<li><a href="<?php echo esc_url( home_url( '/services/filter-cleaning/' ) ); ?>">
							<i class="fas fa-check-circle" aria-hidden="true"></i> <?php _e( 'Filter Cleaning', 'aquapro' ); ?>
						</a></li>
					</ul>
				</div>

				<!-- Company Column -->
				<div class="footer-company">
					<h4 class="footer-heading"><?php _e( 'Company', 'aquapro' ); ?></h4>
					<ul class="footer-links" role="list">
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">
							<i class="fas fa-arrow-right" aria-hidden="true"></i> <?php _e( 'About Us', 'aquapro' ); ?>
						</a></li>
						<li><a href="<?php echo esc_url( home_url( '/service-areas/' ) ); ?>">
							<i class="fas fa-arrow-right" aria-hidden="true"></i> <?php _e( 'Service Areas', 'aquapro' ); ?>
						</a></li>
						<li><a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>">
							<i class="fas fa-arrow-right" aria-hidden="true"></i> <?php _e( 'Reviews', 'aquapro' ); ?>
						</a></li>
						<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
							<i class="fas fa-arrow-right" aria-hidden="true"></i> <?php _e( 'Pool Care Blog', 'aquapro' ); ?>
						</a></li>
						<li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">
							<i class="fas fa-arrow-right" aria-hidden="true"></i> <?php _e( 'FAQ', 'aquapro' ); ?>
						</a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
							<i class="fas fa-arrow-right" aria-hidden="true"></i> <?php _e( 'Get a Quote', 'aquapro' ); ?>
						</a></li>
					</ul>
				</div>

				<!-- Contact Column -->
				<div class="footer-contact-col">
					<h4 class="footer-heading"><?php _e( 'Contact Us', 'aquapro' ); ?></h4>

					<div class="footer-contact-item" itemscope itemtype="https://schema.org/PostalAddress">
						<div class="footer-contact-icon" aria-hidden="true">
							<i class="fas fa-map-marker-alt"></i>
						</div>
						<div>
							<span class="footer-contact-label"><?php _e( 'Location', 'aquapro' ); ?></span>
							<span class="footer-contact-value" itemprop="addressLocality">
								<?php echo esc_html( $address ); ?>
							</span>
						</div>
					</div>

					<div class="footer-contact-item">
						<div class="footer-contact-icon" aria-hidden="true">
							<i class="fas fa-phone-alt"></i>
						</div>
						<div>
							<span class="footer-contact-label"><?php _e( 'Call Us', 'aquapro' ); ?></span>
							<span class="footer-contact-value">
								<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" itemprop="telephone">
									<?php echo esc_html( $phone ); ?>
								</a>
							</span>
						</div>
					</div>

					<div class="footer-contact-item">
						<div class="footer-contact-icon" aria-hidden="true">
							<i class="fas fa-envelope"></i>
						</div>
						<div>
							<span class="footer-contact-label"><?php _e( 'Email', 'aquapro' ); ?></span>
							<span class="footer-contact-value">
								<a href="mailto:<?php echo esc_attr( $email ); ?>" itemprop="email">
									<?php echo esc_html( $email ); ?>
								</a>
							</span>
						</div>
					</div>

					<div class="footer-contact-item">
						<div class="footer-contact-icon" aria-hidden="true">
							<i class="fas fa-clock"></i>
						</div>
						<div>
							<span class="footer-contact-label"><?php _e( 'Business Hours', 'aquapro' ); ?></span>
							<span class="footer-contact-value">
								<?php echo esc_html( $hours ); ?>
							</span>
						</div>
					</div>

					<div class="footer-certifications">
						<div class="cert-badge">
							<i class="fas fa-shield-alt" aria-hidden="true"></i>
							<?php _e( 'Fully Insured', 'aquapro' ); ?>
						</div>
						<div class="cert-badge">
							<i class="fas fa-star" aria-hidden="true"></i>
							<?php _e( '5-Star Rated', 'aquapro' ); ?>
						</div>
					</div>
					<?php if ( $license ) : ?>
					<p style="margin-top:12px;font-size:0.8rem;color:rgba(255,255,255,0.4);">
						<?php echo esc_html( sprintf( __( 'License: %s', 'aquapro' ), $license ) ); ?>
					</p>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>

	<!-- Footer Bottom -->
	<div class="container">
		<div class="footer-bottom">
			<p class="footer-copyright">
				&copy; <?php echo esc_html( $year ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
				<?php printf( esc_html__( 'Serving %s &amp; Surrounding Areas.', 'aquapro' ), esc_html( $city ) ); ?>
				<?php _e( 'All rights reserved.', 'aquapro' ); ?>
			</p>
			<nav class="footer-legal" aria-label="<?php esc_attr_e( 'Legal navigation', 'aquapro' ); ?>">
				<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php _e( 'Privacy Policy', 'aquapro' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/terms-of-service/' ) ); ?>"><?php _e( 'Terms of Service', 'aquapro' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/sitemap.xml' ) ); ?>"><?php _e( 'Sitemap', 'aquapro' ); ?></a>
			</nav>
		</div>
	</div>

</footer>

<!-- Floating CTA -->
<div class="floating-cta" aria-label="<?php esc_attr_e( 'Quick contact options', 'aquapro' ); ?>">
	<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="floating-btn floating-btn-call" aria-label="<?php esc_attr_e( 'Call now', 'aquapro' ); ?>">
		<i class="fas fa-phone" aria-hidden="true"></i>
		<span><?php _e( 'Call Now', 'aquapro' ); ?></span>
	</a>
	<a href="#quote-form" class="floating-btn floating-btn-quote" aria-label="<?php esc_attr_e( 'Get a free quote', 'aquapro' ); ?>">
		<i class="fas fa-envelope" aria-hidden="true"></i>
		<span><?php _e( 'Free Quote', 'aquapro' ); ?></span>
	</a>
</div>

<!-- Back to Top -->
<button class="back-to-top" id="backToTop" aria-label="<?php esc_attr_e( 'Back to top', 'aquapro' ); ?>">
	<i class="fas fa-arrow-up" aria-hidden="true"></i>
</button>

<?php wp_footer(); ?>
</body>
</html>
