<?php
/**
 * Single Post Template
 *
 * @package AquaPro
 */

get_header();
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title"><?php the_title(); ?></h1>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<div style="display:grid;grid-template-columns:1fr 320px;gap:48px;align-items:start;">

			<!-- Article -->
			<article <?php post_class( 'single-post' ); ?> itemscope itemtype="https://schema.org/BlogPosting">
				<meta itemprop="headline" content="<?php the_title_attribute(); ?>">
				<meta itemprop="datePublished" content="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
				<meta itemprop="dateModified" content="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">

				<div style="background:var(--color-white);border-radius:var(--radius-xl);overflow:hidden;box-shadow:var(--shadow-md);">
					<?php if ( has_post_thumbnail() ) : ?>
					<div style="aspect-ratio:16/8;overflow:hidden;">
						<?php the_post_thumbnail( 'aquapro-hero', array( 'itemprop' => 'image', 'style' => 'width:100%;height:100%;object-fit:cover;' ) ); ?>
					</div>
					<?php endif; ?>

					<div style="padding:48px;">
						<!-- Meta -->
						<div style="display:flex;gap:16px;align-items:center;margin-bottom:28px;flex-wrap:wrap;">
							<?php if ( has_category() ) : ?>
							<span class="post-category"><?php the_category( ' · ' ); ?></span>
							<?php endif; ?>
							<span style="font-size:0.85rem;color:var(--color-gray-500);">
								<i class="fas fa-calendar-alt" aria-hidden="true"></i>
								<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished">
									<?php the_date(); ?>
								</time>
							</span>
							<span style="font-size:0.85rem;color:var(--color-gray-500);">
								<i class="fas fa-clock" aria-hidden="true"></i>
								<?php
								$words = str_word_count( strip_tags( get_the_content() ) );
								$read_time = ceil( $words / 200 );
								printf( _n( '%d min read', '%d min read', $read_time, 'aquapro' ), $read_time );
								?>
							</span>
						</div>

						<!-- Content -->
						<div class="entry-content" itemprop="articleBody" style="line-height:1.85;color:var(--color-gray-700);">
							<?php the_content(); ?>
						</div>

						<!-- Tags -->
						<?php if ( has_tag() ) : ?>
						<div style="margin-top:32px;padding-top:24px;border-top:1px solid var(--color-gray-100);">
							<span style="font-size:0.85rem;font-weight:700;color:var(--color-dark);">
								<i class="fas fa-tags" aria-hidden="true"></i> <?php _e( 'Tags:', 'aquapro' ); ?>
							</span>
							<?php the_tags( ' ', ' · ', '' ); ?>
						</div>
						<?php endif; ?>

						<!-- Author Box -->
						<div style="margin-top:40px;padding:28px;background:var(--color-gray-100);border-radius:var(--radius-lg);display:flex;gap:20px;align-items:flex-start;">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 64, '', '', array( 'style' => 'border-radius:50%;flex-shrink:0;' ) ); ?>
							<div>
								<div style="font-weight:700;color:var(--color-dark);margin-bottom:6px;" itemprop="author" itemscope itemtype="https://schema.org/Person">
									<span itemprop="name"><?php the_author(); ?></span> &mdash; <?php bloginfo( 'name' ); ?>
								</div>
								<p style="font-size:0.875rem;color:var(--color-gray-500);line-height:1.7;">
									<?php echo esc_html( get_the_author_meta( 'description' ) ?: __( 'Pool care professional with 20+ years of experience serving the Sacramento area. Certified pool operator.', 'aquapro' ) ); ?>
								</p>
							</div>
						</div>

						<!-- Post Navigation -->
						<?php
						$prev = get_previous_post();
						$next = get_next_post();
						if ( $prev || $next ) : ?>
						<nav style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:40px;" aria-label="<?php esc_attr_e( 'Post navigation', 'aquapro' ); ?>">
							<?php if ( $prev ) : ?>
							<a href="<?php echo esc_url( get_permalink( $prev ) ); ?>" style="padding:20px;background:var(--color-white);border:1px solid var(--color-gray-100);border-radius:var(--radius-md);text-decoration:none;transition:all 0.2s ease;" class="post-nav-link">
								<span style="font-size:0.75rem;color:var(--color-gray-500);text-transform:uppercase;letter-spacing:1px;display:block;margin-bottom:6px;">← <?php _e( 'Previous', 'aquapro' ); ?></span>
								<span style="font-size:0.9rem;font-weight:700;color:var(--color-dark);"><?php echo esc_html( get_the_title( $prev ) ); ?></span>
							</a>
							<?php else : ?><div></div><?php endif; ?>
							<?php if ( $next ) : ?>
							<a href="<?php echo esc_url( get_permalink( $next ) ); ?>" style="padding:20px;background:var(--color-white);border:1px solid var(--color-gray-100);border-radius:var(--radius-md);text-decoration:none;text-align:right;transition:all 0.2s ease;" class="post-nav-link">
								<span style="font-size:0.75rem;color:var(--color-gray-500);text-transform:uppercase;letter-spacing:1px;display:block;margin-bottom:6px;"><?php _e( 'Next', 'aquapro' ); ?> →</span>
								<span style="font-size:0.9rem;font-weight:700;color:var(--color-dark);"><?php echo esc_html( get_the_title( $next ) ); ?></span>
							</a>
							<?php endif; ?>
						</nav>
						<?php endif; ?>

						<!-- Comments -->
						<?php if ( comments_open() || get_comments_number() ) : ?>
						<div class="comments-area">
							<?php comments_template(); ?>
						</div>
						<?php endif; ?>

					</div>
				</div>
			</article>

			<!-- Sidebar -->
			<aside class="blog-sidebar" role="complementary">
				<?php get_sidebar(); ?>
			</aside>

		</div>
	</div>
</section>

<?php get_footer(); ?>
