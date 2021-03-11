<?php
namespace Mytheme_Theme;


class Style {
  /**
   * スタイル生成
   * @param string  $property  プロパティ値
   * @param string  $key       カスタマイザーキー
   * @param string  $unit      単位
   * @param boolean $imporatnt 末尾に"!important"をつけるかのフラグ（trueなら付与）
   */
  public static function add_style($property,$key,$unit = "",$imporatnt = false) {
    $value = get_theme_mod($key, \Mytheme::get_default_setting($key));
    echo $property." : ".$value.$unit.";".($imporatnt ?"!important" : "");
    return;
  }
}
?>
