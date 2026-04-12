<?php
/**
 * Template Name: About Page
 * Template Post Type: page
 *
 * @package AquaPro
 */

get_header();

$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$city       = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
$state      = get_theme_mod( 'aquapro_state', 'California' );
$founded    = get_theme_mod( 'aquapro_founded', '2006' );
$years_exp  = get_theme_mod( 'aquapro_years_exp', '20+' );
$pools      = get_theme_mod( 'aquapro_pools_cleaned', '5,000+' );
$reviews    = get_theme_mod( 'aquapro_reviews', '500+' );
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title"><?php _e( 'About Williams Pool Care', 'aquapro' ); ?></h1>
		<p style="color:rgba(255,255,255,0.7);max-width:580px;margin:12px auto 16px;line-height:1.7;">
			<?php printf( esc_html__( 'Your trusted pool cleaning partner in %s since %s. Built on excellence, dependability, and personal service.', 'aquapro' ), esc_html( $city ), esc_html( $founded ) ); ?>
		</p>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<!-- Story Section -->
<section class="section-padding" style="background:var(--color-white);">
	<div class="container">
		<div style="display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;">
			<div>
				<span class="section-badge">
					<i class="fas fa-history" aria-hidden="true"></i>
					<?php printf( __( 'Our Story Since %s', 'aquapro' ), esc_html( $founded ) ); ?>
				</span>
				<h2 class="section-title">
					<?php printf( __( "Serving %s<br><span>For Over 20 Years</span>", 'aquapro' ), esc_html( $city ) ); ?>
				</h2>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="entry-content" style="line-height:1.85;color:var(--color-gray-700);">
						<?php the_content(); ?>
					</div>
				<?php endwhile;
				else : ?>
				<div style="line-height:1.85;color:var(--color-gray-700);">
					<p><?php printf( esc_html__( "Williams Pool Care was founded in %s with a simple mission: provide the kind of pool service we'd want for our own families — professional, thorough, dependable, and fairly priced.", 'aquapro' ), esc_html( $founded ) ); ?></p>
					<p><?php printf( esc_html__( "Starting with just a few clients in %s, we've grown to serve thousands of homeowners across the greater Sacramento area. But no matter how much we've grown, our commitment to personal service has never changed.", 'aquapro' ), esc_html( $city ) ); ?></p>
					<p><?php _e( "We're proud to be a locally-owned business that genuinely cares about our community. When you call Williams Pool Care, you talk to a real person — not an answering service. When we service your pool, it's the same trusted technician every visit — not a different face each week.", 'aquapro' ); ?></p>
					<p><?php _e( "Our business is built on three core values: <strong>Excellence</strong> in everything we do, <strong>Dependability</strong> you can set your clock by, and <strong>Personal service</strong> that makes you feel like our most important customer — because you are.", 'aquapro' ); ?></p>
				</div>
				<?php endif; ?>

				<div style="display:flex;gap:16px;margin-top:32px;flex-wrap:wrap;">
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">
						<?php _e( 'Get Free Quote', 'aquapro' ); ?>
					</a>
					<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-secondary">
						<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
					</a>
				</div>
			</div>

			<div>
				<div style="background:linear-gradient(135deg,var(--color-primary),var(--color-secondary));border-radius:var(--radius-xl);padding:48px;text-align:center;color:white;box-shadow:var(--shadow-blue);">
					<div style="font-size:6rem;margin-bottom:16px;" aria-hidden="true">🏊</div>
					<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-top:24px;">
						<?php
						$stats = array(
							array( $years_exp, __( 'Years Experience', 'aquapro' ) ),
							array( $pools, __( 'Pools Serviced', 'aquapro' ) ),
							array( $reviews, __( '5-Star Reviews', 'aquapro' ) ),
							array( '100%', __( 'Satisfaction Rate', 'aquapro' ) ),
						);
						foreach ( $stats as $stat ) : ?>
						<div style="background:rgba(255,255,255,0.15);border-radius:var(--radius-md);padding:20px;backdrop-filter:blur(10px);">
							<div style="font-size:2rem;font-weight:800;color:white;"><?php echo esc_html( $stat[0] ); ?></div>
							<div style="font-size:0.8rem;color:rgba(255,255,255,0.7);margin-top:4px;text-transform:uppercase;letter-spacing:1px;"><?php echo esc_html( $stat[1] ); ?></div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Values Section -->
<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-heart" aria-hidden="true"></i> <?php _e( 'Our Values', 'aquapro' ); ?></span>
			<h2 class="section-title"><?php _e( 'What We Stand For', 'aquapro' ); ?></h2>
		</div>
		<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:28px;">
			<?php
			$values = array(
				array( '🏅', __( 'Excellence', 'aquapro' ), __( "We don't cut corners. Every pool service is performed to the highest standard, every single time — no matter what.", 'aquapro' ) ),
				array( '⏰', __( 'Dependability', 'aquapro' ), __( "When we say we'll be there, we're there. You can set your schedule around us, because we won't let you down.", 'aquapro' ) ),
				array( '🤝', __( 'Personal Service', 'aquapro' ), __( 'You get a dedicated technician who knows your pool, not a rotating roster of strangers. We remember your name and your pool\'s needs.', 'aquapro' ) ),
			);
			foreach ( $values as $v ) : ?>
			<div style="background:var(--color-white);border-radius:var(--radius-lg);padding:36px;box-shadow:var(--shadow-md);text-align:center;">
				<div style="font-size:3rem;margin-bottom:20px;" aria-hidden="true"><?php echo $v[0]; ?></div>
				<h3 style="font-size:1.3rem;color:var(--color-dark);margin-bottom:12px;"><?php echo esc_html( $v[1] ); ?></h3>
				<p style="color:var(--color-gray-500);line-height:1.7;font-size:0.95rem;"><?php echo esc_html( $v[2] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Team Section -->
<?php
$team_query = new WP_Query( array(
	'post_type'      => 'team_member',
	'posts_per_page' => 6,
	'post_status'    => 'publish',
) );
if ( $team_query->have_posts() ) : ?>
<section class="section-padding" style="background:var(--color-white);">
	<div class="container">
		<div class="section-header center">
			<span class="section-badge"><i class="fas fa-users" aria-hidden="true"></i> <?php _e( 'Our Team', 'aquapro' ); ?></span>
			<h2 class="section-title"><?php _e( 'Meet the Experts', 'aquapro' ); ?></h2>
		</div>
		<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:28px;">
			<?php while ( $team_query->have_posts() ) : $team_query->the_post();
				$role  = get_post_meta( get_the_ID(), '_team_role', true );
				$certs = get_post_meta( get_the_ID(), '_team_certs', true );
				$years = get_post_meta( get_the_ID(), '_team_years', true );
			?>
			<div style="text-align:center;background:var(--color-gray-100);border-radius:var(--radius-lg);padding:32px;box-shadow:var(--shadow-md);">
				<?php if ( has_post_thumbnail() ) : ?>
					<div style="width:100px;height:100px;border-radius:50%;overflow:hidden;margin:0 auto 20px;box-shadow:var(--shadow-lg);">
						<?php the_post_thumbnail( 'thumbnail', array( 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
					</div>
				<?php else : ?>
					<div style="width:100px;height:100px;border-radius:50%;background:linear-gradient(135deg,var(--color-primary),var(--color-secondary));margin:0 auto 20px;display:flex;align-items:center;justify-content:center;font-size:2.5rem;color:white;font-family:var(--font-heading);font-weight:700;box-shadow:var(--shadow-blue);">
						<?php echo esc_html( mb_substr( get_the_title(), 0, 1 ) ); ?>
					</div>
				<?php endif; ?>
				<h3 style="font-size:1.1rem;color:var(--color-dark);margin-bottom:4px;"><?php the_title(); ?></h3>
				<?php if ( $role ) : ?>
				<p style="color:var(--color-primary);font-size:0.875rem;font-weight:600;margin-bottom:8px;"><?php echo esc_html( $role ); ?></p>
				<?php endif; ?>
				<?php if ( $certs ) : ?>
				<p style="color:var(--color-gray-500);font-size:0.8rem;"><?php echo esc_html( $certs ); ?></p>
				<?php endif; ?>
				<?php if ( $years ) : ?>
				<p style="color:var(--color-gray-500);font-size:0.8rem;"><?php printf( __( '%d years experience', 'aquapro' ), intval( $years ) ); ?></p>
				<?php endif; ?>
			</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- CTA -->
<section class="cta-section section-padding">
	<div class="container">
		<div class="cta-grid">
			<div>
				<h2 class="cta-title"><?php printf( __( 'Ready to Work With the Best Pool Team in %s?', 'aquapro' ), esc_html( $city ) ); ?></h2>
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

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<?php get_footer(); ?>
