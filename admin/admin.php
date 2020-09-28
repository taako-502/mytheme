<?php
//初期処理
include "admin_init.php";
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/admin.css">
<div class="main">
  <h1>mythemeカスタマイズ画面</h1>
  <h2>画面説明</h2>
  <p>この画面は、簡単にmythemeのデザインを設定できる画面です。</p>
  <h2>基本構成</h2>
  <form method="post">
    <div class="setting">
      <h3>PC閲覧時（980px～）</h3>
      <p class="fontsize"><b>pタグ&ensp;&emsp;</b><input type="number" name="pc-p-size" value="<?php echo $pc_psize; ?>" placeholder="<?php echo $pc_psize_def; ?>"> px</p>
      <p class="fontsize"><b>h1タグ&emsp;</b><input type="number" name="pc-h1-size" value="<?php echo $pc_h1size; ?>" placeholder="<?php echo $pc_h1size_def; ?>"> px</p>
      <p class="fontsize"><b>h2タグ&emsp;</b><input type="number" name="pc-h2-size" value="<?php echo $pc_h2size; ?>" placeholder="<?php echo $pc_h2size_def; ?>"> px</p>
      <p class="fontsize"><b>h3タグ&emsp;</b><input type="number" name="pc-h3-size" value="<?php echo $pc_h3size; ?>" placeholder="<?php echo $pc_h3size_def; ?>"> px</p>
      <p class="fontsize"><b>h4タグ&emsp;</b><input type="number" name="pc-h4-size" value="<?php echo $pc_h4size; ?>" placeholder="<?php echo $pc_h4size_def; ?>"> px</p>
      <p class="fontsize"><b>h5タグ&emsp;</b><input type="number" name="pc-h5-size" value="<?php echo $pc_h5size; ?>" placeholder="<?php echo $pc_h5size_def; ?>"> px</p>
      <p class="fontsize"><b>h6タグ&emsp;</b><input type="number" name="pc-h6-size" value="<?php echo $pc_h6size; ?>" placeholder="<?php echo $pc_h6size_def; ?>"> px</p>
    </div>
    <div class="setting">
      <h3>タブレット閲覧時（768px～979px）</h3>
      <p class="fontsize"><b>pタグ&ensp;&emsp;</b><input type="number" name="tb-p-size" value="<?php echo $tb_psize; ?>" placeholder="<?php echo $tb_psize_def; ?>"> px</p>
      <p class="fontsize"><b>h1タグ&emsp;</b><input type="number" name="tb-h1-size" value="<?php echo $tb_h1size; ?>" placeholder="<?php echo $tb_h1size_def; ?>"> px</p>
      <p class="fontsize"><b>h2タグ&emsp;</b><input type="number" name="tb-h2-size" value="<?php echo $tb_h2size; ?>" placeholder="<?php echo $tb_h2size_def; ?>"> px</p>
      <p class="fontsize"><b>h3タグ&emsp;</b><input type="number" name="tb-h3-size" value="<?php echo $tb_h3size; ?>" placeholder="<?php echo $tb_h3size_def; ?>"> px</p>
      <p class="fontsize"><b>h4タグ&emsp;</b><input type="number" name="tb-h4-size" value="<?php echo $tb_h4size; ?>" placeholder="<?php echo $tb_h4size_def; ?>"> px</p>
      <p class="fontsize"><b>h5タグ&emsp;</b><input type="number" name="tb-h5-size" value="<?php echo $tb_h5size; ?>" placeholder="<?php echo $tb_h5size_def; ?>"> px</p>
      <p class="fontsize"><b>h6タグ&emsp;</b><input type="number" name="tb-h6-size" value="<?php echo $tb_h6size; ?>" placeholder="<?php echo $tb_h6size_def; ?>"> px</p>
    </div>
    <div class="setting">
      <h3>スマートフォン閲覧時(~768px)</h3>
      <p class="fontsize"><b>pタグ&ensp;&emsp;</b><input type="number" name="sm-p-size" value="<?php echo $sm_psize; ?>" placeholder="<?php echo $sm_psize_def; ?>"> px</p>
      <p class="fontsize"><b>h1タグ&emsp;</b><input type="number" name="sm-h1-size" value="<?php echo $sm_h1size; ?>" placeholder="<?php echo $sm_h1size_def; ?>"> px</p>
      <p class="fontsize"><b>h2タグ&emsp;</b><input type="number" name="sm-h2-size" value="<?php echo $sm_h2size; ?>" placeholder="<?php echo $sm_h2size_def; ?>"> px</p>
      <p class="fontsize"><b>h3タグ&emsp;</b><input type="number" name="sm-h3-size" value="<?php echo $sm_h3size; ?>" placeholder="<?php echo $sm_h3size_def; ?>"> px</p>
      <p class="fontsize"><b>h4タグ&emsp;</b><input type="number" name="sm-h4-size" value="<?php echo $sm_h4size; ?>" placeholder="<?php echo $sm_h4size_def; ?>"> px</p>
      <p class="fontsize"><b>h5タグ&emsp;</b><input type="number" name="sm-h5-size" value="<?php echo $sm_h5size; ?>" placeholder="<?php echo $sm_h5size_def; ?>"> px</p>
      <p class="fontsize"><b>h6タグ&emsp;</b><input type="number" name="sm-h6-size" value="<?php echo $sm_h6size; ?>" placeholder="<?php echo $sm_h6size_def; ?>"> px</p>
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
