(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;
const iconEl = el('svg', { width: 20, height: 20 },
  el('path', { d: "M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z" } )
);
  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/one-column-text', {
    title: 'BITV-1-Spalte-Text', // The title of block in editor.
// Specifying a custom svg for the block
icon: 'editor-alignleft',
    category: 'bitv-blocks', 
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Modul 1-Spalte-Text' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'e_headline',fontSize: 'large','placeholder':'Block Überschrift',style: { outline: '1px solid red', padding: 5 }}],
              ['core/paragraph',{className:'modul_content','placeholder':'Inhalt'}],
              ['core/button',{className:'modul-button','placeholder':'Button'}],
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