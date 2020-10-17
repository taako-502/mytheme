<?php
/**
 * ブロックパターン追加
 *
 * @package mytheme
 */
 $pattern = '<!-- wp:heading --><h2>見出し</h2><!-- /wp:heading -->
 		<!-- wp:paragraph --><p>ブロックだよ</p><!-- /wp:paragraph -->';

 register_block_pattern(
 	'my-pattern/test',
 	array(
 		'title'       => 'テストパターン',
     'description' => '見出しブロックと段落ブロックのセット',
 		'content'     => $pattern,
 	)
 );
