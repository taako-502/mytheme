<?php
/**
 * wp_optionsテーブルの設定値を更新
 * @param  [type] $key       キー
 * @param  [type] $value     値
 * @return [type]            更新値
 */
function updaeteOptionPost($key,$value){
  $data = isset( $value ) && $value ? $value : '';
  update_option($key,$data);
  return $value;
}
?>
