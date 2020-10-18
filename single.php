<?php get_header(); ?>
<section id="content">
  <div id="content-wrap" class="container">
    <div class="row">
      <div id="main" class="col-md-9 entry-content" >
        <?php
          // パンくずリスト
          breadcrumb();
          $category_name = get_the_category()[0]->cat_name;
          $category_link = get_category_link(get_the_category()[0]->cat_ID);
          echo "<div class=\"category\"><a href=\"$category_link\">".$category_name."</a></div>";
          // サムネイル
          the_post_thumbnail('single');
          // 本文
        ?>
          <div id="main-text">
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
        </div>
      </div>
      <div id="sidebar" class="col-md-3">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
