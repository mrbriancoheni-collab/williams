<?php
/**
 * 404 Template
 *
 * @package AquaPro
 */

get_header();

$phone      = get_theme_mod( 'aquapro_phone', '(916) 555-0192' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165550192' );
?>

<section style="min-height:80vh;display:flex;align-items:center;background:linear-gradient(135deg,var(--color-dark),var(--color-dark-2));">
	<div class="container text-center">
		<div style="font-size:8rem;margin-bottom:24px;animation:float 4s ease-in-out infinite;" aria-hidden="true">🏊</div>
		<h1 style="font-size:clamp(4rem,10vw,8rem);color:rgba(255,255,255,0.1);line-height:1;font-family:var(--font-heading);">404</h1>
		<h2 style="font-size:2rem;color:var(--color-white);margin:-20px 0 16px;"><?php _e( 'Page Not Found', 'aquapro' ); ?></h2>
		<p style="color:rgba(255,255,255,0.6);font-size:1.1rem;max-width:500px;margin:0 auto 40px;line-height:1.7;">
			<?php _e( "Looks like you've gone off the deep end! This page doesn't exist. Let us help you find what you're looking for.", 'aquapro' ); ?>
		</p>
		<div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">
				<i class="fas fa-home" aria-hidden="true"></i>
				<?php _e( 'Back to Home', 'aquapro' ); ?>
			</a>
			<a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-white btn-lg">
				<?php _e( 'View Our Services', 'aquapro' ); ?>
			</a>
			<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="btn btn-gold btn-lg">
				<i class="fas fa-phone" aria-hidden="true"></i>
				<?php echo esc_html( $phone ); ?>
			</a>
		</div>
		<div style="margin-top:48px;">
			<?php get_search_form(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
