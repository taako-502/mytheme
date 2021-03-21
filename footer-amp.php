<?php
//コピーライトに表示するテキストの修正
$footer_content_copyright = Mytheme::get_setting_without_default('footer_content_copyright');
$footer_content_copyright = str_replace('[#year]',date('Y'),$footer_content_copyright);
$footer_content_copyright = str_replace('[#title]','<a href='.home_url().'>'.get_bloginfo('name').'</a>',$footer_content_copyright);
?>
  <footer class="l-footer">
    <p class="l-footer--center"><?php echo $footer_content_copyright; ?></p>
  </footer>
<?php wp_footer(); ?>
</body>
</html>
