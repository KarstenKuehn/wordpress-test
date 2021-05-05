( function( blocks, editor, element ) {
  var el = element.createElement;

  blocks.registerBlockType( 'lb/two-column-text', {
    title: 'UPLB-Two-Column-Text', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'common', // The category of block in editor.
    attributes: {
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
      }
    },
    edit: function( props ) {
      return (
        el( 'div', { className: props.className,style:{border:'1px solid red'} },
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
        el( 'div', { className: 'content-block',style:{display:'inline-block',width:'50%',verticalAlign:'top',border:'1px solid blue'} },      
          el(
            editor.RichText,
            {
              tagName: 'span',
              className: 'button',
              value: props.attributes.button,
              onChange: function( content ) {
                props.setAttributes( { button: content } );
              }
            }
          ),
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
        el( 'section', { className: 'content_section' },
          el('div',{
            className: 'two-column-text'
            },
            el('div',{
              className: 'text_left'
              },
              el( 'p', {
                className: 'content',
                },
                props.attributes.content
              ),// end p
              el( 'button', { 
                className: 'button' 
                },
                props.attributes.button
              )
            ),
            el('div',{
              className: 'text_right'
              },
              el( 'p', {
                className: 'content',
                },
                props.attributes.content_right
              ),// end p
              el( 'button', { 
                className: 'button' 
                },
                props.attributes.button
              )
            )
          )
        )// end section
      );
    },
  } );
} )( window.wp.blocks, window.wp.blockEditor, window.wp.element );