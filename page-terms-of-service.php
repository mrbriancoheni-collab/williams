<?php
/**
 * Template Name: Terms of Service
 * Template Post Type: page
 *
 * @package AquaPro
 */

get_header();

$company    = get_bloginfo( 'name' );
$email      = get_theme_mod( 'aquapro_email', 'williamspoolcare@gmail.com' );
$phone      = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165325561' );
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title"><?php esc_html_e( 'Terms of Service', 'aquapro' ); ?></h1>
		<?php aquapro_breadcrumbs(); ?>
	</div>
</div>

<section class="section-padding">
	<div class="container" style="max-width:860px;">
		<article class="service-content-card">
			<div class="entry-content">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; else : ?>

				<p style="color:var(--color-gray-500);font-size:0.9rem;margin-bottom:32px;">
					<?php esc_html_e( 'Last updated: January 1, 2025', 'aquapro' ); ?>
				</p>

				<h2><?php esc_html_e( 'Services', 'aquapro' ); ?></h2>
				<p><?php printf( esc_html__( '%s provides residential pool cleaning, maintenance, and equipment repair services. By scheduling service, you agree to provide safe access to your pool area and to maintain a safe working environment for our technicians.', 'aquapro' ), esc_html( $company ) ); ?></p>

				<h2><?php esc_html_e( 'Service Agreements', 'aquapro' ); ?></h2>
				<p><?php esc_html_e( 'Recurring service plans (weekly, bi-weekly) continue until cancelled. You may cancel at any time by providing written or verbal notice at least 7 days before your next scheduled service. No cancellation fees apply.', 'aquapro' ); ?></p>

				<h2><?php esc_html_e( 'Payment', 'aquapro' ); ?></h2>
				<p><?php esc_html_e( 'Payment is due upon completion of service or as outlined in your service agreement. Invoices for recurring service are issued monthly. Accounts past due by 30 days may result in service suspension.', 'aquapro' ); ?></p>

				<h2><?php esc_html_e( 'Chemical Costs', 'aquapro' ); ?></h2>
				<p><?php esc_html_e( 'Standard monthly service plans include chemicals needed for routine balancing. Chemicals required for extraordinary situations (severe algae blooms, storm recovery, refills after drain-and-refill) may be billed separately.', 'aquapro' ); ?></p>

				<h2><?php esc_html_e( 'Access & Safety', 'aquapro' ); ?></h2>
				<p><?php esc_html_e( 'You are responsible for ensuring our technicians have safe access to your pool. Please notify us of any hazards (aggressive pets, locked gates, electrical issues) before service. We reserve the right to skip a visit if conditions are unsafe.', 'aquapro' ); ?></p>

				<h2><?php esc_html_e( 'Limitation of Liability', 'aquapro' ); ?></h2>
				<p><?php printf( esc_html__( '%s is not liable for pre-existing equipment failures, pool structure damage, or issues caused by factors outside our control (drought restrictions, electrical surges, acts of nature). Our liability is limited to the cost of the service performed.', 'aquapro' ), esc_html( $company ) ); ?></p>

				<h2><?php esc_html_e( 'Changes to These Terms', 'aquapro' ); ?></h2>
				<p><?php esc_html_e( 'We may update these Terms of Service periodically. Continued use of our services after changes constitutes acceptance of the revised terms.', 'aquapro' ); ?></p>

				<h2><?php esc_html_e( 'Contact', 'aquapro' ); ?></h2>
				<p><?php printf(
					esc_html__( 'Questions about these Terms? Call us at %s or email %s.', 'aquapro' ),
					'<a href="tel:+' . esc_attr( $phone_link ) . '">' . esc_html( $phone ) . '</a>',
					'<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>'
				); ?></p>

				<?php endif; ?>

			</div>
		</article>
	</div>
</section>

<?php get_footer(); ?>
