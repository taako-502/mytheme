<?php
namespace Mytheme_Theme;

use \Mytheme_Theme\Customizer\Sanitize;
use \Mytheme_Theme\Customizer\Control\Base_Control;
use \Mytheme_Theme\Customizer\Control\Color_Control;
use \Mytheme_Theme\Customizer\Control\Image_Control;
use \Mytheme_Theme\Customizer\Control\Media_Control;
use \Mytheme_Theme\Customizer\Control\WP_Customize_Range;

class Customizer {

  private function __construct() {}

  /**
	 * デフォルト値とマージ
	 */
	public static function set_args( $args ) {

		$defaults = array(
			'classname'   => '',
			'label'       => '',
			'description' => '',
			'type'        => '',
			'mime_type'   => '',
			'choices'     => array(),
			'input_attrs' => array(),
			// 'sanitize' => '',
			'transport'   => 'refresh',
			'partial'     => array(),
			'db'          => \Mytheme::DB_NAMES['customizer'],
			'priority'    => 10,
			'is_off'      => false,
      'min'         => 0,
      'max'         => 10,
      'step'        => 1,
		);
		return array_merge( $defaults, $args );
	}

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
      'min'         => $args['min'],
			'max'         => $args['max'],
			'step'        => $args['step'],
      'choices'     => $args['choices'],
      'input_attrs' => $args['input_attrs'],
		);

		$control_instance = null;

		// 追加処理
		switch ($type) {
      case 'color':
        $control_instance = new Color_Control( $customizer, $customize_id, $control_args );
        break;
      case 'image':
        $control_instance = new Image_Control( $customizer, $customize_id, $control_args );
        break;
      case 'media':
        $control_args['mime_type'] = $args['mime_type'];
			  $control_instance = new Media_Control( $customizer, $customize_id, $control_args );
        break;
      case 'range':
        $control_instance = new WP_Customize_Range( $customizer, $customize_id, $control_args );
        break;
      case 'radio':
      case 'select':
        $control_args['choices'] = $args['choices'];
        break;
      case 'number':
        $control_args['input_attrs'] = $args['input_attrs'];
        break;
      case 'code_editor':
        $control_args['code_type'] = $args['code_type'];
        break;
      default:
        // code...
        break;
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
