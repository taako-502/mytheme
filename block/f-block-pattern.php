<?php
/**
 * ブロックパターン
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
