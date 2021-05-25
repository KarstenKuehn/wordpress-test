(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;
var MediaUpload = editor.MediaUpload;
  blocks.registerBlockType( 'lb/benefits-text', {
    title: 'Benefits-Text', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'common', // The category of block in editor.
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
    edit: function( props ) {

var onSelectImage = function (media) {
return props.setAttributes({
mediaURL: media.url,
mediaID: media.id,
mediaALT: media.alt
})
};      
      return (
        el( 'div', { 
          className: props.className,
          style:{border:'1px solid gray', paddingBottom:'10px'} 
          },
          el("div",{
            style: { 
              textAlign: props.attributes.alignment,
              borderBottom:'1px solid grey',
              margin:'10px',padding:'10px' }
            },
            "Benefits Text Modul"
          ),
          el( 'div', { 
            className: 'content-block',
            style:{
              display:'inline-block',
              width:'50%',
              verticalAlign:'top', 
              padding:'32px'} 
            },      
            el( editor.RichText, {
              tagName: 'ul',
               placeholder: i18n.__('Benefits-Liste', 'lb'),
              multiline: 'li',
              className: 'ingredients',
              value: props.attributes.ingredients_l,
              onChange: function( value ) {
                props.setAttributes( { ingredients_l: value } );
              },
            }),
            el( editor.RichText, {
              tagName: 'div',
              multiline: 'p',
              className: 'block',
               placeholder: i18n.__('Benefits-Inhalt', 'lb'),
              value: props.attributes.content,
              onChange: function( value ) {
                props.setAttributes( { content: value } );
              },
            } ),
            
            el(
              "hr",
              null
            ),          
            el(
              "span",
              null,
              "Button URL: "
            ),    
            el(editor.RichText, {
            type: 'url', 
            key: 'editable',
            tagName: 'span',
            className: 'my-block-text url',
            placeholder: i18n.__('Button-URL', 'lb'),
            value: props.attributes.buttonURL,
            onChange: function (newURL) {
            props.setAttributes({buttonURL: newURL})
            }
            }),          

            el(
                editor.RichText,
                {
                  tagName: 'p',
                  className: 'button_x',
                  style:{display:'block',width:'50%',verticalAlign:'top',background:'#0061AB',color:'#fff',textAlign:'center'},
                  value: props.attributes.button,
                  onChange: function( content ) {
                    props.setAttributes( { button: content } );
                  }
                }
              ),  
          ),



        el( 'div', { className: 'content-block',style:{display:'inline-block',width:'50%',verticalAlign:'top', padding:'32px'} }, 


        el(
          MediaUpload, {
            onSelect: onSelectImage,
            type: 'image',
            value: props.attributes.mediaID,
            render: function (obj) {
              return el(
                components.Button, {
                className: props.attributes.mediaID ? 'image-button' : 'button button-large',
                style:{height:'auto',width:'auto'},
                onClick: obj.open
                },
                !props.attributes.mediaID ? i18n.__('Benefits-Icon', 'lb') : el('img', {src: props.attributes.mediaURL,alt: props.attributes.mediaALT,
                style:{height:'auto',width:'auto'}})
              )
            }
          }
        ),
        el( editor.RichText, {
          tagName: 'ul',
           placeholder: i18n.__('Liste', 'lb'),
          multiline: 'li',
          className: 'ingredients',
          value: props.attributes.ingredients_r,
          onChange: function( value ) {
            props.setAttributes( { ingredients_r: value } );
          },
        } ),
        el( editor.RichText, {
          tagName: 'div',
          multiline: 'p',
          className: 'block',
           placeholder: i18n.__('Inhalt Spalte-rechts', 'lb'),
          value: props.attributes.block,
          onChange: function( value ) {
            props.setAttributes( { block: value } );
          },
        } ),           
        el(
          "hr",
          null
        ),          
        el(
          "span",
          null,
          "Button URL: "
        ),    
        el(editor.RichText, {
        type: 'url', 
        key: 'editable',
        tagName: 'span',
        className: 'my-block-text url',

        placeholder: i18n.__('Button-URL', 'lb'),
        value: props.attributes.buttonURL_right,
        onChange: function (newURL) {
        props.setAttributes({buttonURL_right: newURL})
        }
        }),          

        el(
            editor.RichText,
            {
              tagName: 'p',
              className: 'button_x',
              style:{display:'block',width:'50%',verticalAlign:'top',background:'#0061AB',color:'#fff',textAlign:'center',},
              value: props.attributes.button_right,
              onChange: function( content ) {
                props.setAttributes( { button_right: content } );
              }
            }
          ),  
        ),
        )
      );
    },
    save: function( props ) {
      return (
        el( 'section', { className: 'content_section' },
          el('div',{
            className: 'two-column-text benefits'
            },
            el('div',{
              className: 'text_left'
              },
              !props.attributes.ingredients_l||props.attributes.ingredients_l=='<li></li>' ? '':el( editor.RichText.Content, {
                tagName: 'ul',
                className: 'ingredients aaa',
                value: props.attributes.ingredients_l,
              } ),              
              el( editor.RichText.Content, {
                tagName: '',
                className: 'block_content content',
                value: props.attributes.content,
                },
              ),// end p   

              !props.attributes.buttonURL ? '': 
              el('a', {
                className: 'my-block-button content',
                href: props.attributes.buttonURL
                },       
                el(
                  'span',{
                    className:'button-text wp-block-button__link'
                  },
                  props.attributes.button
                ),      
              )//end a
            ),
            el('div',{
              className: 'text_right'
              },
              el('img', {
                src: props.attributes.mediaURL,
                alt: props.attributes.mediaALT,
                className:'block_image benefits_image'
              }),              
              !props.attributes.ingredients_r||props.attributes.ingredients_r=='<li></li>' ? '':el( editor.RichText.Content, {
                tagName: 'ul',
                className: 'ingredients aaa',
                value: props.attributes.ingredients_r,
              } ),
              el( editor.RichText.Content, {
                tagName: '',
                className: '',
                value: props.attributes.block,
              } ),

              !props.attributes.buttonURL_right ? '': 
              el('a', {
                className: 'my-block-button content',
                href: props.attributes.buttonURL_right
                },       
                el(
                  'span',{
                    className:'button-text wp-block-button__link'
                  },
                  props.attributes.button_right
                ),      
              )//end a
            )
          )
        )// end section
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