<section class="contents">
  <div class="l-main">
    <?php
    // パンくずリスト
    echo breadcrumb();
    $category_name = get_the_category()[0]->cat_name;
    $category_link = get_category_link(get_the_category()[0]->cat_ID);
    echo "<div class=\"category\"><a href=\"$category_link\">".$category_name."</a></div><br>";
    // サムネイル
    the_post_thumbnail('single');
    // 本文
    ?>
    <article class="p-article">
      <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
        ?>
        <h1><?php the_title();?></h1>
        <section>
          <?php the_content(); ?>
        </section>
        <?php
        endwhile;
      endif;
    ?>
    </article>
    <?php
    //関連記事
    get_template_part( 'template-parts/content', 'related' );
    ?>
  </div>
  <?php get_sidebar(); ?>
</section>
