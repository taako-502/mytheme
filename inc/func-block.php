<?php
namespace Mytheme_Theme;

/**
 * block
 *
 * @package mytheme
 */

/**
 * ブロック読み込み
 * @return [type] [description]
 */
 function test_theme_block_enqueue() {
   //依存スクリプトの配列とバージョンが記述された index.asset.php をインクルード
   $asset_file = include( get_theme_file_path('/block/build/index.asset.php'));

   //ブロック用のスクリプト build/index.js を登録
   wp_register_script(
     'test-theme-block-script',
     get_theme_file_uri('/block/build/index.js'),
     $asset_file['dependencies'], //依存スクリプトの配列
     $asset_file['version'] //バージョン
   );

   //ブロックタイプの登録
   register_block_type(
     'wdl/test-theme-block',
     array(
       //エディター用スクリプトにブロック用スクリプトのハンドル名を指定して関連付け
       'editor_script' => 'test-theme-block-script',
     )
   );
 }
 add_action( 'init', '\Mytheme_Theme\test_theme_block_enqueue' );

/**
 * カスタムエディタ読み込み
 */
function add_block_editor() {
 wp_enqueue_style( 'block-style', get_stylesheet_directory_uri() . '/css/editor.css' );
 wp_enqueue_script( 'block-custom', get_stylesheet_directory_uri() . '/js/editor.js',array(), "", true);
}
add_action( 'enqueue_block_editor_assets', '\Mytheme_Theme\add_block_editor' );

//ブロックエディタ
//get_template_part('/block/f-block','custom-lastpost');//最新記事
get_template_part('/block/f-block','custom-blogcard');//ブログカード
//ブロックパターン
get_template_part('/block/f-block','pattern');
//ブロックエディタ
get_template_part('/block/f-block','style');
