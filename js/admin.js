/**
 * 管理画面の表示制御
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
jQuery(document).ready(function($) {
  (function($) {
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
