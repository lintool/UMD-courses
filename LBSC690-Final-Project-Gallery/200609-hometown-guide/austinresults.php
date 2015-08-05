<HTML>
<HEAD>
<TITLE>Austin Hometown Guide</TITLE>
<meta NAME="description" CONTENT="Austin Hometown Guide">
<link rel="stylesheet" type="text/css" href="austinstyle.css">
</HEAD>
<body background="images/austinbackground.jpg"  TEXT="#oooooo" LINK="#4B0082" VLINK="#9370d8" ALINK="#BA55D3">
<TABLE WIDTH="100%">
<TR>
<TD VALIGN=top>

<img src="images/spacer.jpg" WIDTH="100" HEIGHT="1">

</TD>
<TD VALIGN=top>


<table border="5" bordercolor=black bgcolor=black cellspacing="3" cellpadding="3">

<tr>
	<td height="150" width="250" bgcolor="#CC5500"><img src="images/austinskyline.jpg" height="150" width="250"></td>
	<td align="center" bgcolor="#CC5500"><img src="images/austinlogo.jpg" height="150" width="600"></td>
	
<td align="center" height="150" width="250" bgcolor="#CC5500"><img src="images/hamiltonpool.jpg" height="150" width="260"></td>
</tr>
<tr>
	<td align="center" valign="top" bgcolor="darkorange"><br>
	<a href="main.html"><img src="images/austhome.jpg" border="0"></a><br><br>
	<a href="austin.html"><img src="images/austbutton.jpg" border="0"></a><br><br>
<a href="sacramento.html"><img src="images/sacrabutton.jpg" border="0"></a><br><br>
<a href="seattle.html"><img src="images/seatbutton.jpg" border="0"></a><br><br>
<a href="tucson.html"><img src="images/tusbutton.jpg" border="0"></a><br><br></td>
	
<td>
<P class="style1">
<?php
$referring_page = $_SERVER['HTTP_REFERER'];
$refsplit = preg_split("/(\/|\.)/",$referring_page);
$city = ucfirst($refsplit[count($refsplit)-2]);

$action = $_REQUEST["action"];
$type = $_REQUEST["Type"];
$level = $_REQUEST["Level"];
$rating = $_REQUEST["Rating"];

$table = "";

$sql="";
$sqlselect="";
$sqlfrom="";
$sqlwhere = "WHERE ((";

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
    if ( $type != "Cuisine" )
    {
	    $sqlwhere .= $table.".restaurant_type = '".$type."'" . ") AND (";
    }
    if ( $level != "Price" )
    {
	    $sqlwhere .= $table.".restaurant_price = '".$level."'" . ") AND (";
    }
    break;
  case "cultural":
    $table = "cultural";
    $sqlselect = "SELECT ".$table.".cultural_price, ".$table.".cultural_type, ".$table.".name, "
                 .$table.".phone, ".$table.".address, ".$table.".neighborhood, ".$table.".city,
                 reviewer.first_name, reviewer.last_name , review.review_rank, review.comments";
    if ( $type != "Type" )
    {
	    $sqlwhere .= $table.".cultural_type = '".$type."'" . ") AND (";
    }
    if ( $level != "Price" )
    {
	    $sqlwhere .= $table.".cultural_price = '".$level."'" . ") AND (";
    }
    break;
  case "outdoors":
    $table = "outdoors";
    $sqlselect = "SELECT ".$table.".outdoors_level, ".$table.".outdoors_type, ".$table.".name, "
                 .$table.".phone, ".$table.".address, ".$table.".city, reviewer.first_name, 
                 reviewer.last_name, review.review_rank, review.comments";
    if ( $type != "Type" )
    {
	    $sqlwhere .= $table.".outdoors_type = '".$type."'" . ") AND (";
    }
    if ( $level != "Activity Level" )
    {
	    $sqlwhere .= $table.".outdoors_price = '".$level."'" . ") AND (";
    }
    break;
}
 
$rating_sql = "review.review_rank = " .$rating;
$city_sql = $table.".city='".$city."'";

if ( $rating != "Rating" )
{
	$sqlwhere .= $rating_sql . ") AND (";
}
$sqlwhere .= $city_sql."))";

$sqlfrom = "FROM reviewer INNER JOIN (".$table." INNER JOIN review 
                                                 ON ".$table.".id_number = review.id_number)
                          ON reviewer.user_name = review.user_name";

$sql = $sqlselect . " " . $sqlfrom . " " . $sqlwhere;

$conn = odbc_connect('finalproject','','') or die('Could Not Connect to ODBC Database!'); 

$result = odbc_exec($conn,$sql) or die (odbc_errormsg());

echo "You have selected:<br>";
echo "A " . $level . " " . $type . " " . ucfirst($action) . " with a rating of " . $rating . "<br><br>";

while (odbc_fetch_row($result)) {
  if ($action == "restaurants" ) {
?>
            <br>
            <table border="1">
              <tr>
                <td colspan="2"><strong><?php echo odbc_result($result,1); ?></strong>
                </td>
                <td colspan="2"><?php echo odbc_result($result,4); ?>
                </td>
              </tr>
              <tr>
                <td><?php echo odbc_result($result,2); ?>
                </td>
                <td><?php echo odbc_result($result,3); ?>
                </td>
                <td><?php echo odbc_result($result,8); ?>
                </td>
                <td>Need reservations? <?php if (odbc_result($result,5) == 1) {
                                               echo "Yes";
                                             } else {
                                               echo "No";
                                             } ?>
                </td>
              </tr>
              <tr>
                <td colspan="2">Reviewer: <?php echo odbc_result($result,11) . " " . odbc_result($result,12); ?>
                </td>
                <td colspan="2">Ranking: <?php echo odbc_result($result,9); ?>
                </td>
              </tr>
              <tr>
                <td colspan="4">"<?php echo odbc_result($result,10); ?>"
                </td>
              </tr>
            </table>

<?php
  } 
  else if ($action == "cultural") {
?>
	
            <br>
            <table border="1">
              <tr>
                <td colspan="2"><strong><?php echo odbc_result($result,3); ?></strong>
                </td>
                <td><?php echo odbc_result($result,4); ?>
                </td>
              </tr>
              <tr>
                <td><?php echo odbc_result($result,5); ?>
                </td>
                <td><?php echo odbc_result($result,6); ?>
                </td>
                <td><?php echo odbc_result($result,7); ?>
                </td>
              </tr>
              <tr>
                <td colspan="2">Reviewer: <?php echo odbc_result($result,8) . " " . odbc_result($result,9); ?>
                </td>
                <td>Ranking: <?php echo odbc_result($result,10); ?>
                </td>
              </tr>
              <tr>
                <td colspan="3">"<?php echo odbc_result($result,11); ?>"
                </td>
              </tr>
            </table>

<?php
  } 
  else if ($action == "outdoors") {
?>

            <br>
            <table border="1">
              <tr>
                <td><strong><?php echo odbc_result($result,3); ?></strong>
                </td>
                <td><?php echo odbc_result($result,4); ?>
                </td>
              </tr>
              <tr>
                <td><?php echo odbc_result($result,5); ?>
                </td>
                <td><?php echo odbc_result($result,6); ?>
                </td>
              </tr>
              <tr>
                <td>Reviewer: <?php echo odbc_result($result,7) . " " . odbc_result($result,8); ?>
                </td>
                <td>Ranking: <?php echo odbc_result($result,9); ?>
                </td>
              </tr>
              <tr>
                <td colspan="2">"<?php echo odbc_result($result,10); ?>"
                </td>
              </tr>
            </table>

<?php
  }
}

odbc_close($conn); 
?>
</P>
</td>
<td align="center" valign="top" bgcolor="darkorange"><br>
	<p class="style4">Want to submit a review?  Email the database manager at hitthewall55@yahoo.com  Include your name, your hometown, an attraction and your review and comments.</P><br><br></td>
</tr>
</table>

</td>
</tr>
</table>

</body>
</html>
