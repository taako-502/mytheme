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
          'name': $('.p-mailform--name').val(),
          'email': $('.p-mailform--email').val(),
          'content': $('.p-mailform--content').val(),
        },
        success: function(response) {
          jsonData = JSON.parse( response );
          $errFlg = false;
          $('.p-maiilform--err-msg').text("");
          $('.p-maiilform--name-err-msg').text("");
          $('.p-maiilform--email-err-msg').text("");
          $('.p-maiilform--content-err-msg').text("");
          $.each( jsonData, function( i, val ){
            //メッセージを表示
            if(i === 'result'){
              $('.p-maiilform--response').text(val['msg']);
              if(val['res'] === '0'){
                $('.p-maiilform--response').addClass('c_successmsg');
              } else {
                $('.p-maiilform--response').addClass('c_errmsg');
                $errFlg = true;
              }
            }
            //入力エラーの表示
            $('.p-maiilform--' + i + '-err-msg').text(val['msg']);
          });
          //エラーがなければ、入力欄の中身をクリア
          if(!$errFlg){
            $('.p-mailform--name').val("");
            $('.p-mailform--email').val("");
            $('.p-mailform--content').val("");
          }
        }
      });
      return false;
    });

  })(jQuery);
});
