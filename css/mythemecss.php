<?php
/**
 * 管理画面やカスタマイザーで設定したデザインを適用
 */
/* 外部ファイル読み込み */
// CSSファイルからの相対パスで wp-load.php の読み込みを指定
include_once(dirname( __FILE__ ) . '/../../../../wp-load.php');
get_template_part('admin/admin','init');
get_template_part('utility/utility');
/*cssファイル設定 */
header('Content-Type: text/css; charset=utf-8');
?>

/* 文字サイズ（PC） */
section p { font-size: <?php echo getValOrDef($pc_psize,$pc_psize_def); ?>px!important; }
section h1 { font-size: <?php echo getValOrDef($pc_h1size,$pc_h1size_def); ?>px!important; }
section h2 { font-size: <?php echo getValOrDef($pc_h2size,$pc_h2size_def); ?>px!important; }
section h3 { font-size: <?php echo getValOrDef($pc_h3size,$pc_h3size_def); ?>px!important; }
section h4 { font-size: <?php echo getValOrDef($pc_h4size,$pc_h4size_def); ?>px!important; }
section h5 { font-size: <?php echo getValOrDef($pc_h5size,$pc_h5size_def); ?>px!important; }
section h6 { font-size: <?php echo getValOrDef($pc_h6size,$pc_h6size_def); ?>px!important; }

/* 文字サイズ（タブレット） */
@media screen and (max-width:980px) {
  section p { font-size: <?php echo getValOrDef($tb_psize,$tb_psize_def); ?>px!important; }
  section h1 { font-size: <?php echo getValOrDef($tb_h1size,$tb_h1size_def); ?>px!important; }
  section h2 { font-size: <?php echo getValOrDef($tb_h2size,$tb_h2size_def); ?>px!important; }
  section h3 { font-size: <?php echo getValOrDef($tb_h3size,$tb_h3size_def); ?>px!important; }
  section h4 { font-size: <?php echo getValOrDef($tb_h4size,$tb_h4size_def); ?>px!important; }
  section h5 { font-size: <?php echo getValOrDef($tb_h5size,$tb_h5size_def); ?>px!important; }
  section h6 { font-size: <?php echo getValOrDef($tb_h6size,$tb_h6size_def); ?>px!important; }
}

/* 文字サイズ（スマートフォン） */
@media (max-width:768px) {
  section p { font-size: <?php echo getValOrDef($sm_psize,$sm_psize_def); ?>px!important; }
  section h1 { font-size: <?php echo getValOrDef($sm_h1size,$sm_h1size_def); ?>px!important; }
  section h2 { font-size: <?php echo getValOrDef($sm_h2size,$sm_h2size_def); ?>px!important; }
  section h3 { font-size: <?php echo getValOrDef($sm_h3size,$sm_h3size_def); ?>px!important; }
  section h4 { font-size: <?php echo getValOrDef($sm_h4size,$sm_h4size_def); ?>px!important; }
  section h5 { font-size: <?php echo getValOrDef($sm_h5size,$sm_h5size_def); ?>px!important; }
  section h6 { font-size: <?php echo getValOrDef($sm_h6size,$sm_h6size_def); ?>px!important; }
}

/* ナビゲーションバー */
/* メニュー色設定 */
a.nav-link {
  color: <?php echo getCusNavMenuColor(); ?>!important;
}
button.navbar-toggler{
  border-color: <?php echo getCusNavMenuColor(); ?>!important;
}
