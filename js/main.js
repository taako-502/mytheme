/**
 * ハンバーガーメニューのレスポンシブ制御
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
jQuery(document).ready(function($) {
  (function($) {
    var $header = jQuery('.l-header');
    var $contents = jQuery('.contents');
    var $footer = jQuery('.l-footer');

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
      $contents.toggleClass('open');
      $footer.toggleClass('open');
    });

    /**
     * ハンバーガメニューを閉じる処理
     */
     jQuery('.l-overlay').click(function() {
       $header.removeClass('open');
       $contents.removeClass('open');
       $footer.removeClass('open');
     });

  })(jQuery);
});
