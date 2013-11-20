<style>
/*** images ***/
div.smbox        { float:left; padding:5px; margin:10px; border:2px solid #600; text-align:center; }
div.smtitle      {  }
img.lgimg        { position:absolute; z-index:30; left:100px; }
</style>

<div style='position:relative; width:890px; margin:20px 40px '>
<h1 style='text-align:center; '>The Writing Table Project</h1>
<div style='text-align:center;'>(Note: click on image to enlarge/reduce)</div>
<h2>The Purpose of the Project</h2>
<div class='smbox' style='float:right; '>
  <img class='smimg' id='smtable' src='images/writingtable/WritingDesk-200.jpg' />
  <div class=smtitle' >Writing Table</div>
</div>
<p>
The guild has an excellent history of charitable projects in which work was undertaken to create something to donate to a specific cause.
These projects include: a display case for the Milford Senior Center, boxes of blocks for Clinton Early Childhood Resource Center, and a credenza for the 
Molly Bish Institute at the Mount Wachusetts Community College.
</p><p>
<div class='smbox' style='float:left; '>
  <img class='smimg' id='smdove' src='images/writingtable/DovetailAssembled-200.jpg' />
  <div class=smtitle' >Check those Dovetails</div>
</div>
In 2010/2011 the guild decided to undertake a project to build an exemplary piece of furniture which would not be donated, but would serve as an
showpiece for the guild's mission.
The ultimate disposition of the piece is not as of this writing determined; perhaps it will be sold at auction.
Meanwhile it will be displayed at various suitable venues.
</p>
<h2 style='clear:both; '>The Project Selection</h2>
<p>
The criteria for selecting the project were:
</p>
<ul style='margin-left:30px; '>
<li>It had to illustrate the excellent skills of the guild membership</li>
<div class='smbox' style='float:right; '>
  <img class='smimg' id='smwide' src='images/writingtable/WideDrawerFinalfit-200.jpg' />
  <div class=smtitle' >Fitting the Drawer Front</div>
</div>
<li>It had to allow the participation of as many members who wished to participate</li>
<li>It had to be completed within about six months</li>
</ul>
<p>
It was decided that a writing table and associated chair would meet thses requirements.
</p>
<h2>The Project Team</h2>
<p>
The design and execution of this project was headed by Fritz Smith.  
We are very grateful for his woodworking and leadership skills which were quite evident during this excellent enterprise.
Many other members participated in the enterprise.  
</p>
<br>
<a  href='http://www.emgw.org/galleries/writingtable/thumbpage.php'>
  Click for the Gallery
</a>

<div class='notice' style='text-align:center; margin:20px 0 10px 0;'>Writing Desk at Sprinkler Show</div>

<div style='text-align:center; margin:10px 0 10px 0;'>
<img  src='images/WritingDesk-crop-400.jpg' >
</div>
<br><br><br>

<img class='lgimg' id='lgtable' src='images/writingtable/WritingDesk-500.jpg' />
<img class='lgimg' id='lgdove'  src='images/writingtable/DovetailAssembled-500.jpg' />
<img class='lgimg' id='lgwide'  src='images/writingtable/WideDrawerFinalfit-500.jpg' />
</div> <!-- close overall div -->
<script type='text/javascript'>
$(document).ready(function() {

function posTop() { return typeof window.pageYOffset != 'undefined' ?
  window.pageYOffset : document.documentElement && document.documentElement.scrollTop ?
  document.documentElement.scrollTop : document.body.scrollTop ?
  document.body.scrollTop : 0; }

imgmag = {
    enlargedid : ''
  , smimgclick : function() {
      $('img.smimg').each(function() {
        var mylgid = 'lg' + $(this).attr('id').substring(2);    // form id for large image from id for small image
        $(this).click(function() {
          if ($(this).attr('id') == imgmag.enlargedid) {        // if this image is already enlarged
            imgmag.enlargedid = '';                             // clear 'enlargedid' var
            $('img.lgimg').css('display', 'none');              // hide the enlarged image
          } else {
            imgmag.enlargedid = $(this).attr('id');             // record the clicked id
            $('img.lgimg').css('display', 'none');              // hide all large images  
            $('img.lgimg').css('top', 0 + posTop() + 'px');    // 50 pixels from top of window
            $('#' + mylgid).css('display', 'block');            // display my large box
          }  // else
        }); // click
      }); // each
    }
  , lgimgclick : function() {
      $('img.lgimg').click(function() {
        imgmag.enlargedid = '';                   // clear 'enlargedid' var
        $('img.lgimg').css('display', 'none');    // clear all large images
      }); // click
    }
  , init : function() { 
      imgmag.smimgclick();
      imgmag.lgimgclick();
      $('img.lgimg').css('display', 'none');      // clear all large images
    }
} // close imgmag

imgmag.init();

}); // close ready
</script>