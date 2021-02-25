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
			 * おすすめスライダーの可視性制御
			 * @param  {[type]} newval [description]
			 * @return {[type]}        [description]
			 */
			function sliderTypeVisible(val){
				if(val !== "recommend" ){
					jQuery("#customize-control-ctl_front_slider_url_1").addClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_2").addClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_3").addClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_4").addClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_5").addClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_6").addClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_7").addClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_8").addClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_9").addClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_10").addClass('u-display__none');
				} else {
					jQuery("#customize-control-ctl_front_slider_url_1").removeClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_2").removeClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_3").removeClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_4").removeClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_5").removeClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_6").removeClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_7").removeClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_8").removeClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_9").removeClass('u-display__none');
					jQuery("#customize-control-ctl_front_slider_url_10").removeClass('u-display__none');
				}
			}
			/* おすすめ記事選択時のみ表示 */
			wp.customize('front_slider_type', function (value) {
				sliderTypeVisible(value.get());
				value.bind(function (newval) {
					sliderTypeVisible(newval);
				});
			});

		 	/**
			 * おすすめスライダーの可視性制御
			 * @param  {[type]} newval [description]
			 * @return {[type]}        [description]
			 */
		  function sliderAooNumberVisible(val) {
				if(jQuery("#customize-control-ctl_front_slider_url_1").hasClass('u-display__none')){
					return;
				}
				for (var i = 1; i <= 10; i++) {
					jQuery("#customize-control-ctl_front_slider_url_" + i).removeClass('u-display__none');
				}
				for (var i = 10; i > val; i--) {
					jQuery("#customize-control-ctl_front_slider_url_" + i).addClass('u-display__none');
				}
			}
			/* おすすめ記事選択時のみ表示 */
			wp.customize('front_slider_all_number', function (value) {
				sliderAooNumberVisible(value.get());
				value.bind(function (newval) {
					sliderAooNumberVisible(newval);
				});
			});
		});
	})(jQuery);
});
