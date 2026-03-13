/**
 * AquaPro Customizer live preview
 */
( function ( $ ) {
	wp.customize( 'blogname', function ( value ) {
		value.bind( function ( to ) {
			$( '.logo-name' ).text( to );
			document.title = to;
		} );
	} );

	wp.customize( 'aquapro_phone', function ( value ) {
		value.bind( function ( to ) {
			$( '.header-phone-number, .cta-phone-number' ).text( to );
		} );
	} );

	wp.customize( 'aquapro_notif_text', function ( value ) {
		value.bind( function ( to ) {
			$( '#notificationBar p' ).html( to );
		} );
	} );
} )( jQuery );
