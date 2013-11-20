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
$bn = "<br>\n";
$cmd = 'all'; if (isset($_GET['cmd'])) $cmd = $_GET['cmd'];

require_once 'classes/ClsMember.php';
$members = Member::load();
$count = sizeof($members);

if ($cmd=='phones') {
  echo '<br><table>';
  foreach ($members as $member) {
    $lineout  = '<tr><td style="font-weight:bold; padding-right:20px; ">' . $member->fullname;
    if (  ( $member->publish === 'yes' && $page === 'members') 
          || $page === 'privatemembers' ) $lineout .= '</td><td>' . $member->phone . '</td></tr>';
    else $lineout .= '</td><td>' . '&nbsp;' . '</td></tr>';
    echo $lineout;
  }
  echo '</table><br>';
}

elseif ($cmd=='emails') {
  echo '<br><table>';
  foreach ($members as $member) {
    $lineout  = '<tr><td style="font-weight:bold; padding-right:20px; ">' . $member->fullname;
    if (  ( $member->publish === 'yes' && $page === 'members') 
          || $page === 'privatemembers' ) $lineout .= '</td><td>' . $member->email . '</td></tr>';
    else $lineout .= '</td><td>' . '&nbsp;' . '</td></tr>';
    echo $lineout;
  }
  echo '</table><br>';
}

else {  // print all
  foreach ($members as $member) {
    echo '<span style="font-weight:bold; ">' . $member->fullname . "</span>$bn";
    $publish = strtolower($member->publish);
    $publish = substr($publish, 0, 1);
    if (  ( $publish === 'y' && $page === 'members') 
          || $page === 'privatemembers' ) {
      echo "<div style='margin-left:30px;'>$member->fulladdress</div>\n";
      echo "<div style='margin-left:30px;'>$member->phone</div>\n";
      echo "<div style='margin-left:30px;'>$member->email</div>\n";
      if ($member->company != '')
        echo "<div style='margin-left:30px;'>$member->company</div>\n";
    }
  }
}

echo "$bn Member Count: ".$count."<br><br>\n";
?>




