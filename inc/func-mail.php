<?php
/**
 * ショートコードの登録
 * @var [type]
 */
add_shortcode( 'mailForm', 'salcodes_mailform' );
function mailform_init(){
  function salcodes_mailform() {
  	global $value;
  	global $error;
  	$post_obj = get_queried_object();

    $html = '
    <form action="' . get_permalink(get_queried_object()->ID) . '" method="post">
      <input type="text"></input>
    </form>';
    return $html;
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
?>
