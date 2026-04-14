<?php
/**
 * Single Service Template
 *
 * @package AquaPro
 */

get_header();

$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
$city       = get_theme_mod( 'aquapro_city', 'Fair Oaks' );
$icon       = get_post_meta( get_the_ID(), '_service_icon', true ) ?: '🏊';
$features   = get_post_meta( get_the_ID(), '_service_features', true ) ?: array();
$price      = get_post_meta( get_the_ID(), '_service_price', true ) ?: '';
?>

<div class="page-hero">
	<div class="container">
		<div style="font-size:3rem;margin-bottom:16px;" aria-hidden="true"><?php echo esc_html( $icon ); ?></div>
		<h1 class="page-hero-title"><?php the_title(); ?></h1>
		<p style="color:rgba(255,255,255,0.7);max-width:560px;margin:12px auto 16px;line-height:1.7;">
			<?php printf( esc_html__( 'Professional %s service in %s and Sacramento area communities.', 'aquapro' ), get_the_title(), esc_html( $city ) ); ?>
		</p>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<div style="display:grid;grid-template-columns:1fr 380px;gap:48px;align-items:start;">

			<!-- Main Content -->
			<article <?php post_class( 'service-single' ); ?>>
				<div style="background:var(--color-white);border-radius:var(--radius-xl);padding:48px;box-shadow:var(--shadow-md);">

					<?php if ( has_post_thumbnail() ) : ?>
					<div style="border-radius:var(--radius-lg);overflow:hidden;margin-bottom:36px;">
						<?php the_post_thumbnail( 'aquapro-service', array( 'style' => 'width:100%;height:auto;' ) ); ?>
					</div>
					<?php endif; ?>

					<div class="entry-content" style="line-height:1.85;color:var(--color-gray-700);">
						<?php the_content(); ?>
					</div>

					<?php if ( ! empty( $features ) ) : ?>
					<div style="margin-top:36px;padding-top:28px;border-top:1px solid var(--color-gray-100);">
						<h3 style="font-size:1.2rem;color:var(--color-dark);margin-bottom:16px;"><?php _e( "What's Included", 'aquapro' ); ?></h3>
						<ul class="service-features" role="list">
							<?php foreach ( (array) $features as $feat ) : ?>
							<li class="service-feature"><?php echo esc_html( $feat ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</article>

			<!-- Sidebar -->
			<aside>
				<!-- CTA Card -->
				<div style="background:linear-gradient(135deg,var(--color-primary),var(--color-primary-dark));border-radius:var(--radius-xl);padding:36px;color:white;margin-bottom:24px;text-align:center;">
					<h3 style="color:white;font-size:1.3rem;margin-bottom:12px;">
						<?php printf( __( 'Need %s?', 'aquapro' ), get_the_title() ); ?>
					</h3>
					<?php if ( $price ) : ?>
					<div style="font-size:0.85rem;color:rgba(255,255,255,0.7);margin-bottom:4px;"><?php _e( 'Starting at', 'aquapro' ); ?></div>
					<div style="font-size:2.5rem;font-weight:800;color:white;line-height:1;margin-bottom:20px;"><?php echo esc_html( $price ); ?></div>
					<?php else : ?>
					<p style="color:rgba(255,255,255,0.8);font-size:0.9rem;margin-bottom:20px;"><?php _e( 'Free no-obligation estimate. Respond within 2 hours.', 'aquapro' ); ?></p>
					<?php endif; ?>
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-white" style="width:100%;justify-content:center;margin-bottom:12px;">
						<?php _e( 'Get Free Quote', 'aquapro' ); ?>
					</a>
					<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" style="display:block;color:rgba(255,255,255,0.9);font-size:0.9rem;font-weight:600;">
						<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
					</a>
				</div>

				<!-- All Services -->
				<div style="background:var(--color-white);border-radius:var(--radius-lg);padding:28px;box-shadow:var(--shadow-md);">
					<h4 style="font-size:1rem;color:var(--color-dark);margin-bottom:16px;padding-bottom:12px;border-bottom:2px solid var(--color-primary);">
						<?php _e( 'All Services', 'aquapro' ); ?>
					</h4>
					<?php
					$all_services = new WP_Query( array(
						'post_type'      => 'service',
						'posts_per_page' => -1,
						'post_status'    => 'publish',
						'orderby'        => 'menu_order',
					) );
					if ( $all_services->have_posts() ) : ?>
					<ul style="display:flex;flex-direction:column;gap:8px;">
						<?php while ( $all_services->have_posts() ) : $all_services->the_post();
							$is_current = get_the_ID() === get_queried_object_id();
						?>
						<li>
							<a href="<?php the_permalink(); ?>" style="display:flex;align-items:center;gap:8px;padding:10px 14px;border-radius:var(--radius-sm);font-size:0.9rem;font-weight:600;color:<?php echo $is_current ? 'white' : 'var(--color-gray-700)'; ?>;background:<?php echo $is_current ? 'linear-gradient(135deg,var(--color-primary),var(--color-secondary))' : 'var(--color-gray-100)'; ?>;">
								<i class="fas fa-<?php echo $is_current ? 'check' : 'arrow-right'; ?>" aria-hidden="true"></i>
								<?php the_title(); ?>
							</a>
						</li>
						<?php endwhile; wp_reset_postdata(); ?>
					</ul>
					<?php else : ?>
					<p style="font-size:0.875rem;color:var(--color-gray-500);"><?php _e( 'Add services via admin.', 'aquapro' ); ?></p>
					<?php endif; ?>
				</div>
			</aside>

		</div>
	</div>
</section>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<?php get_footer(); ?>
