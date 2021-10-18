( function(blocks, editor, components, i18n, element) {
  var registerBlockType = wp.blocks.registerBlockType;
  var el = wp.element.createElement;
  var InnerBlocks = wp.editor.InnerBlocks;

  registerBlockType( 'lb/verlinkungen-frame', {
    title: '[ALT] Verlinkungen-Frame', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'layout', // The category of block in editor.
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, '[ALT] Verlinkungen-Frame' ),
        el(
          InnerBlocks,
          {
            template:  [
              [ 'test/child' ],
            ],
            templateLock: 'all',
          }
        )
      );
    },

    save: function() {
      return el( 'section', { className:'verlinkungen gray full' },
        el( InnerBlocks.Content, {} )
      );
    },
  } );

  registerBlockType( 'test/child', {
    title: 'Test Child',
    icon: 'cart',
    category: 'common',
    parent: [ 'test/parent' ],

    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'block_head','placeholder':'Block Überschrift'}],
              ['core/columns',{},
                [
                  ['core/column',{className:'verlinkung',},
                    [
                      ['core/image',{'placeholder':'Verlinkung-Bild'}],

                      ['core/columns',{className:'verlinkungen_head'},
                        [
                          ['core/column',{className:'verlinkungen_head_head'},
                            [                     
                              ['core/heading',{'placeholder':'Überschrift'}],
                            ],
                          ],
                          ['core/column',{className:'verlinkungen_head_href'},
                            [                     
                              ['core/paragraph',{'placeholder':'Verlinkung'}],
                            ],
                          ],                          
                        ],
                      ],
                      ['core/paragraph',{className:'verlinkungen_content','placeholder':'Verlinkung Text'}]
                    ]
                  ],
                  ['core/column',{className:'verlinkung',},
                    [
                      ['core/image',{'placeholder':'Verlinkung-Bild'}],
                      ['core/columns',{className:'verlinkungen_head'},
                        [
                          ['core/column',{className:'verlinkungen_head_head'},
                            [                     
                              ['core/heading',{'placeholder':'Überschrift'}],
                            ],
                          ],
                          ['core/column',{className:'verlinkungen_head_href'},
                            [                     
                              ['core/paragraph',{'placeholder':'Verlinkung'}],
                            ],
                          ],                          
                        ],
                      ],
                      ['core/paragraph',{className:'verlinkungen_content','placeholder':'Verlinkung Text'}]
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
      return el( 'div', {},
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

/*
CSS  



.verlinkungen .wp-block-columns {
    column-gap: 24px;
    max-width: 1224px;
    margin: auto;
}


.verlinkungen .wp-block-column {
    background: white;
}

.verlinkungen .wp-block-image img {
    width: 100%;
}

.verlinkungen_head_href a {
    color: transparent;
}
.verlinkungen_head_href a:after {
    content: "\e895";
    color: #0061AB;
    font-family: 'Material Icons';
    font-style: normal;
    font-size: 32px;
}



*/