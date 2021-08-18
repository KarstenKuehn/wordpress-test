(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/drei-teaser-modul', {
    title: 'BITV-3-er-Teaser Modul', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, '3-er Teaser Modul' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'e_headline','placeholder':'Block Überschrift',fontSize: 'large'}],
              ['core/columns',{className:'teaser-block'},
                [
                  ['core/column',{className:'block-text text_left',},
                    [
                      ['core/image',{className:'modul-image','placeholder':'Teaser-Bild',"sizeSlug":'thumbnail'}],
                      ['core/column',{className:'block-content',},
                        [
                          ['core/heading',{className:'e_headline','placeholder':'Teaser Überschrift',fontSize: 'medium'}],
                          ['core/paragraph',{className:'text1_content','placeholder':'Teaser-Inhalt'}],
                          ['core/button',{className:'modul-button content','placeholder':'Button'}],
                        ]
                      ],
                      
                    ]
                  ],
                  ['core/column',{className:'block-text text_right'},
                    [
                      ['core/image',{className:'modul-image','placeholder':'Teaser-Bild',"sizeSlug":'thumbnail'}],
                      ['core/column',{className:'block-content',},
                        [
                          ['core/heading',{className:'e_headline','placeholder':'Teaser Überschrift',fontSize: 'medium'}],
                          ['core/paragraph',{className:'text1_content','placeholder':'Teaser-Inhalt'}],
                          ['core/button',{className:'modul-button content','placeholder':'Button'}],
                        ]
                      ],
                    ]
                  ],
                  ['core/column',{className:'block-text text_right'},
                    [
                      ['core/image',{className:'modul-image','placeholder':'Teaser-Bild',"sizeSlug":'thumbnail'}],
                      ['core/column',{className:'block-content',},
                        [
                          ['core/heading',{className:'e_headline','placeholder':'Teaser Überschrift',fontSize: 'medium'}],
                          ['core/paragraph',{className:'text1_content','placeholder':'Teaser-Inhalt'}],
                          ['core/button',{className:'modul-button content','placeholder':'Button'}],
                        ]
                      ],
                    ]
                  ]
                ]
              ],           
            ],

          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'modul teaser' },
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