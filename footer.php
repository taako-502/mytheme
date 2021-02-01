  <footer class="l-footer">
    <aside class="l-footer--widgets c-widgets">
      <div class="u-width-inner u-margin-center u-flex-wrap">
        <?php
        dynamic_sidebar('widget_footer001');
        dynamic_sidebar('widget_footer002');
        dynamic_sidebar('widget_footer003');
        ?>
      </div>
    </aside>
    <p class="l-footer--center"><?php echo get_theme_mod('footer_content_copyright',"Copyright © " .date('Y'). " " . get_bloginfo('name') . " Powered by MY THEME."); ?></p>
  </footer>
  <p class="c-top-scroll-btn"><a href="#"></a></p>
  <?php wp_footer(); ?>
</body>
</html>
