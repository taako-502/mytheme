/**
 * headerのjavascriptの設定
 */
( function() {
  jQuery('.l-hamburger').click( function() {
    alert('test'); /* デバッグ用 */
    jQuery(this).toggleClass('active');
    jQuery('.l-nav-menu').toggleClass('active');
  });
}() );
