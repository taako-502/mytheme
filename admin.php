<?php
/* 外部ファイル読み込み */
//include(“dbutil.php”);
require get_template_directory() . '/dbutil.php';
//wp_optionsテーブルから設定値を取得
$psize = get_option('p-size','');
$h2size = get_option('h2-size','10');
$h3size = get_option('h3-size','10');
$h4size = get_option('h4-size','10');

//ボタンを押したときの処理
if(isset($_POST['save'])) {
  //admin.php画面からpostされたデータを更新
  $psize = updaeteOptionPost('p-size',$_POST['p-size']);
  $h2size = updaeteOptionPost('h2-size',$_POST['h2-size']);
  $h3size = updaeteOptionPost('h3-size',$_POST['h3-size']);
  $h4size = updaeteOptionPost('h4-size',$_POST['h4-size']);
  echo "データを更新しました。";
}

 ?>
<div class="main">
  <h1>mythemeカスタマイズ画面</h1>
  <h2>画面説明</h2>
  <p>この画面は、簡単にmythemeのデザインを設定できる画面です。</p>
  <h2>基本構成</h2>
  <form method="post">
  <div style="display:table;">
    <div style="display:table-row;">
      <div style="display:table-cell;"><b>pタグ</b><input type="number" name="p-size" value="<?php echo $psize; ?>"> px</div>
      </div>
    <div style="display:table-row;">
      <div style="display:table-cell"><b>h2タグ</b><input type="number" name="h2-size" value="<?php echo $h2size; ?>"> px</div>
    </div>
    <div style="display:table-row;">
      <div style="display:table-cell"><b>h3タグ</b><input type="number" name="h3-size" value="<?php echo $h3size; ?>"> px</div>
    </div>
    <div style="display:table-row;">
      <div style="display:table-cell"><b>h4タグ</b><input type="number" name="h4-size" value="<?php echo $h4size; ?>"> px</div>
    </div>
  </div>
  <p>

      <input type="submit" name="save" value="<?php echo esc_attr( __('save','default')); ?>" class="button button-primary">
    </form>
  </p>
</div>
