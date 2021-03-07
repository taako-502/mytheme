<?php
namespace Mytheme_Theme\Utility;

trait StringUtility {
  /**
  * 引数がnullか空白か判定
  * @param  [type]  $val [description]
  * @return boolean      nullか空白ならtrueを返却
  */
  public static function isNullOrEmpty($obj) {
    if($obj === 0 || $obj === "0") {
      return false;
    }
    return empty($obj);
  }

  /**
  * 引数がnullかスペースか判定
  * @param  [type]  $obj [description]
  * @return boolean      nullかスペースならtrueを返却
  */
  public static function isNullOrWhitespace($obj) {
    if(self::isNullOrEmpty($obj) === true){
      return true;
    }
    if(is_string($obj) && mb_ereg_match("^(\s|　)+$", $obj)){
      return true;
    }
    return false;
  }

  /**
   * 値を取得。空白ならデフォルト値を返却する
   * @param  String $val     設定値
   * @param  String $default デフォルト値
   * @return String          値（空白の場合デフォルト値）
   */
  public static function getValOrDef( $val, $default){
    return isNullOrWhitespace($val) ? $default : $val ;
  }
}
?>
