<?php
//ダッシュボード
get_template_part('/inc/func','dashboard');
//カスタマイザー
get_template_part('/inc/func','customizer');
//ナビゲーションメニュー設定
get_template_part('/inc/func','menu');
//管理画面設定
get_template_part('/inc/func','admin');
//ブロックパターン
get_template_part('/inc/func','blockpattern');
//OGP設定
get_template_part('/inc/func', 'ogp');
//画像アップローダ設定
get_template_part('/inc/func', 'img');

/**
* テーマのセットアップメソッド
*/
function mytheme_setup(){
  // アイキャッチ画像をON
  add_theme_support('post-thumbnails');
  // メニュー機能をON
  add_theme_support('menus');
}
add_action('after_setup_theme','mytheme_setup');

// フック処理
add_action(
	'widgets_init',
	function(){
		register_sidebar(array(
			'id' => 'widget_sidebar001',
			'name' => 'サイドバー',
			'description' => 'サイドバーのウィジェット',
		));
	}
);
add_action( 'admin_print_scripts', 'my_admin_scripts' );
// アーカイブの余計なタイトルを削除
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_month() ) {
        $title = single_month_title( '', false );
    }
    return $title;
});
?>
