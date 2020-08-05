<div class="main">
  <h1>mythemeカスタマイズ画面</h1>
  <h2>画面説明</h2>
  <p>この画面は、簡単にmythemeのデザインを設定できる画面です。</p>
  <h2>基本構成</h2>
  <div style="display:table;">
    <div style="display:table-row;">
      <div style="display:table-cell;"><b>pタグ</b><input type="number" name="p-size" value="<?php echo esc_attr( $GLOBALS["p-size"] ); ?>"> px</div>
      </div>
    <div style="display:table-row;">
      <div style="display:table-cell"><b>h2タグ</b><input type="number" name="h2-size" value=""><?php echo esc_attr( $GLOBALS["h2-size"] ); ?> px</div>
    </div>
    <div style="display:table-row;">
      <div style="display:table-cell"><b>h3タグ</b><input type="number" name="h3-size" value=""><?php echo esc_attr( $GLOBALS["h3-size"] ); ?> px</div>
    </div>
    <div style="display:table-row;">
      <div style="display:table-cell"><b>h4タグ</b><input type="number" name="h4-size" value=""><?php echo esc_attr( $GLOBALS["h4-size"] ); ?> px</div>
    </div>
  </div>
  <p>
    <input type="submit" value="<?php echo esc_attr( __('save','default')); ?>" class="button button-primary">
  </p>
</div>
