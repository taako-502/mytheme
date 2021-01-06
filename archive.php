<?php get_header(); ?>
<section class="contents">
  <main class="l-main">
    <h1>記事一覧</h1>
    <?php
    $cat_id = get_query_var('cat');
    $cat = get_category($cat_id);
    if(isset($cat)){
      $cat_name = $cat->cat_name;
      $cat_link = get_category_link($cat->term_id);
      ?>
      <div class="p-category">
        <a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
      </div>
      <?php
    } ?>
    <div class="p-news--list">
      <?php
      /* 記事一覧 */
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          get_template_part('/template-parts/content','article');
        }
        the_posts_navigation();
      } else {
        echo "<p>まだ記事がありません。</p>";
      }
      ?>
    </div>
  </main>
  <?php get_sidebar(); ?>
</section>
<?php get_footer(); ?>
