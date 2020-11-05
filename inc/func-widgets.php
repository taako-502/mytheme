<?php
add_action(
	'widgets_init',
	function(){
		register_sidebar(array(
			'id' => 'widget_sidebar001',
			'name' => 'サイドバー',
			'description' => 'サイドバーのウィジェット',
		));
	}
);
add_action( 'admin_print_scripts', 'my_admin_scripts' );
?>
