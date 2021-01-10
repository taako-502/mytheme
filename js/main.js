/**
 * ハンバーガーメニューのレスポンシブ制御
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
jQuery(document).ready(function($) {
  (function($) {
    var $header = jQuery('.l-header');

    /**
     * 下にスクロールすると、画面上部にメニューを表示する
     */
    jQuery(window).scroll(function() {
      if (jQuery(window).scrollTop() > 350) {
        $header.addClass('fixed');
      } else {
        $header.removeClass('fixed');
      }
    });

    /**
     * ハンバーガーボタン押下時の処理
     */
    jQuery('.l-header--toggle').click(function() {
      $header.toggleClass('open');
    });

  })(jQuery);
});
