<?php
namespace Mytheme_Theme;

use \Mytheme_Theme\Data\Default_Data;

class Data {

	use \Mytheme_Theme\Data\Default_Data;

	/**
	 * DB名
	 */
	const DB_NAMES = array(
		//'customizer'  => 'mytheme_settings',
		'customizer'  => 'theme_mods_mytheme',
	);


	/**
	 * テーマバージョン
	 */
	public static $mytheme_version = '';


	/**
	 * カスタマイザーの設定データ
	 */
	protected static $settings         = '';
	protected static $default_settings = '';


	/**
	 * プラグインのデータ
	 */
	protected static $plugin_data = array();

	/**
	 * プラグイン更新用パス
	 */
	public static $ex_update_path = false;


	/**
	 * 日本語かどうか
	 */
	public static $is_ja = false;

	/**
	 * リストレイアウト
	 */
	public static $list_layouts = array();


	/**
	 * テンプレートパーツまでのパス（子テーマ > this > 親テーマ）
	 */
	public static $ex_parts_path = '';


	/**
	 * パンくずリストのデータを保持する変数
	 */
	public static $bread_json_data = array();


	/**
	 * 一時的に抜粋分を変更するために変数化
	 */
	public static $excerpt_length = null;


	/**
	 * テキスト系HTMLを許可する時にwp_ksesに渡す配列
	 */
	public static $allowed_text_html = array(
		'a'      => array(
			'href'   => true,
			'rel'    => true,
			'target' => true,
			'class'  => true,
		),
		'b'      => array( 'class' => true ),
		'br'     => array( 'class' => true ),
		'i'      => array( 'class' => true ),
		'em'     => array( 'class' => true ),
		'span'   => array( 'class' => true ),
		'strong' => array( 'class' => true ),
	);


	/**
	 * init()
	 */
	public static function init() {

		// テーマバージョンを取得
		self::set_theme_version();

		// テーマバージョンを定数化しておく(wp_enqueue_ のクエリ付与用)
		if ( ! defined( 'mytheme_version' ) ) {
			define( 'mytheme_version', ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? date_i18n( 'mdGis' ) : self::$mytheme_version );
		}

		// 日本語かどうか
		self::$is_ja = 'ja' === get_locale();

		// レイアウト
		self::$list_layouts = array(
			'card'   => __( 'Card type', 'mytheme' ),
			'list'   => __( 'List type', 'mytheme' ),
			'simple' => __( 'Text type', 'mytheme' ),
		);

		// 設定データのデフォルト値をセット
		self::set_default_data();

		// 設定データのセット $GLOBALS['content_width'] のために after_setup_theme で取得。
		add_action( 'after_setup_theme', array( '\Mytheme_Theme\Data', 'set_settings_data' ), 9 );

		// カスタマイザーでは、データが即時反映されるタイミング（ wp_loaded ）で再セット
		if ( is_customize_preview() ) {
			add_action( 'wp_loaded', array( '\Mytheme_Theme\Data', 'set_settings_data' ) );
		}

	}

	/**
	 * テーマバージョンをセット
	 */
	private static function set_theme_version() {
		$theme_data          = wp_get_theme( 'mytheme' );
		self::$mytheme_version = $theme_data->get( 'Version' );
	}

	/**
	 * デフォルト値を変数にセット
	 */
	private static function set_default_data() {
		self::$default_settings = self::get_default_settings();
	}


	/**
	 * カスタマイザーのデータを変数にセット
	 */
	public static function set_settings_data() {
		$db_data        = get_option( self::DB_NAMES['customizer'] ) ?: array();
		self::$settings = array_merge( self::$default_settings, $db_data );
	}

  /**
   * カスタマイザーのデータを取得し、ない場合はデフォルト値を取得
   * @param  string $key キー
   * @return string      データ
   */
	public static function get_setting_without_default( $key = '' ) {
		return !\Mytheme_Theme\Utility::isNullOrWhitespace(self::get_setting($key)) ? self::get_setting($key) : self::get_setting($key);
	}

	/**
	 * カスタマイザーのデータを取得
	 */
	public static function get_setting( $key = '' ) {
		if ( $key ) {
			if ( ! isset( self::$settings[ $key ] ) ) return '';
			return self::$settings[ $key ] ?: '';
		}
		return self::$settings;
	}

	/**
	 * カスタマイザーのデフォルト値を取得
	 */
	public static function get_default_setting( $key = '' ) {
		if ( $key ) {
			if ( ! isset( self::$default_settings[ $key ] ) ) return '';
			return self::$default_settings[ $key ] ?: '';
		}
		return self::$default_settings;
	}


	/**
	 * カスタマイザーのデータを上書きするメソッド
	 */
	public static function overwrite_setting( $key = '', $val = '' ) {
		if ( ! $key ) return;
		self::$settings[ $key ] = $val;
	}


	/**
	 * プラグインのデータを取得
	 */
	public static function get_plugin_data( $key = '' ) {
		if ( $key ) {
			if ( ! isset( self::$plugin_data[ $key ] ) ) return '';
			return self::$plugin_data[ $key ] ?: '';
		}
		return self::$plugin_data;
	}


	/**
	 * プラグインのデータをセット
	 */
	public static function set_plugin_data( $key = '', $val = '' ) {
		if ( ! $key ) return;
		self::$plugin_data[ $key ] = $val;
	}

}
