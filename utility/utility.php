<?php
/**
 * 引数がnullか空白か判定
 * @param  [type]  $val [description]
 * @return boolean      nullか空白ならtrueを返却
 */
function isNullOrEmpty($val){
  return is_null($val) || $val== '';
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

/**
 * 値を取得。空白ならデフォルト値を返却する
 * @param  String $val     設定値
 * @param  String $default デフォルト値
 * @return String          値（空白の場合デフォルト値）
 */
function getValOrDef( $val, $default){
  return empty(trim($var)) ? $default : $var ;
}
?>
