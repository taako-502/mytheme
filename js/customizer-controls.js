/**
 * カスタマイザーの可視性制御
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
jQuery(document).ready(function($) {
	(function ($) {
		wp.customize.bind('ready', function () {
			/* 1カラムの時のみ、メインエリアの横幅を設定可能 */
			wp.customize('front_architect_col', function (value) {
				value.bind(function (newval) {
					if(newval === "one-col" ){
						jQuery("#_customize-input-ctl_architect_col_one_width").prop('disabled', false);
					} else {
						jQuery("#_customize-input-ctl_architect_col_one_width").prop('disabled', true);
					}
				});
			});
			/* おすすめ記事選択時のみ表示 */
			wp.customize('front_slider_type', function (value) {
				value.bind(function (newval) {
					if(newval != "recommend" ){
						jQuery("#customize-control-ctl_front_slider_url_1").css('display', 'none');
						jQuery("#customize-control-ctl_front_slider_url_2").css('display', 'none');
						jQuery("#customize-control-ctl_front_slider_url_3").css('display', 'none');
						jQuery("#customize-control-ctl_front_slider_url_4").css('display', 'none');
						jQuery("#customize-control-ctl_front_slider_url_5").css('display', 'none');
						jQuery("#customize-control-ctl_front_slider_url_6").css('display', 'none');
						jQuery("#customize-control-ctl_front_slider_url_7").css('display', 'none');
						jQuery("#customize-control-ctl_front_slider_url_8").css('display', 'none');
						jQuery("#customize-control-ctl_front_slider_url_9").css('display', 'none');
						jQuery("#customize-control-ctl_front_slider_url_10").css('display', 'none');
					} else {
						jQuery("#customize-control-ctl_front_slider_url_1").css('display', 'block');
						jQuery("#customize-control-ctl_front_slider_url_2").css('display', 'block');
						jQuery("#customize-control-ctl_front_slider_url_3").css('display', 'block');
						jQuery("#customize-control-ctl_front_slider_url_4").css('display', 'block');
						jQuery("#customize-control-ctl_front_slider_url_5").css('display', 'block');
						jQuery("#customize-control-ctl_front_slider_url_6").css('display', 'block');
						jQuery("#customize-control-ctl_front_slider_url_7").css('display', 'block');
						jQuery("#customize-control-ctl_front_slider_url_8").css('display', 'block');
						jQuery("#customize-control-ctl_front_slider_url_9").css('display', 'block');
						jQuery("#customize-control-ctl_front_slider_url_10").css('display', 'block');
					}
				});
			});
		});
	})(jQuery);
});
