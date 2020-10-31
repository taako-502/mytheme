<?php
$copyright = get_option('copyright',"Copyright © " .date('Y'). " " . get_bloginfo('name') . " Powered by MY THEME.");
?>
  <footer class="l-footer">
    <p class="l-footer--center"><?php echo $copyright ?></p>
  </footer>
<?php wp_footer(); ?>
</body>
</html>
