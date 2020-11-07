<?php
  // image（画像）の指定のためにアイキャッチ画像の情報を取得します
  $thumbnail_id = get_post_thumbnail_id($post->ID); // アタッチメントIDの取得
  $image = wp_get_attachment_image_src( $thumbnail_id, 'full' ); // アイキャッチの情報を取得
  $src = isset($image) ? get_stylesheet_directory_uri() . '/images/thumbnail-default.jpg' : $image[0];    // URL
  $width = isset($image) ? 900 : $image[1];  // 横幅
  $height = isset($image) ? 450 : $image[2]; // 高さ
 ?>
<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "NewsArticle",
    "mainEntityOfPage":{
      "@type":"WebPage",
      "@id":"<?php the_permalink(); ?>"
    },
    "headline": "<?php echo get_the_title(); ?>",
    "image": {
      "@type": "ImageObject",
      "url": "<?php echo $src; ?>",
      "height": <?php echo $height; ?>,
      "width": <?php echo $width; ?>
    },
    "datePublished": "<?php echo get_the_date(DATE_ISO8601); ?>",
    "dateModified": "<?php if ( get_the_date() != get_the_modified_time() ){ the_modified_date(DATE_ISO8601); } else { echo get_the_date(DATE_ISO8601); } ?>",
    "author": {
      "@type": "Person",
      "name": "<?php the_author_meta('nickname'); ?>"
    },
    "publisher": {
      "@type": "Organization",
      "name": "<?php bloginfo('name'); ?>",
      "logo": {
        "@type": "ImageObject",
        "url": "<?php echo esc_url(get_template_directory_uri() . '/img/publisher-logo.png'); ?>",
        "width": 600,
        "height": 60
      }
    },
    "description": "<?php echo get_the_excerpt(); ?>"
  }
</script>
