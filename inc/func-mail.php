<?php
/**
 * ショートコードの登録
 * @var [type]
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
    //問い合わせフォームのHTML構成
    $post_obj = get_queried_object();
    global $value;
    return sprintf(
      '<form action="%1$s" method="post">
        %2$s
        <dl>
          <dt>お名前</dt>
        	<dd>
            %3$s
            <input type="text" name="username" value="%4$s" />
        	</dd>
        	<dt>メールアドレス</dt>
        	<dd>
            %5$s
            <input type="email" name="email" value="%6$s" />
        	</dd>
        	<dt>お問合せ内容</dt>
        	<dd>
            %7$s
            <textarea name="content">%8$s</textarea>
        	</dd>
        </dl>
        <button type="submit">送信する</button>
      </form>'
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
 * 送信ボタン押下時の処理
 * @return [type] [description]
 */
function form_init() {
  if ( ! is_page( 'contact' ) ) {
    return;
  }

  global $value, $error;
  $value = array( 'username' => '', 'email' => '', 'content' => '' );
  $error = array();

  if ( isset( $_POST['myform_nonce'] ) ) {
    if ( ! wp_verify_nonce( $_POST['myform_nonce'], 'my-form') ) {
      wp_die( '不正な遷移です' );
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
      $res = wp_mail( $to, $subject, $body , $headers );
      if ( $res ) {
        wp_safe_redirect( get_page_link( get_page_by_path( 'inquiry/thanks' )->ID ) );
      }
    }
  }
}
add_action( 'template_redirect', 'form_init' );

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
 * テーブル作成
 * @return [type] [description]
 */
function mailbox_create_table() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'mailbox';
  //すでにテーブルが存在する場合は、終了
  if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
    return;
  }

  $charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    name tinytext NOT NULL,
    text text NOT NULL,
    url varchar(55) DEFAULT '' NOT NULL,
    UNIQUE KEY id (id)
  ) $charset_collate;";
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  //dbDeltaメソッドは、制約が多いため気をつけること（詳細はcodex参照）
  dbDelta( $sql );

  //バージョン情報を付加するとのちに便利になる
  global $jal_db_version;
  $jal_db_version = '1.0';
  add_option( 'jal_db_version', $jal_db_version );
}
add_action('after_switch_theme','mailbox_create_table');

/**
 * 未検証ソース
 * @return [type] [description]
 */
function mailbox_data() {
  global $wpdb;

  $welcome_name = 'Wordpress さん';
  $welcome_text = 'おめでとうございます、インストールに成功しました！';

  $table_name = $wpdb->prefix . 'mailbox';

  $wpdb->insert(
    $table_name,
    array(
      'time' => current_time( 'mysql' ),
      'name' => $welcome_name,
      'text' => $welcome_text,
    )
  );
}
?>
