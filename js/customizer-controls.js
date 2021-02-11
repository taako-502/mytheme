(function ($) {
	wp.customize.bind('ready', function () {
		/* 1カラムの時のみ、メインエリアの横幅を設定可能 */
		wp.customize('architect_layout_col', function (value) {
			value.bind(function (newval) {
				if(newval === "one-col" ){
					jQuery("#_customize-input-ctl_architect_col_one_width").prop('disabled', false);
				} else {
					jQuery("#_customize-input-ctl_architect_col_one_width").prop('disabled', true);
				}
			});
		});
	});
})(window.jQuery);
