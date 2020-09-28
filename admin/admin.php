<?php
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
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/admin.css">
<div class="main">
  <h1>mythemeカスタマイズ画面</h1>
  <h2>画面説明</h2>
  <p>この画面は、簡単にmythemeのデザインを設定できる画面です。</p>
  <h2>基本構成</h2>
  <form method="post">
    <div class="setting">
      <p class="fontsize"><b>pタグ&ensp;&emsp;</b><input type="number" name="pc-p-size" value="<?php echo $pc_psize; ?>"> px</p>
      <p class="fontsize"><b>h1タグ&emsp;</b><input type="number" name="pc-h1-size" value="<?php echo $pc_h1size; ?>"> px</p>
      <p class="fontsize"><b>h2タグ&emsp;</b><input type="number" name="pc-h2-size" value="<?php echo $pc_h2size; ?>"> px</p>
      <p class="fontsize"><b>h3タグ&emsp;</b><input type="number" name="pc-h3-size" value="<?php echo $pc_h3size; ?>"> px</p>
      <p class="fontsize"><b>h4タグ&emsp;</b><input type="number" name="pc-h4-size" value="<?php echo $pc_h4size; ?>"> px</p>
    </div>
    <div class="setting">
      <h2>トップ</h2>
      <div>
        <h3>トップページのおすすめ記事に設定する画像</h3>
        <p><b>左おすすめ記事</b></p>
        <p><label for="reco-left-img">画像URL：</label><?php generate_upload_image_tag('reco-left-img', $recoleftimg); ?></p>
        <p><label for="reco-left-url">記事URL：</label><input type="text" name="reco-left-url" value="<?php echo $recolefturl; ?>"></p>
        <p><b>中央おすすめ記事</b></p>
        <p><label for="reco-center-img">画像URL：</label><?php generate_upload_image_tag('reco-center-img', $recocenterimg); ?></p>
        <p><label for="reco-center-url">記事URL：</label><input type="text" name="reco-center-url" value="<?php echo $recocenterurl; ?>"></p>
        <p><b>右おすすめ記事</b></p>
        <p><label for="reco-right-img">画像URL：</label><?php generate_upload_image_tag('reco-right-img', $recorightimg); ?></p>
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
