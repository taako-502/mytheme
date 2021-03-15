<?php
namespace Mytheme_Theme;

/**
 * メールにに関する処理をまとめたクラス
 * 主に、受信したメールをデータベースから出し入れする処理に使用する
 */
class MailClass {
  // プロパティの宣言
  //require_once ( dirname(__FILE__) . "/wp-load.php");
  //global $wpdb;
  private $name = "";
  private $email = "";
  private $content = "";

  /**
   * コンストラクタ
   * @param string $name    名前
   * @param string $email   メールアドレス
   * @param string $content 本文
   */
  public function __construct( $name, $email, $content) {
    $this->name = $name;
    $this->email = $email;
    $this->content = $content;
  }

  /**
   * wp_mailboxからメッセージの一覧を取得する
   */
  public static function createTableMailbox(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'mailbox';
    //すでにテーブルが存在する場合は、終了
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
      return;
    }
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
      id mediumint(6) NOT NULL AUTO_INCREMENT,
      name text NOT NULL,
      mail_address text NOT NULL,
      content text,
      sdatetime datetime DEFAULT CURRENT_TIMESTAMP,
      UNIQUE KEY id (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    //dbDeltaメソッドは、制約が多いため気をつけること（詳細はcodex参照）
    dbDelta( $sql );
  }

  /**
   * wp_mailboxを全件取得
   * @return OBJECT 結果をインデックス配列として出力。要素は行オブジェクト。
   */
  public static function selectMailboxAll(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'mailbox';
    $query = "SELECT * FROM " . $table_name;
    return $results = $wpdb->get_results($query);
  }

  /**
   * 入力チェック
   * @param  json    $json メッセージ
   * @return boolean       実行結果
   */
  public function validator(&$json){
   $error = false;
    //必須項目チェック
    if(Utility::isNullOrWhitespace($this->name)){
      $json['name'] = array(
        'msg' => '必須項目です',
        'res' => '-1'
      );
      $error = true;
      $test = 'a';
    }
    if(Utility::isNullOrWhitespace($this->email)){
      $json['email'] = array(
        'msg' => '必須項目です',
        'res' => '-1'
      );
      $error = true;
    }
    if(Utility::isNullOrWhitespace($this->content)){
      $json['content'] = array(
        'msg' => '必須項目です',
        'res' => '-1'
      );
      $error = true;
    }
    //メールアドレスの形式チェック
    if(!is_email($this->email)){
      $json['email'] = array(
        'msg' => 'メールアドレスの形式が間違っています',
        'res' => '-1'
      );
      $error = true;
    }
    //メッセージの編集
    if($error){
      $json['result'] = array(
        'msg' => '入力誤りがあります',
        'res' => '-1'
      );
    }
    return $error;
  }

  /**
   * メールの送信処理
   * @return json   $json    実行結果
   */
  public function send() {
    $to = get_option('admin_email');
    $subject = "お問合せがありました";
    $body = "お名前 : \n".$this->name."\n"
              . "メールアドレス : \n".$this->email."\n"
              . "お問合せ内容 : \n".$this->content."\n";
    $from = ! Utility::isNullOrWhitespace($this->email) ? $this->email : "";
    $headers = "From: ".get_bloginfo('name')." <".$from.">" . "\r\n";
    //メールの内容をデータベースに登録
    $this->insertMailbox();
    //メール送信
    if(MAIL_TEST_FLG){
      //テストフラグがtrueなら、trueを返す
      $res = true;
    } else {
      $res = wp_mail( $to, $subject, $body , $headers );
    }
    if ( $res ) {
      $json['result'] = array(
        'msg' => 'メールを送信しました。',
        'res' => '0'
      );
    } else {
      $json['result'] = array(
        'msg' => 'メールの送信に失敗しました。',
        'res' => '-1'
      );
    }
    return $json;
  }

  /**
   * wp_mailboxに受信したメッセージを保存する
   */
  private function insertMailbox() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'mailbox';
    $rows = $wpdb->insert(
      $table_name,
      array(
        'name'         => $this->name,
        'mail_address' => $this->email,
        'content'      => $this->content,
      )
    );
  }
}
?>
