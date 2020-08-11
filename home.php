<?php get_header('top'); ?>
<div class="topimage"></div>
<section id="content">
  <div id="content-wrap" class="container">
    <div class="col-md-12">
      <h2>おすすめ記事</h2>
      <div class="recommend-article col-md-12">
        <div class="recommend-left">
          <a href="http://test.local/length-test/"><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt="hoge"></a>
        </div>
        <div class="recommend-center">
          <a href="http://test.local/hello-world/"><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt="fuga"></a>
        </div>
        <div class="recommend-right">
          <a href="http://test.local/hoge/"><img src="<?php echo get_template_directory_uri(); ?>/images/thumbnail-default.jpg" alt="piyo"></a>
        </div>
      </div>
    </div>
    <div id="main" class="col-md-9">
      <h2>新着記事</h2>
      <div class="article-list-one-column col-md-12">
        <?php
          /* 記事一覧 */
          if ( have_posts() ) {
            while ( have_posts() ) { the_post();
              include(get_template_directory() ."/articlecard.php");
            }
          } else {
            echo "<p>まだ記事がありません。</p>";
          }
        ?>
      </div>
    </div>
    <div id="sidebar" class="col-md-3">
      <?php get_sidebar(); ?>
    </div>
  </div>
</section>
<?php wp_footer(); ?>
