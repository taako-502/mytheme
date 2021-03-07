<?php
namespace Mytheme_Theme;
//TODO 動的クラスになっている

/**
 * 共通メソッド
 */
class Utility {
  use \Mytheme_Theme\Utility\ImgUtility,
      \Mytheme_Theme\Utility\StringUtility;

  /**
   * 記事情報をディスクリプションに変換
   * @param  String  $content 記事情報
   * @param  Integer $len     文字数
   * @return String           ディスクリプション
   */
  public static function getDescription($id,$len){
    $description = get_post($id)->post_content;
    $description = str_replace(array("\r\n","\r","\n","&nbsp;"),'',$description);
    $description = wp_strip_all_tags($description);
    $description = preg_replace('/\[.*\]/','',$description);
    return mb_strimwidth($description,0,$len,"...");
  }

  /**
   * メタディスクリプションを取得
   * @param  String  $content 記事情報
   * @param  Integer $len     文字数
   * @return String           メタディスクリプション（メタディスクリプションの設定を行っていない場合は、記事からディスクリプションを生成）
   */
  public static function getMetaDescription($id,$len){
    $description = get_post_meta($id, '_meta_description', true);
    return !self::isNullOrEmpty($description) ? $description : self::getDescription($id,$len);
  }

  /**
   * カラーコードをrgbaに変換
   * @param  [type]  $color_code [description]
   * @param  integer $alpha      [description]
   * @return [type]              [description]
   */
  public static function getConversionRgba($color_code, $alpha = 1) {
    $color_code = preg_replace('/#/', '', $color_code);

    if(mb_strlen($color_code) == 6){
      $rgba_code['red']   = hexdec(substr($color_code, 0, 2));
      $rgba_code['green'] = hexdec(substr($color_code, 2, 2));
      $rgba_code['blue']  = hexdec(substr($color_code, 4, 2));
    } else {
      $rgba_code['red']   = hexdec(substr($color_code, 0, 1).substr($color_code, 0, 1));
      $rgba_code['green'] = hexdec(substr($color_code, 1, 1).substr($color_code, 1, 1));
      $rgba_code['blue']  = hexdec(substr($color_code, 2, 1).substr($color_code, 2, 1));
    }
    $rgba_code['alpha'] = $alpha;
    $rgba_code['full']  = implode(',', $rgba_code);

    return $rgba_code;
  }
}

?>
