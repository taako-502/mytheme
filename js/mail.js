/**
 * メールフォームの制御
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
jQuery(document).ready(function($) {
  (function($) {
    var $response = $('.p-mailform--submit');

    /**
     * メール送信時の処理
     */
    $response.submit(function(event) {

    });

    /**
     * サンプル
     * @return {[type]} [description]
     */
    //$( '#submit' ).on( 'click', function(){
    $response.on( 'click', function(){
    $.ajax({
        type: 'POST',
        url: ajaxurl,
        data: {
            'action' : 'view_sitename',
        },
        success: function( response ){
            alert( response );
        }
    });
    return false;
});

  })(jQuery);
});
