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
    //マージン設定
    wp.customize('header_text_description_margin_top', function(value) {
      value.bind(function(newval) {
        $('.l-header--description').css('margin-top',newval + 'px');
      });
    });
    wp.customize('header_text_title_margin_top', function(value) {
      value.bind(function(newval) {
        $('.l-header--logo').css('margin-top',newval + 'px');
      });
    });
    wp.customize('header_text_title_margin_bottom', function(value) {
      value.bind(function(newval) {
        $('.l-header--logo').css('margin-bottom',newval + 'px');
      });
    });
    /* フロントページ */
    //構成
    wp.customize('front_architect_content_width', function(value) {
      value.bind(function(newval) {
        $('.contents').css('max-width',newval + "px");
      });
    });
    wp.customize('architect_col_one_width', function(value) {
      value.bind(function(newval) {
        $('.l-main.p-front').css('max-width',newval + "%");
      });
    });
    //スライダーの設定
    wp.customize('front_firstview_width', function(value) {
      value.bind(function(newval) {
        $('.c-slider-header').css('max-width',newval + "px");
      });
    });
    wp.customize('front_firstview_article_margin_side', function(value) {
      value.bind(function(newval) {
        $('.c-slider-header li').css('margin-left',newval + "px");
        $('.c-slider-header li').css('margin-right',newval + "px");
      });
    });
    //見出しの設定
    wp.customize('front_heading_reco', function(value) {
      value.bind(function(newval) {
        $('.p-recommend--h2').html(newval);
      });
    });
    wp.customize('front_heading_news', function(value) {
      value.bind(function(newval) {
        $('.p-news--h2').html(newval);
      });
    });
    wp.customize('front_heading_fontsize', function(value) {
      value.bind(function(newval) {
        $('.c-heading--main').css('font-size',newval + "px");
      });
    });
    //padding設定
    wp.customize('front_heading_padding_top_and_bottom', function(value) {
      value.bind(function(newval) {
        $('.c-heading--main').css('padding-top',newval + "em");
        $('.c-heading--main').css('padding-bottom',newval + "em");
      });
    });
    wp.customize('front_heading_padding_left', function(value) {
      value.bind(function(newval) {
        $('.c-heading--main').css('padding-left',newval + "em");
        $('.c-heading--main span.cus-border').css('margin-left',"-" + newval + "em");
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
