(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;
  blocks.registerBlockType( 'lb/two-column-text', {
    title: '2-Spalten-Text', // The title of block in editor.
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
    edit: function( props ) {
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
            "Zwei Spalten Text Modul"
          ),
          el(editor.RichText, {
            style: { 
              textAlign: props.attributes.alignment,
              margin:'10px',padding:'0 10px' 
            },            
          type: 'text',
          label: i18n.__('Überschrift <H2>', 'lb'),
          key: 'editable',
          tagName: 'h2',
          className: 'my-block-text title',
          placeholder: i18n.__('Überschrift <H2>', 'lb'),
          keepPlaceholderOnFocus: true,
          value: props.attributes.headline,
          onChange: function (newTitle) {
          props.setAttributes({headline: newTitle})
          }
          }),

          el( 'div', { 
            className: 'content-block',
            style:{
              display:'inline-block',
              width:'50%',
              verticalAlign:'top', 
              padding:'32px'} 
            },      
            el( editor.RichText, {
              tagName: 'div',
              multiline: 'p',
              className: 'block',
               placeholder: i18n.__('Inhalt Spalte-links', 'lb'),
              value: props.attributes.content,
              onChange: function( value ) {
                props.setAttributes( { content: value } );
              },
            } ),            
            el( editor.RichText, {
              tagName: 'ul',
               placeholder: i18n.__('Liste', 'lb'),
              multiline: 'li',
              className: 'ingredients',
              value: props.attributes.ingredients_l,
              onChange: function( value ) {
                props.setAttributes( { ingredients_l: value } );
              },
            }),

            
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
          !props.attributes.headline ? '':el( editor.RichText.Content, {
              tagName: 'h2',
                className: 'content',
                value: props.attributes.headline,
              } ),          
          el('div',{
            className: 'two-column-text'
            },

            el('div',{
              className: 'text_left'
              },
              el( editor.RichText.Content, {
                tagName: '',
                className: 'block_content content',
                value: props.attributes.content,
                },
              ),// end p 
              !props.attributes.ingredients_l||props.attributes.ingredients_l=='<li></li>' ? '':el( editor.RichText.Content, {
                tagName: 'ul',
                className: 'ingredients',
                value: props.attributes.ingredients_l,
              } ),
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

              el( editor.RichText.Content, {
                tagName: '',
                className: '',
                value: props.attributes.block,
              } ),
              !props.attributes.ingredients_r||props.attributes.ingredients_r=='<li></li>' ? '':el( editor.RichText.Content, {
                tagName: 'ul',
                className: 'ingredients',
                value: props.attributes.ingredients_r,
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