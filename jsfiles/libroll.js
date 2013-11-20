/** file: libroll.js
 *  jkn 2/27/11
 **/

  var smallprefix;
  var prefix;
  var postfix;
  var thumbs;
  var images;
  
  function createimgs(myobject) {
    smallprefix = "<div style=\'position:absolute; \'>"; 
    smallprefix += "<img  src=\'" + myobject.imagefolder + '/';
    prefix = "<div style=\'position:absolute; \'> <img src=\'" + myobject.imagefolder + '/';
    postfix = ".jpg\' /></div>\n";
    for (var i=0;i<myobject.sources.length;i++) {
      var thumbhtml = $("#" + myobject.thumbsdivid).html();                                                               // get existing contents
      $("#" + myobject.thumbsdivid).html( thumbhtml + smallprefix + myobject.sources[i] + myobject.smalldash + postfix);  // add new thumb
      var imagehtml = $("#" + myobject.imagedivid).html();
      $("#" + myobject.imagedivid).html( imagehtml + prefix + myobject.sources[i] + postfix);
    }
    //alert( $("#" + myobject.thumbsdivid).html());
    thumbs = $("#" + myobject.thumbsdivid + ' img');
    images = $("#" + myobject.imagedivid + ' img');
    images.hide();
    thumbs.hide();
    for (var j=0;j<thumbs.length;j++) {
      $(thumbs[j]).addClass(myobject.thumbclass+j);  
      $(images[j]).addClass(myobject.imageclass+j);
      $(thumbs[j]).data('imageselector', '#' + myobject.imagedivid + ' img.' + myobject.imageclass + j);
      $(thumbs[j]).hover( function(){showimage($(this).data('imageselector'), myobject.topoffset)} , function(){unshowimage(myobject);} ) ;
    }
  } // createimgs

  function start(myobject) { 
    $("#" + myobject.buttonid).click(function(){startstop(myobject)});
    $("#" + myobject.buttonid).hover(function(){$(this).css('background', '#ea6')}, function(){$(this).css('background', '#fc9')});
    $("#" + myobject.thumbsdivid + ' img:first').show();
    myobject.interval = setInterval(function(){sift(myobject)}, 3000);
  }
  startstop = function(myobject) {
    if (myobject.runstate == 'run') {
      myobject.runstate = 'stop';
      $('#' + myobject.buttonid).text('start');
      clearInterval(myobject.interval);
    } else {   
      myobject.runstate = 'run';
      $('#' + myobject.buttonid).text('stop');
      start(myobject);
    }
  }
  function sift(myobject)  { 
    var qty = myobject.sources.length;
    if (myobject.index < qty - 1){myobject.index+=1 ; }  
    else {myobject.index=0;}
    showthumb(myobject.index,myobject);  
  }  
  function showthumb(num,myobject) {  
    $('#' + myobject.thumbsdivid + ' img').fadeOut(500);  
    $('#' + myobject.thumbsdivid + ' img.' + myobject.thumbclass + num).stop().fadeIn(500);  
  }
  function showimage(target, topoffset) { 
    $(target).parent().css("top",$(window).scrollTop() - topoffset + "px");
    $(target).show();
  }
  function unshowimage(object) {
       $('#' + object.imagedivid + ' img').hide();
  }
  
