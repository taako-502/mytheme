<?php
/**
 * 管理画面（admin.php）初期処理
 * @package mytheme
 */

//wp_optionsテーブルから設定値を取得
$pc_psize = get_theme_mod('pc-p-size','');
$pc_h1size = get_theme_mod('pc-h1-size','');
$pc_h2size = get_theme_mod('pc-h2-size','');
$pc_h3size = get_theme_mod('pc-h3-size','');
$pc_h4size = get_theme_mod('pc-h4-size','');
$copyright = get_theme_mod('copyright',"Copyright © " .date('Y'). " " . get_bloginfo('name') . " Powered by MY THEME.");
$analytics = get_theme_mod('analytics','');
$recoleftimg = get_theme_mod('reco-left-img','');
$recolefturl = get_theme_mod('reco-left-url','');
$recocenterimg = get_theme_mod('reco-center-img','');
$recocenterurl = get_theme_mod('reco-center-url','');
$recorightimg = get_theme_mod('reco-right-img','');
$recorighturl = get_theme_mod('reco-right-url','');
//saveボタンを押したときの処理
if(isset($_POST['save'])) {
  //admin.php画面からpostされたデータを更新
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
  $copyright = $_POST['copyright'];
  set_theme_mod('copyright',$copyright);
  $analytics = $_POST['analytics'];
  set_theme_mod('analytics',$analytics);
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
  echo "データを更新しました。";
}
?>
