<?php get_header(); ?>
<section id="content">
<div id="content-wrap" class="container">
<div id="main" class="col-md-9 entry-content" >
  <?php the_post_thumbnail('single'); ?>
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
<div id="sidebar" class="col-md-3">
<?php get_sidebar(); ?>
</div>
</div>
</section>
<?php wp_footer(); ?>
