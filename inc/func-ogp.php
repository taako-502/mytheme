<?php

function ogp_meta_box() {
	global $dp_options;

	add_meta_box(
		'ogp_meta_box', // ID of meta box
		__( 'OGPの個別設定', 'tcd-w' ), // label
		'show_ogp_meta_box', // callback function
		array( 'post', 'page', $dp_options['information_slug'], $dp_options['works_slug'] ), // post type
		'side', // context
		'default' // priority
	);
}
add_action( 'add_meta_boxes', 'ogp_meta_box' );

function show_ogp_meta_box( $post ) {
	global $post;

	echo '<input type="hidden" name="ogp_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

	// サイドコンテンツの設定
	$modal_cta = array(
		'name' => __( 'Modal CTA setting', 'tcd-w' ),
		'id' => 'modal_cta',
		'type' => 'radio',
		'std' => '',
		'options' => array(
			array(
				'name' => __( 'Use theme option setting', 'tcd-w' ),
				'value' => ''
			),
			array(
				'name' => __( 'Display Modal CTA', 'tcd-w' ),
				'value' => 'show'
			),
			array(
				'name' => __( 'Hide Modal CTA', 'tcd-w' ),
				'value' => 'hide'
			)
		)
	);
	$modal_cta_meta = $post->modal_cta ? $post->modal_cta : $modal_cta['std'];

	echo '<p>' . __( '記事ごとにOGPを設定', 'tcd-w' ) . '</p>' . "\n";

	foreach ( $modal_cta['options'] as $modal_cta_option ) {
		?><input type="text"><?php
	}
}
?>
