<?php
function mytheme_setup(){
  // アイキャッチ画像をON
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','mytheme_setup');
add_image_size('single',800,450,false);
?>
