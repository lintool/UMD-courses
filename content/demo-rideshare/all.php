<!doctype html>
<html lang="en">
<head>
<title>RideShare: Find My Passengers</title>
<meta charset="utf-8">
</head>
<body>

<h1>RideShare: All Rides</h1>

<?php

// Connect to the MySQL database: arguments are server, username, password
$con = mysql_connect("mysql17.000webhost.com", "a8061156_db1", "abc123$");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

// Use a particular database
mysql_select_db("a8061156_db1", $con);

// Issue SQL query
$result = mysql_query("select RideId, Driver, Phone, Origin, Destination, Date, Seats from Ride;");

// Generate HTML from result of SQL query
echo "<h3>Ride Table</h3>";
echo "<table border=\"1\">";
echo "<tr><td><b>RideId</b></td><td><b>Driver</b></td><td><b>Phone</b></td>";
echo "<td><b>Origin</b></td><td><b>Destination</b></td>";
echo "<td><b>Date</b></td><td><b>Seats</b></td></tr>";
while ($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td>\n";
  echo "<td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td>\n";
  echo "<td>" . $row[6] . "</td>\n";
  echo "</tr>";
}
echo "</table>";

// Issue SQL query
$result = mysql_query("select RideId, Passenger, Phone from Booking;");

// Generate HTML from result of SQL query
echo "<h3>Booking Table</h3>";
echo "<table border=\"1\">";
echo "<tr><td><b>RideId</b></td><td><b>Passenger</b></td><td><b>Phone</b></td></tr>";
while ($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td>\n";
  echo "</tr>";
}
echo "</table>";

// Close connection to MySQL database
mysql_close($con);

echo "<hr/>";

echo "<p><a href=\"index.html\">Back to main page</a></p>";

?>

</body>
</html>
