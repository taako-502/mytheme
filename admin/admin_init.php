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
$pc_h5size = get_theme_mod('pc-h5-size','');
$pc_h6size = get_theme_mod('pc-h6-size','');
$tb_psize = get_theme_mod('tb-p-size','');
$tb_h1size = get_theme_mod('tb-h1-size','');
$tb_h2size = get_theme_mod('tb-h2-size','');
$tb_h3size = get_theme_mod('tb-h3-size','');
$tb_h4size = get_theme_mod('tb-h4-size','');
$tb_h5size = get_theme_mod('tb-h5-size','');
$tb_h6size = get_theme_mod('tb-h6-size','');
$sm_psize = get_theme_mod('sm-p-size','');
$sm_h1size = get_theme_mod('sm-h1-size','');
$sm_h2size = get_theme_mod('sm-h2-size','');
$sm_h3size = get_theme_mod('sm-h3-size','');
$sm_h4size = get_theme_mod('sm-h4-size','');
$sm_h5size = get_theme_mod('sm-h5-size','');
$sm_h6size = get_theme_mod('sm-h6-size','');
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
  //admin.php画面からpostされたデータで、データベースと画面設定値を更新
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