<?php
/**
 * AquaPro Pool Cleaning - Functions
 *
 * @package AquaPro
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load admin settings & meta boxes
require_once get_template_directory() . '/inc/admin-settings.php';

// Localized service page data & setup
require_once get_template_directory() . '/inc/location-data.php';
require_once get_template_directory() . '/inc/location-setup.php';

// ============================================================
// THEME SETUP
// ============================================================

if ( ! function_exists( 'aquapro_setup' ) ) :
	function aquapro_setup() {
		load_theme_textdomain( 'aquapro', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style',
		) );
		add_theme_support( 'custom-logo', array(
			'height'      => 80,
			'width'       => 220,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );

		// Image sizes
		add_image_size( 'aquapro-hero',     1920, 900,  true );
		add_image_size( 'aquapro-service',  640,  480,  true );
		add_image_size( 'aquapro-gallery',  800,  600,  true );
		add_image_size( 'aquapro-thumb',    480,  360,  true );
		add_image_size( 'aquapro-portrait', 600,  800,  true );

		register_nav_menus( array(
			'primary'    => __( 'Primary Navigation', 'aquapro' ),
			'footer-1'   => __( 'Footer Services', 'aquapro' ),
			'footer-2'   => __( 'Footer Company', 'aquapro' ),
		) );

		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'aquapro_setup' );

// ============================================================
// ENQUEUE SCRIPTS & STYLES
// ============================================================

function aquapro_scripts() {
	$ver = wp_get_theme()->get( 'Version' );

	// Google Fonts
	wp_enqueue_style(
		'aquapro-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&family=Open+Sans:wght@400;500;600&display=swap',
		array(),
		null
	);

	// Font Awesome (CDN)
	wp_enqueue_style(
		'font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
		array(),
		'6.5.1'
	);

	// Main stylesheet
	wp_enqueue_style(
		'aquapro-style',
		get_stylesheet_uri(),
		array( 'aquapro-fonts', 'font-awesome' ),
		$ver
	);

	// Main JS
	wp_enqueue_script(
		'aquapro-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		$ver,
		true
	);

	// Pass data to JS
	wp_localize_script( 'aquapro-main', 'aquaproData', array(
		'ajaxUrl'            => admin_url( 'admin-ajax.php' ),
		'nonce'              => wp_create_nonce( 'aquapro_nonce' ),
		'siteUrl'            => get_site_url(),
		'phone'              => get_theme_mod( 'aquapro_phone', '(916) 532-5561' ),
		'adsConversionId'    => get_theme_mod( 'aquapro_ads_conversion_id', '' ),
		'adsConversionLabel' => get_theme_mod( 'aquapro_ads_conversion_label', '' ),
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aquapro_scripts' );

// ============================================================
// WIDGET AREAS
// ============================================================

function aquapro_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'aquapro' ),
		'id'            => 'sidebar-blog',
		'description'   => __( 'Widgets in the blog sidebar.', 'aquapro' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Column 1', 'aquapro' ),
		'id'            => 'footer-1',
		'description'   => __( 'Footer widget area 1.', 'aquapro' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-heading">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Column 2', 'aquapro' ),
		'id'            => 'footer-2',
		'description'   => __( 'Footer widget area 2.', 'aquapro' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-heading">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'aquapro_widgets_init' );

// ============================================================
// CUSTOM POST TYPES
// ============================================================

function aquapro_register_post_types() {
	// Services CPT
	register_post_type( 'service', array(
		'labels' => array(
			'name'               => __( 'Services', 'aquapro' ),
			'singular_name'      => __( 'Service', 'aquapro' ),
			'add_new_item'       => __( 'Add New Service', 'aquapro' ),
			'edit_item'          => __( 'Edit Service', 'aquapro' ),
			'new_item'           => __( 'New Service', 'aquapro' ),
			'view_item'          => __( 'View Service', 'aquapro' ),
			'search_items'       => __( 'Search Services', 'aquapro' ),
			'menu_name'          => __( 'Services', 'aquapro' ),
		),
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array( 'slug' => 'services' ),
		'menu_icon'           => 'dashicons-networking',
		'menu_position'       => 5,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes' ),
		'show_in_rest'        => true,
	) );

	// Testimonials CPT
	register_post_type( 'testimonial', array(
		'labels' => array(
			'name'          => __( 'Testimonials', 'aquapro' ),
			'singular_name' => __( 'Testimonial', 'aquapro' ),
			'add_new_item'  => __( 'Add New Testimonial', 'aquapro' ),
			'edit_item'     => __( 'Edit Testimonial', 'aquapro' ),
			'menu_name'     => __( 'Testimonials', 'aquapro' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'menu_icon'    => 'dashicons-format-quote',
		'menu_position' => 6,
		'supports'     => array( 'title', 'editor', 'custom-fields' ),
		'show_in_rest' => true,
	) );

	// Team Members CPT
	register_post_type( 'team_member', array(
		'labels' => array(
			'name'          => __( 'Team Members', 'aquapro' ),
			'singular_name' => __( 'Team Member', 'aquapro' ),
			'menu_name'     => __( 'Team', 'aquapro' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'menu_icon'    => 'dashicons-businessman',
		'menu_position' => 7,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'aquapro_register_post_types' );

// ============================================================
// CUSTOM TAXONOMIES
// ============================================================

function aquapro_register_taxonomies() {
	register_taxonomy( 'service_category', 'service', array(
		'labels' => array(
			'name'          => __( 'Service Categories', 'aquapro' ),
			'singular_name' => __( 'Service Category', 'aquapro' ),
		),
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'service-category' ),
		'show_in_rest' => true,
	) );

	register_taxonomy( 'service_area', 'service', array(
		'labels' => array(
			'name'          => __( 'Service Areas', 'aquapro' ),
			'singular_name' => __( 'Service Area', 'aquapro' ),
		),
		'hierarchical' => false,
		'rewrite'      => array( 'slug' => 'service-area' ),
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'aquapro_register_taxonomies' );

// ============================================================
// CUSTOMIZER
// ============================================================

function aquapro_customize_register( $wp_customize ) {
	// ---- Business Info Panel ----
	$wp_customize->add_panel( 'aquapro_business', array(
		'title'    => __( 'Business Information', 'aquapro' ),
		'priority' => 130,
	) );

	// Contact Section
	$wp_customize->add_section( 'aquapro_contact', array(
		'title'  => __( 'Contact Details', 'aquapro' ),
		'panel'  => 'aquapro_business',
	) );

	$contact_fields = array(
		'aquapro_phone'        => array( __( 'Phone Number', 'aquapro' ), '(916) 532-5561' ),
		'aquapro_phone_link'   => array( __( 'Phone (link format)', 'aquapro' ), '19165325561' ),
		'aquapro_email'        => array( __( 'Email Address', 'aquapro' ), 'williamspoolcare@gmail.com' ),
		'aquapro_address'      => array( __( 'Business Address', 'aquapro' ), '123 Pool Lane, Your City, ST 00000' ),
		'aquapro_hours'        => array( __( 'Business Hours', 'aquapro' ), 'Mon–Fri: 7AM–6PM | Sat: 8AM–4PM' ),
		'aquapro_license'      => array( __( 'License Number', 'aquapro' ), 'CPO-123456' ),
	);

	foreach ( $contact_fields as $id => $config ) {
		$wp_customize->add_setting( $id, array( 'default' => $config[1], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( $id, array( 'label' => $config[0], 'section' => 'aquapro_contact', 'type' => 'text' ) );
	}

	// Social Media Section
	$wp_customize->add_section( 'aquapro_social', array(
		'title' => __( 'Social Media', 'aquapro' ),
		'panel' => 'aquapro_business',
	) );

	$social_fields = array(
		'aquapro_facebook'  => __( 'Facebook URL', 'aquapro' ),
		'aquapro_instagram' => __( 'Instagram URL', 'aquapro' ),
		'aquapro_yelp'      => __( 'Yelp URL', 'aquapro' ),
		'aquapro_google'    => __( 'Google Business URL', 'aquapro' ),
		'aquapro_nextdoor'  => __( 'Nextdoor URL', 'aquapro' ),
	);

	foreach ( $social_fields as $id => $label ) {
		$wp_customize->add_setting( $id, array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( $id, array( 'label' => $label, 'section' => 'aquapro_social', 'type' => 'url' ) );
	}

	// Hero Section
	$wp_customize->add_section( 'aquapro_hero', array(
		'title'    => __( 'Hero Section', 'aquapro' ),
		'priority' => 131,
	) );

	$hero_fields = array(
		'aquapro_hero_badge'    => array( __( 'Hero Badge Text', 'aquapro' ), '⭐ #1 Rated Pool Service in the Valley' ),
		'aquapro_hero_title'    => array( __( 'Hero Title', 'aquapro' ), 'Crystal Clear Pools. Every Week. Guaranteed.' ),
		'aquapro_hero_subtitle' => array( __( 'Hero Subtitle', 'aquapro' ), 'Professional pool cleaning, chemical balancing, and equipment repair. Serving homeowners and HOAs across the valley for over 15 years.' ),
		'aquapro_hero_cta_1'    => array( __( 'Primary CTA Text', 'aquapro' ), 'Get Free Quote' ),
		'aquapro_hero_cta_2'    => array( __( 'Secondary CTA Text', 'aquapro' ), 'Call Now' ),
	);

	foreach ( $hero_fields as $id => $config ) {
		$wp_customize->add_setting( $id, array( 'default' => $config[1], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( $id, array( 'label' => $config[0], 'section' => 'aquapro_hero', 'type' => 'text' ) );
	}

	// Notification Bar
	$wp_customize->add_section( 'aquapro_notification', array(
		'title'    => __( 'Notification Bar', 'aquapro' ),
		'priority' => 132,
	) );

	$wp_customize->add_setting( 'aquapro_notif_show', array( 'default' => '1', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'aquapro_notif_show', array(
		'label'   => __( 'Show Notification Bar', 'aquapro' ),
		'section' => 'aquapro_notification',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'aquapro_notif_text', array(
		'default'           => '🌊 <strong>Summer Special:</strong> Sign up for weekly pool service and get your first month FREE! Limited spots available.',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'aquapro_notif_text', array(
		'label'   => __( 'Notification Text (HTML allowed)', 'aquapro' ),
		'section' => 'aquapro_notification',
		'type'    => 'textarea',
	) );

	// SEO Section
	$wp_customize->add_section( 'aquapro_seo_local', array(
		'title'    => __( 'Local SEO Settings', 'aquapro' ),
		'priority' => 140,
	) );

	$seo_fields = array(
		'aquapro_city'         => array( __( 'Primary City', 'aquapro' ), 'Phoenix' ),
		'aquapro_state'        => array( __( 'State', 'aquapro' ), 'Arizona' ),
		'aquapro_state_abbr'   => array( __( 'State Abbreviation', 'aquapro' ), 'AZ' ),
		'aquapro_zip'          => array( __( 'ZIP Code', 'aquapro' ), '85001' ),
		'aquapro_service_areas'=> array( __( 'Service Areas (comma separated)', 'aquapro' ), 'Scottsdale, Tempe, Mesa, Chandler, Gilbert, Glendale, Peoria' ),
		'aquapro_founded'      => array( __( 'Year Founded', 'aquapro' ), '2009' ),
		'aquapro_pools_cleaned'=> array( __( 'Pools Cleaned (stat)', 'aquapro' ), '5,000+' ),
		'aquapro_years_exp'    => array( __( 'Years of Experience', 'aquapro' ), '15+' ),
		'aquapro_reviews'      => array( __( '5-Star Reviews Count', 'aquapro' ), '500+' ),
	);

	foreach ( $seo_fields as $id => $config ) {
		$wp_customize->add_setting( $id, array( 'default' => $config[1], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( $id, array( 'label' => $config[0], 'section' => 'aquapro_seo_local', 'type' => 'text' ) );
	}

	// Analytics
	$wp_customize->add_section( 'aquapro_analytics', array(
		'title'    => __( 'Analytics & Tracking', 'aquapro' ),
		'priority' => 150,
	) );

	$wp_customize->add_setting( 'aquapro_ga4', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'aquapro_ga4', array(
		'label'   => __( 'Google Analytics 4 Measurement ID (G-XXXXXXXX)', 'aquapro' ),
		'section' => 'aquapro_analytics',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'aquapro_gtm', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'aquapro_gtm', array(
		'label'   => __( 'Google Tag Manager ID (GTM-XXXXXX)', 'aquapro' ),
		'section' => 'aquapro_analytics',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'aquapro_ads_conversion_id', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'aquapro_ads_conversion_id', array(
		'label'       => __( 'Google Ads Conversion ID (AW-XXXXXXXXX)', 'aquapro' ),
		'description' => __( 'Found in Google Ads → Tools → Conversions → your conversion action → Tag setup.', 'aquapro' ),
		'section'     => 'aquapro_analytics',
		'type'        => 'text',
	) );

	$wp_customize->add_setting( 'aquapro_ads_conversion_label', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'aquapro_ads_conversion_label', array(
		'label'   => __( 'Google Ads Conversion Label', 'aquapro' ),
		'section' => 'aquapro_analytics',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'aquapro_reviews_count', array( 'default' => '500+', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'aquapro_reviews_count', array(
		'label'       => __( 'Google Review Count (e.g. 127)', 'aquapro' ),
		'description' => __( 'Shown in trust badges on landing pages.', 'aquapro' ),
		'section'     => 'aquapro_analytics',
		'type'        => 'text',
	) );

	$wp_customize->add_setting( 'aquapro_fbpixel', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'aquapro_fbpixel', array(
		'label'   => __( 'Facebook Pixel ID', 'aquapro' ),
		'section' => 'aquapro_analytics',
		'type'    => 'text',
	) );

	// ---- Email / SMTP Section ----
	$wp_customize->add_section( 'aquapro_smtp', array(
		'title'       => __( 'Email Settings (SMTP)', 'aquapro' ),
		'description' => __( 'Configure Gmail SMTP so quote request emails are delivered reliably. Use a Gmail App Password — not your regular Gmail password. Generate one at myaccount.google.com → Security → App Passwords.', 'aquapro' ),
		'priority'    => 160,
	) );

	$smtp_settings = array(
		'aquapro_smtp_from_name'  => array( 'label' => 'From Name',              'default' => 'Williams Pool Care' ),
		'aquapro_smtp_from_email' => array( 'label' => 'From Email (Gmail address)', 'default' => '' ),
		'aquapro_smtp_password'   => array( 'label' => 'Gmail App Password',     'default' => '' ),
		'aquapro_smtp_to'         => array( 'label' => 'Send Leads To (email)',  'default' => '' ),
	);

	foreach ( $smtp_settings as $key => $args ) {
		$wp_customize->add_setting( $key, array( 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( $key, array(
			'label'   => __( $args['label'], 'aquapro' ),
			'section' => 'aquapro_smtp',
			'type'    => 'text',
		) );
	}
}
add_action( 'customize_register', 'aquapro_customize_register' );

// ============================================================
// SMTP — configure PHPMailer directly (no plugin needed)
// ============================================================

add_action( 'phpmailer_init', function( $phpmailer ) {
	$from_email = get_theme_mod( 'aquapro_smtp_from_email', '' );
	$password   = get_theme_mod( 'aquapro_smtp_password', '' );

	// Only activate if credentials are set
	if ( ! $from_email || ! $password ) {
		return;
	}

	$from_name = get_theme_mod( 'aquapro_smtp_from_name', get_bloginfo( 'name' ) );

	$phpmailer->isSMTP();
	$phpmailer->Host       = 'smtp.gmail.com';
	$phpmailer->SMTPAuth   = true;
	$phpmailer->Port       = 587;
	$phpmailer->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
	$phpmailer->Username   = $from_email;
	$phpmailer->Password   = $password;
	$phpmailer->From       = $from_email;
	$phpmailer->FromName   = $from_name;
} );

// ============================================================
// SEO & SCHEMA
// ============================================================

function aquapro_head_seo() {
	$phone       = get_theme_mod( 'aquapro_phone', '(916) 532-5561' );
	$email       = get_theme_mod( 'aquapro_email', 'williamspoolcare@gmail.com' );
	$address     = get_theme_mod( 'aquapro_address', '123 Pool Lane, Phoenix, AZ 85001' );
	$city        = get_theme_mod( 'aquapro_city', 'Phoenix' );
	$state       = get_theme_mod( 'aquapro_state', 'Arizona' );
	$zip         = get_theme_mod( 'aquapro_zip', '85001' );
	$founded     = get_theme_mod( 'aquapro_founded', '2009' );
	$service_areas = get_theme_mod( 'aquapro_service_areas', 'Scottsdale, Tempe, Mesa, Chandler' );
	$areas_arr   = array_map( 'trim', explode( ',', $service_areas ) );

	// Open Graph tags
	if ( is_front_page() ) {
		echo '<meta property="og:type" content="website" />' . "\n";
		echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";
		echo '<meta name="geo.region" content="US-' . esc_attr( get_theme_mod( 'aquapro_state_abbr', 'AZ' ) ) . '" />' . "\n";
		echo '<meta name="geo.placename" content="' . esc_attr( $city ) . '" />' . "\n";
	}

	// Local Business Schema (JSON-LD)
	if ( is_front_page() || is_page() ) {
		$schema = array(
			'@context'            => 'https://schema.org',
			'@type'               => array( 'LocalBusiness', 'HomeAndConstructionBusiness' ),
			'@id'                 => get_site_url() . '/#business',
			'name'                => get_bloginfo( 'name' ),
			'description'         => get_bloginfo( 'description' ),
			'url'                 => get_site_url(),
			'telephone'           => $phone,
			'email'               => $email,
			'foundingDate'        => $founded,
			'priceRange'          => '$$',
			'currenciesAccepted'  => 'USD',
			'paymentAccepted'     => 'Cash, Credit Card, Check, Zelle, Venmo',
			'openingHours'        => array( 'Mo-Fr 07:00-18:00', 'Sa 08:00-16:00' ),
			'address'             => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => get_theme_mod( 'aquapro_street', '123 Pool Lane' ),
				'addressLocality' => $city,
				'addressRegion'   => get_theme_mod( 'aquapro_state_abbr', 'AZ' ),
				'postalCode'      => $zip,
				'addressCountry'  => 'US',
			),
			'areaServed'          => array_map( function( $area ) use ( $state ) {
				return array(
					'@type' => 'City',
					'name'  => trim( $area ),
					'containedInPlace' => array(
						'@type' => 'State',
						'name'  => $state,
					),
				);
			}, $areas_arr ),
			'serviceType'         => array(
				'Pool Cleaning', 'Pool Maintenance', 'Pool Chemical Balancing',
				'Pool Equipment Repair', 'Pool Opening', 'Pool Closing',
				'Green Pool Recovery', 'Filter Cleaning', 'Pool Inspection',
			),
			'hasOfferCatalog'     => array(
				'@type' => 'OfferCatalog',
				'name'  => 'Pool Cleaning Services',
				'itemListElement' => array(
					array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Weekly Pool Cleaning' ) ),
					array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Bi-Weekly Pool Cleaning' ) ),
					array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Green Pool Treatment' ) ),
					array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Pool Equipment Repair' ) ),
					array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Filter Cleaning' ) ),
				),
			),
			'sameAs' => array_filter( array(
				get_theme_mod( 'aquapro_facebook', '' ),
				get_theme_mod( 'aquapro_instagram', '' ),
				get_theme_mod( 'aquapro_yelp', '' ),
				get_theme_mod( 'aquapro_google', '' ),
			) ),
			'aggregateRating'     => array(
				'@type'       => 'AggregateRating',
				'ratingValue' => '4.9',
				'reviewCount' => get_theme_mod( 'aquapro_reviews', '500' ),
				'bestRating'  => '5',
				'worstRating' => '1',
			),
			'image'               => array(
				'@type' => 'ImageObject',
				'url'   => get_template_directory_uri() . '/assets/images/og-image.jpg',
			),
		);

		echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ) . '</script>' . "\n";
	}

	// Service Schema for service pages
	if ( is_singular( 'service' ) ) {
		$service_schema = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Service',
			'name'        => get_the_title(),
			'description' => get_the_excerpt(),
			'provider'    => array(
				'@id' => get_site_url() . '/#business',
			),
			'areaServed'  => array(
				'@type' => 'State',
				'name'  => $state,
			),
		);

		echo '<script type="application/ld+json">' . wp_json_encode( $service_schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	}

	// FAQ Schema for FAQ page
	if ( is_page_template( 'template-faq.php' ) ) {
		$faq_schema = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => aquapro_get_faq_schema(),
		);

		echo '<script type="application/ld+json">' . wp_json_encode( $faq_schema, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	}

	// Analytics
	$ga4 = get_theme_mod( 'aquapro_ga4', '' );
	if ( $ga4 ) : ?>
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $ga4 ); ?>"></script>
		<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','<?php echo esc_js( $ga4 ); ?>');</script>
	<?php endif;

	$fbpixel = get_theme_mod( 'aquapro_fbpixel', '' );
	if ( $fbpixel ) : ?>
		<script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init','<?php echo esc_js( $fbpixel ); ?>');fbq('track','PageView');</script>
	<?php endif;
}
add_action( 'wp_head', 'aquapro_head_seo', 1 );

// GTM Body Tag
function aquapro_gtm_body() {
	$gtm = get_theme_mod( 'aquapro_gtm', '' );
	if ( $gtm ) {
		echo '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . esc_attr( $gtm ) . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>' . "\n";
	}
}
add_action( 'wp_body_open', 'aquapro_gtm_body' );

// ============================================================
// HELPER FUNCTIONS
// ============================================================

function aquapro_get_faq_schema() {
	return array(
		array(
			'@type'          => 'Question',
			'name'           => 'How often should I have my pool cleaned?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'Most residential pools benefit from weekly cleaning service, especially during heavy-use months. Weekly service ensures your pool chemistry stays balanced, prevents algae growth, and keeps your equipment running efficiently.',
			),
		),
		array(
			'@type'          => 'Question',
			'name'           => 'What does a professional pool cleaning service include?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'A complete pool cleaning service typically includes skimming the surface, brushing the walls and steps, vacuuming the floor, emptying skimmer and pump baskets, testing and balancing water chemistry, adding necessary chemicals, and inspecting pool equipment.',
			),
		),
		array(
			'@type'          => 'Question',
			'name'           => 'How do I know if my pool chemicals are balanced?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'Properly balanced pool water should have a pH between 7.2–7.8, free chlorine of 1–3 ppm, alkalinity of 80–120 ppm, and calcium hardness of 200–400 ppm. Our technicians test all these levels on every visit.',
			),
		),
		array(
			'@type'          => 'Question',
			'name'           => 'Can you fix my green pool?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'Yes! Green pool treatment (also called pool shock treatment or algae remediation) is one of our specialties. We can typically restore a green pool to crystal clear water within 24–72 hours depending on the severity of the algae bloom.',
			),
		),
		array(
			'@type'          => 'Question',
			'name'           => 'Do I need to be home during the pool service?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'No, you do not need to be home. Our technicians are licensed, insured, and background-checked. As long as we have access to your pool (gate code or unlocked gate), we can complete the service and will leave a digital service report.',
			),
		),
	);
}

// ============================================================
// AJAX - QUOTE FORM
// ============================================================

// Register Quote Request CPT
function aquapro_register_quote_cpt() {
	register_post_type( 'quote_request', array(
		'labels'        => array(
			'name'               => __( 'Quote Requests', 'aquapro' ),
			'singular_name'      => __( 'Quote Request', 'aquapro' ),
			'menu_name'          => __( 'Quote Requests', 'aquapro' ),
			'view_item'          => __( 'View Request', 'aquapro' ),
			'search_items'       => __( 'Search Requests', 'aquapro' ),
			'not_found'          => __( 'No quote requests found.', 'aquapro' ),
		),
		'public'        => false,
		'show_ui'       => true,
		'show_in_menu'  => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-email-alt',
		'supports'      => array( 'title' ),
		'capabilities'  => array(
			'create_posts' => 'do_not_allow',
		),
		'map_meta_cap'  => true,
	) );
}
add_action( 'init', 'aquapro_register_quote_cpt' );

// Admin columns for Quote Requests
function aquapro_quote_columns( $cols ) {
	return array(
		'cb'       => $cols['cb'],
		'title'    => __( 'Name', 'aquapro' ),
		'phone'    => __( 'Phone', 'aquapro' ),
		'email'    => __( 'Email', 'aquapro' ),
		'service'  => __( 'Service', 'aquapro' ),
		'address'  => __( 'Address', 'aquapro' ),
		'status'   => __( 'Status', 'aquapro' ),
		'date'     => __( 'Date', 'aquapro' ),
	);
}
add_filter( 'manage_quote_request_posts_columns', 'aquapro_quote_columns' );

function aquapro_quote_column_data( $col, $post_id ) {
	switch ( $col ) {
		case 'phone':
			$v = get_post_meta( $post_id, '_qr_phone', true );
			echo $v ? '<a href="tel:' . esc_attr( preg_replace( '/\D/', '', $v ) ) . '">' . esc_html( $v ) . '</a>' : '—';
			break;
		case 'email':
			$v = get_post_meta( $post_id, '_qr_email', true );
			echo $v ? '<a href="mailto:' . esc_attr( $v ) . '">' . esc_html( $v ) . '</a>' : '—';
			break;
		case 'service':
			echo esc_html( get_post_meta( $post_id, '_qr_service', true ) ?: '—' );
			break;
		case 'address':
			echo esc_html( get_post_meta( $post_id, '_qr_address', true ) ?: '—' );
			break;
		case 'status':
			$status = get_post_meta( $post_id, '_qr_status', true ) ?: 'new';
			$colors = array( 'new' => '#2563eb', 'contacted' => '#d97706', 'closed' => '#16a34a' );
			$color  = $colors[ $status ] ?? '#6b7280';
			printf( '<span style="background:%s;color:#fff;padding:3px 10px;border-radius:12px;font-size:0.8rem;font-weight:600;">%s</span>', esc_attr( $color ), esc_html( ucfirst( $status ) ) );
			break;
	}
}
add_action( 'manage_quote_request_posts_custom_column', 'aquapro_quote_column_data', 10, 2 );

// Meta box to display full submission + status control
function aquapro_quote_meta_box() {
	add_meta_box( 'qr_details', __( 'Submission Details', 'aquapro' ), 'aquapro_quote_meta_box_cb', 'quote_request', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'aquapro_quote_meta_box' );

function aquapro_quote_meta_box_cb( $post ) {
	$fields = array(
		'_qr_name'     => 'Name',
		'_qr_phone'    => 'Phone',
		'_qr_email'    => 'Email',
		'_qr_service'  => 'Service',
		'_qr_pool_size'=> 'Pool Size',
		'_qr_address'  => 'Address',
		'_qr_message'  => 'Message',
	);
	echo '<table style="width:100%;border-collapse:collapse;">';
	foreach ( $fields as $key => $label ) {
		$val = get_post_meta( $post->ID, $key, true );
		echo '<tr><th style="text-align:left;padding:8px 12px;background:#f9fafb;border:1px solid #e5e7eb;width:130px;">' . esc_html( $label ) . '</th>';
		echo '<td style="padding:8px 12px;border:1px solid #e5e7eb;">' . nl2br( esc_html( $val ?: '—' ) ) . '</td></tr>';
	}
	echo '</table>';
	$status = get_post_meta( $post->ID, '_qr_status', true ) ?: 'new';
	wp_nonce_field( 'aquapro_qr_status', 'aquapro_qr_status_nonce' );
	echo '<p style="margin-top:16px;"><label style="font-weight:600;">' . esc_html__( 'Status:', 'aquapro' ) . ' </label>';
	echo '<select name="qr_status" style="margin-left:8px;">';
	foreach ( array( 'new' => 'New', 'contacted' => 'Contacted', 'closed' => 'Closed / Won' ) as $val => $label ) {
		printf( '<option value="%s"%s>%s</option>', esc_attr( $val ), selected( $status, $val, false ), esc_html( $label ) );
	}
	echo '</select></p>';
}

function aquapro_save_quote_status( $post_id ) {
	if ( ! isset( $_POST['aquapro_qr_status_nonce'] ) || ! wp_verify_nonce( $_POST['aquapro_qr_status_nonce'], 'aquapro_qr_status' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( isset( $_POST['qr_status'] ) ) {
		update_post_meta( $post_id, '_qr_status', sanitize_text_field( $_POST['qr_status'] ) );
	}
}
add_action( 'save_post_quote_request', 'aquapro_save_quote_status' );

function aquapro_handle_quote_form() {
	if ( ! check_ajax_referer( 'aquapro_nonce', 'nonce', false ) ) {
		wp_send_json_error( array( 'message' => __( 'Security check failed.', 'aquapro' ) ) );
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$service = sanitize_text_field( wp_unslash( $_POST['service'] ?? '' ) );
	$size    = sanitize_text_field( wp_unslash( $_POST['pool_size'] ?? '' ) );
	$address = sanitize_text_field( wp_unslash( $_POST['address'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

	if ( ! $name || ! $phone || ! $email ) {
		wp_send_json_error( array( 'message' => __( 'Please fill in all required fields.', 'aquapro' ) ) );
	}

	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => __( 'Please enter a valid email address.', 'aquapro' ) ) );
	}

	// Save submission to database — always works, regardless of email
	$post_id = wp_insert_post( array(
		'post_type'   => 'quote_request',
		'post_title'  => $name . ' — ' . current_time( 'M j, Y g:i a' ),
		'post_status' => 'publish',
	) );

	if ( $post_id && ! is_wp_error( $post_id ) ) {
		update_post_meta( $post_id, '_qr_name',      $name );
		update_post_meta( $post_id, '_qr_phone',     $phone );
		update_post_meta( $post_id, '_qr_email',     $email );
		update_post_meta( $post_id, '_qr_service',   $service );
		update_post_meta( $post_id, '_qr_pool_size', $size );
		update_post_meta( $post_id, '_qr_address',   $address );
		update_post_meta( $post_id, '_qr_message',   $message );
		update_post_meta( $post_id, '_qr_status',    'new' );
	}

	// Email notification — sends to the configured lead address, falls back to admin_email
	$smtp_to     = get_theme_mod( 'aquapro_smtp_to', '' );
	$admin_email = $smtp_to ?: get_option( 'admin_email' );
	$site_name   = get_bloginfo( 'name' );

	$subject = sprintf( '[%s] New Quote Request from %s', $site_name, $name );
	$body    = sprintf(
		"New quote request received:\n\nName: %s\nPhone: %s\nEmail: %s\nService: %s\nPool Size: %s\nAddress: %s\nMessage: %s\n\nView in WP admin: %s\nSent: %s",
		$name, $phone, $email, $service, $size, $address, $message,
		admin_url( 'edit.php?post_type=quote_request' ),
		current_time( 'mysql' )
	);

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	wp_mail( $admin_email, $subject, $body, $headers );

	// Auto-responder to customer
	$customer_subject = sprintf( 'Thanks for contacting %s!', $site_name );
	$customer_body    = sprintf(
		"Hi %s,\n\nThank you for reaching out! We received your quote request and will contact you within 2 business hours.\n\nYour request:\n- Service: %s\n- Pool Size: %s\n\nQuestions? Call us: %s\n\n– The %s Team",
		$name, $service, $size, get_theme_mod( 'aquapro_phone', '(916) 532-5561' ), $site_name
	);

	wp_mail( $email, $customer_subject, $customer_body, array( 'Content-Type: text/plain; charset=UTF-8' ) );

	wp_send_json_success( array( 'message' => __( "Thanks! We'll be in touch within 2 hours.", 'aquapro' ) ) );
}
add_action( 'wp_ajax_aquapro_quote', 'aquapro_handle_quote_form' );
add_action( 'wp_ajax_nopriv_aquapro_quote', 'aquapro_handle_quote_form' );

// ============================================================
// XML SITEMAP — served at /sitemap.xml via rewrite rule
// ============================================================

add_action( 'init', function() {
	add_rewrite_rule( 'sitemap\.xml$', 'index.php?aquapro_sitemap=1', 'top' );
	add_rewrite_tag( '%aquapro_sitemap%', '([^&]+)' );
} );

add_action( 'template_redirect', function() {
	if ( get_query_var( 'aquapro_sitemap' ) ) {
		require get_template_directory() . '/inc/sitemap-xml.php';
		exit;
	}
} );

// ============================================================
// MISC HELPERS
// ============================================================

// Get star rating HTML
function aquapro_stars( $rating = 5 ) {
	$html = '';
	for ( $i = 1; $i <= 5; $i++ ) {
		if ( $i <= $rating ) {
			$html .= '<i class="fas fa-star"></i>';
		} elseif ( $i - 0.5 <= $rating ) {
			$html .= '<i class="fas fa-star-half-alt"></i>';
		} else {
			$html .= '<i class="far fa-star"></i>';
		}
	}
	return $html;
}

// Trim excerpt
function aquapro_excerpt( $length = 25 ) {
	return wp_trim_words( get_the_excerpt(), $length, '...' );
}

// Breadcrumbs
function aquapro_breadcrumbs() {
	echo '<nav class="page-hero-breadcrumb" aria-label="Breadcrumb">';
	echo '<a href="' . esc_url( home_url() ) . '">' . __( 'Home', 'aquapro' ) . '</a>';
	echo '<span> › </span>';

	if ( is_singular( 'service' ) ) {
		echo '<a href="' . esc_url( get_post_type_archive_link( 'service' ) ) . '">' . __( 'Services', 'aquapro' ) . '</a>';
		echo '<span> › </span>';
		the_title();
	} elseif ( is_singular( 'post' ) ) {
		echo '<a href="' . esc_url( get_permalink( get_option( 'page_for_posts' ) ) ) . '">' . __( 'Blog', 'aquapro' ) . '</a>';
		echo '<span> › </span>';
		the_title();
	} elseif ( is_category() ) {
		echo single_cat_title( '', false );
	} elseif ( is_page() ) {
		the_title();
	} else {
		echo get_the_title();
	}

	echo '</nav>';
}

// Scroll progress indicator
function aquapro_body_classes( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'is-front-page';
	}
	if ( is_singular( 'service' ) ) {
		$classes[] = 'is-service-page';
	}
	return $classes;
}
add_filter( 'body_class', 'aquapro_body_classes' );

// Remove emoji scripts
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove jQuery Migrate in production
function aquapro_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}
add_filter( 'wp_default_scripts', 'aquapro_remove_jquery_migrate' );

// Add preconnect for Google Fonts
function aquapro_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array( 'href' => 'https://fonts.googleapis.com' );
		$urls[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' => true );
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'aquapro_resource_hints', 10, 2 );

// Custom excerpt length
add_filter( 'excerpt_length', fn() => 30 );
add_filter( 'excerpt_more', fn() => '...' );

// Add rel=noopener to links
add_filter( 'the_content', function( $content ) {
	return str_replace( 'target="_blank"', 'target="_blank" rel="noopener noreferrer"', $content );
} );

// ============================================================
// NAVIGATION
// ============================================================

function aquapro_fallback_menu() {
	$pages = array(
		'Home'          => home_url( '/' ),
		'Services'      => home_url( '/services/' ),
		'About'         => home_url( '/about/' ),
		'Service Areas' => home_url( '/service-areas/' ),
		'Blog'          => home_url( '/blog/' ),
		'Contact'       => home_url( '/contact/' ),
	);

	echo '<ul>';
	foreach ( $pages as $label => $url ) {
		echo '<li><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul>';
}

if ( ! class_exists( 'Aquapro_Nav_Walker' ) ) :
class Aquapro_Nav_Walker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '<ul class="dropdown-menu">';
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '</ul>';
	}

	public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
		$item    = $data_object;
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$has_children = in_array( 'menu-item-has-children', $classes );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		if ( $has_children ) {
			$class_names .= ' has-dropdown';
		}

		$output .= '<li class="' . esc_attr( $class_names ) . '">';

		$atts = array(
			'href'   => $item->url,
			'title'  => $item->title,
			'target' => $item->target,
			'rel'    => $item->xfn,
		);

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$attributes .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
			}
		}

		$output .= '<a' . $attributes . '>';
		$output .= apply_filters( 'the_title', $item->title, $item->ID );
		if ( $has_children && $depth === 0 ) {
			$output .= ' <i class="fas fa-chevron-down" style="font-size:0.6rem;margin-left:4px;" aria-hidden="true"></i>';
		}
		$output .= '</a>';
	}

	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
		$output .= '</li>';
	}
}
endif;

// Inject Blog into the primary nav if it isn't already there
add_filter( 'wp_nav_menu_items', function( $items, $args ) {
	if ( ! isset( $args->theme_location ) || $args->theme_location !== 'primary' ) {
		return $items;
	}
	$blog_url = esc_url( home_url( '/blog/' ) );
	if ( strpos( $items, $blog_url ) !== false ) {
		return $items; // already in menu
	}
	$blog_item = '<li class="menu-item"><a href="' . $blog_url . '">' . esc_html__( 'Blog', 'aquapro' ) . '</a></li>';
	// Insert before the last <li> (second-to-last position, before Contact)
	$pos = strrpos( $items, '<li' );
	if ( $pos !== false ) {
		$items = substr( $items, 0, $pos ) . $blog_item . substr( $items, $pos );
	} else {
		$items .= $blog_item;
	}
	return $items;
}, 10, 2 );
