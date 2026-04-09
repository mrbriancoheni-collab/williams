<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$phone      = get_theme_mod( 'aquapro_phone', '(916) 555-0192' );
$phone_link = get_theme_mod( 'aquapro_phone_link', '19165550192' );
$notif_show = get_theme_mod( 'aquapro_notif_show', '1' );
$notif_text = get_theme_mod( 'aquapro_notif_text', '🌊 <strong>New Client Special:</strong> Sign up for weekly service and get your first cleaning FREE! Call now to claim your spot.' );
?>

<!-- Skip to Content -->
<a class="sr-only" href="#main-content"><?php _e( 'Skip to main content', 'aquapro' ); ?></a>

<?php if ( $notif_show ) : ?>
<div class="notification-bar" id="notificationBar" role="banner">
	<p><?php echo wp_kses_post( $notif_text ); ?></p>
	<button class="notification-close" aria-label="<?php esc_attr_e( 'Close notification', 'aquapro' ); ?>" onclick="document.getElementById('notificationBar').remove()">✕</button>
</div>
<?php endif; ?>

<header class="site-header transparent" id="siteHeader" role="banner">

	<!-- Top Info Bar -->
	<div class="header-top-bar">
		<div class="container">
			<div class="header-top-inner">
				<div class="header-top-contact">
					<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" aria-label="<?php esc_attr_e( 'Call us', 'aquapro' ); ?>">
						<i class="fas fa-phone" aria-hidden="true"></i>
						<?php echo esc_html( $phone ); ?>
					</a>
					<a href="mailto:<?php echo esc_attr( get_theme_mod( 'aquapro_email', 'info@williamspoolcare.com' ) ); ?>">
						<i class="fas fa-envelope" aria-hidden="true"></i>
						<?php echo esc_html( get_theme_mod( 'aquapro_email', 'info@williamspoolcare.com' ) ); ?>
					</a>
					<span>
						<i class="fas fa-clock" aria-hidden="true"></i>
						<?php echo esc_html( get_theme_mod( 'aquapro_hours', 'Mon–Sat: 7AM–6PM' ) ); ?>
					</span>
				</div>
				<div class="header-top-social">
					<?php if ( $fb = get_theme_mod( 'aquapro_facebook', 'https://www.facebook.com/swimsafe247/' ) ) : ?>
					<a href="<?php echo esc_url( $fb ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
						<i class="fab fa-facebook-f" aria-hidden="true"></i>
					</a>
					<?php endif; ?>
					<?php if ( $ig = get_theme_mod( 'aquapro_instagram', '' ) ) : ?>
					<a href="<?php echo esc_url( $ig ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
						<i class="fab fa-instagram" aria-hidden="true"></i>
					</a>
					<?php endif; ?>
					<?php if ( $yelp = get_theme_mod( 'aquapro_yelp', '' ) ) : ?>
					<a href="<?php echo esc_url( $yelp ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Yelp">
						<i class="fab fa-yelp" aria-hidden="true"></i>
					</a>
					<?php endif; ?>
					<?php if ( $nd = get_theme_mod( 'aquapro_nextdoor', 'https://nextdoor.com/pages/williams-pool-care-fair-oaks-ca/' ) ) : ?>
					<a href="<?php echo esc_url( $nd ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Nextdoor">
						<i class="fas fa-home" aria-hidden="true"></i>
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Main Header -->
	<div class="header-main">
		<div class="container">
			<div class="header-inner">

				<!-- Logo -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home" aria-label="<?php bloginfo( 'name' ); ?> - Home">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<div class="logo-icon" aria-hidden="true">🏊</div>
						<div class="logo-text">
							<span class="logo-name"><?php bloginfo( 'name' ); ?></span>
							<span class="logo-tagline"><?php _e( 'Pool Cleaning Experts', 'aquapro' ); ?></span>
						</div>
					<?php endif; ?>
				</a>

				<!-- Primary Navigation -->
				<nav class="main-nav" id="mainNav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'aquapro' ); ?>">
					<?php
					wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container'       => false,
						'menu_class'      => '',
						'fallback_cb'     => 'aquapro_fallback_menu',
						'walker'          => new Aquapro_Nav_Walker(),
					) );
					?>
				</nav>

				<!-- Header CTA -->
				<div class="header-cta">
					<div class="header-phone">
						<div class="phone-icon" aria-hidden="true">
							<i class="fas fa-phone-alt"></i>
						</div>
						<a href="tel:+<?php echo esc_attr( $phone_link ); ?>" class="header-phone-number">
							<?php echo esc_html( $phone ); ?>
						</a>
					</div>
					<a href="#quote-form" class="btn btn-primary btn-sm">
						<?php _e( 'Free Quote', 'aquapro' ); ?>
					</a>
				</div>

				<!-- Mobile Toggle -->
				<button class="nav-toggle" id="navToggle" aria-label="<?php esc_attr_e( 'Toggle mobile menu', 'aquapro' ); ?>" aria-expanded="false" aria-controls="mainNav">
					<span></span>
					<span></span>
					<span></span>
				</button>

			</div>
		</div>
	</div>
</header>

<main id="main-content" role="main">
<?php
