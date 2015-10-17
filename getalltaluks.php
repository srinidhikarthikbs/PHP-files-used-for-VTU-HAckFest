<?php

include 'dbconnect.php';
$district=$_POST["district"];
$result = mysql_query("select distinct taluk from school where district='$district'")
or die(mysql_error());
$ans="";
while($row=mysql_fetch_array($result))
{
	$taluk=$row[0];
	//$resultscore=mysql_query("select sum(maxmarks),sum(marksscored) from exam e,student s,school sc where e.studentid=student.studentid and s.presentschoolid=school.schoolid and school.state='$state'")
	//or die(mysql_error());
	//$percentage=$resultscore[1]/$resultscore[0]*100;
	$ans=$ans.$taluk.",";
}

echo $ans;

?>