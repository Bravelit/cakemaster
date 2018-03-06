jQuery( document ).ready( function() {
  if ( window.matchMedia( '(min-width: 991px)' ).matches ) {
    jQuery( '#navigation__list' ).removeClass( 'navigation__hidden' );
  }
  jQuery( '#hamburger, .navigation__hidden li a' ).click( function() {
    jQuery( '#navigation' ).fadeToggle(600);
  });  
});
