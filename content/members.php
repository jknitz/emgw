<?php $page = $_GET['page']; ?>
<!-- buttons for emails/phones/all -->
<a style='display:block; height:30px; border:2px solid #600; padding:5px 10px 0 10px;  float:left; margin-left:20px; text-decoration:none; ' 
  href='index.php?page=<?php echo $page; ?>&amp;cmd=emails' >Emails Only</a>
<a  style='display:block; height:30px; border:2px solid #600; padding:5px 10px 0 10px;  float:left; margin-left:20px; text-decoration:none; '
  href='index.php?page=<?php echo $page; ?>&amp;cmd=phones' >Phones Only</a>
<a  style='display:block; height:30px; border:2px solid #600; padding:5px 10px 0 10px;  float:left; margin-left:20px; text-decoration:none; '
  href='index.php?page=<?php echo $page; ?>&amp;cmd=all' >All</a>
<div style='clear:left; '>&nbsp;</div>
<?php

$rows = $db->getPaymentsJoinMembers();
$rows = $db->selectcurrent($rows);
$count = sizeof($rows);

$bn = "<br>\n";
$cmd = 'all'; if (isset($_GET['cmd'])) $cmd = $_GET['cmd'];

if ($cmd=='phones') {
  echo '<br>';
  foreach ($rows as $member) {
    $lineout  = '<div style="font-weight:bold; padding-right:20px; ">' . $member->lastName . ', ' . $member->firstName . '</div>';
    if (  ( $member->publish === 'yes' && $page === 'members') 
          || $_SESSION['loggedin'] === true ) {
           if (trim($member->phoneHome)!='') $lineout .= 'Home: ' . $member->phoneHome . "&nbsp;&nbsp;&nbsp;&nbsp;";
           if (trim($member->phoneCell)!='') $lineout .= 'Cell: ' . $member->phoneCell . "&nbsp;&nbsp;&nbsp;&nbsp;";
           if (trim($member->phoneBus)!='') $lineout .= 'Business: ' . $member->phoneBus;
           
           
           }

    echo $lineout . '<br>';
  }
  echo '<br>';
}

elseif ($cmd=='emails') {
  echo '<br><table>';
  foreach ($rows as $member) {
    $lineout  = '<tr><td style="font-weight:bold; padding-right:20px; ">' . $member->lastName . ', ' . $member->firstName;
    if (  ( $member->publish === 'yes' && $page === 'members') 
          || $_SESSION['loggedin'] === true ) $lineout .= '</td><td>' . $member->email . '</td></tr>';
    else $lineout .= '</td><td>' . '&nbsp;' . '</td></tr>';
    echo $lineout;
  }
  echo '</table><br>';
}

else {  // print all
  foreach ($rows as $member) {
    echo '<span style="font-weight:bold; ">' . $member->lastName . ', ' . $member->firstName . "</span>$bn";
    $publish = strtolower($member->publish);
    $publish = substr($publish, 0, 1);
    if (  ( $publish === 'y' && $page === 'members') 
          || $_SESSION['loggedin'] === true ) {
      $fulladdress = $member->streetAddress . ', ' . $member->city . ', ' . $member->state . ', ' . $member->zip; 
      echo "<div style='margin-left:30px;'>$fulladdress</div>\n";
      if (trim($member->phoneHome)!='') echo "<div style='margin-left:30px;'>Home: $member->phoneHome</div>\n";
      if (trim($member->phoneCell)!='') echo "<div style='margin-left:30px;'>Cell: $member->phoneCell</div>\n";
      if (trim($member->phoneBus)!='') echo "<div style='margin-left:30px;'>Business: $member->phoneBus</div>\n";
      echo "<div style='margin-left:30px;'>$member->email</div>\n";
      if ($member->company != '')
        echo "<div style='margin-left:30px;'>$member->company</div>\n";
    }
  }
}

echo "$bn Member Count: ".$count."<br><br>\n";

?>




