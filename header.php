<?php global $page_title; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>mytheme</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/common.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/index.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/mythemecss.php" />
  <?php wp_enqueue_script('jquery'); ?>
  <?php wp_enqueue_script('bootstrap-js','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',array('jquery')); ?>
  <?php wp_head(); ?>
  <?php include ("template-parts/analyticsTracking.php"); ?>
  <!-- ここからOGP -->
  <meta property="og:type" content="blog">
  <?php
  if (is_single()){
    //単一記事ページの場合
    if(have_posts()): while(have_posts()): the_post();
      //抜粋を表示
      echo '<meta property="og:description" content="'.get_post_meta($post->ID, _aioseop_description, true).'">';echo "\n";
    endwhile; endif;
    //単一記事タイトルを表示
    echo '<meta property="og:title" content="'; the_title(); echo '">';echo "\n";
    //単一記事URLを表示
    echo '<meta property="og:url" content="'; the_permalink(); echo '">';echo "\n";
  } else {
    //単一記事ページページ以外の場合（アーカイブページやホームなど）
    //「一般設定」管理画面で指定したブログの説明文を表示
    echo '<meta property="og:description" content="'; bloginfo('description'); echo '">';echo "\n";
    //「一般設定」管理画面で指定したブログのタイトルを表示
    echo '<meta property="og:title" content="'; bloginfo('name'); echo '">';echo "\n";
    //「一般設定」管理画面で指定したブログのURLを表示
    echo '<meta property="og:url" content="'; bloginfo('url'); echo '">';echo "\n";
  }
  $str = $post->post_content;
  //投稿にイメージがあるか調べる
  $searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
  if (is_single()){
    //単一記事ページの場合
    if (has_post_thumbnail()){
      //投稿にサムネイルがある場合の処理
      $image_id = get_post_thumbnail_id();
      $image = wp_get_attachment_image_src( $image_id, 'full');
      echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
    } else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {
      //投稿にサムネイルは無いが画像がある場合の処理
      echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
    } else {
      //投稿にサムネイルも画像も無い場合の処理
      echo '<meta property="og:image" content="画像URL">';echo "\n";
    }
  } else {
    //単一記事ページページ以外の場合（アーカイブページやホームなど）
    echo '<meta property="og:image" content="画像URL">';echo "\n";
  }
  ?>
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="fb:admins" content="管理者ID">
  <meta property="fb:app_id" content="アプリID">
  <!-- ここまでOGP -->
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:0;background-color:<?php echo getCusNavBackColor() ?>!important">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a id="title" class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:<?php echo getCusNavLogoColor() ?>!important"><?php bloginfo( 'name' ); ?></a>
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
