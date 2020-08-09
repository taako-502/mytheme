<?php get_header(); ?>
<section id="content">
  <div id="content-wrap" class="container">
    <div id="main" class="col-md-9" >
      <h1>記事一覧</h1>
      <hr>
      <div class="article-list">
        <?php
          /* 記事一覧左側 */
          if ( have_posts() ) {
            while ( have_posts() ) { the_post();
        ?>
        <div class="article-card">
          <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail('articlelist');
              }
              else {
                echo '<img width="288" height="162" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
              }
          ?>
          <h2>
            <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
        </div>
        <?php
            }
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
