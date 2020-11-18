<?php
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
 add_action( 'init', 'test_theme_block_enqueue' );

/**
 * カスタムエディタ読み込み
 */
function add_block_editor() {
 wp_enqueue_style( 'block-style', get_stylesheet_directory_uri() . '/css/editor.css' );
 //wp_enqueue_script( 'block-custom', get_stylesheet_directory_uri() . '/js/editor.js',array(), "", true);
}
add_action( 'enqueue_block_editor_assets', 'add_block_editor' );

/**
 * ブロックパターン
 * @var [type]
 */
//デフォルトのテーマ削除
remove_theme_support( 'core-block-patterns' );
//生徒の声追加
$pattern = '<!-- wp:group -->
<div class="wp-block-group p-student-voice"><div class="wp-block-group__inner-container"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":64,"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="http://test.local/wp-content/uploads/2020/10/book_idol_poster_woman.png" alt="" class="wp-image-64"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->
<p style="font-size:18px">{生徒の名前}</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3>&lt;感想></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>{生徒の声：〇〇さんとの料理教室は、とても楽しかったです！また行きたい！}</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:group -->';
register_block_pattern(
  'my-pattern/test',
 	array(
 	  'title'       => '生徒様の声ページ',
    'description' => '顔写真、名前、感想の３点セット',
 		'content'     => $pattern,
  )
);

/**
 * ブロックスタイル
 * @var [type]
 */
add_action( 'init', function() {
 	register_block_style(
 		'core/list',
 		[
 			'name' => 'bg__ligthblue',
 			'label' => '薄い青背景',
 		]
 	);
  register_block_style(
    'custom/box',
    [
      'name' => 'line__dot',
      'label' => '点線ブロック',
    ]
  );
 } );