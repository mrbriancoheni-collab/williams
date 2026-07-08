<?php
/**
 * Landing Page Trust Bar
 * Shared component used by all Google Ads landing page templates.
 *
 * @package AquaPro
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$_lp_reviews = get_theme_mod( 'aquapro_reviews_count', '500+' );
?>
<div class="lp-trust-bar">
	<div class="container">
		<div class="lp-trust-bar__inner">

			<div class="lp-trust-badge lp-trust-badge--google">
				<div class="lp-trust-badge__stars" aria-label="5 stars">
					<?php for ( $i = 0; $i < 5; $i++ ) : ?>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="#F59E0B" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
					<?php endfor; ?>
				</div>
				<span class="lp-trust-badge__text">
					<strong><?php echo esc_html( $_lp_reviews ); ?> Google Reviews</strong>
				</span>
				<svg class="lp-trust-badge__logo" viewBox="0 0 24 24" width="20" height="20" aria-label="Google" role="img"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
			</div>

			<div class="lp-trust-badge">
				<i class="fas fa-certificate" aria-hidden="true"></i>
				<span><strong>CPO Certified</strong> Technicians</span>
			</div>

			<div class="lp-trust-badge">
				<i class="fas fa-shield-alt" aria-hidden="true"></i>
				<span><strong>Licensed &amp; Insured</strong> in California</span>
			</div>

			<div class="lp-trust-badge">
				<i class="fas fa-home" aria-hidden="true"></i>
				<span><strong>Locally Owned</strong> — 20+ Years</span>
			</div>

			<div class="lp-trust-badge">
				<i class="fas fa-medal" aria-hidden="true"></i>
				<span><strong>Nextdoor</strong> Neighborhood Fav</span>
			</div>

		</div>
	</div>
</div>

<style>
.lp-trust-bar {
	background: var(--color-white);
	border-bottom: 1px solid var(--color-gray-100);
	padding: 14px 0;
}
.lp-trust-bar__inner {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
	gap: 8px 28px;
}
.lp-trust-badge {
	display: flex;
	align-items: center;
	gap: 7px;
	font-size: 0.82rem;
	color: var(--color-gray-700);
	white-space: nowrap;
}
.lp-trust-badge i { color: var(--color-primary); font-size: 0.95rem; }
.lp-trust-badge--google { gap: 6px; }
.lp-trust-badge__stars { display: flex; gap: 1px; }
.lp-trust-badge__logo { flex-shrink: 0; }
@media (max-width: 600px) {
	.lp-trust-bar__inner { gap: 8px 18px; }
	.lp-trust-badge { font-size: 0.78rem; }
}
</style>
