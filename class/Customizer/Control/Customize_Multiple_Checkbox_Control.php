<?php
namespace Mytheme_Theme\Customizer\Control;

/**
 * 複数選択用チェックボックス
 */
class Customize_Multiple_Checkbox_Control extends \WP_Customize_Control {

  //multiple_checkにするとjavascriptが動作しなくなる
	public $type = 'multiple-check';

	public function enqueue() {
		wp_enqueue_script(
			'customizer-multiple-check',
			get_stylesheet_directory_uri() . '/js/customizer-multiple-check.js',
			array( 'jquery', 'wp-color-picker' ),
			'1.0.0',
			true
		);
	}

	protected function render_content() {
    if ( empty( $this->choices ) ) return; ?>

    <?php if ( !empty( $this->label ) ) : ?>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <?php endif; ?>

    <?php if ( !empty( $this->description ) ) : ?>
      <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
    <?php endif; ?>

    <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

    <ul>
      <?php foreach ( $this->choices as $value => $label ): ?>
      <li>
        <label>
          <input type="checkbox" value="<?php echo $value; ?>" <?php checked( in_array( $value, $multi_values ) ); ?>>
          <?php echo esc_html( $label ); ?>
        </label>
      </li>
      <?php endforeach; ?>
    </ul>
    <input
      type="hidden"
      name="mulitiple-checkbox-value"
      <?php $this->link(); ?>
      value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>"
    >
  <?php
  }
}
