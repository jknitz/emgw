<?php

/***********************/
/*** from index.php  ***/
/*** Process load    ***/
/***********************/

$retarray = array();
$retarray['leftcolumn'] = '';
$retarray['msg'] = "";

if ($_POST['process'] == 'load') {

$retarray['msg'] .= $_POST['pageid'];
$retarray['msg'] .= "load called in ajaxprocess.php";

$retarray['leftcolumn'] .= file_get_contents('includes/rightcolumn.htm');

} // close if load

/*************************************/
/*** Process No Process Specified  ***/
/*************************************/
else 
{
  $retarray['msg'] =   "No process found";
}

echo json_encode($retarray);
exit;

?>