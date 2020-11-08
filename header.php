<?php
wp_head();
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
<html <?php language_attributes(); ?>
<head>
  <?php if(!isNullOrEmpty(trim($analytics_code))){ get_template_part('template-parts','analyticsTracking'); } ?>
  <?php if(!isNullOrEmpty(trim($gtmId))){ get_template_part( 'template-parts/googleTagManager', 'head' ); } ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri() . '/css/app.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri() . '/css/customcss.php'); ?>" />
  <?php
  get_template_part( 'template-parts/content', 'ogp' );
  get_template_part( 'template-parts/content', 'schema' );
  ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php if(!isNullOrEmpty(trim($gtmId))){ get_template_part( 'template-parts/googleTagManager', 'body' ); } ?>
  <header>
    <nav class="l-nav" style="margin-bottom:0;background-color:<?php echo getCusNavBackColor() ?>!important">
      <a class="l-nav-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:<?php echo getCusNavLogoColor() ?>!important"><?php bloginfo( 'name' ); ?></a>
      <div class="l-nav-menu">
        <?php
        $args = array (
          'menu_class' => 'nav navbar-nav' ,
          'container' => false,
          'add_li_class' => 'nav-item'
        );
        wp_nav_menu($args);
        ?>
      </div>
      <div class="l-hamburger only-block-sp" aria-controls="primary-menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>
    <?php if(strcmp($page_title , "home")){ the_header_image_tag("class=l-header__img"); } ?>
  </header>
