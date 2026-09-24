<?php
/**
 * Template Name: Testimonials Page
 * Template Post Type: page
 *
 * @package AquaPro
 */

get_header();

$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$city       = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
$reviews    = get_theme_mod( 'aquapro_reviews', '500+' );
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title"><?php _e( 'What Our Customers Say', 'aquapro' ); ?></h1>
		<p style="color:rgba(255,255,255,0.7);max-width:560px;margin:12px auto 16px;line-height:1.7;">
			<?php printf(
				esc_html__( '%s 5-star reviews from homeowners across %s and the greater Sacramento area.', 'aquapro' ),
				esc_html( $reviews ),
				esc_html( $city )
			); ?>
		</p>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<!-- Rating Summary Bar -->
<section style="background:var(--color-white);padding:40px 0;border-bottom:1px solid var(--color-gray-100);">
	<div class="container">
		<div style="display:flex;justify-content:center;align-items:center;gap:60px;flex-wrap:wrap;">
			<div style="text-align:center;">
				<div style="font-size:4rem;font-weight:900;color:var(--color-dark);letter-spacing:-0.04em;line-height:1;">5.0</div>
				<div style="color:var(--color-gold);font-size:1.4rem;margin:6px 0;"><?php echo aquapro_stars( 5 ); ?></div>
				<div style="font-size:0.85rem;color:var(--color-gray-500);"><?php printf( esc_html__( 'Based on %s reviews', 'aquapro' ), esc_html( $reviews ) ); ?></div>
			</div>
			<div style="display:flex;flex-direction:column;gap:8px;min-width:240px;">
				<?php
				$bars = array( 5 => 94, 4 => 4, 3 => 1, 2 => 1, 1 => 0 );
				foreach ( $bars as $stars => $pct ) : ?>
				<div style="display:flex;align-items:center;gap:10px;">
					<span style="font-size:0.8rem;color:var(--color-gray-500);width:12px;text-align:right;"><?php echo $stars; ?></span>
					<i class="fas fa-star" style="color:var(--color-gold);font-size:0.75rem;"></i>
					<div style="flex:1;height:8px;background:var(--color-gray-100);border-radius:4px;overflow:hidden;">
						<div style="width:<?php echo $pct; ?>%;height:100%;background:var(--color-gold);border-radius:4px;"></div>
					</div>
					<span style="font-size:0.8rem;color:var(--color-gray-500);width:28px;"><?php echo $pct; ?>%</span>
				</div>
				<?php endforeach; ?>
			</div>
			<div style="display:flex;flex-direction:column;gap:12px;">
				<?php
				$platforms = array(
					array( 'Google Reviews', 'fab fa-google', '#4285F4' ),
					array( 'Nextdoor',        'fas fa-home',   '#00B246' ),
					array( 'Facebook',        'fab fa-facebook-f', '#1877F2' ),
				);
				foreach ( $platforms as $p ) : ?>
				<div style="display:flex;align-items:center;gap:10px;">
					<i class="<?php echo esc_attr( $p[1] ); ?>" style="color:<?php echo esc_attr( $p[2] ); ?>;width:18px;text-align:center;"></i>
					<span style="font-size:0.875rem;font-weight:600;color:var(--color-dark);"><?php echo esc_html( $p[0] ); ?></span>
					<div style="color:var(--color-gold);font-size:0.75rem;"><?php echo aquapro_stars( 5 ); ?></div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<!-- Testimonials Grid -->
<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">

		<?php
		$tq = new WP_Query( array(
			'post_type'      => 'testimonial',
			'posts_per_page' => 12,
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		) );

		if ( $tq->have_posts() ) :
			echo '<div class="testimonials-grid">';
			while ( $tq->have_posts() ) : $tq->the_post();
				$reviewer = get_post_meta( get_the_ID(), '_reviewer_name', true ) ?: get_the_title();
				$location = get_post_meta( get_the_ID(), '_reviewer_location', true ) ?: $city;
				$rating   = intval( get_post_meta( get_the_ID(), '_rating', true ) ?: 5 );
				$service  = get_post_meta( get_the_ID(), '_service_type', true ) ?: '';
			?>
			<article class="testimonial-card" itemscope itemtype="https://schema.org/Review">
				<?php if ( $service ) : ?>
				<div class="testimonial-service-tag"><?php echo esc_html( $service ); ?></div>
				<?php endif; ?>
				<div class="testimonial-source">
					<span class="google-g" aria-hidden="true">G</span>
					<?php _e( 'Google Review', 'aquapro' ); ?>
				</div>
				<div class="testimonial-quote" aria-hidden="true">"</div>
				<div class="testimonial-stars" aria-label="<?php echo esc_attr( sprintf( __( '%d out of 5 stars', 'aquapro' ), $rating ) ); ?>">
					<?php echo aquapro_stars( $rating ); ?>
				</div>
				<blockquote class="testimonial-text" itemprop="reviewBody">
					<?php the_content(); ?>
				</blockquote>
				<div class="testimonial-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
					<div class="testimonial-avatar" aria-hidden="true"><?php echo esc_html( mb_substr( $reviewer, 0, 1 ) ); ?></div>
					<div>
						<div class="testimonial-name" itemprop="name"><?php echo esc_html( $reviewer ); ?></div>
						<div class="testimonial-location"><?php echo esc_html( $location ); ?></div>
					</div>
				</div>
			</article>
			<?php
			endwhile;
			wp_reset_postdata();
			echo '</div>';

		else :
			// Hardcoded fallback reviews
			$defaults = array(
				array(
					'name'     => 'Sarah M.',
					'location' => 'Fair Oaks, CA',
					'service'  => 'Weekly Cleaning',
					'initial'  => 'S',
					'quote'    => 'Williams Pool Care has been cleaning our pool for 3 years and they are absolutely fantastic. Always on time, pool always looks perfect. I wouldn\'t trust anyone else with our pool.',
				),
				array(
					'name'     => 'David K.',
					'location' => 'Citrus Heights, CA',
					'service'  => 'Green Pool Treatment',
					'initial'  => 'D',
					'quote'    => 'Called them about our green pool on a Monday, they came out Tuesday and by Thursday it was crystal clear. Incredible service and very reasonably priced.',
				),
				array(
					'name'     => 'Jennifer L.',
					'location' => 'Roseville, CA',
					'service'  => 'Equipment Repair',
					'initial'  => 'J',
					'quote'    => 'Our pump died mid-summer. Williams had a technician out the same day and it was fixed within 2 hours. They even checked our whole system at no extra charge.',
				),
				array(
					'name'     => 'Mike T.',
					'location' => 'Folsom, CA',
					'service'  => 'Bi-Weekly Cleaning',
					'initial'  => 'M',
					'quote'    => 'Best investment we\'ve made for our home. We went from spending hours every weekend on the pool to zero. Their team is professional, thorough, and always friendly.',
				),
				array(
					'name'     => 'Amanda R.',
					'location' => 'Orangevale, CA',
					'service'  => 'Weekly Cleaning',
					'initial'  => 'A',
					'quote'    => 'We\'ve tried two other pool services before Williams and there is no comparison. The same tech comes every week, knows our pool perfectly, and the water is always balanced right.',
				),
				array(
					'name'     => 'Robert C.',
					'location' => 'Granite Bay, CA',
					'service'  => 'Chemical Balancing',
					'initial'  => 'R',
					'quote'    => 'Our kids have sensitive skin and water chemistry is really important to us. Williams always gets the chemistry perfect. Haven\'t had a single issue in two years.',
				),
				array(
					'name'     => 'Lisa P.',
					'location' => 'Sacramento, CA',
					'service'  => 'Weekly Cleaning',
					'initial'  => 'L',
					'quote'    => 'Reliable, affordable, and they actually care about doing a great job. They text me every week after the service with a report. That level of communication is rare.',
				),
				array(
					'name'     => 'Tom W.',
					'location' => 'Carmichael, CA',
					'service'  => 'New Pool Start-Up',
					'initial'  => 'T',
					'quote'    => 'Williams handled our new pool start-up perfectly. They explained everything about caring for our new plaster and the water chemistry plan. Very knowledgeable team.',
				),
				array(
					'name'     => 'Nancy B.',
					'location' => 'Rocklin, CA',
					'service'  => 'Filter Cleaning',
					'initial'  => 'N',
					'quote'    => 'Had them do a filter cleaning and full chemical overhaul on a neglected pool we inherited when we bought our house. They turned it around completely. Highly recommend.',
				),
			);
			echo '<div class="testimonials-grid">';
			foreach ( $defaults as $t ) : ?>
			<article class="testimonial-card" itemscope itemtype="https://schema.org/Review">
				<div class="testimonial-service-tag"><?php echo esc_html( $t['service'] ); ?></div>
				<div class="testimonial-source">
					<span class="google-g" aria-hidden="true">G</span>
					<?php _e( 'Google Review', 'aquapro' ); ?>
				</div>
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
			echo '</div>';
		endif;
		?>

	</div>
</section>

<!-- Leave a Review CTA -->
<section class="section-padding-sm" style="background:var(--color-white);">
	<div class="container" style="text-align:center;">
		<h2 class="section-title" style="display:inline-block;"><?php _e( 'Happy With Your Service?', 'aquapro' ); ?></h2>
		<p class="section-subtitle" style="margin:16px auto 32px;max-width:500px;">
			<?php _e( 'Your review helps other homeowners find reliable pool care. It takes 60 seconds and means the world to our team.', 'aquapro' ); ?>
		</p>
		<?php $google_url = get_theme_mod( 'aquapro_google', '' ); ?>
		<?php if ( $google_url ) : ?>
		<a href="<?php echo esc_url( $google_url ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
			<i class="fab fa-google" aria-hidden="true"></i>
			<?php _e( 'Leave a Google Review', 'aquapro' ); ?>
		</a>
		<?php else : ?>
		<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-gold btn-lg">
			<i class="fas fa-star" aria-hidden="true"></i>
			<?php _e( 'Share Your Experience', 'aquapro' ); ?>
		</a>
		<?php endif; ?>
	</div>
</section>

<!-- CTA -->
<section class="cta-section section-padding">
	<div class="container">
		<div class="cta-grid">
			<div>
				<h2 class="cta-title"><?php printf( __( 'Join Hundreds of Happy Pool Owners in %s', 'aquapro' ), esc_html( $city ) ); ?></h2>
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
