/**
 * このファイルはテーマカスタマイザーライブプレビューをライブにします。
 * テーマ設定で 'postMessage' を指定し、ここで制御します。
 * JavaScript はコントロールからテーマ設定を取得し、
 * jQuery を使ってページに変更を反映します。
 */
 jQuery(document).ready(function($) {
   (function($) {
    /* ライブプレビューの設定 */
    /* ヘッダー */
    // リアルタイムにサイトタイトルを変更
    wp.customize('blogname', function(value) {
      value.bind(function(newval) {
        $('a.l-header--logo').html(newval);
      });
    });
    // リアルタイムにキャッチフレーズを変更
    wp.customize('blogdescription', function(value) {
      value.bind(function(newval) {
        $('a.l-header--description').html(newval);
      });
    });
    /* フロントページ */
    wp.customize('front_text_reco', function(value) {
      value.bind(function(newval) {
        $('.p-recommend--h2').html(newval);
      });
    });
    wp.customize('front_text_news', function(value) {
      value.bind(function(newval) {
        $('.p-news--h2').html(newval);
      });
    });
    /* フッター */
    wp.customize('footer_content_copyright', function(value) {
      value.bind(function(newval) {
        $('.l-footer--center').html(newval);
      });
    });

    //alert(jQuery(".accordion-section-title").val());
    jQuery(".p-recommend--h2").text("hoge");
    jQuery("h3.accordion-section-title").text("hoge");
    jQuery("#customize-controls").css('background-color','red');
    jQuery("#customize-preview").css('background-color','red');
    /* 活性制御 */
    /* ワンカラムの時のみ活性 */
    $('#accordion-section-title_tagline').click(function() {
      alert("test");
      if ($('input[name=lang]:checked').val() === 'one-col') {
        alert("hoge");
      } else {
        alert("fuga");
      }
    });
  })(jQuery);
});
