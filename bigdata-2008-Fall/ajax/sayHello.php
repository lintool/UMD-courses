<?php
  if (isset($_GET['inputText'])) {
    if ( strlen($_GET['inputText']) > 0 ) {
      echo "Hello " . $_GET['inputText'] . "!";
    } else {
      echo "";
    }
  }
?>
