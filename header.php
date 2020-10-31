<?php
get_template_part('utility/utility');
//-wp_optionsテーブルから設定値を取得
$ogpFbAdminId = get_theme_mod('ogp-fb-adminid', '');
$ogpFbAppId = get_theme_mod('ogp-fb-appid', '');
$ogpFbImgArticle = get_theme_mod('ogp-fb-img-article', '');
$ogpFbImgTop = get_theme_mod('ogp-fb-img-top', '');
$analytics_code = get_theme_mod('analytics','');
$gtmId = get_theme_mod('gtm-id', '');
//ページ読み込み
global $page_title;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <?php if(!isNullOrEmpty(trim($analytics_code))){ include ("template-parts/analyticsTracking.php"); } ?>
  <?php if(!isNullOrEmpty(trim($gtmId))){ get_template_part( 'template-parts/googleTagManager', 'head' ); } ?>
  <meta charset="utf-8">
  <title><?php bloginfo('name'); wp_title('|', true, 'left'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/common.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/scss/app.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/mythemecss.php" />
  <?php
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap-js','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',array('jquery'));
  wp_head();
  get_template_part( 'template-parts/content', 'ogp' );
  get_template_part( 'template-parts/content', 'schema' );
  ?>
</head>
<body>
  <?php if(!isNullOrEmpty(trim($gtmId))){ get_template_part( 'template-parts/googleTagManager', 'body' ); } ?>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:0;background-color:<?php echo getCusNavBackColor() ?>!important">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="l-title navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:<?php echo getCusNavLogoColor() ?>!important"><?php bloginfo( 'name' ); ?></a>
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
