<?php
/**
 * カスタマイザー用CSS (CSS)
 */
 header('Content-Type: text/css; charset=utf-8');
//  include_once( 'config.php' ); //必要？

$pfontsize = ( isset($GLOBALS['stdata302']) && trim($GLOBALS['stdata302']) !== '' ) ? (int)$GLOBALS['stdata302'] : 30 ;
?>
p {
  font-size: 100px;
}



.post .entry-content h6 {
    <?php if( isset($GLOBALS['stdata301']) && trim($GLOBALS['stdata301']) !== '' ): ?>
        font-size: <?php echo $st_sp_p_fontsize; ?>px;
    <?php endif; ?>
    <?php if ( isset($GLOBALS['stdata302']) && trim($GLOBALS['stdata302']) !== '' ): ?>
        line-height: <?php echo $st_sp_p_lineheight; ?>px;
    <?php endif; ?>
}
