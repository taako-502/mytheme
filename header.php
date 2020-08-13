<?php global $page_title; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="utf-8">
 <title>mytheme</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/common.css">
 <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/index.css">
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/mythemecss.php" />
 <?php wp_enqueue_script('jquery'); ?>
 <?php wp_enqueue_script('bootstrap-js','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',array('jquery')); ?>
 <?php wp_head(); ?>
 <?php include ("analyticstracking.php"); ?>
</head>
<body>
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:0;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a id="title" class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
    <div class="collapse navbar-collapse" id="navbarNav">
       <?php
       $args = array(
         'menu_class' => 'nav navbar-nav' ,
         'container' => false,
         'add_li_class' => 'nav-item'
       );
       wp_nav_menu($args);
      ?>
    </div>
  </nav>
  <?php
    if(strcmp($page_title , "home")){
  ?>
  <div id="top-vg">
    <img src="<?php echo get_template_directory_uri(); ?>/images/top.jpeg" alt="トップページ画像" >
  </div>
  <?php } ?>
</header>
