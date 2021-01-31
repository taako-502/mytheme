/**
 * このファイルはテーマカスタマイザーライブプレビューをライブにします。
 * テーマ設定で 'postMessage' を指定し、ここで制御します。
 * JavaScript はコントロールからテーマ設定を取得し、
 * jQuery を使ってページに変更を反映します。
 */
(function($) {
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
})(jQuery);
