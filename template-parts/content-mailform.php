<form action="<?php the_permalink(); ?>" method="post">

  <dl>
      <dt>お名前</dt>
      <dd><input type="text" name="username" /></dd>
      <dt>メールアドレス</dt>
      <dd><input type="email" name="email" /></dd>
      <dt>お問合せ内容</dt>
      <dd><textarea name="content"></textarea></dd>
  </dl>

  <button type="submit">送信する</button>

</form>
