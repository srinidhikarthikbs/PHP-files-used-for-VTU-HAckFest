<?php

include 'dbconnect.php';

$result = mysql_query("select distinct state from school")
or die(mysql_error());
$ans="";
while($row=mysql_fetch_array($result))
{
	$state=$row[0];
	//$resultscore=mysql_query("select sum(maxmarks),sum(marksscored) from exam e,student s,school sc where e.studentid=student.studentid and s.presentschoolid=school.schoolid and school.state='$state'")
	//or die(mysql_error());
	//$percentage=$resultscore[1]/$resultscore[0]*100;
	$ans=$ans.$state.",";
}

echo $ans;

?>