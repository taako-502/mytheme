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
    //ロゴとディスクリプションの位置を変更
    wp.customize('header_layout_titile_align', function(value) {
      value.bind(function(newval) {
        $('.l-header--inner').css('text-align',newval);
        if(newval == 'left'){
          $('.l-header--logo').css('margin-left','28px');
          $('.l-header--description').css('margin-left','28px');
        } else if(newval == 'right') {
          $('.l-header--logo').css('margin-right','28px');
          $('.l-header--description').css('margin-right','28px');
        }
      });
    });
    //ナビゲーションメニューの位置を変更
    wp.customize('header_layout_nav_align', function(value) {
      value.bind(function(newval) {
        $('.l-nav').css('text-align',newval);
      });
    });
    // リアルタイムにサイトタイトルを変更
    wp.customize('blogname', function(value) {
      value.bind(function(newval) {
        $('.l-header--logo').html(newval);
      });
    });
    wp.customize('header_text_logo_fontsize', function(value) {
      value.bind(function(newval) {
        $('.l-header--logo').css('font-size',newval + 'px');
      });
    });
    // リアルタイムにキャッチフレーズを変更
    wp.customize('blogdescription', function(value) {
      value.bind(function(newval) {
        $('.l-header--description').html(newval);
      });
    });
    wp.customize('header_text_description_fontsize', function(value) {
      value.bind(function(newval) {
        $('.l-header--description').css('font-size',newval + 'px');
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
    wp.customize('architect_content_width', function(value) {
      value.bind(function(newval) {
        $('.contents').css('max-width',newval + "px");
      });
    });
    wp.customize('architect_col_one_width', function(value) {
      value.bind(function(newval) {
        $('.l-main.p-front').css('max-width',newval + "%");
      });
    });
    /* フッター */
    wp.customize('footer_content_copyright', function(value) {
      value.bind(function(newval) {
        $('.l-footer--center').html(newval);
      });
    });
  })(jQuery);
});
