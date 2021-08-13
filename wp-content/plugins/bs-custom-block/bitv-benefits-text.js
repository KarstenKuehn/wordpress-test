(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/benefits-text', {
    title: 'BITV-Benefits-Text', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Benefits Text Modul' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'e_headline','placeholder':'Block Überschrift',fontSize: 'large'}],
              ['core/columns',{className:'benefits-text'},
                [
                  ['core/column',{className:'block-text text_left',},
                    [
                      ['core/paragraph',{className:'text1_content','placeholder':'Benefits-Inhalt'}],
                      
                    ]
                  ],
                  ['core/column',{className:'block-text text_right'},
                    [
                      ['core/image',{className:'modul-image','placeholder':'Benefits-Bild'}],
                    ]
                  ]
                ]
              ],
              ['core/button',{className:'text-button','placeholder':'Button'}],            
            ],

          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'modul benefits' },
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