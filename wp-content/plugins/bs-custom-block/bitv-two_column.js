(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/two-column-text', {
    title: 'BITV-2-Spalten-Text', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'common', // The category of block in editor.
    attributes: {
      headline: {
        type: 'string',
        default: 'Lorem ipsum dolor sit amet.',
      },
      content: {
        type: 'string',
        default: ''
      },
      content_right: {
        type: 'string',
        default: ''
      },
      button: {
        type: 'string',
        default: 'mehr erfahren'
      },
      buttonURL: {
      type: 'url'
      },    
      button_right: {
        type: 'string',
        default: 'mehr erfahren'
      },
      buttonURL_right: {
      type: 'url'
      }, 
      ingredients_l: {
        type: 'string',
        default: ''
      },
      ingredients_r: {
        type: 'string',
        default: ''
      },
      block: {
        type: 'string',
        default: ''
      },
      alignment: {
        type: 'string',
        default: 'center'
      }
    },    
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, '2-Spalten-Text' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'e_headline','placeholder':'Block Überschrift'}],
                      ['core/paragraph',{className:'text_left','placeholder':'Spalte1'}],
                      ['bitv/button',{className:'text-button','placeholder':'Button'}],
                      ['core/paragraph',{className:'text_right','placeholder':'Spalte2'}],
/*
              ['core/columns',{className:'two-column-text'},
                [
                  ['core/column',{className:'text_left',},
                    [
                      ['core/paragraph',{className:'text1_content','placeholder':'Spalte1'}],
                      ['bitv/button',{className:'text-button','placeholder':'Button'}],
                    ]
                  ],
                  ['core/column',{className:'text_right'},
                    [
                      ['core/paragraph',{className:'text2-content','placeholder':'Spalte2'}],
                    ]
                  ]
                ]
              ],

*/              
            ],
            //templateLock: "all",
            //allowedBlocks: ['core/columns'],
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'modul zwei_spalten' },
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