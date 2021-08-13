(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/text-image', {
    title: 'BITV-Text-Image', // The title of block in editor.
   icon: 'align-pull-right', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.  
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Text-Image-Modul' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'e_headline content','placeholder':'Block Überschrift',fontSize: 'large'}],

                  ['core/column',{className:'block-text content',},
                    [
                      ['core/paragraph',{'placeholder':'Blocktext'}],
                      
                    ]
                  ],
              ['core/button',{className:'modul-button content','placeholder':'Button'}],
              ['core/image',{className:'modul-image','placeholder':'Verlinkung-Bild'}],
            ],
            //templateLock: "all",
            //allowedBlocks: ['core/columns'],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'modul text-image' },
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