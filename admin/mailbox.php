<?php
require_once( plugin_dir_path(__FILE__) . "../biz/MailClass.php");
$mc = new MailClass;
$results = $mc->selectMailboxAll();
?>
<main>
  <h2>メール受信箱</h2>
  <p>問い合わせフォームから送信されたメッセージを表示します。</p>
  <p>問い合わせフォームは、ショートコードとして<code>mailForm</code>を設置することで、表示することができます。</p>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>名前</th>
        <th>メーアドレス</th>
        <th>本文</th>
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
