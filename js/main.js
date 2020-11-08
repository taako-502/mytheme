( function() {
  jQuery('.l-hamburger').click( function() {
    jQuery(this).toggleClass('active');
    jQuery('.l-nav-menu').toggleClass('active');
  });
}() );
