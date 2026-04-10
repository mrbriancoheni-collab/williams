<?php
/**
 * Location & Service Data
 * Single source of truth for all localized pages.
 *
 * @package AquaPro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function aquapro_get_locations() {
	return array(
		'sacramento' => array(
			'name'           => 'Sacramento',
			'county'         => 'Sacramento County',
			'zip'            => '95814',
			'neighborhoods'  => 'East Sacramento, Land Park, Curtis Park, Midtown, Arden-Arcade',
			'desc'           => 'Pool cleaning throughout Sacramento, including East Sacramento, Land Park, Curtis Park, and surrounding neighborhoods.',
		),
		'roseville' => array(
			'name'           => 'Roseville',
			'county'         => 'Placer County',
			'zip'            => '95661',
			'neighborhoods'  => 'West Roseville, Junction, Fiddyment Farm, Woodcreek Oaks',
			'desc'           => 'Proud to serve Roseville homeowners, including newer developments in West Roseville and Junction.',
		),
		'rocklin' => array(
			'name'           => 'Rocklin',
			'county'         => 'Placer County',
			'zip'            => '95765',
			'neighborhoods'  => 'Stanford Ranch, Whitney Oaks, Sunset Whitney, Clover Valley',
			'desc'           => 'Pool cleaning and maintenance for Rocklin communities including Stanford Ranch and Whitney Oaks.',
		),
		'folsom' => array(
			'name'           => 'Folsom',
			'county'         => 'Sacramento County',
			'zip'            => '95630',
			'neighborhoods'  => 'Empire Ranch, Willow Creek, Iron Point, Briggs Ranch',
			'desc'           => 'Professional pool care throughout Folsom, including Empire Ranch, Willow Creek, and surrounding communities.',
		),
		'orangevale' => array(
			'name'           => 'Orangevale',
			'county'         => 'Sacramento County',
			'zip'            => '95662',
			'neighborhoods'  => 'Orangevale Community, Old Orangevale, neighboring Fair Oaks',
			'desc'           => 'Pool cleaning and maintenance for Orangevale residents. Same-day service often available.',
		),
		'granite-bay' => array(
			'name'           => 'Granite Bay',
			'county'         => 'Placer County',
			'zip'            => '95746',
			'neighborhoods'  => 'Treelake, Douglas Ranch, Barrington, Granite Bay Golf Club area',
			'desc'           => 'Serving Granite Bay\'s upscale communities with premium pool care service.',
		),
		'carmichael' => array(
			'name'           => 'Carmichael',
			'county'         => 'Sacramento County',
			'zip'            => '95608',
			'neighborhoods'  => 'Carmichael Colony, Mission Oaks, San Juan, La Sierra',
			'desc'           => 'Serving Carmichael with expert pool cleaning, chemical balancing, and equipment maintenance.',
		),
		'fair-oaks' => array(
			'name'           => 'Fair Oaks',
			'county'         => 'Sacramento County',
			'zip'            => '95628',
			'neighborhoods'  => 'Fair Oaks Village, Sunrise, California Ave, Greenback area',
			'desc'           => 'Our home base. We know Fair Oaks pools inside and out — from older neighborhoods near the river to newer subdivisions.',
		),
		'rancho-cordova' => array(
			'name'           => 'Rancho Cordova',
			'county'         => 'Sacramento County',
			'zip'            => '95670',
			'neighborhoods'  => 'Anatolia, Sunridge, Stonecreek, Riviera East',
			'desc'           => 'Pool cleaning and repair services for Rancho Cordova homeowners and HOAs.',
		),
		'citrus-heights' => array(
			'name'           => 'Citrus Heights',
			'county'         => 'Sacramento County',
			'zip'            => '95610',
			'neighborhoods'  => 'Sunrise Douglas, Antelope Heights, Twin Oaks, Sylvan',
			'desc'           => 'Serving Citrus Heights homeowners with weekly, bi-weekly, and one-time pool cleaning services.',
		),
	);
}

function aquapro_get_services() {
	return array(
		'pool-cleaning' => array(
			'name'        => 'Pool Cleaning',
			'title'       => 'Weekly Pool Cleaning Service',
			'icon'        => '🧹',
			'fa'          => 'fa-broom',
			'short'       => 'Regular cleaning, skimming, vacuuming, and chemical balancing to keep your pool crystal clear all season.',
			'description' => 'Our weekly pool cleaning service covers everything your pool needs to stay healthy and inviting. Each visit includes skimming the surface, brushing walls and steps, vacuuming the floor, emptying baskets, testing and balancing water chemistry, and a full equipment check.',
			'features'    => array(
				'Surface skimming & debris removal',
				'Brush walls, steps & waterline',
				'Vacuum pool floor',
				'Empty pump & skimmer baskets',
				'Test & balance water chemistry',
				'Equipment inspection each visit',
			),
		),
		'pool-equipment-repair' => array(
			'name'        => 'Equipment Repair',
			'title'       => 'Pool Equipment Repair & Service',
			'icon'        => '🔧',
			'fa'          => 'fa-tools',
			'short'       => 'Expert repair of pumps, filters, heaters, and all pool equipment brands — diagnosed and fixed fast.',
			'description' => 'When your pool equipment breaks down, we diagnose and fix it fast. We service and repair all major brands including Pentair, Hayward, Jandy, and Zodiac. From pump motor replacements to filter servicing to heater troubleshooting, we have you covered.',
			'features'    => array(
				'Pump & motor repair/replacement',
				'Filter cleaning & repair',
				'Heater diagnosis & repair',
				'Salt cell inspection & cleaning',
				'Automation system service',
				'All major brands serviced',
			),
		),
		'water-chemistry' => array(
			'name'        => 'Water Chemistry',
			'title'       => 'Water Chemistry & Chemical Balancing',
			'icon'        => '🧪',
			'fa'          => 'fa-flask',
			'short'       => 'Precise water chemistry testing and balancing to protect your pool, equipment, and swimmers.',
			'description' => 'Proper water chemistry is essential for a safe, clear pool and long equipment life. We test all critical parameters — pH, chlorine, alkalinity, calcium hardness, cyanuric acid, and salt levels — then make precise adjustments to keep your water balanced year-round.',
			'features'    => array(
				'Full 7-point water analysis',
				'pH & total alkalinity adjustment',
				'Chlorine & sanitizer balancing',
				'Calcium hardness correction',
				'Cyanuric acid stabilization',
				'Salt level optimization',
			),
		),
		'acid-wash' => array(
			'name'        => 'Acid Wash',
			'title'       => 'Pool Acid Wash & Deep Cleaning',
			'icon'        => '✨',
			'fa'          => 'fa-star',
			'short'       => 'Remove stains, scale, and algae buildup with a professional acid wash that restores your pool\'s surface.',
			'description' => 'An acid wash strips away years of staining, scale, and algae from your pool\'s plaster, pebble, or marcite surface. If your pool looks permanently discolored or has heavy calcium scale, an acid wash can restore it to near-original condition without full replastering.',
			'features'    => array(
				'Drain & prep pool completely',
				'Full acid wash treatment',
				'Stain & calcium scale removal',
				'Algae elimination at the surface',
				'Refill & chemical startup included',
				'Post-treatment equipment check',
			),
		),
		'equipment-installation' => array(
			'name'        => 'Equipment Installation',
			'title'       => 'Pool Equipment Installation',
			'icon'        => '⚙️',
			'fa'          => 'fa-cog',
			'short'       => 'Professional installation of pumps, filters, heaters, variable-speed motors, and automation systems.',
			'description' => 'Upgrading or replacing pool equipment? We install all types of pool equipment with clean, code-compliant workmanship. From energy-efficient variable-speed pumps to new filter systems to smart pool automation, we handle the full installation from start to finish.',
			'features'    => array(
				'Variable-speed pump upgrades',
				'Filter system installation',
				'Heater installation',
				'Salt chlorinator setup',
				'Pool automation systems',
				'Energy-efficient upgrades',
			),
		),
		'green-pool-recovery' => array(
			'name'        => 'Green Pool Recovery',
			'title'       => 'Green Pool Recovery & Algae Removal',
			'icon'        => '💚',
			'fa'          => 'fa-leaf',
			'short'       => 'Turn a green, swampy pool crystal clear with our proven multi-step algae elimination process.',
			'description' => 'A green pool is a health hazard and an eyesore. Our green pool recovery service uses a proven multi-step process: shock treatment, algaecide application, brush-out, filter cleaning, and follow-up visits until your pool is completely clear. Most pools are swim-ready in 3–7 days.',
			'features'    => array(
				'Heavy shock & algaecide treatment',
				'Full brush-out & vacuum',
				'Filter deep-clean or backwash',
				'Follow-up visits included',
				'Full water chemistry correction',
				'Most pools clear in 3–7 days',
			),
		),
	);
}

/** URL for a city landing page. */
function aquapro_location_url( $city_slug ) {
	return home_url( '/pool-service-' . $city_slug . '/' );
}

/** URL for a service-in-city child page. */
function aquapro_location_service_url( $city_slug, $service_slug ) {
	return home_url( '/pool-service-' . $city_slug . '/' . $service_slug . '/' );
}
