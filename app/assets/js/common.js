new WOW().init();
jQuery( document ).ready( function() {
  if ( window.matchMedia( '(min-width: 991px)' ).matches ) {
    jQuery( '#navigation__list' ).removeClass( 'navigation__hidden' );
  }
  jQuery( '#hamburger, .navigation__hidden li a' ).click( function() {
    jQuery( '#navigation' ).fadeToggle(600);
  });  
});

jQuery( document ).ready( function() {
  jQuery( "a[rel='m_PageScroll2id']" ).mPageScroll2id({
      offset: 120
  });
});

jQuery( document ).ready( function() {
  jQuery( '.parallax-window' ).parallax({ imageSrc: ['assets/images/main/main.jpg',
  'assets/images/fact/fact.jpg']});
});
