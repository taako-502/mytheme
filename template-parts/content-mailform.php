<?php
	global $value;
	global $error;
?>

<form action="<?php the_permalink(); ?>" method="post">

<?php wp_nonce_field( 'my-form', 'myform_nonce' ) ?>

<dl>
  <dt>お名前</dt>
	<dd>
		<?php if ( ! empty( $error['username'] ) ): ?><p><?php echo $error['username']; ?></p><?php endif; ?>
		<input type="text" name="username" value="<?php echo $value['username']; ?>" />
	</dd>
	<dt>メールアドレス</dt>
	<dd>
		<?php if ( ! empty( $error['email'] ) ): ?><p><?php echo $error['email']; ?></p><?php endif; ?>
		<input type="email" name="email" value="<?php echo $value['email']; ?>" />
	</dd>
	<dt>お問合せ内容</dt>
	<dd>
	<?php if ( ! empty( $error['content'] ) ): ?><p><?php echo $error['content']; ?></p><?php endif; ?>
		<textarea name="content"><?php echo $value['content']; ?></textarea>
	</dd>
</dl>

<button type="submit">送信する</button>

</form>
