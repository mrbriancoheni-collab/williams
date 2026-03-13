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

<section class="section-padding">
	<div class="container-narrow">
		<article <?php post_class( 'page-content' ); ?>>
			<?php
			if ( has_post_thumbnail() ) {
				echo '<div style="border-radius:var(--radius-xl);overflow:hidden;margin-bottom:40px;box-shadow:var(--shadow-lg);">';
				the_post_thumbnail( 'aquapro-hero', array( 'style' => 'width:100%;height:auto;display:block;' ) );
				echo '</div>';
			}
			?>
			<div class="entry-content" style="line-height:1.85;color:var(--color-gray-700);">
				<?php the_content(); ?>
			</div>
		</article>
	</div>
</section>

<?php get_footer(); ?>
