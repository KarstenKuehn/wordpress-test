( function(blocks, editor, components, i18n, element) {
  var registerBlockType = wp.blocks.registerBlockType;
  var el = wp.element.createElement;
  var InnerBlocks = wp.editor.InnerBlocks;

  registerBlockType( 'bitv/testimonial', {
    title: 'BITV-Testimonal', // The title of block in editor.
    icon: 'zitat', // The icon of block in editor.
    category: 'layout', // The category of block in editor.
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Zitate' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/columns',{},
                [
                  ['core/column',{className:'testimonial-image',},
                    [
                      ['core/image',{'placeholder':'Verlinkung-Bild'}],
                    ]
                  ],
                  ['core/column',{className:'testimonial-content'},
                    [
                      ['core/quote',{'placeholder':'Zitate','ariaLabel':'hjsabvuhwsedbf'}],
                    ]
                  ]
                ]
              ]
            ],
            templateLock: "all",
            allowedBlocks: ['core/columns'],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'zitat' },
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
