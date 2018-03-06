new WOW().init();
jQuery( document ).ready( function() {
	jQuery( '#hamburger' ).click( function () {
		jQuery( '.hamburger__item' ).toggleClass( 'hamburger__item_open' );
	});
});

jQuery( document ).ready( function() {
  if ( window.matchMedia( '(min-width: 991px)' ).matches ) {
    jQuery( '#navigation__list' ).removeClass( 'navigation__hidden' );
  }
  jQuery( '#hamburger, .navigation__hidden li a' ).click( function() {
    jQuery( '#navigation' ).fadeToggle(600);
  });  
});

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

jQuery( document ).ready( function() {
  jQuery( '.parallax-window' ).parallax({ imageSrc: ['assets/images/main/main.jpg',
  'assets/images/fact/fact.jpg']});
});

jQuery( document ).ready( function() {
  jQuery( "a[rel='m_PageScroll2id']" ).mPageScroll2id({
      offset: 120
  });
});
