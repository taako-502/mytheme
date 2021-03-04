<?php
require_once( plugin_dir_path(__FILE__) . "../class/MailClass.php");
$mc = new \Mytheme_Theme\MailClass;
$results = $mc->selectMailboxAll();
?>
<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/css/admin.css'); ?>">
<main>
  <h2>メール受信箱</h2>
  <p>問い合わせフォームから送信されたメッセージを表示します。</p>
  <p>問い合わせフォームは、ショートコードとして<code>[mailForm]</code>を設置することで、表示することができます。</p>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>名前</th>
        <th>メーアドレス</th>
        <th style="width: 300px">本文</th>
        <th>受信日時</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($results as $row) {
      ?>
      <tr>
        <td><?php echo $row->id; ?></td>
        <td><?php echo $row->name; ?></td>
        <td><?php echo $row->mail_address; ?></td>
        <td><?php echo $row->content; ?></td>
        <td><?php echo $row->sdatetime; ?></td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</main>
