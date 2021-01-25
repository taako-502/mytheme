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
	register_sidebar(array(
		'id' => 'widget_footer001',
		'name' => 'フッター（左）',
		'description' => 'フッター（左）のウィジェット',
		'before_widget' => '<div class="l-footer--widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="l-footer--widgettitle">',
		'after_title'   => '</h4>',
	));
	register_sidebar(array(
		'id' => 'widget_footer002',
		'name' => 'フッター（中央）',
		'description' => 'フッター（中央）のウィジェット',
		'before_widget' => '<div class="l-footer--widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="l-footer--widgettitle">',
		'after_title'   => '</h4>',
	));
	register_sidebar(array(
		'id' => 'widget_footer003',
		'name' => 'フッター（右）',
		'description' => 'フッター（右）のウィジェット',
		'before_widget' => '<div class="l-footer--widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="l-footer--widgettitle">',
		'after_title'   => '</h4>',
	));
}
add_action( 'widgets_init' , 'mytheme_register_sidebars' );
?>
