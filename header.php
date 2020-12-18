<?php
//-wp_optionsテーブルから設定値を取得
$ogpFbAdminId = get_theme_mod('ogp-fb-adminid', '');
$ogpFbAppId = get_theme_mod('ogp-fb-appid', '');
$ogpFbImgArticle = get_theme_mod('ogp-fb-img-article', '');
$ogpFbImgTop = get_theme_mod('ogp-fb-img-top', '');
$analytics_code = get_theme_mod('analytics','');
$gtmId = get_theme_mod('gtm-id', '');
//メタディスクリプションの設定
$description = ut\getDescription($post->ID,220);
//ページ読み込み
global $page_title;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php if(!ut\isNullOrEmpty(trim($analytics_code))){ get_template_part('template-parts','analyticsTracking'); } ?>
  <?php if(!ut\isNullOrEmpty(trim($gtmId))){ get_template_part( 'template-parts/googleTagManager', 'head' ); } ?>
  <meta charset="utf-8">
  <meta name="description" content="<?php echo $description; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  get_template_part( 'template-parts/content', 'ogp' );
  wp_head();
  ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php if(!ut\isNullOrEmpty(trim($gtmId))){ get_template_part( 'template-parts/googleTagManager', 'body' ); } ?>
  <header class="l-header">
    <nav class="l-nav" style="margin-bottom:0;background-color:<?php echo getCusNavBackColor() ?>!important;color:<?php echo getCusNavTextColor() ?>!important;">
      <a class="l-nav-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
      <?php
      wp_nav_menu(array (
        'theme_location'=>'header-nav',
        'menu_class' => 'l-nav-menu' ,
        'container' => false,
        'add_li_class' => 'nav-item'
      ));
      ?>
    </nav>
    <div class="l-hamburger only-block-sp" aria-controls="primary-menu" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <?php if(strcmp($page_title , "home")){ the_header_image_tag("class=l-header__img"); } ?>
  </header>
