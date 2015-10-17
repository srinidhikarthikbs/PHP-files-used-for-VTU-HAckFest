<?php

include 'dbconnect.php';
$studentid=$_GET["studentid"];
$result = mysql_query("select * from student where studentid='$studentid'")
or die(mysql_error());
$ans="";
$row=mysql_fetch_array($result);
//while($row=mysql_fetch_array($result))
$presentschoolid=$row["presentschoolid"];
$resultschool=mysql_query("select schoolname from school where schoolid='$presentschoolid'")
				or die(mysql_error());
$row2=mysql_fetch_array($resultschool);
$classid=$row["classid"];
$class=mysql_query("select class from class where classid='$classid'")
		or die(mysql_error());
$row3=mysql_fetch_array($class);
$ans=$row["studentname"]."-".$row2[0]."-".$row["email"]."-".$row["parentphone"]."-".$row3[0];

echo $ans;

?>