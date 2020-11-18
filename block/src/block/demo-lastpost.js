import { registerBlockType } from '@wordpress/blocks';
import { withSelect } from '@wordpress/data';

/**
 * 最新の投稿のリンクを表示するブロック
 * @param  {[type]} gutenberg [description]
 * @param  {[type]} title     [description]
 * @param  {[type]} icon      [description]
 * @param  {[type]} category  [description]
 * @param  {[type]} edit      [description]
 * @param  {[type]} posts     [description]
 * @return {[type]}           [description]
 */
registerBlockType( 'gutenberg-examples/example-dynamic', {
    title: 'Example: last post',
    icon: 'megaphone',
    category: 'widgets',

    edit: withSelect( ( select ) => {
        return {
            posts: select( 'core' ).getEntityRecords( 'postType', 'post' ),
        };
    } )( ( { posts, className } ) => {
        if ( ! posts ) {
            return 'Loading...';
        }

        if ( posts && posts.length === 0 ) {
            return 'No posts';
        }

        const post = posts[ 0 ];

        return <a className={ className } href={ post.link }>
            { post.title.rendered }
        </a>;
    } ),
} );
