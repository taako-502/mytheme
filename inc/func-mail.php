<?php
namespace Mytheme_Theme;

/**
 * ショートコードの登録
 */
add_shortcode( 'mailForm', '\Mytheme_Theme\salcodes_mailform' );
function mailform_init(){
  function salcodes_mailform() {
    //メール送信制御用のJavaScriptファイルを読み込み
    wp_enqueue_script('mail',get_template_directory_uri() . '/js/mail.js');
    //問い合わせフォームのHTML構成
    $post_obj = get_queried_object();
    global $value;
    return sprintf(
      '<form class="p-mailform" action="%1$s" method="post">
        <div class="p-maiilform--response" aria-hidden="true"></div>
        <div class="p-maiilform--err-msg c_errmsg" aria-hidden="true"></div>
        <dl>
          <dt>お名前</dt>
        	<dd>
            <div class="p-maiilform--name-err-msg c_errmsg" aria-hidden="true"></div>
            <input class="p-mailform--name" type="text" name="name" value="%2$s" />
        	</dd>
        	<dt>メールアドレス</dt>
        	<dd>
            <div class="p-maiilform--email-err-msg c_errmsg" aria-hidden="true"></div>
            <input class="p-mailform--email" type="email" name="email" value="%3$s" />
        	</dd>
        	<dt>お問合せ内容</dt>
        	<dd>
            <div class="p-maiilform--content-err-msg c_errmsg" aria-hidden="true"></div>
            <textarea class="p-mailform--content" name="content">%4$s</textarea>
        	</dd>
        </dl>
        <button class="p-mailform--submit" type="submit">送信する</button>
      </form>'
      ,get_permalink($post_obj->ID)
      ,isset($value['name'])? $value['name'] : ""
      ,isset($value['email'])? $value['email'] : ""
      ,isset($value['content'])? $value['content'] : ""
    );
  }
}
add_action('init', '\Mytheme_Theme\mailform_init');

/**
 * Ajaxを使用するための準備
 */
function add_my_ajaxurl() {
 ?>
     <script>
         var ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
     </script>
 <?php
}
add_action( 'wp_head', '\Mytheme_Theme\add_my_ajaxurl', 1 );

/**
 * メールを送信（ajax）
 */
function send_mail(){
  global $value, $error;
  $value = array( 'name' => '', 'email' => '', 'content' => '' );
  foreach ( $value as $key => $val ) {
    if ( isset( $_POST[$key] ) ) {
      $value[$key] = $_POST[$key];
    }
  }
  //インスタンスの作成
  $mc = new MailClass($value['name'],$value['email'],$value['content']);
  //入力チェック
  if($mc->validator($json)){
    //エラーの場合、処理終了
    echo json_encode( $json );
    wp_die();
  }
  //メールの送信
  $json = $mc->send();
  echo json_encode( $json );
  wp_die();
}
add_action( 'wp_ajax_send_mail', '\Mytheme_Theme\send_mail' );
add_action( 'wp_ajax_nopriv_send_mail', '\Mytheme_Theme\send_mail' );

/**
 * 管理メニューに追加
 */
function add_admin_mail(){
  add_menu_page(
    'メール確認画面',//タイトル
    'メールボックス',//メニュー名
    'manage_options',//権限
    'mailbox',//スラッグ
    '\Mytheme_Theme\add_custom_mailbox',//コールバック
    'dashicons-email',
    57);
}
add_action('admin_menu','\Mytheme_Theme\add_admin_mail');

/**
* メールボックスの読込
*/
function add_custom_mailbox(){
  // mytheme専用管理画面呼び出し
  if (locate_template('admin/admin.php') !== '') {
    require_once locate_template('admin/mailbox.php');
  }
}

/**
 * テーマ有効時にテーブル作成
 * @return [type] [description]
 */
function mailbox_create_table() {
  \Mytheme_Theme\MailClass::createTableMailbox();
  //バージョン情報を付加
  global $jal_db_version;
  $mailbox_db_version = '1.0';
  add_option( 'mailbox_db_version', $mailbox_db_version );
}
add_action('after_switch_theme','\Mytheme_Theme\mailbox_create_table');

?>
