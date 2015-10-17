<?php

include 'dbconnect.php';
$state=$_POST["state"];
$result = mysql_query("select distinct district from school where state='$state'")
or die(mysql_error());
$ans="";
while($row=mysql_fetch_array($result))
{
	$district=$row[0];
	//$resultscore=mysql_query("select sum(maxmarks),sum(marksscored) from exam e,student s,school sc where e.studentid=student.studentid and s.presentschoolid=school.schoolid and school.state='$state'")
	//or die(mysql_error());
	//$percentage=$resultscore[1]/$resultscore[0]*100;
	$ans=$ans.$district.",";
}

echo $ans;

?>