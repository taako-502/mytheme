<?php
/**
 * タグマネージャ（headタグ用）
 */
$gtmId = \Mytheme::get_setting_admin('gtm_id');
if(\Mytheme_Theme\Utility::isNullOrWhitespace(trim($gtmId))){
  return;
}
?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo $gtmId; ?>');</script>
<!-- End Google Tag Manager -->
