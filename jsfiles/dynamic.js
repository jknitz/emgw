
$(document).ready(function() {

  /*** show and hide mechanism for home page content ***/
    setup = {
    buttonout  : '#fea'
  , buttonover : '#ec7'
  , hideout    : '#fea'
  , hideover   : '#ec7'
  , contentid  : '#left'
  }
  var buttons     = $(setup.contentid + " .showbutton");
  var hidebuttons = $(setup.contentid + " .hidebutton");
  buttons.hover(function(){ $(this).css('background',setup.buttonover) } ,
                function(){ $(this).css('background',setup.buttonout)  } );
  buttons.click(function(){ var mytop = $(this).parent().offset().top - 100;
                            if($.browser.safari){ bodyelem = $("body") } else{ bodyelem = $("html,body") }
                            $(bodyelem).animate({scrollTop:mytop + "px"},'slow');
                            $(this).parent().find(".showbutton").hide();
                            $(this).parent().find(".mycontent").slideDown(1000);
               });
  hidebuttons.hover(function(){ $(this).css('background',setup.hideover) } ,
                    function(){ $(this).css('background',setup.hideout) } );
  hidebuttons.click(function(){ $(this).parent().parent().find(".mycontent").slideUp(1000); 
                                $(this).parent().parent().find(".showbutton").show(); });
  buttons.css("background", setup.buttonout);
  hidebuttons.css("background", setup.hideout);
  
  /*** equalize heights of left and right columns ***/
function columnequalize() {
  var leftheight  = $("#left").height();
  var rightheight = $("#right").height();
  if (leftheight > rightheight) $("#right").height(leftheight);
  else $("#left").height(rightheight);
};

}); // document ready
