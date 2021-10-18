(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/hero-image', {
    title: 'Hero-Bild Modul', // The title of block in editor.
    icon: 'format-image', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Hero-Bild Modul' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/image',{className:'hero-image-figure','placeholder':'Hero-Bild',"sizeSlug":'thumbnail'}],
    
            ],

          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'hero-image bg-image' },
        el( InnerBlocks.Content, {} ),
        el( 'div', { className:'hero-image-stairway' })
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