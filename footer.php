<?php
$copyright = get_option('copyright',"Copyright © " .date('Y'). " " . get_bloginfo('name') . " Powered by MY THEME.");
?>
  <footer>
    <div class="container">
      <p class="text-center"><?php echo $copyright ?></p>
    </div>
  </footer>
<?php wp_footer(); ?>
</body>
</html>
