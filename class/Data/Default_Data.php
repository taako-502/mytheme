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
			// Colors
			'color_main'                => '#111',
			'color_text'                => $dark_gray,
			'color_link'                => '#3fa3ff',
			'color_bg'                  => $white,

			// Content width
			'container_width'           => 1200,
			'slim_width'                => 960,

			// NO IMAGE
			'no_image'                  => '',

			// Breadcrumbs
			'breadcrumbs_pos'           => 'top',
			'breadcrumbs_home_text'     => __( 'Home', 'arkhe' ),
			'breadcrumbs_set_home_page' => false,

			// Header
			// 'head_logo'              => 0,
			'head_logo_overlay'         => 0,
			'header_overlay_on_page'    => false,
			'logo_size_pc'              => '48',
			'logo_size_sp'              => '40',
			'header_overlay'            => 'off',
			'fix_header_pc'             => true,
			'fix_header_sp'             => true,
			'fix_gnav'                  => false,
			'show_search_sp'            => true,
			'show_search_pc'            => false,
			'show_drawer_sp'            => true,
			'show_drawer_pc'            => false,
			'header_btn_layout'         => 'l-r',
			'move_gnav_under'           => false,

			// Footer
			'show_pagetop'              => true,
			'copyright'                 => '&copy; 2020 ' . esc_html( get_option( 'blogname' ) ) . '.',

			// Sidebar
			'show_sidebar_top'          => false,
			'show_sidebar_page'         => false,
			'show_sidebar_post'         => true,
			'show_sidebar_archive'      => true,

			// 投稿リスト
			'post_list_layout'          => 'card',  // card
			'excerpt_length'            => 80,

			'show_list_cat'             => true,
			'show_list_date'            => true,
			'show_list_mod'             => false,
			'show_list_author'          => false,
			'thumb_ratio'               => 'wide',

			// 固定ページ設定
			'page_title_pos'            => 'top',
			// 'show_page_thumb'           => false,
			'title_bg_filter'           => 'dot',
			'ttlbg_overlay_color'       => '#000',
			'ttlbg_overlay_opacity'     => 0.2,

			// 投稿ページ
			'show_entry_cat'            => true,
			'show_entry_tag'            => false,
			'show_entry_author'         => false,
			'show_entry_thumb'          => true,

			// 下部エリア
			'show_foot_terms'           => true,
			'show_prev_next_link'       => true,
			'show_author_box'           => true,
			'show_comments'             => true,
			'show_img_shadow'           => true,
			'show_related_posts'        => true,
			'related_posts_layout'      => 'card',
			'post_relation_type'        => 'category',
			'pn_link_is_same_term'      => false,

			// 管理画面
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
			//全体構成
			'architect_text_link_hover_color' => $azure,
			'front_architect_content_width' => '1180',
			'architect_text_color' => $dark_gray,
			'architect_text_link_color' => '#04C',
			'architect_col_one_width' => '67',

			//ヘッダー
			'header_layout_titile_align' => 'left',
			'header_layout_nav_align' => 'right',
			'header_text_color' => '#FFF',
			'header_text_hover_color' => $blue_agate,
			'header_text_logo_fontsize' => '28',
			'header_text_description_fontsize' => '13',
			'header_text_description_margin_top' => '28',
			'header_text_title_margin_top' => '25',
			'header_text_title_margin_bottom' => '25',
			'header_bg_color' => '',

			//フロントページ
			'front_heading_color' => $dark_gray,
			'front_heading_fontsize' => '25',
			'front_heading_bg_color' => 'transparent',
			'front_heading_border' => 'border-bottom',
			'front_heading_border_color' => 'skyblue',
			'front_heading_border_color_sub' => '#FFC778',
			'front_heading_padding_left' => '0.1',
			'front_heading_padding_top_and_bottom' => '0.1',
			'front_architect_col' => 'two-col',
			'bg_color_all' => $white,
			'bg_color_section' => $white,
			'section_shadow_len' => '2',
			'section_shadow_opacity' => '100',

			//フッター
			'footer_content_copyright' => 'Copyright © [#year] [#title] Powered by MY THEME.',
			'footer_bg_color' => $dark_gray,
			'footer_text_color' => $white,
			'footer_text_hover_color' => $blue_agate,
			'footer_widget_bg_color' => $dark_gray,
			'footer_widget_text_color' => $white,
			'footer_widget_text_hover_color' => $blue_agate,

			//パーツ
			'parts_header_slider_type' => 'news',
			'parts_header_slider_design' => 'c-slider-design--img-always',
			'parts_header_slider_auto' => 'true',
			'parts_header_slider_auto_speed' => '3000',
			'parts_header_slider_arrows' => 'true',
			'parts_header_slider_centermode' => 'true',
			'parts_header_slider_all_number' => '8',
			'parts_header_slider_disp_number' => '4',
			'parts_header_slider_width_maxwindow' => 'max',
			'parts_header_slider_width' => '1180',
			'parts_header_slider_article_margin_side' => '13',
			'parts_scroll_color' => $bleu_acide,
			'parts_scroll_hover_color' => $blue_agate,
		);
	}
}
