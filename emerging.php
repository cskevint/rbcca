<?php
  if($_SERVER['SERVER_NAME'] == 'www.rbcca.org') {
    //header("Location: coming_soon.php");
  }
  session_start();
  $name = "Regional Bah&aacute;'&iacute; Council of the State of California";
  $short_name = "RBC of CA";

  require_once('_header.php');
  
  require_once('_nav.php');
  
  require_once('emerging.inc.php');
  
  require_once('_footer.php');
?>
