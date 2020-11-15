/**
 * Guternbergのカスタマイズ
 */
(function() {
  // テキスト動的入力の設定
  var el = wp.element.createElement,
    blocks = wp.blocks,
    RichText = wp.editor.RichText;

  // ボックス
  blocks.registerBlockType('custom/box', {
    title: 'ボックス',
    icon: 'admin-page',
    category: 'layout',
    attributes: {
      content: {
        type: 'array',
        source: 'children',
        selector: 'p',
      },
    },
    edit: function(props) {
      var nowContent = props.attributes.content;
      return el(
        RichText, {
          tagName: 'p',
          className: "box",
          value: nowContent,
          onChange: function(changedContent) {
            props.setAttributes({
              content: changedContent
            });
          },
        }
      );
    },
    save: function(props) {
      return el(RichText.Content, {
        tagName: 'p',
        className: "box",
        value: props.attributes.content,
      });
    },
  });
})();
