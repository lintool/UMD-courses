<html>
<body>

<?php
$referring_page = $_SERVER['HTTP_REFERER'];
$refsplit = preg_split("/(\/|\.)/",$referring_page);
$city = ucfirst($refsplit[count($refsplit)-2]);

echo "<br><br>You have chosen:<br>";
echo $_REQUEST["Type"] . "<br>";
echo $_REQUEST["Level"] . "<br>";
echo $_REQUEST["Rating"] . "<br>";

$action = $_REQUEST["action"];
$type = $_REQUEST["Type"];
$level = $_REQUEST["Level"];
$rating = $_REQUEST["Rating"];

$table = "";

$sql="";
$sqlselect="";
$sqlfrom="";
$sqlwhere="";

$type_sql="";
$level_sql="";

switch($action)
{
  case "restaurants":
    $table = "restaurants";
    $sqlselect = "SELECT ".$table.".name, ".$table.".address, ".$table.".Neighborhood, "
                 .$table.".phone, ".$table.".reservations, ".$table.".restaurant_type, "
                 .$table.".restaurant_price, ".$table.".city, review.review_rank, 
                 review.comments, reviewer.first_name, reviewer.last_name";
    $type_sql = $table.".restaurant_type = '".$type."'";
    $level_sql = $table.".restaurant_price = '".$level."'";
    break;
  case "cultural":
    $table = "cultural";
    $sqlselect = "SELECT ".$table.".cultural_price, ".$table.".cultural_type, ".$table.".name, "
                 .$table.".phone, ".$table.".address, ".$table.".neighborhood, ".$table.".city,
                 reviewer.first_name, reviewer.last_name , review.review_rank, review.comments";
    $type_sql = $table.".cultural_type = '".$type."'";
    $level_sql = $table.".cultural_price = '".$level."'";
    break;
  case "outdoors":
    $table = "outdoors";
    $sqlselect = "SELECT ".$table.".outdoors_level, ".$table.".outdoors_type, ".$table.".name, "
                 .$table.".phone, ".$table.".address, ".$table.".city, reviewer.first_name, 
                 reviewer.last_name, review.review_rank, review.comments";
    $type_sql = $table.".outdoors_type = '".$type."'";
    $level_sql = $table.".outdoors_level = '".$level."'";
    break;
}
 
$rating_sql = "review.review_rank = " .$rating;
$city_sql = $table.".city='".$city."'";

$sqlfrom = "FROM reviewer INNER JOIN (".$table." INNER JOIN review 
                                                 ON ".$table.".id_number = review.id_number)
                          ON reviewer.user_name = review.user_name";

$sqlwhere = "WHERE ((".$type_sql.") AND (".$level_sql.") AND (".$rating_sql.") AND (".$city_sql."))";

$sql = $sqlselect . " " . $sqlfrom . " " . $sqlwhere;

$conn = odbc_connect('finalproject','','') or die('Could Not Connect to ODBC Database!'); 

echo "sql = " . $sql . "<br>";

$result = odbc_exec($conn,$sql) or die (odbc_errormsg());

while (odbc_fetch_row($result)) {
  for ($i=1; $i<=odbc_num_fields($result); $i++) {
    echo "result ".$i." = ".odbc_result($result,$i)."<br>";
  }
}

odbc_close($conn); 
?>

</body>
</html>