<?php
namespace Mytheme_Theme;

/**
 * 管理画面を制御するクラス
 */
class Admin {
  /**
   * 管理画面で設定するキーのリスト
   * @return Array キーの配列
   */
  public static function get_admin_key() {
    return Array(
      /* 全体設定 */
      'pc_p_size',
      'pc_h1_size',
      'pc_h2_size',
      'pc_h3_size',
      'pc_h4_size',
      'pc_h5_size',
      'pc_h6_size',
      'tb_p_size',
      'tb_h1_size',
      'tb_h2_size',
      'tb_h3_size',
      'tb_h4_size',
      'tb_h5_size',
      'tb_h6_size',
      'sm_p_size',
      'sm_h1_size',
      'sm_h2_size',
      'sm_h3_size',
      'sm_h4_size',
      'sm_h5_size',
      'sm_h6_size',

      /* SEO */
      'analytics',
      'gtm_id',
      'ogp_fb_adminid',
      'ogp_fb_appid',
      'ogp_fb_img_article',
      'ogp_fb_img_top',

      /* サイト回遊 */
      'reco_center_img',
      'reco_center_url',
      'reco_left_img',
      'reco_left_url',
      'reco_right_img',
      'reco_right_url',
      'relevance_select',
      'relevance_url1',
      'relevance_url2',
      'relevance_url3',
      'relevance_url4',

      /* アドセンス */
      'adsCd_auto',
      'adsCd_below_post',
      'adsCd_on_content_table',
      'adsCd_top_card',
    );
  }

  /**
   * inputタグの生成
   * @param string $type        inputタグのタイプ
   * @param string $label       ラベルテキスト
   * @param string $key         オプションキー
   * @param string $placeholder プレースホルダー
   */
  public static function add_input($type, $label, $key, $placeholder = ""){
    $_placeholder = Utility::isNullOrWhitespace($placeholder) ? \Mytheme::get_default_setting($key) : $placeholder ;
    return '<label for="'.$key.'">'.$label.'</label><input type="'.$type.'" id="'.$key.'" class="'.$key.'" name="'.$key.'" value="'.\Mytheme::get_setting_admin($key).'" placeholder="'.$_placeholder.'">';
  }

  /**
   * selectタグの生成
   * @param string $label ラベルテキスト
   * @param string $key   オプションキー
   * @param array  $arr   キー：value値,バリュー：テキストの連想配列
   */
  public static function add_select($label = "", $key = "", $arr = array()){
    $html = '<label for="'.$key.'">'.$label.'</label>';
    $html .= '<select id="'.$key.'" class="'.$key.'" name="'.$key.'">';
    foreach ($arr as $value => $text) {
      if ($value == \Mytheme::get_setting_admin($key)) {
        $html .= '<option value="'.$value.'" selected>'.$text.'</option>';
      } else {
        $html .= '<option value="'.$value.'">'.$text.'</option>';
      }
    }
    $html .= '</select>';
    return $html;
  }

  /**
   * 画像選択項目の生成
   * @param string $label ラベルテキスト
   * @param string $key   オプションキー
   * @param array  $arr   キー：value値,バリュー：テキストの連想配列
   */
  public static function add_img($label = "", $key = "", $arr = array()){
    return '<label for="'.$key.'">'.$label.'</label>'.Utility::generate_upload_image_tag($key, \Mytheme::get_setting_admin($key));
  }

  /**
   * HTML入力用テキストエリアの生成
   * @param string $label ラベルテキスト
   * @param string $key   オプションキー
   * @param string $rows  テキストエリアの横幅
   * @param string $cols  テキストエリアの縦幅
   */
  public static function add_textarea_html($label = "", $key = "",$rows = "8", $cols = "80"){
    return '<label for="'.$key.'">'.$label.'</label><br><textarea id="'.$key.'" name="'.$key.'" rows="'.$rows.'" cols="'.$cols.'">'.stripslashes(\Mytheme::get_setting_admin($key)) .'</textarea>';
  }
}
?>
