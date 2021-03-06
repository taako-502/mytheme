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
    var $topScrollBtn = jQuery('.c-top-scroll-btn');
    var $headerImg = jQuery('.l-header--img');
    var $sliderHeader = jQuery('.c-slider-header');

    /**
     * 下にスクロールすると、画面上部にメニューを表示する
     */
    jQuery(window).scroll(function() {
      if (jQuery(window).scrollTop() > 350) {
        $header.addClass('fixed');
        $topScrollBtn.addClass('fixed');
      } else {
        $header.removeClass('fixed');
        $topScrollBtn.removeClass('fixed');
      }
    });

    /**
     * ハンバーガーボタン押下時の処理
     */
    jQuery('.l-header--toggle').click(function() {
      $header.toggleClass('open');
      $contents.toggleClass('open');
      $footer.toggleClass('open');
      $headerImg.toggleClass('open');
      $sliderHeader.toggleClass('open');
    });

    /**
     * ハンバーガメニューを閉じる処理
     */
     jQuery('.l-overlay').click(function() {
       $header.removeClass('open');
       $contents.removeClass('open');
       $footer.removeClass('open');
       $headerImg.removeClass('open');
       $sliderHeader.removeClass('open');
     });

     // ◇ボタンをクリックしたら、スクロールして上に戻る
    $topScrollBtn.click(function(){
      jQuery('body,html').animate({
        scrollTop: 0},500);
        return false;
    });

  })(jQuery);
});
