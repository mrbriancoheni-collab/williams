<?php
/**
 * Search Form Template
 *
 * @package AquaPro
 */
?>
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" aria-label="<?php esc_attr_e( 'Site search', 'aquapro' ); ?>">
	<div style="display:flex;max-width:480px;margin:0 auto;">
		<label for="search-input" class="sr-only"><?php _e( 'Search for:', 'aquapro' ); ?></label>
		<input
			id="search-input"
			type="search"
			name="s"
			class="form-control"
			placeholder="<?php esc_attr_e( 'Search pool tips...', 'aquapro' ); ?>"
			value="<?php echo esc_attr( get_search_query() ); ?>"
			style="border-radius:var(--radius-full) 0 0 var(--radius-full);border-right:0;"
		>
		<button type="submit" class="btn btn-primary" style="border-radius:0 var(--radius-full) var(--radius-full) 0;padding:14px 24px;" aria-label="<?php esc_attr_e( 'Submit search', 'aquapro' ); ?>">
			<i class="fas fa-search" aria-hidden="true"></i>
		</button>
	</div>
</form>
