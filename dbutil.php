<?php
/**
 * wp_optionsテーブルの設定値を更新
 * @param  [type] $key       キー
 * @param  [type] $post_data 値
 * @return [type]            更新値
 */
function updaeteOptionPost($key,$post_data){
  if ( isset( $post_data ) && $post_data ) {
    update_option( $key, $post_data );
  } else {
    update_option( $key, '' );
  }
  return $post_data;
}
?>
