<Html>
<head><title>Library Science Courses</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body marginwidth="0" topmargin="0" leftmargin="0" marginheight="0">
<div class="header1">CLIS Course Catalog</div>
<div class="headernav"><a href="search.php">Search the Catalog</a> | <a href="full_list.php">Full Catalog</a> | <a href="ls.php">Library Science Courses</a> | <a href="im.php">Information Management Courses</a> | <a href="index.html">Course Catalog Home</a> | <a href="http://www.clis.umd.edu">CLIS Homepage</a></div>






<div class="body">


<?php

$conn=odbc_connect('Online_Course_Catalog_Database','',''); 
if (!$conn)
{
exit("Connection Failed: " . $conn); 
} 
$sql="SELECT CourseName, CourseDescription, CourseNumber, DepartmentName, ProfessorLastName, ProfessorFirstName, SectionName FROM CourseInformation, DepartmentInformation, ProfessorInformation, SectionInformation 
WHERE CourseInformation.DepartmentID=DepartmentInformation.DepartmentID and  ProfessorInformation.ProfessorID=SectionInformation.ProfessorID 
and SectionInformation.CourseID=CourseInformation.CourseID 
and DepartmentInformation.DepartmentID=2"; 
$results=odbc_exec($conn,$sql); 
if (!$results)
{ 
exit("Error in SQL");
} 
echo "<div align=\"center\">";
echo "<p class=\"topheader\">CLIS Library Science Courses, Spring 2006</p>";
echo "<p class=\"style2\">Choose a class to see its details, or <a href=\"#all\">see all course details</a></p>";
echo "</div><div align=left>";

while (odbc_fetch_row($results))
{
$cnumber=odbc_result($results,"CourseNumber");
$cname=odbc_result($results,"CourseName");


echo "<span class=\"style5\"><a href=\"#$cnumber\">$cnumber: $cname</a></span><br>";
}
odbc_close($conn);
echo "</div><p><hr><p>";
?>





<a name="all">

<?php

$conn=odbc_connect('Online_Course_Catalog_Database','',''); 
if (!$conn)
{
exit("Connection Failed: " . $conn); 
} 

/*The odbc_exec() function below is used to execute the SQL statement that selects patron's records from the table "tblPatron". */

$sql="SELECT CourseName, CourseDescription, CourseNumber, Day, TimeBegin, TimeEnd, Credits, DepartmentName, ProfessorLastName, ProfessorFirstName, SectionName, SectionID, Semester, Location FROM CourseInformation, DepartmentInformation, ProfessorInformation, SectionInformation WHERE CourseInformation.DepartmentID=DepartmentInformation.DepartmentID and ProfessorInformation.ProfessorID=SectionInformation.ProfessorID 
and SectionInformation.CourseID=CourseInformation.CourseID and DepartmentInformation.DepartmentID=2"; 
$results=odbc_exec($conn,$sql); 
if (!$results)
{ 
exit("Error in SQL");
} 


echo "<div align=center>";
echo "<h3>CLIS Library Science Courses, Spring 2006</h3>";




while (odbc_fetch_row($results))
{
$cnumber=odbc_result($results,"CourseNumber");
$cname=odbc_result($results,"CourseName");
$cdesc=odbc_result($results,"CourseDescription");
$ccredits=odbc_result($results,"Credits");
$dname=odbc_result($results,"DepartmentName");
$pfname=odbc_result($results,"ProfessorFirstName");
$plname=odbc_result($results,"ProfessorLastName");
$location=odbc_result($results,"Location");
$semester=odbc_result($results,"Semester");
$section=odbc_result($results,"SectionName");
$day=odbc_result($results,"Day");
$start=odbc_result($results,"TimeBegin");
$end=odbc_result($results,"TimeEnd");

echo "<a name=\"$cnumber\"><table width=\"600\" border=1 bordercolor=000000 cellpadding=2 cellspacing=0><tr><td colspan=2 bgcolor=\"cccccc\"><p class=\"style7\">$cnumber: $cname</p></td></tr>";
echo "<td width=\"150\" valign=\"top\"><p class=\"style8\"><b>Department:</b> $dname<br><br><b>Professor:</b> $pfname $plname <br><br><i>Credits:</i> $ccredits</p></td>";
echo "<td width=\"450\" valign=\"top\"><p class=\"style8\">$cdesc<br><br>Time: $day, $start to $end<br><br><i>Location:</i> $location<br><br><i>Section:</i> $section</p;></td></tr></table><p>";
}
odbc_close($conn);
echo "<p class=\"style2\">Additional courses may be offered in Summer 2006. That course listing is not yet available.</p>";
?>







</div>

</div>
<div class="footernav">
College of Information Studies, University of Maryland, College Park, MD 20742, USA | 301.405.2033
</div>





</body>
</html>