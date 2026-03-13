<?php
/**
 * Meta Boxes for Custom Post Types
 *
 * @package AquaPro
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ============================================================
// SERVICE META BOXES
// ============================================================

function aquapro_register_meta_boxes() {
	add_meta_box(
		'service_details',
		__( 'Service Details', 'aquapro' ),
		'aquapro_service_details_cb',
		'service',
		'normal',
		'high'
	);

	add_meta_box(
		'testimonial_details',
		__( 'Testimonial Details', 'aquapro' ),
		'aquapro_testimonial_details_cb',
		'testimonial',
		'normal',
		'high'
	);

	add_meta_box(
		'team_details',
		__( 'Team Member Details', 'aquapro' ),
		'aquapro_team_details_cb',
		'team_member',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'aquapro_register_meta_boxes' );

// Service Details Callback
function aquapro_service_details_cb( $post ) {
	wp_nonce_field( 'aquapro_meta_nonce', 'aquapro_meta_nonce_field' );

	$icon     = get_post_meta( $post->ID, '_service_icon', true );
	$features = get_post_meta( $post->ID, '_service_features', true );
	$price    = get_post_meta( $post->ID, '_service_price', true );
	$duration = get_post_meta( $post->ID, '_service_duration', true );

	if ( is_array( $features ) ) {
		$features = implode( "\n", $features );
	}
	?>
	<table class="form-table">
		<tr>
			<th><label for="service_icon"><?php _e( 'Service Icon (emoji)', 'aquapro' ); ?></label></th>
			<td>
				<input type="text" id="service_icon" name="service_icon"
					value="<?php echo esc_attr( $icon ); ?>"
					style="width:80px;font-size:1.5rem;" placeholder="🏊">
				<p class="description"><?php _e( 'Use an emoji as the service icon.', 'aquapro' ); ?></p>
			</td>
		</tr>
		<tr>
			<th><label for="service_price"><?php _e( 'Starting Price', 'aquapro' ); ?></label></th>
			<td>
				<input type="text" id="service_price" name="service_price"
					value="<?php echo esc_attr( $price ); ?>"
					style="width:200px;" placeholder="e.g. $89/mo">
				<p class="description"><?php _e( 'Display a starting price (optional).', 'aquapro' ); ?></p>
			</td>
		</tr>
		<tr>
			<th><label for="service_duration"><?php _e( 'Service Duration', 'aquapro' ); ?></label></th>
			<td>
				<input type="text" id="service_duration" name="service_duration"
					value="<?php echo esc_attr( $duration ); ?>"
					style="width:200px;" placeholder="e.g. 45–60 minutes">
			</td>
		</tr>
		<tr>
			<th><label for="service_features"><?php _e( 'Service Features', 'aquapro' ); ?></label></th>
			<td>
				<textarea id="service_features" name="service_features" rows="8" style="width:100%;"
					placeholder="<?php esc_attr_e( "One feature per line, e.g.:\nSurface skimming\nWall brushing\nChemical testing", 'aquapro' ); ?>"><?php echo esc_textarea( $features ); ?></textarea>
				<p class="description"><?php _e( 'Enter one feature per line. These will display as checkmarks on the service card.', 'aquapro' ); ?></p>
			</td>
		</tr>
	</table>
	<?php
}

// Testimonial Details Callback
function aquapro_testimonial_details_cb( $post ) {
	wp_nonce_field( 'aquapro_meta_nonce', 'aquapro_meta_nonce_field' );

	$reviewer = get_post_meta( $post->ID, '_reviewer_name', true );
	$location = get_post_meta( $post->ID, '_reviewer_location', true );
	$service  = get_post_meta( $post->ID, '_service_type', true );
	$rating   = get_post_meta( $post->ID, '_rating', true ) ?: 5;
	?>
	<table class="form-table">
		<tr>
			<th><label for="reviewer_name"><?php _e( 'Reviewer Name', 'aquapro' ); ?></label></th>
			<td><input type="text" id="reviewer_name" name="reviewer_name" value="<?php echo esc_attr( $reviewer ); ?>" style="width:300px;" placeholder="Jane D."></td>
		</tr>
		<tr>
			<th><label for="reviewer_location"><?php _e( 'Location', 'aquapro' ); ?></label></th>
			<td><input type="text" id="reviewer_location" name="reviewer_location" value="<?php echo esc_attr( $location ); ?>" style="width:300px;" placeholder="Fair Oaks, CA"></td>
		</tr>
		<tr>
			<th><label for="service_type"><?php _e( 'Service Type', 'aquapro' ); ?></label></th>
			<td>
				<select id="service_type" name="service_type">
					<option value=""><?php _e( '-- Select --', 'aquapro' ); ?></option>
					<?php
					$service_types = array( 'Weekly Cleaning', 'Bi-Weekly Cleaning', 'Chemical Balancing', 'Green Pool Treatment', 'Equipment Repair', 'New Pool Start-Up', 'Filter Cleaning' );
					foreach ( $service_types as $st ) {
						printf( '<option value="%1$s" %2$s>%1$s</option>', esc_attr( $st ), selected( $service, $st, false ) );
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<th><label for="rating"><?php _e( 'Star Rating', 'aquapro' ); ?></label></th>
			<td>
				<select id="rating" name="rating">
					<?php for ( $i = 5; $i >= 1; $i-- ) : ?>
					<option value="<?php echo $i; ?>" <?php selected( $rating, $i ); ?>>
						<?php echo $i; ?> <?php echo str_repeat( '★', $i ); ?>
					</option>
					<?php endfor; ?>
				</select>
			</td>
		</tr>
	</table>
	<p class="description" style="margin-top:12px;">
		<?php _e( 'Use the content editor above to enter the actual review text.', 'aquapro' ); ?>
	</p>
	<?php
}

// Team Member Callback
function aquapro_team_details_cb( $post ) {
	wp_nonce_field( 'aquapro_meta_nonce', 'aquapro_meta_nonce_field' );

	$role         = get_post_meta( $post->ID, '_team_role', true );
	$certifications = get_post_meta( $post->ID, '_team_certs', true );
	$years        = get_post_meta( $post->ID, '_team_years', true );
	?>
	<table class="form-table">
		<tr>
			<th><label for="team_role"><?php _e( 'Job Title / Role', 'aquapro' ); ?></label></th>
			<td><input type="text" id="team_role" name="team_role" value="<?php echo esc_attr( $role ); ?>" style="width:300px;" placeholder="Senior Pool Technician"></td>
		</tr>
		<tr>
			<th><label for="team_certs"><?php _e( 'Certifications', 'aquapro' ); ?></label></th>
			<td><input type="text" id="team_certs" name="team_certs" value="<?php echo esc_attr( $certifications ); ?>" style="width:400px;" placeholder="CPO Certified, AFO Certified"></td>
		</tr>
		<tr>
			<th><label for="team_years"><?php _e( 'Years of Experience', 'aquapro' ); ?></label></th>
			<td><input type="number" id="team_years" name="team_years" value="<?php echo esc_attr( $years ); ?>" min="0" style="width:100px;"></td>
		</tr>
	</table>
	<?php
}

// ============================================================
// SAVE META
// ============================================================

function aquapro_save_meta( $post_id ) {
	if ( ! isset( $_POST['aquapro_meta_nonce_field'] ) ) return;
	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['aquapro_meta_nonce_field'] ) ), 'aquapro_meta_nonce' ) ) return;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	$post_type = get_post_type( $post_id );

	if ( 'service' === $post_type ) {
		if ( isset( $_POST['service_icon'] ) ) {
			update_post_meta( $post_id, '_service_icon', sanitize_text_field( wp_unslash( $_POST['service_icon'] ) ) );
		}
		if ( isset( $_POST['service_price'] ) ) {
			update_post_meta( $post_id, '_service_price', sanitize_text_field( wp_unslash( $_POST['service_price'] ) ) );
		}
		if ( isset( $_POST['service_duration'] ) ) {
			update_post_meta( $post_id, '_service_duration', sanitize_text_field( wp_unslash( $_POST['service_duration'] ) ) );
		}
		if ( isset( $_POST['service_features'] ) ) {
			$raw_features = sanitize_textarea_field( wp_unslash( $_POST['service_features'] ) );
			$features_arr = array_filter( array_map( 'trim', explode( "\n", $raw_features ) ) );
			update_post_meta( $post_id, '_service_features', $features_arr );
		}
	}

	if ( 'testimonial' === $post_type ) {
		$fields = array( 'reviewer_name', 'reviewer_location', 'service_type' );
		foreach ( $fields as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_post_meta( $post_id, '_' . $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
			}
		}
		if ( isset( $_POST['rating'] ) ) {
			update_post_meta( $post_id, '_rating', intval( $_POST['rating'] ) );
		}
	}

	if ( 'team_member' === $post_type ) {
		$fields = array( 'team_role', 'team_certs' );
		foreach ( $fields as $field ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_post_meta( $post_id, '_' . $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
			}
		}
		if ( isset( $_POST['team_years'] ) ) {
			update_post_meta( $post_id, '_team_years', intval( $_POST['team_years'] ) );
		}
	}
}
add_action( 'save_post', 'aquapro_save_meta' );
