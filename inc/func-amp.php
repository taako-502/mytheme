<?php
//記事詳細テンプレートをAMP専用テンプレートに切り替える処理
function change_amp_template($single_template){
    $change_template = $single_template;
    if(isset($_GET['amp']) && $_GET['amp'] == 1){
        $amp_template = locate_template('amp.php');
        if(!empty($amp_template)){
            $change_template = $amp_template;
        }

        add_filter( 'the_content', 'the_content_filter', 12 );
        function the_content_filter( $content ) {
        // ここにAMP用の投稿記事の処理

            return $content;
        }
    }
    return $change_template;
}
add_filter('single_template', 'change_amp_template');
?>
