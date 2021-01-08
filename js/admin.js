/**
 * 管理画面の表示制御
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
jQuery(document).ready(function($) {
  (function($) {
    // タブの制御
    jQuery('.p-tab--headline li').click(function() {
      jQuery('.p-tab--content li').hide();
      jQuery('.p-tab--headline li').removeClass('current');
      $(this).addClass('current');
      index = $(".p-tab--headline li").index(this) + 1;
      jQuery('.p-tab--content li:nth-child(' + index + ')').removeClass('current');
      jQuery('.p-tab--content li:nth-child(' + index + ')').fadeIn();
      jQuery('.p-tab--content li:nth-child(' + index + ')').addClass('current');
    });

    // 関連記事プルダウン
    jQuery(".relevance--select").change(function() {
    	var val = jQuery(".relevance--select").val();
    	if(val == "url") {
        jQuery('.relevance__url-set').removeClass('u-display__none');
    	} else {
        jQuery('.relevance__url-set').addClass('u-display__none');
    	}
    });
  })(jQuery);
});
