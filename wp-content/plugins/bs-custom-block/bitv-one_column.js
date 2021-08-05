(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/one-column-text', {
    title: 'BITV-1-Spalte-Text', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'common', // The category of block in editor.
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Modul 1-Spalte-Text' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'e_headline','placeholder':'Block Überschrift',style: { outline: '1px solid red', padding: 5 }}],
              ['core/paragraph',{className:'text1_content','placeholder':'Spalte1'}],
            ],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'modul eine_spalte' },
        el( InnerBlocks.Content, {} )
      );
    },
  } );
} )(
window.wp.blocks,
window.wp.blockEditor,
window.wp.components,
window.wp.i18n,
window.wp.element
);