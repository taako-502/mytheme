/**
 * メールフォームの制御
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
jQuery(document).ready(function($) {
  (function($) {
    var $response = $('.p-mailform--submit');

    /**
     * サンプル
     * @return {[type]} [description]
     */
    //$( '#submit' ).on( 'click', function(){
    $response.on('click', function() {
      $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {
          'action': 'send_mail',
          'username': $('.p-mailform--name').val(),
          'email': $('.p-mailform--email').val(),
          'content': $('.p-mailform--content').val(),
        },
        success: function(response) {
          //メッセージを表示
          $('.p-maiilform--response').text(response);
          //入力した中身をクリア
          $('.p-mailform--name').val("");
          $('.p-mailform--email').val("");
          $('.p-mailform--content').val("");
        }
      });
      return false;
    });

  })(jQuery);
});
