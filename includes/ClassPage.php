<?php
class pageobj {
  private $configs = array (
      'home'              => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'home', 'title' => 'EMGW Guild' )
    , 'members'           => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'members', 'title' => 'EMGW Members', 'usedb' => 'yes' )
    , 'eventsfuture'      => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'eventsfuture', 'title' => 'EMGW Events' )
    , 'eventspast'        => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'eventspast', 'title' => 'EMGW Events' )
    , 'membersmap'        => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'membersmap', 'title' => 'EMGW Map' )
    , 'privatemembers'    => array( 'login' => 'yes', 'columns' => 'two'
                             , 'target' => 'members', 'title' => 'EMGW Members'
                             , 'pswd' => 'justus', 'usedb' => 'yes' )
    , 'benefits'          => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'benefits', 'title' => 'EMGW Benefits' )
    , 'board'             => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'board', 'title' => 'EMGW Board' )
    , 'memberspages'      => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'memberspages', 'title' => 'EMGW Members Pages' )
    , 'memberapplication' => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'memberapplication', 'title' => 'EMGW Membership Application' )
    , 'newsletters'       => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'newsletters', 'title' => 'EMGW Newsletters' )
    , 'contact'           => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'contact', 'title' => 'EMGW Contact' )
    , 'email'             => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'email', 'title' => 'EMGW Email' )
    , 'furniture'         => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'furniture', 'title' => 'EMGW Furniture Group' )
    , 'galleries'         => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'galleries', 'title' => 'EMGW Galleries' )
    , 'presentations'     => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'presentations', 'title' => 'EMGW Presentations' )
    , 'links'             => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'links', 'title' => 'EMGW Links' )
    , 'eventsnonguild'    => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'eventsnonguild', 'title' => 'non-EMGW Events' )
    , 'documents'         => array( 'login' => 'yes', 'columns' => 'two'
                             , 'target' => 'documents', 'title' => 'EMGW Documents', 'pswd' => 'justus' )
    , 'papers'            => array( 'login' => 'no', 'columns' => 'two'
                             , 'target' => 'papers', 'title' => 'EMGW Papers' )
    , 'writingtable'      => array( 'login' => 'no', 'columns' => 'one'
                             , 'target' => 'writingtable', 'title' => 'EMGW Writing Table' )
    , 'credenza'          => array( 'login' => 'no', 'columns' => 'one'
                             , 'target' => 'credenza', 'title' => 'EMGW Credenza' )
    , 'boxofblocks'       => array( 'login' => 'no', 'columns' => 'one'
                             , 'target' => 'boxofblocks', 'title' => 'EMGW Box of Blocks' )
    , 'displaycase'       => array( 'login' => 'no', 'columns' => 'one'
                             , 'target' => 'displaycase', 'title' => 'EMGW Display Case' )
  );
  public $title   = '';
  public $columns = '';
  public $login   = '';
  public $target  = '';
  public $pswd    = '';
  public $usedb   = '';

  function __construct($page) {
    $this->title   = $this->configs[$page]['title'];
    $this->columns = $this->configs[$page]['columns'];
    $this->target  = 'content/' . $this->configs[$page]['target'] . ".php";
    $this->login   = $this->configs[$page]['login'];
    if ($this->login == 'yes') $this->pswd = $this->configs[$page]['pswd'];
    if (isset($this->configs[$page]['usedb'])) $this->usedb = $this->configs[$page]['usedb'];
  } // close construct
  
  function getcontent() {
    global $page, $db;
    if ($this->login == 'yes') include 'content/login.php';
    else { // not login
      $this->docolumns();
    } // close else not login
  } // close getcontent
  
  function docolumns() {
    global $page, $db;
    if ($this->columns == 'two') {
      echo "<div id='left'>\n";
      include $this->target;
      echo "</div> <!-- close left -->\n";
      echo "<div id='right'>\n";
      include 'includes/rightcolumn.htm';
      echo "\n</div> <!-- close right -->\n";
    } else { // only one column
      include $this->target;
    } // close else only one column
  } // close docolumns

} // close class pageobj

?>