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
   * [get_key description]
   * @return [type] [description]
   */
  public static function add_input($type = "", $label = "", $key = ""){
    return '<label for="'.$key.'">'.$label.'</label><input type="'.$type.'" id="'.$key.'" class="'.$key.'" name="'.$key.'" value="'.\Mytheme::get_setting($key).'" placeholder="'.\Mytheme::get_default_setting($key).'">';
  }
}
 ?>
