<?php
require_once( plugin_dir_path(__FILE__) . "../biz/MailClass.php");

/**
 * ショートコードの登録
 */
add_shortcode( 'mailForm', 'salcodes_mailform' );
function mailform_init(){
  function salcodes_mailform() {
    //エラー文字列セット
    global $error;
    if(isset($error['username'])){
      $err_username = empty( $error['username'] ) ? '<p>' . $error['username'] .'</p>' : '';
    }
    if(isset($error['email'])){
      $err_email = empty( $error['email'] ) ? '<p>' . $error['email'] .'</p>' : '';
    }
    if(isset($error['content'])){
      $err_content = empty( $error['content'] ) ? '<p>' . $error['content'] .'</p>' : '';
    }
    //メール送信制御用のJavaScriptファイルを読み込み
    wp_enqueue_script('mail',get_template_directory_uri() . '/js/mail.js');
    //問い合わせフォームのHTML構成
    $post_obj = get_queried_object();
    global $value;
    return sprintf(
      '<form class="p-mailform" action="%1$s" method="post">
        %2$s
        <dl>
          <dt>お名前</dt>
        	<dd>
            %3$s
            <input class="p-mailform--name" type="text" name="username" value="%4$s" />
        	</dd>
        	<dt>メールアドレス</dt>
        	<dd>
            %5$s
            <input class="p-mailform--email" type="email" name="email" value="%6$s" />
        	</dd>
        	<dt>お問合せ内容</dt>
        	<dd>
            %7$s
            <textarea class="p-mailform--contact" name="content">%8$s</textarea>
        	</dd>
        </dl>
        <button class="p-mailform--submit" type="submit">送信する</button>
      </form>
      <div class="p-maiilform--response" aria-hidden="true"></div>'
      ,get_permalink($post_obj->ID)
      ,wp_nonce_field( 'my-form', 'myform_nonce' , true , false )
      ,isset($err_username)? $err_username: ""
      ,isset($value['username'])? $value['username'] : ""
      ,isset($err_email)? $err_email: ""
      ,isset($value['email'])? $value['email'] : ""
      ,isset($err_content)? $err_content: ""
      ,isset($value['content'])? $value['content'] : ""
    );
  }
}
add_action('init', 'mailform_init');

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
add_action( 'wp_head', 'add_my_ajaxurl', 1 );

/**
 * 送信ボタン押下時の処理
 * @return [type] [description]
 */
function send_mail() {

  global $value, $error;
  $value = array( 'username' => '', 'email' => '', 'content' => '' );
  $error = array();

  if ( ! isset( $_POST['myform_nonce'] ) ) {
    wp_die( '入力した情報は送信できません' );
    return;
  }

  if ( ! wp_verify_nonce( $_POST['myform_nonce'], 'my-form') ) {
    wp_die( '不正な遷移です' );
    return;
  }

  foreach ( $value as $key => $val ) {
    if ( isset( $_POST[$key] ) ) {
      $value[$key] = $_POST[$key];
    }

    if ( $value[$key] === "" ) {
      $error[$key] = '必須項目です';
    } else if ( $key == "email" && ! is_email( $value[$key] ) ) {
      $error[$key] = 'メールアドレスの形式が間違っています';
    }
  }

  if ( empty( $error ) ) {
    $to = get_option('admin_email');
    $subject = "お問合せがありました";
    $body = "お名前 : \n{$value['username']}\n"
              . "メールアドレス : \n{$value['email']}\n"
              . "お問合せ内容 : \n{$value['content']}\n";
    $fromname = "My Test Site";
    $from = "sendonly@example.com";
    $headers = "From: {$fromname} <{$from}>" . "\r\n";
    //メールの内容をデータベースに登録
    $mc = new MailClass;
    $mc->insertMailbox($value['username'],$value['email'],$value['content']);
    //メール送信
    if(MAIL_TEST_FLG){
      //テストフラグがtrueなら、trueを返す
      $res = true;
    } else {
      $res = wp_mail( $to, $subject, $body , $headers );
    }
    if ( $res ) {
      wp_die( "メールを送信しました。");
    } else {
      wp_die("メールの送信に失敗しました。");
    }
  }
}
add_action( 'wp_ajax_send_mail', 'send_mail' );
add_action( 'wp_ajax_nopriv_send_mail', 'send_mail' );

/**
 * 管理メニューに追加
 */
function add_admin_mail(){
  add_menu_page(
    'メール確認画面',//タイトル
    'メールボックス',//メニュー名
    'manage_options',//権限
    'mailbox',//スラッグ
    'add_custom_mailbox',//
    'dashicons-email',
    57);
}
add_action('admin_menu','add_admin_mail');

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
  $mc = new MailClass;
  $mc->createTableMailbox();
  //バージョン情報を付加
  global $jal_db_version;
  $mailbox_db_version = '1.0';
  add_option( 'mailbox_db_version', $mailbox_db_version );
}
add_action('after_switch_theme','mailbox_create_table');

?>
