<?php
/**
 * メディアアップローダー読み込み
 * @return [type] [description]
 */
function my_admin_scripts() {
  //メディアアップローダの javascript API
  wp_enqueue_media();
}
add_action( 'admin_print_scripts' , 'my_admin_scripts' );

// 記事の冒頭に表示するアイキャッチ画像
add_image_size('single',800,450,false);
add_image_size('articlelist',288,162,false);
 ?>
