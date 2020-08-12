<?php
/* 外部ファイル読み込み */
require '../utility.php';
/*cssファイル設定 */
header('Content-Type: text/css; charset=utf-8');
// wo-wp_optionsテーブルからデータを取得
$pfontsize = updaeteOptionPost('p-size',100);
$h1fontsize = updaeteOptionPost('h1-size',100);
$h2fontsize = updaeteOptionPost('h2-size',19);
$h3fontsize = updaeteOptionPost('h3-size',18);
$h4fontsize = updaeteOptionPost('h4-size',17);
?>
/* pc */
@media screen and (min-width: 961px) {
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
  /*ここにpc用スタイルを記述*/
}

/* tablet  */
@media only screen and (min-width: 641px) and (max-width: 960px) {
/*ここにtablet用スタイルを記述*/
}

/* smartPhone */
@media screen and (max-width: 640px) {
/*ここにスマホ用スタイルを記述*/
}
