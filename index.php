<?php
if (!session_start()) echo "session not started<br>";
header("Cache-control: private"); //IE 6 Fix 
$page = 'home'; if (isset($_GET['page'])) $page = $_GET['page'];
include 'includes/ClassPage.php';
$mypage = new pageobj($page);
// if page requires database
if ($mypage->usedb == 'yes') {
  include 'db/includes/configuration.php';
  include 'db/classes/ClsDb.php';
  include 'db/classes/classes.php';
  include 'db/includes/utils.php';

  $db = new db();
  $dateobj = new ClsDate();
  list($cutoffdate, $unixcutoff) = $dateobj->cutoffmonths();
} // close if requires database
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0" >

<title><?php echo $mypage->title; ?></title>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' ></script>
<script type='text/javascript' src='jsfiles/dropmenu.js'></script>
<script type='text/javascript' src='jsfiles/libroll.js'></script>
<script type='text/javascript' src='jsfiles/homerolls.js'></script>
<script type='text/javascript' src='jsfiles/dynamic.js'></script>

<link rel="stylesheet" type="text/css" href="cssfiles/general.css" >

</head><body>

<div id='wrapper'>

<div id='header' >
<img style="float:right; " src='gifs/PlaneTrans86.gif' alt='' >
<img style="float:left; "  src='gifs/EmgwPlacque.gif'  alt='' >
<img style=" "  src='gifs/LogoTrans.gif'  alt='' >
<?php include 'includes/dropmenu.htm'; ?>
<div style='clear:both; height:0px; '></div>
</div> <!-- close header -->

<div id='columnwrapper'>
<?php $mypage->getcontent(); ?>
</div> <!-- close columnwrapper -->

<div id='footer'>
<?php include 'includes/footer.htm'; ?>
</div>

</div> <!-- close wrapper -->

<script type='text/javascript' >
$(document).ready(function() {

function pageWidth() { return window.innerWidth != null ? 
  window.innerWidth : document.documentElement && document.documentElement.clientWidth ?
  document.documentElement.clientWidth : document.body != null ?
  document.body.clientWidth : null; }

/*** adjust for window width ***/
var sizeobj = {
  leftwidth : '759px'
, rightwidth : '180px'
, wrapperwidth : '960px'
, cutoffwidth : 1000
, margin : 30
, headercontent : ''
, ajaxloaded : false
, originalwidth : ''
, init : function() {
    sizeobj.originalwidth = pageWidth();
    $("#left").hide();
    sizeobj.headercontent = $("#header").html();
    $(window).bind("resize", sizeobj.doresize);
    sizeobj.doresize(); 
  }
, doresize : function() {
    width = pageWidth();   
    //$('#header').html(sizeobj.headercontent  + "<br><br><br><br>sizeobj.orignalwidth: " + sizeobj.originalwidth) ;
    if ( width > sizeobj.cutoffwidth) {
      //if (sizeobj.ajaxloaded == false) sizeobj.doajaxload();
      //$("#sprigslogo").show();
      $("#wrapper").css('width', sizeobj.wrapperwidth); // fixed block size if large window
      $("#right").css('width', sizeobj.rightwidth);
      $("#left").css('width', sizeobj.leftwidth);
      $("#right").css('display', 'inline-block');
      $("#left").css('display', 'inline-block');
    } else {
      //$("#sprigslogo").hide();
      $("#wrapper").css('width', width - sizeobj.margin);
      $("#left").css('width', width - sizeobj.margin);
      //$("#left").css('width', width - sizeobj.margin);
      $("#right").css('display', 'none');
      $("#left").css('display', 'block');
    }
  }  // close doresize
,  doajaxload : function() {
    //$("#message").html("doajaxload called!");
    $.ajax({ type: "post", url: "ajaxprocess.php", dataType: 'json',
      data: "process=load" + "&pageid=<?php echo $page; ?>",
      success: function(myreturn) {
        //$('#message').html(myreturn.msg);
        $('#left').html(myreturn.leftcolumn);
        sizeobj.ajaxloaded = true;
        imageobj.init();
      }, // success
      error: function(jqXHR, textStatus, errorThrown) {
        $('#message').html('ajax error: ' + jqXHR.responseText);
        $('#message').append('<br>textStatus: ' + textStatus);
        $('#message').append('<br>Error Thrown: ' + errorThrown);
      }  // close error
    }); // ajax
  }  // close doajaxload
}  // close sizeobj

sizeobj.init()

}); // ready
</script>

</body></html>
