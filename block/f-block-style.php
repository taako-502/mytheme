<?php
namespace Mytheme_Theme;

/**
 * ブロックスタイル
 */
add_action( 'init', function() {
  //リスト
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
});
