(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;

  blocks.registerBlockType( 'lb/two-column-text', {
    title: 'UPLB-Two-Column-Text', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'common', // The category of block in editor.
    attributes: {
      headline: {
        type: 'string',
        default: 'Lorem ipsum dolor sit amet.',
      },
      content: {
        type: 'string',
        default: 'Collaboratively customize web-enabled supply chains and turnkey collaboration and idea-sharing Assertively cultivate.'
      },
      content_right: {
        type: 'string',
        default: 'Collaboratively customize web-enabled supply chains and turnkey collaboration and idea-sharing Assertively cultivate.'
      },
      button: {
        type: 'string',
        default: 'Join Today'
      },
      buttonURL: {
      type: 'url'
      },      
    },
    edit: function( props ) {
      return (
        el( 'div', { className: props.className,style:{border:'1px solid red'} },
  el(editor.RichText, {
  type: 'text',
  label: i18n.__('Headline', 'lb'),
  value: props.attributes.headline,    
  key: 'editable',
  tagName: 'h3',
  className: 'my-block-text title',
  placeholder: i18n.__('Headline', 'lb'),
  keepPlaceholderOnFocus: true,
  value: props.attributes.headline,
  onChange: function (headline) {
  props.setAttributes({headline: headline})
  }
  }),

/*
          !props.attributes.headline ?          el(
          "h2",
          null,i18n.__('headline', 'lb') ): el(
            editor.RichText,
            {
              tagName: 'h2',
              className: 'text',
              value: props.attributes.headline,
              onChange: function( headline ) {
                props.setAttributes( { headline: headline } );
              }
            }
          ),  

*/

        el( 'div', { className: 'content-block',style:{display:'inline-block',width:'50%',verticalAlign:'top',border:'1px solid blue'} },      
          el(
            editor.RichText,
            {
              tagName: 'p',
              className: 'text',
              value: props.attributes.content,
              onChange: function( content ) {
                props.setAttributes( { content: content } );
              }
            }
          ),             
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
              style:{display:'block',width:'50%',verticalAlign:'top',border:'1px solid blue',background:'#0061AB',color:'#fff'},
              value: props.attributes.button,
              onChange: function( content ) {
                props.setAttributes( { button: content } );
              }
            }
          ),




     
        ),


/*

          el(
            editor.RichText,
            {
              tagName: 'div',
              className: 'content-block',
              style:{display:'inline-block',width:'50%',verticalAlign:'top',border:'1px solid green'},
              value: props.attributes.content,
              onChange: function( content ) {
                props.setAttributes( { content: content } );
              }
            }
          ),

*/

        el( 'div', { className: 'content-block',style:{display:'inline-block',width:'50%',verticalAlign:'top',border:'1px solid blue'} },      
          el(
            editor.RichText,
            {
              tagName: 'p',
              className: 'text',
              value: props.attributes.content_right,
              onChange: function( content ) {
                props.setAttributes( { content_right: content } );
              }
            }
          ),          
        )
        )
      );
    },
    save: function( props ) {
      return (
        el( 'section', { className: 'content_section medium' },
          el('div',{
            className: 'two-column-text'
            },
              !props.attributes.headline ? '':el( 'h2', {
                className: 'block_headline content',
                },
                props.attributes.headline),

            el('div',{
              className: 'text_left'
              },
              el( 'p', {
                className: 'block_content content',
                },
                props.attributes.content
              ),// end p    
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
              el( 'p', {
                className: 'block_content content',
                },
                props.attributes.content_right
              ),// end p   
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