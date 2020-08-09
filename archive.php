<?php get_header(); ?>
<section id="content">
<div id="content-wrap" class="container">
<div id="main" class="col-md-9" >
  <h1>記事一覧</h1>
  <hr>
  <?php
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
  ?>
    <h2>
      <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <hr>
  <?php
      endwhile;
    endif;
  ?>
</div>
<div id="sidebar" class="col-md-3">
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php wp_footer(); ?>
