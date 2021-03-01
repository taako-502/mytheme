<?php
$ut = new \Mytheme_Theme\Utility;
$analytics_code = get_theme_mod('analytics','');
if($ut->isNullOrWhitespace(trim($analytics_code))){
  return;
}
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $analytics_code; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo $analytics_code; ?>');
</script>
