jQuery(document).ready(function($) {
  (function($) {
    jQuery('.l-hamburger').click(function() {
      jQuery(this).toggleClass('active');
      jQuery('.l-nav-menu').toggleClass('active');
    });

    jQuery('test').focusin(function(e) {
      jQuery(this).css('background-color', '#ffc');
    })
  })(jQuery);
});
