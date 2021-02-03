<?php
/**
 * 管理画面（admin.php）初期処理
 * @package mytheme
 */

/**
 * テーマの設定値をデータベースから取得する。
 * 空白ならデフォルト値を返却する
 * @param  String $key     設定値キー
 * @param  String $default デフォルト値
 * @return String          テーマの設定値（または、デフォルト値）
 */
if (!function_exists('get_theme_mod_orDef')) {
  function get_theme_mod_orDef( $key, $default){
    $var = get_theme_mod( $key, $default);
    return empty(trim($var)) ? $default : $var ;
  }
}

//デフォルト変数読み込み
require_once( plugin_dir_path(__FILE__) . "../utility/variable.php");
//wp_optionsテーブルから設定値を取得
/* 全体設定 */
$topCol = get_theme_mod('top-col', '');
/* 基本設定 */
$pc_psize = get_theme_mod_orDef('pc-p-size','');
$pc_h1size = get_theme_mod_orDef('pc-h1-size','');
$pc_h2size = get_theme_mod_orDef('pc-h2-size','');
$pc_h3size = get_theme_mod_orDef('pc-h3-size','');
$pc_h4size = get_theme_mod_orDef('pc-h4-size','');
$pc_h5size = get_theme_mod_orDef('pc-h5-size','');
$pc_h6size = get_theme_mod_orDef('pc-h6-size','');
$tb_psize = get_theme_mod_orDef('tb-p-size','');
$tb_h1size = get_theme_mod_orDef('tb-h1-size','');
$tb_h2size = get_theme_mod_orDef('tb-h2-size','');
$tb_h3size = get_theme_mod_orDef('tb-h3-size','');
$tb_h4size = get_theme_mod_orDef('tb-h4-size','');
$tb_h5size = get_theme_mod_orDef('tb-h5-size','');
$tb_h6size = get_theme_mod_orDef('tb-h6-size','');
$sm_psize = get_theme_mod_orDef('sm-p-size','');
$sm_h1size = get_theme_mod_orDef('sm-h1-size','');
$sm_h2size = get_theme_mod_orDef('sm-h2-size','');
$sm_h3size = get_theme_mod_orDef('sm-h3-size','');
$sm_h4size = get_theme_mod_orDef('sm-h4-size','');
$sm_h5size = get_theme_mod_orDef('sm-h5-size','');
$sm_h6size = get_theme_mod_orDef('sm-h6-size','');
$analytics = get_theme_mod('analytics','');
$gtmId = get_theme_mod('gtm-id', '');
$ogpFbAdminId = get_theme_mod('ogp-fb-adminid','');
$ogpFbAppId = get_theme_mod('ogp-fb-appid','');
$ogpFbImgArticle = get_theme_mod('ogp-fb-img-article','');
$ogpFbImgTop = get_theme_mod('ogp-fb-img-top','');
/* サイト回遊 */
$recoleftimg = get_theme_mod('reco-left-img','');
$recolefturl = get_theme_mod('reco-left-url','');
$recocenterimg = get_theme_mod('reco-center-img','');
$recocenterurl = get_theme_mod('reco-center-url','');
$recorightimg = get_theme_mod('reco-right-img','');
$recorighturl = get_theme_mod('reco-right-url','');
$relevanceSelect = get_theme_mod('relevance-select','category');
$relevanceUrl1 = get_theme_mod('relevance-url1','');
$relevanceUrl2 = get_theme_mod('relevance-url2','');
$relevanceUrl3 = get_theme_mod('relevance-url3','');
$relevanceUrl4 = get_theme_mod('relevance-url4','');
/* アドセンス */
$adsCdAuto = get_theme_mod('adsCd-auto','');
$adsTopCard = get_theme_mod('adsCd-top-card','');
$adsCdOnContentTable = get_theme_mod('adsCd-on-content-table','');
$adsBelowPost = get_theme_mod('adsCd-below-post','');
//saveボタンを押したときの処理
if(isset($_POST['save'])) {
  //admin.php画面からpostされたデータで、データベースと画面設定値を更新
  /* 全体設定 */
  $topCol = $_POST['top-col'];
  set_theme_mod('top-col',$topCol);
  /* 基本設定　*/
  $pc_psize = $_POST['pc-p-size'];
  set_theme_mod('pc-p-size',$pc_psize);
  $pc_h1size = $_POST['pc-h1-size'];
  set_theme_mod('pc-h1-size',$pc_h1size);
  $pc_h2size = $_POST['pc-h2-size'];
  set_theme_mod('pc-h2-size',$pc_h2size);
  $pc_h3size = $_POST['pc-h3-size'];
  set_theme_mod('pc-h3-size',$pc_h3size);
  $pc_h4size = $_POST['pc-h4-size'];
  set_theme_mod('pc-h4-size',$pc_h4size);
  $pc_h5size = $_POST['pc-h5-size'];
  set_theme_mod('pc-h5-size',$pc_h5size);
  $pc_h6size = $_POST['pc-h6-size'];
  set_theme_mod('pc-h6-size',$pc_h6size);
  $tb_psize = $_POST['tb-p-size'];
  set_theme_mod('tb-p-size',$tb_psize);
  $tb_h1size = $_POST['tb-h1-size'];
  set_theme_mod('tb-h1-size',$tb_h1size);
  $tb_h2size = $_POST['tb-h2-size'];
  set_theme_mod('tb-h2-size',$tb_h2size);
  $tb_h3size = $_POST['tb-h3-size'];
  set_theme_mod('tb-h3-size',$tb_h3size);
  $tb_h4size = $_POST['tb-h4-size'];
  set_theme_mod('tb-h4-size',$tb_h4size);
  $tb_h5size = $_POST['tb-h5-size'];
  set_theme_mod('tb-h5-size',$tb_h5size);
  $tb_h6size = $_POST['tb-h6-size'];
  set_theme_mod('tb-h6-size',$tb_h6size);
  $sm_psize = $_POST['sm-p-size'];
  set_theme_mod('sm-p-size',$sm_psize);
  $sm_h1size = $_POST['sm-h1-size'];
  set_theme_mod('sm-h1-size',$sm_h1size);
  $sm_h2size = $_POST['sm-h2-size'];
  set_theme_mod('sm-h2-size',$sm_h2size);
  $sm_h3size = $_POST['sm-h3-size'];
  set_theme_mod('sm-h3-size',$sm_h3size);
  $sm_h4size = $_POST['sm-h4-size'];
  set_theme_mod('sm-h4-size',$sm_h4size);
  $sm_h5size = $_POST['sm-h5-size'];
  set_theme_mod('sm-h5-size',$sm_h5size);
  $sm_h6size = $_POST['sm-h6-size'];
  set_theme_mod('sm-h6-size',$sm_h6size);
  $analytics = trim($_POST['analytics']);
  set_theme_mod('analytics',$analytics);
  $gtmId = trim($_POST['gtm-id']);
  set_theme_mod('gtm-id', $gtmId);
  $ogpFbAdminId = $_POST['ogp-fb-adminid'];
  set_theme_mod('ogp-fb-adminid',$ogpFbAdminId);
  $ogpFbAppId = $_POST['ogp-fb-appid'];
  set_theme_mod('ogp-fb-appid',$ogpFbAppId);
  $ogpFbImgArticle = $_POST['ogp-fb-img-article'];
  set_theme_mod('ogp-fb-img-article',$ogpFbImgArticle);
  $ogpFbImgTop = $_POST['ogp-fb-img-top'];
  set_theme_mod('ogp-fb-img-top',$ogpFbImgTop);
  /* サイト回遊 */
  $recoleftimg = $_POST['reco-left-img'];
  set_theme_mod('reco-left-img',$recoleftimg);
  $recolefturl = $_POST['reco-left-url'];
  set_theme_mod('reco-left-url',$recolefturl);
  $recocenterimg = $_POST['reco-center-img'];
  set_theme_mod('reco-center-img',$recocenterimg);
  $recocenterurl = $_POST['reco-center-url'];
  set_theme_mod('reco-center-url',$recocenterurl);
  $recorightimg = $_POST['reco-right-img'];
  set_theme_mod('reco-right-img',$recorightimg);
  $recorighturl = $_POST['reco-right-url'];
  set_theme_mod('reco-right-url',$recorighturl);
  $relevanceSelect = $_POST['relevance-select'];
  set_theme_mod('relevance-select',$relevanceSelect);
  $relevanceUrl1 = $_POST['relevance-url1'];
  set_theme_mod('relevance-url1',$relevanceUrl1);
  $relevanceUrl2 = $_POST['relevance-url2'];
  set_theme_mod('relevance-url2',$relevanceUrl2);
  $relevanceUrl3 = $_POST['relevance-url3'];
  set_theme_mod('relevance-url3',$relevanceUrl3);
  $relevanceUrl4 = $_POST['relevance-url4'];
  set_theme_mod('relevance-url4',$relevanceUrl4);
  /* アドセンス */
  $adsCdAuto = $_POST['adsCd-auto'];
  set_theme_mod('adsCd-auto',$adsCdAuto);
  $adsTopCard = $_POST['adsCd-top-card'];
  set_theme_mod('adsCd-top-card',$adsTopCard);
  $adsCdOnContentTable = $_POST['adsCd-on-content-table'];
  set_theme_mod('adsCd-on-content-table',$adsCdOnContentTable);
  $adsBelowPost = $_POST['adsCd-below-post'];
  set_theme_mod('adsCd-below-post',$adsBelowPost);
  echo "データを更新しました。";
}
?>
