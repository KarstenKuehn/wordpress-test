




(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  var InnerBlocks = wp.editor.InnerBlocks;
  blocks.registerBlockType( 'bitv/image-ap-x', {
    title: 'xxx-BITV-Image-Ansprechpartner', // The title of block in editor.
   icon: 'align-pull-right', // The icon of block in editor.
    category: 'bitv-blocks', // The category of block in editor.  

attributes: {
  mediaID: {
  type: 'number'
  },
  mediaURL: {
  type: 'string',
  source: 'attribute',
  selector: 'img',
  attribute: 'src'
  },
  mediaALT: {
  type: 'string',
  source: 'attribute',
  selector: 'img',
  attribute: 'alt'
  },
  title: {
  type: 'text',
  selector: 'h2'
  },
  text: {
  type: 'text',
  selector: 'p'
  },
  ansprechpartner: {
  type: 'text',
  selector: 'p'
  },

  mail: {
  type: 'text',
  selector: 'p'
  },
  phone: {
  type: 'text',
  selector: 'p'
  },

  standort: {
    type: 'string',
    default: ''
  },
  anschrift: {
    type: 'string',
    default: ''
  },
  content: {
    type: 'string',
    default: ''
  },

  alignment: {
  type: 'string',
  default: 'center'
  }
},
    
edit: function (props) {
var attributes = props.attributes;
      return el( 'div', { style: { outline: '1px solid gray', padding: 5 } },
        el( 'span', {}, 'Image-Ansprechpartner-Modul' ),
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
          }
        )
      );
    },

    save: function() {
      return el( 'div', { className:'modul image-text' },
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