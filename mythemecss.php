<?php
/**
* カスタマイザー用CSS (CSS)
 */
/* 外部ファイル読み込み */
require 'utility.php';
/*cssファイル設定 */
header('Content-Type: text/css; charset=utf-8');
// 管理画面で設定した
echo "test_test1";
echo $GLOBALS['psize'];
echo "test_test2";
$pfontsize = setNumData($GLOBALS['psize'],100);
$h1fontsize = setNumData($GLOBALS['h1size'],100);
$h2fontsize = setNumData($GLOBALS['h2size'],19);
$h3fontsize = setNumData($GLOBALS['h3size'],18);
$h4fontsize = setNumData($GLOBALS['h4size'],17);
?>
.entry-content p {
  font-size: <?php $pfontsize ?>px;
}

.entry-content h1 {
  font-size: <?php $h1fontsize ?>px;
}

.entry-content h2 {
  font-size: <?php $h2fontsize ?>px;
}

.entry-content h3 {
  font-size: <?php $h3fontsize ?>px;
}

.entry-content h4 {
  font-size: <?php $h4fontsize ?>px;
}
