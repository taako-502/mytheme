<?php
function mytheme_register_sidebars(){
	register_sidebar(array(
		'id' => 'widget_sidebar001',
		'name' => 'サイドバー',
		'description' => 'サイドバーのウィジェット',
		'before_widget' => '<div class="l-sidebar--widget">', //ウィジェットを囲う開始タグ
		'after_widget'  => '</div>', //ウィジェットを囲う終了タグ
		'before_title'  => '<h4 class="l-sidebar--widgettitle">', //タイトルを囲う開始タグ
		'after_title'   => '</h4>', //タイトルを囲う終了タグ
	));
add_action( 'widgets_init' , 'mytheme_register_sidebars' );
?>
