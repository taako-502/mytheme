<?php
function form_init() {
  if ( ! is_page( 'inquiry' ) ) {
    return;
  }

  if ( isset( $_POST['username'] ) ) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    $to = "admin@example.com";
    $subject = "お問合せがありました";
    $body = "お名前 : \n{$username}\n"
              . "メールアドレス : \n{$email}\n"
              . "お問合せ内容 : \n{$content}\n";
    $fromname = "My Test Site";
    $from = "XXXXXX@gmail.com";
    $headers = "From: {$fromname} <{$from}>\r\n";
    wp_mail( $to, $subject, $body , $headers) ;
  }
}
add_action( 'template_redirect', 'form_init' );
?>
