<?php
/**
 * Template Name: Privacy Policy
 * Template Post Type: page
 *
 * @package AquaPro
 */

get_header();

$company = get_bloginfo( 'name' );
$email   = get_theme_mod( 'aquapro_email', 'williamspoolcare@gmail.com' );
$phone   = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero-title"><?php esc_html_e( 'Privacy Policy', 'aquapro' ); ?></h1>
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

				<h2><?php esc_html_e( 'Information We Collect', 'aquapro' ); ?></h2>
				<p><?php printf( esc_html__( 'When you request a quote or contact %s, we collect your name, email address, phone number, and property address. We also collect information you voluntarily provide about your pool and service needs.', 'aquapro' ), esc_html( $company ) ); ?></p>

				<h2><?php esc_html_e( 'How We Use Your Information', 'aquapro' ); ?></h2>
				<p><?php esc_html_e( 'We use the information you provide to:', 'aquapro' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Contact you with a service quote or estimate', 'aquapro' ); ?></li>
					<li><?php esc_html_e( 'Schedule and confirm pool cleaning appointments', 'aquapro' ); ?></li>
					<li><?php esc_html_e( 'Send service reports after each visit', 'aquapro' ); ?></li>
					<li><?php esc_html_e( 'Respond to your questions or service requests', 'aquapro' ); ?></li>
				</ul>
				<p><?php esc_html_e( 'We do not sell, rent, or share your personal information with third parties for marketing purposes.', 'aquapro' ); ?></p>

				<h2><?php esc_html_e( 'Cookies', 'aquapro' ); ?></h2>
				<p><?php esc_html_e( 'Our website uses cookies to improve your browsing experience and to understand how visitors use our site. You can disable cookies in your browser settings; however, some features of the site may not function properly.', 'aquapro' ); ?></p>

				<h2><?php esc_html_e( 'Google Analytics', 'aquapro' ); ?></h2>
				<p><?php esc_html_e( 'We use Google Analytics to collect anonymized data about how visitors interact with our website. Google Analytics uses cookies and may collect your IP address. For more information, see the Google Privacy Policy.', 'aquapro' ); ?></p>

				<h2><?php esc_html_e( 'Data Security', 'aquapro' ); ?></h2>
				<p><?php esc_html_e( 'We take reasonable precautions to protect your personal information from unauthorized access, use, or disclosure. We store contact information securely and restrict access to authorized personnel only.', 'aquapro' ); ?></p>

				<h2><?php esc_html_e( 'Your Rights', 'aquapro' ); ?></h2>
				<p><?php esc_html_e( 'You may request to access, correct, or delete any personal information we hold about you at any time by contacting us directly.', 'aquapro' ); ?></p>

				<h2><?php esc_html_e( 'Contact Us', 'aquapro' ); ?></h2>
				<p><?php printf(
					esc_html__( 'If you have any questions about this Privacy Policy, please contact us at %s or call %s.', 'aquapro' ),
					'<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>',
					esc_html( $phone )
				); ?></p>

				<?php endif; ?>

			</div>
		</article>
	</div>
</section>

<?php get_footer(); ?>
