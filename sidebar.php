<?php
/**
 * Sidebar Template
 *
 * @package AquaPro
 */

$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
?>

<!-- CTA Widget -->
<div class="widget" style="background:linear-gradient(135deg,var(--color-primary),var(--color-primary-light));border-radius:var(--radius-lg);padding:32px;text-align:center;color:white;margin-bottom:24px;">
	<div style="font-size:3rem;margin-bottom:12px;" aria-hidden="true">🏊</div>
	<h3 style="color:white;font-size:1.2rem;margin-bottom:12px;"><?php _e( 'Ready for a Cleaner Pool?', 'aquapro' ); ?></h3>
	<p style="font-size:0.875rem;color:rgba(255,255,255,0.8);margin-bottom:20px;line-height:1.6;">
		<?php _e( 'Get your no-obligation free quote today. Same-week service available.', 'aquapro' ); ?>
	</p>
	<a href="<?php echo esc_url( home_url( '/#quote-form' ) ); ?>" class="btn btn-white" style="width:100%;justify-content:center;margin-bottom:10px;">
		<?php _e( 'Get Free Quote', 'aquapro' ); ?>
	</a>
	<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" style="display:block;color:rgba(255,255,255,0.8);font-size:0.875rem;margin-top:8px;">
		<i class="fas fa-phone" aria-hidden="true"></i> <?php echo esc_html( $phone ); ?>
	</a>
</div>

<!-- Dynamic Widgets -->
<?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-blog' ); ?>
<?php endif; ?>

<!-- Recent Posts Widget (fallback) -->
<?php if ( ! is_active_sidebar( 'sidebar-blog' ) ) : ?>
<div class="widget">
	<h3 class="widget-title"><?php _e( 'Pool Care Tips', 'aquapro' ); ?></h3>
	<?php
	$recent = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => 5,
		'post_status'    => 'publish',
	) );
	if ( $recent->have_posts() ) : ?>
	<ul style="display:flex;flex-direction:column;gap:12px;">
		<?php while ( $recent->have_posts() ) : $recent->the_post(); ?>
		<li style="border-bottom:1px solid var(--color-gray-100);padding-bottom:12px;">
			<a href="<?php the_permalink(); ?>" style="color:var(--color-dark);font-size:0.9rem;font-weight:600;line-height:1.4;display:block;margin-bottom:4px;">
				<?php the_title(); ?>
			</a>
			<span style="font-size:0.75rem;color:var(--color-gray-500);"><?php the_date(); ?></span>
		</li>
		<?php endwhile; wp_reset_postdata(); ?>
	</ul>
	<?php endif; ?>
</div>

<!-- Services Widget -->
<div class="widget">
	<h3 class="widget-title"><?php _e( 'Our Services', 'aquapro' ); ?></h3>
	<ul style="display:flex;flex-direction:column;gap:8px;">
		<?php
		$services_sidebar = array(
			array( 'Weekly Pool Cleaning', home_url( '/services/weekly-pool-cleaning/' ) ),
			array( 'Bi-Weekly Cleaning', home_url( '/services/bi-weekly-cleaning/' ) ),
			array( 'Chemical Balancing', home_url( '/services/chemical-balancing/' ) ),
			array( 'Green Pool Treatment', home_url( '/services/green-pool-treatment/' ) ),
			array( 'Equipment Repair', home_url( '/services/equipment-repair/' ) ),
			array( 'New Pool Start-Up', home_url( '/services/pool-startup/' ) ),
			array( 'Filter Cleaning', home_url( '/services/filter-cleaning/' ) ),
		);
		foreach ( $services_sidebar as $svc ) : ?>
		<li>
			<a href="<?php echo esc_url( $svc[1] ); ?>" style="display:flex;align-items:center;gap:8px;color:var(--color-gray-700);font-size:0.9rem;padding:8px 12px;background:var(--color-gray-100);border-radius:var(--radius-sm);transition:all 0.2s ease;">
				<i class="fas fa-check-circle" style="color:var(--color-primary);flex-shrink:0;" aria-hidden="true"></i>
				<?php echo esc_html( $svc[0] ); ?>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
</div>

<!-- Service Areas Widget -->
<div class="widget">
	<h3 class="widget-title"><?php _e( 'Service Areas', 'aquapro' ); ?></h3>
	<p style="font-size:0.875rem;color:var(--color-gray-500);line-height:1.7;">
		<?php _e( 'Fair Oaks, Sacramento, Citrus Heights, Roseville, Rocklin, Folsom, Orangevale, Granite Bay, Loomis, Penryn, Carmichael, Rancho Cordova, and more.', 'aquapro' ); ?>
	</p>
	<a href="<?php echo esc_url( home_url( '/service-areas/' ) ); ?>" class="btn btn-secondary btn-sm" style="margin-top:16px;">
		<?php _e( 'View All Areas', 'aquapro' ); ?>
	</a>
</div>
<?php endif; ?>
