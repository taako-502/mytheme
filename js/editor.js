/**
 * エディタ画面
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
jQuery(document).ready(function($) {
  (function($) {
    $('#meta-description-textarea').keyup(function(){
      var count = $(this).val().length;
      $('#meta-description-len').text(count);
    });

    $('#ogp-description-textarea').keyup(function(){
      var count = $(this).val().length;
      $('#ogp-description-len').text(count);
    });
  })(jQuery);
});
