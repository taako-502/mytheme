<?php get_header(); ?>
<section id="content">
  <div id="content-wrap" class="container">
    <div id="main" class="col-md-9" >
      <h1>記事一覧</h1>
      <hr>
      <div class="article-list">
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
