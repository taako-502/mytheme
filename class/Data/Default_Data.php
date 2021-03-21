<?php
namespace Mytheme_Theme\Data;

trait Default_Data {

	public static function get_default_settings() {
		//紺碧色（こんぺき色）
		$azure = '#007BBB';
		$dark_gray = '#333';
		$blue_agate = '#3E9FD2';
		$bleu_acide = '#006EB0';
		$white = '#FFF';

		return array(
			/* 管理画面 */
			'pc_p_size'                 => '17',
			'pc_h1_size'                => '25',
			'pc_h2_size'                => '24',
			'pc_h3_size'                => '19',
			'pc_h4_size'                => '18',
			'pc_h5_size'                => '18',
			'pc_h6_size'                => '18',
			'tb_p_size'                 => '17',
			'tb_h1_size'                => '25',
			'tb_h2_size'                => '24',
			'tb_h3_size'                => '19',
			'tb_h4_size'                => '18',
			'tb_h5_size'                => '18',
			'tb_h6_size'                => '18',
			'sm_p_size'                 => '17',
			'sm_h1_size'                => '25',
			'sm_h2_size'                => '24',
			'sm_h3_size'                => '19',
			'sm_h4_size'                => '18',
			'sm_h5_size'                => '18',
			'sm_h6_size'                => '18',
			'header_bg_color'           => $dark_gray,
			'nav_txt_color'             => $white,
			'bg_color'                  => $white,
			'relevance_select'          => 'category',

			/* カスタマイザー */
			/* 全体構成 */
			'architect_text_link_hover_color' => $azure,
			'architect_text_color'            => $dark_gray,
			'architect_text_link_color'       => '#04C',

			/* ヘッダー */
			'header_layout_titile_align'      => 'left',
			'header_layout_nav_align'         => 'right',
			'header_text_color'               => '#FFF',
			'header_text_hover_color'         => $blue_agate,
			'header_text_logo_fontsize'       => '28',
			'header_text_description_fontsize'    => '13',
			'header_text_description_margin_top'  => '28',
			'header_text_title_margin_top'    => '25',
			'header_text_title_margin_bottom' => '25',
			'header_bg_color'                 => $dark_gray,

			/* フロントページ */
			// 構成
			'front_architect_content_width'   => '1180',
			'front_architect_col'             => 'two-col',
			'front_architect_col_one_width'   => '100',
			'front_architect_reco_disp'       => 'visible',
			// 見出し
			'front_heading_reco'              => 'おすすめ記事',
			'front_heading_news'              => '新着記事',
			'front_heading_fontsize'          => '25',
			'front_heading_color'             => $dark_gray,
			'front_heading_bg_color'          => 'transparent',
			'front_heading_border'            => 'border-left',
			'front_heading_border_color'      => 'skyblue',
			'front_heading_border_color_sub'  => '#FFC778',
			'front_heading_padding_top_and_bottom' => '0.1',
			'front_heading_padding_left'      => '0.1',

			/* コンテナー */
			'bg_color_all'                    => $white,
			'bg_color_section'                => $white,
			'section_shadow_len'              => '2',
			'section_shadow_opacity'          => '100',

			/* フッター */
			'footer_content_copyright'        => 'Copyright © [#year] [#title] Powered by MY THEME.',
			'footer_bg_color'                 => $dark_gray,
			'footer_text_color'               => $white,
			'footer_text_hover_color'         => $blue_agate,
			'footer_widget_bg_color'          => $dark_gray,
			'footer_widget_text_color'        => $white,
			'footer_widget_text_hover_color'  => $blue_agate,

			/* 部品 */
			// ヘッダー下スライダ-
			'parts_header_slider_type'        => 'date',
			'parts_header_slider_design'      => 'c-slider-design--img-always',
			'parts_header_slider_auto'        => 'true',
			'parts_header_slider_auto_speed'  => '3000',
			'parts_header_slider_arrows'      => 'true',
			'parts_header_slider_centermode'  => 'true',
			'parts_header_slider_all_number'  => '8',
			'parts_header_slider_url_1'       => 'https://',
			'parts_header_slider_url_2'       => 'https://',
			'parts_header_slider_url_3'       => 'https://',
			'parts_header_slider_url_4'       => 'https://',
			'parts_header_slider_url_5'       => 'https://',
			'parts_header_slider_url_6'       => 'https://',
			'parts_header_slider_url_7'       => 'https://',
			'parts_header_slider_url_8'       => 'https://',
			'parts_header_slider_url_9'       => 'https://',
			'parts_header_slider_url_10'      => 'https://',
			'parts_header_slider_disp_number' => '4',
			'parts_header_slider_width_maxwindow' => 'max',
			'parts_header_slider_width'       => '1180',
			'parts_header_slider_article_margin_side' => '13',
			// スクロールボタン
			'parts_scroll_color'              => $bleu_acide,
			'parts_scroll_hover_color'        => $blue_agate,
		);
	}
}
