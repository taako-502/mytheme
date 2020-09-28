<?php
/**
 * 管理画面やカスタマイザーで設定したデザインを適用
 */
/* 外部ファイル読み込み */
// CSSファイルからの相対パスで wp-load.php の読み込みを指定
include_once(dirname( __FILE__ ) . '/../../../../wp-load.php');
include get_template_directory() . '/admin/admin_init.php';
require get_template_directory() . '/utility.php';
/*cssファイル設定 */
header('Content-Type: text/css; charset=utf-8');
?>

/* 文字サイズ（PC） */
section p { font-size: <?php echo $pc_psize; ?>px!important; }
section h1 { font-size: <?php echo $pc_h1size; ?>px!important; }
section h2 { font-size: <?php echo $pc_h2size; ?>px!important; }
section h3 { font-size: <?php echo $pc_h3size; ?>px!important; }
section h4 { font-size: <?php echo $pc_h4size; ?>px!important; }
section h5 { font-size: <?php echo $pc_h5size; ?>px!important; }
section h6 { font-size: <?php echo $pc_h6size; ?>px!important; }

/* 文字サイズ（タブレット） */
@media screen and (max-width:980px) {
  section p { font-size: <?php echo $tb_psize; ?>px!important; }
  section h1 { font-size: <?php echo $tb_h1size; ?>px!important; }
  section h2 { font-size: <?php echo $tb_h2size; ?>px!important; }
  section h3 { font-size: <?php echo $tb_h3size; ?>px!important; }
  section h4 { font-size: <?php echo $tb_h4size; ?>px!important; }
  section h5 { font-size: <?php echo $tb_h5size; ?>px!important; }
  section h6 { font-size: <?php echo $tb_h6size; ?>px!important; }
}

/* 文字サイズ（スマートフォン） */
@media (max-width:768px) {
  section p { font-size: <?php echo $sm_psize; ?>px!important; }
  section h1 { font-size: <?php echo $sm_h1size; ?>px!important; }
  section h2 { font-size: <?php echo $sm_h2size; ?>px!important; }
  section h3 { font-size: <?php echo $sm_h3size; ?>px!important; }
  section h4 { font-size: <?php echo $sm_h4size; ?>px!important; }
  section h5 { font-size: <?php echo $sm_h5size; ?>px!important; }
  section h6 { font-size: <?php echo $sm_h6size; ?>px!important; }
}

/* ナビゲーションバー */
/* メニュー色設定 */
a.nav-link {
  color: <?php echo getCusNavMenuColor(); ?>!important;
}
button.navbar-toggler{
  border-color: <?php echo getCusNavMenuColor(); ?>!important;
}
