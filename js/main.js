jQuery(document).ready(function($) {
  (function($) {
    jQuery('.l-hamburger').click(function() {
      jQuery(this).toggleClass('active');
      jQuery('.l-nav').toggleClass('active');
    });
  })(jQuery);
});
