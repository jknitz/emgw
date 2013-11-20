
<?php

  $message  = 'Name: '.$_POST['Name']."\n";
  $message .= 'Email: '.$_POST['Email']."\n";
  $message .= 'Address1: '.$_POST['Address1']."\n";  
  $message .= 'City: '.$_POST['City']."\n";
  $message .= 'State: '.$_POST['State']."\n";
  $message .= 'ZipCode: '.$_POST['ZipCode']."\n";
  $message .= 'Phone: '.$_POST['Phone']."\n";
  $message .= 'Website: '.$_POST['Website']."\n";
  $message .= 'InterestArea: '.$_POST['InterestArea']."\n";  
  $message .= 'Comment: '.$_POST['Comment']."\n"; 
  
  
  // Send message to emgw@emgw.org
  mail("emgw@emgw.org", "From emgw web site", $message);

?>

Email has been sent
