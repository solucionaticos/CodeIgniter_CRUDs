$(function () {
    editAreaLoader.init({
      id: "codigo_php_backed" // id of the textarea to transform    
      ,start_highlight: true  // if start with highlight
      ,allow_resize: "both"
      ,allow_toggle: true
      ,word_wrap: false
      ,language: proyVar.lang
      ,syntax: "php"  
    });
  
    editAreaLoader.init({
      id: "codigo_php_frontend" // id of the textarea to transform    
      ,start_highlight: true  // if start with highlight
      ,allow_resize: "both"
      ,allow_toggle: true
      ,word_wrap: false
      ,language: proyVar.lang
      ,syntax: "php"  
    });  
});