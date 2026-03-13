<?php
/**
 * Main Index Template - Blog Loop
 *
 * @package AquaPro
 */

get_header();
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title">
			<?php
			if ( is_home() ) {
				_e( 'Pool Care Tips &amp; News', 'aquapro' );
			} elseif ( is_archive() ) {
				the_archive_title();
			} elseif ( is_search() ) {
				printf( __( 'Search Results: "%s"', 'aquapro' ), get_search_query() );
			} else {
				_e( 'Blog', 'aquapro' );
			}
			?>
		</h1>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<div style="display:grid;grid-template-columns:1fr 320px;gap:48px;align-items:start;">

			<!-- Posts Column -->
			<div>
				<?php if ( have_posts() ) : ?>
					<?php if ( is_archive() || is_search() ) : ?>
						<p style="color:var(--color-gray-500);margin-bottom:32px;font-size:0.9rem;">
							<?php printf( _n( '%s result found', '%s results found', $wp_query->found_posts, 'aquapro' ), number_format_i18n( $wp_query->found_posts ) ); ?>
						</p>
					<?php endif; ?>

					<div class="posts-grid" style="grid-template-columns:repeat(2,1fr);">
						<?php while ( have_posts() ) : the_post(); ?>
						<article <?php post_class( 'post-card' ); ?>>
							<div class="post-thumbnail">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
										<?php the_post_thumbnail( 'aquapro-thumb' ); ?>
									</a>
								<?php else : ?>
									<span aria-hidden="true">🏊</span>
								<?php endif; ?>
							</div>
							<div class="post-content">
								<?php if ( has_category() ) : ?>
								<span class="post-category"><?php the_category( ', ' ); ?></span>
								<?php endif; ?>
								<h2 class="post-title" style="font-size:1.05rem;">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<p class="post-excerpt"><?php echo aquapro_excerpt( 18 ); ?></p>
								<div class="post-meta">
									<span><?php the_date(); ?></span>
									<a href="<?php the_permalink(); ?>" style="color:var(--color-primary);font-weight:700;font-size:0.85rem;">
										<?php _e( 'Read →', 'aquapro' ); ?>
									</a>
								</div>
							</div>
						</article>
						<?php endwhile; ?>
					</div>

					<?php
					the_posts_pagination( array(
						'mid_size'  => 2,
						'prev_text' => '<i class="fas fa-arrow-left" aria-hidden="true"></i>',
						'next_text' => '<i class="fas fa-arrow-right" aria-hidden="true"></i>',
						'class'     => 'pagination',
					) );
					?>

				<?php else : ?>
					<div style="text-align:center;padding:80px 0;">
						<div style="font-size:4rem;margin-bottom:24px;">🔍</div>
						<h2><?php _e( 'Nothing found', 'aquapro' ); ?></h2>
						<p style="color:var(--color-gray-500);margin:16px 0 32px;">
							<?php _e( 'Try a different search or browse our services.', 'aquapro' ); ?>
						</p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
							<?php _e( 'Go Home', 'aquapro' ); ?>
						</a>
					</div>
				<?php endif; ?>
			</div>

			<!-- Sidebar -->
			<aside class="blog-sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'aquapro' ); ?>">
				<?php get_sidebar(); ?>
			</aside>

		</div>
	</div>
</section>

<?php get_footer(); ?>
