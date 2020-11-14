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
<html amp <?php language_attributes(); ?>>
<head>
  <?php //if(!isNullOrEmpty(trim($analytics_code))){ get_template_part('template-parts','analyticsTracking'); } ?>
  <?php //if(!isNullOrEmpty(trim($gtmId))){ get_template_part( 'template-parts/googleTagManager', 'head' ); } ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
  <link rel="canonical" href="<?php echo esc_url(get_permalink()); ?>" >
  <style amp-custom>
    <?php include( __DIR__ ."/css/amp.css") ; ?>
  </style>
  <?php
  //wp_head();// ampでは使用不可
  get_template_part( 'template-parts/content', 'ogp' );
  get_template_part( 'template-parts/content', 'schema' );
  ?>
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
  <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
</head>
<body>
  <?php //if(!isNullOrEmpty(trim($gtmId))){ get_template_part( 'template-parts/googleTagManager', 'body' ); } ?>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:0;background-color:<?php echo getCusNavBackColor() ?>!important">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="l-title navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:<?php echo getCusNavLogoColor() ?>!important"><?php bloginfo( 'name' ); ?></a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php
      wp_nav_menu(array (
        'theme_location'=>'header-menu',
        'menu_class' => 'l-nav-menu' ,
        'container' => false,
        'add_li_class' => 'nav-item'
      ));
      ?>
    </div>
  </nav>
  <?php
  if(strcmp($page_title , "home")){
    //echo preg_replace('/<img (.*?) \/>/i', '<amp-img $1></amp-img>', get_header_image_tag("class=l-header__img"));
  }
  ?>
</header>
