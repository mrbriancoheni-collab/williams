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
$icon       = get_post_meta( get_the_ID(), '_service_icon', true ) ?: 'fas fa-swimming-pool';
$features   = get_post_meta( get_the_ID(), '_service_features', true ) ?: array();
$price      = get_post_meta( get_the_ID(), '_service_price', true ) ?: '';
?>

<div class="page-hero">
	<div class="container">
		<div class="page-hero-icon" aria-hidden="true"><i class="<?php echo esc_attr( $icon ); ?>"></i></div>
		<h1 class="page-hero-title"><?php the_title(); ?></h1>
		<p style="color:rgba(255,255,255,0.7);max-width:560px;margin:12px auto 16px;line-height:1.7;">
			<?php printf( esc_html__( 'Professional %s service in %s and Sacramento area communities.', 'aquapro' ), get_the_title(), esc_html( $city ) ); ?>
		</p>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<section class="section-padding service-single-section">
	<div class="container">
		<div class="service-single-grid">

			<!-- Main Content -->
			<article <?php post_class( 'service-content-card' ); ?>>

				<?php if ( has_post_thumbnail() ) : ?>
				<div class="service-featured-img">
					<?php the_post_thumbnail( 'aquapro-service', array( 'alt' => get_the_title() ) ); ?>
				</div>
				<?php endif; ?>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<?php if ( ! empty( $features ) ) : ?>
				<div class="service-included">
					<h3><?php _e( "What's Included", 'aquapro' ); ?></h3>
					<ul class="service-features" role="list">
						<?php foreach ( (array) $features as $feat ) : ?>
						<li class="service-feature"><?php echo esc_html( $feat ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			</article>

			<!-- Sidebar -->
			<aside class="service-sidebar">

				<!-- CTA Card -->
				<div class="service-cta-card">
					<h3><?php printf( __( 'Get a Quote for<br>%s', 'aquapro' ), get_the_title() ); ?></h3>
					<?php if ( $price ) : ?>
					<div class="service-cta-price-label"><?php _e( 'Starting at', 'aquapro' ); ?></div>
					<div class="service-cta-price"><?php echo esc_html( $price ); ?></div>
					<?php else : ?>
					<p><?php _e( 'Free, no-obligation estimate. We respond within 2 business hours.', 'aquapro' ); ?></p>
					<?php endif; ?>
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-white service-cta-btn">
						<i class="fas fa-clipboard-list" aria-hidden="true"></i>
						<?php _e( 'Get Free Quote', 'aquapro' ); ?>
					</a>
					<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="service-cta-phone">
						<i class="fas fa-phone" aria-hidden="true"></i>
						<?php echo esc_html( $phone ); ?>
					</a>
				</div>

				<!-- All Services list -->
				<div class="service-nav-card">
					<h4 class="service-nav-title"><?php _e( 'All Services', 'aquapro' ); ?></h4>
					<?php
					$all_services = new WP_Query( array(
						'post_type'      => 'service',
						'posts_per_page' => -1,
						'post_status'    => 'publish',
						'orderby'        => 'menu_order',
					) );
					if ( $all_services->have_posts() ) : ?>
					<ul class="service-nav-list">
						<?php while ( $all_services->have_posts() ) : $all_services->the_post();
							$is_current = get_the_ID() === get_queried_object_id();
						?>
						<li>
							<a href="<?php the_permalink(); ?>" class="service-nav-link<?php echo $is_current ? ' service-nav-link--active' : ''; ?>">
								<i class="fas fa-<?php echo $is_current ? 'check-circle' : 'arrow-right'; ?>" aria-hidden="true"></i>
								<?php the_title(); ?>
							</a>
						</li>
						<?php endwhile; wp_reset_postdata(); ?>
					</ul>
					<?php else : ?>
					<p class="service-nav-empty"><?php _e( 'Add services via admin.', 'aquapro' ); ?></p>
					<?php endif; ?>
				</div>

			</aside>

		</div>
	</div>
</section>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<?php get_footer(); ?>
