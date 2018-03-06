jQuery( document ).ready( function() {
  jQuery( '#button__modal_section_main, #button__modal_section_service, #button__modal_section_corporate' ).click( function() {
    jQuery( '#modal' ).fadeIn( 600 );
  });
  jQuery( '#modal__shut' ).click( function() {
    jQuery( '.wpcf7-display-none' ).fadeOut( 600 );
    jQuery( '.wpcf7-not-valid-tip' ).fadeOut( 600 );
    jQuery( '#modal' ).fadeOut( 600 );
  });
});
