( function(blocks, editor, components, i18n, element) {
  var registerBlockType = wp.blocks.registerBlockType;
  var el = wp.element.createElement;
  var InnerBlocks = wp.editor.InnerBlocks;

  registerBlockType( 'lb/lotterie-slide-item', {
    title: 'Bild Slide-Item', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'common', // The category of block in editor.
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Slide-Bild' ),
        el(
          InnerBlocks,
          {
            template: [
            ['core/image',{className:'lotterie-image','placeholder':'Verlinkung-Bild', width:'150'}],
            ],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'swiper-slide' },
        el( InnerBlocks.Content, {} )
      );
    },
  } );


/*

  registerBlockType( 'testimonal/child', {
    title: 'Testimonal - Content',
    icon: 'cart',
    category: 'common',
    parent: [ 'testimonal/parent' ],

    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Child' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/columns',{},
                [
                  ['core/column',{},
                    [
                      ['core/image',{'placeholder':'Verlinkung-Bild'}],
                    ]
                  ],
                  ['core/column',{},
                    [
                    ['core/heading',{'placeholder':'Zitate-Text'}],
                      ['core/paragraph',{'placeholder':'Zitate-Author'}]
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
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( InnerBlocks.Content, {} )
      );
    },
    } );

*/

} )(
window.wp.blocks,
window.wp.blockEditor,
window.wp.components,
window.wp.i18n,
window.wp.element
);
