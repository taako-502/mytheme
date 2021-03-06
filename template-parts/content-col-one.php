<?php
/**
 * 1カラム記事
 */
?>
<section class="contents">
  <main class="l-main u-width-col-1">
    <?php
    // パンくずリスト
    $sc = New \Mytheme_Theme\SchemaClass;
    echo $sc->getBreadcrumb();
    if(is_single()) {
      // カテゴリー表示
      $category_name = get_the_category()[0]->cat_name;
      $category_link = get_category_link(get_the_category()[0]->cat_ID);
      echo "<div class=\"p-category\"><a href=\"$category_link\">".$category_name."</a></div><br>";
    }
    ?>
    <article class="p-article">
      <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          ?>
          <h1><?php the_title();?></h1>
          <?php the_post_thumbnail(); ?>
          <section id="post-<?php the_ID(); ?>" <?php post_class("p-section"); ?>>
            <?php

            the_content();
            wp_link_pages('before=<div class="pagination">&after=</div>');
            if(has_tag()){
              ?><i class="fas fa-tags p-tags--icon"></i><?php
              the_tags("<span class=\"p-tags--tag\">","</span><span class=\"p-tags--tag\">","</span>");
            }
            if( is_singular('post') ) {
              //アドセンスコードがある場合、アドセンス広告を表示
              $adsBelowPost = get_theme_mod('adsCd-below-post','');
              echo stripslashes($adsBelowPost);
              //コメント
              comments_template();
            }
            ?>
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
  </main>
</section>
