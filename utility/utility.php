<?php
if (!function_exists('isNullOrEmpty')) {
  /**
  * 引数がnullか空白か判定
  * @param  [type]  $val [description]
  * @return boolean      nullか空白ならtrueを返却
  */
  function isNullOrEmpty($obj) {
    if($obj === 0 || $obj === "0") {
      return false;
    }
    return empty($obj);
  }
}

if (!function_exists('is_nullorwhitespace')) {
  /**
   * 引数がnullかスペースか判定
   * @param  [type]  $obj [description]
   * @return boolean      nullかスペースならtrueを返却
   */
  function is_nullorwhitespace($obj) {
    if(is_nullorempty($obj) === true){
      return true;
    }
    if(is_string($obj) && mb_ereg_match("^(\s|　)+$", $obj)){
      return true;
    }
    return false;
  }
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

/**
 * 記事情報をディスクリプションに変換
 * @param  String  $content 記事情報
 * @param  Integer $len     文字数
 * @return String           ディスクリプション
 */
function getDiscription($content,$len){
  $description = $content;
  $description = str_replace(array("\r\n","\r","\n","&nbsp;"),'',$content);
  $description = wp_strip_all_tags($description);
  $description = preg_replace('/\[.*\]/','',$description);
  return mb_strimwidth($description,0,$len,"...");
}
?>
