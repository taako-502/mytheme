/**
 * カスタマイザーの可視性制御
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
jQuery(document).ready(function($) {
	(function ($) {
		wp.customize.bind('ready', function () {

			/**
			 *メインエリアの横幅を変更する項目の可視性制御
			 * @param  {[type]} val [description]
			 * @return {[type]}     [description]
			 */
			function oneColWithVisible(val){
				if(val === "one-col" ){
					jQuery("#_customize-input-ctl_architect_col_one_width").prop('disabled', false);
				} else {
					jQuery("#_customize-input-ctl_architect_col_one_width").prop('disabled', true);
				}
			}
			/* 1カラムの時のみ、メインエリアの横幅を設定可能 */
			wp.customize('front_architect_col', function (value) {
				oneColWithVisible(value.get());
				value.bind(function (newval) {
					oneColWithVisible(newval);
				});
			});

			/**
			 * スライダーの可視性制御
			 * @param  {[type]} newval [description]
			 * @return {[type]}        [description]
			 */
			function sliderTypeVisible(val){
				if(val != "recommend" ){
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
			}
			/* おすすめ記事選択時のみ表示 */
			wp.customize('front_slider_type', function (value) {
				sliderTypeVisible(value.get());
				value.bind(function (newval) {
					sliderTypeVisible(newval);
				});
			});
		});
	})(jQuery);
});
