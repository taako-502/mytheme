<?php

class Customizer {

  private function __construct() {}

  /**
	 * 設定追加
	 * $customizer = $wp_customize
	 */
	public static function add( $section = '', $id = '', $args = array(), $Classname = '' ) {

		if ( '' === $id ) return;

		$args = self::set_args( $args );

		// $args 上書き用フック。 設定を 'is_off' で非表示にしたり、 'priority' いじれるように。
		$args = apply_filters( 'arkhe_customizer_args', $args, $section, $id, 'setting' );

		// 設定非表示の場合。
		if ( $args['is_off'] ) return;

		global $wp_customize;
		$customizer = $wp_customize;

		$customize_id = $args['db'] . '[' . $id . ']';
		$type         = $args['type'];
		$partial      = $args['partial'];

		// デフォルト値は args で指定されていなければ get_default_setting() で取得
		$default = isset( $args['default'] ) ? $args['default'] : \Mytheme::get_default_setting( $id );

		// setting 用
		$setting_args = array(
			'default'           => $default,
			'type'              => 'option',
			'transport'         => $args['transport'],
			'sanitize_callback' => isset( $args['sanitize'] ) ? $args['sanitize'] : Sanitize::get_sanitize_name( $type ),
		);

		// partialありの時、settingオプション追加
		if ( ! empty( $partial ) ) {
			$setting_args['transport'] = 'postMessage';
		}

		// add setting
		$customizer->add_setting( $customize_id, $setting_args );

		// control用
		$control_args = array(
			'label'       => $args['label'],
			'description' => $args['description'],
			'section'     => $section,
			'settings'    => $customize_id,
			'type'        => $type,
			'classname'   => $args['classname'],
			'priority'    => $args['priority'],
		);

		$control_instance = null;

		// 追加処理
		if ( 'color' === $type ) {

			$control_instance = new Color_Control( $customizer, $customize_id, $control_args );

		} elseif ( 'image' === $type ) {

			$control_instance = new Image_Control( $customizer, $customize_id, $control_args );

		} elseif ( 'media' === $type ) {

			$control_args['mime_type'] = $args['mime_type'];
			$control_instance          = new Media_Control( $customizer, $customize_id, $control_args );

		} elseif ( 'radio' === $type || 'select' === $type ) {

			$control_args['choices'] = $args['choices'];

		} elseif ( 'number' === $type ) {

			$control_args['input_attrs'] = $args['input_attrs'];

		} elseif ( 'code_editor' === $type ) {

			$control_args['code_type'] = $args['code_type'];

		}

		// インスタンスまだなければ Base_Control で生成
		if ( null === $control_instance  ) $control_instance = new Base_Control( $customizer, $customize_id, $control_args );

		// add control
		$customizer->add_control( $control_instance );

		// add partial
		if ( ! empty( $partial ) ) {
			$customizer->selective_refresh->add_partial( $customize_id, $partial );
		}
	}
}
