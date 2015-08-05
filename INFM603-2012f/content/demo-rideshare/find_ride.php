<!doctype html>
<html lang="en">
<head>
<title>RideShare: Find a Ride</title>
<meta charset="utf-8">
</head>
<body>

<h1>RideShare: Find a Ride</h1>

<?php

// Fetch input from user form
$origin = htmlspecialchars($_POST['origin']);
$destination = htmlspecialchars($_POST['destination']);
$date = htmlspecialchars($_POST['date']);

echo "<table>";
echo "<tr><td width=\"80\">Origin:</td><td>" . $origin . "</tr>";
echo "<tr><td>Destination:</td><td>" . $destination . "</tr>";
echo "<tr><td>Date:</td><td>" . $date . "</tr>";
echo "</table>";

// Connect to the MySQL database: arguments are server, username, password
$con = mysql_connect("mysql17.000webhost.com", "a8061156_db1", "abc123$");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

// Use a particular database
mysql_select_db("a8061156_db1", $con);

// Issue SQL query
$result = mysql_query("select RideId, Driver from Ride " .
  "where origin = \"" . $origin . "\" and destination = \"" . $destination . 
  "\" and Date = \"" . $date . "\" and Seats > 0;");

// Generate HTML from result of SQL query

echo "<p>Drivers Available:</p>";
echo "<form action=\"book.php\" method=\"post\">";
echo "<table>";
while ($row = mysql_fetch_array($result)) {
  echo "<tr><td><input id=\"radio\" type=\"radio\" name=\"ride\" value=\"" . $row[0];
  echo "\"></td><td>" . $row[1] . "</td></tr>";
}
echo "</table>";

echo "<table>";
echo "<tr><td width=\"80\">Passenger:</td><td><input type=\"text\" name=\"passenger\"/></td></tr>";
echo "<tr><td>Phone:</td><td><input type=\"text\" name=\"phone\"/></td></tr>";
echo "</table>";

echo "<p><input value=\"Book it!\" type=\"submit\"/></p>";
echo "</form>";

// Close connection to MySQL database
mysql_close($con);

echo "<hr/>";

echo "<p><a href=\"index.html\">Back to main page</a></p>";

?>

</body>
</html>
