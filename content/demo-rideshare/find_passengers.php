<!doctype html>
<html lang="en">
<head>
<title>RideShare: Find My Passengers</title>
<meta charset="utf-8">
</head>
<body>

<h1>RideShare: Find My Passengers</h1>

<?php

// Fetch input from user form
$driver = htmlspecialchars($_POST['driver']);
$date = htmlspecialchars($_POST['date']);

echo "<table>";
echo "<tr><td width=\"80\">Driver:</td><td>" . $driver . "</tr>";
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
$result = mysql_query("select Passenger, Booking.Phone from Booking " .
  "join Ride on Booking.RideId = Ride.RideId " .
  "where Driver = \"" . $driver . "\" and Date = \"" . $date . "\"");

// Generate HTML from result of SQL query
echo "<ul>";
while ($row = mysql_fetch_array($result)) {
  echo "<li>" . $row[0] . " (" . $row[1] . ")</li>";
}
echo "</ul>";

// Close connection to MySQL database
mysql_close($con);

echo "<hr/>";

echo "<p><a href=\"index.html\">Back to main page</a></p>";

?>

</body>
</html>
