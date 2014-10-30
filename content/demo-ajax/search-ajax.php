<?php

$artist = htmlspecialchars($_GET['name']);

$con = mysql_connect("HOST","USER","PASSWORD");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("DB", $con);

$result = mysql_query("select Artist.Name, Album.Title, Track.Name from Artist " .
    "join Album on Album.ArtistId = Artist.ArtistId " .
    "join Track on Album.AlbumId = Track.AlbumId " .
    "where Artist.Name like \"" . $artist . "%\"");

echo "<table border=\"1\">";
echo "<tr><td><b>Artist</b></td><td><b>Album</b></td><td><b>Track</b></td></tr>";
while($row = mysql_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td>\n";
  echo "</tr>";
}
echo "</table>";

mysql_close($con);

?>
