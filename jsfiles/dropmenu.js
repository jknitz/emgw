menuobj = {
  backover  : "#a00"
, backout   : "#600"
, colorout  : "#fff97b"
, colorover : "#fff97b"
, over : function () {
    $(this).css("background",menuobj.backover);
    $(this).css("color",menuobj.colorover);
    $(this).children("div").show();
  }
, out : function(){
    $(this).css("background",menuobj.backout);
    $(this).css("color",menuobj.colorout);
    $(this).children("div").hide();
  }
, aover : function () {
    $(this).css("background",menuobj.backover);
  }
, aout : function(){
    $(this).css("background",menuobj.backout);
  }
, setbackground : function() { 
    $(this).css("background",menuobj.backout) 
    $(this).css("color",menuobj.colorout) 
  }
}

$(document).ready(function() {
  $("#menu .menu ").each( menuobj.setbackground );
  $("#menu a ").each( menuobj.setbackground );
  //$("#menu .nodrop ").each( menuobj.setbackground );
  $("#menu .nodrop a").hover( menuobj.over, menuobj.out );
  //$("#menu .nodrop a ").each( menuobj.setbackground );
  $("#menu .submenu").hide(); 
  $("#menu .menu ").hover( menuobj.over, menuobj.out );
  $("#menu .submenu a").hover( menuobj.aover, menuobj.aout );
  $("#menu .menu a").click( menuobj.aout );
}); // document ready
