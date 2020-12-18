<?php
/**
 * メールに関するクラス
 * 主に、受信したメールをデータベースから出し入れする処理に使用する
 */
class MailClass {
  // プロパティの宣言
  //require_once ( dirname(__FILE__) . "/wp-load.php");
  //global $wpdb;

  /**
   * wp_mailboxからメッセージの一覧を取得する
   */
  public function createTableMailbox(){
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
  public function selectMailboxAll(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'mailbox';
    $query = "SELECT * FROM " . $table_name;
    return $results = $wpdb->get_results($query);
  }

  /**
   * wp_mailboxに受信したメッセージを保存する
   * @return [type] [description]
   */
  public function insertMailbox($name,$mailaddress,$content) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'mailbox';
    $rows = $wpdb->insert(
      $table_name,
      array(
        'name' => $name,
        'mail_address' => $mailaddress,
        'content' => $content,
      )
    );
  }
}
?>
