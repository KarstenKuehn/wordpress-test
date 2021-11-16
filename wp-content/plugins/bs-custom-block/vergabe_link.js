(function (blocks, editor, components, i18n, element) {
var el = element.createElement;
var registerBlockType = blocks.registerBlockType;
var RichText = editor.RichText;
var BlockControls = editor.BlockControls;
var AlignmentToolbar = editor.AlignmentToolbar;
var MediaUpload = editor.MediaUpload;
var InspectorControls = editor.InspectorControls;
var TextControl = components.TextControl;

  var RangeControl = wp.components.RangeControl;

var DateTimePicker = wp.components.DateTimePicker;
var d = new Date();

var tag = d.getDate();

var monat = d.getMonth() + 1;

var jahr = d.getFullYear();
var hours = ('0'+d.getHours()).substr(-2);
var minutes = ('0'+d.getMinutes()).substr(-2);
var seconds = ('0'+d.getSeconds()).substr(-2);  

//var uhrzeit = tag + "." + monat + "." + jahr ;
var uhrzeit = jahr + "-" + monat + "-" + tag+'T'+hours+':'+minutes+':'+seconds ;
 var __ = wp.i18n.__;
  blocks.registerBlockType( 'lb/vergabe-link', {
    title: 'Vergabe-Link', // The title of block in editor.
    icon: 'admin-links', // The icon of block in editor.
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
  title: {
  type: 'text',
  selector: 'h3'
  },
  text: {
  type: 'text',
  selector: 'p'
  },
  buttonText: {
  type: 'text'
  },
  buttonURL: {
  type: 'url'
  },
  alignment: {
  type: 'string',
  default: 'center'
  },
    ablaufdatum: {
      type: 'string', 
      default: uhrzeit
    },

        dateFrom: {
            type: 'strings',
        },
        dateTo: {
            type: 'string',
        },



},
edit: function (props) {
var attributes = props.attributes;
var modul_datum = attributes.dateTo;
var color= 'gray';
if(Date.parse(modul_datum) >= Date.parse(uhrzeit)) {color= 'green';}
else{
  color= 'red';
}
var onSelectImage = function (media) {
return props.setAttributes({
mediaURL: media.url,
mediaID: media.id,
mediaALT: media.alt
})
};
return [
  el(
    'div', {
    className: '',
    style: { textAlign: attributes.alignment,border:'1px solid '+color,paddingBottom:'10px' }
    },
    el(InspectorControls, {
      key: "setting"
    },

/*

      el("div", {
        id: "Ablaufdatum Controls"
      },
        el("fieldset", null, el("legend", {
          className: "blocks-base-control__label"
        }, (0, __)('Ablaufdatum', 'gutenpride')), el(TextControl, {
          value: props.attributes.ablaufdatum,
          onChange: (value) => {
            props.setAttributes({ ablaufdatum: value });
          }
        }))

      )
,
  
*/
      el("div", {
        id: "test"
      },
        el("fieldset", null, el("legend", {
          className: "blocks-base-control__label"
        }, (0, __)('Ablaufdatum test', 'gutenpride')), el(DateTimePicker, {
          label:'myLabel',
          value: props.attributes.dateTo,
          currentDate:props.attributes.dateTo,
          onChange: (value) => {
            props.setAttributes({ dateTo: value });
          }
        }))

      )


      ),



      el(
        "hr",
        null
      ),
      el(
        "span",
        null,
        "Link URL: "
      ),    
      el(RichText, {
      type: 'url',
      label: i18n.__('Button URL', 'lb'),
      value: attributes.buttonURL,    
      key: 'editable',
      tagName: 'p',
      className: 'button-url',
      placeholder: i18n.__('TextURL', 'lb'),
      keepPlaceholderOnFocus: true,
      value: attributes.buttonURL,
      onChange: function (newURL) {
      props.setAttributes({buttonURL: newURL})
      }
      }),
      el(
        "span",
        null,
        "Link Text: "
      ),    
      el(RichText, {
      type: 'text',
      label: i18n.__('Button Text', 'lb'),
      value: attributes.buttonText,    
      key: 'editable',
      tagName: 'p',
      className: 'button-text',
      placeholder: i18n.__('ButtonText', 'lb'),
      keepPlaceholderOnFocus: true,
      value: attributes.buttonText,
      onChange: function (newbuttonText) {
      props.setAttributes({buttonText: newbuttonText})
      }
      }),  
      el(
        "span",
        {style: { color:color,fontWeight:'700'}
    },
        "Ablaufdatum: "+attributes.dateTo
      ),


  )//end Modul

];
},
save: function (props) {
var attributes = props.attributes;
datei_ablaufdatum = attributes.dateTo;
testdatum = uhrzeit;

return (
//  attributes.ablaufdatum == '8.11.2021'?
//  Date.parse(datei_ablaufdatum) >= Date.parse(uhrzeit)?
  //(
    el('a', {
      className: 'vergabe-link',
      href: attributes.buttonURL,
      //ablaufdatum:attributes.ablaufdatum,
      dateTo:datei_ablaufdatum,
      },   
      attributes.buttonText  
    )//ist aktuell
  //)
  //:
  //(
//''
  //)
)// end return
}// end save()
}//end registerBlockType
)
})(
window.wp.blocks,
window.wp.editor,
window.wp.components,
window.wp.i18n,
window.wp.element
);



