<?php
/**
 * 画像アップロード用のタグを出力する
 * @param  [type] $name  [description]
 * @param  [type] $value [description]
 * @return [type]        [description]
 */
function generate_upload_image_tag($name, $value){
?>
  <input name="<?php echo $name; ?>" type="text" value="<?php echo $value; ?>" />
  <input type="button" name="<?php echo $name; ?>_slect" value="選択" />
  <input type="button" name="<?php echo $name; ?>_clear" value="クリア" />
  <div id="<?php echo $name; ?>_thumbnail" class="uploded-thumbnail">
    <?php if ($value): ?>
      <img src="<?php echo $value; ?>" alt="選択中の画像">
    <?php endif ?>
  </div>
  <script type="text/javascript">
  (function ($) {
    var custom_uploader;
    $("input:button[name=<?php echo $name; ?>_slect]").click(function(e) {
      e.preventDefault();
      if (custom_uploader) {
        custom_uploader.open();
        return;
      }
      custom_uploader = wp.media({
        title: "画像を選択してください",
        /* ライブラリの一覧は画像のみにする */
        library: {
          type: "image"
        },
        button: {
          text: "画像の選択"
        },
        /* 選択できる画像は 1 つだけにする */
        multiple: false
      });
      custom_uploader.on("select", function() {
        var images = custom_uploader.state().get("selection");
        /* file の中に選択された画像の各種情報が入っている */
        images.each(function(file){
          /* テキストフォームと表示されたサムネイル画像があればクリア */
          $("input:text[name=<?php echo $name; ?>]").val("");
          $("#<?php echo $name; ?>_thumbnail").empty();
          /* テキストフォームに画像の URL を表示 */
          $("input:text[name=<?php echo $name; ?>]").val(file.attributes.sizes.full.url);
          /* プレビュー用に選択されたサムネイル画像を表示 */
          $("#<?php echo $name; ?>_thumbnail").append('<img src="'+file.attributes.sizes.full.url+'" />');
        });
      });
      custom_uploader.open();
    });
    /* クリアボタンを押した時の処理 */
    $("input:button[name=<?php echo $name; ?>_clear]").click(function() {
      $("input:text[name=<?php echo $name; ?>]").val("");
      $("#<?php echo $name; ?>_thumbnail").empty();
    });
  })(jQuery);
</script>
<?php
 }
/**
 * メディアアップローダー読み込み
 * @return [type] [description]
 */
function my_admin_scripts() {
  //メディアアップローダの javascript API
  wp_enqueue_media();
}
add_action( 'admin_print_scripts' , 'my_admin_scripts' );

// 記事の冒頭に表示するアイキャッチ画像
add_image_size('single',800,450,false);
add_image_size('articlelist',288,162,false);
 ?>
