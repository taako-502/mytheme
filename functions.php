<?php
/**
* テーマのセットアップメソッド
*/
function mytheme_setup(){
  // アイキャッチ画像をON
  add_theme_support('post-thumbnails');
  // メニュー機能をON
  add_theme_support('menus');
}

/**
* 管理メニューに管理画面追加
*/
function add_admin(){
  add_menu_page(
    'mythemeの簡単設定',
    'mytheme設定',
    'manage_options',
    'mytheme-admin',
    'add_custom_admin',
    'dashicons-store',
    59);
}

/**
 * 追加管理画面の実装
 */
function add_custom_admin(){
  // mytheme専用管理画面呼び出し
  if (locate_template('/admin.php') !== '') {
    require_once locate_template('/admin.php');
  }
}

/**
* ダッシュボードにウィジェット追加
*/
function add_widget(){
  wp_add_dashboard_widget(
    'custom_widget',
    'テーマ設定',
    'add_custom_widget');
}

/**
* 追加ウィジェットの実装
*/
function add_custom_widget(){
  echo '<div class="custom_widget"><p>Hello World</p></div>';
}

/**
 * 画像アップロード用のタグを出力する
 * @param  [type] $name  [description]
 * @param  [type] $value [description]
 * @return [type]        [description]
 */
function generate_upload_image_tag($name, $value){?>
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

//メニューの<li>からID除去
function setMenuId( $id ){
    return $id = array();
}

//メニューの<li>からクラス除去
function setMenuClass( $classes, $item, $args) {
  $classes = array();
  if(isset($args->add_li_class)) {
      $classes[] = $args->add_li_class;
  }
  return $classes;}

// フック処理
add_action('after_setup_theme','mytheme_setup');
add_action('wp_dashboard_setup','add_widget');
add_action('admin_menu','add_admin');
add_action(
	'widgets_init',
	function(){
		register_sidebar(array(
			'id' => 'widget_sidebar001',
			'name' => 'サイドバー',
			'description' => 'サイドバーのウィジェット',
		));
	}
);
add_action( 'admin_print_scripts', 'my_admin_scripts' );
// アーカイブの余計なタイトルを削除
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_month() ) {
        $title = single_month_title( '', false );
    }
    return $title;
});
add_filter('nav_menu_item_id', 'setMenuId', 10);
add_filter('nav_menu_css_class', 'setMenuClass', 1, 3 );
// 記事の冒頭に表示するアイキャッチ画像
add_image_size('single',800,450,false);
add_image_size('articlelist',288,162,false);
?>
