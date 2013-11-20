<?php
session_start();
error_reporting(E_ALL); ini_set('display_errors', 1);

include 'includes/configuration.php';

include 'classes/classes.php';
$dateobj = new ClsDate();
include 'classes/ClsDb.php';
$db = new db();

include "includes/utils.php";
include "includes/pagetitles.php";
list($cutoffdate, $unixcutoff) = $dateobj->cutoffmonths();
if (DEBUG) echogetsposts();
$page = 'dblogin'; if (isset($_GET['page'])) $page = $_GET['page'];                                // default to login
if ($page == 'logout') unset($_SESSION['email']);                                                  // kill user session
if (!isset($_SESSION['email']) && $page !='dbhome' && $page != 'membernewpswd' && $page != 'memberchangepswd') $page = 'dblogin'; // force login
if(DEBUG) echo "\n<br>Actual page: " . $page;
date_default_timezone_set('America/New_York');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
if (LOCATION == 'LOCAL') echo "<title>LOCAl Guild DB</title>";
else                     echo "<title>Guild DB</title>";
?>
<link href="csfiles/structure.css" rel="stylesheet" type="text/css">
<link href="csfiles/memberaccess.css" rel="stylesheet" type="text/css">
<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type='text/javascript' src='jsfiles/validates.js'></script>
<script type='text/javascript' src='jsfiles/utils.js'></script>
</head><body>
<!-- // store logged in email for access by javascript  -->
<div id='loginemail' style='visibility:hidden; height:0; '>
<?php if(isset($_SESSION['email'])) echo '   ' . $_SESSION['email']; ?>
</div>
<div id='container'>

<div id='header'>
<?php include 'includes/memberheader.php';?>
</div> <!-- close header -->

<div id='membercenter'>
<?php

switch ($page) {
  case 'dblogin':          include 'content/dblogin.php';          break;
  case 'dbhome':           include 'content/dbhome.php';           break;
  case 'editself':         include 'content/editself.php';         break;
  case 'editmember':       include 'content/editmember.php';       break;
  case 'editmember':   include 'content/editmember.php';   break;
  case 'editmemberdo':     include 'content/editmemberdo.php';     break;
  case 'editselfdo2':    include 'content/editselfdo2.php';    break;
  case 'membernewpswd':    include 'content/membernewpswd.php';    break;
  case 'memberdoupdate':   include 'content/memberdoupdate.php';   break;
  case 'memberchangepswd': include 'content/memberchangepswd.php'; break;
  case 'current':          include 'content/current.php';          break;
  case 'former':           include 'content/former.php';           break;
  case 'allmembers':       include 'content/allmembers.php';       break;
  case 'add':              include 'content/add.php';              break;
  case 'addmember':    include 'content/addmember.php';    break;
  case 'adddo':            include 'content/adddo.php';            break;
  case 'paymentbydate':    include 'content/paymentbydate.php';    break;
  case 'paymentbyname':    include 'content/paymentbyname.php';    break;
  case 'paymentbytaxyear': include 'content/paymentbytaxyear.php'; break;
  case 'newpayment':       include 'content/newpayment.php';       break;
  case 'newpaymentajax':   include 'content/newpaymentajax.php';   break;
  case 'newpaymentdo':     include 'content/newpaymentdo.php';     break;
  case 'newpaymentdo2':    include 'content/newpaymentdo2.php';    break;
  case 'editpayment':      include 'content/editpayment.php';      break;
  case 'editpaymentajax':  include 'content/editpaymentajax.php';  break;
  case 'editpaymentdo':    include 'content/editpaymentdo.php';    break;
  case 'editpaymentdo2':   include 'content/editpaymentdo2.php';   break;
  case 'editpaymentdo3':   include 'content/editpaymentdo3.php';   break;
  case 'excel':            include 'content/excel.php';            break;
  case 'roles':            include 'content/roles.php';            break;
  case 'roles1':           include 'content/roles1.php';           break;
  case 'roles2':           include 'content/roles2.php';           break;
  case 'weblists':         include 'content/weblists.php';         break;
  case 'rightsadmin':      include 'content/rightsadmin.php';      break;
  case 'rightsadmin2':     include 'content/rightsadmin2.php';     break;
  case 'logout':           include 'content/logout.php';           break;
  case 'backup':           include 'content/backup.php';           break;
  case 'emailnonmembers':  include 'content/emailnonmembers.php';  break;
  case 'listfriends':      include 'content/listfriends.php';      break;
  
} // switch
?>
</div> <!-- close center -->

</div> <!-- close container -->
</body></html>
