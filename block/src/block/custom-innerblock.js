import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

registerBlockType( 'custom/innerblocks' , {
  title: 'innerblocks',
  description:  'インナーブロックです。',
  icon: 'admin-page',
  category: 'layout',
  keywords: ['inner',],

  edit: () => {
    const blockProps = useBlockProps();

    return(
      <div { ...blockProps }>
        <InnerBlocks />
      </div>
    );
  },
  save: () => {
    const blockProps = useBlockProps.save();

    return (
      <div { ...blockProps }>
        <InnerBlocks.Content />
      </div>
    );
  },
});
