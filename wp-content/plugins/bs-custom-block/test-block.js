wp.blocks.registerBlockType('brad/border-box', {
  title: 'Simple Box',
  icon: 'smiley',
  category: 'common',
  attributes: {
    text1: {type: 'string'},
    text2: {type: 'string'},
//    color: {type: 'string'}
  },
  
 
  edit: function(props) {
    function updateContent(event) {
      props.setAttributes({text1: event.target.value})
    }
    function updateContent2(event) {
      props.setAttributes({text2: event.target.value})
    }

    function updateColor(value) {
      props.setAttributes({color: value.hex})
    }
    return React.createElement(
      "div",
      null,
      React.createElement(
        "div",
        null,
        "Simple Box"
      ),
      React.createElement("input", { name: "text1", type: "text", value: props.attributes.text1, onChange: updateContent }),
      React.createElement("input", { name: "text2",type: "text", value: props.attributes.text2, onChange: updateContent2 }),
//      React.createElement(wp.components.ColorPicker, { color: props.attributes.color, onChangeComplete: updateColor })
    );
  },
  save: function(props) {
    return wp.element.createElement(
      "div",
      { style: { border: "3px solid " } },
      wp.element.createElement(
        "div",
        { style: { border: "3px solid black" , padding:"25px" , margin:"25px"} },
        props.attributes.text1
      ),
      wp.element.createElement(
        "button",
        { value:props.attributes.text2,style: { border: "3px solid red" , padding:"25px" , margin:"25px"} },
        props.attributes.text2
      )
    );
  }
})
