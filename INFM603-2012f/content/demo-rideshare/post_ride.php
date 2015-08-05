<!doctype html>
<html lang="en">
<head>
<title>RideShare: Post a Ride</title>
<meta charset="utf-8">
</head>
<body>

<h1>RideShare: Post a Ride</h1>

<?php

// Fetch input from user form
$driver = htmlspecialchars($_POST['driver']);
$phone = htmlspecialchars($_POST['phone']);
$origin = htmlspecialchars($_POST['origin']);
$destination = htmlspecialchars($_POST['destination']);
$date = htmlspecialchars($_POST['date']);
$seats = htmlspecialchars($_POST['seats']);

echo "<table>";
echo "<tr><td width=\"80\">Driver:</td><td>" . $driver . "</tr>";
echo "<tr><td>Phone:</td><td>" . $phone . "</tr>";
echo "<tr><td>Origin:</td><td>" . $origin . "</tr>";
echo "<tr><td>Destination:</td><td>" . $destination . "</tr>";
echo "<tr><td>Date:</td><td>" . $date . "</tr>";
echo "<tr><td>Seats:</td><td>" . $seats . "</tr>";
echo "</table>";

// Connect to the MySQL database: arguments are server, username, password
$con = mysql_connect("mysql17.000webhost.com", "a8061156_db1", "abc123$");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

// Use a particular database
mysql_select_db("a8061156_db1", $con);

// Issue SQL query
$result = mysql_query("insert into Ride (Driver, Phone, Origin, Destination, Date, Seats) values" .
 "('" . $driver . "', '" . $phone . "', '" . $origin . "', '" . $destination . 
 "', '" . $date . "'," .  $seats . ");");

echo "<p><b>Ride successfully posted!</b></p>";

echo "<hr/>";

echo "<p><a href=\"index.html\">Back to main page</a></p>";

?>

</body>
</html>
