<!doctype html>
<html lang="en">
<head>
<title>RideShare: Find a Ride</title>
<meta charset="utf-8">
</head>
<body>

<h1>RideShare: Book a Ride</h1>

<?php

// Fetch input from user form
$id = htmlspecialchars($_POST['ride']);
$passenger = htmlspecialchars($_POST['passenger']);
$phone = htmlspecialchars($_POST['phone']);

// Connect to the MySQL database: arguments are server, username, password
$con = mysql_connect("mysql17.000webhost.com", "a8061156_db1", "abc123$");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

// Use a particular database
mysql_select_db("a8061156_db1", $con);

$result = mysql_query("insert into Booking (RideId, Passenger, Phone) values " .
 "(" . $id . ", '" . $passenger . "', '" . $phone . "');");

$result = mysql_query("update Ride set Seats = Seats - 1 where RideId = " . $id . ";");

echo "<p>Confirmed!</p>";

echo "<hr/>";

echo "<p><a href=\"index.html\">Back to main page</a></p>";

?>

</body>
</html>
