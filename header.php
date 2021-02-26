<?php
//-wp_optionsテーブルから設定値を取得
$ogpFbAdminId = get_theme_mod('ogp-fb-adminid', '');
$ogpFbAppId = get_theme_mod('ogp-fb-appid', '');
$ogpFbImgArticle = get_theme_mod('ogp-fb-img-article', '');
$ogpFbImgTop = get_theme_mod('ogp-fb-img-top', '');
//メタディスクリプションの設定
if(isset($post->ID)){
  $description = ut\getMetaDescription($post->ID, 220);
}
//ページ読み込み
global $page_title;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php
  get_template_part( 'template-parts/analyticsTracking' );
  get_template_part( 'template-parts/googleTagManager', 'head' );
  ?>
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
  <?php  get_template_part( 'template-parts/googleTagManager', 'body' ); ?>
  <header class="l-header">
    <div class="l-header--inner">
      <div class="l-header--mobile">
        <a class="l-header--description" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'description' ); ?></a>
        <?php
        the_custom_logo();
        if (!has_custom_logo()) {
          ?>
          <a class="l-header--logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
        <?php } ?>
        <div class="l-header--toggle">
          <div>
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
      <nav class="l-nav">
        <?php
        wp_nav_menu(array (
          'theme_location'=>'header-nav',
          'menu_class' => 'l-nav-menu' ,
          'container' => false,
          'add_li_class' => 'nav-item'
        ));
        ?>
      </nav>
    </div>
    <div class="l-fixed-header">
      <a class="l-fixed-header--logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
      <nav class="l-nav">
        <?php
        wp_nav_menu(array (
          'theme_location'=>'header-nav',
          'menu_class' => 'l-nav-menu' ,
          'container' => false,
          'add_li_class' => 'nav-item'
        ));
        ?>
      </nav>
    </div>
    <div class="l-overlay"></div>
  </header>
  <?php
  if(strcmp($page_title , "home")){ the_header_image_tag("class=l-header--img"); }
  get_template_part('template-parts/content','slider-header');
  ?>
