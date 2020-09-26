<?php
/* 外部ファイル読み込み */
// CSSファイルからの相対パスで wp-load.php の読み込みを指定
include_once(dirname( __FILE__ ) . '/../../../../wp-load.php');
require get_template_directory() . '/utility.php';
/*cssファイル設定 */
header('Content-Type: text/css; charset=utf-8');
// wp_optionsテーブルからデータを取得
$pfontsize = get_theme_mod('p-size','100');
$h1fontsize = get_theme_mod('h1-size','100');
$h2fontsize = get_theme_mod('h2-size','19');
$h3fontsize = get_theme_mod('h3-size','18');
$h4fontsize = get_theme_mod('h4-size','17');
?>

/* ナビゲーションバー */
/* メニュー色設定 */
a.nav-link {
  color: <?php echo getCusNavMenuColor(); ?>!important;
}
button.navbar-toggler{
  border-color: <?php echo getCusNavMenuColor(); ?>!important;
}
