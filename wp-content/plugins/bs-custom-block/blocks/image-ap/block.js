




(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;
var RichText = editor.RichText;
  var InnerBlocks = wp.editor.InnerBlocks;

  blocks.registerBlockType( 'bitv/image-ap', {
    title: 'BITV-Image-Ansprechpartner', // The title of block in editor.
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
              ['core/paragraph',{className:'block-text content','placeholder':'Blocktext'}],                  
            ],
          }
        ),
        el( 'span', {}, 'Ansprechpartner-Daten' ),
        el(
          "hr",
          null
        ),
        el('svg',{ width: 24, height: 24, style: { display:'inline-block',verticalAlign:'middle', marginRight:'8px' } },
          el('path',{d:"M0 0h24v24H0z",fill:"none"}),
          el('path',{d:"M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"}),
        ),
        el(RichText, {
          type: 'text',
          label: 'Name',
          key: 'editable',
          tagName: 'p',
          className: 'my-block-text content',
          style: {  display:'inline-block' },
          placeholder: 'Name',
          keepPlaceholderOnFocus: true,
          value: attributes.ansprechpartner,
          onChange: function (newText) {
            props.setAttributes({ansprechpartner: newText})
          }
        }),
        el(
          "br",
          null
        ),
        el('svg',{ width: 24, height: 24, style: { display:'inline-block',verticalAlign:'middle', marginRight:'8px' }  },
          el('path',{d:"M0 0h24v24H0V0z",fill:"none"}),
          el('path',{d:"M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"}),
        ),

        el(RichText, {
          type: 'text',
          label: 'E-Mail',
          key: 'editable',
          tagName: 'p',
          className: 'my-block-text content', style: { display:'inline-block',verticalAlign:'middle', marginRight:'8px' } ,

          placeholder: 'E-Mail',
          keepPlaceholderOnFocus: true,
          value: attributes.mail,
          onChange: function (newText) {
            props.setAttributes({mail: newText})
          }
        }),      
          
       el(
          "br",
          null
        ),

        el('svg',{ width: 24, height: 24, style: { display:'inline-block',verticalAlign:'middle', marginRight:'8px' }  },
          el('path',{d:"M0 0h24v24H0z",fill:"none"}),
          el('path',{d:"M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"}),
        ),

        el(RichText, {
          type: 'text',
          label: 'Telefonnummer ',
          key: 'editable',
          tagName: 'p',
          style: {  display:'inline-block' },
          className: 'my-block-text content',
          placeholder: 'Telefonnummer ',
          keepPlaceholderOnFocus: true,
          value: attributes.phone,
          onChange: function (newText) {
            props.setAttributes({phone: newText})
          }
        }), 
          
       el(
          "br",
          null
        ),

        el('svg',{ width: 24, height: 24, style: { display:'inline-block',verticalAlign:'middle', marginRight:'8px' }   },
          el('path',{d:"M0 0h24v24H0z",fill:"none"}),
          el('path',{d:"M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"}),
        ),

        el(RichText, {
          type: 'text',
          label: 'standort ',
          key: 'editable',
          tagName: 'p',
          style: {  display:'inline-block' },
          className: 'my-block-text content',
          placeholder: 'Standort ',
          keepPlaceholderOnFocus: true,
          value: attributes.standort,
          onChange: function (newText) {
            props.setAttributes({standort: newText})
          }
        }), 

           el(
          "br",
          null
        ),

        el('svg',{ width: 24, height: 24, style: { display:'inline-block',verticalAlign:'middle', marginRight:'8px' }   },
          el('path',{d:"M0 0h24v24H0z",fill:"none"}),
          el('path',{d:"M21.99 8c0-.72-.37-1.35-.94-1.7L12 1 2.95 6.3C2.38 6.65 2 7.28 2 8v10c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2l-.01-10zM12 13L3.74 7.84 12 3l8.26 4.84L12 13z"}),
        ),
        el(RichText, {
          type: 'text',
          label: 'Postanschrift ',
          key: 'editable',
          tagName: 'p',
          style: {  display:'inline-block' },
          className: 'my-block-text content',
          placeholder: 'Postanschrift ',
          keepPlaceholderOnFocus: true,
          value: attributes.anschrift,
          onChange: function (newText) {
            props.setAttributes({anschrift: newText})
          }
        }), 
      );
    },

    save: function (props) {
    var attributes = props.attributes;
      return el( 'div', { className:'modul image-text' },
        el( InnerBlocks.Content, {} ),
        el('div',{className:'block-text ap-daten content'},

        attributes.ansprechpartner ? 
        ( 
            el( editor.RichText.Content, {
                tagName:'p',
                className:'ap-name',
                value:  attributes.ansprechpartner
              },
          )
        ):(''),// end p - ap-name

        attributes.mail ? 
        ( 
            el( editor.RichText.Content, {
                tagName:'p',
                className:'ap-mail',
                value:  attributes.mail
              },
          )
        ):(''),// end p - ap-mail

        attributes.phone ? 
        ( 
            el( editor.RichText.Content, {
                tagName:'p',
                className:'ap-phone',
                value:  attributes.phone
              },
          )
        ):(''),// end p - ap-phone

        attributes.standort ? 
        ( 
            el( editor.RichText.Content, {
                tagName:'p',
                className:'ap-standort',
                value:  attributes.standort
              },
          )
        ):(''),// end p - ap-standort 
        attributes.anschrift ? 
        ( 
            el( editor.RichText.Content, {
                tagName:'p',
                className:'ap-anschrift',
                value:  attributes.anschrift
              },
          )
        ):(''),// end p - ap-anschrift        
        ), // end ap-daten
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