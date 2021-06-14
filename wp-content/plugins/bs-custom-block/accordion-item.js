(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var RichText = editor.RichText;
  var BlockControls = editor.BlockControls;
  var AlignmentToolbar = editor.AlignmentToolbar;
  var MediaUpload = editor.MediaUpload;
  var InspectorControls = editor.InspectorControls;
  var TextControl = components.TextControl;
  
  registerBlockType('my-lb-block/accordion-item', {
    title: i18n.__('Akkordeon-Element', 'my-lb-block'),
    description: i18n.__('A custom block for displaying accordion-item', 'my-lb-block'),
    icon: 'id',
    category: 'common',
    attributes: {
      accordion_head: {
      type: 'text',
      selector: 'h3'
      },
      accordion_content: {
      type: 'text',
      selector: 'p'
      }
    },
      edit: function (props) {
      var attributes = props.attributes;
      return [
        el(
          'div', {
            className: props.className,
            style: { textAlign: attributes.alignment,border:'1px solid grey',padding:'24px' }
          },
          el(
            "div",
            null,
            "Accordion-Item"
          ),   
          el(
            'div', 
            {
              className: 'accordion-item',
              style:{display:'inline-block',width:'100%'}
            },
            el(
              RichText, 
              {
                key: 'editable',
                tagName: 'h3',
                className: 'accordion_head',
                placeholder: i18n.__('Accordion-Head', 'my-lb-block'),
                keepPlaceholderOnFocus: true,
                value: attributes.accordion_head,
                onChange: function (newTitle) {
                  props.setAttributes({accordion_head: newTitle})
                }
              }
            ),
            el(RichText, {
              key: 'editable',
              tagName: 'p',
              className: 'accordion_content',
              placeholder: i18n.__('Accordion-Content', 'my-lb-block'),
              keepPlaceholderOnFocus: true,
              value: attributes.accordion_content,
              onChange: function (newText) {
                props.setAttributes({accordion_content: newText})
              }
            })
          )
        )
      ];
    },
    save: function (props) {
      var attributes = props.attributes;
      return (
        el(
          'div', {
            className: 'accordion-item'
          },
          el(RichText.Content, {
            tagName: 'div',
            className: 'question',
            value: ''+attributes.accordion_head+''
          }),
          el(RichText.Content, {
            tagName: 'div',
            className: 'answer',
            value: attributes.accordion_content
          })
        )
      );
    },
  })
})
(
window.wp.blocks,
window.wp.blockEditor,
window.wp.components,
window.wp.i18n,
window.wp.element
);
