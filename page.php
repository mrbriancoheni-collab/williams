<?php
/**
 * Generic Page Template
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

<section class="section-padding" style="background:#F3F6FA;">
	<div class="container-narrow">
		<article <?php post_class( 'page-content' ); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="service-featured-img" style="margin-bottom:36px;">
				<?php the_post_thumbnail( 'aquapro-hero', array( 'alt' => get_the_title() ) ); ?>
			</div>
			<?php endif; ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
	</div>
</section>

<?php require get_template_directory() . '/inc/service-areas-section.php'; ?>

<?php get_footer(); ?>
