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
    <?php
    $footer_content_copyright = Mytheme::get_setting_without_default('footer_content_copyright');
    $footer_content_copyright = str_replace('[#year]',date('Y'),$footer_content_copyright);
    $footer_content_copyright = str_replace('[#title]','<a href='.home_url().'>'.get_bloginfo('name').'</a>',$footer_content_copyright);
    ?>
    <p class="l-footer--center"><?php echo $footer_content_copyright; ?></p>
  </footer>
  <p class="c-top-scroll-btn"><a href="#"></a></p>
  <?php wp_footer(); ?>
</body>
</html>
