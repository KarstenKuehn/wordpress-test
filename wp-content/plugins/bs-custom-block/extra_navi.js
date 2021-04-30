( function( blocks, editor, element ) {
  var el = element.createElement;

  blocks.registerBlockType( 'lb/zz', {
    title: 'zzz', // The title of block in editor.
    icon: 'admin-comments', // The icon of block in editor.
    category: 'common', // The category of block in editor.
attributes: {
  content: {
  type: 'text',
  selector: 'p'
  },
  button: {
    type: 'string',
    default: 'Join Today'
  }
},
edit: function( props ) {
  return (
    el( 'div', { className: 'cc' , style:{display:'inline-block',width:'50%',verticalAlign:'top',border:'1px solid red'},},
      el(
        editor.RichText,
        {
          key: 'editable',
          tagName: 'p',
          className: 'b',
          value: props.attributes.content,
          onChange: function( newText ) {
            props.setAttributes( { content: newText } );
          }
        }
      ),
      el(
        editor.RichText,
        {
          tagName: 'span',
          className: 'a',
          value: props.attributes.button,
          onChange: function( content ) {
            props.setAttributes( { button: content } );
          }
        }
      ),
    )
  );
},
save: function( props ) {
  return (
    el( 'section', { className: 'content_section'},
      el( editor.RichText.Content, {
        tagName: 'p',
        className: 'b',
        value: props.attributes.content,
      } ),
      el( 'button', { className: 'a' },
        props.attributes.button
      )
    )
  );
},
  } );
} )( window.wp.blocks, window.wp.editor, window.wp.element );