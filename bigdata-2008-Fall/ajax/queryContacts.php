<?php

$username = "root";
$password = "";
$database = "test";

$first = $_GET['first'];
$last = $_GET['last'];

mysql_connect(localhost, $username, $password);
@mysql_select_db($database) or die( "Unable to select database");
$query = "SELECT * FROM contacts WHERE first = '$first' and last = '$last'";
$result = mysql_query($query);

$num = mysql_numrows($result);

mysql_close();

echo "<h3>Results of Query</h3>\n\n";

if ( $num == 0 ) {
  echo "\"$first $last\" not found in the database.";
  return;
}

$i=0;
while ($i < $num) {
  $first = mysql_result($result,$i,"first");
  $last = mysql_result($result,$i,"last");
  $phone = mysql_result($result,$i,"phone");
  $email = mysql_result($result,$i,"email");
  $web = mysql_result($result,$i,"web");

  echo "<p><b>$first $last</b><br/>\nPhone: $phone<br/>\nE-mail: $email<br/>\nWeb: $web</p>\n\n";

  $i++;
}


?>
