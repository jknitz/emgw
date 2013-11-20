
<h2 class="pageTitle">Admininstrative Documents</h2>

<div style='margin:20px 0 0 40px'>
<?php

class clsonedoc { // class for single document
  public $name;
  public $dir;
  public $path;
  public function __construct($name,$dir) {
    $this->name = $name;
    $this->dir  = $dir;
    $this->path = '"' . $this->dir . '/' . $this->name . '"'; 
  } // public function __construct()
} // class closonedoc

class clsdoclist { // class for a document directory
  public $dir;
  public $title;
  public $sort;
  public $docs = array();
  public function __construct($dir, $title, $sort) {
    $this->title = $title;
    $this->dir = $dir;
    $this->sort = $sort;
    if ($dh = opendir($this->dir)) {
      while (false !== ($file = readdir($dh))) {
        if (is_dir($_SERVER["DOCUMENT_ROOT"] . $file)) continue;  // ignore directories
        if (!strpos($file,'.')) continue;                         // ignore if no extension
        $this->docs[] = new clsonedoc($file,$this->dir);
      } // while readdir
      closedir($dh);
    } // opendir
  } // __construct()
  public function docsort() {
    if ($this->sort === 'forward') sort($this->docs);
    else rsort($this->docs);
  } // docsort
} // class clsdoclist

/*** create the directory objects ***/
$doclists = array();
$doclists[] = new clsdoclist('exec/documents', 'Guild Documents', 'forward');
$doclists[] = new clsdoclist('exec/BoardMeetings', 'Guild Board Meeting Notes', 'reverse');

/*** display the directories ***/
foreach ($doclists as $doclist) {
  echo "<h2>$doclist->title</h2>\n";
  $doclist->docsort();
  foreach ($doclist->docs as $doc) {
    echo "<a style='margin-left:50px; ' href=$doc->path >$doc->name</a><br>\n";
  } // foreach docs
} // foreach doclists

?>

</div>
