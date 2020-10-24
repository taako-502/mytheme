<?php
//ダッシュボード
 require get_template_directory() . '/inc/func-dashboard.php';
//カスタマイザー
require get_template_directory() . '/inc/customizer.php';
//ナビゲーションメニュー設定
require get_template_directory() . '/inc/func-menu.php';
//管理画面設定
require get_template_directory() . '/inc/func-admin.php';
//ブロックパターン
require get_template_directory() . '/inc/func-blockpattern.php';
//OGP設定
get_template_part( '/inc/func', 'ogp' );
//画像アップローダ設定
get_template_part( '/inc/func', 'img' );

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
// 記事の冒頭に表示するアイキャッチ画像
add_image_size('single',800,450,false);
add_image_size('articlelist',288,162,false);
?>
