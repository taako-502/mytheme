<?php
/**
 * 管理画面やカスタマイザーで設定したデザインを適用
 */
/* 外部ファイル読み込み */
// CSSファイルからの相対パスで wp-load.php の読み込みを指定
include_once(dirname( __FILE__ ) . '/../../../../wp-load.php');
require get_template_directory() . '/utility.php';
/*cssファイル設定 */
header('Content-Type: text/css; charset=utf-8');
// wp_optionsテーブルからデータを取得
$pfontsize = get_theme_mod('p-size','16');
$h1fontsize = get_theme_mod('h1-size','28');
$h2fontsize = get_theme_mod('h2-size','20');
$h3fontsize = get_theme_mod('h3-size','18');
$h4fontsize = get_theme_mod('h4-size','17');
?>

/* 文字サイズ */
section p { font-size: <?php echo $pfontsize; ?>px!important; }
section h1 { font-size: <?php echo $h1fontsize; ?>px!important; }
section h2 { font-size: <?php echo $h2fontsize; ?>px!important; }
section h3 { font-size: <?php echo $h3fontsize; ?>px!important; }
section h4 { font-size: <?php echo $h4fontsize; ?>px!important; }

/* ナビゲーションバー */
/* メニュー色設定 */
a.nav-link {
  color: <?php echo getCusNavMenuColor(); ?>!important;
}
button.navbar-toggler{
  border-color: <?php echo getCusNavMenuColor(); ?>!important;
}
