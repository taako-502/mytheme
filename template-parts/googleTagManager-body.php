<?php
$ut = new \Mytheme_Theme\Utility;
$gtmId = get_theme_mod('gtm-id', '');
if($ut->isNullOrWhitespace(trim($gtmId))){
  return;
}
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $gtmId; ?>"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
