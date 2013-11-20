/** file: homeroll.js
 *  jkn 2/27/11
 **/

guild = {
  imagefolder : 'rollimages/general'
, sources     : new Array('mwccCredenza', 'OlesinMemorialCrop', 'PatAndBill', 'PhilLowe', 'Schwamb-640', 'Wilcox-640')
, smalldash   : '-125'
, interval    : 0
, thumbclass  : 'guildthumb-'
, imageclass  : 'guildimage-'
, thumbsdivid : 'guildthumbs'
, imagedivid  : 'guildimages'
, runstate    : 'run'
, index       : 0
, buttonid    : 'guildbutton'
, topoffset   : 330
}

project = {
  imagefolder : 'rollimages/project'
, sources     : new Array('ChairPrototype' , 'DeskStructureAssembled' , 'DovetailAssembled' , 'DrawerFrontTrialfit' ,
                          'FelineOpinion' , 'PlainingDrawerFront' , 'SquaringDrawerFront' ,  'WideDrawerFinalfit' )
, smalldash   : '-125'
, interval    : 0
, thumbclass  : 'projectthumb-'
, imageclass  : 'projectimage-'
, thumbsdivid : 'projectthumbs'
, imagedivid  : 'projectimages'
, runstate    : 'run'
, index       : 0
, buttonid    : 'projectbutton'
, topoffset   : 530
}

showtell = {
  imagefolder : 'rollimages/showtell'
, sources     : new Array(
    'Branding Chair PICT4287', 
    'Branding Desk PICT4285', 
    'Craftsman Chair PICT4310', 
    'Hepplewhite Side Table PICT4294', 
    'Inlay Table PICT4309', 
    'Jewelry Box Closed PICT4302', 
    'Jewelry Box Open PICT4301', 
    'PICT4200 ISO View', 
    'Queen Anne Side Table PICT4297',
    'Rocking Hourse PICT4290', 
    'Small Box PICT4299', 
    'Small Hutch PICT4292', 
    'Small Side Table PICT4293', 
    'Teak Chair PICT4306', 
    'Turnings PICT4303'
)
, smalldash   : '-125'
, interval    : 0
, thumbclass  : 'showtellthumb-'
, imageclass  : 'showtellimage-'
, thumbsdivid : 'showtellthumbs'
, imagedivid  : 'showtellimages'
, runstate    : 'run'
, index       : 0
, buttonid    : 'showtellbutton'
, topoffset   : 0
}

$(document).ready(function() {
  createimgs(showtell);
  start(showtell); 
  createimgs(guild);
  start(guild); 
  createimgs(project);
  start(project);  //alert('hello');
});
