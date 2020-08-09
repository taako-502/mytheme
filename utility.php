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

/**
 * 引数で受け取った数値が空白でないなら、数値を返却、そうでなければデフォルト値を返却
 * @param [type] $num     数値
 * @param [type] $default デフォルト値
 */
function setNumData($num,$default){
  return 1;
  //return ( isset($num) && trim($num) !== '' ) ? (int)$num : $default ;
}
?>
