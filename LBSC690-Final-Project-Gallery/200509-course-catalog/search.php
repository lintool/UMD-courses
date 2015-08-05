<html>
<head><title>CLIS 2006 Spring Schedule</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body marginwidth="0" topmargin="0" leftmargin="0" marginheight="0">
<div class="header1">CLIS Course Catalog</div>
<div class="headernav"><a href="search.php">Search the Catalog</a> | <a href="full_list.php">Full Catalog</a> | <a href="ls.php">Library Science Courses</a> | <a href="im.php">Information Management Courses</a> | <a href="index.html">Course Catalog Home</a> | <a href="http://www.clis.umd.edu">CLIS Homepage</a></div>




<div class="body">



<p class="topheader">Search the Course Catalog</p>




<p>
<p class="style2">Search by Keyword in Course Descriptions:<br />

<form method=post action="keyword.php"> 
<input type="text" name="keyword"> 
 <INPUT TYPE="submit" VALUE="Go">
</form>


<p class="style2">Search by Professor:*<br />

<form method=post action="professors.php">  
<?php
$conn=odbc_connect('Online_Course_Catalog_Database','',''); 
if (!$conn)
{
exit("Connection Failed: " . $conn); 
} 
$sql="SELECT ProfessorLastName, ProfessorFirstName FROM ProfessorInformation WHERE EXISTS(SELECT * FROM SectionInformation WHERE ProfessorInformation.ProfessorID = SectionInformation.ProfessorID) ORDER BY ProfessorLastName"; 
$results=odbc_exec($conn,$sql); 
if (!$results)
{ 
exit("Error in SQL");
} 

echo "<select name=\"whoisit\">";

while (odbc_fetch_row($results))
{
$last=odbc_result($results,"ProfessorLastName");
$first=odbc_result($results,"ProfessorFirstName");

echo "<option>$last</option>";
}
odbc_close($conn);
echo "</select>";
?>
 <INPUT TYPE="submit" VALUE="Go">
</form>
<p class="style8">*Professors not listed are not teaching in Spring 2006.</p>







<p class="style2">Search by Day:<br />





<form method=post action="day.php"> 
<select name="day">
<option>Monday</option>
<option>Tuesday</option>
<option>Wednesday</option>
<option>Thursday</option>
<option>Friday</option>
<option>Saturday</option>
<option>Not Available</option> <INPUT TYPE="submit" VALUE="Go">
</form>






























</div>


</div>
<div class="footernav">
College of Information Studies, University of Maryland, College Park, MD 20742, USA | 301.405.2033
</div>


</body>

</html>