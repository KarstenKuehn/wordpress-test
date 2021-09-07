(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/ap-image', {
    title: 'BITV-Ansprechpartner-Image', // The title of block in editor.
   icon: 'align-pull-right', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.  
    edit: function() {
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Ansprechpartner-Image-Modul' ),
        el(
          InnerBlocks,
          {
            template: [
              ['core/heading',{className:'e_headline content','placeholder':'Block Überschrift',fontSize: 'large'}],
              ['core/image',{className:'modul-image','placeholder':'Verlinkung-Bild'}],
                  ['core/column',{className:'block-text content',},
                    [
                      ['core/paragraph',{'placeholder':'Blocktext'}],
                      
                    ]
                  ],
                  ['core/column',{className:'block-text content',},
                    [
                      ['core/paragraph',{tagName:'div',className:'ap-name','placeholder':'Name'}],
                      ['core/paragraph',{className:'ap-mail','placeholder':'E-Mail'}],
                      ['core/paragraph',{className:'ap-telefon','placeholder':'Telefonnummer'}],
                      ['core/paragraph',{className:'ap-standort','placeholder':'Standort'}], 
                      ['core/paragraph',{className:'ap-adresse','placeholder':'Adresse'}],                   
                    ]
                  ],                  

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