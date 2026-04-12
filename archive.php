<?php
/**
 * Archive Template
 *
 * @package AquaPro
 */

get_header();
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title"><?php the_archive_title(); ?></h1>
		<?php if ( get_the_archive_description() ) : ?>
		<p style="color:rgba(255,255,255,0.7);max-width:560px;margin:12px auto 0;line-height:1.7;">
			<?php the_archive_description(); ?>
		</p>
		<?php endif; ?>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<section class="section-padding" style="background:var(--color-gray-100);">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="posts-grid">
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
						<span class="post-category"><?php the_category( ' · ' ); ?></span>
						<?php endif; ?>
						<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="post-excerpt"><?php echo aquapro_excerpt( 20 ); ?></p>
						<div class="post-meta">
							<span><?php the_date(); ?></span>
							<a href="<?php the_permalink(); ?>" style="color:var(--color-primary);font-weight:700;font-size:0.85rem;"><?php _e( 'Read More →', 'aquapro' ); ?></a>
						</div>
					</div>
				</article>
				<?php endwhile; ?>
			</div>

			<?php the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => '← ' . __( 'Previous', 'aquapro' ),
				'next_text' => __( 'Next', 'aquapro' ) . ' →',
				'class'     => 'pagination',
			) ); ?>

		<?php else : ?>
			<div style="text-align:center;padding:80px 0;">
				<p><?php _e( 'No posts found.', 'aquapro' ); ?></p>
				<a href="<?php echo esc_url( home_url() ); ?>" class="btn btn-primary" style="margin-top:20px;"><?php _e( 'Go Home', 'aquapro' ); ?></a>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<?php get_footer(); ?>
