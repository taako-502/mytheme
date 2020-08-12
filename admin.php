<?php
/* 外部ファイル読み込み */
require get_template_directory() . '/utility.php';
//wp_optionsテーブルから設定値を取得
$psize = get_option('p-size','');
$h1size = get_option('h1-size','');
$h2size = get_option('h2-size','');
$h3size = get_option('h3-size','');
$h4size = get_option('h4-size','');
$copyright = get_option('copyright',"Copyright © " .date('Y'). " " . get_bloginfo('name') . " Powered by MY THEME.");
$analytics = get_option('analytics','');
$recoleftimg = get_option('reco-left-img','');
$recolefturl = get_option('reco-left-url','');
$recocenterimg = get_option('reco-center-img','');
$recocenterurl = get_option('reco-center-url','');
$recorightimg = get_option('reco-right-img','');
$recorighturl = get_option('reco-right-url','');
//saveボタンを押したときの処理
if(isset($_POST['save'])) {
  //admin.php画面からpostされたデータを更新
  $psize = updaeteOptionPost('p-size',$_POST['p-size']);
  $h1size = updaeteOptionPost('h1-size',$_POST['h1-size']);
  $h2size = updaeteOptionPost('h2-size',$_POST['h2-size']);
  $h3size = updaeteOptionPost('h3-size',$_POST['h3-size']);
  $h4size = updaeteOptionPost('h4-size',$_POST['h4-size']);
  $copyright = updaeteOptionPost('copyright',$_POST['copyright']);
  $analytics = updaeteOptionPost('analytics',$_POST['analytics']);
  $recoleftimg = updaeteOptionPost('reco-left-img',$_POST['reco-left-img']);
  $recolefturl = updaeteOptionPost('reco-left-url',$_POST['reco-left-url']);
  $recocenterimg = updaeteOptionPost('reco-center-img',$_POST['reco-center-img']);
  $recocenterurl = updaeteOptionPost('reco-center-url',$_POST['reco-center-url']);
  $recorightimg = updaeteOptionPost('reco-right-img',$_POST['reco-right-img']);
  $recorighturl = updaeteOptionPost('reco-right-url',$_POST['reco-right-url']);
  echo "データを更新しました。";
}
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/admin.css">
<div class="main">
  <h1>mythemeカスタマイズ画面</h1>
  <h2>画面説明</h2>
  <p>この画面は、簡単にmythemeのデザインを設定できる画面です。</p>
  <h2>基本構成</h2>
  <form method="post">
    <div class="setting">
      <p class="fontsize"><b>pタグ&ensp;&emsp;</b><input type="number" name="p-size" value="<?php echo $psize; ?>"> px</p>
      <p class="fontsize"><b>h1タグ&emsp;</b><input type="number" name="h1-size" value="<?php echo $h1size; ?>"> px</p>
      <p class="fontsize"><b>h2タグ&emsp;</b><input type="number" name="h2-size" value="<?php echo $h2size; ?>"> px</p>
      <p class="fontsize"><b>h3タグ&emsp;</b><input type="number" name="h3-size" value="<?php echo $h3size; ?>"> px</p>
      <p class="fontsize"><b>h4タグ&emsp;</b><input type="number" name="h4-size" value="<?php echo $h4size; ?>"> px</p>
    </div>
    <div class="setting">
      <h2>トップ</h2>
      <div>
        <h3>トップページのおすすめ記事に設定する画像</h3>
        <p><b>左おすすめ記事</b></p>
        <p><label for="reco-left-img">画像URL：</label><?php generate_upload_image_tag('reco-left-img', $recoleftimg); ?></p>
        <p><label for="reco-left-url">記事URL：</label><input type="text" name="reco-left-url" value="<?php echo $recolefturl; ?>"></p>
        <p><b>中央おすすめ記事</b></p>
        <p><label for="reco-center-img">画像URL：</label><?php generate_upload_image_tag('reco-center-img', get_option('reco-center-img')); ?></p>
        <p><label for="reco-center-url">記事URL：</label><input type="text" name="reco-center-url" value="<?php echo $recolefturl; ?>"></p>
        <p><b>右おすすめ記事</b></p>
        <p><label for="reco-right-img">画像URL：</label><?php generate_upload_image_tag('reco-right-img', get_option('reco-right-img')); ?></p>
        <p><label for="reco-right-url">記事URL：</label><input type="text" name="reco-right-url" value="<?php echo $recorighturl; ?>"></p>
      </div>
    </div>
    <div class="setting">
      <h2>フッター</h2>
      <div>
        <p><label for="copyright">Copyright<br>
        </label><textarea id="copyright" name="copyright" cols="40"><?php echo $copyright; ?></textarea>
      </P>
      </div>
      <div class="setting">
        <h2>アナリティクス</h2>
        <label for="analytics">トラッキングコード：</label><input id="analytics" type="text" name="analytics" value="<?php echo $analytics ?>">
      </div>
      <p><input type="submit" name="save" value="<?php echo esc_attr( __('save','default')); ?>" class="button button-primary"></p>
    </div>
  </form>
</div>
