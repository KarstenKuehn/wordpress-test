(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/modul-button', {
    title: 'Modul-Button', // The title of block in editor.
    icon: 'button', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Button im Modul' ),
        el(
          InnerBlocks,
          {
            template: [
				['core/button',{className:'modul-button content','placeholder':'Button',attributes:{'test':'test','test2':'test2',}}],
            ],
            //templateLock: "all",
            //allowedBlocks: ['core/columns'],
          }
        )
      );
    },

    save: function() {
      return el( InnerBlocks.Content, {} );
    },
  } );
} )(
window.wp.blocks,
window.wp.blockEditor,
window.wp.components,
window.wp.i18n,
window.wp.element
);