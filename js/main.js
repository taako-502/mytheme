/**
 * ハンバーガーメニューのレスポンシブ制御
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
jQuery(document).ready(function($) {
  (function($) {
    jQuery('.l-hamburger').click(function() {
      jQuery(this).toggleClass('active');
      jQuery('.l-nav').toggleClass('active');
    });
  })(jQuery);
});
