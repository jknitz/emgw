<?php

// check password
if ( isset($_POST['password']) ) { // returning from login form
  if ( $_POST['password'] === $this->pswd ) {
    $_SESSION['loggedin'] = true;
  } else {
    echo 'login failed<br>';
    exit;
  }
}

/*** check if logged in yet ***/
if (!isset($_SESSION['loggedin'])) {  // if not logged in
?>
<form method="POST" action="index.php?page=<?php echo $page; ?>"> <!-- back to original page -->
  Password: <input style='height:100px; 'type="password" name="password" size="20">
  <input style='height:100px; 'type="submit" value="Submit" >
</form>  
<?php
  } else {                            // if logged in
    $this->docolumns();
  }
?>
