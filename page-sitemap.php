<?php
/**
 * Template Name: HTML Sitemap
 *
 * @package AquaPro
 */

get_header();

$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title">Sitemap</h1>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container" style="max-width:1000px;">

		<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:32px;">

			<!-- Main Pages -->
			<div>
				<h2 style="font-size:1.1rem;color:var(--color-dark);border-bottom:2px solid var(--color-primary);padding-bottom:10px;margin-bottom:16px;">
					<i class="fas fa-home" style="color:var(--color-primary);margin-right:8px;" aria-hidden="true"></i>Main Pages
				</h2>
				<ul style="display:flex;flex-direction:column;gap:10px;">
					<?php
					$main_pages = array(
						array( 'Home',                    home_url( '/' ) ),
						array( 'About Us',                home_url( '/about/' ) ),
						array( 'Pool Services',           home_url( '/services/' ) ),
						array( 'Service Areas',           home_url( '/service-areas/' ) ),
						array( 'Contact Us',              home_url( '/contact/' ) ),
						array( 'Pool Cleaning Near Me',   home_url( '/local-pool-services/' ) ),
						array( 'Pool Maintenance Near Me',home_url( '/local-pool-maintenance/' ) ),
					);
					foreach ( $main_pages as $p ) : ?>
					<li style="display:flex;align-items:center;gap:8px;">
						<i class="fas fa-angle-right" style="color:var(--color-primary);font-size:0.8rem;" aria-hidden="true"></i>
						<a href="<?php echo esc_url( $p[1] ); ?>" style="color:var(--color-gray-700);font-size:0.9rem;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='var(--color-gray-700)'">
							<?php echo esc_html( $p[0] ); ?>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<!-- Pool Cleaning Services -->
			<div>
				<h2 style="font-size:1.1rem;color:var(--color-dark);border-bottom:2px solid var(--color-primary);padding-bottom:10px;margin-bottom:16px;">
					<i class="fas fa-broom" style="color:var(--color-primary);margin-right:8px;" aria-hidden="true"></i>Pool Services
				</h2>
				<?php
				$services = get_posts( array(
					'post_type'      => 'service',
					'post_status'    => 'publish',
					'posts_per_page' => -1,
					'orderby'        => 'menu_order',
				) );
				if ( $services ) : ?>
				<ul style="display:flex;flex-direction:column;gap:10px;">
					<?php foreach ( $services as $svc ) : ?>
					<li style="display:flex;align-items:center;gap:8px;">
						<i class="fas fa-angle-right" style="color:var(--color-primary);font-size:0.8rem;" aria-hidden="true"></i>
						<a href="<?php echo esc_url( get_permalink( $svc->ID ) ); ?>" style="color:var(--color-gray-700);font-size:0.9rem;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='var(--color-gray-700)'">
							<?php echo esc_html( $svc->post_title ); ?>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
				<?php else : ?>
				<ul style="display:flex;flex-direction:column;gap:10px;">
					<?php
					$default_services = array(
						array( 'Weekly Pool Cleaning',    home_url( '/services/weekly-pool-cleaning/' ) ),
						array( 'Bi-Weekly Cleaning',      home_url( '/services/bi-weekly-cleaning/' ) ),
						array( 'Chemical Balancing',      home_url( '/services/chemical-balancing/' ) ),
						array( 'Green Pool Treatment',    home_url( '/services/green-pool-treatment/' ) ),
						array( 'Pool Equipment Repair',   home_url( '/services/pool-equipment-repair/' ) ),
						array( 'New Pool Start-Up',       home_url( '/services/pool-startup/' ) ),
						array( 'Filter Cleaning',         home_url( '/services/filter-cleaning/' ) ),
						array( 'Acid Wash',               home_url( '/services/acid-wash/' ) ),
					);
					foreach ( $default_services as $svc ) : ?>
					<li style="display:flex;align-items:center;gap:8px;">
						<i class="fas fa-angle-right" style="color:var(--color-primary);font-size:0.8rem;" aria-hidden="true"></i>
						<a href="<?php echo esc_url( $svc[1] ); ?>" style="color:var(--color-gray-700);font-size:0.9rem;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='var(--color-gray-700)'">
							<?php echo esc_html( $svc[0] ); ?>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>

			<!-- Service Locations -->
			<div>
				<h2 style="font-size:1.1rem;color:var(--color-dark);border-bottom:2px solid var(--color-primary);padding-bottom:10px;margin-bottom:16px;">
					<i class="fas fa-map-marker-alt" style="color:var(--color-primary);margin-right:8px;" aria-hidden="true"></i>Service Locations
				</h2>
				<ul style="display:flex;flex-direction:column;gap:10px;">
					<?php
					$locations = function_exists( 'aquapro_get_locations' ) ? aquapro_get_locations() : array();
					foreach ( $locations as $slug => $loc ) : ?>
					<li style="display:flex;align-items:center;gap:8px;">
						<i class="fas fa-angle-right" style="color:var(--color-primary);font-size:0.8rem;" aria-hidden="true"></i>
						<a href="<?php echo esc_url( home_url( '/pool-service-' . $slug . '/' ) ); ?>" style="color:var(--color-gray-700);font-size:0.9rem;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='var(--color-gray-700)'">
							Pool Service in <?php echo esc_html( $loc['name'] ); ?>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<!-- Recent Blog Posts -->
			<div>
				<h2 style="font-size:1.1rem;color:var(--color-dark);border-bottom:2px solid var(--color-primary);padding-bottom:10px;margin-bottom:16px;">
					<i class="fas fa-newspaper" style="color:var(--color-primary);margin-right:8px;" aria-hidden="true"></i>Pool Care Tips &amp; Blog
				</h2>
				<?php
				$posts = get_posts( array(
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'posts_per_page' => 15,
					'orderby'        => 'date',
					'order'          => 'DESC',
				) );
				if ( $posts ) : ?>
				<ul style="display:flex;flex-direction:column;gap:10px;">
					<?php foreach ( $posts as $post ) : ?>
					<li style="display:flex;align-items:flex-start;gap:8px;">
						<i class="fas fa-angle-right" style="color:var(--color-primary);font-size:0.8rem;margin-top:4px;flex-shrink:0;" aria-hidden="true"></i>
						<div>
							<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" style="color:var(--color-gray-700);font-size:0.9rem;text-decoration:none;line-height:1.4;display:block;transition:color 0.2s;" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='var(--color-gray-700)'">
								<?php echo esc_html( $post->post_title ); ?>
							</a>
							<span style="font-size:0.75rem;color:var(--color-gray-400);"><?php echo esc_html( get_the_date( 'M j, Y', $post->ID ) ); ?></span>
						</div>
					</li>
					<?php endforeach; ?>
					<li style="margin-top:4px;">
						<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" style="color:var(--color-primary);font-size:0.875rem;font-weight:600;">
							View all posts <i class="fas fa-arrow-right" aria-hidden="true"></i>
						</a>
					</li>
				</ul>
				<?php else : ?>
				<p style="font-size:0.875rem;color:var(--color-gray-500);">Blog posts will appear here once published.</p>
				<?php endif; ?>
			</div>

		</div>

		<!-- XML Sitemap link -->
		<div style="margin-top:48px;padding:24px;background:var(--color-white);border-radius:var(--radius-lg);border:1px solid var(--color-gray-200);display:flex;align-items:center;gap:16px;">
			<i class="fas fa-code" style="color:var(--color-primary);font-size:1.5rem;flex-shrink:0;" aria-hidden="true"></i>
			<div>
				<div style="font-weight:700;color:var(--color-dark);margin-bottom:4px;">XML Sitemap for Search Engines</div>
				<p style="font-size:0.875rem;color:var(--color-gray-500);margin:0;">
					Submit our XML sitemap to Google Search Console and Bing Webmaster Tools to help search engines index all pages.
					<a href="<?php echo esc_url( home_url( '/sitemap.xml' ) ); ?>" style="color:var(--color-primary);font-weight:600;" target="_blank" rel="noopener">
						View sitemap.xml <i class="fas fa-external-link-alt" style="font-size:0.75rem;" aria-hidden="true"></i>
					</a>
				</p>
			</div>
		</div>

	</div>
</section>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<?php get_footer(); ?>
