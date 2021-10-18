(function (blocks, editor, components, i18n, element) {
  var el = element.createElement;
  var registerBlockType = blocks.registerBlockType;
  var RichText = editor.RichText;
  var BlockControls = editor.BlockControls;
  var AlignmentToolbar = editor.AlignmentToolbar;
  var MediaUpload = editor.MediaUpload;
  var InspectorControls = editor.InspectorControls;
  var TextControl = components.TextControl;
 var InnerBlocks = editor.InnerBlocks; 
  registerBlockType('bitv/accordion-item', {
    title: 'Akkordeon-Element',
    description: 'Ein benutzerdefinierter Block zum Anzeigen von Akkordeon-Elementen',
    icon: 'align-wide',
    category: 'bitv-blocks',
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
            "Akkordeon-Element"
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
                placeholder: 'Akkordeon-Head',
                keepPlaceholderOnFocus: true,
                value: attributes.accordion_head,
                onChange: function (newTitle) {
                  props.setAttributes({accordion_head: newTitle})
                }
              }
            ),
          el(
          InnerBlocks,
          {
            template: [
              ['core/paragraph',{className:'block-text content','placeholder':'Blocktext'}],                  
            ],
          }
        ),
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


          el(
          'h5', {},
          el(RichText.Content, {
            tagName: 'button',
            className: 'question',
            'aria-label':attributes.accordion_head,
            'aria-expanded':false,
            'role':'heading',
            'aria-level':3,            
            value: ''+attributes.accordion_head+''
          }),),

        el(
          'div', {
            className: 'answer'
          }, 
          el( InnerBlocks.Content, {} ),
          ),
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
